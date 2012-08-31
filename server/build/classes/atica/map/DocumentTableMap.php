<?php



/**
 * This class defines the structure of the 'document' table.
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
class DocumentTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'atica.map.DocumentTableMap';

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
        $this->setName('document');
        $this->setPhpName('Document');
        $this->setClassname('Document');
        $this->setPackage('atica');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('REVISION_ID', 'RevisionId', 'INTEGER', 'revision', 'ID', true, null, null);
        $this->addColumn('DOWNLOAD_FILENAME', 'DownloadFilename', 'VARCHAR', true, 255, null);
        $this->addForeignKey('EXTENSION_ID', 'ExtensionId', 'VARCHAR', 'file_extension', 'ID', false, 45, null);
        $this->addColumn('DOWNLOAD_PATH', 'DownloadPath', 'LONGVARCHAR', true, null, null);
        $this->addColumn('DOWNLOAD_FILESIZE', 'DownloadFilesize', 'INTEGER', false, null, null);
        $this->addColumn('BINARY_DATA', 'BinaryData', 'BLOB', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('FileExtension', 'FileExtension', RelationMap::MANY_TO_ONE, array('extension_id' => 'id', ), null, null);
        $this->addRelation('Revision', 'Revision', RelationMap::MANY_TO_ONE, array('revision_id' => 'id', ), 'CASCADE', null);
    } // buildRelations()

} // DocumentTableMap
