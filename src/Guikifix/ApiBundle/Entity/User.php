<?php
namespace Guikifix\ApiBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Guikifix\Core\Domain\UserProfile;

/**
 * User
 *
 * La clase maneja el modelado de los usuarios dentro del sistema
 * Hereda los metodos de la clase User
 * del bundle FOSUser
 *
 * @author  Freddy Contreras
 */
class User extends BaseUser
{
  
    /**
     * @var string
     */
    private $api_key;

    /**
     * @var integer
     * Tipo de usuario en el sistema
     *     1: usuario 
     *     2: profesional
     */
    private $type_user = 1;
    /**
     * @var \Guikifix\Core\Domain\UserProfile
     */
    private $user_profile;

    /**
     * @var \Guikifix\Core\Domain\ProfesionalProfile
     */
    private $profesional_profile;
    
    /**
     * Función para el manejo de roles dentro del objeto usuario
     * @param Rol $rol 
     */
    public function addRole( $rol )
    {
        switch ($rol) {
            case 1:
                array_push($this->roles, 'ROLE_ADMIN');
                break;
            case 2:
                array_push($this->roles, 'ROLE_USER');
                break;
            
            default:
                array_push($this->roles, 'ANONYMOUS');
                break;
        }
    }

    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Actualiza los atributos de una clase
     * dado un arreglo
     * @param array $data información a actualizar
     */
    public function setAtributtes($data)
    {
        if ($data['password'])
            $this->setPlainPassword($data['password']);

        if ($data['email']) {
            $this->setEmail($data['email']);
            $this->setUsername($data['email']);
        }
    }  

    function dashesToCamelCase($string, $capitalizeFirstCharacter = false) 
        {

            $str = str_replace(' ', '', ucwords(str_replace('_', ' ', $string)));

            if (!$capitalizeFirstCharacter) {
                $str[0] = strtolower($str[0]);
            }

            return $str;
        }

    /**
     * Set typeUser
     *
     * @param integer $typeUser
     *
     * @return User
     */
    public function setTypeUser($typeUser)
    {
        $this->type_user = $typeUser;

        return $this;
    }

    /**
     * Get typeUser
     *
     * @return integer
     */
    public function getTypeUser()
    {
        return $this->type_user;
    }

    /**
     * Set userProfile
     *
     * @param \Guikifix\Core\Domain\UserProfile $userProfile
     *
     * @return User
     */
    public function setUserProfile(\Guikifix\Core\Domain\UserProfile $userProfile = null)
    {
        $this->user_profile = $userProfile;

        return $this;
    }

    /**
     * Get userProfile
     *
     * @return \Guikifix\Core\Domain\UserProfile
     */
    public function getUserProfile()
    {
        return $this->user_profile;
    }

    /**
     * Set profesionalProfile
     *
     * @param \Guikifix\Core\Domain\ProfesionalProfile $profesionalProfile
     *
     * @return User
     */
    public function setProfesionalProfile(\Guikifix\Core\Domain\ProfesionalProfile $profesionalProfile = null)
    {
        $this->profesional_profile = $profesionalProfile;

        return $this;
    }

    /**
     * Get profesionalProfile
     *
     * @return \Guikifix\Core\Domain\ProfesionalProfile
     */
    public function getProfesionalProfile()
    {
        return $this->profesional_profile;
    }

    /**
     * Set apiKey
     *
     * @param string $apiKey
     *
     * @return User
     */
    public function setTypeUser($apiKey)
    {
        $this->api_key = $apiKey;

        return $this;
    }

    /**
     * Get apiKey
     *
     * @return integer
     */
    public function apiKey()
    {
        return $this->api_key;
    }
}
