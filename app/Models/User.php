<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return HasMany
     */
    public function compra()
    {
        return $this->hasMany('App\Models\Compra', 'user_id');
    }
    /**
     * @return HasMany
     */
    public function compra_item()
    {
        return $this->hasMany('App\Models\CompraItem', 'user_id');
    }
    /**
     * @return HasMany
     */
    public function requisicao()
    {
        return $this->hasMany('App\Models\Requisicao', 'user_id');
    }
    /**
     * @return HasMany
     */
    public function requisicao_item()
    {
        return $this->hasMany('App\Models\RequisicaoItem', 'user_id');
    }
}
