<?php



/**
 * This class defines the structure of the 'grouping' table.
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
class GroupingTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'atica.map.GroupingTableMap';

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
        $this->setName('grouping');
        $this->setPhpName('Grouping');
        $this->setClassname('Grouping');
        $this->setPackage('atica');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('SNAPSHOT_ID', 'SnapshotId', 'INTEGER', 'snapshot', 'ID', true, null, null);
        $this->addColumn('ORDER_NR', 'OrderNr', 'INTEGER', true, null, null);
        $this->addColumn('DISPLAY_NAME', 'DisplayName', 'VARCHAR', true, 255, null);
        $this->getColumn('DISPLAY_NAME', false)->setPrimaryString(true);
        $this->addColumn('DESCRIPTION', 'Description', 'LONGVARCHAR', false, null, null);
        $this->addColumn('GUEST_ACCESS', 'GuestAccess', 'BOOLEAN', true, 1, false);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Snapshot', 'Snapshot', RelationMap::MANY_TO_ONE, array('snapshot_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('GroupingFolder', 'GroupingFolder', RelationMap::ONE_TO_MANY, array('id' => 'grouping_id', ), 'CASCADE', 'CASCADE', 'GroupingFolders');
        $this->addRelation('GroupingProfileGroup', 'GroupingProfileGroup', RelationMap::ONE_TO_MANY, array('id' => 'grouping_id', ), 'CASCADE', 'CASCADE', 'GroupingProfileGroups');
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
            'sortable' => array('rank_column' => 'order_nr', 'use_scope' => 'true', 'scope_column' => 'snapshot_id', ),
        );
    } // getBehaviors()

} // GroupingTableMap
