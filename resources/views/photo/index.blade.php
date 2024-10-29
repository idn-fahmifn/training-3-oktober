@extends('template.template')

@section('form-input')

<h5 class="card-title">
    Tambah Data Photo
</h5>
<p class="text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perspiciatis dolor quod nulla aperiam recusandae iste consequatur tempore voluptatem cupiditate at.</p>

<form action="{{route('foto.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="text-muted mb-2">Nama foto</label>
                <input type="text" name="nama_photo" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="text-muted mb-2">Deskripsi foto</label>
                <textarea name="deskripsi" class="form-control"></textarea>
            </div>
        </div>
        <div class="col-md-6 mt-2">
            <button type="submit" class="btn btn-outline-success">tambah</button>
        </div>
    </div>
</form>

@endsection

@section('content-area')
<h5 class="card-title">
    Data semua foto
</h5>
<p class="text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perspiciatis dolor quod nulla aperiam recusandae iste consequatur tempore voluptatem cupiditate at.</p>

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Yeay! </strong> {{session('success')}}.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- area-data -->

<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <th>Nama Photo</th>
            <th>Pilihan</th>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{$item->nama_photo}}</td>
                <td>
                    <!-- <form action="" method="post">
                        @csrf
                        {{method_field('delete')}}

                        <a href="{{route('foto.show', $item->id)}}" class="btn text-info">detail</a>
                        <button type="submit" class="btn text-danger" onclick="return confirm('yakin mau dihapus?')">hapus</button>
                    </form> -->

                    <a href="{{route('foto.show', $item->id)}}" class="btn btn-outline-info">Info</a>
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#showModal">
                        Hapus
                    </button>

                    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus data</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{route('foto.destroy', $item->id)}}" method="post">
                                    @csrf
                                    {{method_field('delete')}}
                                    <div class="modal-body">
                                        yakin akan anda hapus datanya?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </td>
            </tr>

            @endforeach

        </tbody>
    </table>
</div>

<!-- end area-data -->
@endsection