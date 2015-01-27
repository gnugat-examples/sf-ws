<?php
// File: src/AppBundle/Entity/Profile.php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="profile")
 * @ORM\Entity
 */
class Profile
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="name", type="string", unique=true)
     */
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function toArray()
    {
        return array(
            'id' => $this->id,
            'name' => $this->name,
        );
    }
}
