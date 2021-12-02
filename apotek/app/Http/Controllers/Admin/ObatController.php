<?php

namespace App\Http\Controllers\Admin;



// use yajra\DataTables\Facades\DataTables;
use App\Models\Obat;
use App\Models\Setting;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
// use DataTables;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::first();
        $data = Obat::all();
        $kategori = Kategori::all();
        return view('admin.produk.dataobat', compact('data', 'kategori', 'setting'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        $request->validate([
            'nama_obat' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'kategori_id' => 'required',
            'expd' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required'
        ]);
        $gambar = $request->file('gambar');
        $field = [
            'nama_obat' => $request->nama_obat,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'kategori_id' => $request->kategori_id,
            'expd' => $request->expd,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar->HashName(),
        ];
        $gambar->storeAs('img/obat', $gambar->hashName(), 'upload');

        return Obat::create($field);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function show(Obat $obat)
    {
        return $obat;
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Obat $obat)
    {
        $request->validate([
            'nama_obat' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'kategori_id' => 'required',
            'expd' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required'
        ]);
        $gambar = $request->file('gambar');
        $field = [
            'nama_obat' => $request->nama_obat,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'kategori_id' => $request->kategori_id,
            'expd' => $request->expd,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar->HashName(),
        ];
        $gambar->storeAs('img/obat', $gambar->hashName(), 'upload');

        return $obat->update($field);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Obat $obat)
    {
        return $obat->delete();
    }

    public function getDataObat(Request $request)
    {
        if ($request->ajax()) {
            $data = Obat::with('kategori')->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button class="btn edit" data-toggle="modal" data-target="#edit-obat" data-id="' . $row->id . '"><i class="fa fa-edit"></i></button> <button class="btn delete " data-id="' . $row->id . '" ><i class="fa fa-trash "></i></button> ';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function showDeskripsi(Request $request)
    {
        if ($request->ajax()) {
            $data = Obat::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button class="btn edit" data-toggle="modal" data-target="#edit-obat" data-id="' . $row->id . '"><i class="fa fa-edit"></i></button> <button class="btn delete " data-id="' . $row->id . '" ><i class="fa fa-trash "></i></button> ';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.produk.deskripsiObat');
    }
}
