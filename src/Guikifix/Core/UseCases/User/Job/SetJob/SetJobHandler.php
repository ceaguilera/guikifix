<?php
namespace Guikifix\Core\UseCases\User\Job\SetJob;

use Guikifix\Core\Contract\HandlerBase;
use Guikifix\Core\Services\ResponseCommandBus;
use Guikifix\Core\Contract\CommandInterface;
use Guikifix\Core\Contract\HandlerInterface;
use Guikifix\Core\Domain\Job;

/**
 * Class SetJobHandler
 * @package Guikifix\Core\UseCases\User\Job\SetJob
 *
 * Manejo de la persistencia de un presupuesto
 *
 * @author Joel D. Requena P. <Joel.2005.2@gmail.com>
 * @author Currently Working: Joel D. Requena P.
 */
class SetJobHandler extends HandlerBase implements HandlerInterface
{
    /**
     * @param Command $command
     * @param RepositoryFactoryInterface $rf
     * @return ResponseCommandBus
     */
    public function handle(CommandInterface $command)
    {
        $request = $command->getRequest();

        $job = new Job();          
        $job->setDescription($request["job_description"]);

        $rpJobType = $this->get('repositoryFactory')->get('JobTypeCategory');   
        $rpJobStatus = $this->get('repositoryFactory')->get('JobStatusCategory'); 
        $rpLocation = $this->get('repositoryFactory')->get('Location');        

        foreach ($request["type_element"] as $jobType) {

            if (!$jobType)
                continue;

            if (!is_array($jobType)) {
                $objJobType = $rpJobType->find($jobType);
                $job->addJobsTypesCategory($objJobType);
                $objJobType->addJobsType($job);
                $rpJobType->persistObject($job);
            } else {

                foreach ($jobType as $subJobType) {
                    $objJobType = $rpJobType->find($subJobType);
                    $job->addJobsTypesCategory($objJobType);
                    $objJobType->addJobsType($job);
                    $rpJobType->persistObject($job);
                }
            }

        }

        foreach ($request["job_status"] as $jobStatus) {

            if (!$jobStatus)
                continue;

            if (!is_array($jobStatus)) {
                $objJobStatus = $rpJobStatus->find($jobStatus);
                $job->addJobsStatusCategory($objJobStatus);
                $objJobStatus->addJobsStatus($job);
                $rpJobStatus->persistObject($job);
            } else {

                foreach ($jobStatus as $subJobStatus) {
                    $objJobStatus = $rpJobStatus->find($subJobStatus);
                    $job->addJobsStatusCategory($objJobStatus);
                    $objJobStatus->addJobsStatus($job);
                    $rpJobStatus->persistObject($job);
                }
            }

        }
        
        $objLocation = $rpLocation->find($request["location"]);
        $objLocation->addJob($job);
        $job->setLocation($objLocation);

        return new ResponseCommandBus(200,true);
    }
}