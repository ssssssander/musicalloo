<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => config('app.super_admin_name'),
            'email' => config('app.super_admin_email'),
            'password' => bcrypt(config('app.super_admin_password'))
        ]);
    }
}
