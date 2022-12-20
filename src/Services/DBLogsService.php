<?php


namespace Logger\Services;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\ORMException;
use Logger\Entities\Log;

class DBLogsService implements ILogsService
{
    private EntityManager $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getAll(): array
    {
        return $this->em->getRepository(Log::class)->findAll();
    }

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
     * @throws ORMException
     */
    public function add(Log $log)
    {
        $this->em->persist($log);
        $this->em->flush();
    }
}