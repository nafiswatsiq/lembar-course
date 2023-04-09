<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'kelas_id',
        'slug',
        'title',
        'content',
    ];

    protected $richTextFields = [
        'content',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
