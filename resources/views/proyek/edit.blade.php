@extends('layouts.admin')

@section('title')
    Edit Proyek
@endsection

@section('content')
    
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Proyek/</li>
        <li class="breadcrumb-item active">Proyek Edit</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Proyek Edit</h4>

                        {{--  @if($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif  --}}

                        </div>
                        <div class="card-body">
                            <form action="{{route('proyek.update',[$editProyek->id])}}" method="POST" enctype="multipart/form-data">
                                
                                @method('PUT')
                                @csrf
                                
                                <div class="form-group">
                                    <label for="nama_proyek">Nama Proyek</label>
                                    <input type="text" class="form-control" id="nama_proyek" name="nama_proyek" value="{{$editProyek->nama_proyek}}" placeholder="Nama Proyek">

                                    <p class="text-danger">{{ $errors->first('nama_proyek') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_mulai">Tanggal Mulai</label>
                                    <input type="date" class="form-control" name="tanggal_mulai" id="tanggal_mulai" placeholder="Tanggal Mulai" value="{{$editProyek->tanggal_mulai}}">

                                    <p class="text-danger">{{ $errors->first('tanggal_mulai') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_selesai">Tanggal Selesai</label>
                                    <input type="date" class="form-control" name="tanggal_selesai" value="{{$editProyek->tanggal_selesai}}" id="tanggal_selesai" placeholder="Tanggal Selesai">

                                    <p class="text-danger">{{ $errors->first('tanggal_selesai') }}</p>
                                </div>

                                <button type="submit" class="btn btn-success">Update</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection