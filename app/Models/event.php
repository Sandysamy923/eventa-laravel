<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    protected $fillable = ['title', 'description', 'location', 'event_date','event_price', 'image'];

}
