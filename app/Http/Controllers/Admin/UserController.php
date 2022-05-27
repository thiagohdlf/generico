<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{
    User, Perfil
};
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class UserController extends Controller
{

    private $user, $perfil;

    public function __construct(User $user, Perfil $perfil)
    {
        $this->user = $user;
        $this->perfil = $perfil;
        $this->middleware(['can:usuario']);
    }

    public function index(){
        $dados = $this->user->paginate(5);
        return view('admin.paginas.usuario.index', compact('dados'));
    }

    public function mostrar($id){
        $dados = $this->user->find($id);
        return view('admin.paginas.usuario.mostrar', compact('dados'));
    }

    public function perfil($id){

        $user = $this->user->find($id);
        $perfil = $this->perfil->all();

        return view('admin.paginas.usuario.perfil.index', compact('user', 'perfil'));
    }

    public function perfiladd(Request $request, $id){

        $user = $this->user->find($id);
        $dados = $request->all();
        $perfil = $this->perfil->find($dados['perfil_id']);
        $user->perfis()->attach($perfil);

        return redirect()->back();
    }

    public function perfilrmv($idUser, $idPerfil){

        $user = $this->user->find($idUser);
        $perfil = $this->perfil->find($idPerfil);
        $user->perfis()->detach($perfil);

        return redirect()->back();
    }
}
