<?php

namespace Pfe\Bundle\HoralTestBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Pfe\Bundle\HoralTestBundle\Entity\Oraltest;
use Pfe\Bundle\HoralTestBundle\Form\OraltestType;

/**
 * Oraltest controller.
 *
 * @Route("/oraltest")
 */
class OraltestController extends Controller
{

    /**
     * Lists all Oraltest entities.
     *
     * @Route("/", name="oraltest")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PfeHoralTestBundle:Oraltest')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Oraltest entity.
     *
     * @Route("/", name="oraltest_create")
     * @Method("POST")
     * @Template("PfeHoralTestBundle:Oraltest:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Oraltest();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('oraltest_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Oraltest entity.
    *
    * @param Oraltest $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Oraltest $entity)
    {
        $form = $this->createForm(new OraltestType(), $entity, array(
            'action' => $this->generateUrl('oraltest_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Oraltest entity.
     *
     * @Route("/new", name="oraltest_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Oraltest();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Oraltest entity.
     *
     * @Route("/{id}", name="oraltest_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PfeHoralTestBundle:Oraltest')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Oraltest entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Oraltest entity.
     *
     * @Route("/{id}/edit", name="oraltest_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PfeHoralTestBundle:Oraltest')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Oraltest entity.');
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
    * Creates a form to edit a Oraltest entity.
    *
    * @param Oraltest $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Oraltest $entity)
    {
        $form = $this->createForm(new OraltestType(), $entity, array(
            'action' => $this->generateUrl('oraltest_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Oraltest entity.
     *
     * @Route("/{id}", name="oraltest_update")
     * @Method("PUT")
     * @Template("PfeHoralTestBundle:Oraltest:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PfeHoralTestBundle:Oraltest')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Oraltest entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('oraltest_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Oraltest entity.
     *
     * @Route("/{id}", name="oraltest_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PfeHoralTestBundle:Oraltest')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Oraltest entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('oraltest'));
    }

    /**
     * Creates a form to delete a Oraltest entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('oraltest_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
