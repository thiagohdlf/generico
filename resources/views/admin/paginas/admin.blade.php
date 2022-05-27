@extends('layouts.tema._tema')

@section('title', 'Admin')

@section('conteudo')
    <div class="container">
        <h1>Olá, <strong>{{ auth()->user()->name }} O que você deseja fazer hoje ?</strong></h1>
    </div>
@endsection
