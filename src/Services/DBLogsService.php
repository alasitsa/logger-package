<?php


namespace Logger\Services;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Logger\Entities\Log;

class DBLogsService implements ILogsService
{
    private EntityManager $em;

    /**
     * DBLogsService constructor.
     *
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        return $this->em->getRepository(Log::class)->findAll();
    }

    /**
     * @param int $id
     *
     * @return Log
     */
    public function get(int $id): Log
    {
        $result = $this->em->getRepository(Log::class)->find($id);
        $log = new Log();
        $log->setId($result->id);
        $log->setLevel($result->level);
        $log->setMessage($result->message);
        $log->setCreatedAt($result->created_at);
        return $log;
    }


    /**
     * @param Log $log
     *
     * @returns void
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Log $log): void
    {
        $this->em->persist($log);
        $this->em->flush();
    }
}