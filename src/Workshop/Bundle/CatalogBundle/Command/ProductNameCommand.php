<?php
namespace Workshop\Bundle\CatalogBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ProoductNameCommand
 * @package Workshop\Bundle\CatalogBundle\Command
 */
class ProductNameCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('catalog:productName')
            ->setDescription('Find products where catalog have more 1 product')
            ->setDefinition(
                array(
                    new InputArgument('limit', null, 'Limit', null),
                )
            )
            ->setHelp(
                <<<EOT
                           Find products where catalog have more 1 product
            <info>php app/console catalog:productName limit </info>


EOT
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $limit = $input->getArgument('limit');

        $find=$this->getContainer()->get('doctrine')->getRepository('WorkshopCatalogBundle:Product')->findProductName(
            $limit
        );

        foreach ($find as $product) {
            $output->writeln($product['name'].' <comment>'.$product['catalog']['name'].'</comment>');
        }

    }
}