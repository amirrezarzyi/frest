<?php

namespace App\Helpers;

use Morilog\Jalali\Jalalian;

//jalali date format for CREAT FOLDER FILES  , (JFF = JALALI FORMAT FOLDER)
function jFF($format)
{
    return Jalalian::forge(now())->format($format);
} 

// avatar 1401-02-14-16-22-06
function avatarName()
{
    return jdate(now())->format('%Y-%m-%d-%H-%M-%S');
} 