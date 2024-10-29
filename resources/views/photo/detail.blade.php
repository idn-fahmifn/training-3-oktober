@extends('template.template')

@section('form-input')

<h5 class="card-title">
    Edit data photo
</h5>
<p class="text-muted">Ubah data {{$data->nama_photo}} dibawah.</p>



<form action="{{route('foto.update',$data->id )}}" method="post">
    @csrf
    {{method_field('PUT')}}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="text-muted mb-2">Nama foto</label>
                <input type="text" name="nama_photo" value="{{$data->nama_photo}}" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="text-muted mb-2">Deskripsi foto</label>
                <textarea name="deskripsi" class="form-control">
                {{$data->deskripsi}}
                </textarea>
            </div>
        </div>
        <div class="col-md-6 mt-2">
            <button type="submit" class="btn btn-outline-success">Update</button>
            <a href="{{route('foto.index')}}" class="btn btn-outline-danger">Kembali</a>
        </div>
    </div>
</form>

@endsection

@section('content-area')
<h5 class="card-title">
    Detail data
</h5>
<p class="text-muted">Tentang <b>{{$data->nama_photo}}</b> </p>

<!-- bagian alert -->

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Yeay! </strong> {{session('success')}}.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif



<!-- end alert -->

<!-- area-data -->

<div class="table-responsive">
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>Nama Foto</th>
                <td>{{$data->nama_photo}}</td>
            </tr>
            <tr>
                <th>Deskripsi</th>
                <td>{{$data->deskripsi}}</td>
            </tr>
        </tbody>
    </table>
</div>

<!-- end area-data -->
@endsection