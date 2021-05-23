<?php

namespace App\Controller;

use App\Entity\Residence;
use App\Form\FiltreType;
use App\Form\ResidenceType;
use App\Other\Filtre;
use App\Repository\ResidenceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResidenceController extends AbstractController
{
    /**
     * @Route("/", name="residence_list")
     */
    public function list( int $page=1, Request $request,ResidenceRepository $residenceRepository): Response
    {

        //$residenceList = $residenceRepository->findBy([],["date_parution"=>"DESC"],10,0);

        $nombreResidence = $residenceRepository->count([]);
        $maxPage = ceil($nombreResidence/10);
        //if($page >=1 && $nombreResidence <= $maxPage)
       // {
           $residenceList = $residenceRepository->findAllAndPagination($page);

       // }


        $filtre = new Filtre();
        $filtreFormulaire = $this->createForm(FiltreType::class, $filtre);

        $filtreFormulaire->handleRequest($request);


        if($filtreFormulaire->isSubmitted() && $filtreFormulaire->isValid())
        {
           $type = $filtre->getType();
           $isSale= $filtre->getIsVenteOrLocation();
           $adress = $filtre->getAdresse();
           $rooms = $filtre ->getNombrePieces();
           $superficy = $filtre->getSuperficie();
           $isGarage = $filtre->getIsGarage();
           $isPool= $filtre->getPiscine();
           $isYard= $filtre->getIsExterieur();
           $yardSupericie = $filtre->getSurfaceExterieur();
           $price = $filtre ->getPrix();
           $date = $filtre->getDateParution();

            $residenceList = $residenceRepository->
            findByFiltre($type, $isSale, $adress, $rooms, $superficy, $isGarage, $isPool, $isYard, $yardSupericie, $price, $date);
        }



        return $this->render('residence/list.html.twig', [
            "residenceList"=>$residenceList,
            "currentPage"=>$page,
            "maxPage" => $maxPage,
            "formulaire"=> $filtreFormulaire->createView()

        ]);
    }

    /**
     * @Route("/detail/{id}", name="residence_detail", requirements= {"page"="\d+"})
     */
    public function detail(int $id, ResidenceRepository $residenceRepository): Response
    {
        $residence = $residenceRepository->find($id);
        return $this->render('residence/detail.html.twig', [ "residence"=>$residence


        ]);
    }

    /**
     * @Route("/detail/update", name="residence_update")
     */
    public function update(): Response
    {
        return $this->render('residence/create.html.twig', [

        ]);
    }
    /**
     * @Route("/create", name="residence_create")
     */
    public function create( Request  $request, EntityManagerInterface  $entityManager): Response
    {
        $residence = new Residence();
        $residenceFormulaire = $this->createForm(ResidenceType::class, $residence);
        $residence->setDateParution(new \DateTime());
        $residenceFormulaire->handleRequest($request);

        if($residenceFormulaire->isSubmitted() && $residenceFormulaire->isValid())
        {

            // verifications si la combinaison presence exterieur et surface garage sont coherents
            if($residence->getIsExterieur() && null!=$residence->getSurfaceExterieur() || ( !$residence->getIsExterieur() && null==$residence->getSurfaceExterieur() ))
            {
                $entityManager->persist($residence);
                $entityManager->flush();
                $this->addFlash( "success","New residence successfully added!");

                return $this->redirectToRoute("residence_detail", ["id"=>$residence->getId()]);

            }

            else
            {
                $this->addFlash( "error"," there is an error with the exterior informations");
                return $this->render('residence/create.html.twig', [ "formulaire"=> $residenceFormulaire ->createView()

                ]);
            }

        }


        return $this->render('residence/create.html.twig', [ "formulaire"=> $residenceFormulaire ->createView()

        ]);
    }
}
