<h2>Daftar Buku</h2>
<?= $this->session->flashdata('pesan'); ?>
<center>
  <a href="#tambah" data-toggle="modal" class="btn btn-warning">+Tambah</a>
</center>
<table id="example" class="table table-hover table-striped">
  <thead>
    <tr>
      <td>No</td>
      <td>Foto Cover</td>
      <td>Judul Buku</td>
      <td>Kategori</td>
      <td>Harga</td>
      <td>Penerbit</td>
      <td>Penulis</td>
      <td>Stok</td>
      <td>Aksi</td>
    </tr>
  </thead>
  <tbody>
    <?php $no=0; foreach($tampil_buku as $buku):
    $no++; ?>
    <tr>
      <td><?= $no ?></td>
      <td><img src="<?=base_url('assets/img/'.$buku->foto_cover )?>" style="width: 40px"></td>
      <td><?= $buku->judul_buku ?></td>
      <td><?= $buku->nama_kategori ?></td>
      <td><?= $buku->harga ?></td>
      <td><?= $buku->penerbit ?></td>
      <td><?= $buku->penulis ?></td>
      <td><?= $buku->stok ?></td>
      <td><a href="#edit" onclick="edit('<?= $buku->id_buku ?>')" data-toggle="modal" class="btn btn-success">Ubah</a>
        <a href="<?=base_url('index.php/buku/hapus/'.$buku->id_buku)?>" onclick="return confirm('Are you sure?')" class="btn btn-danger">Hapus</a></td>
    </tr>
  <?php endforeach ?>
  </tbody>
</table>

<div class="modal fade" id="tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-titile">Tambah Buku</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/buku/tambah')?>" method="post" enctype="multipart/form-data">
          <table>
            <tr>
              <td><input type="hidden" name="id_buku" class="form-control"></td>
            </tr>
            <tr>
              <td>Judul Buku</td>
              <td><input type="text" name="judul_buku" required class="form-control"></td>
            </tr>
            <tr>
              <td>Kategori</td>
              <td><select name="id_kategori" class="form-control">
                <option></option>
                <?php foreach($kategori as $kat): ?>
                <option value="<?=$kat->id_kategori?>"><?=$kat->nama_kategori?></option>
                <?php endforeach ?>
              </select></td>
            </tr>
            <tr>
              <td>Harga</td>
              <td><input type="number" name="harga" required class="form-control"></td>
            </tr>
            <tr>
              <td>Penerbit</td>
              <td><input type="text" name="penerbit" required class="form-control"></td>
            </tr>
            <tr>
              <td>Penulis</td>
              <td><input type="text" name="penulis" required class="form-control"></td>
            </tr>
            <tr>
              <td>Stok</td>
              <td><input type="number" name="stok" required class="form-control"></td>
            </tr>
            <tr>
              <td>Foto Cover</td>
              <td><input type="file" name="foto_cover" class="form-control"></td>
            </tr>
          </table>
          <input type="submit" name="create" value="Simpan" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-titile">Edit Buku</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/buku/buku_update')?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_buku_lama" id="id_buku_lama">
          <table>
            <tr>
              <td><input type="hidden" name="id_buku" id="id_buku" class="form-control"></td>
            </tr>
            <tr>
              <td>Judul Buku</td>
              <td><input type="text" name="judul_buku" id="judul_buku" required class="form-control"></td>
            </tr>
            <tr>
              <td>Kategori</td>
              <td><select name="id_kategori" class="form-control" id="id_kategori">
                <option></option>
                <?php foreach($kategori as $kat): ?>
                <option value="<?=$kat->id_kategori?>"><?=$kat->nama_kategori?></option>
                <?php endforeach ?>
              </select></td>
            </tr>
            <tr>
              <td>Harga</td>
              <td><input type="number" name="harga" required id="harga" class="form-control"></td>
            </tr>
            <tr>
              <td>Penerbit</td>
              <td><input type="text" name="penerbit" required id="penerbit" class="form-control"></td>
            </tr>
            <tr>
              <td>Penulis</td>
              <td><input type="text" name="penulis" required id="penulis" class="form-control"></td>
            </tr>
            <tr>
              <td>Stok</td>
              <td><input type="number" name="stok" required id="stok" class="form-control"></td>
            </tr>
            <tr>
              <td>Foto Cover</td>
              <td><input type="file" name="foto_cover" id="foto_cover" class="form-control"></td>
            </tr>
          </table>
          <input type="submit" name="edit" value="Simpan" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function edit(a){
    $.ajax({
      type:"post",
      url:"<?=base_url()?>index.php/buku/edit_buku/"+a,
      dataType:"json",
      success:function(data){
        $("#id_buku").val(data.id_buku);
        $("#judul_buku").val(data.judul_buku);
        $("#id_kategori").val(data.id_kategori);
        $("#harga").val(data.harga);
        $("#penerbit").val(data.penerbit);
        $("#penulis").val(data.penulis);
        $("#stok").val(data.stok);
        $("#id_buku_lama").val(data.id_buku);
      }
    })
  }
</script>
