<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	User::create(
            [
                'role_id' => '1',
                'name' => 'Super User',
                'email' => 'superuser@bembosex.com',
                'password' => Hash::make('root'),
            ]
        );
        User::create(
            [
                'role_id' => '2',
                'name' => 'Admin User',
                'email' => 'adminuser@bembosex.com',
                'password' => Hash::make('root'),
            ]
        );
        User::create(
            [
                'role_id' => '3',
                'name' => 'Esc  User',
                'email' => 'escortuser@bembosex.com',
                'password' => Hash::make('root'),
            ]
        );
        User::create(
            [
                'role_id' => '4',
                'name' => 'Ga  User',
                'email' => 'gayuser@bembosex.com',
                'password' => Hash::make('root'),
            ]
        );
        User::create(
            [
                'role_id' => '5',
                'name' => 'Tra  User',
                'email' => 'transuser@bembosex.com',
                'password' => Hash::make('root'),
            ]
        );
        User::create(
            [
                'role_id' => '6',
                'name' => 'Agen  User',
                'email' => 'agencyuser@bembosex.com',
                'password' => Hash::make('root'),
            ]
        );
        User::create(
            [
                'role_id' => '7',
                'name' => 'Clu  User',
                'email' => 'clubuser@bembosex.com',
                'password' => Hash::make('root'),
            ]
        );
    }
}
