<?php
namespace Wc\UserBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class BetCommand extends Command implements ContainerAwareInterface
{

    /**
     * @var ContainerInterface
     */
    private $container;

    protected function configure()
    {
        $this
            ->setName('wc:bets')
            ->setDescription('Set bets points')
        ;
    }

    public function setContainer(ContainerInterface $interface = null)
    {
        $this->container = $interface;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->container->get('doctrine')->getRepository('WcUserBundle:Bet')->setCorrect();
    }


} 