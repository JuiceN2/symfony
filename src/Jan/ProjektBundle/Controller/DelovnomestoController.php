<?php

namespace Jan\ProjektBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Jan\ProjektBundle\Entity\Delovnomesto;
use Jan\ProjektBundle\Form\DelovnomestoType;

/**
 * Delovnomesto controller.
 *
 */
class DelovnomestoController extends Controller
{

    /**
     * Lists all Delovnomesto entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('JanProjektBundle:Delovnomesto')->findAll();

        return $this->render('JanProjektBundle:Delovnomesto:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Delovnomesto entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Delovnomesto();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('delovnomesto_show', array('id' => $entity->getId())));
        }

        return $this->render('JanProjektBundle:Delovnomesto:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Delovnomesto entity.
     *
     * @param Delovnomesto $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Delovnomesto $entity)
    {
        $form = $this->createForm(new DelovnomestoType(), $entity, array(
            'action' => $this->generateUrl('delovnomesto_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Delovnomesto entity.
     *
     */
    public function newAction()
    {
        $entity = new Delovnomesto();
        $form   = $this->createCreateForm($entity);

        return $this->render('JanProjektBundle:Delovnomesto:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Delovnomesto entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JanProjektBundle:Delovnomesto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Delovnomesto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('JanProjektBundle:Delovnomesto:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Delovnomesto entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JanProjektBundle:Delovnomesto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Delovnomesto entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('JanProjektBundle:Delovnomesto:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Delovnomesto entity.
    *
    * @param Delovnomesto $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Delovnomesto $entity)
    {
        $form = $this->createForm(new DelovnomestoType(), $entity, array(
            'action' => $this->generateUrl('delovnomesto_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Delovnomesto entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JanProjektBundle:Delovnomesto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Delovnomesto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('delovnomesto_edit', array('id' => $id)));
        }

        return $this->render('JanProjektBundle:Delovnomesto:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Delovnomesto entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('JanProjektBundle:Delovnomesto')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Delovnomesto entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('delovnomesto'));
    }

    /**
     * Creates a form to delete a Delovnomesto entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('delovnomesto_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
