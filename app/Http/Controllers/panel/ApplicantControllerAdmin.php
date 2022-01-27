<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Applicant;
use App\Models\Borrower;
use App\Notifications\RejectionLoanNotification;
use Carbon\Carbon;

class ApplicantControllerAdmin extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $data['title'] = 'Applicant';
    return view('panel.applicant', $data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }

  /**
   * Apply the borrower
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function apply(Request $request, Borrower $borrower, Applicant $apply)
  {
    $id   = htmlspecialchars(strip_tags($request->id));
    $loan = $borrower->where('id_loan', $id);

    if($loan->count() > 0)
    {
      $loan->update([
        'comment' => null,
        'status'  => 'pending'
      ]);

      try {
        $subs = uniqid();
        $loan = $loan->first();

        $debug = $borrower->__addSubscription($loan, $subs);

        return response()->json([
          'debug'   => $debug,
          'status'  => 200,
          'error'   => false,
          'success' => true,
          'message' => 'The loan have successfuly applied.'
        ]);
      } catch (\Exception $err) {
        return response()->json([
          'status'  => 500,
          'error'   => true,
          'success' => false,
          'message' => $err->getMessage(),
        ], 500);
      }
    } else {
      return response()->json([
        'status'  => 500,
        'error'   => true,
        'success' => false,
        'message' => 'The loan already applied or not found.'
      ], 500);
    }
  }

  /**
   * Reject the borrower
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function reject(Request $request, Borrower $borrower)
  {
    $id     = htmlspecialchars(strip_tags($request->id));
    $reason = htmlspecialchars(strip_tags($request->reason));
    $loan   = $borrower->where('id_loan', $id)->where('status', '!=', 'rejected');

    if($loan->count() > 0)
    {
      $loan->update([
        'comment' => $reason,
        'status'  => 'reject'
      ]);

      $loan = $loan->first();

      $mailData['fullname'] = $loan->fullname;
      $mailData['reason']   = $reason;
      $mailData['phone']    = $loan->phone;
      $loan->notify(new RejectionLoanNotification($mailData));

      return response()->json([
        'status'  => 200,
        'error'   => false,
        'success' => true,
        'message' => 'The loan have successfuly rejected.'
      ]);
    } else {
      return response()->json([
        'status'  => 500,
        'error'   => true,
        'success' => false,
        'message' => 'The loan already rejected.'
      ], 500);
    }
  }
}
