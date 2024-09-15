<?php

namespace App\Http\Controllers;

use App\Events\VoucherCreated;
use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function store(Request $request)
    {
        $voucher = Voucher::create([
            'title' => $request->title,
            'description' => $request->description,
            'discount' => $request->discount,
        ]);

        broadcast(new VoucherCreated($voucher))->toOthers();

        return response()->json(['message' => 'Voucher created successfully!']);
    }
}
