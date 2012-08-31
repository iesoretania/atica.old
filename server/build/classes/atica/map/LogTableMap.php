<?php



/**
 * This class defines the structure of the 'log' table.
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
class LogTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'atica.map.LogTableMap';

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
        $this->setName('log');
        $this->setPhpName('Log');
        $this->setClassname('Log');
        $this->setPackage('atica');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('IP', 'Ip', 'VARCHAR', false, 32, null);
        $this->addColumn('WHEN', 'When', 'TIMESTAMP', true, null, null);
        $this->addColumn('PERSON_ID', 'PersonId', 'INTEGER', false, null, null);
        $this->addColumn('ORGANIZATION_ID', 'OrganizationId', 'INTEGER', false, null, null);
        $this->addColumn('CATEGORY_ID', 'CategoryId', 'INTEGER', false, null, null);
        $this->addColumn('GROUPING_ID', 'GroupingId', 'INTEGER', false, null, null);
        $this->addColumn('ACTIVITY_ID', 'ActivityId', 'INTEGER', false, null, null);
        $this->addColumn('EVENT_ID', 'EventId', 'INTEGER', false, null, null);
        $this->addColumn('FOLDER_ID', 'FolderId', 'INTEGER', false, null, null);
        $this->addColumn('DELIVERY_ID', 'DeliveryId', 'INTEGER', false, null, null);
        $this->addColumn('REVISION_ID', 'RevisionId', 'INTEGER', false, null, null);
        $this->addColumn('DOCUMENT_ID', 'DocumentId', 'INTEGER', false, null, null);
        $this->addColumn('KIND', 'Kind', 'VARCHAR', false, 255, null);
        $this->addColumn('DETAIL', 'Detail', 'VARCHAR', false, 255, null);
        $this->getColumn('DETAIL', false)->setPrimaryString(true);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // LogTableMap
