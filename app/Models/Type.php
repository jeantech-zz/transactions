<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Type
 *
 * @property $id
 * @property $type_info
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @property Account[] $accounts
 * @property Client[] $clients
 * @property Registration[] $registrations
 * @property Transaction[] $transactions
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Type extends Model
{
    
    static $rules = [
		'type_info' => 'required',
		'name' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['type_info','name'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accounts()
    {
        return $this->hasMany('App\Models\Account', 'type_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clients()
    {
        return $this->hasMany('App\Models\Client', 'type_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function registrations()
    {
        return $this->hasMany('App\Models\Registration', 'type_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction', 'type_id', 'id');
    }
    

}
