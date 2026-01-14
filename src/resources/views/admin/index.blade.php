<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
  <header class="header">
    <div class="header__inner">
      <h1 class="logo">FashionablyLate</h1>
    </div>
  </header>

  <main class="container">
    <h2 class="page-title">Admin</h2>

    {{-- 検索フォーム --}}
    <form class="search" method="GET" action="{{ route('admin.index') }}">
      <input class="input" type="text" name="keyword" value="{{ request('keyword') }}"
             placeholder="名前やメールアドレスを入力してください">

      <div class="select-wrap">
        <select class="select" name="gender">
          <option value="">性別</option>
          <option value="1" @selected(request('gender')==='1')>男性</option>
          <option value="2" @selected(request('gender')==='2')>女性</option>
          <option value="3" @selected(request('gender')==='3')>その他</option>
        </select>
      </div>

      <div class="select-wrap">
        <select class="select" name="category_id">
          <option value="">お問い合わせの種類</option>
          @foreach($categories ?? [] as $category)
            <option value="{{ $category->id }}" @selected((string)request('category_id')===(string)$category->id)>
              {{ $category->name }}
            </option>
          @endforeach
        </select>
      </div>

      <input class="input input--date" type="date" name="date" value="{{ request('date') }}">

      <button class="btn btn--dark" type="submit">検索</button>
      <a class="btn btn--light" href="{{ route('admin.index') }}">リセット</a>
    </form>

    <div class="toolbar">
      <div class="pager">
        {{-- 例：{{ $contacts->links() }} --}}
        <button class="pager__btn" disabled>&lt;</button>
        <button class="pager__num is-active">1</button>
        <button class="pager__num">2</button>
        <button class="pager__num">3</button>
        <button class="pager__num">4</button>
        <button class="pager__num">5</button>
        <button class="pager__btn">&gt;</button>
      </div>
    </div>

    {{-- 一覧テーブル --}}
    <section class="table-wrap">
      <table class="table">
        <thead>
          <tr>
            <th>お名前</th>
            <th>性別</th>
            <th>メールアドレス</th>
            <th>お問い合わせの種類</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($contacts ?? [] as $c)
            <tr>
              <td>{{ $c->fullname ?? '山田　太郎' }}</td>
              <td>{{ $c->gender_label ?? '男性' }}</td>
              <td>{{ $c->email ?? 'test@example.com' }}</td>
              <td>{{ $c->category_name ?? '商品の交換について' }}</td>
              <td class="td-right">
                <button type="button" class="btn detail-btn"
                  data-id="{{ $c->id ?? 1 }}"
                  data-name="{{ $c->fullname ?? '山田　太郎' }}"
                  data-gender="{{ $c->gender_label ?? '男性' }}"
                  data-email="{{ $c->email ?? 'test@example.com' }}"
                  data-tel="{{ $c->tel ?? '08012345678' }}"
                  data-address="{{ $c->address ?? '東京都渋谷区千駄ヶ谷1-2-3' }}"
                  data-building="{{ $c->building ?? '千駄ヶ谷マンション101' }}"
                  data-category="{{ $c->category_name ?? '商品の交換について' }}"
                  data-content="{{ $c->content ?? '届いた商品が注文した商品ではありませんでした。商品を交換お願いします。' }}"
                >詳細</button>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </section>
  </main>

<div class="modal js-modal" aria-hidden="true">
  <div class="modal__overlay js-close-modal"></div>
  <div class="modal__panel">
    <button class="modal__close js-close-modal" type="button">×</button>
    
    <div class="modal__grid">
      <div class="modal__row">
        <div class="modal__label">お名前</div>
        <div class="modal__value" data-field="name"></div>
      </div>
      <div class="modal__row">
        <div class="modal__label">性別</div>
        <div class="modal__value" data-field="gender"></div>
      </div>
      <div class="modal__row">
        <div class="modal__label">メールアドレス</div>
        <div class="modal__value" data-field="email"></div>
      </div>
      <div class="modal__row">
        <div class="modal__label">電話番号</div>
        <div class="modal__value" data-field="tel"></div>
      </div>
      <div class="modal__row">
        <div class="modal__label">住所</div>
        <div class="modal__value" data-field="address"></div>
      </div>
      <div class="modal__row">
        <div class="modal__label">建物名</div>
        <div class="modal__value" data-field="building"></div>
      </div>
      <div class="modal__row">
        <div class="modal__label">お問い合わせの種類</div>
        <div class="modal__value" data-field="category"></div>
      </div>
      <div class="modal__row modal__row--content">
        <div class="modal__label">お問い合わせ内容</div>
        <div class="modal__value" data-field="content"></div>
      </div>
    </div>

 
    <form method="POST"
          action="{{ route('admin.destroy') }}"
          class="modal__delete">
      @csrf
      @method('DELETE')

      <input type="hidden" name="id" id="delete_id">

      <button type="submit" class="btn btn--danger"
        onclick="return confirm('本当に削除しますか？')">
        削除
      </button>
    </form>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const modal        = document.querySelector('.js-modal');
  const closeBtns    = document.querySelectorAll('.js-close-modal');
  const detailBtns   = document.querySelectorAll('.detail-btn');
  const deleteIdInput= document.getElementById('delete_id');
  const overlay      = document.querySelector('.modal__overlay');


  detailBtns.forEach(btn => {
    btn.addEventListener('click', function() {
   
      modal.querySelector('[data-field="name"]').textContent     = btn.dataset.name;
      modal.querySelector('[data-field="gender"]').textContent   = btn.dataset.gender;
      modal.querySelector('[data-field="email"]').textContent    = btn.dataset.email;
      modal.querySelector('[data-field="tel"]').textContent      = btn.dataset.tel;
      modal.querySelector('[data-field="address"]').textContent  = btn.dataset.address;
      modal.querySelector('[data-field="building"]').textContent = btn.dataset.building;
      modal.querySelector('[data-field="category"]').textContent = btn.dataset.category;
      modal.querySelector('[data-field="content"]').textContent  = btn.dataset.content;

      if (deleteIdInput) {
        deleteIdInput.value = btn.dataset.id;
      }
  
      modal.classList.add('is-open');
      modal.setAttribute('aria-hidden', 'false');
    });
  });

  closeBtns.forEach(btn => {
    btn.addEventListener('click', function() {
      modal.classList.remove('is-open');
      modal.setAttribute('aria-hidden', 'true');
    });
  });

  if (overlay) {
    overlay.addEventListener('click', function() {
      modal.classList.remove('is-open');
      modal.setAttribute('aria-hidden', 'true');
    });
  }
});
</script>
</body>
</html>
