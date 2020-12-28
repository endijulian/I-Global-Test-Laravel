@extends('layouts.admin')

@section('title')
    Departement
@endsection

@section('content')
    
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Data Departement</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">List Departement</h4>

                            <form action="{{route('departement.index')}}" method="get">
                                    <div class="col-md-6">
                                        <input id="keyword" class="form-control" type="text" name="keyword" value="{{Request::get('keyword')}}" placeholder="Search Department......">

                                        <button type="submit" class="btn btn-info">Search</button>
                                    </div>
                            </form>
                            
                            <form action="{{route('departement.create')}}" method="get" class="float-right">
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
                                            <th>Nama Departement</th>
                                            <th>Lantai</th>
                                            <th>Created At</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        {{--  @php
                                            $no=0;
                                        @endphp  --}}

                                        @forelse ($depart as $val)

                                        {{--  @php
                                            $no++;
                                        @endphp  --}}

                                        <tr>
                                            {{--  <td>{{$no}}</td>  --}}
                                            <td>{{$loop->iteration + ($depart->perPage()) * ($depart->currentPage() - 1)}}</td>
                                            <td><strong>{{ $val->nama_department }}</strong></td>
                                            <td>{{ $val->lantai }}</td>
                                            <td>{{ $val->created_at->format('d-m-Y') }}</td>
                                            <td>
                                            
                                                <form action="{{ route('departement.destroy', $val->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('departement.edit', $val->id) }}" class="btn btn-warning btn-sm">Edit</a>
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
                            {!! $depart->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
