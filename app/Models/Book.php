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
        'read_at', // 登録日
        'note', // メモ
        'filename' // 画像
    ];
     
    // 本タイトルを検索
    public function scopeKeywordsearch($query, $search) {
        // 検索する本タイトル
        $name = $search['keyword'] ?? '';
     if(!is_null($search)){
        $query->when($name,function($query,$name){
            $query->where('name','like',"%$name%");
        });
        return $query;
     }
     // 検索するものがなければそのまま返す
     else{
        return;
     }
    }
}
