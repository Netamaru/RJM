<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bobot;
use App\Models\Kayu;
use App\Models\Kriteria;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function perhitungan()
    {
        return view('dashboard.perhitungan', [
            'bobotData' => Bobot::all(),
            'kriteriaData' => Kriteria::all(),
            'kayuData' => Kayu::all(),
        ]);
    }
}
