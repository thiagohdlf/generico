@extends('layouts.tema._tema')

@section('title', 'Editar Perfil "{{ $dados->nome }}"')

@section('conteudo')
    <div class="container">
        <h1>Edição do Perfil {{ $dados->nome }}</h1>
        <form action="{{ route('admin.perfil.atualizar', $dados->id) }}" method="post">
            @include('admin.paginas.perfil._include.form')
            @method('put')
            @csrf
            <button type="submit" class="btn btn-info">Atualizar Perfil {{ $dados->nome }}</button>
        </form>
    </div>
@endsection
