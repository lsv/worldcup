<?php
namespace Wc\GameBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Question\Question;
use Wc\GameBundle\Entity;

class ResultCommand extends Command implements ContainerAwareInterface
{

    /**
     * @var \Doctrine\Common\Persistence\AbstractManagerRegistry
     */
    private $doctrine;

    /**
     * @var \Symfony\Component\Console\Helper\QuestionHelper
     */
    private $helper;

    public function setContainer(ContainerInterface $interface = null)
    {
        $this->doctrine = $interface->get('doctrine');
    }

    protected function configure()
    {
        $this
            ->setName('wc:result')
            ->setDescription('Set results points')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->helper = $this->getHelperSet()->get('question');

        $groupmatches = $this->doctrine->getRepository('WcGameBundle:Game')->findBy(array(), array('matchdate' => 'ASC'));
        $knockouts = $this->doctrine->getRepository('WcGameBundle:Knockout')->getKnockoutMatches();

        $matches = array();
        if (is_array($groupmatches) && is_array($knockouts)) {
            $matches = array_merge($groupmatches, $knockouts);
        } elseif (is_array($groupmatches)) {
            $matches = $groupmatches;
        } elseif (is_array($knockouts)) {
            $matches = $knockouts;
        }

        foreach($matches as $match) {
            /** @var Entity\Game|Entity\Knockout $match */
            if (
                $match->getMatchdate()->getTimestamp() < date_create('now')->getTimestamp()
                &&
                $match->getHomeresult() === null
                &&
                $match->getAwayresult() === null
            ) {
                $this->setResult($input, $output, $match);
            }
        }
    }

    private function setResult(InputInterface $input, OutputInterface $output, $match)
    {
        /** @var Entity\Game|Entity\Knockout $match */
        $matchInfo = sprintf('Match %s (%s):', $match->getMatchid(), $match->getMatchdate()->format('D d/m'));

        $output->writeln(sprintf(
            '%s <info>%s</info> - <comment>%s</comment>',
            $matchInfo,
            $match->getHometeam()->getName(),
            $match->getAwayteam()->getName()
        ));
        $question = new Question('The <info>home</info> result? ');
        $homeres = $this->helper->ask($input, $output, $question);
        $question = new Question('The <comment>away</comment> result? ');
        $awayres = $this->helper->ask($input, $output, $question);
        if ($match instanceof Entity\Knockout) {
            if ($homeres == $awayres) {
                $question = new Question('The <info>home</info> penalty result? ');
                $homeres_pen = $this->helper->ask($input, $output, $question);
                $question = new Question('The <comment>away</comment> penalty result? ');
                $awayres_pen = $this->helper->ask($input, $output, $question);
            }
        }

        $sprint = sprintf(
            '%s <info>%s</info> - <comment>%s</comment> : <info>%s</info> - <comment>%s</comment>',
            $matchInfo,
            $match->getHometeam()->getName(),
            $match->getAwayteam()->getName(),
            $homeres,
            $awayres
        );

        if (isset($homeres_pen) && isset($awayres_pen)) {
            $sprint = sprintf(
                '%s <info>%s</info> - <comment>%s</comment> : <info>%s (%s)</info> - <comment>%s (%s)</comment>',
                $matchInfo,
                $match->getHometeam()->getName(),
                $match->getAwayteam()->getName(),
                $homeres,
                $homeres_pen,
                $awayres,
                $awayres_pen
            );
        }

        $output->writeln($sprint);
        $question = new ConfirmationQuestion('Is this correct?', true);
        if (! $this->helper->ask($input, $output, $question)) {
            return $this->setResult($input, $output, $match);
        } else {
            if ($match instanceof Entity\Knockout) {
                $knockoutmatch = $this->doctrine->getRepository('WcGameBundle:Knockout')->find($match->getId());
                $knockoutmatch
                    ->setHomeresult($homeres)
                    ->setAwayresult($awayres)
                ;
                if (isset($homeres_pen) && isset($awayres_pen)) {
                    $knockoutmatch
                        ->setHomePenaltyResult($homeres_pen)
                        ->setAwayPenaltyResult($awayres_pen)
                    ;
                }

                $this->doctrine->getManager()->persist($knockoutmatch);


            } else {
                $match
                    ->setHomeresult($homeres)
                    ->setAwayresult($awayres)
                ;

                $this->doctrine->getManager()->persist($match);

            }
        }

        $this->doctrine->getManager()->flush();
        return true;

    }



} 