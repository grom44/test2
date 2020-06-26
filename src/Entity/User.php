<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity("email", message="The user with given email already exist.")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\Length(max = 50, maxMessage = "The name is to long")  
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=50)  
     * @Assert\Length(max = 50, maxMessage = "The last name is to long")                                                                                                                                      
     */
    private $lastName;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Length(min = 8, max = 20, minMessage = "The phone number is to short", maxMessage = "The phone number is to long")
     * @Assert\Regex(pattern="/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/", message="The phone number have illegal characters") 
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email."
     * )                                                                                                                                        
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=1, unique=true)
     * @Assert\Regex(pattern="/^[mf]$/", message="The gender '{{ value }}' is wrong. The gender can accept only 'm' or 'f' value")                                          
     */
    private $gender;

    /**
     * @ORM\Column(type="smallint")
     * @Assert\Regex(pattern="/^[10]$/", message="The active '{{ value }}' is wrong. The active can accept only 1 or 0 value")
     */
    private $active;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateOfBirth;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getActive(): ?int
    {
        return $this->active;
    }

    public function setActive(int $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getDateOfBirth(): ?\DateTimeInterface
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(?\DateTimeInterface $dateOfBirth): self
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }
}
