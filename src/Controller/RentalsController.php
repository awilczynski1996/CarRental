<?php

namespace App\Controller;

use App\Entity\Rentals;
use App\Form\RentalsType;
use App\Repository\RentalsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/rentals")
 */
class RentalsController extends AbstractController
{
    /**
     * @Route("/", name="rentals_index", methods="GET")
     */
    public function index(RentalsRepository $rentalsRepository): Response
    {
        return $this->render('rentals/index.html.twig', ['rentals' => $rentalsRepository->findAll()]);
    }

    /**
     * @Route("/new", name="rentals_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $rental = new Rentals();
        $form = $this->createForm(RentalsType::class, $rental);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($rental);
            $em->flush();

            return $this->redirectToRoute('rentals_index');
        }

        return $this->render('rentals/new.html.twig', [
            'rental' => $rental,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rentals_show", methods="GET")
     */
    public function show(Rentals $rental): Response
    {
        return $this->render('rentals/show.html.twig', ['rental' => $rental]);
    }

    /**
     * @Route("/{id}/edit", name="rentals_edit", methods="GET|POST")
     */
    public function edit(Request $request, Rentals $rental): Response
    {
        $form = $this->createForm(RentalsType::class, $rental);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('rentals_edit', ['id' => $rental->getId()]);
        }

        return $this->render('rentals/edit.html.twig', [
            'rental' => $rental,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rentals_delete", methods="DELETE")
     */
    public function delete(Request $request, Rentals $rental): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rental->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($rental);
            $em->flush();
        }

        return $this->redirectToRoute('rentals_index');
    }
}
