<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Transaction
 *
 * @property $id
 * @property $account_id
 * @property $client_id
 * @property $type_id
 * @property $accounts_registry_id
 * @property $value
 * @property $created_at
 * @property $updated_at
 *
 * @property Account $account
 * @property Client $client
 * @property Registration $registration
 * @property Type $type
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Transaction extends Model
{
    
    static $rules = [
		'account_id' => 'required',
		'client_id' => 'required',
		'type_id' => 'required',
		'accounts_registry_id' => 'required',
		'value' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['account_id','client_id','type_id','accounts_registry_id','value'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function account()
    {
        return $this->hasOne('App\Models\Account', 'id', 'account_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function client()
    {
        return $this->hasOne('App\Models\Client', 'id', 'client_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function registration()
    {
        return $this->hasOne('App\Models\Registration', 'id', 'accounts_registry_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function type()
    {
        return $this->hasOne('App\Models\Type', 'id', 'type_id');
    }
    

}
