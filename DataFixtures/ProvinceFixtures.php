<?php

namespace App\DataFixtures;

use App\Entity\Province;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class ProvinceFixtures
 * @package App\DataFixtures
 * @author Guillermo Quinteros <gu.quinteros@gmail.com>
 */
class ProvinceFixtures extends Fixture implements DependentFixtureInterface
{
    public const PROVINCE_REFERENCE = 'province_';

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $provinces = $this->getProvinces();

        foreach ($provinces as $province) {
            $entity = new Province();
            $entity->setId($province['id']);
            $entity->setName($province['name']);
            $entity->setRegion($this->getReference(RegionFixtures::REGION_REFERENCE.$province['region']));
            $this->addReference(self::PROVINCE_REFERENCE.$province['id'], $entity);
            $manager->persist($entity);
        }

        $manager->flush();
    }

    /**
     * @return array
     */
    private function getProvinces(): array
    {
        return [
            ['id' => 1, 'name' => 'Arica', 'region' => 15],
            ['id' => 2, 'name' => 'Parinacota', 'region' => 15],
            ['id' => 3, 'name' => 'Iquique', 'region' => 1],
            ['id' => 4, 'name' => 'Tamarugal', 'region' => 1],
            ['id' => 5, 'name' => 'Antofagasta', 'region' => 2],
            ['id' => 6, 'name' => 'El Loa', 'region' => 2],
            ['id' => 7, 'name' => 'Tocopilla', 'region' => 2],
            ['id' => 8, 'name' => 'Copiapó', 'region' => 3],
            ['id' => 9, 'name' => 'Chañaral', 'region' => 3],
            ['id' => 10, 'name' => 'Huasco', 'region' => 3],
            ['id' => 11, 'name' => 'Elqui', 'region' => 4],
            ['id' => 12, 'name' => 'Choapa', 'region' => 4],
            ['id' => 13, 'name' => 'Limarí', 'region' => 4],
            ['id' => 14, 'name' => 'Valparaíso', 'region' => 5],
            ['id' => 15, 'name' => 'Isla de Pascua', 'region' => 5],
            ['id' => 16, 'name' => 'Los Andes', 'region' => 5],
            ['id' => 17, 'name' => 'Petorca', 'region' => 5],
            ['id' => 18, 'name' => 'Quillota', 'region' => 5],
            ['id' => 19, 'name' => 'San Antonio', 'region' => 5],
            ['id' => 20, 'name' => 'San Felipe de Aconcagua', 'region' => 5],
            ['id' => 21, 'name' => 'Marga Marga', 'region' => 5],
            ['id' => 22, 'name' => 'Cachapoal', 'region' => 6],
            ['id' => 23, 'name' => 'Cardenal Caro', 'region' => 6],
            ['id' => 24, 'name' => 'Colchagua', 'region' => 6],
            ['id' => 25, 'name' => 'Talca', 'region' => 7],
            ['id' => 26, 'name' => 'Cauquenes', 'region' => 7],
            ['id' => 27, 'name' => 'Curicó', 'region' => 7],
            ['id' => 28, 'name' => 'Linares', 'region' => 7],
            ['id' => 29, 'name' => 'Concepción', 'region' => 8],
            ['id' => 30, 'name' => 'Arauco', 'region' => 8],
            ['id' => 31, 'name' => 'Biobío', 'region' => 8],
            ['id' => 32, 'name' => 'Ñuble', 'region' => 8],
            ['id' => 33, 'name' => 'Cautín', 'region' => 9],
            ['id' => 34, 'name' => 'Malleco', 'region' => 9],
            ['id' => 35, 'name' => 'Valdivia', 'region' => 14],
            ['id' => 36, 'name' => 'Ranco', 'region' => 14],
            ['id' => 37, 'name' => 'Llanquihue', 'region' => 10],
            ['id' => 38, 'name' => 'Chiloé', 'region' => 10],
            ['id' => 39, 'name' => 'Osorno', 'region' => 10],
            ['id' => 40, 'name' => 'Palena', 'region' => 10],
            ['id' => 41, 'name' => 'Coihaique', 'region' => 11],
            ['id' => 42, 'name' => 'Aisén', 'region' => 11],
            ['id' => 43, 'name' => 'Capitán Prat', 'region' => 11],
            ['id' => 44, 'name' => 'General Carrera', 'region' => 11],
            ['id' => 45, 'name' => 'Magallanes', 'region' => 12],
            ['id' => 46, 'name' => 'Antártica Chilena', 'region' => 12],
            ['id' => 47, 'name' => 'Tierra del Fuego', 'region' => 12],
            ['id' => 48, 'name' => 'Última Esperanza', 'region' => 12],
            ['id' => 49, 'name' => 'Santiago', 'region' => 13],
            ['id' => 50, 'name' => 'Cordillera', 'region' => 13],
            ['id' => 51, 'name' => 'Chacabuco', 'region' => 13],
            ['id' => 52, 'name' => 'Maipo', 'region' => 13],
            ['id' => 53, 'name' => 'Melipilla', 'region' => 13],
            ['id' => 54, 'name' => 'Talagante', 'region' => 13]
        ];
    }

    /**
     * @return array
     */
    public function getDependencies(): array
    {
        return [
            RegionFixtures::class,
        ];
    }
}
