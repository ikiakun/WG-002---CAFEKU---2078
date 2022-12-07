@extends('layouts.app')

@section('content')
    <h2>Daftar Menu</h2>
    <br>
    <a href="{{ route('menu.create') }}" class="btn btn-primary">Tambah Menu</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="row">No</th>
                <td>Nama</td>
                <td>Foto</td>
                <td>Harga</td>
                <td>Katerangan</td>
                <td>Kategori</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <th scope="col">{{ $loop->iteration }}</th>
                    <td>{{ $item->nama }}</td>
                    <td>
                        <img src="{{ asset('storage/'.$item->foto) }}" alt="Blm ada foto" height="55px">
                    </td>
                    <td>Rp. {{ $item->harga }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>{{ $item->kategori->nama }}</td>
                    <td>
                        <a href="{{ route('menu.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('menu.destroy', $item->id) }}" class="d-inline" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Delete</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection