<?php 
require '../functions.php';
$mahasiswa = cari($_GET['keyword']);

?>
<div class="row">
      <?php if(empty($mahasiswa)) : ?>
        <div class="col s12 m12 center" id="mahasiswa">
          <h4>Data Mahasiswa Tidak Di Temukan</h4>
          <br>
        </div>
      <?php endif; ?>
      <?php foreach ($mahasiswa as $mhs) : ?>
        <div class="col s12 m4">
          <div class="card medium">
            <div class="card-image">
              <img src="img/<?= $mhs['foto']; ?>"class="responsive-img">
            </div>
            <div class="card-content">
              <span class="card-title activator grey-text text-darken-4 nama"><?= $mhs['nama']; ?></span>
            </div>
            <div class="card-action">
              <a class="waves-effect waves-light blue darken-4 btn-small" href="detail.php?id=<?= $mhs['id']; ?>">Lihat Detail </a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>