<?php
namespace Guikifix\ApiBundle\Services;

use Guikifix\Core\Contract\CoreValidatorInterface;
use Guikifix\Core\Contract\CoreTranslator;

/**
 * CoreValidator
 * 
 * La siguiente clase uso de validadores de clases
 * que se implementan en Symfony
 *
 * @author Freddy Contreras <freddycontreras3@gmail.com>
 */
class CoreValidator implements CoreValidatorInterface
{
    /**
     * Método que permite validar un objeto
     * 
     * @param  string $obj     objecto a validar
     * @param  string $critery criterio de validación
     * @return mixed           retonra la validación
     */
    public static function getValidator($obj, $critery = null)
    {
        global $kernel;
        $error = $kernel->getContainer()->get('validator')->validate($obj, $critery);

        if (count($error) > 0) {
            
            $response = []; 
            foreach ($error as $currentError) {
                $response[] = [
                    'message' => $currentError->getMessage(),
                    'value' => $currentError->getInvalidValue(),
                    'parameter' => $currentError->getPropertyPath()
                ];
            }            

            return $response;
        }

        return null;
    }
}