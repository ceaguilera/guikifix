<?php
namespace Guikifix\Core\UseCases\User\GetJobTypeCategory;

use Guikifix\Core\Contract\HandlerBase;
use Guikifix\Core\Services\ResponseCommandBus;
use Guikifix\Core\Contract\CommandInterface;
use Guikifix\Core\Contract\HandlerInterface;
/**
 * Class GetJobTypeCategoryHandler
 * @package Guikifix\Core\UseCases\User\GetJobTypeCategory
 */
class GetJobTypeCategoryHandler extends HandlerBase implements HandlerInterface
{
    /**
     * @param Command $command
     * @param RepositoryFactoryInterface $rf
     * @return ResponseCommandBus
     */
    public function handle(CommandInterface $command)
    {
        $rpJobType = $this->get('repositoryFactory')->get('JobTypeCategory');

    	return new ResponseCommandBus(200,$rpJobType->findAllJob());
    }
}