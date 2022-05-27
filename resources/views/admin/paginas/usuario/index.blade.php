@extends('layouts.tema._tema')

@section('title', 'Lista de Usuários')

@section('conteudo')
    <div class="container">
        <h1>Lista de Usuários</h1>
        <table class="table-info">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dados as $dado)
                    <tr>
                        <td>{{ $dado->name }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('admin.usuario.mostrar', $dado->id) }}">Detalhes</a>
                        </td>
                    </tr>
                @empty
                    <h6>Não possui usuários cadastrados !</h6>
                @endforelse
            </tbody>
        </table>
        {{ $dados->links() }}
    </div>
@endsection
