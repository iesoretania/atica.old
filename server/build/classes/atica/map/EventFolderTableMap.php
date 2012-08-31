<?php



/**
 * This class defines the structure of the 'event_folder' table.
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
class EventFolderTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'atica.map.EventFolderTableMap';

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
        $this->setName('event_folder');
        $this->setPhpName('EventFolder');
        $this->setClassname('EventFolder');
        $this->setPackage('atica');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('EVENT_ID', 'EventId', 'INTEGER' , 'event', 'ID', true, null, null);
        $this->addForeignPrimaryKey('FOLDER_ID', 'FolderId', 'INTEGER' , 'folder', 'ID', true, null, null);
        $this->addColumn('DESCRIPTION', 'Description', 'LONGVARCHAR', false, null, null);
        $this->addColumn('IS_MANDATORY', 'IsMandatory', 'BOOLEAN', true, 1, false);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Event', 'Event', RelationMap::MANY_TO_ONE, array('event_id' => 'id', ), null, 'CASCADE');
        $this->addRelation('Folder', 'Folder', RelationMap::MANY_TO_ONE, array('folder_id' => 'id', ), null, 'CASCADE');
    } // buildRelations()

} // EventFolderTableMap
