<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PcHandlerController extends Controller
{
    public function handle(Request $request)
    {
        $token = $request->input('token');

        if ($token != 'pcla')
            abort(400);

        Log::debug($request->all());
        return;
    }
}
