<?php

namespace Pfe\Bundle\WebBundle\Controller\Frontend;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller {

    public function indexAction(){
        return $this->render('PfeWebBundle:Frontend\Page:index.html.twig');
    }
}