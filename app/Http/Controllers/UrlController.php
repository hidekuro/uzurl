<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function index() {
        // TODO URL短縮画面を表示
    }

    public function shorten()
    {
        // TODO Urlモデルを保存して短縮URLをレスポンス
    }

    public function expand()
    {
        // TODO Urlモデルを取得してオリジナルURLにリダイレクト
    }
}
