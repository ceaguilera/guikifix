<?php
namespace Guikifix\Core\UseCases\User\GetJobTypeCategories;

use Guikifix\Core\Contract\RepositoryFactoryInterface;
use Guikifix\Core\Services\ResponseCommandBus;
use Guikifix\Core\Contract\CommandInterface;
use Guikifix\Core\Contract\HandlerInterface;
/**
 * Class GetJobTypeCategoriesHandler
 * @package Guikifix\Core\UseCases\User\GetJobTypeCategories
 *
 * Obtener las categorias de un tipo 
 * trabajo dado el id 
 *
 * @author Freddy Contreras
 */
class GetJobTypeCategoriesHandler implements HandlerInterface
{
    /**
     * @param Command $command
     * @param RepositoryFactoryInterface $rf
     * @return ResponseCommandBus
     */
    public function handle(CommandInterface $command, RepositoryFactoryInterface $rf)
    {
        $rpJobType = $rf->get('JobTypeCategory');
        $response = $rpJobType->findCategoriesById($command->get('id'));

    	return new ResponseCommandBus(200,$response);
    }
}