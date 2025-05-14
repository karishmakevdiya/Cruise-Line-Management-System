<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    public function cruises() {
        return $this->hasMany(Cruise::class);
    }
}
