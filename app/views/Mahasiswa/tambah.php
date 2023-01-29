<style>
  .inputForm {
    display: flex;
    justify-content: space-between;
    width: 50%;

    margin: 20px 0;
  }

  .inputForm input {
    width: 400px;
    height: 40px;
    margin: 0;
    padding: 0;
  }
</style>

<h1 style="margin: 30px 0;">Tambah Data</h1>

<form action="" method="POST">
  <div class="inputForm">
    <label for="nama">Nama</label> <input name="nama" type="text" id="nama">
  </div>
  <div class="inputForm">
    <label for="nama">Email</label> <input name="email" type="email" id="email">
  </div>
  <div class="inputForm">
    <label for="nama">Jurusan</label><input name="jurusan" type="text" id="jurusan">
  </div>

  <button type="submit" style="padding: 3px 15px;width:fit-content;">Kirim</button>
  <a href="<?= BASE_URL; ?>/Mahasiswa">Kembali</a>

</form>