<?php

namespace Pfe\Bundle\HoralTestBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Pfe\Bundle\HoralTestBundle\Entity\Hezb;
use Pfe\Bundle\HoralTestBundle\Form\HezbType;

/**
 * Hezb controller.
 *
 * @Route("/hezb")
 */
class HezbController extends Controller
{

    /**
     * Lists all Hezb entities.
     *
     * @Route("/", name="hezb")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PfeHoralTestBundle:Hezb')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Hezb entity.
     *
     * @Route("/", name="hezb_create")
     * @Method("POST")
     * @Template("PfeHoralTestBundle:Hezb:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Hezb();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('hezb_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Hezb entity.
    *
    * @param Hezb $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Hezb $entity)
    {
        $form = $this->createForm(new HezbType(), $entity, array(
            'action' => $this->generateUrl('hezb_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Hezb entity.
     *
     * @Route("/new", name="hezb_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Hezb();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Hezb entity.
     *
     * @Route("/{id}", name="hezb_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PfeHoralTestBundle:Hezb')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Hezb entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Hezb entity.
     *
     * @Route("/{id}/edit", name="hezb_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PfeHoralTestBundle:Hezb')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Hezb entity.');
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
    * Creates a form to edit a Hezb entity.
    *
    * @param Hezb $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Hezb $entity)
    {
        $form = $this->createForm(new HezbType(), $entity, array(
            'action' => $this->generateUrl('hezb_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Hezb entity.
     *
     * @Route("/{id}", name="hezb_update")
     * @Method("PUT")
     * @Template("PfeHoralTestBundle:Hezb:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PfeHoralTestBundle:Hezb')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Hezb entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('hezb_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Hezb entity.
     *
     * @Route("/{id}", name="hezb_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PfeHoralTestBundle:Hezb')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Hezb entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('hezb'));
    }

    /**
     * Creates a form to delete a Hezb entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('hezb_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
