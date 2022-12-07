@extends('layouts.app')

@section('content')
    <h2>Tambah User</h2>
    <br>
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" name="email">
        </div>
        <div class="mb-3">
          <label class="form-label">Nama</label>
          <input type="text" class="form-control" name="name">
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" class="form-control" name="password">
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