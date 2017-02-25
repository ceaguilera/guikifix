<?php
namespace Guikifix\ApiBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManager;
use Guikifix\ApiBundle\Repository\BaseRepository;
use Guikifix\Core\Repository\JobTypeCategoryRepositoryInterface;
use Doctrine\ORM\Query\ResultSetMapping;

/**
 * UserRepository
 * Implementa las operaciones de manipulacion de los datos
 * de la clase User definidas en la interfaz UserRepositoryInterface del dominio
 *
 * @author Freddy Contreras
 */
class JobTypeCategoryRepository extends BaseRepository implements JobTypeCategoryRepositoryInterface
{

	/**
	 * La función retorna el listado tipo de trabajos del sistema
	 * @return array listado de las categorias 
	 */
	public function findAllJob()
	{
		return $this->createQueryBuilder('job')
			->select('
				job.id,
				job.title,
				job.lvl')
	        ->where("
	            job.lvl = 0
	            ")
	        ->getQuery()->getArrayResult();
	}

	/**
	 * La función retorna el listado tipo de trabajos del sistema
	 * @return array listado de las categorias 
	 */
	public function findCategoriesById($id)
	{
		$rsm = new ResultSetMapping();
		$rsm->addScalarResult('res','result','json_array');
		$query = 'select get_job_type_categories(:job_type_id) res';

		$naviteQuery = $this->getEntityManager()->createNativeQuery($query,$rsm);

		$naviteQuery->setParameter('job_type_id', $id);

		return $naviteQuery->getResult()[0]['result'];

	}
}