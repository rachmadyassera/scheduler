<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'organization_id',
        'date_activity',
        'name_activity',
        'location',
        'description',
        'accompanying_officer',
        'status_activity',
        'status'
    ];

    public function getIncrementing(){
        return false;
    }

    public function getKeyType(){
        return 'string';
    }
}
