<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\Borrower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DataController extends Controller
{
  /**
   * To show api data borrower
   *
   * @return \Illuminate\Support\Facades\Response
   */
  public function borrower(Applicant $apply)
  {
    return datatables($apply->query())
    ->addIndexColumn()
    ->addColumn('ic_back', function($apply) {
      if($apply->ic_back) {
        return [
          'size' => File::size(public_path('/uploads/' . $apply->ic_back)),
          'name' => File::name(public_path('/uploads/' . $apply->ic_back)),
          'ext'  => File::extension(public_path('/uploads/' . $apply->ic_back)),
        ];
      }
    })
    ->addColumn('ic_front', function($apply) {
      if($apply->ic_front) {
        return [
          'size' => File::size(public_path('/uploads/' . $apply->ic_front)),
          'name' => File::name(public_path('/uploads/' . $apply->ic_front)),
          'ext'  => File::extension(public_path('/uploads/' . $apply->ic_front)),
        ];
      }
    })->addColumn('salary', function($apply) {
      if($apply->salary) {
        return [
          'size' => File::size(public_path('/uploads/' . $apply->salary)),
          'name' => File::name(public_path('/uploads/' . $apply->salary)),
          'ext'  => File::extension(public_path('/uploads/' . $apply->salary)),
        ];
      }
    })
    ->addColumn('salary_slip', function($apply) {
      if($apply->salary_slip) {
        return [
          'size' => File::size(public_path('/uploads/' . $apply->salary_slip)),
          'name' => File::name(public_path('/uploads/' . $apply->salary_slip)),
          'ext'  => File::extension(public_path('/uploads/' . $apply->salary_slip)),
        ];
      }
    })->make(true);
  }

  /**
   * To show api data Applicant
   *
   * @return \Illuminate\Support\Facades\Response
   */
  public function applicant(Borrower $borrowers)
  {
    return datatables($borrowers->query())
    ->addIndexColumn()
    ->addColumn('ic_back', function($borrower) {
      if($borrower->ic_back) {
        return [
          'size' => File::size(public_path('/uploads/' . $borrower->ic_back)),
          'name' => File::name(public_path('/uploads/' . $borrower->ic_back)),
          'ext'  => File::extension(public_path('/uploads/' . $borrower->ic_back)),
        ];
      }
    })
    ->addColumn('ic_front', function($borrower) {
      if($borrower->ic_front) {
        return [
          'size' => File::size(public_path('/uploads/' . $borrower->ic_front)),
          'name' => File::name(public_path('/uploads/' . $borrower->ic_front)),
          'ext'  => File::extension(public_path('/uploads/' . $borrower->ic_front)),
        ];
      }
    })->addColumn('salary', function($borrower) {
      if($borrower->salary) {
        return [
          'size' => File::size(public_path('/uploads/' . $borrower->salary)),
          'name' => File::name(public_path('/uploads/' . $borrower->salary)),
          'ext'  => File::extension(public_path('/uploads/' . $borrower->salary)),
        ];
      }
    })
    ->addColumn('salary_slip', function($borrower) {
      if($borrower->salary_slip) {
        return [
          'size' => File::size(public_path('/uploads/' . $borrower->salary_slip)),
          'name' => File::name(public_path('/uploads/' . $borrower->salary_slip)),
          'ext'  => File::extension(public_path('/uploads/' . $borrower->salary_slip)),
        ];
      }
    })->make(true);
  }
}
