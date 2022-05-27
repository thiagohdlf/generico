<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Perfil extends Model
{
    use HasFactory;

    protected $table = 'perfis';

    protected $fillable = [
        'nome',
        'descricao',
    ];

    public function users(){

        return $this->belongsToMany(User::class);
    }

    public function permissoes(){

        return $this->belongsToMany(Permissao::class);
    }
}
