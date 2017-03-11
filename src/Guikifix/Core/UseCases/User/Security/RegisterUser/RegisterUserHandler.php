<?php
namespace Guikifix\Core\UseCases\User\Security\RegisterUser;

use Guikifix\Core\Contract\HandlerBase;
use Guikifix\Core\Services\ResponseCommandBus;
use Guikifix\Core\Contract\CommandInterface;
use Guikifix\Core\Contract\HandlerInterface;
use Guikifix\Core\Domain\UserProfile;
use Guikifix\ApiBundle\Entity\User;
/**
 * Class RegisterUserHandler
 * 
 * La siguiente clase se encarga se encarga
 * de procesar el registro de un usuario al sistema
 *
 * @author Freddy Contreras
 * @package Guikifix\Core\UseCases\User\Security\RegisterUser
 */
class RegisterUserHandler extends HandlerBase implements HandlerInterface
{
    /**
     * @param Command $command
     * @param RepositoryFactoryInterface $rf
     * @return ResponseCommandBus
     */
    public function handle(CommandInterface $command)
    {
        $request = $command->getRequest();
        
        $userProfile = new UserProfile();          
        $userProfile->setAtributtes($request);

        $user = new User();
        $user->setAtributtes($request);
        $userProfile->setUser($user);
        $user->setUserProfile($userProfile);

        $rpUserProfile = $this->get('repositoryFactory')->get('UserProfile');
        $rpUserProfile->persistObject($user);
        return new ResponseCommandBus(200);
    }
}