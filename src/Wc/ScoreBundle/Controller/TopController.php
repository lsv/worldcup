<?php

namespace Wc\ScoreBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Wc\GameBundle\App;

/**
 * Class DefaultController
 * @package Wc\ScoreBundle\Controller
 * 
 * @Route("/top")
 */
class TopController extends App
{
    const PRPAGE = 100;
    protected $reponame = 'Bet';
    
    /**
     * @Route("/{page}", name="top_bets", defaults={"page" = 1}, requirements={"page" = "\d+"})
     * @Template()
     */
    public function topBetsAction($page)
    {
        $list = $this->getDoctrine()->getRepository('WcUserBundle:Bet')->bets();
        return array(
            'prpage' => self::PRPAGE,
            'page' => $page,
            'list' => $this->pagination($list, $page) 
        );
    }

    /**
     * @Route("/corrects/{page}", name="top_corrects", defaults={"page" = 1}, requirements={"page" = "\d+"})
     * @Template()
     */
    public function topCorrectsAction($page)
    {
        $list = $this->getDoctrine()->getRepository('WcUserBundle:Bet')->corrects();
        return array(
            'prpage' => self::PRPAGE,
            'page' => $page,
            'list' => $this->pagination($list, $page) 
        );
    }
    
    /**
     * @Route("/wrongs/{page}", name="top_wrongs", defaults={"page" = 1}, requirements={"page" = "\d+"})
     * @Template()
     */
    public function topWrongsAction($page)
    {
        $list = $this->getDoctrine()->getRepository('WcUserBundle:Bet')->wrongs();
        return array(
            'prpage' => self::PRPAGE,
            'page' => $page,
            'list' => $this->pagination($list, $page) 
        );
    }
    
    /**
     * @Route("/spend/{page}", name="top_spend", defaults={"page" = 1}, requirements={"page" = "\d+"})
     * @Template()
     */
    public function topSpendAction($page)
    {
        $list = $this->getDoctrine()->getRepository('WcUserBundle:Bet')->spend();
        return array(
            'prpage' => self::PRPAGE,
            'page' => $page,
            'list' => $this->pagination($list, $page),
        );
    }
    
    private function pagination($items, $page)
    {
        $paginator = $this->get('knp_paginator');
        return $paginator->paginate(
            $items,
            $page,
            self::PRPAGE
        );
    }
    
}
