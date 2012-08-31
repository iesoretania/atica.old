<?php


/**
 * Base class that represents a row from the 'profile_group' table.
 *
 *
 *
 * @package    propel.generator.atica.om
 */
abstract class BaseProfileGroup extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProfileGroupPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProfileGroupPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id field.
     * @var        int
     */
    protected $id;

    /**
     * The value for the snapshot_id field.
     * @var        int
     */
    protected $snapshot_id;

    /**
     * The value for the display_name_male field.
     * @var        string
     */
    protected $display_name_male;

    /**
     * The value for the display_name_female field.
     * @var        string
     */
    protected $display_name_female;

    /**
     * The value for the display_name_neutral field.
     * @var        string
     */
    protected $display_name_neutral;

    /**
     * The value for the abbreviation field.
     * @var        string
     */
    protected $abbreviation;

    /**
     * The value for the is_manager field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $is_manager;

    /**
     * The value for the description field.
     * @var        string
     */
    protected $description;

    /**
     * @var        Snapshot
     */
    protected $aSnapshot;

    /**
     * @var        PropelObjectCollection|ActivityProfileGroup[] Collection to store aggregation of ActivityProfileGroup objects.
     */
    protected $collActivityProfileGroups;
    protected $collActivityProfileGroupsPartial;

    /**
     * @var        PropelObjectCollection|Profile[] Collection to store aggregation of Profile objects.
     */
    protected $collProfiles;
    protected $collProfilesPartial;

    /**
     * @var        PropelObjectCollection|GroupingProfileGroup[] Collection to store aggregation of GroupingProfileGroup objects.
     */
    protected $collGroupingProfileGroups;
    protected $collGroupingProfileGroupsPartial;

    /**
     * @var        PropelObjectCollection|EventProfileGroup[] Collection to store aggregation of EventProfileGroup objects.
     */
    protected $collEventProfileGroups;
    protected $collEventProfileGroupsPartial;

    /**
     * @var        PropelObjectCollection|FolderPermission[] Collection to store aggregation of FolderPermission objects.
     */
    protected $collFolderPermissions;
    protected $collFolderPermissionsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInSave = false;

    /**
     * Flag to prevent endless validation loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInValidation = false;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $activityProfileGroupsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $profilesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $groupingProfileGroupsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $eventProfileGroupsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $folderPermissionsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->is_manager = false;
    }

    /**
     * Initializes internal state of BaseProfileGroup object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [snapshot_id] column value.
     *
     * @return int
     */
    public function getSnapshotId()
    {
        return $this->snapshot_id;
    }

    /**
     * Get the [display_name_male] column value.
     *
     * @return string
     */
    public function getDisplayNameMale()
    {
        return $this->display_name_male;
    }

    /**
     * Get the [display_name_female] column value.
     *
     * @return string
     */
    public function getDisplayNameFemale()
    {
        return $this->display_name_female;
    }

    /**
     * Get the [display_name_neutral] column value.
     *
     * @return string
     */
    public function getDisplayNameNeutral()
    {
        return $this->display_name_neutral;
    }

    /**
     * Get the [abbreviation] column value.
     *
     * @return string
     */
    public function getAbbreviation()
    {
        return $this->abbreviation;
    }

    /**
     * Get the [is_manager] column value.
     *
     * @return boolean
     */
    public function getIsManager()
    {
        return $this->is_manager;
    }

    /**
     * Get the [description] column value.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return ProfileGroup The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = ProfileGroupPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [snapshot_id] column.
     *
     * @param int $v new value
     * @return ProfileGroup The current object (for fluent API support)
     */
    public function setSnapshotId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->snapshot_id !== $v) {
            $this->snapshot_id = $v;
            $this->modifiedColumns[] = ProfileGroupPeer::SNAPSHOT_ID;
        }

        if ($this->aSnapshot !== null && $this->aSnapshot->getId() !== $v) {
            $this->aSnapshot = null;
        }


        return $this;
    } // setSnapshotId()

    /**
     * Set the value of [display_name_male] column.
     *
     * @param string $v new value
     * @return ProfileGroup The current object (for fluent API support)
     */
    public function setDisplayNameMale($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->display_name_male !== $v) {
            $this->display_name_male = $v;
            $this->modifiedColumns[] = ProfileGroupPeer::DISPLAY_NAME_MALE;
        }


        return $this;
    } // setDisplayNameMale()

    /**
     * Set the value of [display_name_female] column.
     *
     * @param string $v new value
     * @return ProfileGroup The current object (for fluent API support)
     */
    public function setDisplayNameFemale($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->display_name_female !== $v) {
            $this->display_name_female = $v;
            $this->modifiedColumns[] = ProfileGroupPeer::DISPLAY_NAME_FEMALE;
        }


        return $this;
    } // setDisplayNameFemale()

    /**
     * Set the value of [display_name_neutral] column.
     *
     * @param string $v new value
     * @return ProfileGroup The current object (for fluent API support)
     */
    public function setDisplayNameNeutral($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->display_name_neutral !== $v) {
            $this->display_name_neutral = $v;
            $this->modifiedColumns[] = ProfileGroupPeer::DISPLAY_NAME_NEUTRAL;
        }


        return $this;
    } // setDisplayNameNeutral()

    /**
     * Set the value of [abbreviation] column.
     *
     * @param string $v new value
     * @return ProfileGroup The current object (for fluent API support)
     */
    public function setAbbreviation($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->abbreviation !== $v) {
            $this->abbreviation = $v;
            $this->modifiedColumns[] = ProfileGroupPeer::ABBREVIATION;
        }


        return $this;
    } // setAbbreviation()

    /**
     * Sets the value of the [is_manager] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return ProfileGroup The current object (for fluent API support)
     */
    public function setIsManager($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_manager !== $v) {
            $this->is_manager = $v;
            $this->modifiedColumns[] = ProfileGroupPeer::IS_MANAGER;
        }


        return $this;
    } // setIsManager()

    /**
     * Set the value of [description] column.
     *
     * @param string $v new value
     * @return ProfileGroup The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[] = ProfileGroupPeer::DESCRIPTION;
        }


        return $this;
    } // setDescription()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->is_manager !== false) {
                return false;
            }

        // otherwise, everything was equal, so return true
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param int $startcol 0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->snapshot_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->display_name_male = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->display_name_female = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->display_name_neutral = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->abbreviation = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->is_manager = ($row[$startcol + 6] !== null) ? (boolean) $row[$startcol + 6] : null;
            $this->description = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 8; // 8 = ProfileGroupPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProfileGroup object", $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {

        if ($this->aSnapshot !== null && $this->snapshot_id !== $this->aSnapshot->getId()) {
            $this->aSnapshot = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param boolean $deep (optional) Whether to also de-associated any related objects.
     * @param PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getConnection(ProfileGroupPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProfileGroupPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aSnapshot = null;
            $this->collActivityProfileGroups = null;

            $this->collProfiles = null;

            $this->collGroupingProfileGroups = null;

            $this->collEventProfileGroups = null;

            $this->collFolderPermissions = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param PropelPDO $con
     * @return void
     * @throws PropelException
     * @throws Exception
     * @see        BaseObject::setDeleted()
     * @see        BaseObject::isDeleted()
     */
    public function delete(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(ProfileGroupPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProfileGroupQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $con->commit();
                $this->setDeleted(true);
            } else {
                $con->commit();
            }
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @throws Exception
     * @see        doSave()
     */
    public function save(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(ProfileGroupPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                ProfileGroupPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see        save()
     */
    protected function doSave(PropelPDO $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aSnapshot !== null) {
                if ($this->aSnapshot->isModified() || $this->aSnapshot->isNew()) {
                    $affectedRows += $this->aSnapshot->save($con);
                }
                $this->setSnapshot($this->aSnapshot);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            if ($this->activityProfileGroupsScheduledForDeletion !== null) {
                if (!$this->activityProfileGroupsScheduledForDeletion->isEmpty()) {
                    ActivityProfileGroupQuery::create()
                        ->filterByPrimaryKeys($this->activityProfileGroupsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->activityProfileGroupsScheduledForDeletion = null;
                }
            }

            if ($this->collActivityProfileGroups !== null) {
                foreach ($this->collActivityProfileGroups as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->profilesScheduledForDeletion !== null) {
                if (!$this->profilesScheduledForDeletion->isEmpty()) {
                    ProfileQuery::create()
                        ->filterByPrimaryKeys($this->profilesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->profilesScheduledForDeletion = null;
                }
            }

            if ($this->collProfiles !== null) {
                foreach ($this->collProfiles as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->groupingProfileGroupsScheduledForDeletion !== null) {
                if (!$this->groupingProfileGroupsScheduledForDeletion->isEmpty()) {
                    GroupingProfileGroupQuery::create()
                        ->filterByPrimaryKeys($this->groupingProfileGroupsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->groupingProfileGroupsScheduledForDeletion = null;
                }
            }

            if ($this->collGroupingProfileGroups !== null) {
                foreach ($this->collGroupingProfileGroups as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->eventProfileGroupsScheduledForDeletion !== null) {
                if (!$this->eventProfileGroupsScheduledForDeletion->isEmpty()) {
                    EventProfileGroupQuery::create()
                        ->filterByPrimaryKeys($this->eventProfileGroupsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->eventProfileGroupsScheduledForDeletion = null;
                }
            }

            if ($this->collEventProfileGroups !== null) {
                foreach ($this->collEventProfileGroups as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->folderPermissionsScheduledForDeletion !== null) {
                if (!$this->folderPermissionsScheduledForDeletion->isEmpty()) {
                    FolderPermissionQuery::create()
                        ->filterByPrimaryKeys($this->folderPermissionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->folderPermissionsScheduledForDeletion = null;
                }
            }

            if ($this->collFolderPermissions !== null) {
                foreach ($this->collFolderPermissions as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[] = ProfileGroupPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProfileGroupPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProfileGroupPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`ID`';
        }
        if ($this->isColumnModified(ProfileGroupPeer::SNAPSHOT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`SNAPSHOT_ID`';
        }
        if ($this->isColumnModified(ProfileGroupPeer::DISPLAY_NAME_MALE)) {
            $modifiedColumns[':p' . $index++]  = '`DISPLAY_NAME_MALE`';
        }
        if ($this->isColumnModified(ProfileGroupPeer::DISPLAY_NAME_FEMALE)) {
            $modifiedColumns[':p' . $index++]  = '`DISPLAY_NAME_FEMALE`';
        }
        if ($this->isColumnModified(ProfileGroupPeer::DISPLAY_NAME_NEUTRAL)) {
            $modifiedColumns[':p' . $index++]  = '`DISPLAY_NAME_NEUTRAL`';
        }
        if ($this->isColumnModified(ProfileGroupPeer::ABBREVIATION)) {
            $modifiedColumns[':p' . $index++]  = '`ABBREVIATION`';
        }
        if ($this->isColumnModified(ProfileGroupPeer::IS_MANAGER)) {
            $modifiedColumns[':p' . $index++]  = '`IS_MANAGER`';
        }
        if ($this->isColumnModified(ProfileGroupPeer::DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`DESCRIPTION`';
        }

        $sql = sprintf(
            'INSERT INTO `profile_group` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`ID`':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case '`SNAPSHOT_ID`':
                        $stmt->bindValue($identifier, $this->snapshot_id, PDO::PARAM_INT);
                        break;
                    case '`DISPLAY_NAME_MALE`':
                        $stmt->bindValue($identifier, $this->display_name_male, PDO::PARAM_STR);
                        break;
                    case '`DISPLAY_NAME_FEMALE`':
                        $stmt->bindValue($identifier, $this->display_name_female, PDO::PARAM_STR);
                        break;
                    case '`DISPLAY_NAME_NEUTRAL`':
                        $stmt->bindValue($identifier, $this->display_name_neutral, PDO::PARAM_STR);
                        break;
                    case '`ABBREVIATION`':
                        $stmt->bindValue($identifier, $this->abbreviation, PDO::PARAM_STR);
                        break;
                    case '`IS_MANAGER`':
                        $stmt->bindValue($identifier, (int) $this->is_manager, PDO::PARAM_INT);
                        break;
                    case '`DESCRIPTION`':
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', $e);
        }
        $this->setId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param PropelPDO $con
     *
     * @see        doSave()
     */
    protected function doUpdate(PropelPDO $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();
        BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
    }

    /**
     * Array of ValidationFailed objects.
     * @var        array ValidationFailed[]
     */
    protected $validationFailures = array();

    /**
     * Gets any ValidationFailed objects that resulted from last call to validate().
     *
     *
     * @return array ValidationFailed[]
     * @see        validate()
     */
    public function getValidationFailures()
    {
        return $this->validationFailures;
    }

    /**
     * Validates the objects modified field values and all objects related to this table.
     *
     * If $columns is either a column name or an array of column names
     * only those columns are validated.
     *
     * @param mixed $columns Column name or an array of column names.
     * @return boolean Whether all columns pass validation.
     * @see        doValidate()
     * @see        getValidationFailures()
     */
    public function validate($columns = null)
    {
        $res = $this->doValidate($columns);
        if ($res === true) {
            $this->validationFailures = array();

            return true;
        } else {
            $this->validationFailures = $res;

            return false;
        }
    }

    /**
     * This function performs the validation work for complex object models.
     *
     * In addition to checking the current object, all related objects will
     * also be validated.  If all pass then <code>true</code> is returned; otherwise
     * an aggreagated array of ValidationFailed objects will be returned.
     *
     * @param array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            // We call the validate method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aSnapshot !== null) {
                if (!$this->aSnapshot->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSnapshot->getValidationFailures());
                }
            }


            if (($retval = ProfileGroupPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collActivityProfileGroups !== null) {
                    foreach ($this->collActivityProfileGroups as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collProfiles !== null) {
                    foreach ($this->collProfiles as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collGroupingProfileGroups !== null) {
                    foreach ($this->collGroupingProfileGroups as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collEventProfileGroups !== null) {
                    foreach ($this->collEventProfileGroups as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collFolderPermissions !== null) {
                    foreach ($this->collFolderPermissions as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }


            $this->alreadyInValidation = false;
        }

        return (!empty($failureMap) ? $failureMap : true);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param string $name name
     * @param string $type The type of fieldname the $name is of:
     *               one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *               BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *               Defaults to BasePeer::TYPE_PHPNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = ProfileGroupPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getSnapshotId();
                break;
            case 2:
                return $this->getDisplayNameMale();
                break;
            case 3:
                return $this->getDisplayNameFemale();
                break;
            case 4:
                return $this->getDisplayNameNeutral();
                break;
            case 5:
                return $this->getAbbreviation();
                break;
            case 6:
                return $this->getIsManager();
                break;
            case 7:
                return $this->getDescription();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                    Defaults to BasePeer::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to true.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {
        if (isset($alreadyDumpedObjects['ProfileGroup'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProfileGroup'][$this->getPrimaryKey()] = true;
        $keys = ProfileGroupPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getSnapshotId(),
            $keys[2] => $this->getDisplayNameMale(),
            $keys[3] => $this->getDisplayNameFemale(),
            $keys[4] => $this->getDisplayNameNeutral(),
            $keys[5] => $this->getAbbreviation(),
            $keys[6] => $this->getIsManager(),
            $keys[7] => $this->getDescription(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aSnapshot) {
                $result['Snapshot'] = $this->aSnapshot->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collActivityProfileGroups) {
                $result['ActivityProfileGroups'] = $this->collActivityProfileGroups->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collProfiles) {
                $result['Profiles'] = $this->collProfiles->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collGroupingProfileGroups) {
                $result['GroupingProfileGroups'] = $this->collGroupingProfileGroups->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEventProfileGroups) {
                $result['EventProfileGroups'] = $this->collEventProfileGroups->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collFolderPermissions) {
                $result['FolderPermissions'] = $this->collFolderPermissions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param string $name peer name
     * @param mixed $value field value
     * @param string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = ProfileGroupPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @param mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setSnapshotId($value);
                break;
            case 2:
                $this->setDisplayNameMale($value);
                break;
            case 3:
                $this->setDisplayNameFemale($value);
                break;
            case 4:
                $this->setDisplayNameNeutral($value);
                break;
            case 5:
                $this->setAbbreviation($value);
                break;
            case 6:
                $this->setIsManager($value);
                break;
            case 7:
                $this->setDescription($value);
                break;
        } // switch()
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     * The default key type is the column's BasePeer::TYPE_PHPNAME
     *
     * @param array  $arr     An array to populate the object from.
     * @param string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
    {
        $keys = ProfileGroupPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setSnapshotId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setDisplayNameMale($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setDisplayNameFemale($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setDisplayNameNeutral($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setAbbreviation($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setIsManager($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setDescription($arr[$keys[7]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProfileGroupPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProfileGroupPeer::ID)) $criteria->add(ProfileGroupPeer::ID, $this->id);
        if ($this->isColumnModified(ProfileGroupPeer::SNAPSHOT_ID)) $criteria->add(ProfileGroupPeer::SNAPSHOT_ID, $this->snapshot_id);
        if ($this->isColumnModified(ProfileGroupPeer::DISPLAY_NAME_MALE)) $criteria->add(ProfileGroupPeer::DISPLAY_NAME_MALE, $this->display_name_male);
        if ($this->isColumnModified(ProfileGroupPeer::DISPLAY_NAME_FEMALE)) $criteria->add(ProfileGroupPeer::DISPLAY_NAME_FEMALE, $this->display_name_female);
        if ($this->isColumnModified(ProfileGroupPeer::DISPLAY_NAME_NEUTRAL)) $criteria->add(ProfileGroupPeer::DISPLAY_NAME_NEUTRAL, $this->display_name_neutral);
        if ($this->isColumnModified(ProfileGroupPeer::ABBREVIATION)) $criteria->add(ProfileGroupPeer::ABBREVIATION, $this->abbreviation);
        if ($this->isColumnModified(ProfileGroupPeer::IS_MANAGER)) $criteria->add(ProfileGroupPeer::IS_MANAGER, $this->is_manager);
        if ($this->isColumnModified(ProfileGroupPeer::DESCRIPTION)) $criteria->add(ProfileGroupPeer::DESCRIPTION, $this->description);

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(ProfileGroupPeer::DATABASE_NAME);
        $criteria->add(ProfileGroupPeer::ID, $this->id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProfileGroup (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSnapshotId($this->getSnapshotId());
        $copyObj->setDisplayNameMale($this->getDisplayNameMale());
        $copyObj->setDisplayNameFemale($this->getDisplayNameFemale());
        $copyObj->setDisplayNameNeutral($this->getDisplayNameNeutral());
        $copyObj->setAbbreviation($this->getAbbreviation());
        $copyObj->setIsManager($this->getIsManager());
        $copyObj->setDescription($this->getDescription());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getActivityProfileGroups() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addActivityProfileGroup($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getProfiles() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addProfile($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getGroupingProfileGroups() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addGroupingProfileGroup($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEventProfileGroups() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEventProfileGroup($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getFolderPermissions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addFolderPermission($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return ProfileGroup Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Returns a peer instance associated with this om.
     *
     * Since Peer classes are not to have any instance attributes, this method returns the
     * same instance for all member of this class. The method could therefore
     * be static, but this would prevent one from overriding the behavior.
     *
     * @return ProfileGroupPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProfileGroupPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Snapshot object.
     *
     * @param             Snapshot $v
     * @return ProfileGroup The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSnapshot(Snapshot $v = null)
    {
        if ($v === null) {
            $this->setSnapshotId(NULL);
        } else {
            $this->setSnapshotId($v->getId());
        }

        $this->aSnapshot = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Snapshot object, it will not be re-added.
        if ($v !== null) {
            $v->addProfileGroup($this);
        }


        return $this;
    }


    /**
     * Get the associated Snapshot object
     *
     * @param PropelPDO $con Optional Connection object.
     * @return Snapshot The associated Snapshot object.
     * @throws PropelException
     */
    public function getSnapshot(PropelPDO $con = null)
    {
        if ($this->aSnapshot === null && ($this->snapshot_id !== null)) {
            $this->aSnapshot = SnapshotQuery::create()->findPk($this->snapshot_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSnapshot->addProfileGroups($this);
             */
        }

        return $this->aSnapshot;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('ActivityProfileGroup' == $relationName) {
            $this->initActivityProfileGroups();
        }
        if ('Profile' == $relationName) {
            $this->initProfiles();
        }
        if ('GroupingProfileGroup' == $relationName) {
            $this->initGroupingProfileGroups();
        }
        if ('EventProfileGroup' == $relationName) {
            $this->initEventProfileGroups();
        }
        if ('FolderPermission' == $relationName) {
            $this->initFolderPermissions();
        }
    }

    /**
     * Clears out the collActivityProfileGroups collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addActivityProfileGroups()
     */
    public function clearActivityProfileGroups()
    {
        $this->collActivityProfileGroups = null; // important to set this to null since that means it is uninitialized
        $this->collActivityProfileGroupsPartial = null;
    }

    /**
     * reset is the collActivityProfileGroups collection loaded partially
     *
     * @return void
     */
    public function resetPartialActivityProfileGroups($v = true)
    {
        $this->collActivityProfileGroupsPartial = $v;
    }

    /**
     * Initializes the collActivityProfileGroups collection.
     *
     * By default this just sets the collActivityProfileGroups collection to an empty array (like clearcollActivityProfileGroups());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initActivityProfileGroups($overrideExisting = true)
    {
        if (null !== $this->collActivityProfileGroups && !$overrideExisting) {
            return;
        }
        $this->collActivityProfileGroups = new PropelObjectCollection();
        $this->collActivityProfileGroups->setModel('ActivityProfileGroup');
    }

    /**
     * Gets an array of ActivityProfileGroup objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProfileGroup is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ActivityProfileGroup[] List of ActivityProfileGroup objects
     * @throws PropelException
     */
    public function getActivityProfileGroups($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collActivityProfileGroupsPartial && !$this->isNew();
        if (null === $this->collActivityProfileGroups || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collActivityProfileGroups) {
                // return empty collection
                $this->initActivityProfileGroups();
            } else {
                $collActivityProfileGroups = ActivityProfileGroupQuery::create(null, $criteria)
                    ->filterByProfileGroup($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collActivityProfileGroupsPartial && count($collActivityProfileGroups)) {
                      $this->initActivityProfileGroups(false);

                      foreach($collActivityProfileGroups as $obj) {
                        if (false == $this->collActivityProfileGroups->contains($obj)) {
                          $this->collActivityProfileGroups->append($obj);
                        }
                      }

                      $this->collActivityProfileGroupsPartial = true;
                    }

                    return $collActivityProfileGroups;
                }

                if($partial && $this->collActivityProfileGroups) {
                    foreach($this->collActivityProfileGroups as $obj) {
                        if($obj->isNew()) {
                            $collActivityProfileGroups[] = $obj;
                        }
                    }
                }

                $this->collActivityProfileGroups = $collActivityProfileGroups;
                $this->collActivityProfileGroupsPartial = false;
            }
        }

        return $this->collActivityProfileGroups;
    }

    /**
     * Sets a collection of ActivityProfileGroup objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $activityProfileGroups A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setActivityProfileGroups(PropelCollection $activityProfileGroups, PropelPDO $con = null)
    {
        $this->activityProfileGroupsScheduledForDeletion = $this->getActivityProfileGroups(new Criteria(), $con)->diff($activityProfileGroups);

        foreach ($this->activityProfileGroupsScheduledForDeletion as $activityProfileGroupRemoved) {
            $activityProfileGroupRemoved->setProfileGroup(null);
        }

        $this->collActivityProfileGroups = null;
        foreach ($activityProfileGroups as $activityProfileGroup) {
            $this->addActivityProfileGroup($activityProfileGroup);
        }

        $this->collActivityProfileGroups = $activityProfileGroups;
        $this->collActivityProfileGroupsPartial = false;
    }

    /**
     * Returns the number of related ActivityProfileGroup objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ActivityProfileGroup objects.
     * @throws PropelException
     */
    public function countActivityProfileGroups(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collActivityProfileGroupsPartial && !$this->isNew();
        if (null === $this->collActivityProfileGroups || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collActivityProfileGroups) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getActivityProfileGroups());
                }
                $query = ActivityProfileGroupQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByProfileGroup($this)
                    ->count($con);
            }
        } else {
            return count($this->collActivityProfileGroups);
        }
    }

    /**
     * Method called to associate a ActivityProfileGroup object to this object
     * through the ActivityProfileGroup foreign key attribute.
     *
     * @param    ActivityProfileGroup $l ActivityProfileGroup
     * @return ProfileGroup The current object (for fluent API support)
     */
    public function addActivityProfileGroup(ActivityProfileGroup $l)
    {
        if ($this->collActivityProfileGroups === null) {
            $this->initActivityProfileGroups();
            $this->collActivityProfileGroupsPartial = true;
        }
        if (!in_array($l, $this->collActivityProfileGroups->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddActivityProfileGroup($l);
        }

        return $this;
    }

    /**
     * @param	ActivityProfileGroup $activityProfileGroup The activityProfileGroup object to add.
     */
    protected function doAddActivityProfileGroup($activityProfileGroup)
    {
        $this->collActivityProfileGroups[]= $activityProfileGroup;
        $activityProfileGroup->setProfileGroup($this);
    }

    /**
     * @param	ActivityProfileGroup $activityProfileGroup The activityProfileGroup object to remove.
     */
    public function removeActivityProfileGroup($activityProfileGroup)
    {
        if ($this->getActivityProfileGroups()->contains($activityProfileGroup)) {
            $this->collActivityProfileGroups->remove($this->collActivityProfileGroups->search($activityProfileGroup));
            if (null === $this->activityProfileGroupsScheduledForDeletion) {
                $this->activityProfileGroupsScheduledForDeletion = clone $this->collActivityProfileGroups;
                $this->activityProfileGroupsScheduledForDeletion->clear();
            }
            $this->activityProfileGroupsScheduledForDeletion[]= $activityProfileGroup;
            $activityProfileGroup->setProfileGroup(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this ProfileGroup is new, it will return
     * an empty collection; or if this ProfileGroup has previously
     * been saved, it will retrieve related ActivityProfileGroups from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in ProfileGroup.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ActivityProfileGroup[] List of ActivityProfileGroup objects
     */
    public function getActivityProfileGroupsJoinActivity($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ActivityProfileGroupQuery::create(null, $criteria);
        $query->joinWith('Activity', $join_behavior);

        return $this->getActivityProfileGroups($query, $con);
    }

    /**
     * Clears out the collProfiles collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addProfiles()
     */
    public function clearProfiles()
    {
        $this->collProfiles = null; // important to set this to null since that means it is uninitialized
        $this->collProfilesPartial = null;
    }

    /**
     * reset is the collProfiles collection loaded partially
     *
     * @return void
     */
    public function resetPartialProfiles($v = true)
    {
        $this->collProfilesPartial = $v;
    }

    /**
     * Initializes the collProfiles collection.
     *
     * By default this just sets the collProfiles collection to an empty array (like clearcollProfiles());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initProfiles($overrideExisting = true)
    {
        if (null !== $this->collProfiles && !$overrideExisting) {
            return;
        }
        $this->collProfiles = new PropelObjectCollection();
        $this->collProfiles->setModel('Profile');
    }

    /**
     * Gets an array of Profile objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProfileGroup is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Profile[] List of Profile objects
     * @throws PropelException
     */
    public function getProfiles($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collProfilesPartial && !$this->isNew();
        if (null === $this->collProfiles || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collProfiles) {
                // return empty collection
                $this->initProfiles();
            } else {
                $collProfiles = ProfileQuery::create(null, $criteria)
                    ->filterByProfileGroup($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collProfilesPartial && count($collProfiles)) {
                      $this->initProfiles(false);

                      foreach($collProfiles as $obj) {
                        if (false == $this->collProfiles->contains($obj)) {
                          $this->collProfiles->append($obj);
                        }
                      }

                      $this->collProfilesPartial = true;
                    }

                    return $collProfiles;
                }

                if($partial && $this->collProfiles) {
                    foreach($this->collProfiles as $obj) {
                        if($obj->isNew()) {
                            $collProfiles[] = $obj;
                        }
                    }
                }

                $this->collProfiles = $collProfiles;
                $this->collProfilesPartial = false;
            }
        }

        return $this->collProfiles;
    }

    /**
     * Sets a collection of Profile objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $profiles A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setProfiles(PropelCollection $profiles, PropelPDO $con = null)
    {
        $this->profilesScheduledForDeletion = $this->getProfiles(new Criteria(), $con)->diff($profiles);

        foreach ($this->profilesScheduledForDeletion as $profileRemoved) {
            $profileRemoved->setProfileGroup(null);
        }

        $this->collProfiles = null;
        foreach ($profiles as $profile) {
            $this->addProfile($profile);
        }

        $this->collProfiles = $profiles;
        $this->collProfilesPartial = false;
    }

    /**
     * Returns the number of related Profile objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Profile objects.
     * @throws PropelException
     */
    public function countProfiles(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collProfilesPartial && !$this->isNew();
        if (null === $this->collProfiles || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProfiles) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getProfiles());
                }
                $query = ProfileQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByProfileGroup($this)
                    ->count($con);
            }
        } else {
            return count($this->collProfiles);
        }
    }

    /**
     * Method called to associate a Profile object to this object
     * through the Profile foreign key attribute.
     *
     * @param    Profile $l Profile
     * @return ProfileGroup The current object (for fluent API support)
     */
    public function addProfile(Profile $l)
    {
        if ($this->collProfiles === null) {
            $this->initProfiles();
            $this->collProfilesPartial = true;
        }
        if (!in_array($l, $this->collProfiles->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddProfile($l);
        }

        return $this;
    }

    /**
     * @param	Profile $profile The profile object to add.
     */
    protected function doAddProfile($profile)
    {
        $this->collProfiles[]= $profile;
        $profile->setProfileGroup($this);
    }

    /**
     * @param	Profile $profile The profile object to remove.
     */
    public function removeProfile($profile)
    {
        if ($this->getProfiles()->contains($profile)) {
            $this->collProfiles->remove($this->collProfiles->search($profile));
            if (null === $this->profilesScheduledForDeletion) {
                $this->profilesScheduledForDeletion = clone $this->collProfiles;
                $this->profilesScheduledForDeletion->clear();
            }
            $this->profilesScheduledForDeletion[]= $profile;
            $profile->setProfileGroup(null);
        }
    }

    /**
     * Clears out the collGroupingProfileGroups collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addGroupingProfileGroups()
     */
    public function clearGroupingProfileGroups()
    {
        $this->collGroupingProfileGroups = null; // important to set this to null since that means it is uninitialized
        $this->collGroupingProfileGroupsPartial = null;
    }

    /**
     * reset is the collGroupingProfileGroups collection loaded partially
     *
     * @return void
     */
    public function resetPartialGroupingProfileGroups($v = true)
    {
        $this->collGroupingProfileGroupsPartial = $v;
    }

    /**
     * Initializes the collGroupingProfileGroups collection.
     *
     * By default this just sets the collGroupingProfileGroups collection to an empty array (like clearcollGroupingProfileGroups());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initGroupingProfileGroups($overrideExisting = true)
    {
        if (null !== $this->collGroupingProfileGroups && !$overrideExisting) {
            return;
        }
        $this->collGroupingProfileGroups = new PropelObjectCollection();
        $this->collGroupingProfileGroups->setModel('GroupingProfileGroup');
    }

    /**
     * Gets an array of GroupingProfileGroup objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProfileGroup is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|GroupingProfileGroup[] List of GroupingProfileGroup objects
     * @throws PropelException
     */
    public function getGroupingProfileGroups($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collGroupingProfileGroupsPartial && !$this->isNew();
        if (null === $this->collGroupingProfileGroups || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collGroupingProfileGroups) {
                // return empty collection
                $this->initGroupingProfileGroups();
            } else {
                $collGroupingProfileGroups = GroupingProfileGroupQuery::create(null, $criteria)
                    ->filterByProfileGroup($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collGroupingProfileGroupsPartial && count($collGroupingProfileGroups)) {
                      $this->initGroupingProfileGroups(false);

                      foreach($collGroupingProfileGroups as $obj) {
                        if (false == $this->collGroupingProfileGroups->contains($obj)) {
                          $this->collGroupingProfileGroups->append($obj);
                        }
                      }

                      $this->collGroupingProfileGroupsPartial = true;
                    }

                    return $collGroupingProfileGroups;
                }

                if($partial && $this->collGroupingProfileGroups) {
                    foreach($this->collGroupingProfileGroups as $obj) {
                        if($obj->isNew()) {
                            $collGroupingProfileGroups[] = $obj;
                        }
                    }
                }

                $this->collGroupingProfileGroups = $collGroupingProfileGroups;
                $this->collGroupingProfileGroupsPartial = false;
            }
        }

        return $this->collGroupingProfileGroups;
    }

    /**
     * Sets a collection of GroupingProfileGroup objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $groupingProfileGroups A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setGroupingProfileGroups(PropelCollection $groupingProfileGroups, PropelPDO $con = null)
    {
        $this->groupingProfileGroupsScheduledForDeletion = $this->getGroupingProfileGroups(new Criteria(), $con)->diff($groupingProfileGroups);

        foreach ($this->groupingProfileGroupsScheduledForDeletion as $groupingProfileGroupRemoved) {
            $groupingProfileGroupRemoved->setProfileGroup(null);
        }

        $this->collGroupingProfileGroups = null;
        foreach ($groupingProfileGroups as $groupingProfileGroup) {
            $this->addGroupingProfileGroup($groupingProfileGroup);
        }

        $this->collGroupingProfileGroups = $groupingProfileGroups;
        $this->collGroupingProfileGroupsPartial = false;
    }

    /**
     * Returns the number of related GroupingProfileGroup objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related GroupingProfileGroup objects.
     * @throws PropelException
     */
    public function countGroupingProfileGroups(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collGroupingProfileGroupsPartial && !$this->isNew();
        if (null === $this->collGroupingProfileGroups || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collGroupingProfileGroups) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getGroupingProfileGroups());
                }
                $query = GroupingProfileGroupQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByProfileGroup($this)
                    ->count($con);
            }
        } else {
            return count($this->collGroupingProfileGroups);
        }
    }

    /**
     * Method called to associate a GroupingProfileGroup object to this object
     * through the GroupingProfileGroup foreign key attribute.
     *
     * @param    GroupingProfileGroup $l GroupingProfileGroup
     * @return ProfileGroup The current object (for fluent API support)
     */
    public function addGroupingProfileGroup(GroupingProfileGroup $l)
    {
        if ($this->collGroupingProfileGroups === null) {
            $this->initGroupingProfileGroups();
            $this->collGroupingProfileGroupsPartial = true;
        }
        if (!in_array($l, $this->collGroupingProfileGroups->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddGroupingProfileGroup($l);
        }

        return $this;
    }

    /**
     * @param	GroupingProfileGroup $groupingProfileGroup The groupingProfileGroup object to add.
     */
    protected function doAddGroupingProfileGroup($groupingProfileGroup)
    {
        $this->collGroupingProfileGroups[]= $groupingProfileGroup;
        $groupingProfileGroup->setProfileGroup($this);
    }

    /**
     * @param	GroupingProfileGroup $groupingProfileGroup The groupingProfileGroup object to remove.
     */
    public function removeGroupingProfileGroup($groupingProfileGroup)
    {
        if ($this->getGroupingProfileGroups()->contains($groupingProfileGroup)) {
            $this->collGroupingProfileGroups->remove($this->collGroupingProfileGroups->search($groupingProfileGroup));
            if (null === $this->groupingProfileGroupsScheduledForDeletion) {
                $this->groupingProfileGroupsScheduledForDeletion = clone $this->collGroupingProfileGroups;
                $this->groupingProfileGroupsScheduledForDeletion->clear();
            }
            $this->groupingProfileGroupsScheduledForDeletion[]= $groupingProfileGroup;
            $groupingProfileGroup->setProfileGroup(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this ProfileGroup is new, it will return
     * an empty collection; or if this ProfileGroup has previously
     * been saved, it will retrieve related GroupingProfileGroups from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in ProfileGroup.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|GroupingProfileGroup[] List of GroupingProfileGroup objects
     */
    public function getGroupingProfileGroupsJoinGrouping($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = GroupingProfileGroupQuery::create(null, $criteria);
        $query->joinWith('Grouping', $join_behavior);

        return $this->getGroupingProfileGroups($query, $con);
    }

    /**
     * Clears out the collEventProfileGroups collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEventProfileGroups()
     */
    public function clearEventProfileGroups()
    {
        $this->collEventProfileGroups = null; // important to set this to null since that means it is uninitialized
        $this->collEventProfileGroupsPartial = null;
    }

    /**
     * reset is the collEventProfileGroups collection loaded partially
     *
     * @return void
     */
    public function resetPartialEventProfileGroups($v = true)
    {
        $this->collEventProfileGroupsPartial = $v;
    }

    /**
     * Initializes the collEventProfileGroups collection.
     *
     * By default this just sets the collEventProfileGroups collection to an empty array (like clearcollEventProfileGroups());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEventProfileGroups($overrideExisting = true)
    {
        if (null !== $this->collEventProfileGroups && !$overrideExisting) {
            return;
        }
        $this->collEventProfileGroups = new PropelObjectCollection();
        $this->collEventProfileGroups->setModel('EventProfileGroup');
    }

    /**
     * Gets an array of EventProfileGroup objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProfileGroup is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|EventProfileGroup[] List of EventProfileGroup objects
     * @throws PropelException
     */
    public function getEventProfileGroups($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collEventProfileGroupsPartial && !$this->isNew();
        if (null === $this->collEventProfileGroups || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEventProfileGroups) {
                // return empty collection
                $this->initEventProfileGroups();
            } else {
                $collEventProfileGroups = EventProfileGroupQuery::create(null, $criteria)
                    ->filterByProfileGroup($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collEventProfileGroupsPartial && count($collEventProfileGroups)) {
                      $this->initEventProfileGroups(false);

                      foreach($collEventProfileGroups as $obj) {
                        if (false == $this->collEventProfileGroups->contains($obj)) {
                          $this->collEventProfileGroups->append($obj);
                        }
                      }

                      $this->collEventProfileGroupsPartial = true;
                    }

                    return $collEventProfileGroups;
                }

                if($partial && $this->collEventProfileGroups) {
                    foreach($this->collEventProfileGroups as $obj) {
                        if($obj->isNew()) {
                            $collEventProfileGroups[] = $obj;
                        }
                    }
                }

                $this->collEventProfileGroups = $collEventProfileGroups;
                $this->collEventProfileGroupsPartial = false;
            }
        }

        return $this->collEventProfileGroups;
    }

    /**
     * Sets a collection of EventProfileGroup objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $eventProfileGroups A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setEventProfileGroups(PropelCollection $eventProfileGroups, PropelPDO $con = null)
    {
        $this->eventProfileGroupsScheduledForDeletion = $this->getEventProfileGroups(new Criteria(), $con)->diff($eventProfileGroups);

        foreach ($this->eventProfileGroupsScheduledForDeletion as $eventProfileGroupRemoved) {
            $eventProfileGroupRemoved->setProfileGroup(null);
        }

        $this->collEventProfileGroups = null;
        foreach ($eventProfileGroups as $eventProfileGroup) {
            $this->addEventProfileGroup($eventProfileGroup);
        }

        $this->collEventProfileGroups = $eventProfileGroups;
        $this->collEventProfileGroupsPartial = false;
    }

    /**
     * Returns the number of related EventProfileGroup objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related EventProfileGroup objects.
     * @throws PropelException
     */
    public function countEventProfileGroups(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collEventProfileGroupsPartial && !$this->isNew();
        if (null === $this->collEventProfileGroups || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEventProfileGroups) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getEventProfileGroups());
                }
                $query = EventProfileGroupQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByProfileGroup($this)
                    ->count($con);
            }
        } else {
            return count($this->collEventProfileGroups);
        }
    }

    /**
     * Method called to associate a EventProfileGroup object to this object
     * through the EventProfileGroup foreign key attribute.
     *
     * @param    EventProfileGroup $l EventProfileGroup
     * @return ProfileGroup The current object (for fluent API support)
     */
    public function addEventProfileGroup(EventProfileGroup $l)
    {
        if ($this->collEventProfileGroups === null) {
            $this->initEventProfileGroups();
            $this->collEventProfileGroupsPartial = true;
        }
        if (!in_array($l, $this->collEventProfileGroups->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddEventProfileGroup($l);
        }

        return $this;
    }

    /**
     * @param	EventProfileGroup $eventProfileGroup The eventProfileGroup object to add.
     */
    protected function doAddEventProfileGroup($eventProfileGroup)
    {
        $this->collEventProfileGroups[]= $eventProfileGroup;
        $eventProfileGroup->setProfileGroup($this);
    }

    /**
     * @param	EventProfileGroup $eventProfileGroup The eventProfileGroup object to remove.
     */
    public function removeEventProfileGroup($eventProfileGroup)
    {
        if ($this->getEventProfileGroups()->contains($eventProfileGroup)) {
            $this->collEventProfileGroups->remove($this->collEventProfileGroups->search($eventProfileGroup));
            if (null === $this->eventProfileGroupsScheduledForDeletion) {
                $this->eventProfileGroupsScheduledForDeletion = clone $this->collEventProfileGroups;
                $this->eventProfileGroupsScheduledForDeletion->clear();
            }
            $this->eventProfileGroupsScheduledForDeletion[]= $eventProfileGroup;
            $eventProfileGroup->setProfileGroup(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this ProfileGroup is new, it will return
     * an empty collection; or if this ProfileGroup has previously
     * been saved, it will retrieve related EventProfileGroups from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in ProfileGroup.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|EventProfileGroup[] List of EventProfileGroup objects
     */
    public function getEventProfileGroupsJoinEvent($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = EventProfileGroupQuery::create(null, $criteria);
        $query->joinWith('Event', $join_behavior);

        return $this->getEventProfileGroups($query, $con);
    }

    /**
     * Clears out the collFolderPermissions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addFolderPermissions()
     */
    public function clearFolderPermissions()
    {
        $this->collFolderPermissions = null; // important to set this to null since that means it is uninitialized
        $this->collFolderPermissionsPartial = null;
    }

    /**
     * reset is the collFolderPermissions collection loaded partially
     *
     * @return void
     */
    public function resetPartialFolderPermissions($v = true)
    {
        $this->collFolderPermissionsPartial = $v;
    }

    /**
     * Initializes the collFolderPermissions collection.
     *
     * By default this just sets the collFolderPermissions collection to an empty array (like clearcollFolderPermissions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initFolderPermissions($overrideExisting = true)
    {
        if (null !== $this->collFolderPermissions && !$overrideExisting) {
            return;
        }
        $this->collFolderPermissions = new PropelObjectCollection();
        $this->collFolderPermissions->setModel('FolderPermission');
    }

    /**
     * Gets an array of FolderPermission objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProfileGroup is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|FolderPermission[] List of FolderPermission objects
     * @throws PropelException
     */
    public function getFolderPermissions($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collFolderPermissionsPartial && !$this->isNew();
        if (null === $this->collFolderPermissions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collFolderPermissions) {
                // return empty collection
                $this->initFolderPermissions();
            } else {
                $collFolderPermissions = FolderPermissionQuery::create(null, $criteria)
                    ->filterByProfileGroup($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collFolderPermissionsPartial && count($collFolderPermissions)) {
                      $this->initFolderPermissions(false);

                      foreach($collFolderPermissions as $obj) {
                        if (false == $this->collFolderPermissions->contains($obj)) {
                          $this->collFolderPermissions->append($obj);
                        }
                      }

                      $this->collFolderPermissionsPartial = true;
                    }

                    return $collFolderPermissions;
                }

                if($partial && $this->collFolderPermissions) {
                    foreach($this->collFolderPermissions as $obj) {
                        if($obj->isNew()) {
                            $collFolderPermissions[] = $obj;
                        }
                    }
                }

                $this->collFolderPermissions = $collFolderPermissions;
                $this->collFolderPermissionsPartial = false;
            }
        }

        return $this->collFolderPermissions;
    }

    /**
     * Sets a collection of FolderPermission objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $folderPermissions A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setFolderPermissions(PropelCollection $folderPermissions, PropelPDO $con = null)
    {
        $this->folderPermissionsScheduledForDeletion = $this->getFolderPermissions(new Criteria(), $con)->diff($folderPermissions);

        foreach ($this->folderPermissionsScheduledForDeletion as $folderPermissionRemoved) {
            $folderPermissionRemoved->setProfileGroup(null);
        }

        $this->collFolderPermissions = null;
        foreach ($folderPermissions as $folderPermission) {
            $this->addFolderPermission($folderPermission);
        }

        $this->collFolderPermissions = $folderPermissions;
        $this->collFolderPermissionsPartial = false;
    }

    /**
     * Returns the number of related FolderPermission objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related FolderPermission objects.
     * @throws PropelException
     */
    public function countFolderPermissions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collFolderPermissionsPartial && !$this->isNew();
        if (null === $this->collFolderPermissions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collFolderPermissions) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getFolderPermissions());
                }
                $query = FolderPermissionQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByProfileGroup($this)
                    ->count($con);
            }
        } else {
            return count($this->collFolderPermissions);
        }
    }

    /**
     * Method called to associate a FolderPermission object to this object
     * through the FolderPermission foreign key attribute.
     *
     * @param    FolderPermission $l FolderPermission
     * @return ProfileGroup The current object (for fluent API support)
     */
    public function addFolderPermission(FolderPermission $l)
    {
        if ($this->collFolderPermissions === null) {
            $this->initFolderPermissions();
            $this->collFolderPermissionsPartial = true;
        }
        if (!in_array($l, $this->collFolderPermissions->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddFolderPermission($l);
        }

        return $this;
    }

    /**
     * @param	FolderPermission $folderPermission The folderPermission object to add.
     */
    protected function doAddFolderPermission($folderPermission)
    {
        $this->collFolderPermissions[]= $folderPermission;
        $folderPermission->setProfileGroup($this);
    }

    /**
     * @param	FolderPermission $folderPermission The folderPermission object to remove.
     */
    public function removeFolderPermission($folderPermission)
    {
        if ($this->getFolderPermissions()->contains($folderPermission)) {
            $this->collFolderPermissions->remove($this->collFolderPermissions->search($folderPermission));
            if (null === $this->folderPermissionsScheduledForDeletion) {
                $this->folderPermissionsScheduledForDeletion = clone $this->collFolderPermissions;
                $this->folderPermissionsScheduledForDeletion->clear();
            }
            $this->folderPermissionsScheduledForDeletion[]= $folderPermission;
            $folderPermission->setProfileGroup(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this ProfileGroup is new, it will return
     * an empty collection; or if this ProfileGroup has previously
     * been saved, it will retrieve related FolderPermissions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in ProfileGroup.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|FolderPermission[] List of FolderPermission objects
     */
    public function getFolderPermissionsJoinFolder($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = FolderPermissionQuery::create(null, $criteria);
        $query->joinWith('Folder', $join_behavior);

        return $this->getFolderPermissions($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->snapshot_id = null;
        $this->display_name_male = null;
        $this->display_name_female = null;
        $this->display_name_neutral = null;
        $this->abbreviation = null;
        $this->is_manager = null;
        $this->description = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references to other model objects or collections of model objects.
     *
     * This method is a user-space workaround for PHP's inability to garbage collect
     * objects with circular references (even in PHP 5.3). This is currently necessary
     * when using Propel in certain daemon or large-volumne/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collActivityProfileGroups) {
                foreach ($this->collActivityProfileGroups as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collProfiles) {
                foreach ($this->collProfiles as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collGroupingProfileGroups) {
                foreach ($this->collGroupingProfileGroups as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEventProfileGroups) {
                foreach ($this->collEventProfileGroups as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collFolderPermissions) {
                foreach ($this->collFolderPermissions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        if ($this->collActivityProfileGroups instanceof PropelCollection) {
            $this->collActivityProfileGroups->clearIterator();
        }
        $this->collActivityProfileGroups = null;
        if ($this->collProfiles instanceof PropelCollection) {
            $this->collProfiles->clearIterator();
        }
        $this->collProfiles = null;
        if ($this->collGroupingProfileGroups instanceof PropelCollection) {
            $this->collGroupingProfileGroups->clearIterator();
        }
        $this->collGroupingProfileGroups = null;
        if ($this->collEventProfileGroups instanceof PropelCollection) {
            $this->collEventProfileGroups->clearIterator();
        }
        $this->collEventProfileGroups = null;
        if ($this->collFolderPermissions instanceof PropelCollection) {
            $this->collFolderPermissions->clearIterator();
        }
        $this->collFolderPermissions = null;
        $this->aSnapshot = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProfileGroupPeer::DEFAULT_STRING_FORMAT);
    }

    /**
     * return true is the object is in saving state
     *
     * @return boolean
     */
    public function isAlreadyInSave()
    {
        return $this->alreadyInSave;
    }

}
