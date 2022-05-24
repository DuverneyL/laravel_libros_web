<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    //Relacion de uno a muchos
    //no es necesario importar la clase Categoria porque está en el mismo ninel que Libro
    public function categoria(){
        return $this->belongsTo(Categoria::class); //pertenece a una categoria
    }
    //no es necesario importar la clase Etiqueta porque esta en el mismo ninel que Libro
    public function etiquetas(){
        return $this->belongsToMany(Etiqueta::class); //relacion muchos a muchos
    }

    protected $dates = ['fecha']; // configurar(pasar) fechas a carbon
}
