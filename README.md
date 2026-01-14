# お問い合わせ管理アプリ

## 概要
お問い合わせフォームから送信された内容を、
管理画面で検索・確認・削除できるアプリです。

Laravel を使用して作成しました。

---

## 環境構築
以下の手順でアプリを起動できます。

```bash
git clone https://github.com/yukari0125/docker-practice.git
cd docker-practice

docker compose up -d
docker compose exec php composer install

cp .env.example .env
docker compose exec php php artisan key:generate

docker compose exec php php artisan migrate --seed
```



## ER 図
- docs/er_diagram.png に配置しています
- マイグレーション定義と一致しています

## ダミーデータ
- contacts：Factory により 35件 作成
- categories：Seeder により 5件 作成
  1. 商品のお届けについて
  2. 商品の交換について
  3. 商品トラブル
  4. ショップへのお問い合わせ
  5. その他

## 使用技術
- PHP 8.x
- Laravel 10.x
- MySQL 8.x
- Docker / Docker Compose

## 機能一覧
- お問い合わせフォーム入力
- 入力内容確認画面
- サンクスページ表示
- 管理画面一覧表示
- 検索機能（名前／メール／性別／カテゴリー）
- お問い合わせ削除機能

## URL（開発環境）
- http://localhost/contact（お問い合わせフォーム）
- http://localhost/admin（管理画面）