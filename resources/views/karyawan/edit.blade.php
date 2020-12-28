@extends('layouts.admin')

@section('title')
    Update Karyawan
@endsection

@section('content')
    
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Karyawan/</li>
        <li class="breadcrumb-item active">Karyawan Update</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Karyawan Update</h4>

                        {{--  @if($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif  --}}

                        </div>
                        <div class="card-body">
                            <form action="{{route('karyawan.update', [$editKaryawan->id])}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                
                                @method('PUT')
                                <div class="form-group">
                                    <label for="nama_karyawan">Nama Karyawan</label>
                                    <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" value="{{ $editKaryawan->nama_karyawan }}" placeholder="Search Karyawan Or Department">

                                    <p class="text-danger">{{ $errors->first('nama_karyawan') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="telpon">Telpon</label>
                                    <input type="text" class="form-control" id="telpon" name="telpon" value="{{ $editKaryawan->telpon }}" placeholder="Telpon">

                                    <p class="text-danger">{{ $errors->first('telpon') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" id="alamat" rows="3" name="alamat"> {{ $editKaryawan->alamat }} </textarea>

                                    <p class="text-danger">{{ $errors->first('alamat') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                        <option value="laki-laki" @if ($editKaryawan->jenis_kelamin == 'laki-laki') selected @endif>Laki-Laki</option>
                                        <option value="perempuan" @if ($editKaryawan->jenis_kelamin == 'perempuan') selected @endif>Perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="departement_id">Departement</label>
                                    <select class="form-control" id="departement_id" name="departement_id">
                                        @foreach ($departement as $item)
                                            <option value="{{$item->id}}" 
                                            @if ($editKaryawan->departement_id == $item->id) selected @endif > {{$item->nama_department}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="proyek_id">Proyek</label>
                                    <select class="form-control" id="proyek_id" name="proyek_id">
                                        @foreach ($proyek as $as)
                                            <option value="{{$as->id}}" 
                                            @if ($editKaryawan->proyek_id == $as->id) selected @endif > {{$as->nama_proyek}}</option>
                                        @endforeach
                                    </select>
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