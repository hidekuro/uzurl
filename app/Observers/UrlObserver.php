<?php

namespace App\Observers;

use App\Models\Url;
use Illuminate\Support\Facades\Log;

class UrlObserver
{
    /**
     * Handle the Url "created" event.
     */
    public function created(Url $url): void
    {
        Log::info("New URL has created.", $url->toArray());
    }

    /**
     * Handle the Url "updated" event.
     */
    public function updated(Url $url): void
    {
        //
    }

    /**
     * Handle the Url "deleted" event.
     */
    public function deleted(Url $url): void
    {
        //
    }

    /**
     * Handle the Url "restored" event.
     */
    public function restored(Url $url): void
    {
        //
    }

    /**
     * Handle the Url "force deleted" event.
     */
    public function forceDeleted(Url $url): void
    {
        //
    }
}
