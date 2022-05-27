@extends('layouts.tema._tema')

@section('title', 'Atribuir Perfil')

@section('conteudo')
    <div class="container">
        <h1>Lista de perfis para o usuário <strong>{{ $user->name }}</strong></h1>
        <form action="{{ route('admin.usuario.perfil.add', $user->id) }}" method="post">
            @csrf
            <label class="form-label">Selecione pelo menos um Perfil</label>
            <select class="form-select" name="perfil_id[]" multiple>
                @foreach ($perfil as $dado)
                    <option value="{{ $dado->id }}">{{ $dado->nome }}</option>
                @endforeach
            </select>
            <br>
            <button type="submit" class="btn btn-danger">Atribuir Perfil</button>
        </form>
        <br>
        <table class="table table-warning">
            <thead>
                <tr>
                    <th>Perfil</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user->perfis as $dado)
                    <tr>
                        <td>{{ $dado->nome }}</td>
                        <td>
                            <a class="btn btn-danger" href="{{ route('admin.usuario.perfil.rmv', [$user->id, $dado->id]) }}">Desvincular Perfil</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
