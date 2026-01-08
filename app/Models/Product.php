<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    // permitir a atribuição em massa para os campos product_name e price
    // sem isto, o Eloquent ORM bloquearia a atribuição em massa por questões de segurança
    protected $fillable = ['product_name', 'price'];

    // habilitar o uso de soft deletes (exclusão lógica) na tabela products
    // se a tabela tiver a coluna deleted_at
    use SoftDeletes;
}
