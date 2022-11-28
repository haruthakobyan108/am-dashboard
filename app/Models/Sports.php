<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sports extends Model
{
    use HasFactory;
    use CrudTrait;

    protected $connection='pgsql';

    protected $fillable = ['*'];


    public function __construct(string $connection = 'pgsql')
    {
        $this->connection = $connection;
    }
}
