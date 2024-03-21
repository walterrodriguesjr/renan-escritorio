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
        // Primeiro usuário
        $userId1 = DB::table('users')->insertGetId([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('a1b2c3d4e5'),
        ]);

        DB::table('user_dados')->insert([
            'user_id' => $userId1,
            'nomeUsuario' => 'Walter',
            'emailUsuario' => 'admin@gmail.com',
            'cpfUsuario' => '0000000000',
            'celularUsuario' => '000000000',
            'token' => '00000000',
            'tipoAcessoUsuario' => 'Administrador',
        ]);

        // Segundo usuário
        $userId2 = DB::table('users')->insertGetId([
            'name' => 'Charlene',
            'email' => 'cha@gmail.com',
            'password' => Hash::make('abcd1234'),
        ]);

        DB::table('user_dados')->insert([
            'user_id' => $userId2,
            'nomeUsuario' => 'Charlene',
            'emailUsuario' => 'cha@gmail.com',
            'cpfUsuario' => '1111111111',
            'celularUsuario' => '1111111111',
            'token' => '00000000',
            'tipoAcessoUsuario' => 'Administrador',
        ]);
    }
}
