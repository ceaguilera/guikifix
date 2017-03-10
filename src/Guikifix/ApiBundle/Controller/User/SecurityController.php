<?php

namespace Guikifix\ApiBundle\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

use Guikifix\Core\UseCases\User\Security\RegisterUser\RegisterUserCommand;

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
        $command = new RegisterUserCommand(json_decode($request->getContent(), true));
    	$response = $this->get('CommandBus')->execute($command);
    
    	return new JsonResponse($response->getData(),$response->getStatusCode());
    }
}
