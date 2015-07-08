<?php
namespace Workshop\Bundle\CatalogBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class CatalogUnionCommand
 * @package Workshop\Bundle\CatalogBundle\Command
 */
class CatalogUnionCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('catalog:catalogUnion')
            ->setDescription('Find catalog id with Union ')

            ->setHelp(
                <<<EOT
                            Find catalog  with union
            <info>php app/console catalog:catalogUnion </info>


EOT
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $find = $this->getContainer()->get('doctrine')->getRepository('WorkshopCatalogBundle:Catalog')->findCatalogUnion(

        );
        $output->writeln(' <comment>All names (products catalogs) with %2%</comment>');
        foreach ($find as $category) {
            $output->writeln(' <info>'.$category['name'].'</info>');
        }

    }
}