<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrator',
            'last_name' => 'News',
            'email'  => 'administrator@test.com',
            'password' => bcrypt('S0PADMIN123'),
            'admin'  => 1,
            'status'  => 1,
            'token'  => 'OGueYDlgb7vuGovcxiAe35mN6AcyzPNgWSNldSuD',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        
    }
}
