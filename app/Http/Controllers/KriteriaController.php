<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Http\Requests\StoreKriteriaRequest;
use App\Http\Requests\UpdateKriteriaRequest;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.kriteria', [
            'data' => Kriteria::all(),
            'kriteria' => Kriteria::all()
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
     * @param  \App\Http\Requests\StoreKriteriaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKriteriaRequest $request)
    {
        // if (Kriteria::where('kriteria', $request['kriteria'])->count() == 1) return back()->with('dataError', 'Kriteria <b>' . $request['kriteria'] . '</b> sudah ada di database');
        // Kriteria::Create(['kriteria' => $request['kriteria']]);
        // return back()->with('dataAdded', 'Kriteria <b>' . $request['kriteria'] . '</b> berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function show(Kriteria $kriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function edit($id, StoreKriteriaRequest $request)
    {
        $data = Kriteria::find($id);
        if (Kriteria::where('kriteria', $request['kriteria'])->where('bobot', $request['bobot'])->where('tipe', $request['tipe'])->count() == 1) return back();
        $data->update(['kriteria' => $request['kriteria'], 'bobot' => $request['bobot'], 'tipe' => $request['tipe']]);
        return back()->with('dataEdited', 'Kriteria berhasil diedit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKriteriaRequest  $request
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKriteriaRequest $request, Kriteria $kriteria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Kriteria $kriteria)
    // {
    //     $kriteria->delete();
    //     return redirect('/dashboard/kriteria');
    // }

    public function tambah(StoreKriteriaRequest $request)
    {
        if (Kriteria::where('kriteria', $request['kriteria'])->count() == 1) return back()->with('dataError', 'Kriteria <b>' . $request['kriteria'] . '</b> sudah ada di database');
        Kriteria::Create(['kriteria' => $request['kriteria'], 'bobot' => $request['bobot'], 'tipe' => $request['tipe']]);
        return back()->with('dataAdded', 'Kriteria <b>' . $request['kriteria'] . '</b> berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $data = Kriteria::find($id);
        $kriteria = $data->kriteria;
        $data->delete();
        return back()->with('dataDeleted', 'Kriteria <b>' . $kriteria . '</b> berhasil dihapus');
    }
}
