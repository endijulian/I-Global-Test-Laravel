@extends('layouts.admin')

@section('title')
    Data Karyawan
@endsection

@section('content')
    
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Data Karyawan</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">List Karyawan</h4>
                            
                            <form action="{{route('karyawan.index')}}" method="get">
                                <div class="col-md-6">
                                    <input id="keyword" class="form-control" type="text" name="keyword" value="{{Request::get('keyword')}}" placeholder="Search Karyawan">

                                    <button type="submit" class="btn btn-info">Search</button>
                                </div>
                            </form>

                            <form action="{{route('karyawan.create')}}" method="get" class="float-right">
                                @csrf
                                <button type="submit" class="btn btn-primary">Tambah Data  <i class="nav-icon icon-plus"></i></button>
                            </form>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success">{{ session('status') }}</div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Karyawan</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Telpon</th>
                                            <th>Alamat</th>
                                            <th>Departement</th>
                                            <th>Proyek</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{--  @php
                                            $no=0;
                                        @endphp  --}}
                                        @forelse ($karyawan as $val)

                                        {{--  @php
                                            $no++;
                                        @endphp  --}}

                                        <tr>
                                            {{--  <td>{{$no}}</td>  --}}
                                            <td>{{$loop->iteration + ($karyawan->perPage()) * ($karyawan->currentPage() - 1)}}</td>
                                            <td><strong>{{ $val->nama_karyawan }}</strong></td>
                                            <td>{{ $val->jenis_kelamin }}</td>
                                            <td>{{ $val->telpon }}</td>
                                            <td>{{ $val->alamat }}</td>
                                            {{--  <td>{{ $val->departement_id }}</td>  --}}
                                            <td>{{ $val->departemen->nama_department }}</td>
                                            {{--  <td>{{ $val->proyek_id}}</td>  --}}
                                            <td>{{ $val->proyek->nama_proyek }}</td>
                                            <td>
                                                <form action="{{ route('karyawan.destroy', $val->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('karyawan.edit', $val->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <button class="btn btn-danger btn-sm" onclick="alert('Yakin ingin di hapus?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>

                                        @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            {!! $karyawan->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection