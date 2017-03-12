<?php
namespace Guikifix\ApiBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManager;
use Guikifix\ApiBundle\Repository\BaseRepository;
use Guikifix\Core\Repository\JobStatusCategoryRepositoryInterface;
use Doctrine\ORM\Query\ResultSetMapping;

/**
 * JobStatusCategory
 * Implementa las operaciones de manipulacion de los datos
 * de la clase User definidas en la interfaz JobStatusCategoryRepositoryInterface del dominio
 *
 * @author Freddy Contreras
 */
class JobStatusCategoryRepository extends BaseRepository implements JobStatusCategoryRepositoryInterface
{
    /**
     * La función retorna el listado de los tipos de
     * trabajo en el sistama
     * @return array listado de las categorias
     */
    public function findAllStatus()
    {
        $rsm = new ResultSetMapping();
        $rsm->addScalarResult('res','result','json_array');
        $query = 'select get_job_status_categories() res';

        $naviteQuery = $this->getEntityManager()->createNativeQuery($query,$rsm);
        return $naviteQuery->getResult()[0]['result'];
    }
}