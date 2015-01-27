<?php
// File: src/AppBundle/Controller/ProfileCreationController.php;

namespace AppBundle\Controller;

use AppBundle\Entity\Profile;
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
        $em = $this->get('doctrine.orm.entity_manager');

        $createdProfile = new Profile($request->request->get('name'));
        $em->persist($createdProfile);
        $em->flush();

        return new JsonResponse($createdProfile->toArray(), 201);
    }
}
