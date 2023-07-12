<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

    class Contacts extends Authenticatable{
        protected $table = 'contacts';
        protected $primarykey = 'id';
        public $timestamps = false;
        protected $fillable = [
            'mess','account_id'
        ];
    }