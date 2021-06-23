<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Account
 *
 * @property $id
 * @property $client_id
 * @property $type_id
 * @property $number_accounts
 * @property $created_at
 * @property $updated_at
 *
 * @property Client $client
 * @property Transaction[] $transactions
 * @property Type $type
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Account extends Model
{
    
    static $rules = [
		'client_id' => 'required',
		'type_id' => 'required',
		'number_accounts' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['client_id','type_id','number_accounts'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function client()
    {
        return $this->hasOne('App\Models\Client', 'id', 'client_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction', 'account_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function type()
    {
        return $this->hasOne('App\Models\Type', 'id', 'type_id');
    }
    

}
