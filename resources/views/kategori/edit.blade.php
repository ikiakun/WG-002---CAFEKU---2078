@extends('layouts.app')

@section('content')
    <h2>Edit Kategori</h2>
    <br>
    <form action="{{ route('kategori.update', $data->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
          <label class="form-label">Nama Kategori</label>
          <input type="text" class="form-control" name="nama">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

@endsection