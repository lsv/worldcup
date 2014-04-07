<?php
namespace Wc\GameBundle\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Faker\Factory;

abstract class Fixture extends AbstractFixture implements OrderedFixtureInterface
{

    protected $matches = array();

    protected $stages = array(
        'group_a' => array('name' => 'Group A', 'isgroup' => true),
        'group_b' => array('name' => 'Group B', 'isgroup' => true),
        'group_c' => array('name' => 'Group C', 'isgroup' => true),
        'group_d' => array('name' => 'Group D', 'isgroup' => true),
        'group_e' => array('name' => 'Group E', 'isgroup' => true),
        'group_f' => array('name' => 'Group F', 'isgroup' => true),
        'group_g' => array('name' => 'Group G', 'isgroup' => true),
        'group_h' => array('name' => 'Group H', 'isgroup' => true),
        'round_16' => array('name' => 'Round of 16', 'isgroup' => false),
        'round_8' => array('name' => 'Quarter finals', 'isgroup' => false),
        'round_4' => array('name' => 'Semi finals', 'isgroup' => false),
        //'thirdplace' => array('name' => 'Third place', 'isgroup' => false),
        'final' => array('name' => 'Final', 'isgroup' => false),
    );

    protected $teams = array(
        // A
        'Brazil' => array('iso2' => 'br'),
        'Croatia' => array('iso2' => 'hr'),
        'Mexico' => array('iso2' => 'mx'),
        'Cameroon' => array('iso2' => 'cm'),
        // B
        'Spain' => array('iso2' => 'es'),
        'Netherlands' => array('iso2' => 'nl'),
        'Chile' => array('iso2' => 'cl'),
        'Australia' => array('iso2' => 'au'),
        // C
        'Colombia' => array('iso2' => 'co'),
        'Greece' => array('iso2' => 'gr'),
        'Ivory Coast' => array('iso2' => 'ci'),
        'Japan' => array('iso2' => 'jp'),
        // D
        'Uruguay' => array('iso2' => 'uy'),
        'Costa Rica' => array('iso2' => 'cr'),
        'England' => array('iso2' => 'england'),
        'Italy' => array('iso2' => 'it'),
        // E
        'Switzerland' => array('iso2' => 'ch'),
        'Ecuador' => array('iso2' => 'ec'),
        'France' => array('iso2' => 'fr'),
        'Honduras' => array('iso2' => 'hn'),
        // F
        'Argentina' => array('iso2' => 'ar'),
        'Bosnia & Herze.' => array('iso2' => 'ba'),
        'Iran' => array('iso2' => 'ir'),
        'Nigeria' => array('iso2' => 'ng'),
        // G
        'Germany' => array('iso2' => 'de'),
        'Portugal' => array('iso2' => 'pt'),
        'Ghana' => array('iso2' => 'gh'),
        'United States' => array('iso2' => 'us'),
        // H
        'Belgium' => array('iso2' => 'be'),
        'Algeria' => array('iso2' => 'dz'),
        'Russia' => array('iso2' => 'ru'),
        'South Korea' => array('iso2' => 'kr'),
    );

    public function __construct()
    {
        $this->matches['group_a'] = <<<CSV
1	12/06 22:00	Sao Paulo		Brazil	-	Croatia
2	13/06 18:00	Natal		Mexico	-	Cameroon
17	17/06 21:00	Fortaleza		Brazil	-	Mexico
18	19/06 00:00	Manaus		Cameroon	-	Croatia
33	23/06 22:00	Brasilia		Cameroon	-	Brazil
34	23/06 22:00	Recife		Croatia	-	Mexico
CSV;
        $this->matches['group_b'] = <<<CSV
3	13/06 21:00	Salvador		Spain	-	Netherlands
4	14/06 00:00	Cuiaba		Chile	-	Australia
19	18/06 21:00	Rio De Janeiro		Spain	-	Chile
20	18/06 18:00	Porto Alegre		Australia	-	Netherlands
35	23/06 18:00	Curitiba		Australia	-	Spain
36	23/06 18:00	Sao Paulo		Netherlands	-	Chile
CSV;

        $this->matches['group_c'] = <<<CSV
5	14/06 18:00	Belo Horizonte		Colombia	-	Greece
6	15/06 03:00	Recife		Ivory Coast	-	Japan
21	19/06 18:00	Brasilia		Colombia	-	Ivory Coast
22	20/06 00:00	Natal		Japan	-	Greece
37	24/06 22:00	Cuiaba		Japan	-	Colombia
38	24/06 22:00	Fortaleza		Greece	-	Ivory Coast
CSV;

        $this->matches['group_d'] = <<<CSV
7	14/06 21:00	Fortaleza		Uruguay	-	Costa Rica
8	15/06 00:00	Manaus		England	-	Italy
23	19/06 21:00	Sao Paulo		Uruguay	-	England
24	20/06 18:00	Recife		Italy	-	Costa Rica
39	24/06 18:00	Natal		Italy	-	Uruguay
40	24/06 18:00	Belo Horizonte		Costa Rica	-	England
CSV;

        $this->matches['group_e'] = <<<CSV
9	15/06 18:00	Brasilia		Switzerland	-	Ecuador
10	15/06 21:00	Porto Alegre		France	-	Honduras
25	20/06 21:00	Salvador		Switzerland	-	France
26	21/06 00:00	Curitiba		Honduras	-	Ecuador
41	25/06 22:00	Manaus		Honduras	-	Switzerland
42	25/06 22:00	Rio De Janeiro		Ecuador	-	France
CSV;

        $this->matches['group_f'] = <<<CSV
11	16/06 00:00	Rio De Janeiro		Argentina	-	Bosnia & Herze.
12	16/06 21:00	Curitiba		Iran	-	Nigeria
27	21/06 18:00	Belo Horizonte		Argentina	-	Iran
28	22/06 00:00	Cuiaba		Nigeria	-	Bosnia & Herze.
43	25/06 18:00	Porto Alegre		Nigeria	-	Argentina
44	25/06 18:00	Salvador		Bosnia & Herze.	-	Iran
CSV;

        $this->matches['group_g'] = <<<CSV
13	16/06 18:00	Salvador		Germany	-	Portugal
14	17/06 00:00	Natal		Ghana	-	United States
29	21/06 21:00	Fortaleza		Germany	-	Ghana
30	23/06 00:00	Manaus		United States	-	Portugal
45	26/06 18:00	Recife		United States	-	Germany
46	26/06 18:00	Brasilia		Portugal	-	Ghana
CSV;

        $this->matches['group_h'] = <<<CSV
15	17/06 18:00	Belo Horizonte		Belgium	-	Algeria
16	18/06 00:00	Cuiaba		Russia	-	South Korea
31	22/06 18:00	Rio De Janeiro		Belgium	-	Russia
32	22/06 21:00	Porto Alegre		South Korea	-	Algeria
47	26/06 22:00	Sao Paulo		South Korea	-	Belgium
48	26/06 22:00	Curitiba		Algeria	-	Russia
CSV;


    }

    protected function getFaker()
    {
        return Factory::create();
    }

} 