{{-- resources/views/auth/register.blade.php --}}
<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>
  <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>

  <header class="site-header">
    <div class="site-title">FashionablyLate</div>

    <div class="header-right">
      <a class="header-link" href="{{ route('login') }}">login</a>
    </div>
  </header>

  <main class="auth-wrap">
    <h1 class="auth-title">Register</h1>

    <section class="auth-card">
      <form class="auth-form" method="POST" action="{{ route('register.post') }}">
        @csrf

        <div class="form-group">
          <label class="form-label" for="name">お名前</label>
          <input
            id="name"
            type="text"
            name="name"
            class="form-input"
            placeholder="例: 山田 太郎"
            value="{{ old('name') }}"
          >
        </div>

        <div class="form-group">
          <label class="form-label" for="email">メールアドレス</label>
          <input
            id="email"
            type="email"
            name="email"
            class="form-input"
            placeholder="例: test@example.com"
            value="{{ old('email') }}"
          >
        </div>

        <div class="form-group">
          <label class="form-label" for="password">パスワード</label>
          <input
            id="password"
            type="password"
            name="password"
            class="form-input"
            placeholder="8文字以上"
          >
        </div>

        <div class="form-group">
          <label class="form-label" for="password_confirmation">パスワード確認</label>
          <input
            id="password_confirmation"
            type="password"
            name="password_confirmation"
            class="form-input"
          >
        </div>

        <div class="btn-row">
          <button class="btn-primary" type="submit">登録</button>
        </div>
      </form>
    </section>
  </main>

</body>
</html>
