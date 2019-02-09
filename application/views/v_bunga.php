<h2>Daftar bunga</h2>
<?= $this->session->flashdata('pesan'); ?>
<center>
  <a href="#tambah" data-toggle="modal" class="btn btn-warning">+Tambah</a>
</center>
<table id="example" class="table table-hover table-striped">
  <thead>
    <tr>
      <td>Kode</td>
      <td>Tipe</td>
      <td>Jenis</td>
      <td>Stok</td>
      <td>Harga</td>
      <td>Aksi</td>
    </tr>
  </thead>
  <tbody>
    <?php $no=0; foreach($tampil_bunga as $bunga):
    $no++; ?>
    <tr>
      <td><?= $bunga->kode_bunga ?></td>
      <td><?= $bunga->tipe_bunga ?></td>
      <td><?= $bunga->jenis ?></td>
      <td><?= $bunga->stok ?></td>
      <td><?= $bunga->harga ?></td>
      <td><a href="#edit" onclick="edit('<?= $bunga->kode_bunga ?>')" data-toggle="modal" class="btn btn-success">Ubah</a>
        <a href="<?=base_url('index.php/bunga/hapus/'.$bunga->kode_bunga)?>" onclick="return confirm('Are you sure?')" class="btn btn-danger">Hapus</a></td>
    </tr>
  <?php endforeach ?>
  </tbody>
</table>

<div class="modal fade" id="tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-titile">Tambah bunga</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/bunga/tambah')?>" method="post" enctype="multipart/form-data">
          <table>
            <tr>
              <td>Kode</td>
              <td><input type="text" name="kode_bunga" required class="form-control"></td>
            </tr>
            <tr>
              <td>Tipe</td>
              <td><input type="text" name="tipe_bunga" required class="form-control"></td>
            </tr>
            <tr>
              <td>Jenis</td>
              <td><select name="id_kategori" class="form-control">
                <option></option>
                <?php foreach($kategori as $kat): ?>
                <option value="<?=$kat->id_kategori?>"><?=$kat->jenis?></option>
                <?php endforeach ?>
              </select></td>
            </tr>
            <tr>
              <td>Stok</td>
              <td><input type="number" name="stok" required class="form-control"></td>
            </tr>
            <tr>
              <td>Harga</td>
              <td><input type="text" name="harga" required class="form-control"></td>
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
        <h4 class="modal-titile">Edit bunga</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/bunga/bunga_update')?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="kode_bunga_lama" id="kode_bunga_lama">
          <table>
            <tr>
              <td>Kode</td>
              <td><input type="text" name="kode_bunga" id="kode_bunga" class="form-control"></td>
            </tr>
            <tr>
              <td>Tipe</td>
              <td><input type="text" name="tipe_bunga" id="tipe_bunga" required class="form-control"></td>
            </tr>
            <tr>
              <td>Jenis</td>
              <td><select name="id_kategori" class="form-control" id="id_kategori">
                <option></option>
                <?php foreach($kategori as $kat): ?>
                <option value="<?=$kat->id_kategori?>"><?=$kat->jenis?></option>
                <?php endforeach ?>
              </select></td>
            </tr>
            <tr>
              <td>Stok</td>
              <td><input type="number" name="stok" required id="stok" class="form-control"></td>
            </tr>
            <tr>
              <td>Harga</td>
              <td><input type="number" name="harga" required id="harga" class="form-control"></td>
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
      url:"<?=base_url()?>index.php/bunga/edit_bunga/"+a,
      dataType:"json",
      success:function(data){
        $("#kode_bunga").val(data.kode_bunga);
        $("#tipe_bunga").val(data.tipe_bunga);
        $("#id_kategori").val(data.id_kategori);
        $("#stok").val(data.stok);
        $("#harga").val(data.harga);
        $("#kode_bunga_lama").val(data.kode_bunga);
      }
    })
  }
</script>
