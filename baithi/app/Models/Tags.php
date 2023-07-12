<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

    class Tags extends Model{
        protected $table = 'tags';
        protected $primarykey = 'id';
        public $timestamps = false;
        protected $fillable = [
            'name'
        ];
    }