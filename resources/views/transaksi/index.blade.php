@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <form action="{{ url('voucher/cetak-voucher-banyak') }}" method="post">
                    @csrf
                    <input type="number" class="form-control" name="jumlah">
                    <button class="btn btn-success mt-2" type="submit">Cetak Voucher</button>
                </form>
            </div>
        </div>
    </div>
    <div class="card">
        {{-- <div class="card-header"> --}}
        {{-- <a href="{{ url('voucher/cetak-voucher') }}" class="btn btn-primary float-right">Cetak Voucher Satuan</a> --}}
        {{-- </div> --}}
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Voucher</th>
                        <th>Saldo</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->id }}</td>
                            <td>Rp. {{ number_format($item->saldo, 2, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('transaksi.edit', $item->id) }}" class="btn btn-warning">Top up</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nomor</th>
                        <th>Voucher</th>
                        <th>Saldo</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
