<?php

namespace Pfe\Bundle\CoursesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PfeCoursesBundle:Default:index.html.twig', array('name' => $name));
    }
}
