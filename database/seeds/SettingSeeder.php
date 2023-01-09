<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_settings')->delete();
        DB::statement(DB::raw('ALTER TABLE admin_settings AUTO_INCREMENT = 1'));

        DB::table('admin_settings_description')->delete();
        DB::statement(DB::raw('ALTER TABLE admin_settings_description AUTO_INCREMENT = 1'));

        $data = array(
            array(
                'sorting'       => 1,
                'setting_key'   => 'App Name',
                'setting_val'   => 'Neogen Infotech',
                'description'   => 'Application/Site name',
                'img_width'     => '',
                'img_height'    => '',
                'img_size'      => '',
                'is_multi_lang' => '0',
                'is_require'    => '1',
                'can_edit'      => '1',
                'type'          => 'text',
                'validation'    => '',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ),
            array(
                'sorting'       => 2,
                'setting_key'   => 'App Logo',
                'setting_val'   => 'logo/logo.png',
                'description'   => 'Application/Site Logo (Size ' . config('custom.app_logo_width') . 'x' . config('custom.app_logo_height') . ' pixels)',
                'img_width'     => config('custom.app_logo_width'),
                'img_height'    => config('custom.app_logo_height'),
                'img_size'      => '',
                'is_multi_lang' => '0',
                'is_require'    => '0',
                'can_edit'      => '1',
                'type'          => 'file',
                'validation'    => '',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ),
            array(
                'sorting'       => 3,
                'setting_key'   => 'App Logo (For Email and Print Page in PNG Format)',
                'setting_val'   => 'logo/logo.png',
                'description'   => 'Logo to show in Mail and Print (Size ' . config('custom.app_logo_width') . 'x' . config('custom.app_logo_height') . ' pixels, Allowed Format : PNG)',
                'img_width'     => config('custom.app_logo_width'),
                'img_height'    => config('custom.app_logo_height'),
                'img_size'      => '',
                'is_multi_lang' => '0',
                'is_require'    => '0',
                'can_edit'      => '1',
                'type'          => 'file',
                'validation'    => '',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ),
            array(
                'sorting'       => 4,
                'setting_key'   => 'FavIcon',
                'setting_val'   => 'favicon/logo.ico',
                'description'   => 'Application/Site FavIcon (Size ' . config('custom.favicon_width') . 'x' . config('custom.favicon_height') . ' pixels)',
                'img_width'     => config('custom.favicon_width'),
                'img_height'    => config('custom.favicon_height'),
                'img_size'      => '',
                'is_multi_lang' => '0',
                'is_require'    => '0',
                'can_edit'      => '1',
                'type'          => 'file',
                'validation'    => '',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ),
            array(
                'sorting'       => 5,
                'setting_key'   => 'Admin Email',
                'setting_val'   => 'info@neogeninfotech.com',
                'img_width'     => '',
                'img_height'    => '',
                'img_size'      => '',
                'description'   => 'Communication Email ID of Administrator',
                'is_multi_lang' => '0',
                'is_require'    => '1',
                'can_edit'      => '1',
                'type'          => 'text',
                'validation'    => '',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ),
            array(
                'sorting'       => 6,
                'setting_key'   => 'Mail From (Sender Email)',
                'setting_val'   => 'noreply@neogeninfotech.com',
                'img_width'     => '',
                'img_height'    => '',
                'img_size'      => '',
                'description'   => 'Communication Email for order, All Email will sent from this Email ID',
                'is_multi_lang' => '0',
                'is_require'    => '1',
                'can_edit'      => '1',
                'type'          => 'text',
                'validation'    => '',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ),
            array(
                'sorting'       => 7,
                'setting_key'   => 'Footer App Name',
                'setting_val'   => '&copy #year#; Neogen Infotech',
                'description'   => 'Web Footer App Name (It will display on footer of your website, Example  : &copy; 2020 Your Site Name)',
                'img_width'     => '',
                'img_height'    => '',
                'img_size'      => '',
                'is_multi_lang' => '0',
                'is_require'    => '0',
                'can_edit'      => '1',
                'type'          => 'textarea',
                'validation'    => '',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ),
            array(
                'sorting'       => 8,
                'setting_key'   => 'Footer Company Name',
                'setting_val'   => 'Designed by <a href="http://www.neogeninfotech.com/" target="_blank">Neogen Infotech</a>',
                'description'   => 'Web Footer Company Name (It will display on footer of your website)',
                'img_width'     => '',
                'img_height'    => '',
                'img_size'      => '',
                'is_multi_lang' => '0',
                'is_require'    => '0',
                'can_edit'      => '1',
                'type'          => 'textarea',
                'validation'    => '',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ),
        );

        //Current Total 24

        DB::table('admin_settings')->insert($data);
    }

}
