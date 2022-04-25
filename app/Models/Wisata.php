<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = true;
    use HasFactory;
}
