<?php
namespace Guikifix\Core\UseCases\User\Security\UserProfile\GetInfo;

use Guikifix\Core\Contract\CommandBase;
use Guikifix\Core\Contract\CommandInterface;

/**
 * Class GetInfoCommand
 * @package Guikifix\Core\UseCases\User\Security\UserProfile\GetInfo
 *
 * La siguiente clase se encarga de enviar informacion del perfil del usuario
 * Userb12.
 *
 * @author Joel D. Requena P. <Joel.2005.2@gmail.com>
 * @author Currently Working: Joel D. Requena P.
 */
class GetInfoCommand extends CommandBase implements CommandInterface 
{
    /**
     * Objeto User
     * @var string
     */
    public $user;
}