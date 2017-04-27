<?php
namespace Guikifix\Core\UseCases\User\Job\GetListJobs;

use Guikifix\Core\Contract\CommandBase;
use Guikifix\Core\Contract\CommandInterface;

/**
 * Class GetListJobsCommand
 * @package Guikifix\Core\UseCases\User\Job\GetListJobs
 *
 * Manejo del listado de presupuesto
 *
 * @author Joel D. Requena P. <Joel.2005.2@gmail.com>
 * @author Currently Working: Joel D. Requena P.
 */
class GetListJobsCommand extends CommandBase implements CommandInterface
{

    /**
     * Objeto User
     * @var string
     */
    public $user;

 }