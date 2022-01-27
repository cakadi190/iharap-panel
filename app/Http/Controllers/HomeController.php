<?php

namespace App\Http\Controllers;

use App\Models\Borrower;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    return view('home');
  }

  /**
   * Show the loan page
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function loan(Request $request)
  {
    $borrower = new Borrower();
    $check = $borrower->where('id_loan', $request->id);

    if($check->count() > 0)
    {
      $data['loan'] = $check->first();
      return view('loan-check', $data);
    }

    return view('loan-check-nf');
  }
}
