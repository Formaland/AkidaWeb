<?php

namespace Pfe\Bundle\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PfeUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
