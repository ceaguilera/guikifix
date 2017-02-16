<?php
namespace Guikifix\Core\Domain;

/**
 * Plan
 *
 * La clase representa los posibles planes dentro
 * del sistema donde se afilian los profesionales
 *
 * @author  Freddy Contreras
 */
class Plan
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $credit;

    /**
     * @var float
     */
    private $price;

    /**
     * @var boolean
     */
    private $access_contact;

    /**
     * @var boolean
     */
    private $rating;

    /**
     * @var boolean
     */
    private $publish_contact;

    /**
     * @var boolean
     */
    private $web;

    /**
     * @var boolean
     */
    private $publicidad;

    /**
     * @var \DateTime
     */
    private $last_update;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $profesional_plans;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->profesional_plans = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set name
     *
     * @param string $name
     *
     * @return Plan
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set credit
     *
     * @param integer $credit
     *
     * @return Plan
     */
    public function setCredit($credit)
    {
        $this->credit = $credit;

        return $this;
    }

    /**
     * Get credit
     *
     * @return integer
     */
    public function getCredit()
    {
        return $this->credit;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return Plan
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set accessContact
     *
     * @param boolean $accessContact
     *
     * @return Plan
     */
    public function setAccessContact($accessContact)
    {
        $this->access_contact = $accessContact;

        return $this;
    }

    /**
     * Get accessContact
     *
     * @return boolean
     */
    public function getAccessContact()
    {
        return $this->access_contact;
    }

    /**
     * Set rating
     *
     * @param boolean $rating
     *
     * @return Plan
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating
     *
     * @return boolean
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set publishContact
     *
     * @param boolean $publishContact
     *
     * @return Plan
     */
    public function setPublishContact($publishContact)
    {
        $this->publish_contact = $publishContact;

        return $this;
    }

    /**
     * Get publishContact
     *
     * @return boolean
     */
    public function getPublishContact()
    {
        return $this->publish_contact;
    }

    /**
     * Set web
     *
     * @param boolean $web
     *
     * @return Plan
     */
    public function setWeb($web)
    {
        $this->web = $web;

        return $this;
    }

    /**
     * Get web
     *
     * @return boolean
     */
    public function getWeb()
    {
        return $this->web;
    }

    /**
     * Set publicidad
     *
     * @param boolean $publicidad
     *
     * @return Plan
     */
    public function setPublicidad($publicidad)
    {
        $this->publicidad = $publicidad;

        return $this;
    }

    /**
     * Get publicidad
     *
     * @return boolean
     */
    public function getPublicidad()
    {
        return $this->publicidad;
    }

    /**
     * Set lastUpdate
     *
     * @param \DateTime $lastUpdate
     *
     * @return Plan
     */
    public function setLastUpdate($lastUpdate)
    {
        $this->last_update = $lastUpdate;

        return $this;
    }

    /**
     * Get lastUpdate
     *
     * @return \DateTime
     */
    public function getLastUpdate()
    {
        return $this->last_update;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Plan
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Add profesionalPlan
     *
     * @param \Guikifix\Core\Domain\Plan $profesionalPlan
     *
     * @return Plan
     */
    public function addProfesionalPlan(\Guikifix\Core\Domain\Plan $profesionalPlan)
    {
        $this->profesional_plans[] = $profesionalPlan;

        return $this;
    }

    /**
     * Remove profesionalPlan
     *
     * @param \Guikifix\Core\Domain\Plan $profesionalPlan
     */
    public function removeProfesionalPlan(\Guikifix\Core\Domain\Plan $profesionalPlan)
    {
        $this->profesional_plans->removeElement($profesionalPlan);
    }

    /**
     * Get profesionalPlans
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProfesionalPlans()
    {
        return $this->profesional_plans;
    }
}
