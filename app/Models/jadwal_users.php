<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwal_users extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $incrementing = true;
    protected $table = "jadwal_users";
    protected $primaryKey = "id";
    protected $keyType = "int";

}
