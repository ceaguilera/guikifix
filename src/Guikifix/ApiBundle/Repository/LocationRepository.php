<?php
namespace Guikifix\ApiBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManager;
use Guikifix\ApiBundle\Repository\BaseRepository;
use Guikifix\Core\Repository\LocationRepositoryInterface;

/**
 * LocationRepository
 * Implementa las operaciones de manipulacion de los datos
 * de la clase User definidas en la interfaz LoocaitonRepositoryInterface del dominio
 *
 * @author Freddy Contreras
 */
class LocationRepository extends BaseRepository implements LocationRepositoryInterface
{
    /**
     * La función retorna los children (localidades hijas) de una localidad especifica dada su id
     * @return array listado de las categorias 
     */
    public function findChildrenById($locationId)
    {
        return $this->createQueryBuilder('l')
            ->select('
                l.id,
                l.slug,
                l.lvl,
                l.title
                ')
            ->where("
                l.parent = :parent_id
                ")
            ->setParameters(['parent_id' => $locationId])
            ->orderBy('l.title', 'ASC')
            ->getQuery()->getArrayResult();
    }
}