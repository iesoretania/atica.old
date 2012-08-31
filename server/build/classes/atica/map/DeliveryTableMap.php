<?php



/**
 * This class defines the structure of the 'delivery' table.
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
class DeliveryTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'atica.map.DeliveryTableMap';

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
        $this->setName('delivery');
        $this->setPhpName('Delivery');
        $this->setClassname('Delivery');
        $this->setPackage('atica');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('SNAPSHOT_ID', 'SnapshotId', 'INTEGER', 'snapshot', 'ID', true, null, null);
        $this->addForeignKey('PROFILE_ID', 'ProfileId', 'INTEGER', 'profile', 'ID', false, null, null);
        $this->addColumn('DISPLAY_NAME', 'DisplayName', 'VARCHAR', true, 255, null);
        $this->getColumn('DISPLAY_NAME', false)->setPrimaryString(true);
        $this->addColumn('DESCRIPTION', 'Description', 'LONGVARCHAR', false, null, null);
        $this->addColumn('CREATION_DATE', 'CreationDate', 'TIMESTAMP', true, null, null);
        $this->addForeignKey('CURRENT_REVISION_ID', 'CurrentRevisionId', 'INTEGER', 'revision', 'ID', false, null, null);
        $this->addColumn('PUBLIC_TOKEN', 'PublicToken', 'VARCHAR', false, 45, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Profile', 'Profile', RelationMap::MANY_TO_ONE, array('profile_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('RevisionRelatedByCurrentRevisionId', 'Revision', RelationMap::MANY_TO_ONE, array('current_revision_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Snapshot', 'Snapshot', RelationMap::MANY_TO_ONE, array('snapshot_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('FolderDelivery', 'FolderDelivery', RelationMap::ONE_TO_MANY, array('id' => 'delivery_id', ), 'CASCADE', null, 'FolderDeliveries');
        $this->addRelation('EventDelivery', 'EventDelivery', RelationMap::ONE_TO_MANY, array('id' => 'delivery_id', ), 'CASCADE', 'CASCADE', 'EventDeliveries');
        $this->addRelation('RevisionRelatedByDeliveryId', 'Revision', RelationMap::ONE_TO_MANY, array('id' => 'delivery_id', ), 'CASCADE', 'CASCADE', 'RevisionsRelatedByDeliveryId');
    } // buildRelations()

} // DeliveryTableMap
