<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_doctor';
    protected $fillable = [
        'name',
        'specialty',
    ];



    public function dates(){
        return $this->belongsToMany(Date::class,'date_has_doctors', 'dates_id','doctors_id');
    }

}
