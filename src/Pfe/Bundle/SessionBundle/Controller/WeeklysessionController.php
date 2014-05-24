<?php

namespace Pfe\Bundle\SessionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Pfe\Bundle\SessionBundle\Entity\Weeklysession;
use Pfe\Bundle\SessionBundle\Form\WeeklysessionType;

/**
 * Weeklysession controller.
 *
 * @Route("/weeklysession")
 */
class WeeklysessionController extends Controller
{

    /**
     * Lists all Weeklysession entities.
     *
     * @Route("/", name="weeklysession")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PfeSessionBundle:Weeklysession')->findAll();
        foreach ($entities as $entity) {
            $deleteForms[$entity->getId()] = $this->createDeleteForm($entity->getId())->createView();
        }
        return array(
            'entities' => $entities,
            'deleteForms' => $deleteForms,
        );
    }
    /**
     * Creates a new Weeklysession entity.
     *
     * @Route("/", name="weeklysession_create")
     * @Method("POST")
     * @Template("PfeSessionBundle:Weeklysession:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Weeklysession();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('weeklysession'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Weeklysession entity.
    *
    * @param Weeklysession $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Weeklysession $entity)
    {
        $form = $this->createForm(new WeeklysessionType(), $entity, array(
            'action' => $this->generateUrl('weeklysession_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Weeklysession entity.
     *
     * @Route("/new", name="weeklysession_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Weeklysession();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Weeklysession entity.
     *
     * @Route("/{id}", name="weeklysession_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PfeSessionBundle:Weeklysession')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Weeklysession entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Weeklysession entity.
     *
     * @Route("/{id}/edit", name="weeklysession_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PfeSessionBundle:Weeklysession')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Weeklysession entity.');
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
    * Creates a form to edit a Weeklysession entity.
    *
    * @param Weeklysession $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Weeklysession $entity)
    {
        $form = $this->createForm(new WeeklysessionType(), $entity, array(
            'action' => $this->generateUrl('weeklysession_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Weeklysession entity.
     *
     * @Route("/{id}", name="weeklysession_update")
     * @Method("PUT")
     * @Template("PfeSessionBundle:Weeklysession:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PfeSessionBundle:Weeklysession')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Weeklysession entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('weeklysession'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Weeklysession entity.
     *
     * @Route("/{id}", name="weeklysession_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PfeSessionBundle:Weeklysession')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Weeklysession entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('weeklysession'));
    }

    /**
     * Creates a form to delete a Weeklysession entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('weeklysession_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
