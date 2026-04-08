<?php

use Illuminate\Support\Facades\Schedule;

Schedule::call(function () {
    \App\Models\Todo::onlyTrashed()
        ->where('deleted_at', '<', now()->subHours(24))
        ->forceDelete();
})->everyMinute();