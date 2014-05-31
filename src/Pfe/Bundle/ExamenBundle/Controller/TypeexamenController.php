<?php

namespace Pfe\Bundle\ExamenBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Pfe\Bundle\ExamenBundle\Entity\Typeexamen;
use Pfe\Bundle\ExamenBundle\Form\TypeexamenType;

/**
 * Typeexamen controller.
 *
 * @Route("/typeexamen")
 */
class TypeexamenController extends Controller
{

    /**
     * Lists all Typeexamen entities.
     *
     * @Route("/", name="typeexamen")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PfeExamenBundle:Typeexamen')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Typeexamen entity.
     *
     * @Route("/", name="typeexamen_create")
     * @Method("POST")
     * @Template("PfeExamenBundle:Typeexamen:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Typeexamen();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('typeexamen'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Typeexamen entity.
    *
    * @param Typeexamen $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Typeexamen $entity)
    {
        $form = $this->createForm(new TypeexamenType(), $entity, array(
            'action' => $this->generateUrl('typeexamen_create'),
            'method' => 'POST',
        ));

       // $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Typeexamen entity.
     *
     * @Route("/new", name="typeexamen_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Typeexamen();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Typeexamen entity.
     *
     * @Route("/{id}", name="typeexamen_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PfeExamenBundle:Typeexamen')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Typeexamen entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Typeexamen entity.
     *
     * @Route("/{id}/edit", name="typeexamen_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PfeExamenBundle:Typeexamen')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Typeexamen entity.');
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
    * Creates a form to edit a Typeexamen entity.
    *
    * @param Typeexamen $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Typeexamen $entity)
    {
        $form = $this->createForm(new TypeexamenType(), $entity, array(
            'action' => $this->generateUrl('typeexamen_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Typeexamen entity.
     *
     * @Route("/{id}", name="typeexamen_update")
     * @Method("PUT")
     * @Template("PfeExamenBundle:Typeexamen:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PfeExamenBundle:Typeexamen')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Typeexamen entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('typeexamen'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Typeexamen entity.
     *
     * @Route("/{id}", name="typeexamen_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PfeExamenBundle:Typeexamen')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Typeexamen entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('typeexamen'));
    }

    /**
     * Creates a form to delete a Typeexamen entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('typeexamen_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
