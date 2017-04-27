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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $msg_transmiter;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $msg_receiver;

    

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
     * Add msgTransmiter
     *
     * @param \Guikifix\Core\Domain\Message $msgTransmiter
     *
     * @return User
     */
    public function addMsgTransmiter(\Guikifix\Core\Domain\Message $msgTransmiter)
    {
        $this->msg_transmiter[] = $msgTransmiter;

        return $this;
    }

    /**
     * Remove msgTransmiter
     *
     * @param \Guikifix\Core\Domain\Message $msgTransmiter
     */
    public function removeMsgTransmiter(\Guikifix\Core\Domain\Message $msgTransmiter)
    {
        $this->msg_transmiter->removeElement($msgTransmiter);
    }

    /**
     * Get msgTransmiter
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMsgTransmiter()
    {
        return $this->msg_transmiter;
    }

    /**
     * Add msgReceiver
     *
     * @param \Guikifix\Core\Domain\Message $msgReceiver
     *
     * @return User
     */
    public function addMsgReceiver(\Guikifix\Core\Domain\Message $msgReceiver)
    {
        $this->msg_receiver[] = $msgReceiver;

        return $this;
    }

    /**
     * Remove msgReceiver
     *
     * @param \Guikifix\Core\Domain\Message $msgReceiver
     */
    public function removeMsgReceiver(\Guikifix\Core\Domain\Message $msgReceiver)
    {
        $this->msg_receiver->removeElement($msgReceiver);
    }

    /**
     * Get msgReceiver
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMsgReceiver()
    {
        return $this->msg_receiver;
    }
}
