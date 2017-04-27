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
        $user->setEnabled(true);
        $user->setAtributtes($request);
        $userProfile->setUser($user);
        $user->setUserProfile($userProfile);

        $rpUserProfile = $this->get('repositoryFactory')->get('UserProfile');
        try {
            $rpUserProfile->persistObject($user);
            $this->sendEmail($userProfile);
        } catch (\Exception $e) {
            return new ResponseCommandBus(500, $e->getMessage());
        }

        return new ResponseCommandBus(200);
    }

    /**
     * En la siguiente función de procesan los correos que se enviarán
     * cuando un usuario se registra al sisstema
     * @param  UserProfile $userProfile el perfil del usuario que sse registrará
     */
    private function sendEmail($userProfile)
    {
        
        $emailService = $this->container->get('EmailService');

        $emailService->setViewRender('GuikifixApiBundle:Email:userc7.html.twig');
        $emailService->setViewParameters(['userProfile' => $userProfile]);
        $emailService->setRecipients([$userProfile->getUser()->getEmail()]);
        $emailService->sendEmail();
    }
}