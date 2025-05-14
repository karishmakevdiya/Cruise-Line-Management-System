<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cruise extends Model
{
    public function ship() {
        return $this->belongsTo(Ship::class);
    }

    public function embarkationPort() {
        return $this->belongsTo(Port::class, 'embarkation_port_id');
    }
}
