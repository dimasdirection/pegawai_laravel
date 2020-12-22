<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuperAdmin extends Model
{
    use HasFactory;
    protected $table = 'superadmins';
    //use table employees

    protected $primaryKey = 'id_super_admin';
    //use PK is id_employee not id

    //use timestamp
    public $timestamps = true;
}
