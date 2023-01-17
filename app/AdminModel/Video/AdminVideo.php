<?php

namespace App\AdminModel\Video;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
class AdminVideo extends Model
{
    use SoftDeletes;

    protected $table   = 'admin_video';
    protected $guarded = ['created_at,updated_at,deleted_at'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($data)
        {
            $data->created_by = auth()->user()->id;
         
        });

        static::updating(function ($data)
        {
            $data->updated_by = auth()->user()->id;
        });

        static::deleting(function ($data)
        {
            $data->deleted_by = auth()->user()->id;
            $data->save();
        });
    }

      /*
     * sorting
     */

     public function getSortingNumber()
     {
         return $this->max('sorting');
     }
 
     public function getAllData($searchText = '', $sortKey = '', $sortVal = '', $pageLength)
     {
         switch ($sortKey)
         {
             /*
              * if sortkey = title
              */
             case 'video_name':
                 $record = $this->sortByTitle($sortKey, $sortVal);
                 $record = implode(",", $record);
                 $query  = $this->orderByRaw("FIELD(id, $record)");
                 break;
             case 'video_url':
                 $record = $this->sortByName($sortKey, $sortVal);
                 $record = implode(",", $record);
                 $query  = $this->orderByRaw("FIELD(id, $record)");
                 break;
             default:
                 $query  = $this->orderBy($sortKey, $sortVal);
         }
 
         if ($searchText)
         {
             $query->where(function ($query) use ($searchText)
             {
                 $query->orWhere('sorting', 'LIKE', '%' . $searchText . '%');
                 /*
                  * Search by category
                  */
                 $record = $this->searchbByName($searchText);
                 if ($record)
                 {
                     $query->orWhereIn('id', $record);
                 }
                 /*
                  * Search by Active/Inactive Keyword
                  */
                 if (strtolower($searchText) == 'active')
                 {
                     $query->orWhere('is_active', 1);
                 }
                 if (strtolower($searchText) == 'inactive')
                 {
                     $query->orWhere('is_active', 0);
                 }
             });
         }
         if ($pageLength)
         {
             $paginate = strtolower($pageLength) == 'all' ? $query->count() : $pageLength;
         }
         else
         {
             $paginate = config('custom.per_page', 10);
         }
         return $query->paginate($paginate);
     }

     public function sortByTitle($sortKey, $sortVal){
        return AdminVideoDescription::orderBy('video_name', $sortVal)->pluck('video_id')->toArray();
     }
     public function sortByName($sortKey, $sortVal){
        return AdminVideoDescription::orderBy('video_url',$sortVal)->pluck('video_id')->toArray();
     }
     public function searchbByName($searchText){
        return AdminVideoDescription::where('video_name','LIKE','%'.$searchText.'%')->pluck('video_id');
     }
     public function GetVideoDescription($languageId="1 ",$getall= false){

        $query = $this->hasMany('App\AdminModel\Video\AdminVideoDescription', 'video_id', 'id');

        if($languageId){
            $query->where('language_id',$languageId);
        }
        return $getall?$query->get():$query->first();

     }
     public static function getvideocountfromtoDate($fromDate,$toDate){
        if ($fromDate && $toDate)
        {
            $fromDateFormate  = date_create_from_format('m-d-Y', $fromDate);
            $toDateFormate    = date_create_from_format('m-d-Y', $toDate);
            $formatedFromDate = date_format($fromDateFormate, 'Y-m-d');
            $formateToDate    = date_format($toDateFormate, 'Y-m-d');
            $user             = DB::table('admin_video')
                    ->select('*')
                    ->whereBetween('created_at', [$formatedFromDate, $formateToDate])
                    ->get();
                    // dd($user);
//            $user = $user->whereBetween('created_at', [$formatedFromDate, $formateToDate])->where('fcm_token', '!=', NULL)->pluck('fcm_token');
            return $user->count();
        }
        else
        {
            return 0;
        }
     }
}
