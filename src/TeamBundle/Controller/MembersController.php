<?php

namespace TeamBundle\Controller;

use TeamBundle\Entity\Member;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Member controller.
 *
 * @Route("members")
 */
class MembersController extends Controller
{
    /**
     * Lists all member entities.
     *
     * @Route("/", name="members_list")
     * @Method("GET")
     * @Template()
     */
    public function listAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $members = $em->getRepository('TeamBundle:Member')->findAll();

        $formSearch = $this->createFormBuilder()
                        ->setMethod('GET')
                        ->add('search', TextType::class, [
                                'constraints' => [
                                    new NotBlank()
                                ]
                            ])
                        ->getForm();

        $formSearch->handleRequest($request);

        if ($formSearch->isSubmitted() && $formSearch->isValid()) {
            //
        }

        return [
                'members'    => $members,
                'formSearch' => $formSearch->createView()
            ];
    }

    /**
     * Creates a new member entity.
     *
     * @Route("/add", name="members_new")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function addAction(Request $request)
    {
        $member = new Member();
        $form = $this->createForm('TeamBundle\Form\MemberType', $member);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($member);
            $em->flush($member);

            return $this->redirectToRoute('members_show', ['id' => $member->getId()]);
        }

        return [
                'member' => $member,
                'form'   => $form->createView(),
            ];
    }

    /**
     * Finds and displays a member entity.
     *
     * @Route("/{id}", name="members_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction(Member $member)
    {
        $deleteForm = $this->createDeleteForm($member);

        return [
                'member'      => $member,
                'delete_form' => $deleteForm->createView(),
            ];
    }

    /**
     * Displays a form to edit an existing member entity.
     *
     * @Route("/{id}/edit", name="members_edit")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function editAction(Request $request, Member $member)
    {
        $deleteForm = $this->createDeleteForm($member);
        $editForm = $this->createForm('TeamBundle\Form\MemberType', $member);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('members_edit', ['id' => $member->getId()]);
        }

        return [
                'member'      => $member,
                'edit_form'   => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            ];
    }

    /**
     * Deletes a member entity.
     *
     * @Route("/{id}", name="members_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Member $member)
    {
        $form = $this->createDeleteForm($member);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($member);
            $em->flush($member);
        }

        return $this->redirectToRoute('members_list');
    }

    /**
     * Creates a form to delete a member entity.
     *
     * @param Member $member The member entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Member $member)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('members_delete', ['id' => $member->getId()]))
            ->setMethod('DELETE')
            ->getForm();
    }
}
