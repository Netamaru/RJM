@extends('layouts.main')
@section('container')
    @php
    $nomorA = 0;
    $nomorB = 0;
    $nomorC = 0;
    $nomorD = 0;
    $nomorE = 0;

    $_bobot = [];
    $_maxC1 = $kayuData->max('bobot1');
    $_maxC2 = $kayuData->max('bobot2');
    $_maxC3 = $kayuData->max('bobot3');

    $_minC1 = $kayuData->min('bobot1');
    $_minC2 = $kayuData->min('bobot2');
    $_minC3 = $kayuData->min('bobot3');

    //normalisasi
    $nC1 = [];
    $nC2 = [];
    $nC3 = [];

    //perhitungan normalisasi
    foreach ($kayuData as $kayu) {
        if ($kriteriaData->where('kriteria', $bobotData->where('keterangan', $kayu->data1)->value('kriteria'))->value('tipe') == 'cost') {
            $_temp = $_minC1 / $kayu->bobot1;
            array_push($nC1, round($_temp, 3));
        }
        if ($kriteriaData->where('kriteria', $bobotData->where('keterangan', $kayu->data1)->value('kriteria'))->value('tipe') == 'benefit') {
            $_temp = $kayu->bobot1 / $_maxC1;
            array_push($nC1, round($_temp, 3));
        }

        if ($kriteriaData->where('kriteria', $bobotData->where('keterangan', $kayu->data2)->value('kriteria'))->value('tipe') == 'cost') {
            $_temp = $_minC2 / $kayu->bobot2;
            array_push($nC2, round($_temp, 3));
        }
        if ($kriteriaData->where('kriteria', $bobotData->where('keterangan', $kayu->data2)->value('kriteria'))->value('tipe') == 'benefit') {
            $_temp = $kayu->bobot2 / $_maxC2;
            array_push($nC2, round($_temp, 3));
        }

        if ($kriteriaData->where('kriteria', $bobotData->where('keterangan', $kayu->data3)->value('kriteria'))->value('tipe') == 'cost') {
            $_temp = $_minC3 / $kayu->bobot3;
            array_push($nC3, round($_temp, 3));
        }
        if ($kriteriaData->where('kriteria', $bobotData->where('keterangan', $kayu->data3)->value('kriteria'))->value('tipe') == 'benefit') {
            $_temp = $kayu->bobot3 / $_maxC3;
            array_push($nC3, round($_temp, 3));
        }
    }

    foreach ($kriteriaData as $kriteria) {
        array_push($_bobot, $kriteria->bobot);
    }

    //perhitungan nilai
    $nilai = [];
    $index = 0;
    $ranking = [];
    foreach ($kayuData as $kayu) {
        $_temp = $nC1[$index] * $_bobot[0] + $nC2[$index] * $_bobot[1] + $nC3[$index] * $_bobot[2];
        array_push($nilai, round($_temp, 2));
        $index++;
    }

    $ordered_values = $nilai;
    rsort($ordered_values);
    foreach ($nilai as $key => $value) {
        foreach ($ordered_values as $ordered_key => $ordered_value) {
            if ($value === $ordered_value) {
                $key = $ordered_key;
                break;
            }
        }
        array_push($ranking, (int) $key + 1);
    }
    @endphp

    <h1>Perhitungan</h1>
    <div class="position-relative">
        <div class="card position-absolute top-0 start-50 translate-middle-x overflow-auto"
            style="width: 50rem; max-height: 45rem; height: auto">
            <div class="card-body">

                <h5 class="card-title pt-3">Kriteria Bobot</h5>
                <table class="table">
                    <thead>

                        <tr>
                            <th scope="col">Kriteria</th>
                            <th scope="col">Bobot</th>
                            <th scope="col"></th>
                        </tr>

                    </thead>
                    <tbody>

                        @foreach ($kriteriaData as $kriteria)
                            <tr>
                                <td>{{ $kriteria->kriteria . ' (C' . ($nomorB += 1) . ')' }}</td>
                                <td>{{ $kriteria->bobot }}</td>
                                <td><b>{{ $kriteria->tipe }}</b></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

                <h5 class="card-title pt-3">Matrik Awal</h5>
                <table class="table">
                    <thead>

                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">C1</th>
                            <th scope="col">C2</th>
                            <th scope="col">C3</th>
                        </tr>

                    </thead>
                    <tbody>

                        @foreach ($kayuData as $kayu)
                            <tr>
                                <th scope="row">{{ $nomorA += 1 }}</th>
                                <td>{{ $kayu->bobot1 }}</td>
                                <td>{{ $kayu->bobot2 }}</td>
                                <td>{{ $kayu->bobot3 }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

                <h5 class="card-title pt-3">Matrik Normalisasi</h5>
                <table class="table">
                    <thead>

                        <tr>
                            <th scope="col">C1</th>
                            <th scope="col">C2</th>
                            <th scope="col">C3</th>
                        </tr>

                    </thead>
                    <tbody>

                        @foreach ($nC1 as $data)
                            <tr>
                                <td>{{ $nC1[$nomorC] }}</td>
                                <td>{{ $nC2[$nomorC] }}</td>
                                <td>{{ $nC3[$nomorC++] }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

                <h5 class="card-title pt-3">Perhitungan Akhir</h5>
                <table class="table">
                    <thead>

                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nilai</th>
                            <th scope="col">Ranking</th>
                        </tr>

                    </thead>
                    <tbody>
                        @php

                        @endphp

                        @foreach ($nilai as $data)
                            <tr>
                                <th scope="row">{{ $nomorD += 1 }}</th>
                                <td>{{ $data }}</td>
                                <td>{{ $ranking[$nomorE++] }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
