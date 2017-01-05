<?php

namespace AppBundle\Controller;

use HWI\Bundle\OAuthBundle\Controller\ConnectController;
use HWI\Bundle\OAuthBundle\Security\Core\Exception\AccountNotLinkedException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class SecurityController extends ConnectController
{
    /**
     * @param Request $request
     *
     * @Template("AppBundle::login.html.twig")
     *
     * @return array
     */
    public function loginAction(Request $request)
    {
        $connect = $this->container->getParameter('hwi_oauth.connect');
        $hasUser = $this->isGranted('IS_AUTHENTICATED_REMEMBERED');

        $error = $this->getErrorForRequest($request);

        // if connecting is enabled and there is no user, redirect to the registration form
        if ($connect
            && !$hasUser
            && $error instanceof AccountNotLinkedException
        ) {
            $key = time();
            $session = $request->getSession();
            $session->set('_hwi_oauth.registration_error.'.$key, $error);

            return $this->redirectToRoute('hwi_oauth_connect_registration', array('key' => $key));
        }

        if ($error) {
            // TODO: this is a potential security risk (see http://trac.symfony-project.org/ticket/9523)
            $error = $error->getMessage();
        }

        return array(
            'error' => $error,
        );

        $session = $request->getSession();
        $error = $request->attributes->get(
            Security::AUTHENTICATION_ERROR,
            $session->get(Security::AUTHENTICATION_ERROR)
        );

        if (!$request->attributes->has(Security::AUTHENTICATION_ERROR)) {
            $session->remove(Security::AUTHENTICATION_ERROR);
        }

        return array(
            'last_username' => $session->get(Security::LAST_USERNAME),
            'error'         => $error,
        );
    }
}