<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VerdeLab 🌿</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body style="background-color:#F3F7F4;">
  <nav class="navbar navbar-expand-lg" style="background-color:#1C5E3C;">
    <div class="container">
      <a class="navbar-brand text-white fw-bold" href="{{ route('dashboard') }}">VerdeLab 🌿</a>
      <div>
        <a href="{{ route('setores.index') }}" class="btn btn-light btn-sm">Setores</a>
        <a href="{{ route('consumos.index') }}" class="btn btn-light btn-sm">Consumos</a>
        <a href="{{ route('acoes.index') }}" class="btn btn-light btn-sm">Ações</a>
        <a href="{{ route('logout') }}" class="btn btn-danger btn-sm">Sair</a>
      </div>
    </div>
  </nav>

  <div class="container mt-4">
    @if(session('sucesso'))
      <div class="alert alert-success">{{ session('sucesso') }}</div>
    @endif
    @if(session('erro'))
      <div class="alert alert-danger">{{ session('erro') }}</div>
    @endif

    @yield('content')
  </div>
</body>
</html>
