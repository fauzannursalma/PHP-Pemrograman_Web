<?php
require '../php/functions.php';
$buku = cari($_GET['keyword']);
?>
<div id="horizontal-card" class="section">
  <div class="row">
    <div class="col s12">
      <?php if (empty($buku)) : ?>
        <div style="text-align: center; font-family: lucida fax;">
          <h1>Buku Tidak Ditemukan</h1>
        </div>
      <?php else : ?>
      <?php endif; ?>
    </div>
    <?php foreach ($buku as $b) : ?>
      <div class="col s12 m4">
        <div class="card horizontal">
          <div class="card-image">
            <img src="assets/img/<?= $b['cover']; ?>" style="height: 220px; width: 160px;">
          </div>
          <div class="card-stacked">
            <div class="card-content">
              <b class="buku" style="font-size: 17px; padding-left: 5px;"><?= $b['judul']; ?></b><br><br>
              <p class="chip"><?= $b['pengarang']; ?></p>
            </div>
            <div class="card-action">
              <a class="waves-effect waves-light blue darken-4 btn-small" href="php/detail.php?id=<?= $b['id']; ?>">Lihat Detail</a>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>