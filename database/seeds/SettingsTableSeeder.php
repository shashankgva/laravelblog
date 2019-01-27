<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
        	'site_name' => 'Laravel Blog',
        	'address' => 'BNG',
        	'contact_number' => '9393939393',
        	'contact_email' => 'info@laravel.com'
        ]);
    }
}
