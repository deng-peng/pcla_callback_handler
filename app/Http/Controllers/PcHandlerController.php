<?php

namespace App\Http\Controllers;

use App\PcItem;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class PcHandlerController extends Controller
{
    public function handle(Request $request)
    {
        $token = $request->input('token');

        if ($token != 'pcla')
            abort(400);

        $decompressed = gzdecode($request->getContent());
//        Log::debug($decompressed);

        $data_arr = json_decode($decompressed, true);
//        Log::debug($data_arr);

        $pci = new PcItem();
        $pci->url = Arr::get($data_arr, 'url');
        $pci->pc_status = Arr::get($data_arr, 'pc_status');
        $pci->original_status = Arr::get($data_arr, 'original_status');
        $pci->body = Arr::get($data_arr, 'body');
        $pci->process_status = 0;
        $pci->save();
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
