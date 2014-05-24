<?php

namespace Pfe\Bundle\HoralTestBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Pfe\Bundle\HoralTestBundle\Entity\Sourah;
use Pfe\Bundle\HoralTestBundle\Form\SourahType;

/**
 * Sourah controller.
 *
 * @Route("/sourah")
 */
class SourahController extends Controller
{

    /**
     * Lists all Sourah entities.
     *
     * @Route("/", name="sourah")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PfeHoralTestBundle:Sourah')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Sourah entity.
     *
     * @Route("/", name="sourah_create")
     * @Method("POST")
     * @Template("PfeHoralTestBundle:Sourah:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Sourah();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('sourah'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Sourah entity.
    *
    * @param Sourah $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Sourah $entity)
    {
        $form = $this->createForm(new SourahType(), $entity, array(
            'action' => $this->generateUrl('sourah_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Sourah entity.
     *
     * @Route("/new", name="sourah_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Sourah();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Sourah entity.
     *
     * @Route("/{id}", name="sourah_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PfeHoralTestBundle:Sourah')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sourah entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Sourah entity.
     *
     * @Route("/{id}/edit", name="sourah_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PfeHoralTestBundle:Sourah')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sourah entity.');
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
    * Creates a form to edit a Sourah entity.
    *
    * @param Sourah $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Sourah $entity)
    {
        $form = $this->createForm(new SourahType(), $entity, array(
            'action' => $this->generateUrl('sourah_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Sourah entity.
     *
     * @Route("/{id}", name="sourah_update")
     * @Method("PUT")
     * @Template("PfeHoralTestBundle:Sourah:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PfeHoralTestBundle:Sourah')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sourah entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('sourah'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Sourah entity.
     *
     * @Route("/{id}", name="sourah_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PfeHoralTestBundle:Sourah')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Sourah entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('sourah'));
    }

    /**
     * Creates a form to delete a Sourah entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('sourah_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
