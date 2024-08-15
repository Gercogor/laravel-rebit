<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    public function contact()
    {
        return $this->hasOne('App\Models\Contact', 'id', 'contact_id');
    }
    protected $guarded = [];
}
