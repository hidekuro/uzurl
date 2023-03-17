<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlShortenRequest;
use App\Models\Url;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function index()
    {
        // TODO URL短縮画面を表示
    }

    public function shorten(UrlShortenRequest $request)
    {
        $url = new Url($request->validated());
        $url->saveOrFail();

        return response()->view('index', [
            'short_url' => $url->shortUrl(),
        ]);
    }

    public function expand()
    {
        // TODO Urlモデルを取得してオリジナルURLにリダイレクト
    }
}
