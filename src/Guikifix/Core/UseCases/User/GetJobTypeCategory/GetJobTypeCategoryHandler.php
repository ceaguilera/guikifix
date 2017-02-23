<?php
namespace Guikifix\Core\UseCases\User\GetJobTypeCategory;

use Guikifix\Core\Contract\RepositoryFactoryInterface;
use Guikifix\Core\Services\ResponseCommandBus;
use Guikifix\Core\Contract\CommandInterface;
use Guikifix\Core\Contract\HandlerInterface;
/**
 * Class EditClientProfileHandler
 * @package Navicu\Core\Application\UseCases\EditClientProfile
 */
class GetJobTypeCategoryHandler implements HandlerInterface
{
    /**
     * @param Command $command
     * @param RepositoryFactoryInterface $rf
     * @return ResponseCommandBus
     */
    public function handle(CommandInterface $command, RepositoryFactoryInterface $rf)
    {
        $rpJobType = $rf->get('JobTypeCategory');
        $response = $rpJobType->findAllJob();

    	return new ResponseCommandBus(200,$response);
    }
}