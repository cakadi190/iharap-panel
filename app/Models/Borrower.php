<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use App\Notifications\AppliedLoanNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class Borrower extends Model
{
  use HasFactory, Notifiable;

  protected $guarded = [];
  protected $table = 'borrowers';

  # variable to connect betterpay
  private $subscription_type  = "calculated";
  private $terms              = "Monthly";
  private $name               = "Monthly Repayment";
  private $merchant_id        = 10295;
  private $api_key            = "CCSds08MmmyN";
  private $bussiness_type     = "b2c";

  /** =================== Loan Applied =================== */
  /** =================== Helper Method ================== */
  /**
   * Add subscription
   *
   * @return array
   */
  public function paymentSequence($borrower)
  {
    $period = (int) $borrower->period * 12;
    $amount = round((($borrower->amount * 0.05 * $borrower->period) + $borrower->amount) / ($period * 12), 2);
    $return = [];

    for($i = 1; $i <= $period; $i++)
    {
      $item['total']  = $period;
      $item['amount'] = $amount;
      $item['terms']  = "Month";
      $return[] = $item;
    }

    return $return;
  }

  /**
   * Function hashing data
   *
   * @return string
   * @param $borrower array To get borrower data
   * @param $bid string     To get subscriber ID
   */
  private function __hash($borrower, $bid)
  {
    // $string = "$this->api_key."|".$this->merchant_id."|".$bid."|".$this->subscription_type."|".$this->name."|"."|".$this->terms."|".$borrower->purpose";
    $string = "{$this->api_key}|{$this->merchant_id}|{$bid}|{$this->subscription_type}|{$this->name}||{$this->terms}|{$borrower->purpose}";
    return md5($string);
  }

  /**
   * Payment Subscription Add
   *
   * @return array
   * @param $data array Payment Sequence array data
   * @param $subscription_id string Payment ID to betterpay
   */
  private function dataSub($data, $hash, $borrower, $subscription_id)
  {
    $data['merchant_id']        = $this->merchant_id;
    $data['subscription_type']  = $this->subscription_type;
    $data['terms']              = $this->terms;
    $data['subscription_id']    = $subscription_id;
    $data['name']               = $this->name;
    $data['purpose']            = $borrower->purpose;
    $data['repayment_periods']  = $data;
    $data['hash']               = $hash;

    return $data;
  }
  /** =================== Helper Method ================== */

  /**
   * Add subscriber to loan apply
   *
   * @return array
   */
  public function __addSubscription($borrower, $bid)
  {
    $hash    = $this->__hash($borrower, $bid);
    $paySeq  = $this->paymentSequence($borrower);
    $dataSub = $this->dataSub($paySeq, $hash, $borrower, $bid);

    $http    = Http::withHeaders([
      'Accept'        => 'application/json',
      'Content-Type'  => 'application/json',
      'debug'         => true,
    ])->post("https://www.demo.betterpay.me/merchant/api/recurring/v1/add_subscription", $dataSub);
    return response([$http->json(), $http, $dataSub]);
  }
  /** =================== Loan Applied =================== */
}
