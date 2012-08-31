<?php



/**
 * This class defines the structure of the 'snapshot' table.
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
class SnapshotTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'atica.map.SnapshotTableMap';

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
        $this->setName('snapshot');
        $this->setPhpName('Snapshot');
        $this->setClassname('Snapshot');
        $this->setPackage('atica');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('ORDER_NR', 'OrderNr', 'INTEGER', true, null, null);
        $this->addColumn('DISPLAY_NAME', 'DisplayName', 'VARCHAR', true, 255, null);
        $this->getColumn('DISPLAY_NAME', false)->setPrimaryString(true);
        $this->addColumn('VISIBLE', 'Visible', 'BOOLEAN', true, 1, true);
        $this->addColumn('RESTRICTED', 'Restricted', 'BOOLEAN', true, 1, false);
        $this->addForeignKey('ORGANIZATION_ID', 'OrganizationId', 'INTEGER', 'organization', 'ID', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Organization', 'Organization', RelationMap::MANY_TO_ONE, array('organization_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Action', 'Action', RelationMap::ONE_TO_MANY, array('id' => 'snapshot_id', ), 'CASCADE', 'CASCADE', 'Actions');
        $this->addRelation('Category', 'Category', RelationMap::ONE_TO_MANY, array('id' => 'snapshot_id', ), 'CASCADE', 'CASCADE', 'Categories');
        $this->addRelation('Configuration', 'Configuration', RelationMap::ONE_TO_MANY, array('id' => 'snapshot_id', ), 'CASCADE', null, 'Configurations');
        $this->addRelation('Delivery', 'Delivery', RelationMap::ONE_TO_MANY, array('id' => 'snapshot_id', ), 'CASCADE', 'CASCADE', 'Deliveries');
        $this->addRelation('Event', 'Event', RelationMap::ONE_TO_MANY, array('id' => 'snapshot_id', ), null, null, 'Events');
        $this->addRelation('Activity', 'Activity', RelationMap::ONE_TO_MANY, array('id' => 'snapshot_id', ), null, null, 'Activities');
        $this->addRelation('Folder', 'Folder', RelationMap::ONE_TO_MANY, array('id' => 'snapshot_id', ), 'CASCADE', 'CASCADE', 'Folders');
        $this->addRelation('NonConformance', 'NonConformance', RelationMap::ONE_TO_MANY, array('id' => 'snapshot_id', ), 'CASCADE', 'CASCADE', 'NonConformances');
        $this->addRelation('ProfileGroup', 'ProfileGroup', RelationMap::ONE_TO_MANY, array('id' => 'snapshot_id', ), 'CASCADE', 'CASCADE', 'ProfileGroups');
        $this->addRelation('Grouping', 'Grouping', RelationMap::ONE_TO_MANY, array('id' => 'snapshot_id', ), 'CASCADE', 'CASCADE', 'Groupings');
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
            'sortable' => array('rank_column' => 'order_nr', 'use_scope' => 'true', 'scope_column' => 'organization_id', ),
        );
    } // getBehaviors()

} // SnapshotTableMap
