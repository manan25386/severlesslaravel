<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

     protected $table = 'Product';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Name', 'Slug', 'BrandId', 'UPC', 'PartNumber', 'CountryOfManufactureId', 'DisplayWeight', 'ShippingWeight', 'OldPartNumber', 'HarmonizedTariffCode', 'ShortDescription', 'Description', 'FPIds', 'IsCaliforniaProposition65Warning', 'ImportantNotes', 'CreatedSellerBusinessId', 'CreatedSellerId','APIN', 'TotalSold', 'InstructionFile', 'CaliforniaProposition65WarningDescription'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';
}