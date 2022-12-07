@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            @foreach ($data as $item)
                <div class="card ms-3 mt-3" style="width: 15rem">
                    <div class="card-header text-center mb-2"><strong>{{ $item->nama }}</strong></div>
                    <img src="{{ asset('storage/'. $item->foto) }}" class="card-img-top" alt="Foto tidak tersedia">
                    <div class="card-body">
                        <h6 class="card-title"><span>Rp {{ $item->harga }}</span></h6>
                        <h6>Kategori : <span>{{ $item->kategori->nama }}</span></h6>
                        <p class="card-text">Keterangan : {{ $item->keterangan }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
