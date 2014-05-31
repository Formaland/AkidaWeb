<?php

namespace Pfe\Bundle\CoursesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Pfe\Bundle\CoursesBundle\Entity\Courses;
use Pfe\Bundle\CoursesBundle\Form\CoursesType;

/**
 * Courses controller.
 *
 * @Route("/courses")
 */
class CoursesController extends Controller
{

    /**
     * Lists all Courses entities.
     *
     * @Route("/", name="courses")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PfeCoursesBundle:Courses')->findAll();
        foreach ($entities as $entity) {
            $deleteForms[$entity->getId()] = $this->createDeleteForm($entity->getId())->createView();
        }
        return array(
            'entities' => $entities,
            'deleteForms' => $deleteForms,
        );
    }
    /**
     * Creates a new Courses entity.
     *
     * @Route("/", name="courses_create")
     * @Method("POST")
     * @Template("PfeCoursesBundle:Courses:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Courses();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('courses'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Courses entity.
    *
    * @param Courses $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Courses $entity)
    {
        $form = $this->createForm(new CoursesType(), $entity, array(
            'action' => $this->generateUrl('courses_create'),
            'method' => 'POST',
        ));

        //$form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Courses entity.
     *
     * @Route("/new", name="courses_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Courses();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Courses entity.
     *
     * @Route("/{id}", name="courses_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PfeCoursesBundle:Courses')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Courses entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Courses entity.
     *
     * @Route("/{id}/edit", name="courses_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PfeCoursesBundle:Courses')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Courses entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Courses entity.
    *
    * @param Courses $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Courses $entity)
    {
        $form = $this->createForm(new CoursesType(), $entity, array(
            'action' => $this->generateUrl('courses_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Courses entity.
     *
     * @Route("/{id}", name="courses_update")
     * @Method("PUT")
     * @Template("PfeCoursesBundle:Courses:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PfeCoursesBundle:Courses')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Courses entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('courses'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Courses entity.
     *
     * @Route("/{id}", name="courses_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PfeCoursesBundle:Courses')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Courses entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('courses'));
    }

    /**
     * Creates a form to delete a Courses entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('courses_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
