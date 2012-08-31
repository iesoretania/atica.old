<?php



/**
 * This class defines the structure of the 'folder_permission' table.
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
class FolderPermissionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'atica.map.FolderPermissionTableMap';

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
        $this->setName('folder_permission');
        $this->setPhpName('FolderPermission');
        $this->setClassname('FolderPermission');
        $this->setPackage('atica');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('FOLDER_ID', 'FolderId', 'INTEGER' , 'folder', 'ID', true, null, null);
        $this->addForeignPrimaryKey('PROFILE_GROUP_ID', 'ProfileGroupId', 'INTEGER' , 'profile_group', 'ID', true, null, null);
        $this->addPrimaryKey('PERMISSION', 'Permission', 'ENUM', true, null, null);
        $this->getColumn('PERMISSION', false)->setValueSet(array (
  0 => 'manage',
  1 => 'read',
  2 => 'upload',
  3 => 'review',
  4 => 'approve',
));
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('ProfileGroup', 'ProfileGroup', RelationMap::MANY_TO_ONE, array('profile_group_id' => 'id', ), 'CASCADE', null);
        $this->addRelation('Folder', 'Folder', RelationMap::MANY_TO_ONE, array('folder_id' => 'id', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // FolderPermissionTableMap
