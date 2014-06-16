<?php
namespace Wc\UserBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    
    public function indexMenu(FactoryInterface $interface, array $options)
    {
        $menu = $interface->createItem('root', array(
            'navbar' => true
        ));
        
        $menu->addChild('Bet for fun!', array(
            'route' => 'wc_gamebundle_default'
        ));
        
        $menu->addChild('Top lists', array(
            'route' => 'top_user'
        ));
        
        $menu->addChild('Rules of engangement', array(
            'route' => 'wc_gamebundle_rules'
        ));
        
        return $menu;
    }

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
                'icon' => 'eject fa-3',
                'route' => 'fos_user_security_logout'
            ));

        }

        return $menu;

    }

} 