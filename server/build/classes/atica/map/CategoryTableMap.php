<?php



/**
 * This class defines the structure of the 'category' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.atica.map
 */
class CategoryTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'atica.map.CategoryTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('category');
        $this->setPhpName('Category');
        $this->setClassname('Category');
        $this->setPackage('atica');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('SNAPSHOT_ID', 'SnapshotId', 'INTEGER', 'snapshot', 'ID', true, null, null);
        $this->addColumn('CODE', 'Code', 'VARCHAR', false, 45, null);
        $this->addColumn('CATEGORY_LEFT', 'CategoryLeft', 'INTEGER', false, null, null);
        $this->addColumn('CATEGORY_RIGHT', 'CategoryRight', 'INTEGER', false, null, null);
        $this->addColumn('CATEGORY_LEVEL', 'CategoryLevel', 'INTEGER', false, null, null);
        $this->addColumn('DISPLAY_NAME', 'DisplayName', 'VARCHAR', true, 255, null);
        $this->getColumn('DISPLAY_NAME', false)->setPrimaryString(true);
        $this->addColumn('DESCRIPTION', 'Description', 'LONGVARCHAR', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Snapshot', 'Snapshot', RelationMap::MANY_TO_ONE, array('snapshot_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('CategoryFolder', 'CategoryFolder', RelationMap::ONE_TO_MANY, array('id' => 'category_id', ), 'CASCADE', 'CASCADE', 'CategoryFolders');
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'nested_set' => array('left_column' => 'category_left', 'right_column' => 'category_right', 'level_column' => 'category_level', 'use_scope' => 'true', 'scope_column' => 'snapshot_id', 'method_proxies' => 'false', ),
        );
    } // getBehaviors()

} // CategoryTableMap
