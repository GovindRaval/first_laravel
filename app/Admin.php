<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class Admin extends Authenticatable
{

    use Notifiable,
        HasRoles,
        SoftDeletes;

    protected $guard = 'admins';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'midname', 'lastname', 'email', 'address', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*
     * Boot Functions
     */

    public static function boot()
    {
        parent::boot();

        if (auth()->user())
        {
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
    }

    /*
     * Listing Function
     */

    public static function getAllData($searchText, $sortKey, $sortVal, $pageLength)
    {
        $query = Admin::orderBy($sortKey, $sortVal);
        if ($searchText)
        {
            $query->where('id', 'LIKE', '%' . $searchText . '%');
            $query->orWhere('first_name', 'LIKE', '%' . $searchText . '%');
            $query->orWhere('last_name', 'LIKE', '%' . $searchText . '%');
            $query->orWhere('email', 'LIKE', '%' . $searchText . '%');
            $query->orWhere('mobile', 'LIKE', '%' . $searchText . '%');
            $query->orWhere('login_type', 'LIKE', '%' . $searchText . '%');
            $query->orWhereDate('last_login', '=', date('Y-m-d', strtotime($searchText)));
            $query->orWhereDate('created_at', '=', date('Y-m-d', strtotime($searchText)));

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

    public static function getUserData()
    {
        return Admin::orderBy('name', 'asc')->get();
    }

    /*
     * SuperAdmin - User Role
     */

    public static function getUserDataForUserRoles()
    {
        return Admin::with('roles')->orderBy('updated_at', 'asc')->paginate(config('custom.per_page'));
    }

    
//     public function getfromToDateCountry($id,$fromDate, $toDate)
//     {
//         if ($fromDate && $toDate)
//         {
//             $fromDateFormate  = date_create_from_format('m-d-Y', $fromDate);
//             $toDateFormate    = date_create_from_format('m-d-Y', $toDate);
//             $formatedFromDate = date_format($fromDateFormate, 'Y-m-d');
//             $formateToDate    = date_format($toDateFormate, 'Y-m-d');
//             $user             = DB::table('admin_country')
//                     ->select('*')
//                     ->whereBetween('created_at', [$formatedFromDate, $formateToDate])
//                     ->get();
// //            $user = $user->whereBetween('created_at', [$formatedFromDate, $formateToDate])->where('fcm_token', '!=', NULL)->pluck('fcm_token');
//             return $user->count();
//         }
//         else
//         {
//             return 0;
//         }
//     }

}
