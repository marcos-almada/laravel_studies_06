<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TesteModel extends Model
{
    // se quiser definir qual es a tabela do model
    protected $table = 'products';

    // definir a chave primaria
    protected $primaryKey = 'id';

    // se a coluna da chave primaria nao for auto increment
    public $incrementing = true;

    // se nao quiser as colunas created_at e updated_at
    public $timestamps = false;

    // se quiser alterar a data do created_at e updated_at
    protected $dateFormat = 'Y-m-d H:i:s';

    // colunas created_at e updated_at personalizadas
    const CREATED_AT = 'data_criacao';
    const UPDATED_AT = 'data_atualizacao';
}
