<?php
namespace Guikifix\Core\Domain;

/**
 * Document
 *
 * Entidad que contiene todos los archivos del sistema
 * imagenes, videos, archivos en distintos formatos
 * contendrá las rutas en el servidor
 *
 * @author  Freddy Contreras
 */
class Document
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $filaname;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $type;

    /**
     * @var \Guikifix\Core\Domain\Job
     */
    private $job;


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
     * Set filaname
     *
     * @param string $filaname
     *
     * @return Document
     */
    public function setFilaname($filaname)
    {
        $this->filaname = $filaname;

        return $this;
    }

    /**
     * Get filaname
     *
     * @return string
     */
    public function getFilaname()
    {
        return $this->filaname;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Document
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
     * Set type
     *
     * @param integer $type
     *
     * @return Document
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set job
     *
     * @param \Guikifix\Core\Domain\Job $job
     *
     * @return Document
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
}
