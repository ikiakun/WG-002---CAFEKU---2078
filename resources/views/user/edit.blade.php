@extends('layouts.app')

@section('content')
    <h2>Edit User</h2>
    <br>
    <form action="{{ route('user.update', $data->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" value="{{ $data->email }}" readonly>
        </div>
        <div class="mb-3">
          <label class="form-label">Nama</label>
          <input type="text" class="form-control" value="{{ $data->name }}" readonly>
        </div>
        <div class="mb-3">
          <label class="form-label">Role</label>
          <select name="role" id="" class="form-control">
            <option value="admin">Admin</option>
            <option value="owner">Owner</option>
          </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
@endsection