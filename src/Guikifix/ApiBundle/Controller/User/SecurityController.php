<?php

namespace Guikifix\ApiBundle\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

use Guikifix\Core\UseCases\User\Security\RegisterUser\RegisterUserCommand;
use Guikifix\Core\UseCases\User\Security\UpdatePassword\UpdatePasswordCommand;
use Guikifix\Core\UseCases\User\Security\UpdateEmail\UpdateEmailCommand;

class SecurityController extends Controller
{
	/**
     * Registro de usuario en el sistema
     * @param  Request $request 
     * @return json    data solicitada     
     * @ApiDoc(
     *     resource=true,
     *     views={"default","user","security"},
     *     parameters={
     *         {"name"="email","dataType"="email","description"="Correo electronico","required"="true"},
     *         {"name"="first_name","dataType"="string","description"="Nombre","required"="true"},
     *         {"name"="last_name","dataType"="string","description"="Apellido","required"="true"},
     *         {"name"="cell_phone","dataType"="string","description"="Nombre","required"="true"},
     *         {"name"="password","dataType"="string","description"="Contraseña","required"="true"},
     *         {"name"="confirmation_password","dataType"="string","description"="Confirmación de contraseña","required"="true"},
     *         {"name"="how_contact_us","dataType"="string","description"="¿Como supiste de Guikifix?","required"="true"},
     *         {"name"="core_refered","dataType"="string","description"="Codigo de referido","required"="true"},
     *     },
     *     resourceDescription="Registrar un usuario en el sistema",
     *     description="Registro de un usuario en el sistema",
     *      statusCodes={
     *         201="Usuario creado correctamente",
     *         404="Datos incorrectos o petición erronea",
     *         500="Error en el servidor"
     *     }
     *  )
    */
    public function registerAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $command = new RegisterUserCommand($data);
    	$response = $this->get('CommandBus')->execute($command);
    
    	return new JsonResponse($response->getData(),$response->getStatusCode());
    }

    /**
     * Esta función es usada para login de un usuario por
     * medio de peticion asincrona.
     *
     * @author Joel D. Requena P. <Joel.2005.2@gmail.com>
     * @author Currently Working: Joel D. Requena P.
     *
     * @param  Request $request 
     * @return json data solicitada     
     * @ApiDoc(
     *     resource=true,
     *     views={"default","user","security"},
     *     parameters={
     *         {
     *              "name"="userName",
     *              "dataType"="string",
     *              "description"="El Username o el email",
     *              "required"="true"
     *         },
     *         {
     *              "name"="pass",
     *              "dataType"="string",
     *              "description"="Password del usuario",
     *              "required"="true"
     *         },
     *         
     *     },
     *     resourceDescription="login de un usuario por
     * medio de peticion asincrona.",
     *     description="login de un usuario por
     * medio de peticion asincrona.",
     *      statusCodes={
     *         201="{'first_name': 'asdasd','last_name': 'qweqwe'}",
     *         302="Usuario No logeado",
     *         404="Petición erronea no asyncrona",
     *         500="Error en el servidor"
     *     }
     *  )
    */
    public function apiLoginAction(Request $request, $config)
    {

            $data = json_decode($request->getContent(), true);

            $islogged = $this->get('SecurityService')->loginByData($data, $config);

            if ($islogged) {

                $user = $this->get('security.token_storage')->getToken()->getUser()->getUserProfile();
                $response["first_name"] = $user->getFirstName();
                $response["last_name"] = $user->getLastName();
            }

            return new JsonResponse(
                $islogged ? $response : null,
                $islogged ? 201 :302
            );
    }

    /**
     * Esta función es usada para cambiar el password de un usuario por
     * medio de peticion asincrona.
     *
     * @author Joel D. Requena P. <Joel.2005.2@gmail.com>
     * @author Currently Working: Joel D. Requena P.
     *
     * @param  Request $request 
     * @return json data solicitada     
     * @ApiDoc(
     *     resource=true,
     *     views={"default","user","security"},
     *     parameters={
     *         {
     *              "name"="pass",
     *              "dataType"="string",
     *              "description"="Password del usuario",
     *              "required"="true"
     *         },
     *         {
     *              "name"="confirm_pass",
     *              "dataType"="string",
     *              "description"="Confirmacion de password del usuario",
     *              "required"="true"
     *         }
     *         
     *     },
     *     resourceDescription="cambio del password de un usuario por
     * medio de peticion asincrona.",
     *     description="cambio del password de un usuario por
     * medio de peticion asincrona.",
     *      statusCodes={
     *         201="true",
     *         302="Usuario No logeado",
     *         401="Password no coinciden",
     *         500="Error en el servidor"
     *     }
     *  )
    */
    public function updatePasswordAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $data["user"] = $this->get('security.token_storage')->getToken()->getUser();

        if (!is_object($data["user"]))
            return new JsonResponse(false, 302);

        $command = new UpdatePasswordCommand($data);
        $response = $this->get('CommandBus')->execute($command);

        return new JsonResponse($response->getData(), $response->getStatusCode());
    }

    /**
     * Esta función es usada para el manejo del logout de un usuario por
     * medio de peticion asincrona.
     *
     * @author Joel D. Requena P. <Joel.2005.2@gmail.com>
     * @author Currently Working: Joel D. Requena P.
     *
     * @return boolean
    */
    public function postLogoutAction()
    {
        return new JsonResponse(
            true,
            201
        );
    }

    /**
     * Esta función es usada para saber si el usuario esta logeado
     *
     * @author Joel D. Requena P. <Joel.2005.2@gmail.com>
     * @author Currently Working: Joel D. Requena P.
     *
     * @return json data solicitada     
     * @ApiDoc(
     *     resource=true,
     *     views={"default","user","security"},
     *     resourceDescription="Esta función es usada para saber si el usuario esta logeado",
     *     description="Esta función es usada para saber si el usuario esta logeado",
     *      statusCodes={
     *         201="true",
     *         302="Usuario No logeado",
     *         500="Error en el servidor"
     *     }
     *  )
    */
    public function isLoggedAction()
    {

        $user = $this->get('security.token_storage')->getToken()->getUser();

        if (!is_object($user))
            return new JsonResponse(false, 302);

        return new JsonResponse(
            true,
            201
        );
    }

    /**
     * Esta función es usada para cambiar el email de un usuario por
     * medio de peticion asincrona.
     *
     * @author Joel D. Requena P. <Joel.2005.2@gmail.com>
     * @author Currently Working: Joel D. Requena P.
     *
     * @param  Request $request 
     * @return json data solicitada     
     * @ApiDoc(
     *     resource=true,
     *     views={"default","user","security"},
     *     parameters={
     *         {
     *              "name"="email",
     *              "dataType"="string",
     *              "description"="Email del usuario",
     *              "required"="true"
     *         }
     *     },
     *     resourceDescription="cambio del email de un usuario por
     * medio de peticion asincrona.",
     *     description="cambio del email de un usuario por
     * medio de peticion asincrona.",
     *      statusCodes={
     *         201="true",
     *         302="Usuario No logeado",
     *         500="Error en el servidor"
     *     }
     *  )
    */
    public function updateEmailAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $data["user"] = $this->get('security.token_storage')->getToken()->getUser();

        if (!is_object($data["user"]))
            return new JsonResponse(false, 302);

        $command = new UpdateEmailCommand($data);
        $response = $this->get('CommandBus')->execute($command);

        return new JsonResponse($response->getData(), $response->getStatusCode());
    }
}
