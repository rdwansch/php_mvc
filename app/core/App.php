<?php

class App
{
  protected mixed $controller = "Home";
  protected string $method = "index";
  protected array $params = [];

  public function __construct()
  {
    $url = $this->parseURL();


    if ($url == null) {
      $url = [$this->controller];
    }


    // Cek apakah ada controller dengan nama sama seperti URL
    if (file_exists("../app/controllers/" . $url[0] . ".php")) {
      $this->controller = $url[0];
      unset($url[0]);
    };

    // Panggil file controller
    require_once "../app/controllers/" . $this->controller . ".php";

    // Timpa string controller dengan instance controller
    $this->controller = new $this->controller;

    // Jika semua proses pengecekan: 
    // - Method
    // - Parmas
    // Tidak ada, maka akan menggunakan nilai default


    // Cek apakah method dalam instance controller ada
    if (isset($url[1]) && method_exists($this->controller, $url[1])) {
      $this->method = $url[1];
      unset($url[1]);
    }


    // Cek apakah ada sisa url sebagai params dan kirimkan jika ada
    if (!empty($url)) {
      $this->params = array_values($url);
    }

    // Jalankan controller & method serta kirim params jika ada
    call_user_func([$this->controller, $this->method], $this->params);
  }

  public function parseURL()
  {
    if (isset($_GET)) {
      $url = [];

      if (isset($_GET['url'])) {
        $url = rtrim($_GET['url'], '/'); // hilangkan / di akhir
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url =  explode('/', $url); // pecah menjadi array
      }

      return $url;
    }
  }
}
