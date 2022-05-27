@extends('layouts.tema._tema')

@section('title', 'Lista de Permissões')

@section('conteudo')
    <div class="container">
        <h1>Lista de Permissão</h1>
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
                            <a class="btn btn-info" href="{{ route('admin.permissao.mostrar', $dado->id) }}">Detalhes</a>
                        </td>
                    </tr>
                @empty
                    <h6>Não possui permisssões cadastradas !</h6>
                @endforelse
            </tbody>
        </table>
        <br>
        <a class="btn btn-success" href="{{ route('admin.permissao.criar') }}">Cadastrar Permissão</a>
    </div>
@endsection
