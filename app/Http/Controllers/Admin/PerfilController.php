<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{
    Perfil, Permissao
};
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    private $perfil, $permissao;

    public function __construct(Perfil $perfil, Permissao $permissao)
    {
        $this->perfil = $perfil;
        $this->permissao = $permissao;
        $this->middleware(['can:perfil']);
    }

    public function index(){
        $dados = $this->perfil->paginate(5);
        return view('admin.paginas.perfil.index', compact('dados'));
    }

    public function criar(){

        return view('admin.paginas.perfil.criar');
    }

    public function salvar(Request $request){

        $this->perfil->create($request->all());
        return redirect()->route('admin.perfil.index');
    }

    public function mostrar($id){

        $dados = $this->perfil->find($id);
        return view('admin.paginas.perfil.mostrar', compact('dados'));
    }

    public function editar($id){

        $dados = $this->perfil->find($id);
        return view('admin.paginas.perfil.editar', compact('dados'));
    }

    public function atualizar(Request $request, $id){
        $dados = $this->perfil->find($id);
        $dados->update($request->all());
        return redirect()->route('admin.perfil.index');
    }

    public function deletar($id){
        $dados = $this->perfil->find($id);
        $dados->delete($id);
        return redirect()->route('admin.perfil.index');
    }

    public function permissao($idPerfil){

        $perfil = $this->perfil->find($idPerfil);
        $permissao = $this->permissao->paginate(5);

        return view('admin.paginas.perfil.permissao.index', compact('perfil', 'permissao'));
    }

    public function permissaoadd(Request $request, $idPerfil){

        $perfil = $this->perfil->find($idPerfil);
        $dados = $request->all();
        $permissao = $this->permissao->find($dados['permissao_id']);
        $perfil->permissoes()->attach($permissao);

        return redirect()->back();
    }

    public function permissaormv($idPerfil, $idPermissao){

        $perfil = $this->perfil->find($idPerfil);
        $permissao = $this->permissao->find($idPermissao);
        $perfil->permissoes()->detach($permissao);

        return redirect()->back();
    }
}
