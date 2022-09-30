<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consult extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_consult';
    protected $fillable = [
        'code',
        'date',
        'patients_id',
        'doctors_id',
    ];



    public function patient(){
        return $this->hasOne(Patient::class, 'id_patient','patients_id');
    }
    public function doctor(){
        return $this->hasOne(Doctor::class, 'id_doctor','doctors_id');
    }
    public function date(){
        return $this->hasOne(Date::class, 'id_date','dates_id');
    }
}
