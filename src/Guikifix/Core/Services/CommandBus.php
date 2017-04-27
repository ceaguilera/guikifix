<?php 

namespace Guikifix\Core\Services;

use Guikifix\Core\Contract\CommandInterface;
use Guikifix\Core\Services\ResponseCommandBus;
use Guikifix\Core\Contract\CoreValidatorInterface;

/**
 * CommandBus
 *
 * La siguiente función se encarga de ejecutar un caso de uso
 * Asocia un caso de Command con un Handle 
 * 
 * @author Freddy Contreras <freddycontreras3@gmail.com>
 * 
 */
class CommandBus
{
    /**
     * CoreValidator
     * @var CoreValidator
     */
    private $cv;

    private $container;

    /**
     * Constructor de la clase
     */
    public function __construct($cv, $container)
    {
        $this->cv = $cv;
        $this->container = $container;
    }

    /**
     * Execute a Command by passing it to a Handler
     *
     * @param Command $command
     * @param  CoreValidatorInterface $[name] [<description>]
     * @return void
     */
    
    /**
     * Ejecuta el caso de uso combinando el Handler y Commnad
     * 
     * @param  CommandInterface        $command      Objeto de tipo Command
     * @param  CoreValidatorInterface $coreValidator Objeto validador de Command
     * @return array                                 arreglo de repuesta del Caso de Uso
     */
    public function execute(CommandInterface $command)
    {
        $handler = $this->handler($command);
        if($handler!=null)
        {
            //Se valida automaticamente el commando antes de ser ejecutado
            $validation = $this->cv::getValidator($command);
            if (is_null($validation)) {
                $response = $handler->handle($command);

                // Si el caso de uso de ejecuto sin problema
                if ($response->getStatusCode() == 200 or $response->getStatusCode() == 201) {
                    global $kernel;
                    $container = $kernel->getContainer();
                    $pedingEntities = $container->get('doctrine.orm.entity_manager')
                        ->getUnitOfWork()->getScheduledEntityInsertions();
                    // Buscamos persistencias de objectos en la BD
                    if ($pedingEntities) {
                        $errors  = [];
                        foreach ($pedingEntities as $currentEntity) {
                            $auxError = $this->cv::getValidator($currentEntity);
                            if (count($auxError) > 0)
                                $errors = array_merge($errors, $auxError);
                        }

                        if ($errors)
                            return new ResponseCommandBus(400, $errors);
                        else {
                            // Ultima validación de consistencia en la BD
                            try {
                                $container->get('doctrine.orm.entity_manager')->flush();
                            } catch (\Exception $e) {
                                return new ResponseCommandBus(500,'Error perist DB');
                            }
                        }
                    }
                }
                return $response;
                
            } else {
                return new ResponseCommandBus(400, $validation);
            }
        }else{
            return new ResponseCommandBus(404,'asda');
        }
    }
 
    /**
     * Get the Command Handler
     *
     * @return mixed
     */
    private function handler(CommandInterface $command)
    {
        $class = $this->inflect($command);
        if(\class_exists($class)){
            return new $class($this->container);
        }else{
            return null;
        }
    }

    /**
     * Encuentra un Manejador para un comando reemplazando 'Command' por 'Handler'
     *
     * @param Command $command
     * @return string
     */
    private function inflect(CommandInterface $command)
    {
        $commandclass = \get_class($command);
        $handlerclass =str_replace('Command', 'Handler', $commandclass);
        return $handlerclass;
    }
}