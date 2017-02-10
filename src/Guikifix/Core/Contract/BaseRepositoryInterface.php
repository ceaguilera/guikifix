<?php
namespace Guikifix\Core\Contract;

/**
 * La clase repositorio obtiene funciones base
 * para el manejo de repositorios
 *
 * Esta clase hace que los repositorios imiten el comportamiento de 
 * los repositorios de Symfony
 * 
 * @author Freddy Contreras
 */
interface BaseRepositoryInterface
{
    /**
     * Encuentra un conjunto de elementos dado una clase
     * @param  array $array conjunto de elementos a buscar
     * @return mixed        objecto a buscar
     */
    public function findOneByArray($array);

    /**
     * El método almacena en la BD algun objeto
     * Haciendo persistencia y luego almacenamiento en la BD
     * @param  Object $obj objeto a persistir
     */
    public function save($obj);

    /**
     * Encuentra un elemento dado un id
     * @param  integer $id elemento a buscar
     * @return mixed     elemento encontrado o nulo 
     */
    public function findById($id);

    /**
     * Elimina uno o varios objectos
     * @param  Object|array $obj elemento o elementos a eliminar
     */
    public function delete($obj);

    /**
     * Persistencia de objeto
     * @param  midex $obj objeto a persistir
     */
    public function persistObject($obj);
    
    /**
     * Elimina un objeto 
     * @param  midex $obj objeto a eliminar
     */
    public function removeObject($obj);

    /**
     * Ingresa en base de datos los objetos que se encuentran en persistencia
     * @return void
     */
    public function flushObject();
}
