<?php
namespace App\Interfaces;

interface ICustomer extends InterfaceRepo
{   
    function getList(array $data, $pagination = null);
    function checkEmailExist($email);
    function checkCustomerLogin($email, $password);
    function getCustomerLogin($email);
}