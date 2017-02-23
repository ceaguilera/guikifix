<?php

namespace Guikifix\ApiBundle\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Guikifix\Core\UseCases\User\GetJobTypeCategory\GetJobTypeCategoryCommand;

class JobTypeController extends Controller
{
    /**
     * El siguiente endPoint se encarga de obtener 
     * los listados de los tipos de trabajo en el sistema
     * @param  Request $request 
     * @return json    data solicitada
     */
    public function indexAction(Request $request)
    {        
        $command = new GetJobTypeCategoryCommand();
        $response = $this->get('CommandBus')->execute($command);

        return new JsonResponse($response->getData(),$response->getStatusCode());
    }
}
