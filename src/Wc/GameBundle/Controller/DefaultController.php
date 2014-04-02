<?php
namespace Wc\GameBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Wc\GameBundle\App;

class DefaultController extends App
{
    /**
     * @Route("/", name="wc_gamebundle_default")
     * @Template()
     */
    public function indexAction()
    {
        return array(
            'stages' => $this->getStageRepo()->findAll()
        );
    }
}
