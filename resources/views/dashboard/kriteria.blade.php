@extends('layouts.main')
@section('container')
    <h1>Kriteria</h1>
    {!! Session::get('dataDeleted')
        ? '<p class="fs-5 border border-success rounded-1 text-center bg-success bg-opacity-10 w-100 mb-3">' .
            Session::get('dataDeleted') .
            '</p>'
        : '' !!}
    {!! Session::get('dataEdited')
        ? '<p class="fs-5 border border-success rounded-1 text-center bg-success bg-opacity-10 w-100 mb-3">' .
            Session::get('dataEdited') .
            '</p>'
        : '' !!}
    {!! Session::get('dataError')
        ? '<p class="fs-5 border border-danger rounded-1 text-center bg-danger bg-opacity-10">' .
            Session::get('dataError') .
            '</p>'
        : '' !!}
    {!! Session::get('dataAdded')
        ? '<p class="fs-5 border border-success rounded-1 text-center bg-success bg-opacity-10">' .
            Session::get('dataAdded') .
            '</p>'
        : '' !!}
    <div class="row justify-content-between">
        <div class="card mb-3" style="width: 50rem;">
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
                    @php
                        $number = 0;
                    @endphp
                    @foreach ($data as $kriteria)
                        <tr>
                            <th scope="row">{{ $number += 1 }}</th>
                            <td>{{ $kriteria->pendukung_keputusan }}</td>
                            <td>{{ $kriteria->kriteria }}</td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-link text-warning" data-bs-toggle="modal"
                                    data-bs-target="#editData{{ $kriteria->id }}"><i class="bi bi-pencil-fill"></i></button>

                                <!-- Modal -->
                                <div class="modal fade" id="editData{{ $kriteria->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit kriteria
                                                    <b>{{ $kriteria->kriteria }}</b>
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form method="post" action="{{ route('kriteria.edit', $kriteria->id) }}">
                                                @csrf
                                                {{ method_field('GET') }}
                                                <div class="modal-body">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">Nama
                                                            Kriteria</span>
                                                        <input type="text" class="form-control" placeholder="Kriteria"
                                                            name="kriteria" required pattern="\S(.*\S)?"
                                                            value="{{ $kriteria->kriteria }}" aria-label="kriteria">
                                                        {{ Request::input('kriteria') }}
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Button hapus -->
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
        <div class="card mb-3" style="width: 25rem; height: 18rem;">
            <h3 class="mt-3 text-primary">Input Kriteria</h3>
            <div class="container">
                <form method="post" target="dashboard/kriteria">
                    @csrf
                    <label for="title" class="mt-3">Nama Kriteria</label>
                    <input type="text" class="form-control" placeholder="Masukkan Nama..." aria-label="kriteria"
                        id="kriteria" name="kriteria" required pattern="\S(.*\S)?">
                    <fieldset disabled>
                        <label for="disabledTextInput" class="mt-3">Nama Atribut</label>
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Pemilihan Kayu">
                    </fieldset>
                    <button type="submit" class="btn btn-primary mt-3 mb-3 w-100">Simpan</button>

                </form>
            </div>
        </div>
    </div>
@endsection
