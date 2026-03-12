<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class CropSolution extends Model
{
    use HasFactory;


    protected $fillable = [
        'crop_name',
        'problem_type',
        'problem_name',
        'description',
        'solution_text',
        'image',
        'user_id',
    ];

    // Relationship to the User (creator)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
