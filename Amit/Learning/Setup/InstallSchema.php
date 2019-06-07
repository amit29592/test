<?php

namespace Amit\Learning\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;


/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

       

        $table = $installer->getConnection()
            ->newTable(
                $installer->getTable('learning_sample_item')
            )->addColumn(
            'id',
             \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true],
            'Item Id'
        )->addColumn(
            'name',
             \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Item Name'
        )->addIndex(
            $installer->getIdxName('learning_sample_item', ['name']),
            ['name']
        )
        

        ->setComment(
        	'Sample Items'
        );

        $installer->getConnection()->createTable($table);

        $installer->endSetup();
	}
}