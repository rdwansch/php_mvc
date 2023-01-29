<?php

class Home extends Controller
{
  public function index()
  {


    $this->views('templates/header', ['title' => 'Halama Home']);
    $this->views('Home/index', ['nama' => $this->model('UserModel')->getUser()]);
    $this->views('templates/footer');
  }
}
