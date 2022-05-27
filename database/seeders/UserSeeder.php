<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dados = [
            'name' => 'Thiago',
            'email' => 'thiago@mail',
            'password' => bcrypt('123')
        ];
        if(User::where('email', '=', $dados['email'])->count()){
            $user = User::where('email', '=', $dados['email'])->first();
            $user->update($dados);
            echo "Usuário Atualizado !";
        }else{
            User::create($dados);
            echo "Usuário Criado !";
        }
    }
}
