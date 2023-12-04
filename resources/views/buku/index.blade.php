@extends('layout.app')

@section('title', 'Buku')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Buku</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Data Buku</h4>
                <div class="card-header-form">
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-buku"><i class="fas fa-plus"></i> Tambah</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover" id="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Pengarang</th>
                            <th scope="col">Tahun Terbit</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Sinopsis</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($buku as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td style="text-align: center;">
                                {!! DNS1D::getBarcodeHTML('$ ' . $item->buku, 'C39',) !!}
                                <div style="margin-top: 5px;">{{$item->kode}}</div>
                            </td>
                            <td>{{$item->judul}}</td>
                            <td>{{$item->pengarang}}</td>
                            <td>{{$item->tahun_terbit}}</td>
                            <td><img src="{{asset('/storage/buku/'.$item->gambar)}}" class="rounded mb-3" style="width: 150px" alt="{{$item->gambar}}"></td>
                            <td>{{$item->sinopsis}}</td>
                            <td>
                                <form action="/buku/{{$item->id}}" id="delete-form">
                                    <a href="/buku/{{$item->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="/buku/{{$item->id}}/print" class="btn btn-sm btn-info"><i class="fa fa-print"></i></a>
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger" data-id="{{$item->id}}" onclick="confirmDelete(this)"><i class="fa fa-trash"></i></a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@include('buku.form')
@endsection

@push('script')
<script>
    
    @if(session('sukses'))
    iziToast.success({
      title:'Sukses', 
      message: '{{session('sukses')}}',
      position: 'topRight'
    });
    @endif

    var data_buku = $(this).attr('data-id')
    function confirmDelete(button) {
    
        event.preventDefault()
        const id = button.getAttribute('data-id');
        swal({
                title: 'Apa Anda Yakin ?',
                text: 'Anda akan menghapus ID: ' + id + '. Ketika Anda tekan OK, maka data tidak dapat dikembalikan !',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
        .then((willDelete) => {
            if (willDelete) {
              const form = document.getElementById('delete-form');
              // Setelah pengguna mengkonfirmasi penghapusan, Anda bisa mengirim form ke server
              form.action = '/buku/' + id; // Ubah aksi form sesuai dengan ID yang sesuai
              form.submit();
            }
        });
    }
    $(document).ready( function () {
    $('#table').DataTable();
} );
</script>
@endpush