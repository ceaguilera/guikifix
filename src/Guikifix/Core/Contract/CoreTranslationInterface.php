<?php
namespace Guikifix\Core\Contract;

/**
 * CoreTranslatorInterface
 *
 * La siguiente clase se encarga de traducir los textos 
 * del sistema utilizando el traductor de Symfony
 *
 * @author Freddy Contreras <freddycontreras3@gmail.com>
 */
interface CoreTranslatorInterface
{
    /**
     * Metodo que hace uso del trans del bundle de translator
     * @param  string $code código de la translator
     * @param  string $file tipo de archivo implementado en la traducción
     * @return string       texto de la traducción
     */
    public static function getTranslator($code, $file = 'messages');    
    
    /**
     * Metodo que hace uso del TransChoice del bundle de translator
     * @param  string $code     Codigo de translator
     * @param  interger $n        Identificador de la clave de traducción  '{0} or {1} or {n}
     * @param  array  $paramter Parametros manejados dentro de la traducción
     * @param  string $file     Tipo de archivo implementado en la traducción
     * @return string           texto de la traducción
     */
    public static function getTransChoice($code, $n, $paramter = [], $file = 'messages');    
}