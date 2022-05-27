<?php

namespace App\Models\Traits;

trait UserACLTrait{

    public function permissoes(): array{

        $permissoesPerfil = $this->perfil();
        $permissoes = [];
        foreach($permissoesPerfil as $permissao){
            if(in_array($permissao, $permissoesPerfil)){
                array_push($permissoes, $permissao);
            }

            return $permissoes;
        }
    }

    public function perfil(): array{

        $perfis = $this->perfis()->with('permissoes')->get();
        $permissoes = [];
        foreach($perfis as $perfil){
            foreach($perfil->permissoes as $permissao){
                array_push($permissoes, $permissao->nome);
            }
        }

        return $permissoes;
    }

    public function temPermissao(string $permissaoNome): bool{

        return in_array($permissaoNome, $this->permissoes());
    }

    public function isAdmin(): bool{

        return in_array($this->email, config('acl.admins'));
    }

}
