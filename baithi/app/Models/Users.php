<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

    class Users extends Model{
        protected $table = 'users';
        protected $primarykey = 'id';
        public $timestamps = false;
        protected $fillable = [
            'name', 'photo', 'age', 'sex', 'address', 'phone','email','account_id','create_at'
        ];
    }
    