<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        User::create([
            'id' => 1,
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password')]);
    }
}
