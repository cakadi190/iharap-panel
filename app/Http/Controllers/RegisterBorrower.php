<?php

namespace App\Http\Controllers;

use App\Models\Borrower;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RegisterBorrower extends Controller
{
  /**
   * Utility to save the file
   *
   * @package iharap
   * @since   1.0.0
   */
  private function __upload($request, $store = false)
  {
    $request->move(public_path('upload'), time() . '_' . md5(now()) . '.' . $request->getClientOriginalExtension());

    if($store == false)
    {
      return 'upload/' . time() . '_' . md5(now()) . '.' . $request->getClientOriginalExtension();
    }

    return array([
      'fullpath' => 'upload/' . time() . '_' . md5(now()) . '.' . $request->getClientOriginalExtension(),
      'filename' => time() . '_' . md5(now()) . '.' . $request->getClientOriginalExtension(),
      'purpose'  => 'loan',
    ]);
  }

  /**
   * To Register new Borrower
   *
   * @package iharap
   * @since   1.0.0
   */
  public function register(Request $request)
  {
    $carbon = new Carbon();
    $borrow = new Borrower();

    $input  = $request->except(['agreed', 'amount', 'ic_back', 'birthday', 'ic_front', 'phone_number', 'prefix', 'salary_slip', 'public_lifeline']);
    $push   = [
      'amount'      => (int) $request->amount,
      'nric'        => $request->nric,
      'id_loan'     => uniqid(),
      'phone'       => $request->prefix . $request->phone_number,
      'birthday'    => $carbon->parse($request->birthday)->format('Y-m-d'),
      'ic_front'    => $this->__upload($request->ic_front),
      'ic_back'     => $this->__upload($request->ic_back),
      'salary'      => $this->__upload($request->public_lifeline),
      'salary_slip' => $this->__upload($request->salary_slip),
    ];
    $data   = array_merge($push, $input);

    try {
      $borrower = $borrow->create($data);
      return response()->json([
        'success' => true,
        'error'   => false,
        'debug'   => $borrower,
        'message' => 'Data successfuly inserted, redirect to success page.'
      ]);
    } catch (\Exception $e) {
      return response()->json($e->getMessage(), 500);
    }
  }
}
