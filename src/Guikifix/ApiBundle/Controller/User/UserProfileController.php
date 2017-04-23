<?php

namespace Guikifix\ApiBundle\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Guikifix\Core\UseCases\User\Security\UserProfile\GetInfo\GetInfoCommand;


class UserProfileController extends Controller
{
    /**
     * Esta función es usada para devolver la informacion del perfil del usuario.
     *
     * @param  Request $request 
     * @return json    data solicitada
     * @ApiDoc(
     *     resource=true,
     *     views={"default","job"},
     *     resourceDescription="Url para devolver la informacion del perfil del usuario.",
     *     description="Url para devolver la informacion del perfil del usuario.",
     *      statusCodes={
     *         200="True",
     *         302="No Logged",
     *         500="Error en el servidor"
     *     }
     *  )
     */
    public function getInfoAction(Request $request)
    {
        $data["user"] = $this->get('security.token_storage')->getToken()->getUser();

        if (!is_object($data["user"]))
            return new JsonResponse(false, 302);
            
        $command = new GetInfoCommand($data);
        $response = $this->get('CommandBus')->execute($command);

        return new JsonResponse($response->getData(),$response->getStatusCode());
    }
}