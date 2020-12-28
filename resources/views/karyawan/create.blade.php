@extends('layouts.admin')

@section('title')
    Create Karyawan
@endsection

@section('content')
    
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Karyawan/</li>
        <li class="breadcrumb-item active">Karyawan Create</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Karyawan Create</h4>

                        {{--  @if($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif  --}}

                        </div>
                        <div class="card-body">
                            <form action="{{route('karyawan.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="form-group">
                                    <label for="nama_karyawan">Nama Karyawan</label>
                                    <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" value="{{old('nama_karyawan')}}" placeholder="Nama Karyawan">

                                    <p class="text-danger">{{ $errors->first('nama_karyawan') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="telpon">Telpon</label>
                                    <input type="text" class="form-control" id="telpon" name="telpon" value="{{old('telpon')}}" placeholder="Telpon">

                                    <p class="text-danger">{{ $errors->first('telpon') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" id="alamat" rows="3" name="alamat"> </textarea>

                                    <p class="text-danger">{{ $errors->first('alamat') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                        <option value="laki-laki">Laki-Laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="departement_id">Departement</label>
                                    <select class="form-control" id="departement_id" name="departement_id">
                                        @foreach ($departement as $item)
                                            <option value="{{$item->id}}">{{ $item->nama_department }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="proyek_id">Proyek</label>
                                    <select class="form-control" id="proyek_id" name="proyek_id">
                                        @foreach ($proyek as $as)
                                            <option value="{{$as->id}}">{{ $as->nama_proyek }}</option>
                                        @endforeach
                                    </select>
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