@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <form action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name" placeholder="Nama" required>
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                        <div class="col-md-6 mt-2">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        <div class="col-md-6 mt-2">
                            <select name="role" id="role" class="form-control" required>
                                <option disabled selected>Pilih Role</option>
                                <option value="petugas">Petugas</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-success mt-2" type="submit">Simpan</button>
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->role }}</td>
                            <td>
                                @if ($item->role === 'petugas')
                                    <button href="" class="btn btn-danger" data-toggle="modal"
                                        data-target="#exampleModal">
                                        <i class="fas fa-trash"></i>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nomor</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus item ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <form action=" {{ route('user.destroy', $item->id) }} " method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
