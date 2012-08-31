<?php



/**
 * This class defines the structure of the 'completed_event' table.
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
class CompletedEventTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'atica.map.CompletedEventTableMap';

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
        $this->setName('completed_event');
        $this->setPhpName('CompletedEvent');
        $this->setClassname('CompletedEvent');
        $this->setPackage('atica');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('EVENT_ID', 'EventId', 'INTEGER' , 'event', 'ID', true, null, null);
        $this->addForeignPrimaryKey('PERSON_ID', 'PersonId', 'INTEGER' , 'person', 'ID', true, null, null);
        $this->addColumn('COMPLETED_DATE', 'CompletedDate', 'DATE', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Event', 'Event', RelationMap::MANY_TO_ONE, array('event_id' => 'id', ), null, 'CASCADE');
        $this->addRelation('Person', 'Person', RelationMap::MANY_TO_ONE, array('person_id' => 'id', ), null, 'CASCADE');
    } // buildRelations()

} // CompletedEventTableMap
