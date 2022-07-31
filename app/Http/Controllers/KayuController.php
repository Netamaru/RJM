<?php

namespace App\Http\Controllers;

use App\Models\Bobot;
use App\Models\Kayu;
use App\Models\Kriteria;
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
            'kayuData' => Kayu::all(),
            'kriteriaData' => Kriteria::all()
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
        if ($request['Umur_Kayu'] == null || $request['Kadar_Air'] == null || $request['Jenis_Kayu'] == null) return back()->with('dataError', 'Data kayu belum ada, silahkan tambah data melalui menu input bobot');
        if (Kayu::where('data1', $request['Jenis_Kayu'])->where('data2', $request['Kadar_Air'])->where('data3', $request['Umur_Kayu'])->count() >= 1) return back()->with('dataError', 'Data sudah ada di database');

        $bobot = new Bobot();
        $getBobot1 = $bobot->where('keterangan', $request['Jenis_Kayu'])->value('bobot');
        $getBobot2 = $bobot->where('keterangan', $request['Kadar_Air'])->value('bobot');
        $getBobot3 = $bobot->where('keterangan', $request['Umur_Kayu'])->value('bobot');

        $kayu = new Kayu();
        $kayu->data1 = $request['Jenis_Kayu'];
        $kayu->data2 = $request['Kadar_Air'];
        $kayu->data3 = $request['Umur_Kayu'];
        $kayu->bobot1 = $getBobot1;
        $kayu->bobot2 = $getBobot2;
        $kayu->bobot3 = $getBobot3;
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
