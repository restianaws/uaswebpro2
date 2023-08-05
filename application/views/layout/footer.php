<!-- Main content -->
<section class="content">

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>Version</b> 3.2.0
  </div>
  <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>

<!-- sweetalert2 -->
<script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>

<script>
  <?php
  if ($this->session->flashdata('flash') == "Tersimpan") {
    //notif simpan buku
    echo 'Swal.fire("Alhamdulillah","Simpan data berhasil","success")';
  } elseif ($this->session->flashdata('flashGagal') == "gagal") {
    echo 'Swal.fire("Gagal","Simpan data Gagal","error")';
  }
  //notif update buku
  elseif ($this->session->flashdata('flashUpdate') == "Terupdate") {
    echo 'Swal.fire("Alhamdulillah","Update data berhasil","success")';
  } elseif ($this->session->flashdata('fUpdateGagal') == "gagal") {
    echo 'Swal.fire("Gagal","Update data Gagal","error")';
  }
  //notif delete buku
  elseif ($this->session->flashdata('flashHapus') == "Terhapus") {
    echo 'Swal.fire("Terhapus","Data Berhasil dihapus","error")';
  } elseif ($this->session->flashdata('delete') == "gagal") {
    echo 'Swal.fire("Gagal","Data Gagal dihapus","error")';
  }

  ?>
</script>
</body>

</html>