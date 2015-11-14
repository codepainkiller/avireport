<?php namespace AviReport\Entities;

use Illuminate\Database\Eloquent\Model;

class Control extends Model {

    protected $fillable = ['json_control', 'description', 'type', 'week', 'galpon_id'];

}
