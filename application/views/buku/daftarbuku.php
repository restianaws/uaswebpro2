<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=100.0">
  <title>DAFTAR BUKU</title>
</head>

<body>
  <div class=" text-center pt-4 pb-5">
    <h3><strong>DAFTAR BUKU</strong></h3>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <a href="/buku/tambah" class="btn btn-success btn-sm mt-2 ml-4"><i class="fa fa-plus"></i> Tambah buku</a>
          <table class="table table-hover text-nowrap" cellspacing="0" cellpadding="">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Kode Buku</th>
                <th class="text-center">Judul Buku</th>
                <th class="text-center">Kategori</th>
                <th class="text-center">Sampul</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($daftar_buku as $buku) { ?>
                <tr>
                  <td class="text-center"><?php echo $no++; ?></td>
                  <td class="text-center"><?php echo $buku->kode_buku; ?></td>
                  <td><?php echo $buku->judul_buku; ?></td>
                  <td class="text-center"><?php echo $buku->kategori_buku; ?></td>
                  <td class="text-center">
                    <img src="upload_img/<?php echo $buku->cover_buku; ?>" alt="" height="100px">
                  </td>
                  <td class="text-center">
                    <a href="buku/lihat/<?php echo $buku->kode_buku; ?> " class="btn btn-info btn-sm"> Lihat</a>
                    <a href="buku/edit/<?php echo $buku->kode_buku; ?> " class="btn btn-primary btn-sm edit"> Edit</a>
                    <a href="buku/hapus/<?php echo $buku->kode_buku; ?> " onclick="return confirm('Yakin dihapus?')" class="btn btn-danger btn-sm"> Hapus</a>
                  </td>
                </tr>

              <?php } ?>
            </tbody>

          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>

  <div class="table-wrapper">

  </div>
</body>

</html>