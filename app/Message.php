<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\FilterByUser;

/**
 * Class Message
 *
 * @package App
 * @property string $content
 * @property string $house
 * @property string $user
 * @property string $created_by
*/
class Message extends Model
{
    use SoftDeletes, FilterByUser;

    protected $fillable = ['content', 'house_id', 'user_id', 'created_by_id'];
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setHouseIdAttribute($input)
    {
        $this->attributes['house_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setUserIdAttribute($input)
    {
        $this->attributes['user_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCreatedByIdAttribute($input)
    {
        $this->attributes['created_by_id'] = $input ? $input : null;
    }
    
    public function house()
    {
        return $this->belongsTo(House::class, 'house_id')->withTrashed();
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
    
}
