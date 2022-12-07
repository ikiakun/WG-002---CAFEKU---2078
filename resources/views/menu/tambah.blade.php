@extends('layouts.app')

@section('content')
    
    <h2>Tambah Menu</h2>
    <br>
    <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label class="form-label">Nama</label>
          <input type="text" class="form-control" name="nama">
        </div>
        <div class="mb-3">
          <label class="form-label">Foto</label>
          <input type="file" class="form-control" name="foto">
        </div>
        <div class="mb-3">
          <label class="form-label">Harga</label>
          <input type="number" class="form-control" name="harga" value="20000">
        </div>
        <div class="mb-3">
          <label class="form-label">Keterangan</label>
          <select name="keterangan" class="form-control">
            <option value="tersedia">Tersedia</option>
            <option value="habis">Habis</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Kategori</label>
          <select name="kategori_id" class="form-control">
            <option value="">Pilih Kategori</option>
            @foreach ($data as $item)
                <option value="{{ $item->id }}">{{ $item->nama }}</option>
            @endforeach
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    
@endsection