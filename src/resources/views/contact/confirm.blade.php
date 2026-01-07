@extends('layouts.app')
@section('title', 'Confirm')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/contact_confirm.css') }}">
@endsection

@section('content')
  <h2 class="page-title">Confirm</h2>

  @php
    $g = $inputs['gender'] ?? '';
    $genderText = $g=='1' ? '男性' : ($g=='2' ? '女性' : 'その他');
    $tel = ($inputs['tel1'] ?? '').($inputs['tel2'] ?? '').($inputs['tel3'] ?? '');
  @endphp

  <div class="confirm">
    <table class="confirm-table">
      <tr><th>お名前</th><td>{{ $inputs['last_name'] ?? '' }} {{ $inputs['first_name'] ?? '' }}</td></tr>
      <tr><th>性別</th><td>{{ $genderText }}</td></tr>
      <tr><th>メールアドレス</th><td>{{ $inputs['email'] ?? '' }}</td></tr>
      <tr><th>電話番号</th><td>{{ $tel }}</td></tr>
      <tr><th>住所</th><td>{{ $inputs['address'] ?? '' }}</td></tr>
      <tr><th>建物名</th><td>{{ $inputs['building'] ?? '' }}</td></tr>
      <tr><th>お問い合わせの種類</th><td>{{ $category->name ?? '' }}</td></tr>
      <tr><th>お問い合わせ内容</th><td>{!! nl2br(e($inputs['detail'] ?? '')) !!}</td></tr>
    </table>

  <div class="confirm-actions">
  <form action="{{ route('contact.store') }}" method="POST">
    @csrf
    @foreach($inputs as $k => $v)
      <input type="hidden" name="{{ $k }}" value="{{ $v }}">
    @endforeach
    <button class="btn" type="submit">送信</button>
  </form>

{{-- 修正ボタン --}}
<form action="{{ route('contact') }}" method="GET">
  @foreach ($inputs as $name => $value)
    @if (is_array($value))
      @foreach ($value as $v)
        <input type="hidden" name="{{ $name }}[]" value="{{ $v }}">
      @endforeach
    @else
      <input type="hidden" name="{{ $name }}" value="{{ $value }}">
    @endif
  @endforeach

  <button type="submit">修正</button>
</form>

  </div>
</div> 
@endsection
