<?php
namespace Guikifix\Core\Contract;

/**
 * CoreValidator
 * 
 * La siguiente clase uso de validadores de clases
 * que se implementan en Symfony
 *
 * @author Freddy Contreras <freddycontreras3@gmail.com>
 */
interface CoreValidatorInterface
{
    /**
     * Método que permite validar un objeto
     * 
     * @param  string $obj     objecto a validar
     * @param  string $critery criterio de validación
     * @return mixed           retonra la validación
     */
    public static function getValidator($obj, $critery = null);    
}