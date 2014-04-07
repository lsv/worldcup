<?php
namespace Wc\UserBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{

    public function userMenu(FactoryInterface $interface, array $options)
    {
        $user = $this->container->get('security.context');
        $menu = $interface->createItem('root', array(
            'navbar' => true,
        ));
        if ($user->isGranted('ROLE_USER')) {
            $dropdown = $menu->addChild(sprintf('Hello %s', $user->getToken()->getUsername()), array(
                'dropdown' => true,
                'caret' => true
            ));

            $dropdown->addChild('Logout', array(
                'icon' => 'eject',
                'route' => 'fos_user_security_logout'
            ));

        }

        return $menu;

    }

} 