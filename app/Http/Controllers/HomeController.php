<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\service;
use App\Models\transaksi;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {   
        if(!$request){
            $newServices=service::get();
            }
        else if($request->kategori == "semua"){
                $newServices=service::get();
            }else{
                $newServices=service::where('kategori',$request->kategori)->get(); 
            }//  dd($newServices);
            return view('awal',compact('newServices') );
    }
    public function create()
    {   
        $newTransaksis=transaksi::all();
        return view('transaksi',compact('newTransaksis'));
    }
    public function store(Request $request)
    {   
        $newTransaksis=transaksi::all();
        $request->validate(
            [
                'name' => 'required|max:8000',
                'noHp' => 'required',
                'jenis' => 'required',
            ]);
            $produkId=Auth::service()->id;

            $transaksi = new transaksi;
            $transaksi->name = $request->name;
            $transaksi->noHp = $request->noHp;
            $transaksi->jenis = $request->jenis;
            $transaksi->produkId = $produkId;
            $transaksi->save();

            return redirect()->route('/',compact('newTransaksis'))
            ->with('Berhasil','Transaksi Berhasil ditambahkan.');
    }
    public function show(Request $request,$service)
    {
            $services=service::where('id',$service)->get(); 
            return view('lihat',compact('services') );
    }
}
