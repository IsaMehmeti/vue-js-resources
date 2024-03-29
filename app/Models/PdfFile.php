<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PdfFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'name',
        'file_name',
        'size',
        'file_path'
    ];
}
