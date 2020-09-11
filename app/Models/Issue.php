<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;
    
    protected $table = 'issues';

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_id');
    }
}
