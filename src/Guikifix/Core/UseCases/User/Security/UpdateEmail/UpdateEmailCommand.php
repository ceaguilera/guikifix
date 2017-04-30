<?php
namespace Guikifix\Core\UseCases\User\Security\UpdateEmail;

use Guikifix\Core\Contract\CommandBase;
use Guikifix\Core\Contract\CommandInterface;

/**
 * Class UpdateEmailCommand
 * @package Guikifix\Core\UseCases\User\Security\UpdateEmail
 *
 * La siguiente clase se encarga de actualizar la contraseña del usuario.
 *
 * @author Joel D. Requena P. <Joel.2005.2@gmail.com>
 * @author Currently Working: Joel D. Requena P.
 */
class UpdateEmailCommand extends CommandBase implements CommandInterface 
{
    /**
     * Email
     * @var string
     */
    public $email;

    /**
     * Objeto User
     * @var string
     */
    public $user;
}