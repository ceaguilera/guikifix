<?php

namespace Guikifix\ApiBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Guikifix\Core\Contract\BaseRepositoryInterface;

/**
 * La clase repositorio obtiene funciones base
 * para el manejo de repositorios
 *
 * Esta clase hace que los repositorios imiten el comportamiento de 
 * los repositorios de Symfony
 * 
 * @author Freddy Contreras
 */
class BaseRepository extends EntityRepository implements BaseRepositoryInterface
{
    /**
     * Encuentra un conjunto de elementos dado una clase
     * @param  array $array conjunto de elementos a buscar
     * @return mixed        objecto a buscar
     */
    public function findOneByArray($array)
    {
        return $this->findOneBy($array);
    }

    /**
     * El método almacena en la BD algun objeto
     * Haciendo persistencia y luego almacenamiento en la BD
     * @param  Object $obj objeto a persistir
     */
    public function save($obj)
    {
        if (is_array($obj))
            foreach ($obj as $one)
                $this->getEntityManager()->persist($one);
        else
            $this->getEntityManager()->persist($obj);
        $this->getEntityManager()->flush();

        return true;
    }

    /**
     * Encuentra un elemento dado un id
     * @param  integer $id elemento a buscar
     * @return mixed     elemento encontrado o nulo 
     */
    public function findById($id)
    {
        return $this->find($id);
    }

    /**
     * Elimina uno o varios objectos
     * @param  Object|array $obj elemento o elementos a eliminar
     */
    public function delete($obj)
    {
        if (is_array($obj))
            foreach ($obj as $one)
                $this->getEntityManager()->remove($one);
        else
            $this->getEntityManager()->remove($obj);
        $this->getEntityManager()->flush();
    }

    /**
     * Persistencia de objeto
     * @param  midex $obj objeto a persistir
     */
    public function persistObject($obj)
    {
        $this->getEntityManager()->persist($obj);
    }

    /**
     * Elimina un objeto 
     * @param  midex $obj objeto a eliminar
     */
    public function removeObject($obj)
    {
        $this->getEntityManager()->remove($obj);
    }

    /**
     * Ingresa en base de datos los objetos que se encuentran en persistencia
     * @return void
     */
    public function flushObject()
    {
        $this->getEntityManager()->flush();
    }
}
