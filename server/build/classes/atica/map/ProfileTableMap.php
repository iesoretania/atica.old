<?php



/**
 * This class defines the structure of the 'profile' table.
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
class ProfileTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'atica.map.ProfileTableMap';

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
        $this->setName('profile');
        $this->setPhpName('Profile');
        $this->setClassname('Profile');
        $this->setPackage('atica');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('PROFILE_GROUP_ID', 'ProfileGroupId', 'INTEGER', 'profile_group', 'ID', true, null, null);
        $this->addColumn('ORDER_NR', 'OrderNr', 'INTEGER', true, null, null);
        $this->addColumn('DISPLAY_NAME', 'DisplayName', 'VARCHAR', true, 255, '');
        $this->getColumn('DISPLAY_NAME', false)->setPrimaryString(true);
        $this->addColumn('DESCRIPTION', 'Description', 'LONGVARCHAR', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('ProfileGroup', 'ProfileGroup', RelationMap::MANY_TO_ONE, array('profile_group_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Delivery', 'Delivery', RelationMap::ONE_TO_MANY, array('id' => 'profile_id', ), 'CASCADE', 'CASCADE', 'Deliveries');
        $this->addRelation('PersonProfile', 'PersonProfile', RelationMap::ONE_TO_MANY, array('id' => 'profile_id', ), 'CASCADE', null, 'PersonProfiles');
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
            'sortable' => array('rank_column' => 'order_nr', 'use_scope' => 'true', 'scope_column' => 'profile_group_id', ),
        );
    } // getBehaviors()

} // ProfileTableMap
