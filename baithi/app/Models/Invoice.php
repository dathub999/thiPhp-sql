<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

    class Invoice extends Model{
        protected $table = 'invoice';
        protected $primarykey = 'id';
        public $timestamps = false;
        protected $fillable = [
            'name', 'total', 'payment', 'status'
        ];
    }