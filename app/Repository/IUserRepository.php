<?php 
namespace App\Repository;

interface IUserRepository 
{
    public function getAllUsers();

    public function getUserById($id);

    public function createOrUpdate( $id = null, $collection = [], $foto );

    public function deleteUser($id);
}