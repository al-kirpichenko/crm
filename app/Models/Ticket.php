<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'object_id',
        'client_id',
        'description',
        'status',
        'date_open',
        'date_closed'
    ];

    public function object()
    {
        return $this->belongsTo(ObjectItem::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

}
