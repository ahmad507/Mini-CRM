<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    public $table = 'companies';
    protected $fillable = ['name','email','logo','website'];
    public $timestamps = false;
    public function employe()
    {
        return $this->hasMany(Employe::class, 'id')->select('id', 'company_id');
    }
}




