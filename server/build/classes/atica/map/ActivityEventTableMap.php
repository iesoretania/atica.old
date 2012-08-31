<?php



/**
 * This class defines the structure of the 'activity_event' table.
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
class ActivityEventTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'atica.map.ActivityEventTableMap';

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
        $this->setName('activity_event');
        $this->setPhpName('ActivityEvent');
        $this->setClassname('ActivityEvent');
        $this->setPackage('atica');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('ACTIVITY_ID', 'ActivityId', 'INTEGER' , 'activity', 'ID', true, null, null);
        $this->addForeignPrimaryKey('EVENT_ID', 'EventId', 'INTEGER' , 'event', 'ID', true, null, null);
        $this->addColumn('ORDER_NR', 'OrderNr', 'INTEGER', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Activity', 'Activity', RelationMap::MANY_TO_ONE, array('activity_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Event', 'Event', RelationMap::MANY_TO_ONE, array('event_id' => 'id', ), 'CASCADE', 'CASCADE');
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
            'sortable' => array('rank_column' => 'order_nr', 'use_scope' => 'true', 'scope_column' => 'activity_id', ),
        );
    } // getBehaviors()

} // ActivityEventTableMap
