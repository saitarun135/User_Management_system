<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    public $table = 'employees';
    public $fillable = [
        'fname','email','dol','doj','current_date','joining_date','image'
    ];
    public $timestamps = false;

    public function managers(){
        return $this->belongsTo(Manager::class);
    }
}
