<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vendors_bank_details extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'vendor_id', 'account_holder_name', 'bank_name', 'account_number', 'bank_ifsc_code', 'created_at', 'updated_at'];
}
