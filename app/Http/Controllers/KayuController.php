<?php

namespace App\Http\Controllers;

use App\Models\Bobot;
use App\Models\Kayu;
use App\Http\Requests\StoreKayuRequest;
use App\Http\Requests\UpdateKayuRequest;

class KayuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.kayu', [
            'bobotData' => Bobot::all(),
            'kayuData' => Kayu::all()
        ]);
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
     * @param  \App\Http\Requests\StoreKayuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKayuRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kayu  $kayu
     * @return \Illuminate\Http\Response
     */
    public function show(Kayu $kayu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kayu  $kayu
     * @return \Illuminate\Http\Response
     */
    public function edit($id, StoreKayuRequest $request)
    {
        // @dd($request);
        $data = Kayu::find($id);
        if (Kayu::where('jenis_kayu', $request['jenis_kayu'])->where('kadar_air', $request['kadar_air'])->where('umur_kayu', $request['umur_kayu'])->count() >= 1) return back();
        $data->jenis_kayu = $request['jenis_kayu'];
        $data->kadar_air = $request['kadar_air'];
        $data->umur_kayu = $request['umur_kayu'];
        $data->save();
        return back()->with('dataAdded', 'Data kayu berhasil diedit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKayuRequest  $request
     * @param  \App\Models\Kayu  $kayu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKayuRequest $request, Kayu $kayu)
    {
        //
    }

    public function tambah(StoreKayuRequest $request)
    {
        if ($request['jenis_kayu'] == null || $request['kadar_air'] == null || $request['umur_kayu'] == null) return back()->with('dataError', 'Data kayu belum ada, silahkan tambah data melalui menu input bobot');
        if (Kayu::where('jenis_kayu', $request['jenis_kayu'])->where('kadar_air', $request['kadar_air'])->where('umur_kayu', $request['umur_kayu'])->count() >= 1) return back()->with('dataError', 'Data sudah ada di database');
        $kayu = new Kayu;
        $kayu->jenis_kayu = $request['jenis_kayu'];
        $kayu->kadar_air = $request['kadar_air'];
        $kayu->umur_kayu = $request['umur_kayu'];
        $kayu->save();
        return back()->with('dataAdded', 'Data kayu berhasil ditambah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kayu  $kayu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Kayu::find($id);
        $data->delete();
        return back()->with('dataDeleted', 'Data kayu berhasil dihapus');
    }
}
