<?php
namespace Guikifix\Core\UseCases\User\Security\UserProfile\SetInfo;

use Guikifix\Core\Contract\CommandBase;
use Guikifix\Core\Contract\CommandInterface;

/**
 * Class SetInfoCommand
 * @package Guikifix\Core\UseCases\User\Security\UserProfile\SetInfo
 *
 * La siguiente clase se encarga de guardar informacion del perfil del usuario
 * Userb12.
 *
 * @author Joel D. Requena P. <Joel.2005.2@gmail.com>
 * @author Currently Working: Joel D. Requena P.
 */
class SetInfoCommand extends CommandBase implements CommandInterface 
{
    /**
     * Objeto User
     * @var string
     */
    public $user;

    /**
     * Nombre del usuario
     * @var string
     */
    public $first_name;

    /**
     * Apellido del usuario
     * @var string
     */
    public $last_name;

    /**
     * Cedula del usuario
     * @var string
     */
    public $identity_card;

    /**
     * Celular del usuario
     * @var string
     */
    public $cell_phone;

    /**
     * Telefono del usuario
     * @var string
     */
    public $phone;

    /**
     * Genero del usuario
     * @var string
     */
    public $gender;

    /**
     * Fecha de cumpleaños del usuario
     * @var string
     */
    public $birthdate;

    /**
     * Id de la parroquia del usuario
     * @var string
     */
    public $city;
}