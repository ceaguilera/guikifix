<?php
namespace Guikifix\Core\Domain;

/**
 * Job
 *
 * La clase representa el trabajo buscado por
 * los usuarios en el sistema, donde se da detalle de
 * lo que quiere realizar el usuario en el inmueble
 *
 * @author Freddy Contreras
 */
class Job
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $status;

    /**
     * @var string
     */
    private $phone_contact;

    /**
     * @var boolean
     */
    private $notifications;

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
     * @var \Guikifix\Core\Domain\Location
     */
    private $location;

    /**
     * @var \Guikifix\Core\Domain\Budget
     */
    private $assigned_budget;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $budgets;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $jobs_status_category;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $jobs_types_category;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->budgets = new \Doctrine\Common\Collections\ArrayCollection();
        $this->jobs_status_category = new \Doctrine\Common\Collections\ArrayCollection();
        $this->jobs_types_category = new \Doctrine\Common\Collections\ArrayCollection();
        $this->last_update = new \DateTime();
        $this->created = new \DateTime();
        $this->title = "Default";
        $this->status = 0;
        $this->notifications = false;
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
     * Set title
     *
     * @param string $title
     *
     * @return Job
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Job
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Job
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
     * Set phoneContact
     *
     * @param string $phoneContact
     *
     * @return Job
     */
    public function setPhoneContact($phoneContact)
    {
        $this->phone_contact = $phoneContact;

        return $this;
    }

    /**
     * Get phoneContact
     *
     * @return string
     */
    public function getPhoneContact()
    {
        return $this->phone_contact;
    }

    /**
     * Set notifications
     *
     * @param boolean $notifications
     *
     * @return Job
     */
    public function setNotifications($notifications)
    {
        $this->notifications = $notifications;

        return $this;
    }

    /**
     * Get notifications
     *
     * @return boolean
     */
    public function getNotifications()
    {
        return $this->notifications;
    }

    /**
     * Set lastUpdate
     *
     * @param \DateTime $lastUpdate
     *
     * @return Job
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
     * @return Job
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
     * @return Job
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
     * Set assignedBudget
     *
     * @param \Guikifix\Core\Domain\Budget $assignedBudget
     *
     * @return Job
     */
    public function setAssignedBudget(\Guikifix\Core\Domain\Budget $assignedBudget = null)
    {
        $this->assigned_budget = $assignedBudget;

        return $this;
    }

    /**
     * Get assignedBudget
     *
     * @return \Guikifix\Core\Domain\Budget
     */
    public function getAssignedBudget()
    {
        return $this->assigned_budget;
    }

    /**
     * Add budget
     *
     * @param \Guikifix\Core\Domain\Budget $budget
     *
     * @return Job
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
     * Add jobsStatusCategory
     *
     * @param \Guikifix\Core\Domain\JobStatusCategory $jobsStatusCategory
     *
     * @return Job
     */
    public function addJobsStatusCategory(\Guikifix\Core\Domain\JobStatusCategory $jobsStatusCategory)
    {
        $this->jobs_status_category[] = $jobsStatusCategory;

        return $this;
    }

    /**
     * Remove jobsStatusCategory
     *
     * @param \Guikifix\Core\Domain\JobStatusCategory $jobsStatusCategory
     */
    public function removeJobsStatusCategory(\Guikifix\Core\Domain\JobStatusCategory $jobsStatusCategory)
    {
        $this->jobs_status_category->removeElement($jobsStatusCategory);
    }

    /**
     * Get jobsStatusCategory
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getJobsStatusCategory()
    {
        return $this->jobs_status_category;
    }

    /**
     * Add jobsTypesCategory
     *
     * @param \Guikifix\Core\Domain\JobTypeCategory $jobsTypesCategory
     *
     * @return Job
     */
    public function addJobsTypesCategory(\Guikifix\Core\Domain\JobTypeCategory $jobsTypesCategory)
    {
        $this->jobs_types_category[] = $jobsTypesCategory;

        return $this;
    }

    /**
     * Remove jobsTypesCategory
     *
     * @param \Guikifix\Core\Domain\JobTypeCategory $jobsTypesCategory
     */
    public function removeJobsTypesCategory(\Guikifix\Core\Domain\JobTypeCategory $jobsTypesCategory)
    {
        $this->jobs_types_category->removeElement($jobsTypesCategory);
    }

    /**
     * Get jobsTypesCategory
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getJobsTypesCategory()
    {
        return $this->jobs_types_category;
    }

    /**
     * Set location
     *
     * @param \Guikifix\Core\Domain\Location $location
     *
     * @return Job
     */
    public function setLocation(\Guikifix\Core\Domain\Location $location = null)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return \Guikifix\Core\Domain\Location
     */
    public function getLocation()
    {
        return $this->location;
    }
}
