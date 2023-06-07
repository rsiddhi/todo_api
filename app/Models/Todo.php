<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Sortable;

class Todo extends Model
{
    use HasFactory;
    use Sortable;
    protected $fillable = ['title','is_completed'];
}
