<?php
// File: src/AppBundle\CommandBus/CreateProfile.php

namespace AppBundle\CommandBus;

use SimpleBus\Message\Message;

class CreateProfile implements Message
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}
