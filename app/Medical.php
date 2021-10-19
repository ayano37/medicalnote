<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medical extends Model
{
    protected $fillable = ['temperature','weight','period_s','period_f','injury','image_path']; //保存したいカラム名が複数の場合//
}
