<?php

namespace App\Http\Controllers;

use App\Models\Customor;
use App\Models\Inbound;
use App\Models\Outbound;
use App\Models\Suplier;
use App\Models\Wharehouse;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

            return view('dashboard', [
            'supplier' => Suplier::count(),
            'jumlah_gudang' => Wharehouse::count(),
            'jumlah_barang' => (int)Inbound::sum('volume'),
            'jumlah_Outbound' => (int)Outbound::sum('volume'),
            'gudangs' => Wharehouse::all(),
            'barangs' => Inbound::with('wharehouse')->get(),
            'outbound' => Outbound::with('wharehouse')->get(),
            'suplier' => Outbound::with('wharehouse')->get(),
            'wharehouse' => Wharehouse::all(),
            'customor' => Customor::all(),
            'inbound' => Inbound::sum('volume'),
            'outbound' => Outbound::sum('volume')
            // 'data' => Laporan::latest()->limit(6)->get()
        ]);
    }
}
