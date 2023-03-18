<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlShortenRequest;
use App\Models\Url;
use Illuminate\Http\Response;

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

    public function expand(Url $url)
    {
        // 互換性を考慮して308ではなく301リダイレクト
        return redirect($url->url, Response::HTTP_MOVED_PERMANENTLY);
    }
}
