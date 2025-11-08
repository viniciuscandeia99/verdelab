<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | VerdeLab</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color:#E8F5E9;">
  <div class="d-flex justify-content-center align-items-center" style="height:100vh;">
    <form method="POST" action="{{ route('autenticar') }}" class="p-4 bg-white rounded shadow" style="width:350px;">
      @csrf
      <h4 class="text-center text-success mb-3">VerdeLab 🌿</h4>
      <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Senha</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <button class="btn btn-success w-100">Entrar</button>
      @if(session('erro'))
        <div class="alert alert-danger mt-2">{{ session('erro') }}</div>
      @endif
    </form>
  </div>
</body>
</html>
