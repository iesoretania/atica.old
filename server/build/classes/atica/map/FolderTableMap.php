<?php



/**
 * This class defines the structure of the 'folder' table.
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
class FolderTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'atica.map.FolderTableMap';

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
        $this->setName('folder');
        $this->setPhpName('Folder');
        $this->setClassname('Folder');
        $this->setPackage('atica');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('SNAPSHOT_ID', 'SnapshotId', 'INTEGER', 'snapshot', 'ID', true, null, null);
        $this->addColumn('CATEGORY_ID', 'CategoryId', 'INTEGER', true, null, null);
        $this->addColumn('ORDER_NR', 'OrderNr', 'INTEGER', true, null, null);
        $this->addColumn('DISPLAY_NAME', 'DisplayName', 'VARCHAR', true, 255, null);
        $this->getColumn('DISPLAY_NAME', false)->setPrimaryString(true);
        $this->addColumn('DESCRIPTION', 'Description', 'LONGVARCHAR', false, null, null);
        $this->addColumn('IS_DIVIDED', 'IsDivided', 'BOOLEAN', true, 1, false);
        $this->addColumn('IS_PRIVATE', 'IsPrivate', 'BOOLEAN', true, 1, false);
        $this->addColumn('FILTER', 'Filter', 'VARCHAR', false, 255, null);
        $this->addColumn('FILTER_DESCRIPTION', 'FilterDescription', 'LONGVARCHAR', false, null, null);
        $this->addColumn('MANDATORY_REVIEW', 'MandatoryReview', 'BOOLEAN', true, 1, null);
        $this->addColumn('MANDATORY_APPROVAL', 'MandatoryApproval', 'BOOLEAN', true, 1, null);
        $this->addColumn('REVIEW_NOTES', 'ReviewNotes', 'LONGVARCHAR', false, null, null);
        $this->addColumn('APPROVAL_NOTES', 'ApprovalNotes', 'LONGVARCHAR', false, null, null);
        $this->addColumn('SHOW_REVISION_NR', 'ShowRevisionNr', 'BOOLEAN', true, 1, false);
        $this->addColumn('AUTOCLEAN', 'Autoclean', 'BOOLEAN', true, 1, false);
        $this->addColumn('MAX_UPLOADS', 'MaxUploads', 'INTEGER', true, null, 0);
        $this->addColumn('PUBLIC_TOKEN', 'PublicToken', 'VARCHAR', false, 45, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Snapshot', 'Snapshot', RelationMap::MANY_TO_ONE, array('snapshot_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('FolderDelivery', 'FolderDelivery', RelationMap::ONE_TO_MANY, array('id' => 'folder_id', ), 'CASCADE', null, 'FolderDeliveries');
        $this->addRelation('EventFolder', 'EventFolder', RelationMap::ONE_TO_MANY, array('id' => 'folder_id', ), null, 'CASCADE', 'EventFolders');
        $this->addRelation('CategoryFolder', 'CategoryFolder', RelationMap::ONE_TO_MANY, array('id' => 'folder_id', ), 'CASCADE', 'CASCADE', 'CategoryFolders');
        $this->addRelation('GroupingFolder', 'GroupingFolder', RelationMap::ONE_TO_MANY, array('id' => 'folder_id', ), 'CASCADE', 'CASCADE', 'GroupingFolders');
        $this->addRelation('FolderPermission', 'FolderPermission', RelationMap::ONE_TO_MANY, array('id' => 'folder_id', ), 'CASCADE', 'CASCADE', 'FolderPermissions');
    } // buildRelations()

} // FolderTableMap
