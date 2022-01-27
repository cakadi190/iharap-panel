<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
  use HasFactory;

  protected $guarded = [];

  /**
   * Get loan data
   *
   * @return array
   */
  public function getLoan()
  {
    return $this->belongsTo(Applicant::class, 'loan_id', 'id_loan');
  }
}
