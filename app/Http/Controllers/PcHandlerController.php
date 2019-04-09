<?php

namespace App\Http\Controllers;

use App\PcItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PcHandlerController extends Controller
{
    public function handle(Request $request)
    {
        $token = $request->input('token');

        if ($token != 'pcla')
            abort(400);

        $pci = new PcItem();
        $pci->url = $request->json('url', '');
        $pci->pc_status = $request->json('pc_status', '');
        $pci->original_status = $request->json('original_status', '');
        $pci->body = $request->json('body', '');
        $pci->process_status = 0;
        $pci->save();

        return response();
    }

    public function test(Request $request)
    {
        $query = $request->input('query');
        Log::info($query);
        return response()->json([
            'status' => 200,
            'query'  => $query
        ]);
    }
}
