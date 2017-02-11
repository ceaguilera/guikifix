<?php
namespace Guikifix\Core\Contract;

use Guikifix\Core\Contract\CommandInterface;
use Guikifix\Core\Contract\RepositoryFactoryInterface;

/**
 * Handler Interface
 *  
 * Interface Handler modela las funciones que obligatoriamente deben
 * implementarse en un objeto Handler
 *
 * @author Freddy Contreras <freddycontreras3@gmail.com>
 */
interface HandlerInterface
{
    /**
     * Función donde se ejecuta el caso de uso
     *
     * @param Command $command
     * @param RepositoryFactoryInterface $rf
     * @return ResponseCommandBus
     */
    public function handle(CommandInterface $command, RepositoryFactoryInterface $rf);
}