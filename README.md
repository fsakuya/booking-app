# アプリケーション名
飲食店予約アプリケーション

## 作成した目的
飲食店予約、店舗情報作成機能、店舗代表者作成機能等を実施する為

## アプリケーションURL
ユーザー画面
http://127.0.0.1:8000/<br>
ログイン情報は「その他」のアカウント情報参照

店舗代表者画面
http://127.0.0.1:8000/owner<br>
ログイン情報は「その他」のアカウント情報参照

管理者画面
http://127.0.0.1:8000/admin<br>
ログイン情報は「その他」のアカウント情報参照

## 他のリポジトリ
特になし。

## 機能一覧
- 会員登録
- ログイン
- ログアウト
- ユーザー情報取得
- ユーザー店舗お気に入り一覧取得
- ユーザー店舗予約情報取得
- 飲食店一覧取得
- 飲食店詳細取得
- 飲食店お気に入り追加
- 飲食店お気に入り削除
- 飲食店予約情報追加
- 飲食店予約情報削除
- エリア検索
- ジャンル検索
- 店名検索
- 予約変更
- 来店した飲食店情報取得
- 来店した飲食店の評価
- バリデーション（登録、ログイン、予約、評価投稿、店舗作成、ユーザーへのメール送信）
- 飲食店の評価一覧取得
- 店舗代表者一覧取得
- 店舗代表者作成
- 店舗情報作成・編集
- 店舗の予約情報取得
- 店舗画像のストレージ保存
- 店舗代表者からユーザーへのメール送信
- stripe決済

## 使用技術
- PHP 8.2.0
- Laravel Framework 8.83.27
- SQL Ver 15.1 Distrib 10.4.27-MariaDB, for Win64 (AMD64)

## テーブル設計
以下のスプレッドシートのテーブル仕様書シート<br>
https://docs.google.com/spreadsheets/d/1hWSFLmYqldyTGUHVEWAvC2BMmBsWMMTvHLS4fRkNHxQ/edit?usp=sharing

## ER図
以下のスプレッドシートのER図シート<br>
https://docs.google.com/spreadsheets/d/1hWSFLmYqldyTGUHVEWAvC2BMmBsWMMTvHLS4fRkNHxQ/edit?usp=sharing

## 環境構築
### ダウンロード方法

git clone https://github.com/fsakuya/booking-app.git

もしくはzipファイルでダウンロードしてください

### インストール方法

cd booking-app<br>
composer install

### DB設定
DBに接続し新しいデータベースを作成してください。<br>
CREATE DATABASE 名前;

.env.example をコピーして .envファイルを作成<br>
.envファイルの中の下記をご利用の環境に合わせて変更してください。<br>
DB_CONNECTION=mysql<br>
DB_HOST=127.0.0.1<br>
DB_PORT=3306<br>
DB_DATABASE=booking_app<br>
DB_USERNAME=root<br>
DB_PASSWORD=<br>

XAMPP/MAMPまたは他の開発環境でDBを起動した後に<br>
php artisan migrate:fresh --seed<br>
と実行してください。(データベーステーブルとダミーデータが追加されればOK)<br>

php artisan key:generate<br>
と入力してキーを生成後、<br>
php artisan storage:link<br>
でリンク作成します。<br>

最後に、php artisan serve<br>
で簡易サーバーを立ち上げてください。<br>

### 決済機能
 .envに以下アクセスキーを記述してください。<br>
STRIPE_PUBLIC_KEY="pk_test_51NKGrHGFLBtqk2exyVlwuaZnPlwQogdnUclRgWxOyjkjPwRQCS994IBw93QMsTRTRtO7DwwLVjQRm7FlESFfxPg900ESJnLY5W"<br>
STRIPE_SECRET_KEY="sk_test_51NKGrHGFLBtqk2exOG2lnH60BzpQOKeKJk26esnBKPhOyBIz3VZ28cXhYKM9LkgS06Mderfj0e1zdJsEeEsX83Ao00h7Vy7wdx"<br>

※ローカル環境でstripeのwebhook機能を実現するために以下の操作をお願いします。<br>
stripeアカウントを作成する<br>
https://stripe.com<br>

プロジェクト配下で、以下のコマンド実行しログインする<br>
stripe login<br>
※管理者として実行しないと動作しない可能性があります。<br>

ローカルAPIにイベントを中継する為に以下コマンドを実行する<br>
stripe listen --forward-to localhost:8000/stripe/webhook<br>

その次に、以下のDB操作を手動でお願いします。<br>
（本来はQRコード機能で以下の流れを実装する予定でしたが、間に合わなかったので）<br>

支払い対象とする予約に関して、DB上で'reservation'テーブルをの'visited'カラムを'1'に変更してください。<br>
そうすると、「支払いを行う（'/mypage/checkout'）」ページに支払い対象の飲食店が表示されます。<br>

決済画面では以下の設定をするとテスト決済ができます。<br>
4242 4242 4242 4242 のカード番号を使用します。<br>
有効な将来の日付を使用します (12/34 など)。<br>
任意の 3 桁 (American Express カードの場合は 4 桁) のセキュリティーコードを使用します。<br>
その他のフォームフィールドには任意の値を使用します。<br>

### 評価機能
まず上記のwebhook機能を実行して決済を行ってください。<br>
そうすると、来店した店舗を評価するページ（'/mypage/visited'）に決済済みの予約が表示され、評価可能な状態になります。<br>

### メール設定
Maiiltrapを利用する場合、<br>
MailtrapのマイページにてSMTP情報を確認し、.envファイルの以下の箇所を変更してください。<br>
MAIL_MAILER=smtp<br>
MAIL_HOST=sandbox.smtp.mailtrap.io<br>
MAIL_PORT=2525<br>
MAIL_USERNAME=***ご自身の情報を入力<br>
MAIL_PASSWORD=***ご自身の情報を入力<br>
MAIL_ENCRYPTION=tls<br>
MAIL_FROM_ADDRESS=example@test.com<br>
MAIL_FROM_NAME="${APP_NAME}"<br>

## その他
### アカウントの種類
・利用者テストユーザー<br>
      'email' => 'test@test.com',<br>
      'password' => 'password123'<br>

・管理者テストユーザー<br>
      'email' => 'test@test.com',<br>
      'password' => 'password123'<br>

・店舗代表者テストユーザー１<br>
        'email' => 'test1@test.com',<br>
        'password' => password123'<br>
        
・店舗代表者テストユーザー2<br>
        'email' => 'test2@test.com',<br>
        'password' => password123'<br>
        
・店舗代表者テストユーザー3<br>
        'email' => 'test3@test.com',<br>
        'password' => password123'<br>
        
・店舗代表者テストユーザー4<br>
        'email' => 'test4@test.com',<br>
        'password' => password123'<br>
        
・店舗代表者テストユーザー5<br>
        'email' => 'test5@test.com',<br>
        'password' => password123'<br>

・店舗代表者テストユーザー6<br>
        'email' => 'test6@test.com',<br>
        'password' => password123'<br>
        

