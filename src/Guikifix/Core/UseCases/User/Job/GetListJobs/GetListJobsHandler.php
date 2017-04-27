<?php
namespace Guikifix\Core\UseCases\User\Job\GetListJobs;

use Guikifix\Core\Contract\HandlerBase;
use Guikifix\Core\Services\ResponseCommandBus;
use Guikifix\Core\Contract\CommandInterface;
use Guikifix\Core\Contract\HandlerInterface;

/**
 * Class GetListJobsHandler
 * @package Guikifix\Core\UseCases\User\Job\GetListJobs
 *
 * Manejo del listado de presupuesto
 *
 * @author Joel D. Requena P. <Joel.2005.2@gmail.com>
 * @author Currently Working: Joel D. Requena P.
 */
class GetListJobsHandler extends HandlerBase implements HandlerInterface
{
    /**
     * @param Command $command
     * @param RepositoryFactoryInterface $rf
     * @return ResponseCommandBus
     */
    public function handle(CommandInterface $command)
    {
        $request = $command->getRequest();
        $jobs = $request["user"]->getUserProfile()->getJobs();

        if(!$jobs)
            return new ResponseCommandBus(400, null);
        
        $jobs = $jobs->toArray();

        //iniciando variable respuesta
        $resp = [];
        foreach ($jobs  as $job) {
            $arrJob["id"] = $job->getId();
            $arrJob["title"] = $job->getTitle();
            $arrJob["status"] = $this->getStatus($job->getStatus());
            $arrJob["description"] = $job->getDescription();
            $arrJob["date_created"] = $job->getCreated()->format("d-m-Y h:m A");


            // Busqueda de los documento tipo imagenes y otros.
            $docs = $job->getDocuments();
            $c_doc = 0;
            $c_img = 0;
            foreach ($docs as $doc) {
                
                switch ($doc->getType()) {
                    case 0:
                        $c_img++;
                        break;
                    case 1:
                        $c_doc++;
                        break;
                    
                }
            }
            $arrJob["images"] = $c_img;
            $arrJob["documents"] = $c_doc;


            //Busqueda de los oresupuestos hecho al trabajo.
            $budgets = $job->getBudgets();
            $suggested_professional = null;
            $countMsg = 0;
            foreach ($budgets as $budget) {
                $suggested_professional = $budget->getProfesionalProfile()->getFirstName() . " " .$budget->getProfesionalProfile()->getLastName();
                foreach ($budget->getMessages() as $messages) {
                    //Mensaje no leidos.
                    if ($messages->getStatus() == 0)
                        $countMsg ++; 
                }
                
            }

            $arrJob["suggested_professional"] = $suggested_professional;
            $arrJob["messages"] = $countMsg;
            array_push($resp, $arrJob);
        }

        return new ResponseCommandBus(200,$resp);
    }

    public function getStatus($status){
        switch ($status) {
            case '0':
                $resp = "Temporal";
                break;
            case '1':
                $resp = "Publicado";
                break;
            case '2':
                $resp = "Asignado";
                break;
            case '3':
                $resp = "Finalizado";
                break;
        }

        return $resp;
    }
}