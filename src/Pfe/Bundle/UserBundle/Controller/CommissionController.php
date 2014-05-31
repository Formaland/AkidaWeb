<?php

namespace Pfe\Bundle\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Pfe\Bundle\UserBundle\Entity\Commission;
use Pfe\Bundle\UserBundle\Form\CommissionType;

/**
 * Commission controller.
 *
 * @Route("/commission")
 */
class CommissionController extends Controller
{

    /**
     * Lists all Commission entities.
     *
     * @Route("/", name="commission")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PfeUserBundle:Commission')->findAll();
        foreach ($entities as $entity) {
            $deleteForms[$entity->getId()] = $this->createDeleteForm($entity->getId())->createView();
        }
        return array(
            'entities' => $entities,
            'deleteForms' => $deleteForms,
        );
    }
    /**
     * Creates a new Commission entity.
     *
     * @Route("/", name="commission_create")
     * @Method("POST")
     * @Template("PfeUserBundle:Commission:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Commission();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('commission_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Commission entity.
    *
    * @param Commission $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Commission $entity)
    {
        $form = $this->createForm(new CommissionType(), $entity, array(
            'action' => $this->generateUrl('commission_create'),
            'method' => 'POST',
        ));

       // $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Commission entity.
     *
     * @Route("/new", name="commission_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Commission();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Commission entity.
     *
     * @Route("/{id}", name="commission_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PfeUserBundle:Commission')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Commission entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Commission entity.
     *
     * @Route("/{id}/edit", name="commission_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PfeUserBundle:Commission')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Commission entity.');
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
    * Creates a form to edit a Commission entity.
    *
    * @param Commission $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Commission $entity)
    {
        $form = $this->createForm(new CommissionType(), $entity, array(
            'action' => $this->generateUrl('commission_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Commission entity.
     *
     * @Route("/{id}", name="commission_update")
     * @Method("PUT")
     * @Template("PfeUserBundle:Commission:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PfeUserBundle:Commission')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Commission entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('commission'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Commission entity.
     *
     * @Route("/{id}", name="commission_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PfeUserBundle:Commission')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Commission entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('commission'));
    }

    /**
     * Creates a form to delete a Commission entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('commission_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
