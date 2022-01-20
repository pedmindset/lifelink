<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'duration', 'location', 'commitee_interest', 'regional_bloc', 'entry_visa', 'first_time', 'embassy_loaction', 'start', 'end'];
}
