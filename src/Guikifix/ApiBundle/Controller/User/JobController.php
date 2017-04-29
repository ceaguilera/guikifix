<?php

namespace Guikifix\ApiBundle\Controller\User;

use Guikifix\Core\UseCases\User\Job\SetJob\SetJobCommand;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Guikifix\Core\UseCases\User\Job\GetListJobs\GetListJobsCommand;


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
     *         },
     *         {
     *              "name"="email",
     *              "dataType"="string",
     *              "description"="Correo del usuario",
     *              "required"="false"
     *         }
     *     },
     *     resourceDescription="Url para el manejo del persistir un presupuesto.",
     *     description="Url para el manejo del persistir un presupuesto.",
     *      statusCodes={
     *         201="True",
     *         302="No Logged",
     *         500="Error en el servidor"
     *     }
     *  )
     */
    public function setJobAction(Request $request)
    {
        
        $data = json_decode($request->getContent(), true);
        $data["user"] = $this->get('security.token_storage')->getToken()->getUser();

        if (!is_object($data["user"])){
            $email = isset($data["email"]) ? $data["email"] : null;
            if (is_null($email)) 
                return new JsonResponse(false, 302);
            $user = $this->get('repositoryFactory')->get('User')->findBy(["email"=>$email]);
            if (!$user) 
                return new JsonResponse(false, 302);
            $data["user"] = $user;
        }
            
        $command = new SetJobCommand($data);
        $response = $this->get('CommandBus')->execute($command);

        return new JsonResponse($response->getData(),$response->getStatusCode());
    }

    /**
     * Esta función es usada para el manejo del listado de presupuestos.
     *
     * @param  Request $request 
     * @return json    data solicitada
     * @ApiDoc(
     *     resource=true,
     *     views={"default","job"},
     *     resourceDescription="Url para el manejo del listado de presupuestos.",
     *     description="Url para el manejo del listado de presupuestos.",
     *      statusCodes={
     *         201="True",
     *         302="No Logged",
     *         500="Error en el servidor"
     *     }
     *  )
     */
    public function getListJobsAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $data["user"] = $this->get('security.token_storage')->getToken()->getUser();

        if (!is_object($data["user"]))
            return new JsonResponse(false, 302);
            
        $command = new GetListJobsCommand($data);
        $response = $this->get('CommandBus')->execute($command);

        return new JsonResponse($response->getData(),$response->getStatusCode());
    }
}
