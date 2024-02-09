<?php

namespace App\Repository;

use App\Entity\SessionsVotes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SessionsVotes>
 *
 * @method SessionsVotes|null find($id, $lockMode = null, $lockVersion = null)
 * @method SessionsVotes|null findOneBy(array $criteria, array $orderBy = null)
 * @method SessionsVotes[]    findAll()
 * @method SessionsVotes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SessionsVotesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SessionsVotes::class);
    }

//    /**
//     * @return SessionsVotes[] Returns an array of SessionsVotes objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SessionsVotes
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
