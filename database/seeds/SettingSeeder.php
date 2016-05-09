<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setting')->insert([
            'slug'=>'اسم الموقع',
            'settingName'=>'site_name',
            'type'=>0,
        ]);
        
        DB::table('setting')->insert([
            'slug'=>'الصورة الافتراضية',
            'settingName'=>'no_image',
            'type'=>3,
        ]);
        
           DB::table('setting')->insert([
            'slug'=>'الصورة الرئيسية',
            'settingName'=>'main_image',
            'type'=>3,
        ]);
    }
}
