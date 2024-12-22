<?php
class Controller {
  function model($model) {
    require_once 'model/' . $model . '.php';
    return new $model;
  }
}
