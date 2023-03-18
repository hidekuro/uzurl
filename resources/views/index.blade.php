<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
</head>

<body>
    <h1>😺 uzurl :: Simplest URL Shortener 🌐</h1>
    <div>
        <form action="{{ route('url.shorten') }}" method="post">
            @csrf
            <p>
                <label for="url">URL</label>
                <input type="url" name="url" id="url" placeholder="https://www.google.com/" required
                    maxlength="2000" size="30">
                <button type="submit">短縮</button>
            </p>
        </form>
        @if (session('short_url'))
            <div>
                <p>✅ 短縮 URL を作成しました</p>
                <p>
                    <input type="text" name="short_url" id="short_url" value="{{ session('short_url') }}" size="30" readonly onclick="this.select();">
                </p>
            </div>
        @endif
    </div>

</body>

</html>
