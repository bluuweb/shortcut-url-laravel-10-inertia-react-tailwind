<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Url;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function urls()
    {
        return $this->belongsToMany(Url::class);
    }
}
