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
        $flashbag = $this->get('session')->getFlashBag();
        if ($this->validCsrf($request->request->get('csrf'), 'bets')) {
            $bets = $request->request->get('bet');
            if (is_array($bets)) {
                $this->getBetRepo()->setBets($this->getUser(), $bets, $flashbag);
            } else {
                $flashbag->add('error', 'No bets added :(');
            }
        } else {
            $flashbag->add('error', 'CSRF token is invalid');
        }

        return $this->redirect($this->generateUrl('wc_gamebundle_default'));

    }

} 