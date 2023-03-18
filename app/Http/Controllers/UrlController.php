<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlShortenRequest;
use App\Models\Url;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function index()
    {
        return response()->view('index');
    }

    public function shorten(UrlShortenRequest $request)
    {
        $url = new Url($request->validated());
        $url->saveOrFail();

        return redirect()
            ->route('url.index')
            ->with([
            'short_url' => $url->shortUrl(),
        ]);
    }

    public function expand()
    {
        // TODO Urlモデルを取得してオリジナルURLにリダイレクト
    }
}
