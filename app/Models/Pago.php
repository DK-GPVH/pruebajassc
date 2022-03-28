<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pago
 *
 * @property $id
 * @property $propiedad_id
 * @property $fecha_pago
 * @property $descripcion
 * @property $tipo_pago
 * @property $estado
 * @property $monto
 * @property $created_at
 * @property $updated_at
 *
 * @property Propiedade $propiedade
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pago extends Model
{
    
    static $rules = [
		'fecha_pago' => 'required',
		'tipo_pago' => 'required',
		'estado' => 'required',
		'monto' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['propiedad_id','fecha_pago','descripcion','tipo_pago','estado','monto'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function propiedade()
    {
        return $this->hasOne('App\Models\Propiedade', 'id', 'propiedad_id');
    }
    

}
