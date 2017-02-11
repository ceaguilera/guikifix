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
            $response = array(); 
            $locale = $this->container->get('session')->get('_locale');
            $translator = new CoreTranslator();

            for ($i = 0; $i < count($error); $i++) {
                $message = explode( ',',$error[$i]->getMessage());
                $value = preg_replace('/[^A-Za-z0-9\-]/', '', $message[1]);

                // Pasar camel_case a camelCase
                $propertyPath = str_replace('_', ' ', $error[$i]->getPropertyPath());
                $propertyPath = lcfirst(ucwords($propertyPath));
                $propertyPath = str_replace(' ', '', $propertyPath);

                // Guardar en el array de respuesta
                array_push(
                    $response,[
                        "message" => $translator->getTranslator($message[0]),
                        "value" => $value,
                        "parameter" => $propertyPath
                    ]
                );
            }

            return $response;
        }

        return null;
    }
}