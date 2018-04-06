<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', //'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //'password', 'remember_token',
    ];

    /**
     * Return the user attributes.
     * @return array
     */
    public static function getAuthor($id)
    {
        $user = self::find($id);

        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => 'test@gmail.com',//$user->email,
            'url' => '',  // Optional
            'avatar' => 'gravatar',  // Default avatar
            'admin' => $user->role === 'admin', // bool
        ];
    }

    public static function getUserAgents()
    {
        $userAgents = static::selectRaw(
            'SUBSTRING_INDEX(`user_agent`, \' \', 1) as `user_browser`, count(*) user_browser_count'
        )
            ->groupBy('user_browser')
            ->get();

        return $userAgents;
    }
}