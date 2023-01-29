<?php

class Mahasiswa extends Controller
{
  public function index()
  {

    $this->views('templates/header', ["title" => 'Mahasiswa']);
    $this->views('Mahasiswa/index', $this->model('MahasiswaModel')->findAll());
    $this->views('templates/footer');
  }

  public function id($_i)
  {

    $this->views('templates/header', ["title" => 'Detail Mahasiswa']);
    $this->views('Mahasiswa/detail', $this->model('MahasiswaModel')->findById($_i[0]));
    $this->views('templates/footer');
  }

  public function tambah()
  {

    $this->views('templates/header', ["title" => 'Tambah Mahasiswa']);
    $this->views('Mahasiswa/tambah',);
    $this->views('templates/footer');

    if (isset($_POST['nama']) && $_POST['jurusan'] && $_POST["email"]) {
      $this->model('MahasiswaModel')->addNew($_POST);

      header('location: ' . BASE_URL . '/Mahasiswa');
      exit();
    }
  }

  public function hapus($id)
  {
    if (!$id == null) {
      $this->model("MahasiswaModel")->delete($id[0]);
    }

    header('location: ' . BASE_URL . '/Mahasiswa');
    exit();
  }
}
