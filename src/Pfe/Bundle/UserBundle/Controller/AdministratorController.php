<?php

namespace Pfe\Bundle\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Pfe\Bundle\UserBundle\Entity\Administrator;
use Pfe\Bundle\UserBundle\Form\AdministratorType;

/**
 * Administrator controller.
 *
 */
class AdministratorController extends Controller
{

    /**
     * Lists all Administrator entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PfeUserBundle:Administrator')->findAll();

        return $this->render('PfeUserBundle:Administrator:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Administrator entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Administrator();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('administrator_show', array('id' => $entity->getId())));
        }

        return $this->render('PfeUserBundle:Administrator:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Administrator entity.
    *
    * @param Administrator $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Administrator $entity)
    {
        $form = $this->createForm(new AdministratorType(), $entity, array(
            'action' => $this->generateUrl('administrator_create'),
            'method' => 'POST',
        ));

        //$form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Administrator entity.
     *
     */
    public function newAction()
    {
        $entity = new Administrator();
        $form   = $this->createCreateForm($entity);

        return $this->render('PfeUserBundle:Administrator:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Administrator entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PfeUserBundle:Administrator')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Administrator entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PfeUserBundle:Administrator:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Administrator entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PfeUserBundle:Administrator')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Administrator entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PfeUserBundle:Administrator:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Administrator entity.
    *
    * @param Administrator $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Administrator $entity)
    {
        $form = $this->createForm(new AdministratorType(), $entity, array(
            'action' => $this->generateUrl('administrator_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Administrator entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PfeUserBundle:Administrator')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Administrator entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('administrator_edit', array('id' => $id)));
        }

        return $this->render('PfeUserBundle:Administrator:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Administrator entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PfeUserBundle:Administrator')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Administrator entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('administrator'));
    }

    /**
     * Creates a form to delete a Administrator entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('administrator_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
