<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entrada_Productos extends Model
{
    use SoftDeletes;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "entrada_producto";
    
    protected $fillable = [
        'producto_id','proveedor_id','cantidad', 'precio'
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'deleted_at','updated_at'
    ];

    public function proveedor(){
        return $this->hasOne('App\Proveedores','id','proveedor_id')->select('id', 'nombre', 'descripcion', 'email', 'telefono');
    }
    public function producto(){
        return $this->hasOne('App\Producto','id','producto_id')->select('id','nombre');
    }
}
