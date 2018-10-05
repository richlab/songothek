<?php
/**
 * Created by PhpStorm.
 * User: rich
 * Date: 04.10.18
 * Time: 09:14
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;


class SecurityController extends  Controller
{

    /**
     * @Route("/login", name="login")
     * @param $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function login(Request $request)
    {
        $session = new Session();

        dump($_POST);
        if ($request->request->has('username')){


            if ($request->request->get('username') == 'rich' && $request->request->get('password') == 'digger'){
                $session->set('loggedIn', true);

                $this->redirectToRoute('/');
            }

        }

        return $this->render('default/login.html.twig', array(
        ));
    }

}