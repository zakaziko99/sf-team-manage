<?php

namespace TeamBundle\Controller;

use TeamBundle\Entity\MembersDiplomes;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/**
 * Membersdiplome controller.
 *
 * @Route("diplomes")
 */
class MembersDiplomesController extends Controller
{
    /**
     * Lists all membersDiplome entities.
     *
     * @Route("/", name="diplomes_list")
     * @Method("GET")
     * @Template()
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();

        $diplomes = $em->getRepository('TeamBundle:MembersDiplomes')->findAll();

        return [
                'diplomes' => $diplomes
            ];
    }

    /**
     * Creates a new membersDiplome entity.
     *
     * @Route("/add", name="diplomes_new")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function addAction(Request $request)
    {
        $membersDiplome = new MembersDiplomes();
        $form = $this->createForm('TeamBundle\Form\MembersDiplomesType', $membersDiplome);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($membersDiplome);
            $em->flush($membersDiplome);

            return $this->redirectToRoute('diplomes_show', ['id' => $membersDiplome->getId()]);
        }

        return [
                'membersDiplome' => $membersDiplome,
                'form'           => $form->createView(),
            ];
    }

    /**
     * Finds and displays a membersDiplome entity.
     *
     * @Route("/{id}", name="diplomes_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction(MembersDiplomes $membersDiplome)
    {
        $deleteForm = $this->createDeleteForm($membersDiplome);

        return [
                'diplome'     => $membersDiplome,
                'delete_form' => $deleteForm->createView(),
            ];
    }

    /**
     * Displays a form to edit an existing membersDiplome entity.
     *
     * @Route("/{id}/edit", name="diplomes_edit")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function editAction(Request $request, MembersDiplomes $membersDiplome)
    {
        $deleteForm = $this->createDeleteForm($membersDiplome);
        $editForm = $this->createForm('TeamBundle\Form\MembersDiplomesType', $membersDiplome);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('diplomes_edit', ['id' => $membersDiplome->getId()]);
        }

        return [
                'diplome'     => $membersDiplome,
                'edit_form'   => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            ];
    }

    /**
     * Deletes a membersDiplome entity.
     *
     * @Route("/{id}", name="diplomes_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MembersDiplomes $membersDiplome)
    {
        $form = $this->createDeleteForm($membersDiplome);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($membersDiplome);
            $em->flush($membersDiplome);
        }

        return $this->redirectToRoute('diplomes_list');
    }

    /**
     * Creates a form to delete a membersDiplome entity.
     *
     * @param MembersDiplomes $membersDiplome The membersDiplome entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MembersDiplomes $membersDiplome)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('diplomes_delete', ['id' => $membersDiplome->getId()]))
            ->setMethod('DELETE')
            ->getForm();
    }
}
