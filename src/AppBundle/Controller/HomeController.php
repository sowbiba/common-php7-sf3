<?php
/**
 * Created by PhpStorm.
 * User: isow
 * Date: 05/01/17
 * Time: 15:03
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{

    /**
     * @Route("/", name="homepage")
     * @Template()
     */
    public function indexAction()
    {
//        $provider = $this->get('fos_message.provider');
//
//        $threads = $provider->getInboxThreads();

        return [];
    }
}