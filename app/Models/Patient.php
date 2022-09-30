<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $table = 'patients';
    protected $primaryKey = 'id_patient';


    public function relative(){
        return $this->hasOne(Relative::class, 'id_relative','relatives_id');
    }
}
