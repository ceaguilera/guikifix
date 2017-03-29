<?php

namespace Guikifix\ApiBundle\Controller\Location;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

use Guikifix\Core\UseCases\Location\GetLocations\GetLocationsCommand;

class DefaultController extends Controller
{
    /**
     * Retorna las localidades subyacientes de una localida dado su id
     * 
     * @param  Request $request 
     * @return json    data solicitada     
     * @ApiDoc(
     *     resource=true,
     *     views = {"default","location"},
     *     resourceDescription="Listado de localidades de un nivel inferior dado el id de una localidad",
     *     description="Listado de localidades dado el id de un localidad",
     *     requirements = {
     *         {"name"="locationId","dataType"="interger","description" = "id de la localidad a buscar"}
     *     },
     *      statusCodes={
     *         200="Retorna json el listado de localidades",
     *     }
     *  )
    */
    public function getLocationAction($locationId, Request $request)
    {
        $command = new GetLocationsCommand(['locationId' => $locationId]);
        $response = $this->get('CommandBus')->execute($command);

        return new JsonResponse($response->getData(),$response->getStatusCode());
    }
}
