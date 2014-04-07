<?php
namespace Wc;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

abstract class AppController extends Controller
{

    protected $reponame = '';

    /**
     * @param $name
     * @return \Doctrine\Common\Persistence\ObjectRepository
     * @throws \LogicException
     * @throws \InvalidArgumentException
     */
    protected function getRepo($name)
    {
        return $this->getDoctrine()->getRepository(sprintf('Wc%sBundle:%s', $this->reponame, $name));
    }

    protected function validCsrf($csrf, $intention)
    {
        $validator = $this->get('form.csrf_provider');
        return $validator->isCsrfTokenValid($intention, $csrf);
    }

    /**
     * @return \Doctrine\Common\Persistence\ObjectManager
     * @throws \LogicException
     * @throws \InvalidArgumentException
     */
    protected function getManager()
    {
        return $this->getDoctrine()->getManager();
    }

} 