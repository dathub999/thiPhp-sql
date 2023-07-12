<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

    class Role extends Model{
        protected $table = 'role';
        protected $primarykey = 'id';
        public $timestamps = false;
        protected $fillable = [
            'permission'
        ];
    }