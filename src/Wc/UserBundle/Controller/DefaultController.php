<?php
namespace Wc\UserBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Wc\UserBundle\App;
use Wc\UserBundle\Entity;

class DefaultController extends App
{

    /**
     * @Route("/", name="wc_userbundle_default")
     * @Method("POST")
     */
    public function indexAction(Request $request)
    {
        if ($this->validCsrf($request->request->get('csrf'), 'bets')) {
            $bets = $request->request->get('bet');
            if (is_array($bets)) {
                foreach ($bets as $type => $bet) {
                    foreach ($bet as $matchid => $method) {
                        $obj = $this->getBetRepo()->findBet($type, $matchid, $this->getUser());
                        if ($obj === null) {
                            $obj = new Entity\Bet();
                            $obj->setUser($this->getUser());
                            if ($type == Entity\Repository\Bet::KNOCKOUT) {
                                $mm = $this->getManager()->getRepository('WcGameBundle:Knockout')->findOneBy(array('matchid' => $matchid));
                                $obj->setKnockout($mm);
                            } else {
                                $mm = $this->getManager()->getRepository('WcGameBundle:Game')->findOneBy(array('matchid' => $matchid));
                                $obj->setGame($mm);
                            }
                        } elseif ($obj === false) {
                            $this->get('session')->getFlashBag()->add('info', 'Match is already started, bet could not be saved');
                            continue;
                        }

                        $obj->setBet($method);
                        $this->getManager()->persist($obj);
                    }
                }

                $this->getManager()->flush();
                $this->get('session')->getFlashBag()->add('success', 'Your bets are now saved');

            } else {
                $this->get('session')->getFlashBag()->add('error', 'No bets added :(');
            }
        } else {
            $this->get('session')->getFlashBag()->add('error', 'CSRF token is invalid');
        }

        return $this->redirect($this->generateUrl('wc_gamebundle_default'));

    }

} 