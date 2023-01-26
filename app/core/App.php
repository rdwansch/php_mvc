<?php

class App
{
  protected mixed $controller = "Home";
  protected string $method = "index";
  protected array $params = [];

  public function __construct()
  {
    $url = $this->parseURL();


    // Cek apakah ada controller dengan nama sama seperti URL
    if (file_exists("../app/controllers/" . $url[0] . ".php")) {
      $this->controller = $url[0];
      unset($url[0]);
    };

    // Panggil file controller
    require_once "../app/controllers/" . $this->controller . ".php";

    // Timpa string controller dengan instance controller
    $this->controller = new $this->controller;


    // Cek apakah method dalam instance controller ada
    if (isset($url[1]) && method_exists($this->controller, $url[1])) {
      $this->method = $url[1];
      unset($url[1]);
    }

    if (!empty($url)) {
      $this->params = array_values($url);
    }

    // Jalankan controller & method serta params jika ada
    call_user_func([$this->controller, $this->method], $this->params);
  }

  public function parseURL()
  {
    if (isset($_GET)) {
      $url = rtrim($_GET['url'], '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url =  explode('/', $url);

      return $url;
    }
  }
}
