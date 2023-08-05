<div class="container">
    <div class="col-xs-10">
        <section class="content">
            <div class="row">

            </div>
            <div class="row">
            <form name="frmbuku" method="post" enctype="multipart/form-data"  action="<?php base_url(); ?>/buku/simpan_edit">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">KODE BUKU</label>
                            <input type="text" class="form-control" id="" value="<?php echo $buku->kode_buku; ?>" name="kode_buku" required>
                        </div>
                        <div class="form-group">
                            <label for="">JUDUL BUKU</label>
                            <input type="text" class="form-control" id="" value="<?php echo $buku->judul_buku; ?>" name="judul_buku" required>
                        </div>
                        <div class="">
                            <label for="Pilih Kategori">KATEGORI BUKU</label>
                            <select name="kategori" id="" class="form-control" required>
                                <option value="">Pilih</option>
                                <?php
                                foreach ($kategori as $kategori) { ?>
                                    <option value="<?php echo $kategori->id_kategori; ?>" <?php if(
                                        $buku->kategori_buku == $kategori->id_kategori) echo "selected";?>>
                                        <?php echo $kategori->nama_kategori; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div><br>
                        <div class="form-group">
                        <label>Sampul Buku</label>
                        <input type="file" class="form-control" name="sampul" />
                    </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="box-footer col-12 pb-3 justify-content-between">
                        <a href="/buku" type="button" class="btn btn-danger ml-2">Batal</a>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </section>
    </div>

</div>