<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Propiedade
 *
 * @property $id
 * @property $manzana
 * @property $lote
 * @property $zona
 * @property $nrodesuministro
 * @property $cliente_id
 * @property $categoria_id
 * @property $estado
 * @property $fecha_inscripcion
 * @property $fecha_adeudo
 * @property $created_at
 * @property $updated_at
 *
 * @property Categoria $categoria
 * @property Cliente $cliente
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Propiedade extends Model
{
    
    static $rules = [
		'manzana' => 'required',
		'lote' => 'required',
		'zona' => 'required',
		'nrodesuministro' => 'required',
		'estado' => 'required',
		'fecha_inscripcion' => 'required',
		'fecha_adeudo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['manzana','lote','zona','nrodesuministro','cliente_id','categoria_id','estado','fecha_inscripcion','fecha_adeudo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria()
    {
        return $this->hasOne('App\Models\Categoria', 'id', 'categoria_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cliente()
    {
        return $this->hasOne('App\Models\Cliente', 'id', 'cliente_id');
    }
    

}
