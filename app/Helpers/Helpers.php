<?php

use App\Models\ClientLogs;
use Illuminate\Support\Facades\Log;

function IsClient() : bool
{
    return auth()->guard('client')->check();
}

function UserLog($content , $type){
    Log::channel('userLog')->info($content);
    ClientLogs::create([
        'client_id' => auth()->user()->id ?? null,
        'content' => $content,
        'type' => $type,
    ]);
}
