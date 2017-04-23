<?php
namespace Guikifix\Core\UseCases\User\Security\UserProfile\GetInfo;

use Guikifix\Core\Contract\HandlerBase;
use Guikifix\Core\Services\ResponseCommandBus;
use Guikifix\Core\Contract\CommandInterface;
use Guikifix\Core\Contract\HandlerInterface;

/**
 * Class GetInfoHandler
 * @package Guikifix\Core\UseCases\User\Security\UserProfile\GetInfo
 *
 * La siguiente clase se encarga de enviar informacion del perfil del usuario
 * Userb12.
 *
 * @author Joel D. Requena P. <Joel.2005.2@gmail.com>
 * @author Currently Working: Joel D. Requena P.
 */
class GetInfoHandler extends HandlerBase implements HandlerInterface
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
        $location = $userProfile->getLocation();

        $resp["photo_profile"] = $userProfile->getPhotoProfile();
        $resp["first_name"] = $userProfile->getFirstName();
        $resp["last_name"] = $userProfile->getLastName();
        $resp["identity_card"] = $userProfile->getIdentityCard();
        $resp["cell_phone"] = $userProfile->getCellPhone();
        $resp["phone"] = $userProfile->getPhone();
        $resp["gender"] = $userProfile->getGender();
        $resp["email"] = $request["user"]->getEmail();
        $resp["nickName"] = $request["user"]->getUserName();

        $resp["birthdate"] = null;
        if($userProfile->getBirthdate()) {
            $date = $userProfile->getBirthdate();
            $resp["birthdate"]["day"] = $date->format("d");
            $resp["birthdate"]["month"] = $date->format("m");
            $resp["birthdate"]["year"] = $date->format("Y");
        }
        
        if ($location) { 
            $resp["city"] = $location->getTitle();
            $resp["municipality"] = $location->getParent()->getTitle();
            $resp["state"] = $location->getParent()->getParent()->getTitle();
        } else {
            $resp["city"] = null;
            $resp["municipality"] = null;
            $resp["state"] = null;
        }

        return new ResponseCommandBus(200, $resp);
    
    }

}