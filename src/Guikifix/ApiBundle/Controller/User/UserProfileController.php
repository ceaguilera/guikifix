<?php

namespace Guikifix\ApiBundle\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Guikifix\Core\UseCases\User\Security\UserProfile\GetInfo\GetInfoCommand;
use Guikifix\Core\UseCases\User\Security\UserProfile\SetInfo\SetInfoCommand;


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

    /**
     * Esta función es usada para guardar la informacion del perfil del usuario.
     *
     * @param  Request $request 
     * @return json    data solicitada
     * @ApiDoc(
     *     resource=true,
     *     views={"default","job"},
     *     parameters={
     *         {
     *              "name"="first_name",
     *              "dataType"="string",
     *              "description"="Nombre del usuario",
     *              "required"="true"
     *         },
     *         {
     *              "name"="last_name",
     *              "dataType"="string",
     *              "description"="Apellido del usuario",
     *              "required"="true"
     *         },
     *         {
     *              "name"="email",
     *              "dataType"="string",
     *              "description"="Email del usuario",
     *              "required"="true"
     *         },
     *         {
     *              "name"="identity_card",
     *              "dataType"="string",
     *              "description"="Cedula del usuario",
     *              "required"="true"
     *         },
     *         {
     *              "name"="cell_phone",
     *              "dataType"="string",
     *              "description"="Celular del usuario",
     *              "required"="true"
     *         },
     *         {
     *              "name"="phone",
     *              "dataType"="string",
     *              "description"="Telefono del usuario",
     *              "required"="false"
     *         },
     *         {
     *              "name"="gender",
     *              "dataType"="string",
     *              "description"="Genero del usuario",
     *              "required"="true"
     *         },
     *         {
     *              "name"="birthdate",
     *              "dataType"="string",
     *              "description"="Fecha de cumpleaños del usuario",
     *              "required"="true"
     *         },
     *         {
     *              "name"="city",
     *              "dataType"="string",
     *              "description"="Id de la parroquia del usuario",
     *              "required"="true"
     *         },
     *         {
     *              "name"="email",
     *              "dataType"="string",
     *              "description"="Correo del usuario",
     *              "required"="false"
     *         }
     *         
     *     },
     *     resourceDescription="Url para guardar la informacion del perfil del usuario.",
     *     description="Url para guardar la informacion del perfil del usuario.",
     *      statusCodes={
     *         200="True",
     *         302="No Logged",
     *         500="Error en el servidor"
     *     }
     *  )
     */
    public function setInfoAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $data["user"] = $this->get('security.token_storage')->getToken()->getUser();

        if (!is_object($data["user"])){
            $email = isset($data["email"]) ? $data["email"] : null;
            if (is_null($email)) 
                return new JsonResponse(false, 302);
            $user = $this->get('repositoryFactory')->get('User')->findOneBy(["email"=>$email]);
            if (!$user) 
                return new JsonResponse(false, 302);
            $data["user"] = $user;
        }
            
        $command = new SetInfoCommand($data);
        $response = $this->get('CommandBus')->execute($command);

        return new JsonResponse($response->getData(),$response->getStatusCode());
    }
}

//usera6->userc7->usera9
