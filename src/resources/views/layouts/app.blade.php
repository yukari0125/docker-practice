<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'FashionablyLate')</title>
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  @yield('css')
</head>
<body>
  <header class="header">
    <div class="header__inner">
      <h1 class="logo"><a href="/">FashionablyLate</a></h1>
      <div class="header__right">
        @yield('header_right')
      </div>
    </div>
  </header>

  <main class="container">
    @yield('content')
  </main>
</body>
</html>
