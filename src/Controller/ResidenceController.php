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
    dump($filtre);


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
     * @Route("/detail/update/{id}", name="residence_update", requirements= {"id"="\d+"})
     */
    public function update($id, ResidenceRepository $residenceRepository, Request $request, EntityManagerInterface $entityManager): Response
    {

        $residence = $residenceRepository->find($id);
        $residenceFormulaire = $this->createForm(ResidenceType::class, $residence);
        $residenceFormulaire->handleRequest($request);


        if($residenceFormulaire->isSubmitted() && $residenceFormulaire->isValid())
        {
            dump($residence);

            // verifications si la combinaison presence exterieur et surface garage sont coherents
            if($residence->getIsExterieur() && null!=$residence->getSurfaceExterieur() || ( !$residence->getIsExterieur() && null==$residence->getSurfaceExterieur() ))
            {
                $entityManager->persist($residence);
                $entityManager->flush();
                $this->addFlash( "success","Residence successfully Modified!");

                return $this->redirectToRoute("residence_detail", ["id"=>$residence->getId()]);

            }

            else
            {
                $this->addFlash( "error"," there is an error with the exterior informations");
                return $this->render('residence/update.html.twig', [ "formulaire"=> $residenceFormulaire ->createView()

                ]);
            }

        }


        return $this->render("residence/update.html.twig", ["residence"=>$residence,
            "formulaire"=> $residenceFormulaire ->createView() // poser la question de la difference avec render et pourquoi les liens ne sont pas les memes

        ]);
    }
    /**
     * @Route("/create/{id}", name="residence_create"), requirements= {"page"="\d+"}
     */
    public function create( $id=0, Request  $request, EntityManagerInterface  $entityManager, ResidenceRepository $residenceRepository): Response
    {

        if(0===$id)
        {
            $residence = new Residence();
            $residence->setDateParution(new \DateTime());
            $message = "New residence successfully added!";
        }

        else
        {
            $residence = $residenceRepository->find($id);
            $message= "Residence successfully Modified!";

        }



        $residenceFormulaire = $this->createForm(ResidenceType::class, $residence);

        $residenceFormulaire->handleRequest($request);

        // message success different et setdate parution aussi selon la valeur du parametre passer en ref

        if($residenceFormulaire->isSubmitted() && $residenceFormulaire->isValid())
        {
            dump($residence);

            // verifications si la combinaison presence exterieur et surface garage sont coherents
            if($residence->getIsExterieur() && null!=$residence->getSurfaceExterieur() || ( !$residence->getIsExterieur() && null==$residence->getSurfaceExterieur() ))
            {
                $entityManager->persist($residence);
                $entityManager->flush();
                $this->addFlash( "success",$message);

                return $this->redirectToRoute("residence_detail", ["id"=>$residence->getId()]);

            }

            else
            {
                $this->addFlash( "error"," there is an error with the exterior informations");
                return $this->render('residence/create.html.twig', [ "formulaire"=> $residenceFormulaire ->createView()

                ]);
            }

        }


        return $this->render('residence/create.html.twig', [ "residence"=>$residence,"formulaire"=> $residenceFormulaire ->createView()

        ]);

    }


}
