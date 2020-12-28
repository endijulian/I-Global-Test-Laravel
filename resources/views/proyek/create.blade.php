@extends('layouts.admin')

@section('title')
    Create Proyek
@endsection

@section('content')
    
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Proyek/</li>
        <li class="breadcrumb-item active">Proyek Create</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Proyek Create</h4>

                        {{--  @if($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif  --}}

                        </div>
                        <div class="card-body">
                            <form action="{{route('proyek.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="form-group">
                                    <label for="nama_proyek">Nama Departement</label>
                                    <input type="text" class="form-control" id="nama_proyek" name="nama_proyek" value="{{old('nama_proyek')}}" placeholder="Nama Proyek">

                                    <p class="text-danger">{{ $errors->first('nama_proyek') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_mulai">Tanggal Mulai</label>
                                    <input type="date" class="form-control" name="tanggal_mulai" id="tanggal_mulai" placeholder="Tanggal Mulai">

                                    <p class="text-danger">{{ $errors->first('tanggal_mulai') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_selesai">Tanggal Selesai</label>
                                    <input type="date" class="form-control" name="tanggal_selesai" id="tanggal_selesai" placeholder="Tanggal Selesai">

                                    <p class="text-danger">{{ $errors->first('tanggal_selesai') }}</p>
                                </div>

                                <button type="submit" class="btn btn-success">Create</button>
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