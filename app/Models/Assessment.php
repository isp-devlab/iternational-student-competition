<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'assessments';
    protected $primaryKey = 'id';

    protected $fillable = [
        'content',
        'type',
    ];
}
