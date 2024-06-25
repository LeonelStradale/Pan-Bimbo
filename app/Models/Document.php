<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'area_id',
        'name',
        'type_of_document',
        'document',
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
