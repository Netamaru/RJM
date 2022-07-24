@extends('layouts.main')
@section('container')
    <h1>Kriteria</h1>
    <div class="row justify-content-between">
        <div class="card" style="width: 50rem;">
            <h3 class="pt-3 text-primary">Daftar Kriteria</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Pendukung Keputusan</th>
                        <th scope="col">Kriteria</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $number = 0;
                    ?>
                    @foreach ($data as $kriteria)
                        <tr>
                            <th scope="row">{{ $number += 1 }}</th>
                            <td>{{ $kriteria->pendukung_keputusan }}</td>
                            <td>{{ $kriteria->kriteria }}</td>
                            <td>
                                <button type="button" class="btn btn-link text-warning"><i
                                        class="bi bi-pencil-fill"></i></button>
                                <form method="post" action="{{ route('kriteria.destroy', $kriteria->id) }}"
                                    style="display:inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-link text-danger"
                                        onclick="return confirm ('Apakah anda yakin ingin menghapus data ini?')"><i
                                            class="bi bi-trash-fill"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card" style="width: 25rem;">
            <h3 class="pt-3 text-primary">Daftar Kriteria</h3>
            <div class="container">
                <form method="post" target="dashboard/kriteria/">
                    @csrf
                    <label for="title">Nama Kriteria</label>
                    <input type="text" class="form-control" placeholder="Masukkan Nama..." aria-label="kriteria"
                        id="kriteria" name="kriteria" required pattern="\S(.*\S)?">
                    <fieldset disabled class="mt-2">
                        <label for="disabledTextInput">Nama Atribut</label>
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Pemilihan Kayu">
                    </fieldset>
                    <button type="submit" class="btn btn-primary mt-3" style="width: 22rem;">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
