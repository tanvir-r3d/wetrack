<?php

use Illuminate\Database\Seeder;
use App\Company;
class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 30; $i++) { 
            Company::insert([
            'com_logo' => Str::random(10),
            'com_name' => Str::random(10),
            'com_details' => Str::random(100),
        ]);
        }
    }
}
