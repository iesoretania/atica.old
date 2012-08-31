<?php



/**
 * This class defines the structure of the 'person_organization' table.
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
class PersonOrganizationTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'atica.map.PersonOrganizationTableMap';

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
        $this->setName('person_organization');
        $this->setPhpName('PersonOrganization');
        $this->setClassname('PersonOrganization');
        $this->setPackage('atica');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('PERSON_ID', 'PersonId', 'INTEGER' , 'person', 'ID', true, null, null);
        $this->addForeignPrimaryKey('ORGANIZATION_ID', 'OrganizationId', 'INTEGER' , 'organization', 'ID', true, null, null);
        $this->addColumn('IS_ACTIVE', 'IsActive', 'BOOLEAN', true, 1, true);
        $this->addColumn('IS_LOCAL_ADMINISTRATOR', 'IsLocalAdministrator', 'BOOLEAN', true, 1, false);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Organization', 'Organization', RelationMap::MANY_TO_ONE, array('organization_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Person', 'Person', RelationMap::MANY_TO_ONE, array('person_id' => 'id', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // PersonOrganizationTableMap
