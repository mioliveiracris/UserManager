<?php 

namespace App\Repository;

use App\Models\User;
use App\Repository\IUserRepository;


class UserRepository implements IUserRepository
{   
    protected $user = null;

    public function getAllUsers()
    {
        return User::all();
    }

    public function getUserById($id)
    {
        return User::find($id);
    }

    public function createOrUpdate( $id = null, $collection = [], $foto = null )
    {   
        if(is_null($id)) {
            $user = new User;
            $user->nome = $collection['nome'];
            $user->data_nascimento = $collection['data_nascimento'];
            $user->foto = $foto;
            return $user->save();
        }
        $user = User::find($id);
        $user->nome = $collection['nome'];
        $user->data_nascimento = $collection['data_nascimento'];
        if (!is_null($foto)){
            $user->foto = $foto;
        }
        return $user->save();
    }
    
    public function deleteUser($id)
    {
        return User::find($id)->delete();
    }
}