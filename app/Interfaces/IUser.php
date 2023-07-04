<?php
namespace App\Interfaces;

interface IUser extends InterfaceRepo
{ 
    public function getList(array $data, $pagination = null);
    function getLastTokenById($id);
}