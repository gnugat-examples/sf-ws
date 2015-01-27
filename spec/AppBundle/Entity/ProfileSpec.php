<?php
// File: spec/AppBundle/Entity/ProfileSpec.php

namespace spec\AppBundle\Entity;

use PhpSpec\ObjectBehavior;

class ProfileSpec extends ObjectBehavior
{
    const NAME = 'Arthur Dent';

    function let()
    {
        $this->beConstructedWith(self::NAME);
    }

    function it_can_be_converted_to_array()
    {
        $this->toArray()->shouldBe(array(
            'id' => null,
            'name' => self::NAME,
        ));
    }
}
