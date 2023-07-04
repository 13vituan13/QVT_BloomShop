<?php
namespace App\Interfaces;

interface IProduct extends InterfaceRepo
{
    public function getList(array $data, $pagination = null);
    public function getBestChoiceProduct($limit);
}