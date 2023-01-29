<?php



interface DatabaseAccess
{
  public function findAll();
  public function findById();
  public function addData($data);
  public function deleteData($id);
  public function editData($id);
}
