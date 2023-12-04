<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Modal Anggota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/anggota/store" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="kode">Kode</label>
                    <input type="text" class="form-control" name="kode">
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama">
                </div>
            </div>  
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="custom-select">
                        <option selected>Pilih Jenis Kelamin</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempat_lahir">
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tanggal_lahir">
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="telpon">Telpon</label>
                    <input type="number" class="form-control" name="telpon">
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control"></textarea>
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control" name="foto">
                </div>
            </div>
          </div>
          
        <button type="submit" class="btn btn-success">Simpan</button>

        </form>
      
      </div>
    </div>
  </div>
</div>