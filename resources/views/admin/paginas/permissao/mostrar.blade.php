@extends('layouts.tema._tema')

@section('title', 'Permissão {{ $dados->nome }}')

@section('conteudo')
    <div class="container">
        <h1>Destalhes Permissão: {{ $dados->nome }}</h1>
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
                            <a class="btn btn-warning" href="{{ route('admin.permissao.editar', $dados->id) }}">Editar {{ $dados->nome }}</a>
                            <form action="{{ route('admin.permissao.deletar', $dados->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit" onclick="return confirm('Tem certeza que deseja apagar esse dado ?')">Apagar Permissão {{ $dados->nome }}</button>
                            </form>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
