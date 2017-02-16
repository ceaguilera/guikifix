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
}
