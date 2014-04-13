<?php

namespace Pfe\EmploiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PfeEmploiBundle:Default:index.html.twig', array('name' => $name));
    }
}
