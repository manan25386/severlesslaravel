<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{

     protected $table = 'Brand';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Name', 'Slug', 'BannerImage', 'CreatedAt', 'UpdatedAt', 'Description', 'DisplayOrder', 'IsActive', 'IsPopularBrand', 'MetaDescription', 'MetaTitle', 'Website', 'Level', 'Count'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ["created_at", "updated_at"];

}