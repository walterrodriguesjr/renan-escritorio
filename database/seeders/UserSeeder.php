<?php

namespace Database\Seeders;

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
        // Insere o usuário na tabela users e obtém o ID
        $userId = DB::table('users')->insertGetId([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('a1b2c3d4e5'),
        ]);

        // Insere os dados relacionados na tabela user_dados com o mesmo ID
        DB::table('user_dados')->insert([
            'user_id' => $userId, // Utiliza o mesmo ID obtido anteriormente
            'nomeUsuario' => 'Walter',
            'emailUsuario' => 'admin@gmail.com',
            'cpfUsuario' => '0000000000',
            'celularUsuario' => '000000000',
            'token' => '00000000',
            'tipoAcessoUsuario' => 'Administrador',
        ]);
    }
}