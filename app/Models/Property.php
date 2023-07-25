<?php

namespace App\Models;

use App\Traits\TimeStampGetter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model{
    use TimeStampGetter;
    use HasFactory;
    protected $table = 'properties';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $casts = [
        'details' => 'array',
    ];
}
