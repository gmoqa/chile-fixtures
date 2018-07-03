<?php

namespace App\DataFixtures;

use App\Entity\Region;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class RegionFixtures
 * @package App\DataFixtures
 * @author Guillermo Quinteros <gu.quinteros@gmail.com>
 */
class RegionFixtures extends Fixture
{
    public const REGION_REFERENCE = 'region_';

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $regions = $this->getRegions();

        foreach ($regions as $region) {
            $entity = new Region();
            $entity->setId($region['id']);
            $entity->setName($region['name']);
            $entity->setISO($region['ISO']);
            $this->addReference(self::REGION_REFERENCE.$region['id'], $entity);
            $manager->persist($entity);
        }

        $manager->flush();
    }

    /**
     * @return array
     */
    private function getRegions() : array
    {
        return [
            ['id' => 1, 'name' => 'Tarapacá', 'ISO' => 'CL-TA'],
            ['id' => 2, 'name' => 'Antofagasta', 'ISO' => 'CL-AN'],
            ['id' => 3, 'name' => 'Atacama', 'ISO' => 'CL-AT'],
            ['id' => 4, 'name' => 'Coquimbo', 'ISO' => 'CL-CO'],
            ['id' => 5, 'name' => 'Valparaíso', 'ISO' => 'CL-VS'],
            ['id' => 6, 'name' => 'Región del Libertador Gral. Bernardo O’Higgins', 'ISO' => 'CL-LI'],
            ['id' => 7, 'name' => 'Región del Maule', 'ISO' => 'CL-ML'],
            ['id' => 8, 'name' => 'Región del Biobío', 'ISO' => 'CL-BI'],
            ['id' => 9, 'name' => 'Región de la Araucanía', 'ISO' => 'CL-AR'],
            ['id' => 10, 'name' => 'Región de Los Lagos', 'ISO' => 'CL-LL'],
            ['id' => 11, 'name' => 'Región Aisén del Gral. Carlos Ibáñez del Campo', 'ISO' => 'CL-AI'],
            ['id' => 12, 'name' => 'Región de Magallanes y de la Antártica Chilena', 'ISO' => 'CL-MA'],
            ['id' => 13, 'name' => 'Región Metropolitana de Santiago', 'ISO' => 'CL-RM'],
            ['id' => 14, 'name' => 'Región de Los Ríos', 'ISO' => 'CL-LR'],
            ['id' => 15, 'name' => 'Arica y Parinacota', 'ISO' => 'CL-AP']
        ];
    }
}
