<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'students';
    protected $fillable = ['name', 'email', 'dob', 'id_teacher']; // Tambahkan kolom 'name' ke fillable property
    protected $appends = ['age'];

    public function getAgeAttribute()
    {
        return Carbon::parse($this->dob)->age;
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'id_teacher', 'id');
    }
}
