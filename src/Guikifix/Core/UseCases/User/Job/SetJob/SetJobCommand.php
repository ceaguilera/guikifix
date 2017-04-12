<?php
namespace Guikifix\Core\UseCases\User\Job\SetJob;

use Guikifix\Core\Contract\CommandBase;
use Guikifix\Core\Contract\CommandInterface;

/**
 * Class SetJobCommand
 * @package Guikifix\Core\UseCases\User\Job\SetJob
 *
 * Manejo de la persistencia de un presupuesto
 *
 * @author Joel D. Requena P. <Joel.2005.2@gmail.com>
 * @author Currently Working: Joel D. Requena P.
 */
class SetJobCommand extends CommandBase implements CommandInterface
{

    /**
     * Array de id para JobType
     * @var type_element
     */
    protected $type_element;
    /**
     * Descricción del presupuesto
     * @var job_description
     */
    protected $job_description;
    /**
     * Array de id para JobStatus
     * @var job_status
     */
    protected $job_status;
    /**
     * Id de la localidad, Municipio.
     * @var location
     */
    protected $location;

 }