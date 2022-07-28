<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Calendar extends Model
{
    use HasFactory, Notifiable;
    protected $table = "calendars";
    protected $primaryKey = "id";
    // public $fillable = [];
    protected $guarded = [];
}