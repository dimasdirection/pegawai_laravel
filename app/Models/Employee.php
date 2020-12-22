<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    //use table employees

    protected $primaryKey = 'id_employee';
    //use PK is id_employee not id

    //use timestamp
    public $timestamps = true;
}
