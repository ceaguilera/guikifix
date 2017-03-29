<?php
namespace Guikifix\Core\Domain;

/**
 * Location
 *
 * La clase representa un arbol que contiene las
 * localidades del sistema
 *
 * @author  Freddy Contreras
 */
class Location
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
     * @var integer
     */
    private $lvl;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $children;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $users_profile;

    /**
     * @var \Guikifix\Core\Domain\Location
     */
    private $parent;

    /**
     * @var \Guikifix\Core\Domain\Location
     */
    private $root;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
        $this->users_profile = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Location
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
     * Set lvl
     *
     * @param integer $lvl
     *
     * @return Location
     */
    public function setLvl($lvl)
    {
        $this->lvl = $lvl;

        return $this;
    }

    /**
     * Get lvl
     *
     * @return integer
     */
    public function getLvl()
    {
        return $this->lvl;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Location
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Add child
     *
     * @param \Guikifix\Core\Domain\Location $child
     *
     * @return Location
     */
    public function addChild(\Guikifix\Core\Domain\Location $child)
    {
        $this->children[] = $child;

        return $this;
    }

    /**
     * Remove child
     *
     * @param \Guikifix\Core\Domain\Location $child
     */
    public function removeChild(\Guikifix\Core\Domain\Location $child)
    {
        $this->children->removeElement($child);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Add usersProfile
     *
     * @param \Guikifix\Core\Domain\UserProfile $usersProfile
     *
     * @return Location
     */
    public function addUsersProfile(\Guikifix\Core\Domain\UserProfile $usersProfile)
    {
        $this->users_profile[] = $usersProfile;

        return $this;
    }

    /**
     * Remove usersProfile
     *
     * @param \Guikifix\Core\Domain\UserProfile $usersProfile
     */
    public function removeUsersProfile(\Guikifix\Core\Domain\UserProfile $usersProfile)
    {
        $this->users_profile->removeElement($usersProfile);
    }

    /**
     * Get usersProfile
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsersProfile()
    {
        return $this->users_profile;
    }

    /**
     * Set parent
     *
     * @param \Guikifix\Core\Domain\Location $parent
     *
     * @return Location
     */
    public function setParent(\Guikifix\Core\Domain\Location $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \Guikifix\Core\Domain\Location
     */
    public function getParent()
    {
        return $this->parent;
    }


    /**
     * Set root
     *
     * @param \Guikifix\Core\Domain\Location $root
     *
     * @return Location
     */
    public function setRoot(\Guikifix\Core\Domain\Location $root = null)
    {
        $this->root = $root;

        return $this;
    }

    /**
     * Get root
     *
     * @return \Guikifix\Core\Domain\Location
     */
    public function getRoot()
    {
        return $this->root;
    }
}
