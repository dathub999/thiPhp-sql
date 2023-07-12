<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;

    class Account extends Model implements \Illuminate\Contracts\Auth\Authenticatable{
        use Authenticatable;
        protected $table = 'account';
        protected $primarykey = 'id';
        public $timestamps = false;
        protected $fillable = [
            'username','name', 'role_id', 'created', 'update','email','password'
        ];

     public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }
    public function getAuthname()
    {
        return $this->name;
    }
    public function getAuthrole()
    {
        return $this->role_id;
    }
}