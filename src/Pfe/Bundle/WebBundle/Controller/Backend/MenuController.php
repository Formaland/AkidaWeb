<?php

namespace Pfe\Bundle\WebBundle\Controller\Backend;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MenuController extends Controller {

    public function sidebarAction(Request $request)
    {

        $menu = array(
            array(
                'route' => 'pfe_backend_dashboard',
                'icon' => 'dashboard',
                'title' => 'sidebar.dashboard',
                'text_domain' => 'backend'
            ),
            array(
                'routes' => array('administrator_index', 'administrator_show' ,'administrator_edit', 'administrator_new'),
                'icon' => 'user',
                'title' => 'sidebar.administrator.name',
                'text_domain' => 'backend',
                'submenu' => array(
                    array(
                        'route' => 'administrator_index',
                        'title' => 'sidebar.administrator.index',
                        'text_domain' => 'backend',
                    ),
                    array(
                        'route' => 'administrator_new',
                        'title' => 'sidebar.administrator.new',
                        'text_domain' => 'backend',
                    ),
                )
            ),
            array(
                'routes' => array('student_index', 'student_show' ,'student_edit', 'student_new'),
                'icon' => 'user',
                'title' => 'sidebar.student.name',
                'text_domain' => 'backend',
                'submenu' => array(
                    array(
                        'route' => 'student_index',
                        'title' => 'sidebar.student.index',
                        'text_domain' => 'backend',
                    ),
                    array(
                        'route' => 'student_new',
                        'title' => 'sidebar.student.new',
                        'text_domain' => 'backend',
                    ),
                )
            ),
            array(
                'routes' => array('teacher_index', 'teacher_show' ,'teacher_edit', 'teacher_new'),
                'icon' => 'user',
                'title' => 'sidebar.teacher.name',
                'text_domain' => 'backend',
                'submenu' => array(
                    array(
                        'route' => 'teacher_index',
                        'title' => 'sidebar.teacher.index',
                        'text_domain' => 'backend',
                    ),
                    array(
                        'route' => 'teacher_new',
                        'title' => 'sidebar.teacher.new',
                        'text_domain' => 'backend',
                    ),
                )
            ),
        );


        return $this->render('PfeWebBundle:Backend/Menu:sidebar.html.twig', array(
            'menu' => $menu,
            'route' => $request->get('_route')
        ));
    }

}