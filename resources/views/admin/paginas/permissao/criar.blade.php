@extends('layouts.tema._tema')

@section('title', 'Criar Permissão')

@section('conteudo')
    <div class="container">
        <h1>Cadatro de Permissão</h1>
        <form action="{{ route('admin.permissao.salvar') }}" method="POST">
            @include('admin.paginas.permissao._include.form')
            @csrf
            <button type="submit" class="btn btn-info">Salvar Permissão</button>
        </form>
    </div>
@endsection
