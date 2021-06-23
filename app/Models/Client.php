<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Client
 *
 * @property $id
 * @property $names
 * @property $last_name
 * @property $type_id
 * @property $number_ID
 * @property $user_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Account[] $accounts
 * @property Registration[] $registrations
 * @property Transaction[] $transactions
 * @property Type $type
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Client extends Model
{
    
    static $rules = [
		'names' => 'required',
		'last_name' => 'required',
		'type_id' => 'required',
		'number_ID' => 'required',
		'user_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['names','last_name','type_id','number_ID','user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accounts()
    {
        return $this->hasMany('App\Models\Account', 'client_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function registrations()
    {
        return $this->hasMany('App\Models\Registration', 'client_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction', 'client_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function type()
    {
        return $this->hasOne('App\Models\Type', 'id', 'type_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    

}
