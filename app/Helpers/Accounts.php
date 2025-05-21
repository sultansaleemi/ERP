<?php

namespace App\Helpers;
use App\Models\Banks;
use App\Models\Customers;
use App\Models\LeasingCompanies;
use App\Models\Riders;
use App\Models\Services;
use App\Models\Settings;

class Accounts
{

  public static function AccountTypes($id = null)
  {
    $types = [
      'Asset' => 'Asset',
      'Liability' => 'Liability',
      'Equity' => 'Equity',
      'Revenue' => 'Revenue',
      'Expense' => 'Expense'

    ];
    if ($id) {
      return $types[$id];
    } else {
      return $types;
    }
  }

  public static function dropdown($items, $selected = null, $parentId = null, $prefix = '')
  {
    $html = '';
    $select = '';
    //$items = Accounts::all(['id', 'name', 'account_parent_id'])->groupBy('account_parent_id');

    // Get categories grouped by parent_id
    if (isset($items[$parentId])) {
      foreach ($items[$parentId] as $item) {
        if ($selected) {
          if ($item->id == $selected) {
            $select = 'selected';
          } else {
            $select = '';
          }
        }

        $html .= '<option value="' . $item->id . '" ' . $select . '>' . $prefix . $item->name . '</option>';
        $html .= self::dropdown($items, $selected, $item->id, $prefix . '⮞ ');
      }
    }

    return $html;
  }


  public static function getRef($data)
  {
    if ($data['ref_name']) {
      if ($data['ref_name'] == 'Customer') {
        $row = Customers::find($data['ref_id']);
      }
      if ($data['ref_name'] == 'Rider') {
        $row = Riders::find($data['ref_id']);
      }
      if ($data['ref_name'] == 'Bank') {
        $row = Banks::find($data['ref_id']);
      }
      if ($data['ref_name'] == 'LeasingCompany') {
        $row = LeasingCompanies::find($data['ref_id']);
      }
      if ($data['ref_name'] == 'Account') {
        $row = \App\Models\Accounts::find($data['ref_id']);
      }
      return $row;
    }
  }

}
