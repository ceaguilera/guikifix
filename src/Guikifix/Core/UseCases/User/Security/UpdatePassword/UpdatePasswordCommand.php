<?php
namespace Guikifix\Core\UseCases\User\Security\UpdatePassword;

use Guikifix\Core\Contract\CommandBase;
use Guikifix\Core\Contract\CommandInterface;

/**
 * Class UpdatePasswordCommand
 * @package Guikifix\Core\UseCases\User\Security\UpdatePassword
 *
 * La siguiente clase se encarga de actualizar la contraseña del usuario.
 *
 * @author Joel D. Requena P. <Joel.2005.2@gmail.com>
 * @author Currently Working: Joel D. Requena P.
 */
class UpdatePasswordCommand extends CommandBase implements CommandInterface 
{
    /**
     * Contraseña
     * @var string
     */
    public $pass;

    /**
     * Confirmacion de la contraseña
     * @var string
     */
    public $confirm_pass;

    /**
     * Objeto User
     * @var string
     */
    public $user;
}