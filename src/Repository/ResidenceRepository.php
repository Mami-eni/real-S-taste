<?php

namespace App\Repository;

use App\Entity\Residence;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Residence|null find($id, $lockMode = null, $lockVersion = null)
 * @method Residence|null findOneBy(array $criteria, array $orderBy = null)
 * @method Residence[]    findAll()
 * @method Residence[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResidenceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Residence::class);
    }

    public function findAllAndPagination($page)
    {
        $queryBuilder = $this->createQueryBuilder('r');
        $queryBuilder->orderBy("r.date_parution","DESC");
        $query = $queryBuilder->getQuery();

        $offset = ($page -1) *10;
       // $query->setFirstResult($offset);
        //$query->setMaxResults(10);
        return $query->getResult();

    }

    public function findByFiltre($type, $isSale, $adress, $rooms, $superficy, $isGarage, $isPool, $isYard, $yardSupericie, $price, $date)
    {
        $queryBuilder = $this->createQueryBuilder('f');
        $queryBuilder->orderBy("f.date_parution","DESC");

        $value = $type;
        $boolVente= $isSale;
        $adresse = $adress;
        $nbrePieces= $rooms;
        $superficie= $superficy;
        $boolGarage= $isGarage;
        $boolYard= $isPool;
        $boolPool= $isYard;
        $surfaceYard=$yardSupericie;
        $price= $price;
        $dateParution= null;


        if(!is_null ($value))
        {

            $queryBuilder->andWhere("f.type ='$value'");

        }



          //dd($boolVente);
        if(!is_null($boolVente))
        {
            $queryBuilder->andWhere("f.isVenteOrLocation='$boolVente'");
        }

       if( !is_null($adresse))
       {
           $queryBuilder->andWhere("f.adresse LIKE '%$adresse%' ");
       }

       if(!is_null($nbrePieces))
       {
           $queryBuilder->andWhere("f.nombre_pieces= $nbrePieces");
       }

        if( !is_null($superficie) )
        {
            $queryBuilder->andWhere("f.superficie= $superficie");
        }

        if(!is_null($boolGarage))
        {
            $queryBuilder->andWhere("f.isGarage='$boolGarage'");
        }

        if( !is_null($boolPool))
        {
            $queryBuilder->andWhere("f.piscine='$boolPool'");
        }

        if(! is_null($boolYard))
        {
            $queryBuilder->andWhere("f.isExterieur='$boolYard'");
        }

        if( ! is_null( $surfaceYard))
        {
            $queryBuilder->andWhere("f.surface_exterieur= $surfaceYard");
        }

        if( ! is_null($dateParution))
        {
            $queryBuilder->andWhere("f.date_parution= $dateParution");
        }


        $query = $queryBuilder->getQuery();


        // $query->setFirstResult($offset);
        $query->setMaxResults(10);
        return $query->getResult();

    }

    // /**
    //  * @return Residence[] Returns an array of Residence objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Residence
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
