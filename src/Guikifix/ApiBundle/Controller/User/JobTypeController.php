<?php

namespace Guikifix\ApiBundle\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

use Guikifix\Core\UseCases\User\GetJobTypeCategory\GetJobTypeCategoryCommand;
use Guikifix\Core\UseCases\User\GetJobTypeCategories\GetJobTypeCategoriesCommand;

class JobTypeController extends Controller
{
    /**
     * El siguiente endPoint se encarga de obtener 
     * los listados de los tipos de trabajo en el sistema
     * @param  Request $request 
     * @return json    data solicitada     
     * @ApiDoc(     
     *     views={"default","job_type"},
     *     resource=true,
     *     resourceDescription="Listados de los tipos de trabajo en el sistema",
     *     description="Listados de los tipos de trabajo en el sistema (homepage)",
     *      statusCodes={
     *         200="Retorna json el listado de tipo de trabajos",
     *         500="Error en el sistema"
     *     }
     *  )
    */
    public function indexAction(Request $request)
    {        
        $command = new GetJobTypeCategoryCommand();
        $response = $this->get('CommandBus')->execute($command);

        return new JsonResponse($response->getData(),$response->getStatusCode());
    }

     /**
     * El siguiente endPoint se encarga de obtener 
     * las categorias de un trabajo
     * @param  Request $request 
     * @return json    data solicitada     
     * @ApiDoc(
     *     views={"default","job_type"},
     *     resource=true,
     *     resourceDescription="Listado de categorias según un tipo de trabajo",
     *     description="Listado de categorias según un tipo de trabajo (Busqueda detallada)",
     *      statusCodes={
     *         200="Retorna json el listado de tipo de categorias",
     *     }
     *  )
    */
    public function typeCategoriesAction(Request $request, $id)
    {
        $command = new GetJobTypeCategoriesCommand(['id' => $id]);
        $response = $this->get('CommandBus')->execute($command);

        return new JsonResponse($response->getData(), $response->getStatusCode());
    }
}
