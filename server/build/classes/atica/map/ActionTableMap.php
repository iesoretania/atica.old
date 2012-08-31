<?php



/**
 * This class defines the structure of the 'action' table.
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
class ActionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'atica.map.ActionTableMap';

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
        $this->setName('action');
        $this->setPhpName('Action');
        $this->setClassname('Action');
        $this->setPackage('atica');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('SNAPSHOT_ID', 'SnapshotId', 'INTEGER', 'snapshot', 'ID', true, null, null);
        $this->addForeignKey('ACTION_TYPE_ID', 'ActionTypeId', 'INTEGER', 'action_type', 'ID', true, null, null);
        $this->addForeignKey('NON_CONFORMANCE_ID', 'NonConformanceId', 'INTEGER', 'non_conformance', 'ID', false, null, null);
        $this->addColumn('ACTION_LEFT', 'ActionLeft', 'INTEGER', false, null, null);
        $this->addColumn('ACTION_RIGHT', 'ActionRight', 'INTEGER', false, null, null);
        $this->addColumn('ACTION_LEVEL', 'ActionLevel', 'INTEGER', false, null, null);
        $this->addColumn('DISPLAY_NAME', 'DisplayName', 'VARCHAR', true, 255, null);
        $this->getColumn('DISPLAY_NAME', false)->setPrimaryString(true);
        $this->addColumn('DESCRIPTION', 'Description', 'LONGVARCHAR', false, null, null);
        $this->addColumn('CHECK_DUE', 'CheckDue', 'DATE', true, null, null);
        $this->addColumn('CHECKED_AT', 'CheckedAt', 'DATE', false, null, null);
        $this->addColumn('RESULT', 'Result', 'INTEGER', false, null, null);
        $this->addColumn('RESULT_DESCRIPTION', 'ResultDescription', 'LONGVARCHAR', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('ActionType', 'ActionType', RelationMap::MANY_TO_ONE, array('action_type_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('NonConformance', 'NonConformance', RelationMap::MANY_TO_ONE, array('non_conformance_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Snapshot', 'Snapshot', RelationMap::MANY_TO_ONE, array('snapshot_id' => 'id', ), 'CASCADE', 'CASCADE');
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
            'nested_set' => array('left_column' => 'action_left', 'right_column' => 'action_right', 'level_column' => 'action_level', 'use_scope' => 'true', 'scope_column' => 'snapshot_id', 'method_proxies' => 'false', ),
        );
    } // getBehaviors()

} // ActionTableMap
