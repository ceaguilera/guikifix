<?php
namespace Guikifix\Core\UseCases\Location\GetLocations;

use Guikifix\Core\Contract\HandlerBase;
use Guikifix\Core\Services\ResponseCommandBus;
use Guikifix\Core\Contract\CommandInterface;
use Guikifix\Core\Contract\HandlerInterface;
/**
 * Class GetLocationsHandler
 * @package Guikifix\Core\UseCases\User\GetJobTypeCategory
 */
class GetLocationsHandler extends HandlerBase implements HandlerInterface
{
    /**
     * @param Command $command
     * @param RepositoryFactoryInterface $rf
     * @return ResponseCommandBus
     */
    public function handle(CommandInterface $command)
    {
        $rpJobType = $this->get('repositoryFactory')->get('Location');

    	return new ResponseCommandBus(200,$rpJobType->findChildrenById($command->get('locationId')));
    }
}