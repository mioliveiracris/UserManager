<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\IUserRepository;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{   
    public $user;
    
    public function __construct(IUserRepository $user)
    {
        $this->user = $user;
    }

    public function principal(){
        echo "teste";
    }

    public function showUsers()
    {
        $users = $this->user->getAllUsers();
        return View::make('user.index', compact('users'));
    }
    
    public function createUser()
    {
        return View::make('user.edit');
    }

    public function getUser($id)
    {
        $user = $this->user->getUserById($id);
        return View::make('user.edit', compact('user'));
    } 
    
    public function saveUser(Request $request, $id = null)
    {   
        $collection = $request;

        $mensagens = [
            'required' => '* :attribute é obrigatório!',
            'image'    => 'A :attribute precisa ser uma foto',
            'max'      => 'A foto precisa ter no máximo 2MB',
            'mimes'     => 'As extensões suportadas são jpeg,png,jpg,gif,svg',

        ];

        $request->validate([
            'nome'  => 'required',
            'data_nascimento' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], $mensagens);
    
        if (is_null($request->foto)){
            $imageName = 'noPhoto.png';
        }else{
            $imageName = time().'.'.$request->foto->extension();  
            $request->foto->move(public_path('images'), $imageName);   
        }
        
        $this->user->createOrUpdate($id = null, $collection,$imageName);
        

       return redirect()->route('user.list');
    }


    public function saveUpdateUser(Request $request, $id = null)
    {   
        $collection = $request;

        $mensagens = [
            'required' => '* :attribute é obrigatório!',
            'image'    => 'A :attribute precisa ser uma foto',
            'max'      => 'A foto precisa ter no máximo 2MB',
            'mimes'     => 'As extensões suportadas são jpeg,png,jpg,gif,svg',

        ];

        $request->validate([
            'nome'  => 'required',
            'data_nascimento' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], $mensagens);
    
        if (! is_null($request->foto)){
            $imageName = time().'.'.$request->foto->extension();  
            $request->foto->move(public_path('images'), $imageName);   
        }else{
            $imageName = null;
        }


        $this->user->createOrUpdate($id, $collection,$imageName);
        

       return redirect()->route('user.list');
    }



    public function deleteUser($id)
    {
        $this->user->deleteUser($id);

        return redirect()->route('user.list');
    }

    
    
}