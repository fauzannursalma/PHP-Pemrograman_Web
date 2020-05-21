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
      <?php $i = 1; ?>
    </div>
    <?php foreach ($buku as $b) : ?>
      <div class="col s12 m6">
        <div class="card horizontal">
          <div class="card-image">
            <img src="../assets/img/<?= $b['cover']; ?>" style="width: 250px;">
          </div>
          <div class=" card-stacked">
            <div class="card-content">
              <table border="1px" cellpadding="6px" cellspacing="0">
                <th colspan="2">
                  <div class="chip black white-text"><?= $i; ?></div><b style="font-size:14px;"><?= $b["judul"]; ?></b>
                </th>
                <tr>
                  <td>
                    <p>Pengarang</p>
                  </td>
                  <td>
                    <p> : <?= $b["pengarang"]; ?></p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Penerbit</p>
                  </td>
                  <td>
                    <p> : <?= $b["penerbit"]; ?></p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Tahun Terbit</p>
                  </td>
                  <td>
                    <p> : <?= $b["tahun_terbit"]; ?></p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Harga </p>
                  </td>
                  <td>
                    <p> : <?= $b["harga"]; ?></p>
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <div class="chip"><a href="deskripsi.php?id=<?= $b['id'] ?>" style="color: black">Lihat Deskripsi</a></div>
                  </td>
                </tr>
              </table><br>
              <a href="ubah.php?id=<?= $b['id'] ?>" class="waves-effect waves-light blue darken-1 btn-small"><i class="material-icons">edit</i></a>
              <a href="hapus.php?id=<?= $b['id'] ?>" onclick="return confirm('Hapus Data ??')" class="waves-effect waves-light red darken-1 btn-small"><i class="material-icons">delete</i></a>
            </div>
          </div>
        </div>
      </div>
      <?php $i++; ?>
    <?php endforeach; ?>
  </div>
</div>