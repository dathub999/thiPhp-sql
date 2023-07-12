<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

    class Blog extends Model{
        protected $table = 'blog';
        protected $primarykey = 'id';
        public $timestamps = false;
        protected $fillable = [
            'name', 'photo', 'content'
        ];
    }