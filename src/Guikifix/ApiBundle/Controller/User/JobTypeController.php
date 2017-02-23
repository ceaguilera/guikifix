<?php

namespace Guikifix\ApiBundle\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

use Guikifix\Core\UseCases\User\GetJobTypeCategory\GetJobTypeCategoryCommand;

class JobTypeController extends Controller
{
    /**
     * El siguiente endPoint se encarga de obtener 
     * los listados de los tipos de trabajo en el sistema
     * @param  Request $request 
     * @return json    data solicitada     
     * @ApiDoc(
     *     tags={
     *         "stable" = "green"
     *     },
     *     resource=true,
     *     resourceDescription="Listados de los tipos de trabajo en el sistema",
     *     description="Listados de los tipos de trabajo en el sistema (homepage)",
     *      statusCodes={
     *         200="Retorna json el listado de tipo de trabajos",
     *     }
     *  )
    */
    public function indexAction(Request $request)
    {        
        $command = new GetJobTypeCategoryCommand();
        $response = $this->get('CommandBus')->execute($command);

        return new JsonResponse($response->getData(),$response->getStatusCode());
    }
}
