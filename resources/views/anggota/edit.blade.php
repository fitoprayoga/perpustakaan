@extends('layout.app')

@section('title', 'Edit Data Anggota')

@section('content')
        <section class="section">
            <div class="section-header">
                <h3>Anggota</h3>
            </div>


            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Data Anggota</h4>
                    </div>

                    <div class="card-body">
                        <form action="/anggota/{{$anggota->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="kode">Kode</label>
                                        <input type="text" name="kode" class="form-control" value="{{$anggota->kode}}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama" class="form-control" value="{{$anggota->nama}}">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="custom-select">
                                            <option value="Laki-Laki" {{ $anggota->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                            <option value="Perempuan" {{ $anggota->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                        <input type="text" class="form-control" name="tempat_lahir" value="{{$anggota->tempat_lahir}}">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="tanggal_lahir" value="{{$anggota->tanggal_lahir}}">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="telpon">Telpon</label>
                                        <input type="number" class="form-control" name="telpon" value="{{$anggota->telpon}}">
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" name="alamat" value="{{$anggota->alamat}}">
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="foto">Foto</label>
                                        <img src="{{asset('/storage/anggota/'.$anggota->foto)}}" style="width: 150px" class="rounded">
                                        <input type="file" class="form-control" name="foto" value="{{$anggota->foto}}">
                                    </div>
                                </div>
                            </div>
                            

                            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i>Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    @endsection