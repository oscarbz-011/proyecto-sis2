<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relative extends Model
{

    use HasFactory;
    protected $table = 'relatives';
    protected $primaryKey = 'id_relative';

    protected $fillable = [
        'name',
        'surname',
        'document',
        'address',
        'phone',
    ];

    public function user(){
        return $this->hasOne(User::class, 'id_user','users_id');
    }

    public function patient(){
        return $this->belongsTo(Patient::class,'id_patient');
    }
}

