<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function categories()
    {
        return $this->belongsTo(categories::class, 'categories_id');
    }

    public function attributes()
    {
        return $this->belongsToMany(Atrribute::class, 'product_attribute');
    }
}
