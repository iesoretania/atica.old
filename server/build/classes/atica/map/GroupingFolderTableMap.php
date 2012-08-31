<?php



/**
 * This class defines the structure of the 'grouping_folder' table.
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
class GroupingFolderTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'atica.map.GroupingFolderTableMap';

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
        $this->setName('grouping_folder');
        $this->setPhpName('GroupingFolder');
        $this->setClassname('GroupingFolder');
        $this->setPackage('atica');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('GROUPING_ID', 'GroupingId', 'INTEGER' , 'grouping', 'ID', true, null, null);
        $this->addForeignPrimaryKey('FOLDER_ID', 'FolderId', 'INTEGER' , 'folder', 'ID', true, null, null);
        $this->addColumn('ORDER_NR', 'OrderNr', 'INTEGER', true, null, 0);
        $this->addColumn('ALT_DISPLAY_NAME', 'AltDisplayName', 'VARCHAR', false, 255, null);
        $this->getColumn('ALT_DISPLAY_NAME', false)->setPrimaryString(true);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Folder', 'Folder', RelationMap::MANY_TO_ONE, array('folder_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Grouping', 'Grouping', RelationMap::MANY_TO_ONE, array('grouping_id' => 'id', ), 'CASCADE', 'CASCADE');
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
            'sortable' => array('rank_column' => 'order_nr', 'use_scope' => 'false', 'scope_column' => 'sortable_scope', ),
        );
    } // getBehaviors()

} // GroupingFolderTableMap
