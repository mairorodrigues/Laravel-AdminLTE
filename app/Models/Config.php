<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $fillable = [
        'app_name', 'app_name_abv', 'app_slogan',
        'captcha', 'datasitekey', 'recaptcha_secret',
        'img_login', 'caminho_img_login', 'tamanho_img_login',
        'titulo_login', 'layout', 'skin', 'favicon'
    ];
}