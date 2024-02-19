<?php

namespace App\Repository;

use App\Entity\NewMessages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NewMessages>
 *
 * @method NewMessages|null find($id, $lockMode = null, $lockVersion = null)
 * @method NewMessages|null findOneBy(array $criteria, array $orderBy = null)
 * @method NewMessages[]    findAll()
 * @method NewMessages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NewMessagesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NewMessages::class);
    }

//    /**
//     * @return NewMessages[] Returns an array of NewMessages objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('n.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?NewMessages
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
