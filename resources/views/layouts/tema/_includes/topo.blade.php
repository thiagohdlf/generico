<!doctype html>
<html lang="{{ app()->getlocale() }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema Genérico @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  </head>
  <body>
      <br>
    <div class="container">
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <i class="bi bi-person-fill"></i>{{auth()->user()->name}}
            <button type="submit" class="btn btn-primary">Sair</button>
        </form>
        <br>
        <nav class="navbar navbar-dark  bg-dark">
            <div class="container-fluid">
                @can('admin', App\Models\User::class)
                    <a class="navbar-brand" href="{{ route('admin.home') }}">Admin</a>
                @endcan
                @can('perfil', App\Models\Perfil::class)
                    <a class="navbar-brand" href="{{ route('admin.perfil.index') }}">Perfis</a>
                @endcan

                    <a class="navbar-brand" href="{{ route('admin.permissao.index') }}">Permissão</a>

                    <a class="navbar-brand" href="{{ route('admin.usuario.index') }}">Usuários</a>

            </div>
        </nav>
    </div>
