# 20231225_contact
#アプリケーション名
　お問い合わせフォーム
##環境構築
Dockerビルド
1.git cloneリンクを後で貼る
2.docker-compose up -d --build

Laravel環境構築
1.以下コマンドでPHPコンテナ内にログイン
  docker-compose exec php bash
2.ログイン後、以下コマンドで必要なパッケージをインストール
　composser install
3..env.exampleファイルをコピーして.envファイルを作成
　cp .env.example .env
4..envファイルの環境変数を変更
　DB_HOST=mysql
　DB_DATABASE=laravel_db
　DB_USERNAME=laravel_user
　DB_PASSWORD=laravel_pass
5.アプリケーション起動のためのキーを生成
　php artisan key:generate
6.マイグレーションを実行
　php artisan migrate
7.データベースへテスト用の初期データを投入
　php artisan db:seed

##使用技術（実行環境）
PHP:8.0
Laravel:8.6.12
MySQL:8.0
Composser:2.6.6

##ER図
<img width="623" alt="image" src="https://github.com/MinaYamamoto/20231225_contact/assets/150407362/b470fb7d-0834-49bf-9bb1-05159a4ec158">

##URL
開発環境：
phpMyAdmin
