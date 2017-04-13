<?php

namespace Guikifix\ApiBundle\Controller\User;

use Guikifix\Core\UseCases\User\Job\SetJob\SetJobCommand;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;


class JobController extends Controller
{
    /**
     * Esta función es usada para el manejo del persistir un presupuesto.
     *
     * @param  Request $request 
     * @return json    data solicitada
     * @ApiDoc(
     *     resource=true,
     *     views={"default","job"},
     *     parameters={
     *         {
     *              "name"="type_element",
     *              "dataType"="array",
     *              "description"="Una coleccion de id para el manejo de jobType",
     *              "required"="true"
     *         },
     *         {
     *              "name"="job_description",
     *              "dataType"="string",
     *              "description"="Descricción del presupuesto",
     *              "required"="true"
     *         },
     *         {
     *              "name"="job_status",
     *              "dataType"="array",
     *              "description"="Una coleccion de id para el manejo de jobStatus",
     *              "required"="true"
     *         },
     *         {
     *              "name"="location",
     *              "dataType"="integer",
     *              "description"="El id del município",
     *              "required"="true"
     *         }
     *     },
     *     resourceDescription="Url para el manejo del persistir un presupuesto.",
     *     description="Url para el manejo del persistir un presupuesto.",
     *      statusCodes={
     *         201="True",
     *         500="Error en el servidor"
     *     }
     *  )
     */
    public function statusCategoriesAction(Request $request)
    {
        
        $data = json_decode($request->getContent(), true);
        $data["user"] = $this->get('security.token_storage')->getToken()->getUser();

        if (!is_object($data["user"]))
            return new JsonResponse(false, 302);
            
        $command = new SetJobCommand($data);
        $response = $this->get('CommandBus')->execute($command);

        return new JsonResponse($response->getData(),$response->getStatusCode());
    }
}
