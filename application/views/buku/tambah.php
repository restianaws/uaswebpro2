<div class="container">
    <section class="content">
        <div class="row">
            <h2><?php echo $judul; ?></h2>
        </div>
        <div class="row">
            <form class="form" enctype="multipart/form-data" method="post" action="<?= base_url() ?>buku/simpan">
            <div class="form-group">
                    <label>Kode Buku</label>
                    <input type="text" class="form-control" name="kode_buku" />
                </div>
                <div class="form-group">
                    <label>Judul Buku</label>
                    <input type="text" class="form-control" name="judul_buku" />
                </div>
                <div class="form-group">
                    <label>Kategori Buku</label>
                    <select class="form-control" name="kategori">
                        <option value="">Pilih</option>
                        <?php
                        foreach ($kategori as $kategori) { ?>
                            <option value="<?= $kategori->id_kategori; ?>">
                                <?= $kategori->nama_kategori; ?>
                            </option>
                        <?php } ?>

                    </select>
                </div>
                <div class="form-group">
                    <label>Sampul Buku</label>
                    <input accept=".jpg,.jpeg,.png" type="file" class="form-control" name="sampul" size="20" />
                </div>
                <a href="/buku" type="button" class="btn btn-danger btn-sm px-3">Batal</a>
                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</button>

            </form>
        </div>
    </section>
</div>