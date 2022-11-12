<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vendors_business_details extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'vendor_id', 'shop_name', 'shop_address', 'shop_city', 'shop_country', 'shop_pincode', 'shop_mobile', 'shop_website', 'shop_email', 'address_proof', 'address_proof_image', 'business_licence_number', 'gst_number', 'pan_number', 'created_at', 'updated_at'];
}
