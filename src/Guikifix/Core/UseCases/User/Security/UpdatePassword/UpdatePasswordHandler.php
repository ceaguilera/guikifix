<?php
namespace Guikifix\Core\UseCases\User\Security\UpdatePassword;

use Guikifix\Core\Contract\HandlerBase;
use Guikifix\Core\Services\ResponseCommandBus;
use Guikifix\Core\Contract\CommandInterface;
use Guikifix\Core\Contract\HandlerInterface;

/**
 * Class UpdatePasswordHandler
 * 
 * La siguiente clase se encarga de actualizar la contraseña del usuario.
 *
 * @author Joel D. Requena P. <Joel.2005.2@gmail.com>
 * @author Currently Working: Joel D. Requena P.
 * @package Guikifix\Core\UseCases\User\Security\UpdatePassword
 */
class UpdatePasswordHandler extends HandlerBase implements HandlerInterface
{
    /**
     * @param Command $command
     * @param RepositoryFactoryInterface $rf
     * @return ResponseCommandBus
     */
    public function handle(CommandInterface $command)
    {
        $request = $command->getRequest();

        if ($request["pass"] != $request["confirm_pass"])
            return new ResponseCommandBus(401, "Password no son iguales");

        $user = $request["user"];
        global $kernel;
        $container = $kernel->getContainer();

        $encoder = $container->get('security.password_encoder');
        $encodedPass = $encoder->encodePassword($user, $request["pass"]);

        $user->setPassword($encodedPass);

        $rpUserProfile = $this->get('repositoryFactory')->get('User');
        $rpUserProfile->persistObject($user);

        $container->get('doctrine.orm.entity_manager')->flush();

        return new ResponseCommandBus(201, true);
    }
}