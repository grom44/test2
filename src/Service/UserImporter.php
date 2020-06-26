<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;
use DateTime;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class UserImporter
{
    private $em;
    private $validator;

    public function __construct(EntityManagerInterface $em, ValidatorInterface $validator)
    {
        $this->em = $em;
        $this->validator = $validator;
    }

    public function importUser(string $data): string
    {
        $data = $this->parseData($data);
        $user = new User();
        $user->setName($data[0])
        ->setLastName($data[1])
        ->setPhone($data[2])
        ->setEmail($data[3])
        ->setGender($data[4])
        ->setActive($data[5])
        ->setDateOfBirth(new DateTime($data[6]));

        $errors = $this->validator->validate($user);

        if (count($errors) > 0) {
            return (string) $errors;
        }

        $this->em->persist($user);
        $this->em->flush();

        return "Added new user with Id: " . $user->getId();
    }

    private function parseData(string $data): array
    {
        $data = explode(',', $data);
        return $data;
    }

}