<?php

namespace App\Repository;

use App\Entity\SessionCandidats;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SessionCandidats>
 *
 * @method SessionCandidats|null find($id, $lockMode = null, $lockVersion = null)
 * @method SessionCandidats|null findOneBy(array $criteria, array $orderBy = null)
 * @method SessionCandidats[]    findAll()
 * @method SessionCandidats[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SessionCandidatsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SessionCandidats::class);
    }

//    /**
//     * @return SessionCandidats[] Returns an array of SessionCandidats objects
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

//    public function findOneBySomeField($value): ?SessionCandidats
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
