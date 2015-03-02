<?php
// File: src/AppBundle/Controller/ProfileCreationController.php;

namespace AppBundle\Controller;

use AppBundle\CommandBus\CreateProfile;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ProfileCreationController extends Controller
{
    /**
     * @Route("/api/v1/profiles")
     * @Method({"POST"})
     */
    public function createProfileAction(Request $request)
    {
        $name = $request->request->get('name');

        $this->get('command_bus')->handle(new CreateProfile($name));
        $createdProfile = $this->get('app.profile_repository')->findOneBy(array('name' => $name));

        return new JsonResponse($createdProfile->toArray(), 201);
    }
}
