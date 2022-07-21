<?php

namespace App\Http\Controllers;

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
        return view('dashboard.kayu');
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
    public function edit(Kayu $kayu)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kayu  $kayu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kayu $kayu)
    {
        //
    }
}
