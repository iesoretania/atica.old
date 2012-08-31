<?php



/**
 * This class defines the structure of the 'configuration' table.
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
class ConfigurationTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'atica.map.ConfigurationTableMap';

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
        $this->setName('configuration');
        $this->setPhpName('Configuration');
        $this->setClassname('Configuration');
        $this->setPackage('atica');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'VARCHAR', true, 255, null);
        $this->addForeignKey('ORGANIZATION_ID', 'OrganizationId', 'INTEGER', 'organization', 'ID', false, null, null);
        $this->addForeignKey('SNAPSHOT_ID', 'SnapshotId', 'INTEGER', 'snapshot', 'ID', false, null, null);
        $this->addColumn('CONTENT_TYPE', 'ContentType', 'INTEGER', true, null, null);
        $this->addColumn('CONTENT_SUBTYPE', 'ContentSubtype', 'INTEGER', false, null, null);
        $this->addColumn('ORDER_NR', 'OrderNr', 'INTEGER', true, null, null);
        $this->addColumn('SECTION_GROUP', 'SectionGroup', 'VARCHAR', true, 255, null);
        $this->addColumn('DESCRIPTION', 'Description', 'VARCHAR', true, 255, null);
        $this->addColumn('CONTENT', 'Content', 'LONGVARCHAR', false, null, null);
        $this->getColumn('CONTENT', false)->setPrimaryString(true);
        $this->addColumn('IS_ORGANIZATION_PREFERENCE', 'IsOrganizationPreference', 'BOOLEAN', true, 1, false);
        $this->addColumn('IS_SNAPSHOT_PREFERENCE', 'IsSnapshotPreference', 'BOOLEAN', true, 1, false);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Organization', 'Organization', RelationMap::MANY_TO_ONE, array('organization_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Snapshot', 'Snapshot', RelationMap::MANY_TO_ONE, array('snapshot_id' => 'id', ), 'CASCADE', null);
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

} // ConfigurationTableMap
