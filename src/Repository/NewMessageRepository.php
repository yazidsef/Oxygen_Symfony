<?php

namespace App\Repository;

use App\Entity\NewMessage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NewMessage>
 *
 * @method NewMessage|null find($id, $lockMode = null, $lockVersion = null)
 * @method NewMessage|null findOneBy(array $criteria, array $orderBy = null)
 * @method NewMessage[]    findAll()
 * @method NewMessage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NewMessageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NewMessage::class);
    }

//    /**
//     * @return NewMessage[] Returns an array of NewMessage objects
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

//    public function findOneBySomeField($value): ?NewMessage
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
