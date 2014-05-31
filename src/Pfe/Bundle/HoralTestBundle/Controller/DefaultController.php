<?php

namespace Pfe\Bundle\HoralTestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PfeHoralTestBundle:Default:index.html.twig', array('name' => $name));
    }
}
