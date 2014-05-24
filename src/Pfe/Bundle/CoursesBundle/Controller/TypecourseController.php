<?php

namespace Pfe\Bundle\CoursesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Pfe\Bundle\CoursesBundle\Entity\Typecourse;
use Pfe\Bundle\CoursesBundle\Form\TypecourseType;

/**
 * Typecourse controller.
 *
 * @Route("/typecourse")
 */
class TypecourseController extends Controller
{

    /**
     * Lists all Typecourse entities.
     *
     * @Route("/", name="typecourse")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PfeCoursesBundle:Typecourse')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Typecourse entity.
     *
     * @Route("/", name="typecourse_create")
     * @Method("POST")
     * @Template("PfeCoursesBundle:Typecourse:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Typecourse();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('typecourse'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Typecourse entity.
    *
    * @param Typecourse $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Typecourse $entity)
    {
        $form = $this->createForm(new TypecourseType(), $entity, array(
            'action' => $this->generateUrl('typecourse_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Typecourse entity.
     *
     * @Route("/new", name="typecourse_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Typecourse();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Typecourse entity.
     *
     * @Route("/{id}", name="typecourse_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PfeCoursesBundle:Typecourse')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Typecourse entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Typecourse entity.
     *
     * @Route("/{id}/edit", name="typecourse_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PfeCoursesBundle:Typecourse')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Typecourse entity.');
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
    * Creates a form to edit a Typecourse entity.
    *
    * @param Typecourse $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Typecourse $entity)
    {
        $form = $this->createForm(new TypecourseType(), $entity, array(
            'action' => $this->generateUrl('typecourse_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Typecourse entity.
     *
     * @Route("/{id}", name="typecourse_update")
     * @Method("PUT")
     * @Template("PfeCoursesBundle:Typecourse:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PfeCoursesBundle:Typecourse')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Typecourse entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('typecourse'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Typecourse entity.
     *
     * @Route("/{id}", name="typecourse_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PfeCoursesBundle:Typecourse')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Typecourse entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('typecourse'));
    }

    /**
     * Creates a form to delete a Typecourse entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('typecourse_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
