<?php



/**
 * This class defines the structure of the 'non_conformance' table.
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
class NonConformanceTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'atica.map.NonConformanceTableMap';

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
        $this->setName('non_conformance');
        $this->setPhpName('NonConformance');
        $this->setClassname('NonConformance');
        $this->setPackage('atica');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('SNAPSHOT_ID', 'SnapshotId', 'INTEGER', 'snapshot', 'ID', true, null, null);
        $this->addForeignKey('NON_CONFORMANCE_TYPE_ID', 'NonConformanceTypeId', 'INTEGER', 'non_conformance_type', 'ID', true, null, null);
        $this->addColumn('NON_CONFORMITY_TYPE_DETAIL', 'NonConformityTypeDetail', 'VARCHAR', false, 255, null);
        $this->addColumn('DESCRIPTION', 'Description', 'LONGVARCHAR', false, null, null);
        $this->addColumn('OPENED_AT', 'OpenedAt', 'DATE', true, null, null);
        $this->addForeignKey('OPENED_BY', 'OpenedBy', 'INTEGER', 'person', 'ID', true, null, null);
        $this->addColumn('CLOSED_AT', 'ClosedAt', 'DATE', false, null, null);
        $this->addForeignKey('CLOSED_BY', 'ClosedBy', 'INTEGER', 'person', 'ID', false, null, null);
        $this->addColumn('CLOSE_COMMENT', 'CloseComment', 'LONGVARCHAR', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('PersonRelatedByClosedBy', 'Person', RelationMap::MANY_TO_ONE, array('closed_by' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('PersonRelatedByOpenedBy', 'Person', RelationMap::MANY_TO_ONE, array('opened_by' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Snapshot', 'Snapshot', RelationMap::MANY_TO_ONE, array('snapshot_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('NonConformanceType', 'NonConformanceType', RelationMap::MANY_TO_ONE, array('non_conformance_type_id' => 'id', ), null, null);
        $this->addRelation('Action', 'Action', RelationMap::ONE_TO_MANY, array('id' => 'non_conformance_id', ), 'CASCADE', 'CASCADE', 'Actions');
    } // buildRelations()

} // NonConformanceTableMap
