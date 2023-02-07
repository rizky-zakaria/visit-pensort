@extends('layouts.app')
@section('content')
    <div class="card">
        <form action="{{ route('transaksi.update', $id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="card-header">
                <button class="btn btn-success float-right">Update</button>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <input type="number" class="form-control" name="jumlah">
                </div>
            </div>
        </form>
    </div>
@endsection
