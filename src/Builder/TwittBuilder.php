<?php
/**
 * Created by PhpStorm.
 * User: Benutzer
 * Date: 9/12/2021
 * Time: 11:03 AM
 */

namespace App\Builder;


use App\Entity\Twitt;
use Doctrine\ORM\Mapping\Entity;

class TwittBuilder implements IBuilder
{

    public function build(array $data): Twitt
    {

        $twitt = new Twitt();
        $twitt->setBody($data['body']);

        return $twitt;
    }
}