<?php

namespace Kwejk\LayoutBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav navbar-nav');

        $menu->addChild('Strona główna', [
            'route' => 'kwejk_mems_list'
        ]);
        $menu->addChild('Poczekalnia', [
            'uri' => '#'
        ]);
        $menu->addChild('Top', [
            'uri' => '#'
        ]);
        $menu->addChild('Losuj', [
            'uri' => '#'
        ]);
        
        /*
        $menu->addChild('User')
            ->setAttribute('dropdown', true);
        $menu['User']->addChild('Profile', array('uri' => '#'))
            ->setAttribute('divider_append', true);
        $menu['User']->addChild('Logout', array('uri' => '#'));
        */
        return $menu;
    }
}