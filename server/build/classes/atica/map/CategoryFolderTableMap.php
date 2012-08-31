<?php



/**
 * This class defines the structure of the 'category_folder' table.
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
class CategoryFolderTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'atica.map.CategoryFolderTableMap';

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
        $this->setName('category_folder');
        $this->setPhpName('CategoryFolder');
        $this->setClassname('CategoryFolder');
        $this->setPackage('atica');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('CATEGORY_ID', 'CategoryId', 'INTEGER' , 'category', 'ID', true, null, null);
        $this->addForeignPrimaryKey('FOLDER_ID', 'FolderId', 'INTEGER' , 'folder', 'ID', true, null, null);
        $this->addColumn('ORDER_NR', 'OrderNr', 'INTEGER', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Category', 'Category', RelationMap::MANY_TO_ONE, array('category_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Folder', 'Folder', RelationMap::MANY_TO_ONE, array('folder_id' => 'id', ), 'CASCADE', 'CASCADE');
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
            'sortable' => array('rank_column' => 'order_nr', 'use_scope' => 'true', 'scope_column' => 'category_id', ),
        );
    } // getBehaviors()

} // CategoryFolderTableMap
