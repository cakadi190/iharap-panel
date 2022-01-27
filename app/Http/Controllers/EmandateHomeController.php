<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\HistoryEmandate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EmandateHomeController extends Controller
{

  private $merchant_id        = "10295";
  private $api_key            = "CCSds08MmmyN";
  private $subscription_type  = "calculated";
  private $terms              = "Monthly";
  private $name               = "Monthly Repayment";
  private $bussiness_type     = "b2c";

  /* ========= Block of function Helper ============== */
  /**
   * Check emandate from betterpay
   *
   * @return \Illuminate\Support\Facades\Response
   */
  private function __getEmandate($id)
  {
    $merchant_id = $this->merchant_id;
    $api_key     = $this->api_key;
    $md5         = md5("{$api_key}|{$merchant_id}|{$id}");

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"https://www.betterpay.me/merchant/api/recurring/v1/get_subscribers/{$id}");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "merchant_id=$merchant_id&hash=$md5");

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close ($ch);

    if($http_code == 200){
      return 0;
    }
    if($http_code == 500){
      return 2;
    }
    if($http_code == 400){
      return 1;
    }
  }

  /**
   * Get API Bank Data
   *
   * @return json
   */
  public function getBank()
  {
    $merchant_id = $this->merchant_id;
    $api_key     = $this->api_key;
    $hash        = md5("{$api_key}|{$merchant_id}|b2c");

    $ch          = curl_init();
    curl_setopt($ch, CURLOPT_URL,"https://www.demo.betterpay.me/merchant/api/v2/direct/get_bank_list");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "merchant_id={$merchant_id}&type=b2c&hash={$hash}");

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec($ch);

    curl_close ($ch);

    $output = json_decode($server_output);
    return response()->json($output);
  }

  /**
   * Get Betterpay Payment
   *
   * @return json
   */
  public function __betterpayNow($borrower)
  {
    $url_cb = route('emandate.callback'); // DONE
    $url_sc = route('emandate.success'); // DONE
    $url_fl = route('emandate.failure'); // DONE
    $url    = "https://www.demo.betterpay.me/merchant/api/recurring/v1/add_subscribers/{$borrower['subscription_id']}"; // DONE

    $amount = number_format((float) round(Str::replace(',', '', $borrower['repayment_amount']), 2), 2, '.', '');
    $hash_key     = md5("{$this->api_key}|{$this->merchant_id}||{$borrower['identity_number']}|{$borrower['email']}|{$borrower['reference_no']}|{$url_cb}|{$borrower['bank_id']}");
    $data_request = array(
      'merchant_id'       => $this->merchant_id,
      'subscriber_details'=> [
        'id_number'     => $borrower['identity_number'],
        'id_type'       => '1',
        'reference_no'  => $borrower['reference_no'],
        'email'         => $borrower['email'],
        'name'          => preg_replace("/[^a-zA-Z0-9 ]+/i", "", $borrower['fullname']),
        'phone'         => $borrower['phone'],
      ],
      'callbacks'         => [
        'back_end'      => $url_cb,
        'fe_success'    => $url_sc,
        'fe_fail'       => $url_fl,
      ],
      'mandate_frequency' => $borrower['mandate_frequency'],
      'bank_id'           => $borrower['bank_id'],
      'hash'              => $hash_key,
      'repayment_periods' => [
        'total'   => 1,
        'terms'   => 'Month',
        'amount'  => $amount,
      ],
    );

    $fields_string = json_encode($data_request);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER,array('Content-Type:application/json'));
    curl_setopt($ch, CURLOPT_HTTPHEADER,array('Content-Type:multipart/form-data'));
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close ($ch);

    return [
      'http_response_code'  => $httpcode,
      'data'                => json_decode($server_output, true),
      'debug'               => [
        'req' => $data_request,
      ]
    ];
  }
  /** =============== End of Function helper ================ */

  /**
   * Emandate Home
   *
   * @return \Illuminate\Support\Facades\View
   */
  public function main($hash, Applicant $apply)
  {
    $decode = base64_decode($hash);
    $check  = $apply->where('id_loan', $decode);

    if($check->count() > 0)
    {
      $loan   = $check->first();
      $status = $this->__getEmandate($loan->subs_id);

      if($status == 1)
      {
        $data['title'] = "E-Mandate Form";
        $data['loan']  = $loan;

        return view('emandate', $data);
      } else if($status == 2)
      {
        $data['title'] = "Sorry, Betterpay Server Currently Down";
        return view('emandate-error', $data);
      } else if($status == 0) {
        $data['title'] = "Sorry, The E-Mandate Has Been Filled!";
        return view('emandate-error', $data);
      }
    }
  }

  /**
   * Processing e-mandate
   *
   * @return \Illuminate\Support\Facades\Response
   */
  public function process(Request $request, Applicant $apply)
  {
    // dd($request->all());
    /** ============ History Data ============ */
    $history['fullname'] = $request->fullname;
    $history['phone']    = "{$request->prefix}{$request->phone}";
    $history['bank_id']  = $request->bank_id;

    $his_res  = HistoryEmandate::create($history);
    $ref_no   = (config('app.env') == 'production' ? 2000 : 0) + $his_res->id;

    /** ======= Borrower Data ======== */
    $borrower['fullname']               = $request->fullname;
    $borrower['subscription_id']        = $request->subscription_id;
    $borrower['identity_number']        = $request->nric;
    $borrower['identity_type']          = $request->id_type;
    $borrower['bank_number']            = $request->bank_no;
    $borrower['bank_id']                = $request->bank;
    $borrower['email']                  = $request->email;
    $borrower['repayment_amount']       = $request->repayment_amount;
    $borrower['total_repayment_period'] = (int) $request->total_repayment_period;
    $borrower['mandate_frequency']      = "Monthly";
    $borrower['reference_no']           = $ref_no + 10000;
    $borrower['phone']                  = "{$request->prefix}{$request->phone}";

    $applicant = $apply->where('id_loan', $request->id);
    $applicant->update(['betterpay_id' => $ref_no]);

    // dd($request->all(), $borrower, $this->__betterpayNow($borrower));
    try {
      $payment_url = $this->__betterpayNow($borrower)['data']['paymentURL'];
      return redirect($payment_url);
      // $this->__betterpayNow($borrower);
    } catch (\Exception $e) {
      return response()->json([
        'error'   => true,
        'success' => false,
        'code'    => 500,
        'message' => $e->getMessage()
      ], 500);
    }
    dd($request->all(), $borrower, $applicant);
  }
}
