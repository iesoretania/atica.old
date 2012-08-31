<?php



/**
 * This class defines the structure of the 'organization' table.
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
class OrganizationTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'atica.map.OrganizationTableMap';

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
        $this->setName('organization');
        $this->setPhpName('Organization');
        $this->setClassname('Organization');
        $this->setPackage('atica');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('DISPLAY_NAME', 'DisplayName', 'VARCHAR', true, 45, null);
        $this->getColumn('DISPLAY_NAME', false)->setPrimaryString(true);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Snapshot', 'Snapshot', RelationMap::ONE_TO_MANY, array('id' => 'organization_id', ), 'CASCADE', 'CASCADE', 'Snapshots');
        $this->addRelation('Configuration', 'Configuration', RelationMap::ONE_TO_MANY, array('id' => 'organization_id', ), 'CASCADE', 'CASCADE', 'Configurations');
        $this->addRelation('PersonOrganization', 'PersonOrganization', RelationMap::ONE_TO_MANY, array('id' => 'organization_id', ), 'CASCADE', 'CASCADE', 'PersonOrganizations');
        $this->addRelation('Session', 'Session', RelationMap::ONE_TO_MANY, array('id' => 'organization_id', ), 'CASCADE', 'CASCADE', 'Sessions');
    } // buildRelations()

} // OrganizationTableMap
