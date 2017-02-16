<?php
namespace Guikifix\Core\Domain;

/**
 * ProfesionalProfile
 *
 * La clase representa el perfil del profesional
 * 
 * @author  Freddy Contreras
 */
class ProfesionalProfile
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $first_name;

    /**
     * @var string
     */
    private $last_name;

    /**
     * @var string
     */
    private $cell_phone;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $alternative_phone;

    /**
     * @var string
     */
    private $fax;

    /**
     * @var \DateTime
     */
    private $birthdate;

    /**
     * @var integer
     */
    private $gender;

    /**
     * @var \DateTime
     */
    private $last_update;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var \Guikifix\ApiBundle\Entity\User
     */
    private $user;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $budgets;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $profesional_plans;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->budgets = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set firstName
     *
     * @param string $firstName
     *
     * @return ProfesionalProfile
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return ProfesionalProfile
     */
    public function setLastName($lastName)
    {
        $this->last_name = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set cellPhone
     *
     * @param string $cellPhone
     *
     * @return ProfesionalProfile
     */
    public function setCellPhone($cellPhone)
    {
        $this->cell_phone = $cellPhone;

        return $this;
    }

    /**
     * Get cellPhone
     *
     * @return string
     */
    public function getCellPhone()
    {
        return $this->cell_phone;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return ProfesionalProfile
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set alternativePhone
     *
     * @param string $alternativePhone
     *
     * @return ProfesionalProfile
     */
    public function setAlternativePhone($alternativePhone)
    {
        $this->alternative_phone = $alternativePhone;

        return $this;
    }

    /**
     * Get alternativePhone
     *
     * @return string
     */
    public function getAlternativePhone()
    {
        return $this->alternative_phone;
    }

    /**
     * Set fax
     *
     * @param string $fax
     *
     * @return ProfesionalProfile
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set birthdate
     *
     * @param \DateTime $birthdate
     *
     * @return ProfesionalProfile
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get birthdate
     *
     * @return \DateTime
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set gender
     *
     * @param integer $gender
     *
     * @return ProfesionalProfile
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return integer
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set lastUpdate
     *
     * @param \DateTime $lastUpdate
     *
     * @return ProfesionalProfile
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
     * @return ProfesionalProfile
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
     * Set user
     *
     * @param \Guikifix\ApiBundle\Entity\User $user
     *
     * @return ProfesionalProfile
     */
    public function setUser(\Guikifix\ApiBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Guikifix\ApiBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add budget
     *
     * @param \Guikifix\Core\Domain\Budget $budget
     *
     * @return ProfesionalProfile
     */
    public function addBudget(\Guikifix\Core\Domain\Budget $budget)
    {
        $this->budgets[] = $budget;

        return $this;
    }

    /**
     * Remove budget
     *
     * @param \Guikifix\Core\Domain\Budget $budget
     */
    public function removeBudget(\Guikifix\Core\Domain\Budget $budget)
    {
        $this->budgets->removeElement($budget);
    }

    /**
     * Get budgets
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBudgets()
    {
        return $this->budgets;
    }

    /**
     * Add profesionalPlan
     *
     * @param \Guikifix\Core\Domain\ProfesionalPlan $profesionalPlan
     *
     * @return ProfesionalProfile
     */
    public function addProfesionalPlan(\Guikifix\Core\Domain\ProfesionalPlan $profesionalPlan)
    {
        $this->profesional_plans[] = $profesionalPlan;

        return $this;
    }

    /**
     * Remove profesionalPlan
     *
     * @param \Guikifix\Core\Domain\ProfesionalPlan $profesionalPlan
     */
    public function removeProfesionalPlan(\Guikifix\Core\Domain\ProfesionalPlan $profesionalPlan)
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
