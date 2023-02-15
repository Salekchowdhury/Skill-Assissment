<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeAttendance extends Model
{
    use HasFactory;
    protected $table = 'employee_attendances';
    protected $fillable = [
        'employee_id',
        'date',
        'in_time',
        'out_time',
    ];
    public function attendance()
    {
        return $this->belongsTo(User::class, 'employee_id', 'id');
    }
}
