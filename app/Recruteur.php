<?php

    namespace App;

    use Illuminate\Notifications\Notifiable;
    use Illuminate\Foundation\Auth\User as Authenticatable;

    class Recruteur extends Authenticatable
    {
        use Notifiable;

        protected $guard = 'recruteur';

        protected $fillable = [
            'name', 'email', 'phone', 'Adress', 'cin', 'password',
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];
    }
