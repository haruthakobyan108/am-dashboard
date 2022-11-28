<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use CrudTrait;

    protected $connection='pgsql';

    protected $fillable = ['*'];


    public function __construct(string $connection = 'pgsql')
    {
        $this->connection = $connection;
    }
}
