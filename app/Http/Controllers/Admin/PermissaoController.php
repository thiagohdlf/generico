<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Permissao,
};

class PermissaoController extends Controller
{
    private $permissao;

    public function __construct(Permissao $permissao)
    {
        $this->permissao = $permissao;
    }

    public function index(){

        $dados = $this->permissao->paginate(5);
        return view('admin.paginas.permissao.index', compact('dados'));
    }

    public function criar(){

        return view('admin.paginas.permissao.criar');
    }

    public function salvar(Request $request){

        $this->permissao->create($request->all());
        return redirect()->route('admin.permissao.index');
    }

    public function mostrar($id){

        $dados = $this->permissao->find($id);
        return view('admin.paginas.permissao.mostrar', compact('dados'));
    }

    public function editar($id){

        $dados = $this->permissao->find($id);
        return view('admin.paginas.permissao.editar', compact('dados'));
    }

    public function atualizar(Request $request, $id){

        $dados = $this->permissao->find($id);
        $dados->update($request->all());
        return redirect()->route('admin.permissao.index');
    }

    public function deletar($id){

        $dados = $this->permissao->find($id);
        $dados->delete($id);
        return redirect()->route('admin.permissao.index');
    }
}
