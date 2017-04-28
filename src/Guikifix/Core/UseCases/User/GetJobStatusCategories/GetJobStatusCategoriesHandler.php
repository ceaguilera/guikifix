<?php
namespace Guikifix\Core\UseCases\User\GetJobStatusCategories;

use Guikifix\Core\Contract\HandlerBase;
use Guikifix\Core\Services\ResponseCommandBus;
use Guikifix\Core\Contract\CommandInterface;
use Guikifix\Core\Contract\HandlerInterface;
/**
 * Class GetJobStatusCategoriesHandler
 * @package Guikifix\Core\UseCases\User\GetJobTypeCategories
 *
 * Obtiene el listado de información referente
 * al estado actual de los trabajo.
 *
 * @author Freddy Contreras
 */
class GetJobStatusCategoriesHandler extends HandlerBase implements HandlerInterface
{
    /**
     * @param Command $command
     * @param RepositoryFactoryInterface $rf
     * @return ResponseCommandBus
     */
    public function handle(CommandInterface $command)
    {
        $rpJobType = $this->get('repositoryFactory')->get('JobStatusCategory');
        $response = $rpJobType->findAllStatus();

        return new ResponseCommandBus(200,$response);
    }
}