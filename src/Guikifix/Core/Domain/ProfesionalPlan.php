<?php
namespace Guikifix\Core\Domain;

/**
 * ProfesionalPlan
 *
 * La clase representa un historico del planes
 * asociados a un profesional
 * 
 * @author  Freddy Contreras
 */
class ProfesionalPlan
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $renovation_date;

    /**
     * @var integer
     */
    private $status;

    /**
     * @var integer
     */
    private $credit;

    /**
     * @var \DateTime
     */
    private $last_update;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var \Guikifix\Core\Domain\ProfesionalPlan
     */
    private $parent;

    /**
     * @var \Guikifix\Core\Domain\ProfesionalProfile
     */
    private $profesional_profile;


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
     * Set renovationDate
     *
     * @param \DateTime $renovationDate
     *
     * @return ProfesionalPlan
     */
    public function setRenovationDate($renovationDate)
    {
        $this->renovation_date = $renovationDate;

        return $this;
    }

    /**
     * Get renovationDate
     *
     * @return \DateTime
     */
    public function getRenovationDate()
    {
        return $this->renovation_date;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return ProfesionalPlan
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set credit
     *
     * @param integer $credit
     *
     * @return ProfesionalPlan
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
     * Set lastUpdate
     *
     * @param \DateTime $lastUpdate
     *
     * @return ProfesionalPlan
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
     * @return ProfesionalPlan
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
     * Set parent
     *
     * @param \Guikifix\Core\Domain\ProfesionalPlan $parent
     *
     * @return ProfesionalPlan
     */
    public function setParent(\Guikifix\Core\Domain\ProfesionalPlan $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \Guikifix\Core\Domain\ProfesionalPlan
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set profesionalProfile
     *
     * @param \Guikifix\Core\Domain\ProfesionalProfile $profesionalProfile
     *
     * @return ProfesionalPlan
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
