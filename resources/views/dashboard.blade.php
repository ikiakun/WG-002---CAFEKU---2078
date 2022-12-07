@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('dashboard.store') }}" class="card" method="POST">
                    @csrf
                    <div class="card-header">
                        <strong>Order</strong>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="mb-3">
                            <label for="">Menu</label>
                            <div class="form-check">
                                <input class="form-check-input" name="menu[]" value="1" type="checkbox" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Kopi Hitam Senyum Manismu
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="menu[]" value="2" type="checkbox" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Capucino nomer uno
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="menu[]" value="3" type="checkbox" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Beras Kencur
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="menu[]" value="4" type="checkbox" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Temulawak wakakaka
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="">Status</label>
                            <select name="status" id="" class="form-control">
                                <option value="">Pilih Status</option>
                                <option value="member">Member</option>
                                <option value="wong liwat">Wong Liwat</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <strong>Tagihan</strong>
                    </div>
                    <div class="card-body">
                        @isset($data)
                            <div class="mb-3">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" value="{{ $data['nama'] }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="">Jumlah Pesanan</label>
                                <input type="number" class="form-control" value="{{ $data['jmlPesanan'] }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="">Total Pesanan</label>
                                <input type="number" class="form-control" value="{{ $data['ttlPesanan'] }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="">Status</label>
                                <input type="text" class="form-control" value="{{ $data['status'] }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="">Diskon</label>
                                <input type="number" class="form-control" value="{{ $data['diskon'] }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="">Total Pembayaran</label>
                                <input type="number" class="form-control" value="{{ $data['ttlBayar'] }}" readonly>
                            </div>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection