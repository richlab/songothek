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


class LoginController extends  Controller
{

    /**
     * @Route("/login", name="login")
     * @param $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function login(Request $request)
    {
        $session = new Session();

        if ($request->request->has('_username')){

            if ($request->request->get('_username') == 'digger' && $request->request->get('_password') == 'alder'){
                $session->set('loggedIn', true);

                return $this->redirectToRoute('homepage');
            }
        }

        return $this->render('default/login.html.twig', array(
        ));
    }

    /**
     * @Route("/logout", name="logout")
     * @param $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function logout(Request $request)
    {
        $session = new Session();
        $session->set('loggedIn', false);

        return $this->redirectToRoute('homepage');
    }

}