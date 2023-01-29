<h1 style="margin:10px 0;">Data Mahasiswa</h1>

<a href="<?= BASE_URL; ?>/Mahasiswa/tambah">Tambah Mahasiswa</a>
<br />
<br />

<table>
  <thead>
    <tr>
      <th scope="col">Nama</th>
      <th scope="col">Jurusan</th>
      <th scope="col">Email</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($data as $mhs) : ?>
      <tr>
        <th scope="row"><?= $mhs->nama ?></th>
        <td><?= $mhs->jurusan ?></td>
        <td><?= $mhs->email ?></td>
        <td>
          <a href="<?= BASE_URL; ?>/Mahasiswa/id/<?= $mhs->id ?>">Detail</a>
          |
          <a href="<?= BASE_URL; ?>/Mahasiswa/hapus/<?= $mhs->id ?>">Hapus</a>
        </td>
      </tr>
    <?php endforeach ?>
</table>