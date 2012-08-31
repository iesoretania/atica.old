<?php



/**
 * This class defines the structure of the 'person' table.
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
class PersonTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'atica.map.PersonTableMap';

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
        $this->setName('person');
        $this->setPhpName('Person');
        $this->setClassname('Person');
        $this->setPackage('atica');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('USER_NAME', 'UserName', 'VARCHAR', true, 50, null);
        $this->addColumn('DISPLAY_NAME', 'DisplayName', 'VARCHAR', true, 255, null);
        $this->getColumn('DISPLAY_NAME', false)->setPrimaryString(true);
        $this->addColumn('DESCRIPTION', 'Description', 'LONGVARCHAR', false, null, null);
        $this->addColumn('PASSWORD', 'Password', 'VARCHAR', false, 41, null);
        $this->addColumn('GENDER', 'Gender', 'INTEGER', true, null, 0);
        $this->addColumn('EMAIL', 'Email', 'VARCHAR', false, 255, null);
        $this->addColumn('EMAIL_ENABLED', 'EmailEnabled', 'BOOLEAN', true, 1, false);
        $this->addColumn('IS_GLOBAL_ADMINISTRATOR', 'IsGlobalAdministrator', 'BOOLEAN', true, 1, false);
        $this->addColumn('TOKEN', 'Token', 'VARCHAR', false, 45, null);
        $this->addColumn('TOKEN_EXPIRATION', 'TokenExpiration', 'TIMESTAMP', false, null, null);
        $this->addColumn('TOKEN_OPERATION', 'TokenOperation', 'INTEGER', false, null, null);
        $this->addColumn('TOKEN_DATA', 'TokenData', 'VARCHAR', false, 255, null);
        $this->addColumn('BAD_PASSWORD_COUNT', 'BadPasswordCount', 'INTEGER', true, null, 0);
        $this->addColumn('BLOCKED_ACCESS', 'BlockedAccess', 'TIMESTAMP', false, null, null);
        $this->addColumn('LAST_LOGIN', 'LastLogin', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('CompletedEvent', 'CompletedEvent', RelationMap::ONE_TO_MANY, array('id' => 'person_id', ), null, 'CASCADE', 'CompletedEvents');
        $this->addRelation('NonConformanceRelatedByClosedBy', 'NonConformance', RelationMap::ONE_TO_MANY, array('id' => 'closed_by', ), 'CASCADE', 'CASCADE', 'NonConformancesRelatedByClosedBy');
        $this->addRelation('NonConformanceRelatedByOpenedBy', 'NonConformance', RelationMap::ONE_TO_MANY, array('id' => 'opened_by', ), 'CASCADE', 'CASCADE', 'NonConformancesRelatedByOpenedBy');
        $this->addRelation('PersonOrganization', 'PersonOrganization', RelationMap::ONE_TO_MANY, array('id' => 'person_id', ), 'CASCADE', 'CASCADE', 'PersonOrganizations');
        $this->addRelation('PersonPreferences', 'PersonPreferences', RelationMap::ONE_TO_MANY, array('id' => 'person_id', ), null, null, 'PersonPreferencess');
        $this->addRelation('PersonProfile', 'PersonProfile', RelationMap::ONE_TO_MANY, array('id' => 'person_id', ), 'CASCADE', 'CASCADE', 'PersonProfiles');
        $this->addRelation('RevisionRelatedByApproverPersonId', 'Revision', RelationMap::ONE_TO_MANY, array('id' => 'approver_person_id', ), 'CASCADE', 'CASCADE', 'RevisionsRelatedByApproverPersonId');
        $this->addRelation('RevisionRelatedByReviewerPersonId', 'Revision', RelationMap::ONE_TO_MANY, array('id' => 'reviewer_person_id', ), 'CASCADE', 'CASCADE', 'RevisionsRelatedByReviewerPersonId');
        $this->addRelation('RevisionRelatedByUploaderPersonId', 'Revision', RelationMap::ONE_TO_MANY, array('id' => 'uploader_person_id', ), 'CASCADE', 'CASCADE', 'RevisionsRelatedByUploaderPersonId');
        $this->addRelation('Session', 'Session', RelationMap::ONE_TO_MANY, array('id' => 'person_id', ), 'CASCADE', 'CASCADE', 'Sessions');
    } // buildRelations()

} // PersonTableMap
