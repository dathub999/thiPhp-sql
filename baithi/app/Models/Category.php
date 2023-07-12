<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

    class Category extends Model{
        protected $table = 'category';
        protected $primarykey = 'id';
        public $timestamps = false;
        protected $fillable = [
            'name', 'description', 'photo'
        ];

        public function product(){
            
            return $this->hasMany(Products::class,'categogy_id'/* ,'id' */);
        }
    }