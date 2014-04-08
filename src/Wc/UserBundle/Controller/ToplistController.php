<?php
namespace Wc\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Wc\UserBundle\App;

/**
 * Class ToplistController
 * @package Wc\UserBundle\Controller
 *
 * @Route("/top")
 */
class ToplistController extends App
{

    /**
     * @Route("/correct/{page}", name="top_correct", defaults={"page"=0})
     */
    public function correctAction($page)
    {
    }

    /**
     * @Route("/wrong/{page}", name="top_wrong", defaults={"page"=0})
     */
    public function wrongAction($page)
    {

    }

}
