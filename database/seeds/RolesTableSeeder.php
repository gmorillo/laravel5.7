<?php

use Illuminate\Database\Seeder;
use App\Role;


class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(
            [
                'name' => 'Super User',
                'description' => 'Acceso a parte administrativa, puede crear superusers',
            ]
        );
        Role::create(
            [
                'name' => 'Admin User',
                'description' => 'Acceso a parte administrativa con limitaciones, puede crear administradores',
            ]
        );
        Role::create(
            [
                'name' => 'Esc User',
                'description' => 'Usuario Normal',
            ]
        );
        Role::create(
            [
                'name' => 'Ga User',
                'description' => 'Usuario Normal',
            ]
        );
        Role::create(
            [
                'name' => 'Tra User',
                'description' => 'Usuario Normal',
            ]
        );
        Role::create(
            [
                'name' => 'Agency User',
                'description' => 'Usuario agencia, puede tener perfil y dentor del perfil publicaciones de fichas',
            ]
        );
        Role::create(
            [
                'name' => 'Club User',
                'description' => 'Usuario Club, puede tener perfil y dentor del perfil publicaciones de fichas',
            ]
        );
    }
}
