<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Deskripsi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DeskripsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataObat = Obat::all();
        return view('admin.deskripsiObat', compact('dataObat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'obat_id' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required'
        ]);
        return Deskripsi::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Deskripsi $deskripsi)
    {
        return $deskripsi;
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
    public function update(Request $request, Deskripsi $deskripsi)
    {
      $request->validate([
            'obat_id' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required'
        ]);
        return $deskripsi->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deskripsi $deskripsi)
    {
        return $deskripsi->delete();
    }

    public function getDeskripsi(Request  $request)
    {
        if ($request->ajax()) {
            $data = Deskripsi::with('obat')->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button class="btn edit" data-toggle="modal" data-target="#e-deskripsi" data-id="' . $row->id . '"><i class="fa fa-edit"></i></button> <button class="btn delete " data-id="' . $row->id . '" ><i class="fa fa-trash "></i></button> ';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
