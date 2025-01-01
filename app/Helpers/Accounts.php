<?php

namespace App\Helpers;
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
          }
        }

        $html .= '<option value="' . $item->id . '" ' . $select . '>' . $prefix . $item->name . '</option>';
        $html .= self::dropdown($items, $selected, $item->id, $prefix . '⮞ ');
      }
    }

    return $html;
  }

}
