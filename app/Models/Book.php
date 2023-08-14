<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', // 名前
        'status', // 1.読書中 2.未読 3.読破 4.今後読みたい
        'author', //著者
        'publication', // 出版社
        'read_at', // 読破日
        'note', // メモ
        'filename' // 画像
    ];
}
