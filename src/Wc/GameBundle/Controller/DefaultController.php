<?php
namespace Wc\GameBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Wc\GameBundle\App;

class DefaultController extends App
{
    /**
     * @Route("/", name="wc_gamebundle_default")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $timezone = 'Europe/Copenhagen';

        $locations = array();
        $zones = timezone_identifiers_list();
        foreach ($zones as $zone) {
            $zone = explode('/', $zone);
            if ($zone[0] == 'Africa' || $zone[0] == 'America' || $zone[0] == 'Antarctica' || $zone[0] == 'Arctic' || $zone[0] == 'Asia' || $zone[0] == 'Atlantic' || $zone[0] == 'Australia' || $zone[0] == 'Europe' || $zone[0] == 'Indian' || $zone[0] == 'Pacific') {
                if (isset($zone[1]) != '') {
                    $locations[$zone[0]][$zone[0]. '/' . $zone[1]] = str_replace('_', ' ', $zone[1]);
                }
            }
        }

        return array(
            'stages' => $this->getStageRepo()->getGroups(),
            'knockouts' => $this->getKnockoutRepo()->getMatches(),
            'bets' => $this->getDoctrine()->getRepository('WcUserBundle:Bet')->getBets($this->getUser()),
            'timezone' => $this->get('session')->get('timezone', $timezone),
            'timezones' => $locations
        );
    }

    /**
     * @Route("/changetimezone", name="wc_userbundle_changetimezone")
     * @Method("POST")
     */
    public function changeTimezoneAction(Request $request)
    {
        if ($this->validCsrf($request->request->get('csrf'), 'timezone')) {
            $timezone = $request->request->get('timezone');
            if ($timezone) {
                $this->get('session')->set('timezone', $timezone);
                $this->get('session')->getFlashBag()->add('info', 'Timezone changed');
            }
        }

        return $this->redirect($this->generateUrl('wc_gamebundle_default'));
    }
}
