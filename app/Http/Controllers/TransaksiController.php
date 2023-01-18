<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use App\Models\service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use DataTables;

class TransaksiController extends Controller
{
    function __construct()
    {
        //  $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
        //  $this->middleware('permission:product-create', ['only' => ['create','store']]);
        //  $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
        //  $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $data = transaksi::latest()->get();
        return view('transaksi.index',compact('data'));
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {   
        try {
            transaksi::updateOrCreate(['name' => $request->name],
                ['jenis' => $request->jenis, 'noHp' => $request->noHp,'namaToko'=> $request->namaToko]);        

                return response()->json([
                'alert' => 'success',
                'message' => 'Request Transaksi '. $request->name . ' sudah dikirim',
                ]);
            }
            catch (Exception $e) {
                return response()->json([
                    'alert' => 'error',
                    'message' => 'Request Transaksi '. $request->name . ' gagal dikirim',
                    ]);
            }
        }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaksi  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksi = transaksi::find($id);
        return response()->json($transaksi);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        transaksi::find($id)->delete();
        return redirect()->route('transaksi.index')
        ->with('success','Data transaksi sudah dihapus');
    }
    public function show(transaksi $transaksi)
    {
        return view('transaksi.show',compact('transaksi'));
    }
    public function search(Request $request)
    {
        if($request->has('q')){
            $q=$request->q;
            $result=transaksi::where('name','like','%' .$q.'%') ->orWhere('jenis', 'like', '%'.$q.'%')->get();
            return response()->json(['data'=>$result]);
        }else{
            return view('transaksi.index');
        }
    }

}
