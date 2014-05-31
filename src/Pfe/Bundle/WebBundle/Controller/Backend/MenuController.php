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
            array(
                'routes' => array('group', 'group_show' ,'group_edit', 'group_new'),
                'icon' => 'users',
                'title' => 'sidebar.group.name',
                'text_domain' => 'backend',
                'submenu' => array(
                    array(
                        'route' => 'group',
                        'title' => 'sidebar.group.index',
                        'text_domain' => 'backend',
                    ),
                    array(
                        'route' => 'group_new',
                        'title' => 'sidebar.group.new',
                        'text_domain' => 'backend',
                    ),
                )
            ),
            array(
                'routes' => array('commission', 'commission_show' ,'commission_edit', 'commission_new'),
                'icon' => 'users',
                'title' => 'sidebar.commission.name',
                'text_domain' => 'backend',
                'submenu' => array(
                    array(
                        'route' => 'commission',
                        'title' => 'sidebar.commission.index',
                        'text_domain' => 'backend',
                    ),
                    array(
                        'route' => 'commission_new',
                        'title' => 'sidebar.commission.new',
                        'text_domain' => 'backend',
                    ),
                )
            ),
            array(
                'routes' => array('oraltest', 'oraltest_show' ,'oraltest_edit', 'oraltest_new'),
                'icon' => 'bullhorn',
                'title' => 'sidebar.oraltest.name',
                'text_domain' => 'backend',
                'submenu' => array(
                    array(
                        'route' => 'oraltest',
                        'title' => 'sidebar.oraltest.index',
                        'text_domain' => 'backend',
                    ),
                    array(
                        'route' => 'oraltest_new',
                        'title' => 'sidebar.oraltest.new',
                        'text_domain' => 'backend',
                    ),
                )
            ),
            array(
                'routes' => array('courses', 'courses_show' ,'courses_edit', 'courses_new'),
                'icon' => 'book',
                'title' => 'sidebar.courses.name',
                'text_domain' => 'backend',
                'submenu' => array(
                    array(
                        'route' => 'courses',
                        'title' => 'sidebar.courses.index',
                        'text_domain' => 'backend',
                    ),
                    array(
                        'route' => 'courses_new',
                        'title' => 'sidebar.courses.new',
                        'text_domain' => 'backend',
                    ),
                    array(
                        'route' => 'typecourse',
                        'title' => 'sidebar.typecourses.index',
                        'text_domain' => 'backend',
                    ),
                    array(
                        'route' => 'typecourse_new',
                        'title' => 'sidebar.typecourses.new',
                        'text_domain' => 'backend',
                    )
                )
            ),
            array(
                'routes' => array('examen', 'examen_show' ,'examen_edit', 'examen_new'),
                'icon' => 'file-text-o',
                'title' => 'sidebar.examen.name',
                'text_domain' => 'backend',
                'submenu' => array(
                    array(
                        'route' => 'examen',
                        'title' => 'sidebar.examen.index',
                        'text_domain' => 'backend',
                    ),

                    array(
                        'route' => 'examen_new',
                        'title' => 'sidebar.examen.new',
                        'text_domain' => 'backend',
                    ),
                    array(
                        'route' => 'typeexamen',
                        'title' => 'sidebar.typeexamen.index',
                        'text_domain' => 'backend',
                    ),
                    array(
                        'route' => 'typeexamen_new',
                        'title' => 'sidebar.typeexamen.new',
                        'text_domain' => 'backend',
                    ),
                )
            ),
            array(
                'routes' => array('hezb', 'hezb_show' ,'hezb_edit', 'hezb_new'),
                'icon' => 'folder-open',
                'title' => 'sidebar.hezb.name',
                'text_domain' => 'backend',
                'submenu' => array(
                    array(
                        'route' => 'hezb',
                        'title' => 'sidebar.hezb.index',
                        'text_domain' => 'backend',
                    ),
                    array(
                        'route' => 'hezb_new',
                        'title' => 'sidebar.hezb.new',
                        'text_domain' => 'backend',
                    ),
                    array(
                        'route' => 'sourah',
                        'title' => 'sidebar.sourah.index',
                        'text_domain' => 'backend',
                    ),
                    array(
                        'route' => 'sourah_new',
                        'title' => 'sidebar.sourah.new',
                        'text_domain' => 'backend',
                    ),
                )
            ),
            array(
                'routes' => array('session', 'session_show' ,'session_edit', 'session_new'),
                'icon' => 'dashboard',
                'title' => 'sidebar.seance.name',
                'text_domain' => 'backend',
                'submenu' => array(
                    array(
                        'route' => 'session',
                        'title' => 'sidebar.seance.index',
                        'text_domain' => 'backend',
                    ),
                    array(
                        'route' => 'session_new',
                        'title' => 'sidebar.seance.new',
                        'text_domain' => 'backend',
                    ),
                    array(
                        'route' => 'weeklysession_new',
                        'title' => 'sidebar.seance.neww',
                        'text_domain' => 'backend',
                    ),
                    array(
                        'route' => 'classroom_new',
                        'title' => 'sidebar.salle.new',
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