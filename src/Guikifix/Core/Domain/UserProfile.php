<?php
namespace Guikifix\Core\Domain;

use Guikifix\Core\Domain\BaseEntity;
/**
 * UserProfile
 *
 * La entidad representa el perfil del usuario
 * 
 * @author  Freddy Contreras
 */
class UserProfile extends BaseEntity
{

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $first_name;

    /**
     * @var string
     */
    protected $last_name;

    /**
     * @var string
     */
    protected $cell_phone;

    /**
     * @var string
     */
    protected $phone;

    /**
     * @var \DateTime
     */
    protected $birthdate;

    /**
     * @var integer
     */
    protected $gender;

    /**
     * @var \DateTime
     */
    protected $last_update;

    /**
     * @var \DateTime
     */
    protected $created;

    /**
     * @var string
     */
    protected $how_contact_us;

    /**
     * @var string
     */
    protected $core_refered;

    /**
     * @var \Guikifix\ApiBundle\Entity\User
     */
    protected $user;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $jobs;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $qualifications;

    /**
     * @var \Guikifix\Core\Domain\Location
     */
    protected $location;    

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->jobs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->qualifications = new \Doctrine\Common\Collections\ArrayCollection();
        $this->last_update = new \DateTime();
        $this->created = new \DateTime();
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
     * @return UserProfile
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
     * @return UserProfile
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
     * @return UserProfile
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
     * @return UserProfile
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
     * Set birthdate
     *
     * @param \DateTime $birthdate
     *
     * @return UserProfile
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
     * @return UserProfile
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
     * @return UserProfile
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
     * @return UserProfile
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
     * @return UserProfile
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
     * Add job
     *
     * @param \Guikifix\Core\Domain\Job $job
     *
     * @return UserProfile
     */
    public function addJob(\Guikifix\Core\Domain\Job $job)
    {
        $this->jobs[] = $job;

        return $this;
    }

    /**
     * Remove job
     *
     * @param \Guikifix\Core\Domain\Job $job
     */
    public function removeJob(\Guikifix\Core\Domain\Job $job)
    {
        $this->jobs->removeElement($job);
    }

    /**
     * Get jobs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getJobs()
    {
        return $this->jobs;
    }

    /**
     * Add qualification
     *
     * @param \Guikifix\Core\Domain\Qualification $qualification
     *
     * @return UserProfile
     */
    public function addQualification(\Guikifix\Core\Domain\Qualification $qualification)
    {
        $this->qualifications[] = $qualification;

        return $this;
    }

    /**
     * Remove qualification
     *
     * @param \Guikifix\Core\Domain\Qualification $qualification
     */
    public function removeQualification(\Guikifix\Core\Domain\Qualification $qualification)
    {
        $this->qualifications->removeElement($qualification);
    }

    /**
     * Get qualifications
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQualifications()
    {
        return $this->qualifications;
    }

    /**
     * Set location
     *
     * @param \Guikifix\Core\Domain\Location $location
     *
     * @return UserProfile
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

    /**
     * Set howContactUs
     *
     * @param string $howContactUs
     *
     * @return UserProfile
     */
    public function setHowContactUs($howContactUs)
    {
        $this->how_contact_us = $howContactUs;

        return $this;
    }

    /**
     * Get howContactUs
     *
     * @return string
     */
    public function getHowContactUs()
    {
        return $this->how_contact_us;
    }

    /**
     * Set coreRefered
     *
     * @param string $coreRefered
     *
     * @return UserProfile
     */
    public function setCoreRefered($coreRefered)
    {
        $this->core_refered = $coreRefered;

        return $this;
    }

    /**
     * Get coreRefered
     *
     * @return string
     */
    public function getCoreRefered()
    {
        return $this->core_refered;
    }
}
