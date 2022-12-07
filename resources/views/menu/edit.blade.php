@extends('layouts.app')

@section('content')
    
    <h2>Edit Menu</h2>
    <br>
    <form action="{{ route('menu.update', $data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
          <label class="form-label">Nama</label>
          <input type="text" class="form-control" name="nama" value="{{ $data->nama }}">
        </div>
        <div class="mb-3">
          <label class="form-label">Foto</label>
          <img src="{{ asset('storage/'.$data->foto) }}" alt="" style="height: 50px">
          <input type="file" class="form-control" name="foto">
        </div>
        <div class="mb-3">
          <label class="form-label">Harga</label>
          <input type="number" class="form-control" name="harga" value="{{ $data->harga }}">
        </div>
        <div class="mb-3">
          <label class="form-label">Keterangan</label>
          <select name="keterangan" id="" class="form-control">
            <option value="tersedia">Tersedia</option>
            <option value="habis">Habis</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Kategori</label>
          <select name="kategori_id" class="form-control">
            <option value="">Pilih Kategori</option>
            @foreach ($data2 as $item)
                <option value="{{ $item->id }}" @selected($data->kategori_id==$item->id)>{{ $item->nama }}</option>
            @endforeach
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    
@endsection