<?php



/**
 * This class defines the structure of the 'profile_group' table.
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
class ProfileGroupTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'atica.map.ProfileGroupTableMap';

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
        $this->setName('profile_group');
        $this->setPhpName('ProfileGroup');
        $this->setClassname('ProfileGroup');
        $this->setPackage('atica');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('SNAPSHOT_ID', 'SnapshotId', 'INTEGER', 'snapshot', 'ID', true, null, null);
        $this->addColumn('DISPLAY_NAME_MALE', 'DisplayNameMale', 'VARCHAR', true, 255, null);
        $this->addColumn('DISPLAY_NAME_FEMALE', 'DisplayNameFemale', 'VARCHAR', true, 255, null);
        $this->addColumn('DISPLAY_NAME_NEUTRAL', 'DisplayNameNeutral', 'VARCHAR', true, 255, null);
        $this->addColumn('ABBREVIATION', 'Abbreviation', 'VARCHAR', false, 5, null);
        $this->addColumn('IS_MANAGER', 'IsManager', 'BOOLEAN', true, 1, false);
        $this->addColumn('DESCRIPTION', 'Description', 'LONGVARCHAR', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Snapshot', 'Snapshot', RelationMap::MANY_TO_ONE, array('snapshot_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('ActivityProfileGroup', 'ActivityProfileGroup', RelationMap::ONE_TO_MANY, array('id' => 'profile_group_id', ), 'CASCADE', 'CASCADE', 'ActivityProfileGroups');
        $this->addRelation('Profile', 'Profile', RelationMap::ONE_TO_MANY, array('id' => 'profile_group_id', ), 'CASCADE', 'CASCADE', 'Profiles');
        $this->addRelation('GroupingProfileGroup', 'GroupingProfileGroup', RelationMap::ONE_TO_MANY, array('id' => 'profile_group_id', ), 'CASCADE', 'CASCADE', 'GroupingProfileGroups');
        $this->addRelation('EventProfileGroup', 'EventProfileGroup', RelationMap::ONE_TO_MANY, array('id' => 'profile_group_id', ), 'CASCADE', 'CASCADE', 'EventProfileGroups');
        $this->addRelation('FolderPermission', 'FolderPermission', RelationMap::ONE_TO_MANY, array('id' => 'profile_group_id', ), 'CASCADE', null, 'FolderPermissions');
    } // buildRelations()

} // ProfileGroupTableMap
