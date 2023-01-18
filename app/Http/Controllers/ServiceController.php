<?php

namespace App\Http\Controllers;

use App\Models\service;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Exports\ServiceExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
class ServiceController extends Controller
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
    public function index()
    {
        $usersId=Auth::user()->id;
        // $service = service::latest()->find($usersId);
        $service = service::latest()->paginate(5);
        return view('service.index',compact('service'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $request->validate(
            [
                'name' => 'required|max:8000',
                'deskripsi' => 'required',
                'alamat' => 'required',
                'noHp' => 'required',
                'kategori' => 'required',
                'namaToko' => 'required|max:100',
                'gambar' => 'required|image|mimes:jpeg,png,jpg|max:5000',
            ]);
            $usersId=Auth::user()->id;
            $file = $request->file('gambar');
            $namaFile = $file->getClientOriginalName();
            $tujuanFile = 'asset/gambar';

            $file->move($tujuanFile, $namaFile);

            $newService = new service;
            $newService->name = $request->name;
            $newService->alamat = $request->alamat;
            $newService->noHp = $request->noHp;
            $newService->kategori = $request->kategori;
            $newService->namaToko = $request->name;
            $newService->deskripsi = $request->namaToko;
            $newService->usersId = $usersId;
            $newService->gambar = $namaFile;
            $newService->save();

            return redirect()->route('service.index')
            ->with('success','Item Berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(service $service)
    {
        return view('service.show',compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(service $service)
    {
        return view('service.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$service)
    {
        $request->validate(
            [
                'name' => 'required|max:8000',
                'deskripsi' => 'required',
                'alamat' => 'required',
                'noHp' => 'required',
                'kategori' => 'required',
                'namaToko' => 'required|max:100',
            ]);

            service::where('id', $service)
                ->update([
                    'name' => $request->name,
                    'deskripsi' => $request->deskripsi,
                    'alamat' => $request->alamat,
                    'noHp' => $request->noHp,
                    'kategori' => $request->kategori,
                    'namaToko' => $request->namaToko,
                ]);
               return redirect()->route('service.index')
               ->with('success','Data sudah diperbaharui');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(service $service)
    {
        $service->delete();

        return redirect()->route('service.index')
                        ->with('success','Data berhasil dihapus');
    }

    public function cetak_pdf()
    {
    $service = service::all();
	$pdf = PDF::loadview('service.service_pdf',['service'=>$service]);
	return $pdf->stream();
    }

    public function export_excel()
	{
		return Excel::download(new ServiceExport, 'service.xlsx');
	}
}
