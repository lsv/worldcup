<?php
namespace Wc;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

abstract class AppController extends Controller
{

    protected $reponame = '';

    protected function getRepo($name)
    {
        return $this->getDoctrine()->getRepository(sprintf('Wc%sBundle:%s', $this->reponame, $name));
    }

} 