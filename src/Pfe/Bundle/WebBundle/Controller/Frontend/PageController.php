<?php

namespace Pfe\Bundle\WebBundle\Controller\Frontend;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class PageController extends Controller {

    public function indexAction(){
<<<<<<< HEAD
         $t = $this->get('translator')->trans('Symfony2 is great');



       return $this->render('PfeWebBundle:Frontend\Page:index.html.twig', array('title' => $t));
=======

        $t = $this->get('translator')->trans('Symfony2 is great');

        return $this->render('PfeWebBundle:Frontend\Page:index.html.twig', array('title' => $t));
>>>>>>> e6d09c14d8e54b631c6cb77449ca7afe24a13159
    }
}