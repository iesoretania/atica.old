<?php



/**
 * This class defines the structure of the 'file_extension' table.
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
class FileExtensionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'atica.map.FileExtensionTableMap';

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
        $this->setName('file_extension');
        $this->setPhpName('FileExtension');
        $this->setClassname('FileExtension');
        $this->setPackage('atica');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'VARCHAR', true, 45, null);
        $this->addColumn('MIME', 'Mime', 'VARCHAR', true, 255, null);
        $this->addColumn('DISPLAY_NAME', 'DisplayName', 'VARCHAR', true, 255, null);
        $this->getColumn('DISPLAY_NAME', false)->setPrimaryString(true);
        $this->addColumn('DESCRIPTION', 'Description', 'LONGVARCHAR', false, null, null);
        $this->addColumn('ICON', 'Icon', 'VARCHAR', true, 255, null);
        $this->addColumn('CONVERTIBLE', 'Convertible', 'BOOLEAN', true, 1, false);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Document', 'Document', RelationMap::ONE_TO_MANY, array('id' => 'extension_id', ), null, null, 'Documents');
    } // buildRelations()

} // FileExtensionTableMap
