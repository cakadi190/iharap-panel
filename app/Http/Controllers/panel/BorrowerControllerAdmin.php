<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BorrowerControllerAdmin extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $data['title'] = 'Borrowers Data';
    return view('panel.borrower', $data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {}

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {}

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {}

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {}

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {}

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {}

  /**
   * Change status to disbursed
   *
   * @param string id
   * @return \Illuminate\Http\Response
   */
  public function disburse(Request $request, Applicant $apply)
  {
    $id    = $request->loan_id;
    $check = $apply->where('id_loan', $id);

    if($check->count() > 0) {
      try {
        $user = $check->first();
        $mail['fullname'] = $user->fullname;
        $mail['amount']   = $user->amount;
        $apply->notify(new \App\Notifications\DisburseBorrowerNotification($mail));

        $check->update([
          'status'        => 'disbursed',
          'disbursed_at'  => Carbon::now()
        ]);

        return response()->json([
          'status'  => 200,
          'error'   => false,
          'succes'  => true,
          'message' => "Loan has been successfuly disbursed, system will reload."
        ], 200);
      } catch (\Exception $e) {
        return response()->json([
          'status'  => 500,
          'error'   => true,
          'succes'  => false,
          'message' => $e->getMessage()
        ], 500);
      }
    }
  }

  /**
   * Change status to blacklisted
   *
   * @param string id
   * @return \Illuminate\Http\Response
   */
  public function blacklist(Request $request, Applicant $apply)
  {
    $loan_id = $request->loan_id;
    $apply   = $apply->where('id_loan', $loan_id);

    if($apply->count() > 0) {
      try {
        $apply->update(['status' => 'blacklist']);

        $apply = $apply->first();
        $mail['phone']    = $apply->phone;
        $mail['fullname'] = $apply->fullname;
        $mail['amount']   = $apply->amount;
        $mail['id_loan']  = $apply->id_loan;
        $apply->notify(new \App\Notifications\BorrowerBlacklistNotification($mail));

        return response()->json([
          'status'  => 200,
          'error'   => false,
          'succes'  => true,
          'message' => "The loan has been successfuly blacklisted and the email notification has been sent."
        ], 200);
      } catch (\Exception $e) {
        return response()->json([
          'status'  => 500,
          'error'   => true,
          'succes'  => false,
          'message' => $e->getMessage()
        ], 500);
      }
    } else {
      return response()->json([
        'status'  => 500,
        'error'   => true,
        'succes'  => false,
        'message' => 'The loan has been blacklisted from list.'
      ], 500);
    }
  }
}
