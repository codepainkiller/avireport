<?php namespace AviReport\Entities;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    /**
     * Perfil de usuario
     * @return object
     */
    public function userProfile()
    {
        $this->hasOne('AviReport\Entities\UserProfile');
    }

    /**
     * Granjas que pertenecen al usuario
     * @retuen array
     */
    public function granjas()
    {
        $this->hasMany('AviReport\Entities\Granja');
    }

    /**
     * Servicios contratados por el usuario
     * @return array
     */
    public function services()
    {
        $this->hasMany('AviReport\Entities\Service');
    }

}
