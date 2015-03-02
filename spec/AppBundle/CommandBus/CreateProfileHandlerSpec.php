<?php
// File: spec/AppBundle/CommandBus/CreateProfileHandlerSpec.php

namespace spec\AppBundle\CommandBus;

use AppBundle\CommandBus\CreateProfile;
use AppBundle\Entity\ProfileRepository;
use Doctrine\Common\Persistence\ObjectManager;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateProfileHandlerSpec extends ObjectBehavior
{
    const NAME = 'John Cleese';

    function let(ObjectManager $objectManager, ProfileRepository $profileRepository)
    {
        $this->beConstructedWith($objectManager, $profileRepository);
    }

    function it_creates_a_profile(ObjectManager $objectManager, ProfileRepository $profileRepository)
    {
        $profileRepository->findOneBy(array('name' => self::NAME))->willReturn(null);
        $createdProfile = Argument::type('AppBundle\Entity\Profile');
        $objectManager->persist($createdProfile)->shouldBeCalled();

        $this->handle(new CreateProfile(self::NAME));
    }
}
