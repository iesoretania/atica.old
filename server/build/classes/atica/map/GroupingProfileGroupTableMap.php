<?php



/**
 * This class defines the structure of the 'grouping_profile_group' table.
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
class GroupingProfileGroupTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'atica.map.GroupingProfileGroupTableMap';

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
        $this->setName('grouping_profile_group');
        $this->setPhpName('GroupingProfileGroup');
        $this->setClassname('GroupingProfileGroup');
        $this->setPackage('atica');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('GROUPING_ID', 'GroupingId', 'INTEGER' , 'grouping', 'ID', true, null, null);
        $this->addForeignPrimaryKey('PROFILE_GROUP_ID', 'ProfileGroupId', 'INTEGER' , 'profile_group', 'ID', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('ProfileGroup', 'ProfileGroup', RelationMap::MANY_TO_ONE, array('profile_group_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Grouping', 'Grouping', RelationMap::MANY_TO_ONE, array('grouping_id' => 'id', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // GroupingProfileGroupTableMap
