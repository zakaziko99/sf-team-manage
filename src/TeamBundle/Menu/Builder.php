<?php

namespace TeamBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class Builder implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $menu->setChildrenAttribute('class', 'nav navbar-nav');

        $menu->addChild('Home',     ['route' => 'homepage']);
        $menu->addChild('Team',     ['route' => 'members_list']);
        $menu->addChild('Diplomes', ['route' => 'diplomes_list']);

        // // access services from the container!
        // $em = $this->container->get('doctrine')->getManager();
        // // findMostRecent and Blog are just imaginary examples
        // $blog = $em->getRepository('AppBundle:Blog')->findMostRecent();

        // $menu->addChild('Latest Blog Post', array(
        //     'route' => 'blog_show',
        //     'routeParameters' => array('id' => $blog->getId())
        // ));

        // // create another menu item
        // $menu->addChild('About Me', array('route' => 'about'));
        // // you can also add sub level's to your menu's as follows
        // $menu['About Me']->addChild('Edit profile', array('route' => 'edit_profile'));

        // ... add more children

        return $menu;
    }
}
