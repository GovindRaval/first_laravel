<?php

namespace App\Helpers;

use App\AdminModel\AdminSettings;
use App\AdminModel\AdminSettingDescription;
use App\AdminModel\AdminLanguage;
use Illuminate\Support\Facades\Storage;
use Auth;
use Session;

class Helper
{

    public static function getOrderColumn($request, $defaultKey = "", $defaultVal = "")
    {
        $sortKey      = $defaultKey ? $defaultKey : "id";
        $sortVal      = $defaultVal ? $defaultVal : "asc";
        $requestParam = $request->except('q');
        foreach ($requestParam as $key => $val)
        {
            if ($val == 'asc' || $val == 'desc')
            {
                $sortKey = $key;
                $sortVal = $val;
                break;
            }
        }

        return [
            'sortKey' => $sortKey,
            'sortVal' => $sortVal
        ];
    }

    public static function getOrderSortingColumn($request)
    {
        $sortKey      = "sorting";
        $sortVal      = "asc";
        $requestParam = $request->except('q');
        foreach ($requestParam as $key => $val)
        {
            if ($val == 'asc' || $val == 'desc')
            {
                $sortKey = $key;
                $sortVal = $val;
                break;
            }
        }

        return [
            'sortKey' => $sortKey,
            'sortVal' => $sortVal
        ];
    }

    public static function getSetting()
    {
        return AdminSettings::all();
    }

    public static function getSettingById($id, $languageID = false)
    {
        $record = AdminSettings::find($id);

        if ($record && $languageID && $record->is_multi_lang)
        {
            return AdminSettingDescription::where('settings_id', $id)->where('language_id', $languageID)->first();
        }
        else
        {
            return $record;
        }
    }

    public static function getAppName($languageID = 1)
    {
        $record = AdminSettings::find(1);

        if ($record && $languageID && $record->is_multi_lang)
        {
            $record = AdminSettingDescription::where('settings_id', $record->id)->where('language_id', $languageID)->first();
            return $record ? $record->setting_val : config('app.name');
        }
        else if ($record)
        {
            return $record ? $record->setting_val : config('app.name');
        }

        return config('app.name');
    }

    public static function getAppLogo($isEmailLogo = false)
    {
        if ($isEmailLogo)
        {
            $record = AdminSettings::find(3);
        }
        else
        {
            $record = AdminSettings::find(2);
        }

        if ($record)
        {
            return $record = asset(Storage::url($record->setting_val));
        }
        else
        {
            return asset(Storage::url('default.png'));
        }
    }

    public static function getUserProfilePicture()
    {
        return Auth::user()->profile_picture ? asset(Storage::url(Auth::user()->profile_picture)) : asset(Storage::url('profile/user.png'));
    }

    public static function getFavIcon()
    {
        $record = AdminSettings::find(4);

        if ($record)
        {
            return $record = asset(Storage::url($record->setting_val));
        }
        return '';
    }

    public static function getLanguageList()
    {
        return AdminLanguage::getLanguageList();
    }

    public static function getLanguage()
    {
        if (Session::get('locale'))
        {
            $language = Session::get('locale');
        }
        else
        {
            $language = Config::get('app.locale');
        }

        $languagedata = AdminLanguage::where('code', $language)->first();

        if ($languagedata)
        {
            return $languagedata;
        }
        return false;
    }

    public static function slugify($slug)
    {
// replace non letter or digits by -
        $slug = preg_replace('~[^\pL\d]+~u', '-', $slug);

// transliterate
        if (function_exists('iconv'))
        {
            $slug = iconv('utf-8', 'us-ascii//TRANSLIT', $slug);
        }

// remove unwanted characters
        $slug = preg_replace('~[^-\w]+~', '', $slug);

// trim
        $slug = trim($slug, '-');

// remove duplicate -
        $slug = preg_replace('~-+~', '-', $slug);

// lowercase
        $slug = strtolower($slug);

        if (empty($slug))
        {
            return 'n-a';
        }

        return $slug;
    }

    public static function paginationDropdown()
    {
        return [10, 25, 50, 100, 'ALL'];
    }

    public static function changeOrder($model, $sorting, $order)
    {
        $currentSorting = [];
        foreach ($sorting as $k => $v)
        {
            $currentSorting[] = $v['sorting_id'];
        }

        if ($order == 'asc')
        {
            sort($currentSorting);
        }
        else
        {
            rsort($currentSorting);
        }

        $i = 0;

        foreach ($sorting as $v)
        {
            $updateOrder          = $model->find($v['id']);
            $updateOrder->sorting = $currentSorting[$i];
            $updateOrder->save();
            $i++;
        }
        return true;
    }

    public static function formatNumber($number)
    {
        return number_format((float) $number, 2, '.', '');
    }

}
