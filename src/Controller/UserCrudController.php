<?php

namespace App\Controller;

use App\Entity\UserNextp;
use App\Form\UserNextpType;
use App\Repository\UserNextpRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user/crud")
 */
class UserCrudController extends AbstractController
{
    /**
     * @Route("/", name="user_crud_index", methods={"GET"})
     */
    public function index(UserNextpRepository $userNextpRepository): Response
    {
        return $this->render('user_crud/index.html.twig', [
            'user_nextps' => $userNextpRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="user_crud_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $userNextp = new UserNextp();
        $form = $this->createForm(UserNextpType::class, $userNextp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($userNextp);
            $entityManager->flush();

            return $this->redirectToRoute('user_crud_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user_crud/new.html.twig', [
            'user_nextp' => $userNextp,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="user_crud_show", methods={"GET"})
     */
    public function show(UserNextp $userNextp): Response
    {
        return $this->render('user_crud/show.html.twig', [
            'user_nextp' => $userNextp,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="user_crud_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, UserNextp $userNextp): Response
    {
        $form = $this->createForm(UserNextpType::class, $userNextp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_crud_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user_crud/edit.html.twig', [
            'user_nextp' => $userNextp,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="user_crud_delete", methods={"POST"})
     */
    public function delete(Request $request, UserNextp $userNextp): Response
    {
        if ($this->isCsrfTokenValid('delete'.$userNextp->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($userNextp);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_crud_index', [], Response::HTTP_SEE_OTHER);
    }
}
