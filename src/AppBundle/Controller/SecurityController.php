<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class SecurityController extends Controller
{
//    /**
//     * @Route("/login", name="homepage")
//     *
//     * @param Request $request
//     *
//     * @Template("AppBundle::lucky.html.twig")
//     *
//     * @return array
//     */
//    public function loginAction(Request $request)
//    {
//        $session = $request->getSession();
//        $error = $request->attributes->get(
//            Security::AUTHENTICATION_ERROR,
//            $session->get(Security::AUTHENTICATION_ERROR)
//        );
//
//        if (!$request->attributes->has(Security::AUTHENTICATION_ERROR)) {
//            $session->remove(Security::AUTHENTICATION_ERROR);
//        }
//
//        return array(
//            'last_username' => $session->get(Security::LAST_USERNAME),
//            'error'         => $error,
//        );
//    }
}