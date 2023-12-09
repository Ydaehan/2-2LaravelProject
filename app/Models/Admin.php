<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    use HasFactory;


    protected $primaryKey = 'id';

    protected $fillable = ['id', 'password', 'nickname'];

    public $incrementing = false; // 기본 키 자동 증가 비활성화
}
