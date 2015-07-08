<?php
namespace Workshop\Bundle\CatalogBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class CatalogIdsCommand
 * @package Workshop\Bundle\CatalogBundle\Command
 */
class CatalogIdsCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('catalog:catalogIds')
            ->setDescription('Find catalog id with concat ')
            ->setDefinition(
                array(
                    new InputArgument('limit', null, 'Limit', 10),
                )
            )
            ->setHelp(
                <<<EOT
                            Find catalog  with Ids
            <info>php app/console catalog:catalogIds limit </info>


EOT
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $limit = $input->getArgument('limit');

        $find = $this->getContainer()->get('doctrine')->getRepository('WorkshopCatalogBundle:Catalog')->findCatalogIds(
            $limit
        );
        foreach ($find as $category) {
            $output->writeln($category['name'].' <comment>'.
                implode('_', array_map(function ($product) {
                    return $product['id'];
                }, $category['products'])).'</comment>');
        }

    }
}