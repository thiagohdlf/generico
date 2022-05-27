@extends('layouts.tema._tema')

@section('title', 'Criar Perfil')

@section('conteudo')
    <div class="container">
        <h1>Cadatro de Perfil</h1>
        <form action="{{ route('admin.perfil.salvar') }}" method="post">
            @include('admin.paginas.perfil._include.form')
            @csrf
            <button type="submit" class="btn btn-info">Salvar Perfil</button>
        </form>
    </div>
@endsection
