<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@extends('layouts.adm-main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if(Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <a href="{{ route('barangkeluar.create') }}" class="btn btn-md btn-success mb-3">TAMBAH BARANG KELUAR</a>
                    </div>
                </div>


                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>TANGGAL KELUAR</th>
                            <th>QTY</th>
                            <th>BARANG</th>
                            <th>SERI</th>
                            <th style="width: 15%">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rsetBarangKeluar as $rowbarangkeluar)
                            <tr>
                                <td>{{ $rowbarangkeluar->id  }}</td>
                                <td>{{ $rowbarangkeluar->tgl_keluar  }}</td>
                                <td>{{ $rowbarangkeluar->qty_keluar  }}</td>
                                <td>{{ $rowbarangkeluar->barang->merk  }}</td>
                                <td>{{ $rowbarangkeluar->barang->seri  }}</td>
                                <td class="text-center"> 
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('barangkeluar.destroy', $rowbarangkeluar->id) }}" method="POST">
                                        <a href="{{ route('barangkeluar.show', $rowbarangkeluar->id) }}" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('barangkeluar.edit', $rowbarangkeluar->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil-alt"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                                
                                
                            </tr>
                        @empty
                            <div class="alert">
                                Data Siswa belum tersedia
                            </div>
                        @endforelse
                    </tbody>
                    
                </table>
                {{-- {{ $barangkeluar->links() }} --}}

            </div>
        </div>
    </div>
@endsection
</body>
</html>


