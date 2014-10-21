<?php

namespace Jan\ProjektBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Jan\ProjektBundle\Entity\Zaposlovalec;
use Jan\ProjektBundle\Form\ZaposlovalecType;

/**
 * Zaposlovalec controller.
 *
 */
class ZaposlovalecController extends Controller
{

    /**
     * Lists all Zaposlovalec entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('JanProjektBundle:Zaposlovalec')->findAll();

        return $this->render('JanProjektBundle:Zaposlovalec:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Zaposlovalec entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Zaposlovalec();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('zaposlovalec_show', array('id' => $entity->getId())));
        }

        return $this->render('JanProjektBundle:Zaposlovalec:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Zaposlovalec entity.
     *
     * @param Zaposlovalec $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Zaposlovalec $entity)
    {
        $form = $this->createForm(new ZaposlovalecType(), $entity, array(
            'action' => $this->generateUrl('zaposlovalec_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Zaposlovalec entity.
     *
     */
    public function newAction()
    {
        $entity = new Zaposlovalec();
        $form   = $this->createCreateForm($entity);

        return $this->render('JanProjektBundle:Zaposlovalec:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Zaposlovalec entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JanProjektBundle:Zaposlovalec')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Zaposlovalec entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('JanProjektBundle:Zaposlovalec:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Zaposlovalec entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JanProjektBundle:Zaposlovalec')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Zaposlovalec entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('JanProjektBundle:Zaposlovalec:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Zaposlovalec entity.
    *
    * @param Zaposlovalec $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Zaposlovalec $entity)
    {
        $form = $this->createForm(new ZaposlovalecType(), $entity, array(
            'action' => $this->generateUrl('zaposlovalec_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Zaposlovalec entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JanProjektBundle:Zaposlovalec')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Zaposlovalec entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('zaposlovalec_edit', array('id' => $id)));
        }

        return $this->render('JanProjektBundle:Zaposlovalec:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Zaposlovalec entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('JanProjektBundle:Zaposlovalec')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Zaposlovalec entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('zaposlovalec'));
    }

    /**
     * Creates a form to delete a Zaposlovalec entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('zaposlovalec_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
