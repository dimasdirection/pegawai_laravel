<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OffWork extends Model
{
    use HasFactory;
    protected $table = 'off_works';
    //use table Off Work

    protected $primaryKey = 'id_off_work';
    //use PK is id_off_work not id

    //use timestamp
    public $timestamps = true;

    //use date type
    protected $dateFormat = 'Y-m-d';

    //use field on table
    protected $fillable = ['employee_id', 'reason', 'start_date', 'finish_date'];
}
