@extends('layouts.admin')

@section('title')
    Data User
@endsection

@section('content')
    
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Data User</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">List User</h4>
                            
                            {{--  <form action="{{route('user.create')}}" method="post" class="float-right">
                                @csrf
                                <button type="submit" class="btn btn-primary">Tambah Data  <i class="nav-icon icon-plus"></i></button>
                            </form>  --}}
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Level</th>
                                            <th>Created At</th>
                                            {{--  <th>Aksi</th>  --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no=0;
                                        @endphp
                                        @forelse ($user as $val)

                                        @php
                                            $no++;
                                        @endphp

                                        <tr>
                                            <td>{{$no}}</td>
                                            {{--  <td>{{$loop->iteration + ($user->perPage()) * ($user->currentPage() - 1)}}</td>  --}}
                                            <td><strong>{{ $val->name }}</strong></td>
                                            <td>{{ $val->username }}</td>
                                            <td>{{ $val->email }}</td>
                                            <td>{{ $val->level->nama_level }}</td>
                                            <td>{{ $val->created_at->format('d-m-Y') }}</td>
                                            {{--  <td>
                                            
                                                <form action="{{ route('category.destroy', $val->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('category.edit', $val->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                                </form>
                                            </td>  --}}
                                        </tr>

                                        @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            {{--  {!! $user->links() !!}  --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection