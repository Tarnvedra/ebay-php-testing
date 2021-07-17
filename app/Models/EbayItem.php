<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EbayItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku', 'availability', 'aspects', 'brand', 'title', 'subtitle', 'description', 'condition',
        'condition_description', 'package_details', 'ean', 'epid', 'image_urls', 'isbn', 'mpn', 'upc'
    ];
}

