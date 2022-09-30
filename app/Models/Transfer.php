<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_transfer';


    public function patient(){
        return $this->hasOne(Patient::class, 'id_patient','patients_id');
    }
    public function date(){
        return $this->hasOne(Date::class, 'id_date','dates_id');
    }
}
