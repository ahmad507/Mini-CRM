<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;
    public $table = 'employees';
    protected $fillable = ['first_name','lastName','company_id','email','phonenumber'];
    public $timestamps = false;

    public function company()
    {
        return $this->belongsTo(Company::class)->orderBy('id', 'desc');
    }
}


