<?php
/**
 * Created by PhpStorm.
 * User: Benutzer
 * Date: 9/7/2021
 * Time: 11:19 PM
 */

namespace App\Model;


use Symfony\Component\HttpFoundation\Request;

interface IModel
{

    public function insert(array $data): bool;
}