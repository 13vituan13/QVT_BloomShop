<?php
namespace App\Interfaces;

interface IOrder extends InterfaceRepo
{
    public function getList(array $data, $pagination = null);
    
}