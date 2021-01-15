<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Entreprise;
use App\Entity\Stage;
use App\Entity\Formation;
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $rog = new Entreprise();
        $rog->setNom('rog');
        $rog->setActivite("web");
        $rog->setAdresse("1 rue du ro");


        $arg = new Entreprise();
        $arg->setNom('arg');
        $arg->setActivite("prog");
        $arg->setAdresse("1 rue du ar");

        $oui = new Entreprise();
        $oui->setNom('oui');
        $oui->setActivite("sympho");
        $oui->setAdresse("1 rue du oui");

        $str = new Stage();
        $str->setIntitule("roweb");
        $str->setMission("dev web");
        $str->setAdresseMail("ro@ro.fr");


        $str2 = new Stage();
        $str2->setIntitule("dev php");
        $str2->setMission("faire php");
        $str2->setAdresseMail("ro@ro.fr");


        $sta = new Stage();
        $sta->setIntitule("arprog");
        $sta->setMission("prog objet");
        $sta->setAdresseMail("ar@ar.fr");


        $sto = new Stage();
        $sto->setIntitule("faire site");
        $sto->setMission("utiliser sympho");
        $sto->setAdresseMail("ou@ou.fr");


        $formr = new Formation();
        $formr->setNom("dut info");
        $formr->setDescription("dev web");

        $formr2 = new Formation();
        $formr2->setNom("but info");
        $formr2->setDescription("php pro");

        $forma = new Formation();
        $forma->setNom("but info");
        $forma->setDescription("prog objet");

        $formo = new Formation();
        $formo->setNom("dut info");
        $formo->setDescription("sympho boss");
        $rog->addStagesE($str);
        $rog->addStagesE($str2);
        $arg->addStagesE($sta);
        $oui->addStagesE($sto);
        
        $formr->addStagesF($str);
        $formr2->addStagesF($str2);
        $forma->addStagesF($sta);
        $formo->addStagesF($sto);

        $manager->persist($rog);
        $manager->persist($arg);
        $manager->persist($oui);
        $manager->persist($formr);
        $manager->persist($formr2);
        $manager->persist($forma);
        $manager->persist($formo);
        $manager->persist($str);
        $manager->persist($str2);
        $manager->persist($sta);
        $manager->persist($sto);


        $manager->flush();
    }
}
