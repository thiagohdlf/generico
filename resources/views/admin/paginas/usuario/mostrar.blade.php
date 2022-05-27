@extends('layouts.tema._tema')

@section('title', 'Usuario "{{ $dados->name }}"')

@section('conteudo')
    <div class="container">
        <h1>Destalhes Usuário: {{ $dados->name }}</h1>
        <table class="table-info">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $dados->name }}</td>
                    <td>{{ $dados->email }}</td>
                    <td>
                        @can('perfil', App\Models\User::class)
                            <a href="{{ route('admin.usuario.perfil', $dados->id) }}" class="btn btn-danger">Perfil</a>
                        @endcan
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
