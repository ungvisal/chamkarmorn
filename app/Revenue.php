<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    public $table = "revenue";
    public $timestamps = false;

    function __construct(){
        $this->connection = 'mysql';
    }
}