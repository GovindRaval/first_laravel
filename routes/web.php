<?php

use Illuminate\Support\Facades\Route;

Route::fallback(function()
{
    return response()->view('errors.404', [], 404);
});

Route::get("/admin", function()
{
    return redirect(route('admin.home.index')); //Temporary Redirect
})->name('admin.index');
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['guest:admin']], function ()
{
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('login');
    Route::get('/forgot-password', 'Auth\AdminLoginController@forgotPassword')->name('forgot-password');
    Route::get('/reset-password', 'Auth\AdminLoginController@resetPasswordPage')->name('reset-password');
    Route::post('/reset-password', 'Auth\AdminLoginController@resetPassword')->name('reset-password');
    Route::post('/send-reset-link', 'Auth\AdminLoginController@sendResetLink')->name('send-reset-link');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('login');
});
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth:admin']], function ()
{
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('logout');
});

Route::group(['namespace' => 'SuperAdmin', 'middleware' => ['can:' . config('custom_middleware.view_super_admin'), 'auth:admin'], 'prefix' => 'super-admin', 'as' => 'super-admin.'], function ()
{
    Route::group(['namespace' => 'Authorization'], function ()
    {
        Route::group(['prefix' => 'role', 'as' => 'role.', 'middleware' => ['can:' . config('custom_middleware.view_super_admin_role')]], function ()
        {
            $default    = "index";
            $controller = "RoleController@";

            Route::get('/index', ['middleware' => ['can:' . config('custom_middleware.view_super_admin_role')], 'uses' => $controller . $default])->name('index'); //Default Page
            Route::get('/add', ['middleware' => ['can:' . config('custom_middleware.create_super_admin_role')], 'uses' => $controller . 'create'])->name('add'); //Add Form
            Route::post('/add', ['middleware' => ['can:' . config('custom_middleware.create_super_admin_role')], 'uses' => $controller . 'store'])->name('add'); //Save 
            Route::get('/edit/{id}', ['middleware' => ['can:' . config('custom_middleware.edit_super_admin_role')], 'uses' => $controller . 'edit'])->name('edit'); //Edit Page
            Route::post('/update/{id}', ['middleware' => ['can:' . config('custom_middleware.edit_super_admin_role')], 'uses' => $controller . 'update'])->name('update'); //Update 
            Route::get('/delete/{id}', ['middleware' => ['can:' . config('custom_middleware.delete_super_admin_role')], 'uses' => $controller . 'delete'])->name('delete'); //Update 
        });
        Route::group(['prefix' => 'permission', 'as' => 'permission.', 'middleware' => ['can:' . config('custom_middleware.view_super_admin_permission')]], function ()
        {
            $default    = "index";
            $controller = "PermissionController@";
            Route::get('/{search?}', ['middleware' => ['can:' . config('custom_middleware.view_super_admin_permission')], 'uses' => $controller . $default])->name('index'); //Default Page
            /* Not in Use
              Route::post('/add', $controller . 'create')->name('add'); //Add new
              Route::get('/edit/{id}', $controller . 'edit')->name('edit'); //Edit Page
              Route::post('/update/{id}', $controller . 'update')->name('update'); //Update
              Route::post('/delete', $controller . 'delete')->name('delete'); //Update
             * 
             */
        });
        Route::group(['prefix' => 'role-permission', 'as' => 'role-permission.', 'middleware' => ['can:' . config('custom_middleware.view_super_admin_role_permission')]], function ()
        {
            $default    = "index";
            $controller = "RolePermissionController@";
            Route::get('/', ['middleware' => ['can:' . config('custom_middleware.view_super_admin_role_permission')], 'uses' => $controller . $default])->name('index'); //Default Page
            Route::post('/save', ['middleware' => ['can:' . config('custom_middleware.create_super_admin_role_permission')], 'uses' => $controller . 'saveRolePermission'])->name('save'); //Save Role-Permission
            Route::get('/view-role-permission/{id}', ['middleware' => ['can:' . config('custom_middleware.view_super_admin_role_permission')], 'uses' => $controller . 'viewPermission'])->name('view'); //View Permission
            Route::post('/update-role-permission/{id}', ['middleware' => ['can:' . config('custom_middleware.edit_super_admin_role_permission')], 'uses' => $controller . 'updateRolePermission'])->name('update'); //Update Role Permission
        });
        Route::group(['prefix' => 'user-role', 'as' => 'user-role.', 'middleware' => ['can:' . config('custom_middleware.view_super_admin_user_role')]], function ()
        {
            $default    = "index";
            $controller = "UserRoleController@";
            Route::get('/', ['middleware' => ['can:' . config('custom_middleware.view_super_admin_user_role')], 'uses' => $controller . $default])->name('index'); //Default Page
            Route::get('/change-user-role/{id}', ['middleware' => ['can:' . config('custom_middleware.edit_super_admin_user_role')], 'uses' => $controller . 'changeRole'])->name('change-role'); //Change User Role
            Route::post('/update', ['middleware' => ['can:' . config('custom_middleware.edit_super_admin_user_role')], 'uses' => $controller . 'updateRole'])->name('update'); //Change User Role
            Route::get('/bulk-assign', ['middleware' => ['can:' . config('custom_middleware.create_super_admin_user_role')], 'uses' => $controller . 'bulkAssign'])->name('bulkAssign'); //bulkAssign
            Route::post('/save', ['middleware' => ['can:' . config('custom_middleware.create_super_admin_user_role')], 'uses' => $controller . 'saveUserRole'])->name('save'); //Save User-Role
            Route::get('update-role/{id}', ['middleware' => ['can:' . config('custom_middleware.edit_super_admin_user_role')], 'uses' => $controller . 'updateRole'])->name('update-role'); //update Role
        });
    });
});

Route::group(['namespace' => 'Admin', 'middleware' => ['can:' . config('custom_middleware.view_admin'), 'auth:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function ()
{
    //Home-Dashboard
    Route::group(['namespace' => 'Home', 'prefix' => 'home', 'as' => 'home.', 'middleware' => ['can:' . config('custom_middleware.view_dashboard')]], function ()
    {
        $default    = "index";
        $controller = "HomeController@";
        Route::get('/', $controller . $default)->name('index'); //Default Page
    });
    //Profile
    Route::group(['namespace' => 'Home', 'prefix' => 'home', 'as' => 'home.', 'middleware' => ['can:' . config('custom_middleware.view_profile')]], function ()
    {
        $default    = "index";
        $controller = "HomeController@";
        Route::get('/profile', ['middleware' => ['can:' . config('custom_middleware.view_profile')], 'uses' => $controller . 'profile'])->name('profile'); //Profile
        Route::get('/edit-profile', ['middleware' => ['can:' . config('custom_middleware.edit_profile')], 'uses' => $controller . 'editProfile'])->name('edit-profile'); //Edit Profile
        Route::post('/updtate-profile', ['middleware' => ['can:' . config('custom_middleware.edit_profile')], 'uses' => $controller . 'updateProfile'])->name('update-profile'); //Update Profile
        Route::get('/change-password', ['middleware' => ['can:' . config('custom_middleware.edit_profile')], 'uses' => $controller . 'changePassword'])->name('change-password'); // Edit
        Route::post('/update-password', ['middleware' => ['can:' . config('custom_middleware.edit_profile')], 'uses' => $controller . 'updatePassword'])->name('update-password'); // Update
    });
    //Video
    Route::group(['namespace' => 'Video', 'prefix' => 'video', 'as' => 'video.', 'middleware' => ['can:' . config('custom_middleware.view_video')]], function ()
    {
        $default    = "index";
        $controller = "VideoController@";
        Route::get('/', ['middleware' => ['can:' . config('custom_middleware.view_video')], 'uses' => $controller . 'index'])->name('index'); //Profile
        Route::get('/add', ['middleware' => ['can:' . config('custom_middleware.create_video')], 'uses' => $controller . 'create'])->name('add'); //Add Form
        Route::post('/add', ['middleware' => ['can:' . config('custom_middleware.create_video')], 'uses' => $controller . 'store'])->name('store'); //Add Form
        //Edit Profile
        // Route::post('/updtate-profile', ['middleware' => ['can:' . config('custom_middleware.edit_profile')], 'uses' => $controller . 'updateProfile'])->name('update-profile'); //Update Profile
        // Route::get('/change-password', ['middleware' => ['can:' . config('custom_middleware.edit_profile')], 'uses' => $controller . 'changePassword'])->name('change-password'); // Edit
        // Route::post('/update-password', ['middleware' => ['can:' . config('custom_middleware.edit_profile')], 'uses' => $controller . 'updatePassword'])->name('update-password'); // Update
    });

    if (false)
    {
        Route::group(['namespace' => 'Language', 'prefix' => 'language', 'as' => 'language.', 'middleware' => ['can:' . config('custom_middleware.view_language')]], function ()
        {
            $default    = "index";
            $controller = "LanguageController@";
            Route::get('/', ['middleware' => ['can:' . config('custom_middleware.view_language')], 'uses' => $controller . $default])->name('index'); //Default Page
            Route::get('/add', ['middleware' => ['can:' . config('custom_middleware.create_language')], 'uses' => $controller . 'create'])->name('add'); //Add Form
            Route::post('/add', ['middleware' => ['can:' . config('custom_middleware.create_language')], 'uses' => $controller . 'store'])->name('add'); //Save 
            Route::get('/edit/{id}', ['middleware' => ['can:' . config('custom_middleware.edit_language')], 'uses' => $controller . 'edit'])->name('edit'); //Edit Unique Record
            Route::post('/update/{id}', ['middleware' => ['can:' . config('custom_middleware.edit_language')], 'uses' => $controller . 'update'])->name('update'); //Update Unique Record
            Route::post('/default', ['middleware' => ['can:' . config('custom_middleware.edit_language')], 'uses' => $controller . 'setDefault'])->name('default'); //Save 
        });
    }

    /*
     * Master
     */
    Route::group(['namespace' => 'Master', 'prefix' => 'master', 'as' => 'master.', 'middleware' => ['can:' . config('custom_middleware.view_master')]], function ()
    {
        Route::group(['namespace' => 'Country', 'prefix' => 'country', 'as' => 'country.', 'middleware' => ['can:' . config('custom_middleware.view_master_country')]], function ()
        {
            $default    = "index";
            $controller = "CountryController@";

            Route::get('/', ['middleware' => ['can:' . config('custom_middleware.view_master_country')], 'uses' => $controller . $default])->name('index'); //Default Page
            Route::get('/add', ['middleware' => ['can:' . config('custom_middleware.create_master_country')], 'uses' => $controller . 'create'])->name('add'); //Add Form
            Route::post('/add', ['middleware' => ['can:' . config('custom_middleware.create_master_country')], 'uses' => $controller . 'store'])->name('add'); //Add Form
            Route::get('/edit/{id}', ['middleware' => ['can:' . config('custom_middleware.edit_master_country')], 'uses' => $controller . 'edit'])->name('edit'); //Add Form
            Route::post('/update/{id}', ['middleware' => ['can:' . config('custom_middleware.edit_master_country')], 'uses' => $controller . 'update'])->name('update'); //Add Form
            Route::get('/delete/{id}', ['middleware' => ['can:' . config('custom_middleware.delete_master_country')], 'uses' => $controller . 'delete'])->name('delete'); //Delete
            Route::get('/change-status/{id}/{active}', ['middleware' => ['can:' . config('custom_middleware.edit_master_country')], 'uses' => $controller . 'changeStatus'])->name('change-status'); //Change Status
            Route::get('/export-country', ['middleware' => ['can:' . config('custom_middleware.view_master_country')], 'uses' => $controller . 'exportCountryData'])->name('export-country'); //export excel
        });

        Route::group(['namespace' => 'City', 'prefix' => 'city', 'as' => 'city.', 'middleware' => ['can:' . config('custom_middleware.view_master_city')]], function ()
        {
            $default    = "index";
            $controller = "CityController@";

            Route::get('/', ['middleware' => ['can:' . config('custom_middleware.view_master_city')], 'uses' => $controller . $default])->name('index'); //Default Page
            Route::get('/add', ['middleware' => ['can:' . config('custom_middleware.create_master_city')], 'uses' => $controller . 'create'])->name('add'); //Add Form
            Route::post('/add', ['middleware' => ['can:' . config('custom_middleware.create_master_city')], 'uses' => $controller . 'store'])->name('add'); //Add Form
            Route::get('/edit/{id}', ['middleware' => ['can:' . config('custom_middleware.edit_master_city')], 'uses' => $controller . 'edit'])->name('edit'); //Edit Form
            Route::post('/update/{id}', ['middleware' => ['can:' . config('custom_middleware.edit_master_city')], 'uses' => $controller . 'update'])->name('update'); //Update
            Route::get('/delete/{id}', ['middleware' => ['can:' . config('custom_middleware.delete_master_city')], 'uses' => $controller . 'delete'])->name('delete'); //Delete
            Route::get('/change-status/{id}/{active}', ['middleware' => ['can:' . config('custom_middleware.edit_master_city')], 'uses' => $controller . 'changeStatus'])->name('change-status'); //Change Status
            Route::get('/export-city', ['middleware' => ['can:' . config('custom_middleware.view_master_city')], 'uses' => $controller . 'exportCityData'])->name('export-city'); //export city
        });
    });
    /*
     * /.Master
     */

    /*
     * General Setting
     */

    Route::group(['namespace' => 'GeneralSetting', 'prefix' => 'general-setting', 'as' => 'general-setting.', 'middleware' => ['can:' . config('custom_middleware.view_general_setting')]], function ()
    {
        Route::group(['namespace' => 'Setting', 'prefix' => 'setting', 'as' => 'setting.', 'middleware' => ['can:' . config('custom_middleware.view_general_setting_setting')]], function ()
        {
            $default    = "index";
            $controller = "SettingController@";
            Route::get('/', ['middleware' => ['can:' . config('custom_middleware.view_general_setting_setting')], 'uses' => $controller . $default])->name('index'); //Default Page
            Route::get('/edit', ['middleware' => ['can:' . config('custom_middleware.edit_general_setting_setting')], 'uses' => $controller . 'editSetting'])->name('edit-setting'); //Edit All
            Route::post('/update', ['middleware' => ['can:' . config('custom_middleware.edit_general_setting_setting')], 'uses' => $controller . 'updateSetting'])->name('update-setting'); //Update All
            Route::get('/edit/{id}', ['middleware' => ['can:' . config('custom_middleware.edit_general_setting_setting')], 'uses' => $controller . 'edit'])->name('edit'); //Edit Unique Record
            Route::post('/update/{id}', ['middleware' => ['can:' . config('custom_middleware.edit_general_setting_setting')], 'uses' => $controller . 'update'])->name('update'); //Update Unique Record
        });
    });
});

/*
 * Table Change Order - Common Function
 */
Route::group(['prefix' => 'common', 'as' => 'sorting.', 'middleware' => ['auth:admin']], function ()
{
    $controller = "CommonController@";
    Route::post('/change-table-order', ['middleware' => [], 'uses' => $controller . 'changeOrder'])->name('change-order'); //Change Order
});

/*
 * **********************************************************************************************************************************************
 * ******************************************************************* WEB **********************************************************************
 * **********************************************************************************************************************************************
 */

Route::group(['namespace' => 'Web', 'as' => 'web.'], function ()
{
    Route::group(['namespace' => 'User', 'as' => 'user.'], function ()
    {
        $default    = "index";
        $controller = "LoginController@";
        Route::get('/login', ['uses' => $controller . 'showLoginForm'])->name('login'); //login Page
        Route::post('/login', ['uses' => $controller . 'login'])->name('login'); //login
        Route::get('/logout', ['uses' => $controller . 'logout'])->name('logout');
    });
    Route::group(['namespace' => 'Home'], function ()
    {
        $default    = "index";
        $controller = "HomeController@";
        Route::get('/', ['uses' => $controller . $default])->name('index'); //Default Page
        Route::get('/change-language/{id}', ['uses' => $controller . 'changeLanguage'])->name('change_language'); //Default Page
        Route::post('/recent-order', ['uses' => $controller . 'getLatestOrder'])->name('recent-order-home'); //Default Page
    });
});


/*
 * **********************************************************************************************************************************************
 * ****************************************************************** /.WEB **********************************************************************
 * **********************************************************************************************************************************************
 */

Route::get("/artisan-command", function()
{
    Illuminate\Support\Facades\Artisan::call('cache:clear');
    Illuminate\Support\Facades\Artisan::call('view:clear');
    Illuminate\Support\Facades\Artisan::call('route:clear');
//    Illuminate\Support\Facades\Artisan::call('storage:link');
//    Illuminate\Support\Facades\Artisan::call('migrate:refresh');
//    Illuminate\Support\Facades\Artisan::call('db:seed');
});
