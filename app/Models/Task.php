<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Khai báo các trường được phép gán dữ liệu (mass assignable)
    protected $fillable = [
        'title',
        'description',
        'assigned_to',
        'assigned_by',
    ];

    // Quan hệ với model User (người được giao task)
    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    // Quan hệ với model User (người giao task)
    public function assignedBy()
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }
}
