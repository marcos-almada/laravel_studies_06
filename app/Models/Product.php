<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // permitir a atribuição em massa para os campos product_name e price
    // sem isto, o Eloquent ORM bloquearia a atribuição em massa por questões de segurança
    protected $fillable = ['product_name', 'price'];
}
