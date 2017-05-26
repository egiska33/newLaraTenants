<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class House
 *
 * @package App
 * @property string $landlord
 * @property string $tenant
 * @property string $city
 * @property string $address
*/
class House extends Model
{
    use SoftDeletes;

    protected $fillable = ['city', 'address', 'landlord_id', 'tenant_id'];
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setLandlordIdAttribute($input)
    {
        $this->attributes['landlord_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setTenantIdAttribute($input)
    {
        $this->attributes['tenant_id'] = $input ? $input : null;
    }
    
    public function landlord()
    {
        return $this->belongsTo(User::class, 'landlord_id');
    }
    
    public function tenant()
    {
        return $this->belongsTo(User::class, 'tenant_id');
    }
    
}
