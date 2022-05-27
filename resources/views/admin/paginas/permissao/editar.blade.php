@extends('layouts.tema._tema')

@section('title', 'Editar Permissão "{{ $dados->nome }}"')

@section('conteudo')
    <div class="container">
        <h1>Edição da Permissão {{ $dados->nome }}</h1>
        <form action="{{ route('admin.permissao.atualizar', $dados->id) }}" method="post">
            @include('admin.paginas.permissao._include.form')
            @method('put')
            @csrf
            <button type="submit" class="btn btn-info">Atualizar Permissão {{ $dados->nome }}</button>
        </form>
    </div>
@endsection
