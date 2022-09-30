<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_date';


    public function doctors()
    {
        return $this->belongsToMany(Doctor::class, 'date_has_doctors','doctors_id', 'dates_id');
    }
}
