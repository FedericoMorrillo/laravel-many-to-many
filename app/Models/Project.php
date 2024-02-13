<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;
    //one to many
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    //many to many
    public function technology()
    {
        return $this->belongsToMany(Technology::class);
    }
}
