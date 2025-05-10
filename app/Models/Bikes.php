<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bikes extends Model
{
  public $table = 'bikes';

  public $fillable = [
    'plate',
    'chassis_number',
    'color',
    'model',
    'model_type',
    'engine',
    'company',
    'rider_id',
    'notes',
    'created_by',
    'updated_by',
    'warehouse',
    'traffic_file_number',
    'emirates',
    'bike_code',
    'registration_date',
    'expiry_date',
    'insurance_expiry',
    'status',
    'insurance_co',
    'contract_number',
    'policy_no'
  ];

  protected $casts = [
    'plate' => 'string',
    'chassis_number' => 'string',
    'color' => 'string',
    'model' => 'string',
    'model_type' => 'string',
    'engine' => 'string',
    'notes' => 'string',
    'warehouse' => 'string',
    'traffic_file_number' => 'string',
    'emirates' => 'string',
    'bike_code' => 'string',
    'registration_date' => 'date',
    'expiry_date' => 'date',
    'insurance_expiry' => 'date',
    'insurance_co' => 'string',
    'policy_no' => 'string'
  ];

  public static array $rules = [
    'plate' => 'required|string|max:100',
    'chassis_number' => 'required|string|max:100',
    'color' => 'required|string|max:100',
    'model' => 'required|string|max:100',
    'model_type' => 'required|string|max:100',
    'engine' => 'required|string|max:100',
    'company' => 'nullable',
    'rider_id' => 'nullable',
    'notes' => 'nullable|string|max:65535',
    'created_by' => 'nullable',
    'updated_by' => 'nullable',
    'created_at' => 'nullable',
    'updated_at' => 'nullable',
    'warehouse' => 'nullable|string|max:50',
    'traffic_file_number' => 'nullable|string|max:100',
    'emirates' => 'nullable|string|max:100',
    'bike_code' => 'nullable|string|max:100',
    'registration_date' => 'nullable',
    'expiry_date' => 'nullable',
    'insurance_expiry' => 'nullable',
    'insurance_co' => 'nullable|string|max:255',
    'policy_no' => 'nullable|string|max:100'
  ];
  public static function dropdown()
  {
    return self::select('id', 'plate')->pluck('plate', 'id')->prepend('Select', '');
  }
  public function rider()
  {
    return $this->belongsTo(Riders::class, 'rider_id', 'id');
  }
  public function company()
  {
    return $this->belongsTo(LeasingCompanies::class, 'company', 'id');
  }

}
