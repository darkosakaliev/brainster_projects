<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'created_by',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function academies() {
        return $this->belongsToMany(Academy::class, 'project_academy');
    }

    public function applicants() {
        return $this->hasMany(Application::class, 'project_id');
    }
}
