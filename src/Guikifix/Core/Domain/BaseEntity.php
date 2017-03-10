<?php
namespace Guikifix\Core\Domain;

/**
 * BaseEntity
 *
 * La clase representa el comportamiento (metodos o funciones)
 * común entre todas las entidades 
 * 
 * @author Freddy Contreras
 */
class BaseEntity
{
    /**
     * Actualiza los atributos de una clase
     * dado un arreglo
     * @param array $data información a actualizar
     */
    public function setAtributtes($data)
    {
        if (is_array($data)) {
            foreach($data as $att => $val) {
                //if (isset($this->$att))
                    $this->$att = $val;
            }
            return true;
        }
        return false;
    }  
}
