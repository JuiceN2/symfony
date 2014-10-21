<?php

namespace Jan\ProjektBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Jan\ProjektBundle\Entity\Prijava;
use Jan\ProjektBundle\Form\PrijavaType;

/**
 * Prijava controller.
 *
 */
class PrijavaController extends Controller
{

    /**
     * Lists all Prijava entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('JanProjektBundle:Prijava')->findAll();

        return $this->render('JanProjektBundle:Prijava:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Prijava entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Prijava();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('prijava_show', array('id' => $entity->getId())));
        }

        return $this->render('JanProjektBundle:Prijava:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Prijava entity.
     *
     * @param Prijava $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Prijava $entity)
    {
        $form = $this->createForm(new PrijavaType(), $entity, array(
            'action' => $this->generateUrl('prijava_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Prijava entity.
     *
     */
    public function newAction()
    {
        $entity = new Prijava();
        $form   = $this->createCreateForm($entity);

        return $this->render('JanProjektBundle:Prijava:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Prijava entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JanProjektBundle:Prijava')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Prijava entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('JanProjektBundle:Prijava:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Prijava entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JanProjektBundle:Prijava')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Prijava entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('JanProjektBundle:Prijava:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Prijava entity.
    *
    * @param Prijava $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Prijava $entity)
    {
        $form = $this->createForm(new PrijavaType(), $entity, array(
            'action' => $this->generateUrl('prijava_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Prijava entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JanProjektBundle:Prijava')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Prijava entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('prijava_edit', array('id' => $id)));
        }

        return $this->render('JanProjektBundle:Prijava:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Prijava entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('JanProjektBundle:Prijava')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Prijava entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('prijava'));
    }

    /**
     * Creates a form to delete a Prijava entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('prijava_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
