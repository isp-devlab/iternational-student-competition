<?php

namespace App\Models;

use App\Models\User;
use App\Models\Score;
use App\Models\Member;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'teams';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'name',
        'logo'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function score()
    {
        return $this->hasMany(Score::class);
    }

    public function member()
    {
        return $this->hasMany(Member::class);
    }
}
