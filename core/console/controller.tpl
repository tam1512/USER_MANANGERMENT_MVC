<?php
namespace App\Controllers{{$namespace}};
use App\Core\{Controller, Request, Response, Session, View};
class {{$fileName}} extends Controller {
   private $model, $data = [];
   public function __construct() {
      $this->model = $this->model("{{$fileName}}");
   }
   public function index() {
      // to do
   }
}