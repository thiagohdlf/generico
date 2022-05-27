@extends('layouts.tema._tema')

@section('title', 'Perfil {{ $dados->nome }}')

@section('conteudo')
    <div class="container">
        <h1>Destalhes Perfil: {{ $dados->nome }}</h1>
        <table class="table-info">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $dados->nome }}</td>
                    <td>{{ $dados->descricao }}</td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-warning" href="{{ route('admin.perfil.editar', $dados->id) }}">Editar {{ $dados->nome }}</a>
                            <form action="{{ route('admin.perfil.deletar', $dados->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit" onclick="return confirm('Tem certeza que deseja apagar esse dado ?')">Apagar Perfil {{ $dados->nome }}</button>
                            </form>
                            <a href="{{ route('admin.perfil.permissao', $dados->id) }}" class="btn btn-danger">Permissão</a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
