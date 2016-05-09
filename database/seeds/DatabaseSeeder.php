<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // $this->call(UserTableSeeder::class);
//         DB::table('users')->insert([
//            'name' => str_random(10),
//            'email' => str_random(10).'@gmail.com',
//            'password' => bcrypt('secret'),
//        ]);
        
   
//        DB::table('users')->delete();
        DB::table('users')->insert([
            'name'=>'ahmed emad',
            'email'=>'ahmed.emad2051@gmail.com',
            'password'=>bcrypt('123456'),
            'admin'=>1
        ]);
        $this->call('SettingSeeder');
//        DB::table('bus')->truncate();
//        $this->call('BusTableSeeder');
    }
}
