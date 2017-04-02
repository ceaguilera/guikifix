<?php
namespace Guikifix\ApiBundle\Services;

use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Authentication\AuthenticationManagerInterface;

/**
 * Esta función es usada para el manejo de servicios relacionados
 * con la seguridad del sistema.
 *
 * @author Joel D. Requena P. <Joel.2005.2@gmail.com>
 * @author Currently Working: Joel D. Requena P.
 */
class SecurityService
{
    /**
     * Esta propiedad es usada para contener el contenedor de servicios
     * 
     * @var \Container_Services
     */
    protected $container;


    /**
     * @var AuthenticationManagerInterface
     */
    protected $am;

    /**
     * Esta propiedad es usada para el manejo del entityManager.
     * 
     * @var \Security.context
     */
    protected $ts;

    /**
     * Metodo Constructor de php
     *
     * @param \Container_Services $container
     * @param \Security.context $sessionManager
     */
    public function __construct($container, $am, $ts)
    {
        $this->ts = $ts;
        $this->am = $am;
        $this->container = $container;
    }

	/**
     * Esta función es usada para login de un usuario por
     * parametros necesarios para el mismo.
     *
     * @author Joel D. Requena P. <Joel.2005.2@gmail.com>
	 * @author Currently Working: Joel D. Requena P.
	 * 
     * @param Array $data
     * @param String $config
     */
    public function loginByData($data, $config = "main")
    {
        $factory = $this->container->get('security.encoder_factory');
        $repositoryUser = $this->container->get('repositoryFactory')->get('User');

        $user = $repositoryUser->findByUserNameOrEmail($data["userName"]);

        if (!$user)
            return false;


        $unauthenticatedToken = new UsernamePasswordToken(
            $data["userName"],
            $data["pass"],
            $config
        );


        $encoder = $factory->getEncoder($user);

        //Se verifica si password corresponde
        //Si el password corresponde se inicia la sesión
        if ($encoder->isPasswordValid($user->getPassword(),$data["pass"],$user->getSalt())) {

            $authenticatedToken = $this->am
            ->authenticate($unauthenticatedToken);

            $this->ts->setToken($authenticatedToken);
            return true;

        }
        return false;
    }
}