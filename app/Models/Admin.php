<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'admins';
    //use table admins

    protected $primaryKey = 'id_admin';
    //use PK is id_admin not id

    //use timestamp
    public $timestamps = true;

    //list field on table
    protected $fillable = ['first_name', 'last_name', 'email', 'password'];
}
