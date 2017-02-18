<?php
namespace Guikifix\Core\Domain;

/**
 * Qualification
 *
 * La clase representa la calificación dada por un
 * usuario a un trabajo realizado por un profesional
 * 
 * @author  Freddy Contreras
 * 
 */
class Qualification
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $comment;

    /**
     * @var integer
     */
    private $quality;

    /**
     * @var integer
     */
    private $responsability;

    /**
     * @var integer
     */
    private $delivery_time;

    /**
     * @var integer
     */
    private $amiability;

    /**
     * @var integer
     */
    private $cleaning;

    /**
     * @var integer
     */
    private $price;

    /**
     * @var \Guikifix\Core\Domain\Budget
     */
    private $budget;

    /**
     * @var \Guikifix\Core\Domain\UserProfile
     */
    private $user_profile;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Qualification
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set quality
     *
     * @param integer $quality
     *
     * @return Qualification
     */
    public function setQuality($quality)
    {
        $this->quality = $quality;

        return $this;
    }

    /**
     * Get quality
     *
     * @return integer
     */
    public function getQuality()
    {
        return $this->quality;
    }

    /**
     * Set responsability
     *
     * @param integer $responsability
     *
     * @return Qualification
     */
    public function setResponsability($responsability)
    {
        $this->responsability = $responsability;

        return $this;
    }

    /**
     * Get responsability
     *
     * @return integer
     */
    public function getResponsability()
    {
        return $this->responsability;
    }

    /**
     * Set deliveryTime
     *
     * @param integer $deliveryTime
     *
     * @return Qualification
     */
    public function setDeliveryTime($deliveryTime)
    {
        $this->delivery_time = $deliveryTime;

        return $this;
    }

    /**
     * Get deliveryTime
     *
     * @return integer
     */
    public function getDeliveryTime()
    {
        return $this->delivery_time;
    }

    /**
     * Set amiability
     *
     * @param integer $amiability
     *
     * @return Qualification
     */
    public function setAmiability($amiability)
    {
        $this->amiability = $amiability;

        return $this;
    }

    /**
     * Get amiability
     *
     * @return integer
     */
    public function getAmiability()
    {
        return $this->amiability;
    }

    /**
     * Set cleaning
     *
     * @param integer $cleaning
     *
     * @return Qualification
     */
    public function setCleaning($cleaning)
    {
        $this->cleaning = $cleaning;

        return $this;
    }

    /**
     * Get cleaning
     *
     * @return integer
     */
    public function getCleaning()
    {
        return $this->cleaning;
    }

    /**
     * Set price
     *
     * @param integer $price
     *
     * @return Qualification
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set budget
     *
     * @param \Guikifix\Core\Domain\Budget $budget
     *
     * @return Qualification
     */
    public function setBudget(\Guikifix\Core\Domain\Budget $budget = null)
    {
        $this->budget = $budget;

        return $this;
    }

    /**
     * Get budget
     *
     * @return \Guikifix\Core\Domain\Budget
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * Set userProfile
     *
     * @param \Guikifix\Core\Domain\UserProfile $userProfile
     *
     * @return Qualification
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
}
