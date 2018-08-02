<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  use Notifiable;
    //
    public $fillable = ['content','passphrase','email'];
}
