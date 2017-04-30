<?php
namespace Guikifix\Core\UseCases\User\Security\UserProfile\SetInfo;

use Guikifix\Core\Contract\HandlerBase;
use Guikifix\Core\Services\ResponseCommandBus;
use Guikifix\Core\Contract\CommandInterface;
use Guikifix\Core\Contract\HandlerInterface;

/**
 * Class SetInfoHandler
 * @package Guikifix\Core\UseCases\User\Security\UserProfile\SetInfo
 *
 * La siguiente clase se encarga de guardar informacion del perfil del usuario
 * Userb12.
 *
 * @author Joel D. Requena P. <Joel.2005.2@gmail.com>
 * @author Currently Working: Joel D. Requena P.
 */
class SetInfoHandler extends HandlerBase implements HandlerInterface
{
    /**
     * @param Command $command
     * @param RepositoryFactoryInterface $rf
     * @return ResponseCommandBus
     */
    public function handle(CommandInterface $command)
    {
        $request = $command->getRequest();
        
        $userProfile = $request["user"]->getUserProfile();
        $userProfile->setFirstName($request["first_name"]);
        $userProfile->setLastName($request["last_name"]);
        $userProfile->setIdentityCard($request["identity_card"]);
        $userProfile->setCellPhone($request["cell_phone"]);
        $userProfile->setPhone($request["phone"]);
        $userProfile->setBirthdate(new \DateTime($request["birthdate"]));
        $userProfile->setGender($request["gender"]);


        global $kernel;
        $container = $kernel->getContainer();

        $rpUserProfile = $this->get('repositoryFactory')->get('UserProfile');
        $rpUserProfile->persistObject($userProfile);
        $container->get('doctrine.orm.entity_manager')->flush();
        //city

        return new ResponseCommandBus(200, true);
    
    }

}