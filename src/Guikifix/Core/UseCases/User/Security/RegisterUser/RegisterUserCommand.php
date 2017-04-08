<?php
namespace Guikifix\Core\UseCases\User\Security\RegisterUser;

use Guikifix\Core\Contract\CommandBase;
use Guikifix\Core\Contract\CommandInterface;

/**
 * Class GetJobTypeCategoriesCommand
 * @package Guikifix\Core\UseCases\User\GetJobTypeCategories
 *
 * El siguiente caso de uso registro a un usuario 
 * para tener una sesión dentro del sistema
 * y poder realizar solicutedes de trabajo.
 *
 * @author Freddy Contreras
 */
class RegisterUserCommand extends CommandBase implements CommandInterface 
{

    /**
     * Correo del usuario a registrar
     * @var email
     */
    protected $email;

    /**
     * Nombre 
     * @var string
     */
    protected $first_name;

    /**
     * Apellido
     * @var string
     */
    protected $last_name;

    /**
     * Teléfono celular
     * @var string
     */
    protected $cell_phone;

    /**
     * Contraseña
     * @var string
     */
    public $password;

    /**
     * Confirmación de contraseña
     * @var string
     */
    public $confirmation_password;

    /**
     * Como nos contactaste
     * @var string
     */
    protected $how_contact_us;

    /**
     * Codigo Referido
     * @var string
     */
    protected $core_refered;
}