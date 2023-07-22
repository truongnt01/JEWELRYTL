<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

    class products extends Model
    {
        use HasFactory;

        public function categories(){
            return $this->belongsTo(categories::class,'categories_id');
        }
    }
