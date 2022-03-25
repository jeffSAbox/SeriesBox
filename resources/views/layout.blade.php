<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>@yield('titulo')</title>
</head>
<body>

  <nav class="navbar mb-2 navbar-light bg-light">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1"><a class="nav-link active" aria-current="page" href="{{ route('listar_series') }}">Home</a></span>
      @auth
      <a href="/logout" class="nav-link">Sair</a> 
      @endauth      

      @guest
      <a href="{{ route('login') }}" class="nav-link">Entrar</a>    
      @endguest
    </div>
  </nav>

  <div class="container">

      <nav class="navbar navbar-light bg-light mb-2">
          <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">
              <div class="display-3">
                  @yield('titulo')
              </div>
            </span>
          </div>
        </nav>
      
      
      @yield('conteudo')

  </div>

  @yield('footer-script')
</body>
</html>