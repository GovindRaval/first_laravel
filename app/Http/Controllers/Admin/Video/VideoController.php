<?php

namespace App\Http\Controllers\Admin\Video;

use App\AdminModel\AdminCountry;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Helper;
use DB;
use Illuminate\Support\Facades\Storage;
use App\AdminModel\Video\AdminVideoDescription;
use App\AdminModel\Video\AdminVideo;
use Illuminate\Support\Facades\App;

class VideoController extends Controller
{
    private $langFile = 'admin';
    private $module   = '.video';

    public function index(Request $request){

      
     /*
         * Get SortKey and SortOrder from helper
         */
        $sorting      = Helper::getOrderSortingColumn($request);
        $sortKey      = $sorting['sortKey'];
        $sortVal      = $sorting['sortVal'];
        $searchText   = $request->q;
        $pageLength   = $request->pageLength;
        $languageList = Helper::getLanguageList();
        $VideoList      = new AdminVideo();
        $VideoList     = $VideoList->getAllData($searchText, $sortKey, $sortVal, $pageLength);
        return view('admin.video.index', compact('VideoList', 'sortKey', 'sortVal', 'searchText', 'languageList', 'pageLength'));
    }
    


    function getSortingNumber()
    {
        $model         = new AdminVideo();
        $sortingNumber = $model->getSortingNumber();
        if (!$sortingNumber)
        {
            $sortingNumber = 0;
        }
        $sortingNumber++;
        return $sortingNumber;
    }
    function updateSortingOrder($currentOrder, $newOrder)
    {
        if ($currentOrder > $newOrder)
        {
            $record = AdminVideo::where('sorting', '>=', $newOrder)->where('sorting', '<=', $currentOrder)->whereNotNull('sorting')->orderBy('sorting', 'asc')->get();
            foreach ($record as $record)
            {
                $record->sorting = $record->sorting + 1;
                $record->save();
            }
        }
        else if ($currentOrder < $newOrder)
        {
            $record = AdminVideo::where('sorting', '<=', $newOrder)->where('sorting', '>=', $currentOrder)->whereNotNull('sorting')->orderBy('sorting', 'asc')->get();
            foreach ($record as $record)
            {
                $record->sorting = $record->sorting - 1;
                $record->save();
            }
        }
    }
    public function create()
    {
        $languageList = Helper::getLanguageList();
        if ($languageList)
        {
            $sortingNumber = $this->getSortingNumber();
            $isActive      = config('custom.dropdown.isActive');
            return view("admin.video.add", compact('languageList', 'sortingNumber','isActive'));
        }
        else
        {
            return redirect()->route('admin.video.index')->with('error', Lang::get($this->langFile . 'video-not-found'));
        }
    }
    public function store(Request $request)
    {
        $languageList      = Helper::getLanguageList();
        /*
         * Validations
         */
        $validationRule    = [];
        $validationMessage = [];

        $videoName = "";
        $languageID  = "";

        $sortingNumber  = $this->getSortingNumber();
        $validationRule = [
            'sorting'    => "required|numeric|gte:1|max:$sortingNumber",
            'is_active' => 'required',
            'video_url' => 'required',
        ];
        $message_text_sorting = Lang::get($this->langFile . '.error-max-sorting');
        $message_text_sorting = str_replace("#number#", $sortingNumber, $message_text_sorting);

        $validationMessage = [
            'is_active.required' => Lang::get($this->langFile . '.error-slider-req-status'),
            'video_url.required' => Lang::get($this->langFile . '.error-slider-req-status'),
        ];
        $validationMessage = [
            'sorting.required'    => Lang::get($this->langFile . '.error-req-sorting'),
            'country_id.required' => Lang::get($this->langFile . '.error-req-country'),
            'sorting.numeric'     => Lang::get($this->langFile . '.error-numeric-sorting'),
            'sorting.gte'         => Lang::get($this->langFile . '.error-min-sorting'),
            'sorting.min'         => Lang::get($this->langFile . '.error-min-sorting'),
            'sorting.max'         => $message_text_sorting,
        ];
        /*
         * language wise validation
         */
        foreach ($languageList as $language)
        {
            $message_text                                                = str_replace("#language#", '(' . ucfirst($language->name) . ')', Lang::get($this->langFile . '.error-video-req-name'));
            $validationRule['video_' . $language->id]                  = 'required';
            $validationMessage['video_' . $language->id . '.required'] = $message_text;
            $message_text                                                = str_replace("#language#", '(' . ucfirst($language->name) . ')', Lang::get($this->langFile . '.error-delivery-req-name'));
            /*
             * For unique validation
             */
            $videoName                                                 = 'video_' . $language->id;
            $languageID                                                  = $language->id;
            $checkUnique                                                 = AdminVideoDescription::where(['video_name' => $request->$videoName, 'language_id' => $languageID])->count();
            if ($checkUnique > 0)
            {
                return redirect()->back()->withInput($request->input)->withErrors([$videoName   => Lang::get($this->langFile . '.error-video-unique-name')]);
            }
        }

        $validatedData = $request->validate($validationRule, $validationMessage);
        DB::beginTransaction();
        try
        { 
            $model             = new AdminVideo();
            /*
             * code for sorting
             */
            $model->sorting    = $request->sorting;
            $model->is_active  = $request->is_active;
            $this->updateSortingOrder($sortingNumber, $request->sorting);
            $model->is_default = 0;
            if (isset($request->is_default) && $request->is_default)
            {
                $model->is_default = 1;
            }
            /*
             * end of code for sorting
             */
            /*
             * main save color
             */
            if ($model->save())
            { 
                // dd($request->all());

                /*
                 * Insert status Flag
                 */
                $flag = true;

                foreach ($languageList as $language)
                {
                    $subModel               = new AdminVideoDescription();
                    $video                = 'video_' . $language->id;
                    $subModel->video_id   = $model->id;
                    $subModel->video_url   = $request->video_url;
                    $subModel->video_name = $request->$video;
                    $subModel->language_id  = $language->id;

                    if (!$subModel->save())
                    {
                        $flag = false;
                    }
                }

                if ($flag)
                {
                    DB::commit();
                    $status       = 'success';
                    $message_text = Lang::get($this->langFile . '.add-success');
                    $message_text = str_replace("#module#", Lang::get($this->langFile . $this->module), $message_text);
                }
                else
                {
                    DB::rollback();
                    $status       = 'error';
                    $message_text = Lang::get($this->langFile . '.add-error');
                    $message_text = str_replace("#module#", strtolower(Lang::get($this->langFile . $this->module)), $message_text);
                }
            }
            else
            {
                DB::rollback();
                $status       = 'error';
                $message_text = Lang::get($this->langFile . '.add-error');
                $message_text = str_replace("#module#", strtolower(Lang::get($this->langFile . $this->module)), $message_text);
            }
        }
        catch (Throwable $e)
        {
            DB::rollback();
            $status       = 'error';
            $message_text = Lang::get($this->langFile . '.add-error');
            $message_text = str_replace("#module#", strtolower(Lang::get($this->langFile . $this->module)), $message_text);
        }

        return redirect()->route('admin.video.index')->with($status, $message_text);
    }

}
