<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\Produk;
use Mockery\Undefined;
use PDF;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::all()->pluck('nama_kategori', 'id_kategori');

        return view('produk.index', compact('kategori'));
    }

    public function data()
    {
        $produk = Produk::leftJoin('kategori', 'kategori.id_kategori', 'produk.id_kategori')
            ->select('produk.*', 'nama_kategori')
            // ->orderBy('kode_produk', 'asc')
            ->get();

        return datatables()
            ->of($produk)
            ->addIndexColumn()
            ->addColumn('select_all', function ($produk) {
                return '
                    <input type="checkbox" name="id_produk[]" value="' . $produk->id_produk . '">
                ';
            })
            ->addColumn('kode_produk', function ($produk) {
                return '<span class="label label-success">' . $produk->kode_produk . '</span>';
            })
            ->addColumn('harga_beli', function ($produk) {
                return format_uang($produk->harga_beli);
            })
            ->addColumn('harga_jual', function ($produk) {
                return format_uang($produk->harga_jual);
            })
            ->addColumn('stok', function ($produk) {
                return format_uang($produk->stok);
            })
            ->addColumn('aksi', function ($produk) {
                return '

                    <button type="button" id="detail" data-id="' . $produk->id_produk . '"  onclick="showDetail()" class="btn btn-sm btn-info "><i class="fa fa-info-circle"></i></button>
                    <button type="button" id="edit" data-id="' . $produk->id_produk . '" onclick="editForm()" class="btn btn-sm btn-success "><i class="fa fa-pencil-alt"></i></button>
                    <button type="button" onclick="deleteData(`' . route('produk.destroy', $produk->id_produk) . '`)" class="btn btn-sm btn-danger "><i class="fa fa-trash"></i></button>

                ';
            })
            ->rawColumns(['aksi', 'kode_produk', 'select_all'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produk = Produk::latest()->first();
        if($produk ===null ) {

            $request['kode_produk'] = 'P' . tambah_nol_didepan((int)0 + 1, 6);
        }else{
            $request['kode_produk'] = 'P' . tambah_nol_didepan((int)$produk->id_produk + 1, 6);

        }
        $kodeProduk = $request['kode_produk'];
        $request->validate([
            'nama_produk' => 'required',
            'id_kategori' => 'required',

            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required',
            'diskon' => 'required',
            'expd' => 'required',
            'gambar' => 'required',
            'deskripsi' => 'required',
        ]);
        $gambar = $request->file('gambar');
        $field = [
            'nama_produk' => $request->nama_produk,
            'id_kategori' => $request->id_kategori,
            'harga_jual' => $request->harga_jual,
            'harga_beli' => $request->harga_beli,
            'stok' => $request->stok,
            'diskon' => $request->diskon,
            'expd' => $request->expd,
            'gambar' => $gambar->hashName(),
            'deskripsi' => $request->deskripsi,
            'kode_produk' => $kodeProduk
        ];
        $gambar->storeAs('img/produk', $gambar->hashName(), 'upload');
        return Produk::create($field);
        // $produk = Produk::create($request->all());

        // return redirect()->route('produk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produk = Produk::find($id);

        return response()->json($produk);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'nama_produk' => 'required',
            'id_kategori' => 'required',

            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required',
            'diskon' => 'required',
            'expd' => 'required',
            'gambar' => 'required',
            'deskripsi' => 'required',
        ]);
        $gambar = $request->file('gambar');
        $field = [
            'nama_produk' => $request->nama_produk,
            'id_kategori' => $request->id_kategori,

            'harga_jual' => $request->harga_jual,
            'harga_beli' => $request->harga_beli,
            'stok' => $request->stok,
            'diskon' => $request->diskon,
            'expd' => $request->expd,
            'gambar' => $gambar->hashName(),
            'deskripsi' => $request->deskripsi,
        ];
        $gambar->storeAs('img/produk', $gambar->hashName(), 'upload');
        return $produk->update($field);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::find($id);
        $produk->delete();

        return response(null, 204);
    }

    public function deleteSelected(Request $request)
    {
        foreach ($request->id_produk as $id) {
            $produk = Produk::find($id);
            $produk->delete();
        }

        return response(null, 204);
    }

    public function cetakBarcode(Request $request)
    {
        $dataproduk = array();
        foreach ($request->id_produk as $id) {
            $produk = Produk::find($id);
            $dataproduk[] = $produk;
        }

        $no  = 1;
        $pdf = PDF::loadView('produk.barcode', compact('dataproduk', 'no'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('produk.pdf');
    }


    public function getAllProduk(){
        $produk = Produk::get()->all();
        return $produk;
    }
    public function search(Request $request){


        if($request->ajax()) {
            $data = Produk::where('nama_produk', 'LIKE', $request->search.'%')
                ->get();
            if (count($data) > 0) {

                return $data;
            }
            else {

                return $data;
            }

            return $data;
        }

    }

}


