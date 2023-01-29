<?php


class MahasiswaModel
{
  private $db;
  public function __construct()
  {
    $this->db =  new Database();
  }


  public function findAll()
  {
    return $this->db->query("SELECT * FROM mahasiswa")->execute()->resultSet();
  }

  public function findById(int $id)
  {
    return $this->db->query("SELECT * FROM mahasiswa WHERE id=$id")->execute()->single();
  }

  public function addNew($data)
  {
    $nama = $data['nama'];
    $email = $data['email'];
    $jurusan = $data['jurusan'];
    return $this->db->query("INSERT INTO mahasiswa (nama, email, jurusan) VALUES ('$nama', '$email', '$jurusan')")->execute();
  }

  public function delete(int $id)
  {
    return $this->db->query("DELETE FROM mahasiswa WHERE id='$id'")->execute();
  }
}
