<?php 

namespace Guikifix\Core\Application\Services;

use Guikifix\Core\Application\Contract\Command;
use Guikifix\Core\Application\Contract\ResponseCommandBus;
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
     * Repository Factory
     * @var RepositoryFactoryInterface
     */
    private $rf;

    /**
     * Constructor de la clase
     */
    public function __construct($rf)
    {
        $this->rf = $rf;
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
    public function execute(Command $command, CoreValidatorInterface $coreValidator)
    {
        $handler = $this->handler($command);
        if($handler!=null)
        {
            //Se valida automaticamente el commando antes de ser ejecutado
            $validation = $coreValidator::getValidator($command);
            if (is_null($validation)) {

                try {
                    return $handler->handle($command, $this->rf);
                } catch (\Exception $e) {
                    return new ResponseCommandBus(
                        500,
                        'Bad Request',
                        [
                            'code' => $e->getCode(),
                            'message' => $e->getMessage(),
                            'file' => $e->getFile(),
                            'line' => $e->getLine()
                        ]
                    );
                }
                
            } else {
                return new ResponseCommandBus(400, $validation);
            }
        }else{
            return new ResponseCommandBus(404);
        }
    }
 
    /**
     * Get the Command Handler
     *
     * @return mixed
     */
    private function handler(Command $command)
    {
        $class = $this->inflect($command);
        if(\class_exists($class)){
            return new $class();
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
    private function inflect(Command $command)
    {
        $commandclass = \get_class($command);
        $handlerclass =str_replace('Command', 'Handler', $commandclass);
        return $handlerclass;
    }
}