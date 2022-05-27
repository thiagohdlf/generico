@extends('layouts.tema._tema')

@section('title', 'Lista de Permissões')

@section('conteudo')
    <div class="container">
        <h1>Lista de permissões para o perfil <strong>{{ $perfil->nome }}</strong></h1>
        <form action="{{ route('admin.perfil.permissao.add', $perfil->id) }}" method="post">
            @csrf
            <label class="form-label">Selecione pelo menos uma Permissão</label>
            <select class="form-select" name="permissao_id[]" multiple>
                @foreach ($permissao as $dado)
                    <option value="{{ $dado->id }}">{{ $dado->nome }}</option>
                @endforeach
            </select>
            <br>
            <button type="submit" class="btn btn-danger">Atribuir Permissão</button>
        </form>
        <br>
        <table class="table table-danger">
            <thead>
                <tr>
                    <th>Permissão</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($perfil->permissoes as $dado)
                    <tr>
                        <td>{{ $dado->nome }}</td>
                        <td>
                            <a href="{{ route('admin.perfil.permissao.rmv', [$perfil->id, $dado->id]) }}" class="btn btn-danger">Desvincular Permissão</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
