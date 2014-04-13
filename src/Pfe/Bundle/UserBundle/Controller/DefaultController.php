<?php

namespace Pfe\Bundle\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PfeUserBundle:Default:index.html.twig', array('name' => $name));
    }

     /**
     * @Route("/addstudent")
     * @template()
     */
    public function addstudentAction(Request $request){
       $s=new student();
           $form=$this->createFormBuilder($s)
               ->add("username","text")
               ->add("username_canonical","text")
               ->add("Ajouter","submit")
               ->getForm();
               $form->handleRequest(($_REQUEST));
               if($form->isValid()){
                   $em=$this->getDoctrine()->getManager();
                   $em->persist($s);
                   $em->flush();
               }
        return array('f'=>createView());



    }
}
