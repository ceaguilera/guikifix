<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Guikifix\Core\Domain\JobStatusCategory;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170311181750  extends AbstractMigration implements
    ContainerAwareInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $em = $this->container->get('doctrine.orm.entity_manager');

        $rpJobTypeC = $em->getRepository('GuikifixDomain:JobStatusCategory');

        $data = json_decode('[{"title":"Interés","subtitle":"¿Cuál es su interés en ejecutar este trabajo?","lvl":1,"child":[{"title":"Solo tengo curiosidad","lvl":2},{"title":"Es probable que lo haga","lvl":2},{"title":"Lo haré con toda seguridad","lvl":2}]},{"title":"Estado actual","subtitle":"Seleccione el estado actual para este trabajo","lvl":1,"child":[{"title":"Listo para contratar","lvl":2},{"title":"Planificado","lvl":2},{"title":"Buscando presupuestos","lvl":2}]},{"title":"Tiempo para iniciar","subtitle":"¿Cuando desea iniciar el trabajo?","lvl":1,"child":[{"title":"Lo antes posible","lvl":2},{"title":"1-3 meses","lvl":2},{"title":"mas de 3 meses","lvl":2}]},{"title":"Propietario o autorización","subtitle":"¿Es propietario o tiene autorización para ejecutar la obra?","lvl":1,"child":[{"title":"Soy propietario","lvl":2},{"title":"Tengo autorización del propietario","lvl":2}]},{"title":"Requisitos","subtitle":"¿Para la ejecución de este trabajo cuenta con los siguientes requisitos?","lvl":3,"child":[{"title":"Autorización del Condominio","lvl":2},{"title":"Permisos municipales","lvl":2},{"title":"Planos","lvl":2},{"title":"Materiales","lvl":2},{"title":"Electricidad en el sitio","lvl":2},{"title":"Agua en el sitio","lvl":2}]}]',true);
        foreach ($data as $currrentData)
            $rpJobTypeC->save($this->createCategory($currrentData));

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }

    private function createCategory($data)
    {
        $jobStatus = new JobStatusCategory();
        $jobStatus->setTitle($data['title']);

        if ($data['lvl'] % 2 != 0)
            $jobStatus->setSubtitle($data['subtitle']);
        else
            $jobStatus->setSubtitle($data['title']);

        $jobStatus->setLvl($data['lvl']);

        if (isset($data['child']))
            foreach ($data['child'] as $key => $currentChild) {
                $child = $this->createCategory($currentChild);
                $child->setParent($jobStatus);
                $jobStatus->addChild($child);
            }

        return $jobStatus;
    }
}