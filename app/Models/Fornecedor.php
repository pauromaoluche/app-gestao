<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    use HasFactory;

    //adiciona tabela de delete, inativa o registro sem o deletar
    use SoftDeletes;

    protected $table = 'fornecedores';
    protected $fillable = ['nome', 'site', 'uf', 'email'];

    public function produtos(){
        return $this->hasMany(Item::class);
    }

}
