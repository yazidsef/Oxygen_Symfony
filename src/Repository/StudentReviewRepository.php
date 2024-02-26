<?php

namespace App\Repository;

use App\Entity\StudentReview;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<StudentReview>
 *
 * @method StudentReview|null find($id, $lockMode = null, $lockVersion = null)
 * @method StudentReview|null findOneBy(array $criteria, array $orderBy = null)
 * @method StudentReview[]    findAll()
 * @method StudentReview[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StudentReviewRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StudentReview::class);
    }
    // find all student reviews with related student
    public function findAllWithStudents(): array
    {
        return $this->createQueryBuilder('r')
            ->leftJoin('r.student', 's')
            ->addSelect('s')
            ->addSelect('r') // Include the 'r' alias to select all fields from StudentReview entity
            ->getQuery()
            ->getResult();
    }
}
