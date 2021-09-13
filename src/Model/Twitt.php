<?php
/**
 * Created by PhpStorm.
 * User: Benutzer
 * Date: 9/7/2021
 * Time: 11:17 PM
 */

namespace App\Model;


use App\Builder\IBuilder;
use App\Exception\ValidationException;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class Twitt implements IModel
{

    /** @var  EntityManager */
    public $entityManager;

    public $builder;

    public $validator;

    public function __construct(EntityManager $entityManager, IBuilder $builder, ValidatorInterface $validator)
    {
        $this->entityManager = $entityManager;
        $this->builder = $builder;
        $this->validator = $validator;
    }

    /** @var  \App\Entity\Twitt */
    public $twitt;

    /**
     * @param array $data
     * @return bool
     * @throws ValidationException
     */
    public function insert(array $data): bool
    {
        $twitt = $this->builder->build($data);
        $errors = $this->validator->validate($twitt);
        if (count($errors) > 0) {
            throw new ValidationException((string) $errors);
        }

        $this->entityManager->persist($twitt);
        $this->entityManager->flush();

        return true;
    }

    public function select(): array
    {
        $twitt = new \App\Entity\Twitt();
        $twitts = $this->entityManager->getRepository(\App\Entity\Twitt::class)->createQueryBuilder('t')->where('1 = 1')->getQuery()->getArrayResult();

        return $twitts;
    }

    public function delete(int $id): bool
    {
        $this->twitt = $this->entityManager->getRepository(\App\Entity\Twitt::class)->find($id);
        $this->entityManager->remove($this->twitt);
        $this->entityManager->flush();

        return true;
    }
}