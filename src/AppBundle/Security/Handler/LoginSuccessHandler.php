<?php
namespace AppBundle\Security\Handler;


use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

class LoginSuccessHandler implements AuthenticationSuccessHandlerInterface
{
    /**
     * @param Request        $request
     * @param TokenInterface $token
     *
     * @return RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {var_dump('ici');die();
        $user = $token->getUser();

        return new RedirectResponse($request->getSession()->get('_security.main.default_target_path', '/'));
    }
}