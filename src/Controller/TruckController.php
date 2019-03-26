<?php

namespace App\Controller;

use App\Entity\Truck;
use App\Form\TruckType;
use App\Repository\TruckRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

/**
 * @Route("/truck")
 */
class TruckController extends AbstractController
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }
    /**
     * @Route("/", name="truck_index", methods={"GET"})
     */
    public function index(TruckRepository $truckRepository): Response
    {
        if ($this->security->isGranted('ROLE_SUPER_ADMIN')) {
            return $this->render('truck/index.html.twig', [
                'trucks' => $truckRepository->findAll(),
            ]);
        }
        else {
            return $this->render("default/noacces.html.twig");
        }
    }

    /**
     * @Route("/new", name="truck_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {

        if ($this->security->isGranted('ROLE_SUPER_ADMIN')) {
            $truck = new Truck();
            $form = $this->createForm(TruckType::class, $truck);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($truck);
                $entityManager->flush();

                return $this->redirectToRoute('truck_index');
            }

            return $this->render('truck/new.html.twig', [
                'truck' => $truck,
                'form' => $form->createView(),
            ]);
        }
        else {
            return $this->render("default/noacces.html.twig");
        }
    }

    /**
     * @Route("/{id}", name="truck_show", methods={"GET"})
     */
    public function show(Truck $truck): Response
    {
        if ($this->security->isGranted('ROLE_SUPER_ADMIN')) {
        return $this->render('truck/show.html.twig', [
            'truck' => $truck,
        ]);
        }
        else {
            return $this->render("default/noacces.html.twig");
        }
    }

    /**
     * @Route("/{id}/edit", name="truck_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Truck $truck): Response
    {
        if ($this->security->isGranted('ROLE_SUPER_ADMIN')) {
        $form = $this->createForm(TruckType::class, $truck);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('truck_index', [
                'id' => $truck->getId(),
            ]);
        }

        return $this->render('truck/edit.html.twig', [
            'truck' => $truck,
            'form' => $form->createView(),
        ]);
        }
        else {
            return $this->render("default/noacces.html.twig");
        }
    }

    /**
     * @Route("/{id}", name="truck_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Truck $truck): Response
    {
        if ($this->isCsrfTokenValid('delete'.$truck->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($truck);
            $entityManager->flush();
        }

        return $this->redirectToRoute('truck_index');
    }
}
