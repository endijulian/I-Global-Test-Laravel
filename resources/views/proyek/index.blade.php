@extends('layouts.admin')

@section('title')
    Proyek
@endsection

@section('content')
    
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Proyek</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">List Proyek</h4>

                            <form action="{{route('proyek.index')}}" method="get">
                                <div class="col-md-6">
                                    <input id="keyword" class="form-control" type="text" name="keyword" value="{{Request::get('keyword')}}" placeholder="Search Proyek......">

                                    <button type="submit" class="btn btn-info">Search</button>
                                </div>
                            </form>
                            
                            <form action="{{route('proyek.create')}}" method="get" class="float-right">
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
                                            <th>Nama Proyek</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Selesai</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        {{--  @php
                                            $no=0;
                                        @endphp  --}}

                                        @forelse ($proyek as $val)

                                        {{--  @php
                                            $no++;
                                        @endphp  --}}

                                        <tr>
                                            {{--  <td>{{$no}}</td>  --}}
                                            <td>{{$loop->iteration + ($proyek->perPage()) * ($proyek->currentPage() - 1)}}</td>
                                            <td><strong>{{ $val->nama_proyek }}</strong></td>
                                            <td>{{ Carbon\Carbon::parse($val->tanggal_mulai)->format('d-m-Y')  }}</td>
                                            {{--  <td>{{ $val->tanggal_selesai->date('d m Y')}}</td>  --}}
                                            <td>{{ Carbon\Carbon::parse($val->tanggal_selesai)->format('d-m-Y') }}</td>
                                            <td>
                                            
                                                <form action="{{ route('proyek.destroy', $val->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('proyek.edit', $val->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <button class="btn btn-danger btn-sm" onclick="alert('Yakin ingin di hapus');" >Hapus</button>
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
                            {!! $proyek->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
