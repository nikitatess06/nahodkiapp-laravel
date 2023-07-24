<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Finding extends Model
{
    use HasFactory;
    protected $table = 'findings';
    protected $fillable = ['name', 'location', 'contacts'];
}
