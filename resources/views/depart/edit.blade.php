@extends('layouts.admin')

@section('title')
    Edit Departemen
@endsection

@section('content')
    
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Departement/</li>
        <li class="breadcrumb-item active">Departement Edit</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Departement Edit</h4>

                        {{--  @if($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif  --}}

                        </div>
                        <div class="card-body">
                            <form action="{{route('departement.update',[$editDepart->id])}}" method="POST" enctype="multipart/form-data">
                                
                                @method('PUT')
                                @csrf
                                
                                <div class="form-group">
                                    <label for="nama_department">Nama Departement</label>
                                    <input type="text" class="form-control" id="nama_department" name="nama_department" value="{{$editDepart->nama_department}}" placeholder="Nama Departement">

                                    <p class="text-danger">{{ $errors->first('nama_department') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="lantai">Lantai</label>
                                    <input type="text" class="form-control" name="lantai" id="lantai" value="{{$editDepart->lantai}}" placeholder="Lantai">

                                    <p class="text-danger">{{ $errors->first('lantai') }}</p>
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