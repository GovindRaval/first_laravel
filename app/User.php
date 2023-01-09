<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\UserModel\UserAddress;

class User extends Authenticatable
{

    protected $guard = 'web';

    use Notifiable,
        HasRoles,
        SoftDeletes;

    protected $table   = "users";
    protected $guarded = ['created_at,updated_at,deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
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
        $query = User::orderBy($sortKey, $sortVal);
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

    public static function getUserList()
    {
        return User::orderBy('name', 'asc')->get();
    }
    
    public static function getUserData()
    {
        return User::orderBy('updated_at', 'asc')->get();
    }

    public static function getStudentData($studentId = "")
    {
        $query = AdminOfferStep1::whereNotNull('student_id')->orderBy('updated_at', 'desc');
        if ($studentId)
        {
            $query->where('student_id', $studentId);
        }

        return $query->get();
    }

    public static function getNewCustomers()
    {
        return User::orderBy('id', 'desc')->skip(0)->take(10)->get();
    }

//    public function getUserAddress()
//    {
//        return $this->hasMany(UserAddress::class, 'user_id', 'id')->get();
//    }

    public function getCountryDescription($languageId = "", $getAll = false)
    {

        $query = $this->hasMany('App\AdminModel\AdminCountryDescription', 'country_id', 'country');
        if ($languageId)
        {
            $query->where('language_id', $languageId);
        }
        return $getAll ? $query->get() : $query->first();
    }

    /*
     * SuperAdmin - User Role
     */

    public static function getUserDataForUserRoles()
    {
        return User::with('roles')->orderBy('updated_at', 'asc')->paginate(config('custom.per_page'));
    }

}
