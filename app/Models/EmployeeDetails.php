<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeDetails extends Model
{
    use HasFactory;
    protected $table = 'employee_details';
    protected $fillable = [
        'employee_id',
        'father_name',
        'mother_name',
        'address',
        'image',
    ];
}
