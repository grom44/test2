<?php

namespace tests\Entity;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase 
{
    public function testUserName()
    {
        $user = new User(); 
        $user->setName("Name");
 
        $this->assertEquals("Name", $user->getName());
    }

    public function testUserLastName()
    {
        $user = new User(); 
        $user->setLastName("LName");
 
        $this->assertEquals("LName", $user->getLastName());
    }
}

