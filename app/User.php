<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'currency_code',
    ];

    /**
     * The attributes that are NOT mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'plan',
        'is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean',
        'trial_ends_at' => 'datetime'
    ];

    protected $appends = [
      'item_limit',
      'user_plan'
    ];

    public function items() {
      return $this->hasMany(Item::class, 'created_by');
    }

    public function collections() {
      return $this->hasMany(Collection::class, 'created_by');
    }

    public function getItemLimitAttribute() {
      $plan = $this->plan;
      return $this->attributes['item_limit'] = ($plan['limit'] ?? 0) - ($this->items()->count() ?? 0);
    }

    public function getUserPlanAttribute() {
      $plan = config('access.tiers.' . ($this->plan ?? 'none'));
      $remaining = ($plan['limit'] ?? 0) - ($this->items()->count() ?? 0);
      $collection_remaining = ($plan['collection_limit'] ?? 0) - ($this->collections()->count() ?? 0);

      return $this->attributes['user_plan'] = [
        'plan' => $plan,
        'remaining' => $remaining,
        'over_limit' => ($plan['limit'] == -1 ?  false : $remaining <= 0),
        'over_collection_limit' => ($plan['collection_limit'] == -1 ?  false : $collection_remaining <= 0)
      ];

    }

}
