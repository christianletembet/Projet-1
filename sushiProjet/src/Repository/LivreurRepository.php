<?php

namespace App\Repository;

use App\Entity\Livreur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Livreur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Livreur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Livreur[]    findAll()
 * @method Livreur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LivreurRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Livreur::class);
    }

    // /**
    //  * @return Livreur[] Returns an array of Livreur objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Livreur
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findAllOrderedByEfficacity()
    {
        return $this->createQueryBuilder('e')

            ->orderBy('e.NombreLivraisons','DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult();
    }

    public function findAllOrderedByRapidity()
    {
        return $this->createQueryBuilder('r')

            ->orderBy('r.TempsLivraison','DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult();
    }

    public function findAllOrderedByPonctuality()
    {
        return $this->createQueryBuilder('p')

            ->orderBy('p.Absences','ASC')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult();
    }

    public function findAllOrderedBySoigneux()
    {
        return $this->createQueryBuilder('e')

            ->orderBy('e.EtatCommande','DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult();
    }
}
