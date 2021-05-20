<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResidenceController extends AbstractController
{
    /**
     * @Route("/list", name="residence_list")
     */
    public function list(): Response
    {
        return $this->render('residence/list.html.twig', [

        ]);
    }

    /**
     * @Route("/list/detail", name="residence_detail")
     */
    public function detail(): Response
    {
        return $this->render('residence/detail.html.twig', [

        ]);
    }

    /**
     * @Route("/list/detail/update", name="residence_update")
     */
    public function update(): Response
    {
        return $this->render('residence/create.html.twig', [

        ]);
    }
    /**
     * @Route("/create", name="residence_create")
     */
    public function create(): Response
    {
        // si ça se passe bien redirection vers accueil ou detail
        //sinon retour vers page create
        return $this->render('residence/create.html.twig', [

        ]);
    }
}
