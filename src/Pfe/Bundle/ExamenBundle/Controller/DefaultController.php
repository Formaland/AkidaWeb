<?php

namespace Pfe\Bundle\ExamenBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PfeExamenBundle:Default:index.html.twig', array('name' => $name));
    }
}
