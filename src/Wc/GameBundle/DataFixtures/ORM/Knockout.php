<?php
namespace Wc\GameBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Wc\GameBundle\DataFixtures\Fixture;
use Wc\GameBundle\Entity;

class Knockout extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $this->round16($manager);
        $this->round8($manager);
        $this->round4($manager);
        //$this->roundLoser2($manager);
        $this->roundWinner2($manager);
    }

    public function getOrder()
    {
        return 15;
    }

    private function roundWinner2(ObjectManager $manager)
    {
        $csv = <<<CSV
64	13/07 21:00	Rio De Janeiro		W61	 -	W62
CSV;
        $this->insertKnockout($manager, $csv, 'stage-final');
    }

    private function roundLoser2(ObjectManager $manager)
    {
        $csv = <<<CSV
63	12/07 22:00	Brasilia		L61	 -	L62
CSV;
        $this->insertKnockout($manager, $csv, 'stage-thirdplace');
    }

    private function round4(ObjectManager $manager)
    {
        $csv = <<<CSV
61	08/07 22:00	Belo Horizonte		W57	 -	W58
62	09/07 22:00	Sao Paulo		W59	 -	W60
CSV;
        $this->insertKnockout($manager, $csv, 'stage-round_4');
    }

    private function round8(ObjectManager $manager)
    {
        $csv = <<<CSV
57	04/07 22:00	Fortaleza		W49	 -	W50
58	04/07 18:00	Rio De Janeiro		W53	 -	W54
59	05/07 22:00	Salvador		W51	 -	W52
60	05/07 18:00	Brasilia		W55	 -	W56
CSV;
        $this->insertKnockout($manager, $csv, 'stage-round_8');
    }

    private function round16(ObjectManager $manager)
    {
        $csv = <<<CSV
49	28/06 18:00	Belo Horizonte		1A	 -	2B
50	28/06 22:00	Rio De Janeiro		1C	 -	2D
51	29/06 18:00	Fortaleza		1B	 -	2A
52	29/06 22:00	Recife		1D	 -	2C
53	30/06 18:00	Brasilia		1E	 -	2F
54	30/06 22:00	Porto Alegre		1G	 -	2H
55	01/07 18:00	Sao Paulo		1F	 -	2E
56	01/07 22:00	Salvador		1H	 -	2G
CSV;
        $this->insertKnockout($manager, $csv, 'stage-round_16');

    }

    private function insertKnockout(ObjectManager $manager, $csv, $stagename)
    {
        $rows = str_getcsv($csv, "\n");
        foreach ($rows as $row) {
            $data = str_getcsv($row, "\t");
            list($matchid, $datetime, $tmp, $tmp, $hometeam, $tmp, $awayteam) = $data;
            $date = date_create_from_format('Y/d/m H:i:s', sprintf('2014/%s:00', $datetime));
            $date->setTimezone(new \DateTimeZone('Europe/Copenhagen'));

            $k = new Entity\Knockout();
            $k
                ->setAwayteam($awayteam)
                ->setHometeam($hometeam)
                ->setMatchdate($date)
                ->setMatchid($matchid)
                ->setFromgroup((in_array(substr($hometeam,0, 1), array('W','L')) ? false : true))
                ->setStage($this->getReference($stagename))
            ;

            $manager->persist($k);

        }

        $manager->flush();
    }

} 