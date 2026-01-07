@extends('layouts.app')

@section('title', 'Contact')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')
  <h2 class="page-title">Contact</h2>

  <form class="contact" method="POST" action="{{ route('contact.confirm') }}">
    @csrf

    <div class="row">
      <p class="label">お名前 <span class="req">※</span></p>
      <div class="field two">
        <div>
          <input class="input" type="text" name="last_name" placeholder="例: 山田" value="{{ old('last_name') }}">
          @error('last_name')<p class="error">{{ $message }}</p>@enderror
        </div>
        <div>
          <input class="input" type="text" name="first_name" placeholder="例: 太郎" value="{{ old('first_name') }}">
          @error('first_name')<p class="error">{{ $message }}</p>@enderror
        </div>
      </div>
    </div>

    <div class="row">
      <p class="label">性別 <span class="req">※</span></p>
      <div class="field radios">
        <label><input type="radio" name="gender" value="male" {{ old('gender','male')=='male'?'checked':'' }}> 男性</label>
        <label><input type="radio" name="gender" value="female" {{ old('gender')=='female'?'checked':'' }}> 女性</label>
        <label><input type="radio" name="gender" value="other" {{ old('gender')=='other'?'checked':'' }}> その他</label>
        @error('gender')<p class="error">{{ $message }}</p>@enderror
      </div>
    </div>

    <div class="row">
      <p class="label">メールアドレス <span class="req">※</span></p>
      <div class="field">
        <input class="input" type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
        @error('email')<p class="error">{{ $message }}</p>@enderror
      </div>
    </div>

    <div class="row">
      <p class="label">電話番号 <span class="req">※</span></p>
      <div class="field tel">
        <input class="input" type="text" name="tel1" placeholder="080" value="{{ old('tel1') }}">
        <span class="dash">-</span>
        <input class="input" type="text" name="tel2" placeholder="1234" value="{{ old('tel2') }}">
        <span class="dash">-</span>
        <input class="input" type="text" name="tel3" placeholder="5678" value="{{ old('tel3') }}">
      </div>
      @error('tel1')<p class="error">{{ $message }}</p>@enderror
      @error('tel2')<p class="error">{{ $message }}</p>@enderror
      @error('tel3')<p class="error">{{ $message }}</p>@enderror
    </div>

    <div class="row">
      <p class="label">住所 <span class="req">※</span></p>
      <div class="field">
        <input class="input" type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
        @error('address')<p class="error">{{ $message }}</p>@enderror
      </div>
    </div>

    <div class="row">
      <p class="label">建物名</p>
      <div class="field">
        <input class="input" type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}">
      </div>
    </div>

    <div class="row">
      <p class="label">お問い合わせの種類 <span class="req">※</span></p>
      <div class="field">
        <div class="select-wrap">
         <select name="category_id">
          <option value="">選択してください</option>
          <option value="1" {{ old('category_id')=='1'?'selected':'' }}>商品のお届けについて</option>
          <option value="2" {{ old('category_id')=='2'?'selected':'' }}>商品の交換について</option>
          <option value="3" {{ old('category_id')=='3'?'selected':'' }}>商品トラブル</option>
          <option value="4" {{ old('category_id')=='4'?'selected':'' }}>ショップへのお問い合わせ</option>
          <option value="5" {{ old('category_id')=='5'?'selected':'' }}>その他</option>
        </select>
        @error('category_id')<p class="error">{{ $message }}</p>@enderror
        </div>
      </div>
    </div>

    <div class="row">
      <p class="label">お問い合わせ内容 <span class="req">※</span></p>
      <div class="field">
        <textarea class="textarea" name="detail" rows="6" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
        @error('detail')<p class="error">{{ $message }}</p>@enderror
      </div>
    </div>

    <div class="actions">
      <button class="btn" type="submit">確認画面</button>
    </div>
  </form>
@endsection
