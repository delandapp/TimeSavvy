<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_user extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    public $incrementing = true;
    protected $table = "detail_users";
    protected $primaryKey = "id";
    protected $keyType = "int";

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id_details');
    }
}
