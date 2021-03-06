<?php
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Hash;

/**
 * Class User
 *
 * @package App
 * @property string $name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property string $password
 * @property string $role
 * @property string $remember_token
*/
class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = ['name', 'last_name', 'email', 'phone', 'password', 'remember_token', 'role_id'];
    
    
    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setRoleIdAttribute($input)
    {
        $this->attributes['role_id'] = $input ? $input : null;
    }
    
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    
    public function isAdmin()
    {
        if($this->role_id == 1){
            return true;
        }else {
            return false;
        }
    }

    public function isLandlord()
    {
        if($this->role_id == 2){
            return true;
        } else {
            return false;
        }
    }

    public function isTenant()
    {
        if($this->role_id == 3){
            return true;
        } else {
            return false;
        }
    }
    
}
