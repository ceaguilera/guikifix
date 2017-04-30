<?php
namespace Guikifix\Core\UseCases\User\Security\UpdateEmail;

use Guikifix\Core\Contract\HandlerBase;
use Guikifix\Core\Services\ResponseCommandBus;
use Guikifix\Core\Contract\CommandInterface;
use Guikifix\Core\Contract\HandlerInterface;

/**
 * Class UpdateEmailHandler
 * 
 * La siguiente clase se encarga de actualizar el email del usuario.
 *
 * @author Joel D. Requena P. <Joel.2005.2@gmail.com>
 * @author Currently Working: Joel D. Requena P.
 * @package Guikifix\Core\UseCases\User\Security\UpdateEmail
 */
class UpdateEmailHandler extends HandlerBase implements HandlerInterface
{
    /**
     * @param Command $command
     * @param RepositoryFactoryInterface $rf
     * @return ResponseCommandBus
     */
    public function handle(CommandInterface $command)
    {
        global $kernel;
        $container = $kernel->getContainer();
        $rpUserProfile = $this->get('repositoryFactory')->get('User');
        $request = $command->getRequest();

        $user = $request["user"];

        $user->setEmail($request["email"]);
        $user->setUserName($request["email"]);

        $rpUserProfile->persistObject($user);
        $container->get('doctrine.orm.entity_manager')->flush();

        return new ResponseCommandBus(201, true);

    }
}