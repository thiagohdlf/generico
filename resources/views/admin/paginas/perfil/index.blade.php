@extends('layouts.tema._tema')

@section('title', 'Lista de Perfil')

@section('conteudo')
    <div class="container">
        <h1>Lista de Perfis</h1>
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
                        <td>{{ $dado->nome }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('admin.perfil.mostrar', $dado->id) }}">Detalhes</a>
                        </td>
                    </tr>
                @empty
                    <h6>Não possui perfis cadastrados !</h6>
                @endforelse
            </tbody>
        </table>
        <br>
        <a class="btn btn-success" href="{{ route('admin.perfil.criar') }}">Cadastrar Perfil</a>
    </div>
@endsection
