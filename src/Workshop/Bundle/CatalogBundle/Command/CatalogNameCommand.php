<?php
namespace Workshop\Bundle\CatalogBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class CatalogNameCommand
 * @package Workshop\Bundle\CatalogBundle\Command
 */
class CatalogNameCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('catalog:catalogName')
            ->setDescription('Find catalog name with count ')
            ->setDefinition(
                array(
                    new InputArgument('limit', null, 'Limit', null),
                )
            )
            ->setHelp(
                <<<EOT
                            Find catalog name with count
            <info>php app/console catalog:catalogName limit </info>


EOT
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $limit = $input->getArgument('limit');

        $find = $this->getContainer()->get('doctrine')->getRepository('WorkshopCatalogBundle:Catalog')->findCatalogName(
            $limit
        );
        foreach ($find as $category) {
            $output->writeln($category[0]['name'].' <comment>'.$category[1].'</comment>');
        }

    }
}