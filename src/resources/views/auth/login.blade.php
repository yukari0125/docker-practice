@extends('layouts.app')

@section('title', 'Login')

@section('header_right')
  <a class="btn btn--ghost" href="{{ route('register') }}">register</a>
@endsection

@section('css')
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
  <h2 class="page-title">Login</h2>

  <div class="card">
    <form method="POST" action="{{ route('login.post') }}">
      @csrf

      <div class="form-row">
        <p class="label">メールアドレス</p>
        <input class="input" type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
        @error('email')<p class="error">{{ $message }}</p>@enderror
      </div>

      <div class="form-row">
        <p class="label">パスワード</p>
        <input class="input" type="password" name="password" placeholder="例: coachtech1106">
        @error('password')<p class="error">{{ $message }}</p>@enderror
      </div>

      <div class="actions">
        <button class="btn" type="submit">ログイン</button>
      </div>
    </form>
  </div>
@endsection
