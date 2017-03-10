<?php
namespace Guikifix\Core\Contract;

/**
 * HandlerBase
 *
 * La clase se encarga de crear actomaticamente los getters and setters
 * de un commnad del caso de uso
 *
 * @author Freddy Contreras 
 */
class HandlerBase
{
    protected $services = [
        'repositoryFactory' => 
            'Guikifix\ApiBundle\Services\RepositoryFactory'
    ];

    public function get($service)
    {
        return new $this->services[$service];
    }
}