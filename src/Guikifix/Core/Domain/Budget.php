<?php
namespace Guikifix\Core\Domain;

/**
 * Budget
 *
 * La clase corresponde a los presupuesto realizados
 * por un profesional sobre un trabajo
 * 
 * @author Freddy Contreras
 */
class Budget
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
     * @var boolean
     */
    private $notifications;

    /**
     * @var float
     */
    private $price;

    /**
     * @var \DateTime
     */
    private $last_update;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var \Guikifix\Core\Domain\Qualification
     */
    private $qualification;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $messages;

    /**
     * @var \Guikifix\Core\Domain\Job
     */
    private $job;

    /**
     * @var \Guikifix\Core\Domain\ProfesionalProfile
     */
    private $profesional_profile;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->messages = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Budget
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
     * @return Budget
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
     * @return Budget
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
     * Set notifications
     *
     * @param boolean $notifications
     *
     * @return Budget
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
     * Set price
     *
     * @param float $price
     *
     * @return Budget
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
     * Set lastUpdate
     *
     * @param \DateTime $lastUpdate
     *
     * @return Budget
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
     * @return Budget
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
     * Set qualification
     *
     * @param \Guikifix\Core\Domain\Qualification $qualification
     *
     * @return Budget
     */
    public function setQualification(\Guikifix\Core\Domain\Qualification $qualification = null)
    {
        $this->qualification = $qualification;

        return $this;
    }

    /**
     * Get qualification
     *
     * @return \Guikifix\Core\Domain\Qualification
     */
    public function getQualification()
    {
        return $this->qualification;
    }

    /**
     * Add message
     *
     * @param \Guikifix\Core\Domain\Message $message
     *
     * @return Budget
     */
    public function addMessage(\Guikifix\Core\Domain\Message $message)
    {
        $this->messages[] = $message;

        return $this;
    }

    /**
     * Remove message
     *
     * @param \Guikifix\Core\Domain\Message $message
     */
    public function removeMessage(\Guikifix\Core\Domain\Message $message)
    {
        $this->messages->removeElement($message);
    }

    /**
     * Get messages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * Set job
     *
     * @param \Guikifix\Core\Domain\Job $job
     *
     * @return Budget
     */
    public function setJob(\Guikifix\Core\Domain\Job $job = null)
    {
        $this->job = $job;

        return $this;
    }

    /**
     * Get job
     *
     * @return \Guikifix\Core\Domain\Job
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * Set profesionalProfile
     *
     * @param \Guikifix\Core\Domain\ProfesionalProfile $profesionalProfile
     *
     * @return Budget
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
