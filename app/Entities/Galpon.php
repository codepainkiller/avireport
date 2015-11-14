<?php namespace AviReport\Entities;

use Illuminate\Database\Eloquent\Model;

class Galpon extends Model {

	protected $fillable = ['code', 'number_birds', 'description', 'max_capacity', 'granja_id'];

    /**
     * Control de cada galpon
     * @return object
     */
    public function control()
    {
        return $this->hasOne('AviReport\Entities\Control');
    }

    /**
     * Granja a cual pertence el galpon
     * @return object
     */
    public function granja()
    {
        $this->belongsTo('AviReport\Entities\Granja');
    }

}
