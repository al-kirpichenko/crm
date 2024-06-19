<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjectItem extends Model
{
    use HasFactory;

    protected $table = 'objects';
    protected $fillable = ['name', 'address','client_id'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
