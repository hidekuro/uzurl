# uzurl

uzurl (うずーる) は、コーディングチャレンジ題材として開発した URL 短縮 Web アプリケーションです。

`uzurl` とは、作者の愛猫の名前 "うず" と "URL" をあわせた造語です。

## Prerequisite

- [Docker Desktop](https://docs.docker.com/desktop/)

uzurl は [Laravel Sail](https://laravel.com/docs/10.x/sail) で開発されています。
Windows の場合、 WSL2 based Docker Desktop が必要です。

## Getting Started

```bash
git clone git@github.com:hidekuro/uzurl.git
cd uzurl/

docker run --rm \
    --pull=always \
    -v "$(pwd)":/opt/app \
    -w /opt/app \
    -u "$(id -u):$(id -g)"
    laravelsail/php82-composer:latest \
    bash -c "composer install"

./vendor/bin/sail up
./vendor/bin/sail migrate
```

## Core concept

題材の指定による技術的なテーマは **「サーバーサイド技術による [TinyURL.com](https://tinyurl.com/) の簡易クローン」** です。

直近の成果物よりも、過程・理由・展望の3点を重視して開発されています。

- 「短縮 URL の生成機能」を短期間で Minimum viable product として形にすることを最重要目標としています。
- ユーザーストーリーの記述から要件定義・実装に至るまでの工程や、予測される懸念事項などを GitHub Issue と Project で管理します。

### What you can : できること

- 短縮 URL を発行する。
- 短縮 URL を展開し、元の URL に転送する。

### And you cannot : できないこと

(TinyURL.com と比べて)

- 任意のエイリアスをつける。
- ユーザー登録、およびユーザー向け機能。
- 履歴の参照。

## License

[MIT license](LICENSE).
