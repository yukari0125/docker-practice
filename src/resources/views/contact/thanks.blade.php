@extends('layouts.app')
@section('title', 'Thanks')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
<main class="thanks">
  <div class="thanks__inner">
    <p class="thanks__msg">お問い合わせありがとうございました</p>
    <a class="thanks__btn" href="{{ route('contact') }}">HOME</a>
  </div>
</main>
@endsection
