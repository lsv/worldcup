<?php
namespace Wc\GameBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Wc\GameBundle\DataFixtures\Fixture;
use Wc\GameBundle\Entity\Game;

class Games extends Fixture
{

    public function load(ObjectManager $manager)
    {
        foreach($this->stages as $key => $tmp) {
            if (array_key_exists($key, $this->matches)) {
                $this->insertRound($this->matches[$key], $key, $manager);
            }
        }
    }

    public function getOrder()
    {
        return 3;
    }

    private function insertRound($csv, $stage, ObjectManager $manager)
    {
        $rows = str_getcsv($csv, "\n");
        foreach($rows as $row) {
            $data = str_getcsv($row, "\t");
            switch (count($data)) {
                case 7:
                    list($matchid, $date, $venue, $tmp, $hometeam, $tmp, $awayteam) = str_getcsv($row, "\t");
                    $datetime = date_create_from_format('Y/d/m H:i:s', sprintf('2014/%s:00', $date));
                    break;
                case 6:
                    list($matchid, $datevenue, $tmp, $hometeam, $tmp, $awayteam) = str_getcsv($row, "\t");
                    list($date, $time, $venue) = explode(' ', $datevenue);
                    $datetime = date_create_from_format('Y/d/m H:i:s', sprintf('2014/%s %s:00', $date, $time));
                    break;
                default:
                    var_dump(str_getcsv($row, "\t"));
                    exit;
            }

            $m = new Game();
            $m
                ->setStage($this->getReference('stage-' . $stage))
                ->setAwayteam($this->getReference('team-' . $awayteam))
                ->setHometeam($this->getReference('team-' . $hometeam))
                ->setMatchid($matchid)
                ->setMatchdate($datetime)
            ;

            $manager->persist($m);

        }

        $manager->flush();

    }

} 