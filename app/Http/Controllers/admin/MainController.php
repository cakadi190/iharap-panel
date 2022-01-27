<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
  /**
   * To show homepage
   *
   * @package I-Harap
   * @since 1.0.0
   */
  function home()
  {
    $data['title'] = 'Home Panel';
    return view('panel.home', $data);
  }
}
