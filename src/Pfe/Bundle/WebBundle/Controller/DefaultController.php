<?php

namespace Pfe\Bundle\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PfeWebBundle:Default:index.html.twig', array('name' => $name));
    }
}
