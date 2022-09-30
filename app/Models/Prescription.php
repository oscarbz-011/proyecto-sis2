<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_prescription';



    public function patient(){
        return $this->hasOne(Patient::class, 'id_patient','patients_id');
    }
    public function medicine(){
        return $this->hasOne(Medicine::class, 'id_medicine','medicines_id');
    }
}
