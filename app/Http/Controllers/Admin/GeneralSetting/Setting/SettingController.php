<?php

namespace App\Http\Controllers\Admin\GeneralSetting\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AdminModel\AdminSettings;
use App\AdminModel\AdminSettingDescription;
use Helper;
use DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{

    private $langFile = 'admin';
    private $module   = '.setting';

    public function index(Request $request)
    {
        /*
         * Get SortKey and SortOrder from helper
         */
        $sorting    = Helper::getOrderSortingColumn($request);
        $sortKey    = $sorting['sortKey'];
        $sortVal    = $sorting['sortVal'];
        $searchText = $request->q;
        $pageLength = $request->pageLength;
        $settings   = AdminSettings::getAllData($searchText, $sortKey, $sortVal, $pageLength);
        return view('admin.general-setting.setting.index', compact('settings', 'sortKey', 'sortVal', 'searchText', 'pageLength'));
    }

    public function edit(AdminSettings $setting, $id)
    {
        $record = $setting->find($id);
        if ($record && $record->can_edit)
        {
            $languageList = Helper::getLanguageList();
            return view("admin.general-setting.setting.edit", compact('record', 'languageList'));
        }
        else
        {
            $status       = 'error';
            $message_text = Lang::get($this->langFile . '.record_not_found');
            return redirect()->route('admin.general-setting.setting.index')->with($status, $message_text);
        }
    }

    public function update(Request $request, $id)
    {
        $record = AdminSettings::find($id);
        if ($record && $record->can_edit)
        {
            if ($record->is_multi_lang)
            {
                $languageList      = Helper::getLanguageList();
                $validationRules   = [];
                $validationMessage = [];
                foreach ($languageList as $language)
                {
                    $validationRules['setting_' . $record->id . '_' . $language->id]                 = ($record->is_require == 1) ? 'required' : 'nullable';
                    $message_text                                                                    = str_replace("#field#", ucfirst($record->setting_key) . ' (' . ucfirst($language->name) . ')', Lang::get($this->langFile . '.error-setting-req-field'));
                    $validationMessage['setting_' . $record->id . '_' . $language->id . ".required"] = ($record->is_require == 1) ? $message_text : '';
                }
                $validatedData = $request->validate($validationRules, $validationMessage);
            }
            else
            {
                $validationString  = ($record->is_require == 1) ? 'required' : 'nullable';
                $validationMessage = [
                    'id.required'          => Lang::get($this->langFile . '.error'),
                    'setting_val.required' => Lang::get($this->langFile . '.error-setting-req-name')
                ];
                if ($record->type == 'file')
                {
                    /*
                     * Image file validation common
                     */
                    $validationString                       .= "|image|mimes:jpeg,png,jpg,svg";
                    $validationMessage['setting_val.image'] = Lang::get($this->langFile . '.error-setting-file-type');
                    $validationMessage['setting_val.mimes'] = Lang::get($this->langFile . '.error-setting-file-mimes');
                }

                $validatedData = $request->validate([
                    'id'          => 'required',
                    'setting_val' => $validationString,
                        ], $validationMessage);
            }

            if ($request->id == $id)
            {
                DB::beginTransaction();
                try
                {
                    if ($record->is_multi_lang)
                    {
                        $updateFlag = true;

                        foreach ($languageList as $language)
                        {
                            $settingLang = AdminSettingDescription::where(['settings_id' => $id, 'language_id' => $language->id])->first();
                            if (!$settingLang)
                            {
                                $settingLang = new AdminSettingDescription;
                            }

                            $settingValLang           = "setting_" . $id . "_" . $language->id;
                            $settingLang->settings_id = $id;
                            $settingLang->language_id = $language->id;
                            $settingLang->setting_key = $record->setting_key;
                            $settingLang->setting_val = $request->$settingValLang;
                            if (!$settingLang->save())
                            {
                                $updateFlag = false;
                            }
                        }

                        if ($updateFlag)
                        {
                            DB::commit();
                            $status       = 'success';
                            $message_text = Lang::get($this->langFile . '.update-success');
                            $message_text = str_replace("#module#", Lang::get($this->langFile . $this->module), $message_text);
                        }
                        else
                        {
                            DB::rollback();
                            $status       = 'error';
                            $message_text = Lang::get($this->langFile . '.update-error');
                            $message_text = str_replace("#module#", (Lang::get($this->langFile . $this->module)), $message_text);
                        }
                    }
                    else
                    {
                        if ($record->id == 2)
                        {
                            /*
                             * Logo Upload
                             */
                            $path = Storage::disk('local')->put(config('filepath.setting_app_logo'), $request->setting_val);

                            if ($path)
                            {
                                Storage::disk('local')->delete($record->setting_val);
                                $record->setting_val = $path;
                            }
                            else
                            {
                                $status       = 'error';
                                $message_text = Lang::get($this->langFile . '.file-upload-error');
                                return redirect()->route('admin.general-setting.setting.index')->with($status, $message_text);
                            }
                        }
                        else if ($record->id == 3)
                        {
                            /*
                             * Favicon Upload
                             */
                            $path = Storage::disk('local')->put(config('filepath.setting_favicon'), $request->setting_val);

                            if ($path)
                            {
                                Storage::disk('local')->delete($record->setting_val);
                                $record->setting_val = $path;
                            }
                            else
                            {
                                $status       = 'error';
                                $message_text = Lang::get($this->langFile . '.file-upload-error');
                                return redirect()->route('admin.general-setting.setting.index')->with($status, $message_text);
                            }
                        }
                        else if ($record->type == 'file')
                        {
                            /*
                             * Other File Upload
                             */
                            $path = Storage::disk('local')->put(config('filepath.setting_other'), $request->setting_val);

                            if ($path)
                            {
                                Storage::disk('local')->delete($record->setting_val);
                                $record->setting_val = $path;
                            }
                            else
                            {
                                $status       = 'error';
                                $message_text = Lang::get($this->langFile . '.file-upload-error');
                                return redirect()->route('admin.general-setting.setting.index')->with($status, $message_text);
                            }
                        }
                        else
                        {
                            $record->setting_val = $request->setting_val;
                        }

                        if ($record->save())
                        {
                            DB::commit();
                            $status       = 'success';
                            $message_text = Lang::get($this->langFile . '.update-success');
                            $message_text = str_replace("#module#", Lang::get($this->langFile . $this->module), $message_text);
                        }
                        else
                        {
                            DB::rollback();
                            $status       = 'error';
                            $message_text = Lang::get($this->langFile . '.update-error');
                            $message_text = str_replace("#module#", (Lang::get($this->langFile . $this->module)), $message_text);
                        }
                    }
                }
                catch (Throwable $e)
                {
                    DB::rollback();
                    $status       = 'error';
                    $message_text = Lang::get($this->langFile . '.update-error');
                    $message_text = str_replace("#module#", (Lang::get($this->langFile . $this->module)), $message_text);
                }
            }
            else
            {
                $status       = 'error';
                $message_text = Lang::get($this->langFile . '.error');
            }
        }
        else
        {
            $status       = 'error';
            $message_text = Lang::get($this->langFile . '.record_not_found');
        }

        return redirect()->route('admin.general-setting.setting.index')->with($status, $message_text);
    }

    public function editSetting()
    {
        $languageList = Helper::getLanguageList();
        $radioValue   = config('admin.setting.cod');
        $settings     = AdminSettings::getAllData('', 'sorting', 'asc', 'ALL');
        return view('admin.general-setting.setting.edit_setting', compact('settings', 'languageList', 'radioValue'));
    }

    public function updateSetting(Request $request)
    {
        $settings = AdminSettings::getAllData('', 'sorting', 'asc', 'ALL');

        $validationRules   = [];
        $validationMessage = [];

        /*
         * Dynamic validation
         */
        foreach ($settings as $record)
        {
            if (!$record->is_multi_lang)
            {
                $validationRules['setting_' . $record->id]                 = ($record->is_require == 1) ? 'required' : 'nullable';
                $validationMessage['setting_' . $record->id . ".required"] = ($record->is_require == 1) ? Lang::get($this->langFile . '.error-setting-req-name') : '';

                if ($record->type == 'file' && $record->id != 25)
                {
                    /*
                     * Image file validation common
                     */
                    $validationRules['setting_' . $record->id]              .= "|image|mimes:jpeg,png,jpg,svg";
                    $validationMessage['setting_' . $record->id . '.image'] = Lang::get($this->langFile . '.error-setting-file-type');
                    $validationMessage['setting_' . $record->id . '.mimes'] = Lang::get($this->langFile . '.error-setting-file-mimes');
                }
                else if ($record->type == 'file' && $record->id == 25)
                {
                    /*
                     * Image file validation common
                     */
                    $validationRules['setting_' . $record->id]              .= "|image|mimes:png";
                    $validationMessage['setting_' . $record->id . '.image'] = Lang::get($this->langFile . '.error-setting-file-type');
                    $validationMessage['setting_' . $record->id . '.mimes'] = Lang::get($this->langFile . '.error-setting-file-mimes-png');
                }
                if ($record->id == 2)
                {
                    /*
                     * Logo, Dimention 174x148
                     */
                    $height = config('custom.app_logo_height');
                    $width  = config('custom.app_logo_width');

                    //$validationRules['setting_' . $record->id]                   .= '|dimensions:width=' . $width . ',height=' . $height;
                    $validationMessage['setting_' . $record->id . '.size']       = Lang::get($this->langFile . '.error-setting-size-favicon');
                    $validationMessage['setting_' . $record->id . '.dimensions'] = Lang::get($this->langFile . '.error-setting-dimention-favicon');
                }
                if ($record->id == 3)
                {
                    /*
                     * Favicon validation - Size 1KB, Dimention 16x16
                     */
                    $height = config('custom.favicon_height');
                    $width  = config('custom.favicon_width');

                    $validationRules['setting_' . $record->id]                   .= '|dimensions:width=' . $width . ',height=' . $height;
                    $validationMessage['setting_' . $record->id . '.size']       = Lang::get($this->langFile . '.error-setting-size-favicon');
                    $validationMessage['setting_' . $record->id . '.dimensions'] = Lang::get($this->langFile . '.error-setting-dimention-favicon');
                }
            }
        }

        /*
         * Language wise Field Validation
         */
        $languageList = Helper::getLanguageList();

        foreach ($languageList as $language)
        {
            foreach ($settings as $record)
            {
                if ($record->is_multi_lang)
                {
                    $validationRules['setting_' . $record->id . '_' . $language->id]                 = ($record->is_require == 1) ? 'required' : 'nullable';
                    $message_text                                                                    = str_replace("#field#", ucfirst($record->setting_key) . ' (' . ucfirst($language->name) . ')', Lang::get($this->langFile . '.error-setting-req-field'));
                    $validationMessage['setting_' . $record->id . '_' . $language->id . ".required"] = ($record->is_require == 1) ? $message_text : '';
                }
            }
        }

        /*
         * Validattion
         */
        $validatedData = $request->validate($validationRules, $validationMessage);
        $formData      = $request->except("_token");
        $updateFlag    = true;
        DB::beginTransaction();
        try
        {
            foreach ($formData as $key => $val)
            {
                $key = explode("_", $key);
                if (isset($key[1]))
                {
                    $id      = $key[1];
                    $setting = AdminSettings::find($id);
                    if ($setting && $setting->can_edit)
                    {
                        if ($setting->is_multi_lang)
                        {
                            foreach ($languageList as $language)
                            {
                                $settingLang = AdminSettingDescription::where(['settings_id' => $id, 'language_id' => $language->id])->first();
                                if (!$settingLang)
                                {
                                    $settingLang = new AdminSettingDescription;
                                }

                                $settingValLang           = "setting_" . $id . "_" . $language->id;
                                $settingLang->settings_id = $id;
                                $settingLang->language_id = $language->id;
                                $settingLang->setting_key = $setting->setting_key;
                                $settingLang->setting_val = $request->$settingValLang;
                                if (!$settingLang->save())
                                {
                                    $updateFlag = false;
                                }
                            }
                        }
                        else
                        {
                            if ($setting->type == 'file')
                            {
                                if (isset($key[1]) && ($key[1] == 2 ))
                                {
                                    $id = $key[1];
                                    /*
                                     * Logo Upload
                                     */

                                    $path = Storage::disk('local')->put(config('filepath.setting_app_logo'), $val);
                                }
                                else if (isset($key[1]) && ($key[1] == 3 ))
                                {
                                    $id = $key[1];
                                    /*
                                     * FavIcon Upload
                                     */

                                    $path = Storage::disk('local')->put(config('filepath.setting_favicon'), $val);
                                }
                                else
                                {
                                    $path = Storage::disk('local')->put(config('filepath.setting_other'), $val);
                                }

                                if ($path)
                                {
                                    Storage::disk('local')->delete($setting->setting_val);
                                    $setting->setting_val = $path;
                                    if (!$setting->save())
                                    {
                                        $updateFlag = false;
                                    }
                                }
                                else
                                {
                                    $status       = 'error';
                                    $message_text = Lang::get($this->langFile . '.file-upload-error');
                                    return redirect()->route('admin')->with($status, $message_text);
                                }
                            }
                            else
                            {
                                $setting->setting_val = $val;
                                if (!$setting->save())
                                {
                                    $updateFlag = false;
                                }
                            }
                        }
                    }
                    else
                    {
                        $updateFlag = false;
                    }
                }
            }
        }
        catch (Throwable $e)
        {
            DB::rollback();
            $status       = 'error';
            $message_text = Lang::get($this->langFile . '.update-error');
            $message_text = str_replace("#module#", (Lang::get($this->langFile . $this->module)), $message_text);
        }

        if ($updateFlag)
        {
            DB::commit();
            $status       = 'success';
            $message_text = Lang::get($this->langFile . '.update-success');
            $message_text = str_replace("#module#", (Lang::get($this->langFile . $this->module)), $message_text);
        }

        return redirect()->route('admin.general-setting.setting.index')->with($status, $message_text);
    }

}
