<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestData extends Model
{
    use HasFactory;

    protected $table = 'test_data';

    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'full_name'];
}
