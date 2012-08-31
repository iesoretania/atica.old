<?php


/**
 * Base class that represents a row from the 'grouping' table.
 *
 *
 *
 * @package    propel.generator.atica.om
 */
abstract class BaseGrouping extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'GroupingPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        GroupingPeer
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
     * The value for the order_nr field.
     * @var        int
     */
    protected $order_nr;

    /**
     * The value for the display_name field.
     * @var        string
     */
    protected $display_name;

    /**
     * The value for the description field.
     * @var        string
     */
    protected $description;

    /**
     * The value for the guest_access field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $guest_access;

    /**
     * @var        Snapshot
     */
    protected $aSnapshot;

    /**
     * @var        PropelObjectCollection|GroupingFolder[] Collection to store aggregation of GroupingFolder objects.
     */
    protected $collGroupingFolders;
    protected $collGroupingFoldersPartial;

    /**
     * @var        PropelObjectCollection|GroupingProfileGroup[] Collection to store aggregation of GroupingProfileGroup objects.
     */
    protected $collGroupingProfileGroups;
    protected $collGroupingProfileGroupsPartial;

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

    // sortable behavior

    /**
     * Queries to be executed in the save transaction
     * @var        array
     */
    protected $sortableQueries = array();

    /**
     * The old scope value.
     * @var        int
     */
    protected $oldScope;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $groupingFoldersScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $groupingProfileGroupsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->guest_access = false;
    }

    /**
     * Initializes internal state of BaseGrouping object.
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
     * Get the [order_nr] column value.
     *
     * @return int
     */
    public function getOrderNr()
    {
        return $this->order_nr;
    }

    /**
     * Get the [display_name] column value.
     *
     * @return string
     */
    public function getDisplayName()
    {
        return $this->display_name;
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
     * Get the [guest_access] column value.
     *
     * @return boolean
     */
    public function getGuestAccess()
    {
        return $this->guest_access;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Grouping The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = GroupingPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [snapshot_id] column.
     *
     * @param int $v new value
     * @return Grouping The current object (for fluent API support)
     */
    public function setSnapshotId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->snapshot_id !== $v) {
            // sortable behavior
            $this->oldScope = $this->getSnapshotId();

            $this->snapshot_id = $v;
            $this->modifiedColumns[] = GroupingPeer::SNAPSHOT_ID;
        }

        if ($this->aSnapshot !== null && $this->aSnapshot->getId() !== $v) {
            $this->aSnapshot = null;
        }


        return $this;
    } // setSnapshotId()

    /**
     * Set the value of [order_nr] column.
     *
     * @param int $v new value
     * @return Grouping The current object (for fluent API support)
     */
    public function setOrderNr($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->order_nr !== $v) {
            $this->order_nr = $v;
            $this->modifiedColumns[] = GroupingPeer::ORDER_NR;
        }


        return $this;
    } // setOrderNr()

    /**
     * Set the value of [display_name] column.
     *
     * @param string $v new value
     * @return Grouping The current object (for fluent API support)
     */
    public function setDisplayName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->display_name !== $v) {
            $this->display_name = $v;
            $this->modifiedColumns[] = GroupingPeer::DISPLAY_NAME;
        }


        return $this;
    } // setDisplayName()

    /**
     * Set the value of [description] column.
     *
     * @param string $v new value
     * @return Grouping The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[] = GroupingPeer::DESCRIPTION;
        }


        return $this;
    } // setDescription()

    /**
     * Sets the value of the [guest_access] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Grouping The current object (for fluent API support)
     */
    public function setGuestAccess($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->guest_access !== $v) {
            $this->guest_access = $v;
            $this->modifiedColumns[] = GroupingPeer::GUEST_ACCESS;
        }


        return $this;
    } // setGuestAccess()

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
            if ($this->guest_access !== false) {
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
            $this->order_nr = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->display_name = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->description = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->guest_access = ($row[$startcol + 5] !== null) ? (boolean) $row[$startcol + 5] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 6; // 6 = GroupingPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Grouping object", $e);
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
            $con = Propel::getConnection(GroupingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = GroupingPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aSnapshot = null;
            $this->collGroupingFolders = null;

            $this->collGroupingProfileGroups = null;

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
            $con = Propel::getConnection(GroupingPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = GroupingQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            // sortable behavior

            GroupingPeer::shiftRank(-1, $this->getOrderNr() + 1, null, $this->getSnapshotId(), $con);
            GroupingPeer::clearInstancePool();

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
            $con = Propel::getConnection(GroupingPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            // sortable behavior
            $this->processSortableQueries($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // sortable behavior
                if (!$this->isColumnModified(GroupingPeer::RANK_COL)) {
                    $this->setOrderNr(GroupingQuery::create()->getMaxRank($this->getSnapshotId(), $con) + 1);
                }

            } else {
                $ret = $ret && $this->preUpdate($con);
                // sortable behavior
                // if scope has changed and rank was not modified (if yes, assuming superior action)
                // insert object to the end of new scope and cleanup old one
                if ($this->isColumnModified(GroupingPeer::SCOPE_COL) && !$this->isColumnModified(GroupingPeer::RANK_COL)) {
                    GroupingPeer::shiftRank(-1, $this->getOrderNr() + 1, null, $this->oldScope, $con);
                    $this->insertAtBottom($con);
                }

            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                GroupingPeer::addInstanceToPool($this);
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

            if ($this->groupingFoldersScheduledForDeletion !== null) {
                if (!$this->groupingFoldersScheduledForDeletion->isEmpty()) {
                    GroupingFolderQuery::create()
                        ->filterByPrimaryKeys($this->groupingFoldersScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->groupingFoldersScheduledForDeletion = null;
                }
            }

            if ($this->collGroupingFolders !== null) {
                foreach ($this->collGroupingFolders as $referrerFK) {
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

        $this->modifiedColumns[] = GroupingPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . GroupingPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(GroupingPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`ID`';
        }
        if ($this->isColumnModified(GroupingPeer::SNAPSHOT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`SNAPSHOT_ID`';
        }
        if ($this->isColumnModified(GroupingPeer::ORDER_NR)) {
            $modifiedColumns[':p' . $index++]  = '`ORDER_NR`';
        }
        if ($this->isColumnModified(GroupingPeer::DISPLAY_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`DISPLAY_NAME`';
        }
        if ($this->isColumnModified(GroupingPeer::DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`DESCRIPTION`';
        }
        if ($this->isColumnModified(GroupingPeer::GUEST_ACCESS)) {
            $modifiedColumns[':p' . $index++]  = '`GUEST_ACCESS`';
        }

        $sql = sprintf(
            'INSERT INTO `grouping` (%s) VALUES (%s)',
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
                    case '`ORDER_NR`':
                        $stmt->bindValue($identifier, $this->order_nr, PDO::PARAM_INT);
                        break;
                    case '`DISPLAY_NAME`':
                        $stmt->bindValue($identifier, $this->display_name, PDO::PARAM_STR);
                        break;
                    case '`DESCRIPTION`':
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
                        break;
                    case '`GUEST_ACCESS`':
                        $stmt->bindValue($identifier, (int) $this->guest_access, PDO::PARAM_INT);
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


            if (($retval = GroupingPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collGroupingFolders !== null) {
                    foreach ($this->collGroupingFolders as $referrerFK) {
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
        $pos = GroupingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getOrderNr();
                break;
            case 3:
                return $this->getDisplayName();
                break;
            case 4:
                return $this->getDescription();
                break;
            case 5:
                return $this->getGuestAccess();
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
        if (isset($alreadyDumpedObjects['Grouping'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Grouping'][$this->getPrimaryKey()] = true;
        $keys = GroupingPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getSnapshotId(),
            $keys[2] => $this->getOrderNr(),
            $keys[3] => $this->getDisplayName(),
            $keys[4] => $this->getDescription(),
            $keys[5] => $this->getGuestAccess(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aSnapshot) {
                $result['Snapshot'] = $this->aSnapshot->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collGroupingFolders) {
                $result['GroupingFolders'] = $this->collGroupingFolders->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collGroupingProfileGroups) {
                $result['GroupingProfileGroups'] = $this->collGroupingProfileGroups->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = GroupingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setOrderNr($value);
                break;
            case 3:
                $this->setDisplayName($value);
                break;
            case 4:
                $this->setDescription($value);
                break;
            case 5:
                $this->setGuestAccess($value);
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
        $keys = GroupingPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setSnapshotId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setOrderNr($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setDisplayName($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setDescription($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setGuestAccess($arr[$keys[5]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(GroupingPeer::DATABASE_NAME);

        if ($this->isColumnModified(GroupingPeer::ID)) $criteria->add(GroupingPeer::ID, $this->id);
        if ($this->isColumnModified(GroupingPeer::SNAPSHOT_ID)) $criteria->add(GroupingPeer::SNAPSHOT_ID, $this->snapshot_id);
        if ($this->isColumnModified(GroupingPeer::ORDER_NR)) $criteria->add(GroupingPeer::ORDER_NR, $this->order_nr);
        if ($this->isColumnModified(GroupingPeer::DISPLAY_NAME)) $criteria->add(GroupingPeer::DISPLAY_NAME, $this->display_name);
        if ($this->isColumnModified(GroupingPeer::DESCRIPTION)) $criteria->add(GroupingPeer::DESCRIPTION, $this->description);
        if ($this->isColumnModified(GroupingPeer::GUEST_ACCESS)) $criteria->add(GroupingPeer::GUEST_ACCESS, $this->guest_access);

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
        $criteria = new Criteria(GroupingPeer::DATABASE_NAME);
        $criteria->add(GroupingPeer::ID, $this->id);

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
     * @param object $copyObj An object of Grouping (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSnapshotId($this->getSnapshotId());
        $copyObj->setOrderNr($this->getOrderNr());
        $copyObj->setDisplayName($this->getDisplayName());
        $copyObj->setDescription($this->getDescription());
        $copyObj->setGuestAccess($this->getGuestAccess());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getGroupingFolders() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addGroupingFolder($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getGroupingProfileGroups() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addGroupingProfileGroup($relObj->copy($deepCopy));
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
     * @return Grouping Clone of current object.
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
     * @return GroupingPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new GroupingPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Snapshot object.
     *
     * @param             Snapshot $v
     * @return Grouping The current object (for fluent API support)
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
            $v->addGrouping($this);
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
                $this->aSnapshot->addGroupings($this);
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
        if ('GroupingFolder' == $relationName) {
            $this->initGroupingFolders();
        }
        if ('GroupingProfileGroup' == $relationName) {
            $this->initGroupingProfileGroups();
        }
    }

    /**
     * Clears out the collGroupingFolders collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addGroupingFolders()
     */
    public function clearGroupingFolders()
    {
        $this->collGroupingFolders = null; // important to set this to null since that means it is uninitialized
        $this->collGroupingFoldersPartial = null;
    }

    /**
     * reset is the collGroupingFolders collection loaded partially
     *
     * @return void
     */
    public function resetPartialGroupingFolders($v = true)
    {
        $this->collGroupingFoldersPartial = $v;
    }

    /**
     * Initializes the collGroupingFolders collection.
     *
     * By default this just sets the collGroupingFolders collection to an empty array (like clearcollGroupingFolders());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initGroupingFolders($overrideExisting = true)
    {
        if (null !== $this->collGroupingFolders && !$overrideExisting) {
            return;
        }
        $this->collGroupingFolders = new PropelObjectCollection();
        $this->collGroupingFolders->setModel('GroupingFolder');
    }

    /**
     * Gets an array of GroupingFolder objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Grouping is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|GroupingFolder[] List of GroupingFolder objects
     * @throws PropelException
     */
    public function getGroupingFolders($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collGroupingFoldersPartial && !$this->isNew();
        if (null === $this->collGroupingFolders || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collGroupingFolders) {
                // return empty collection
                $this->initGroupingFolders();
            } else {
                $collGroupingFolders = GroupingFolderQuery::create(null, $criteria)
                    ->filterByGrouping($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collGroupingFoldersPartial && count($collGroupingFolders)) {
                      $this->initGroupingFolders(false);

                      foreach($collGroupingFolders as $obj) {
                        if (false == $this->collGroupingFolders->contains($obj)) {
                          $this->collGroupingFolders->append($obj);
                        }
                      }

                      $this->collGroupingFoldersPartial = true;
                    }

                    return $collGroupingFolders;
                }

                if($partial && $this->collGroupingFolders) {
                    foreach($this->collGroupingFolders as $obj) {
                        if($obj->isNew()) {
                            $collGroupingFolders[] = $obj;
                        }
                    }
                }

                $this->collGroupingFolders = $collGroupingFolders;
                $this->collGroupingFoldersPartial = false;
            }
        }

        return $this->collGroupingFolders;
    }

    /**
     * Sets a collection of GroupingFolder objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $groupingFolders A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setGroupingFolders(PropelCollection $groupingFolders, PropelPDO $con = null)
    {
        $this->groupingFoldersScheduledForDeletion = $this->getGroupingFolders(new Criteria(), $con)->diff($groupingFolders);

        foreach ($this->groupingFoldersScheduledForDeletion as $groupingFolderRemoved) {
            $groupingFolderRemoved->setGrouping(null);
        }

        $this->collGroupingFolders = null;
        foreach ($groupingFolders as $groupingFolder) {
            $this->addGroupingFolder($groupingFolder);
        }

        $this->collGroupingFolders = $groupingFolders;
        $this->collGroupingFoldersPartial = false;
    }

    /**
     * Returns the number of related GroupingFolder objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related GroupingFolder objects.
     * @throws PropelException
     */
    public function countGroupingFolders(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collGroupingFoldersPartial && !$this->isNew();
        if (null === $this->collGroupingFolders || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collGroupingFolders) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getGroupingFolders());
                }
                $query = GroupingFolderQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByGrouping($this)
                    ->count($con);
            }
        } else {
            return count($this->collGroupingFolders);
        }
    }

    /**
     * Method called to associate a GroupingFolder object to this object
     * through the GroupingFolder foreign key attribute.
     *
     * @param    GroupingFolder $l GroupingFolder
     * @return Grouping The current object (for fluent API support)
     */
    public function addGroupingFolder(GroupingFolder $l)
    {
        if ($this->collGroupingFolders === null) {
            $this->initGroupingFolders();
            $this->collGroupingFoldersPartial = true;
        }
        if (!in_array($l, $this->collGroupingFolders->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddGroupingFolder($l);
        }

        return $this;
    }

    /**
     * @param	GroupingFolder $groupingFolder The groupingFolder object to add.
     */
    protected function doAddGroupingFolder($groupingFolder)
    {
        $this->collGroupingFolders[]= $groupingFolder;
        $groupingFolder->setGrouping($this);
    }

    /**
     * @param	GroupingFolder $groupingFolder The groupingFolder object to remove.
     */
    public function removeGroupingFolder($groupingFolder)
    {
        if ($this->getGroupingFolders()->contains($groupingFolder)) {
            $this->collGroupingFolders->remove($this->collGroupingFolders->search($groupingFolder));
            if (null === $this->groupingFoldersScheduledForDeletion) {
                $this->groupingFoldersScheduledForDeletion = clone $this->collGroupingFolders;
                $this->groupingFoldersScheduledForDeletion->clear();
            }
            $this->groupingFoldersScheduledForDeletion[]= $groupingFolder;
            $groupingFolder->setGrouping(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Grouping is new, it will return
     * an empty collection; or if this Grouping has previously
     * been saved, it will retrieve related GroupingFolders from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Grouping.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|GroupingFolder[] List of GroupingFolder objects
     */
    public function getGroupingFoldersJoinFolder($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = GroupingFolderQuery::create(null, $criteria);
        $query->joinWith('Folder', $join_behavior);

        return $this->getGroupingFolders($query, $con);
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
     * If this Grouping is new, it will return
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
                    ->filterByGrouping($this)
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
            $groupingProfileGroupRemoved->setGrouping(null);
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
                    ->filterByGrouping($this)
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
     * @return Grouping The current object (for fluent API support)
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
        $groupingProfileGroup->setGrouping($this);
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
            $groupingProfileGroup->setGrouping(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Grouping is new, it will return
     * an empty collection; or if this Grouping has previously
     * been saved, it will retrieve related GroupingProfileGroups from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Grouping.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|GroupingProfileGroup[] List of GroupingProfileGroup objects
     */
    public function getGroupingProfileGroupsJoinProfileGroup($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = GroupingProfileGroupQuery::create(null, $criteria);
        $query->joinWith('ProfileGroup', $join_behavior);

        return $this->getGroupingProfileGroups($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->snapshot_id = null;
        $this->order_nr = null;
        $this->display_name = null;
        $this->description = null;
        $this->guest_access = null;
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
            if ($this->collGroupingFolders) {
                foreach ($this->collGroupingFolders as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collGroupingProfileGroups) {
                foreach ($this->collGroupingProfileGroups as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        if ($this->collGroupingFolders instanceof PropelCollection) {
            $this->collGroupingFolders->clearIterator();
        }
        $this->collGroupingFolders = null;
        if ($this->collGroupingProfileGroups instanceof PropelCollection) {
            $this->collGroupingProfileGroups->clearIterator();
        }
        $this->collGroupingProfileGroups = null;
        $this->aSnapshot = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string The value of the 'display_name' column
     */
    public function __toString()
    {
        return (string) $this->getDisplayName();
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

    // sortable behavior

    /**
     * Wrap the getter for rank value
     *
     * @return    int
     */
    public function getRank()
    {
        return $this->order_nr;
    }

    /**
     * Wrap the setter for rank value
     *
     * @param     int
     * @return    Grouping
     */
    public function setRank($v)
    {
        return $this->setOrderNr($v);
    }


    /**
     * Wrap the getter for scope value
     *
     * @return    int
     */
    public function getScopeValue()
    {
        return $this->snapshot_id;
    }

    /**
     * Wrap the setter for scope value
     *
     * @param     int
     * @return    Grouping
     */
    public function setScopeValue($v)
    {
        return $this->setSnapshotId($v);
    }

    /**
     * Check if the object is first in the list, i.e. if it has 1 for rank
     *
     * @return    boolean
     */
    public function isFirst()
    {
        return $this->getOrderNr() == 1;
    }

    /**
     * Check if the object is last in the list, i.e. if its rank is the highest rank
     *
     * @param     PropelPDO  $con      optional connection
     *
     * @return    boolean
     */
    public function isLast(PropelPDO $con = null)
    {
        return $this->getOrderNr() == GroupingQuery::create()->getMaxRank($this->getSnapshotId(), $con);
    }

    /**
     * Get the next item in the list, i.e. the one for which rank is immediately higher
     *
     * @param     PropelPDO  $con      optional connection
     *
     * @return    Grouping
     */
    public function getNext(PropelPDO $con = null)
    {

        return GroupingQuery::create()->findOneByRank($this->getOrderNr() + 1, $this->getSnapshotId(), $con);
    }

    /**
     * Get the previous item in the list, i.e. the one for which rank is immediately lower
     *
     * @param     PropelPDO  $con      optional connection
     *
     * @return    Grouping
     */
    public function getPrevious(PropelPDO $con = null)
    {

        return GroupingQuery::create()->findOneByRank($this->getOrderNr() - 1, $this->getSnapshotId(), $con);
    }

    /**
     * Insert at specified rank
     * The modifications are not persisted until the object is saved.
     *
     * @param     integer    $rank rank value
     * @param     PropelPDO  $con      optional connection
     *
     * @return    Grouping the current object
     *
     * @throws    PropelException
     */
    public function insertAtRank($rank, PropelPDO $con = null)
    {
        $maxRank = GroupingQuery::create()->getMaxRank($this->getSnapshotId(), $con);
        if ($rank < 1 || $rank > $maxRank + 1) {
            throw new PropelException('Invalid rank ' . $rank);
        }
        // move the object in the list, at the given rank
        $this->setOrderNr($rank);
        if ($rank != $maxRank + 1) {
            // Keep the list modification query for the save() transaction
            $this->sortableQueries []= array(
                'callable'  => array(self::PEER, 'shiftRank'),
                'arguments' => array(1, $rank, null, $this->getSnapshotId())
            );
        }

        return $this;
    }

    /**
     * Insert in the last rank
     * The modifications are not persisted until the object is saved.
     *
     * @param PropelPDO $con optional connection
     *
     * @return    Grouping the current object
     *
     * @throws    PropelException
     */
    public function insertAtBottom(PropelPDO $con = null)
    {
        $this->setOrderNr(GroupingQuery::create()->getMaxRank($this->getSnapshotId(), $con) + 1);

        return $this;
    }

    /**
     * Insert in the first rank
     * The modifications are not persisted until the object is saved.
     *
     * @return    Grouping the current object
     */
    public function insertAtTop()
    {
        return $this->insertAtRank(1);
    }

    /**
     * Move the object to a new rank, and shifts the rank
     * Of the objects inbetween the old and new rank accordingly
     *
     * @param     integer   $newRank rank value
     * @param     PropelPDO $con optional connection
     *
     * @return    Grouping the current object
     *
     * @throws    PropelException
     */
    public function moveToRank($newRank, PropelPDO $con = null)
    {
        if ($this->isNew()) {
            throw new PropelException('New objects cannot be moved. Please use insertAtRank() instead');
        }
        if ($con === null) {
            $con = Propel::getConnection(GroupingPeer::DATABASE_NAME);
        }
        if ($newRank < 1 || $newRank > GroupingQuery::create()->getMaxRank($this->getSnapshotId(), $con)) {
            throw new PropelException('Invalid rank ' . $newRank);
        }

        $oldRank = $this->getOrderNr();
        if ($oldRank == $newRank) {
            return $this;
        }

        $con->beginTransaction();
        try {
            // shift the objects between the old and the new rank
            $delta = ($oldRank < $newRank) ? -1 : 1;
            GroupingPeer::shiftRank($delta, min($oldRank, $newRank), max($oldRank, $newRank), $this->getSnapshotId(), $con);

            // move the object to its new rank
            $this->setOrderNr($newRank);
            $this->save($con);

            $con->commit();

            return $this;
        } catch (Exception $e) {
            $con->rollback();
            throw $e;
        }
    }

    /**
     * Exchange the rank of the object with the one passed as argument, and saves both objects
     *
     * @param     Grouping $object
     * @param     PropelPDO $con optional connection
     *
     * @return    Grouping the current object
     *
     * @throws Exception if the database cannot execute the two updates
     */
    public function swapWith($object, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(GroupingPeer::DATABASE_NAME);
        }
        $con->beginTransaction();
        try {
            $oldScope = $this->getSnapshotId();
            $newScope = $object->getSnapshotId();
            if ($oldScope != $newScope) {
                $this->setSnapshotId($newScope);
                $object->setSnapshotId($oldScope);
            }
            $oldRank = $this->getOrderNr();
            $newRank = $object->getOrderNr();
            $this->setOrderNr($newRank);
            $this->save($con);
            $object->setOrderNr($oldRank);
            $object->save($con);
            $con->commit();

            return $this;
        } catch (Exception $e) {
            $con->rollback();
            throw $e;
        }
    }

    /**
     * Move the object higher in the list, i.e. exchanges its rank with the one of the previous object
     *
     * @param     PropelPDO $con optional connection
     *
     * @return    Grouping the current object
     */
    public function moveUp(PropelPDO $con = null)
    {
        if ($this->isFirst()) {
            return $this;
        }
        if ($con === null) {
            $con = Propel::getConnection(GroupingPeer::DATABASE_NAME);
        }
        $con->beginTransaction();
        try {
            $prev = $this->getPrevious($con);
            $this->swapWith($prev, $con);
            $con->commit();

            return $this;
        } catch (Exception $e) {
            $con->rollback();
            throw $e;
        }
    }

    /**
     * Move the object higher in the list, i.e. exchanges its rank with the one of the next object
     *
     * @param     PropelPDO $con optional connection
     *
     * @return    Grouping the current object
     */
    public function moveDown(PropelPDO $con = null)
    {
        if ($this->isLast($con)) {
            return $this;
        }
        if ($con === null) {
            $con = Propel::getConnection(GroupingPeer::DATABASE_NAME);
        }
        $con->beginTransaction();
        try {
            $next = $this->getNext($con);
            $this->swapWith($next, $con);
            $con->commit();

            return $this;
        } catch (Exception $e) {
            $con->rollback();
            throw $e;
        }
    }

    /**
     * Move the object to the top of the list
     *
     * @param     PropelPDO $con optional connection
     *
     * @return    Grouping the current object
     */
    public function moveToTop(PropelPDO $con = null)
    {
        if ($this->isFirst()) {
            return $this;
        }

        return $this->moveToRank(1, $con);
    }

    /**
     * Move the object to the bottom of the list
     *
     * @param     PropelPDO $con optional connection
     *
     * @return integer the old object's rank
     */
    public function moveToBottom(PropelPDO $con = null)
    {
        if ($this->isLast($con)) {
            return false;
        }
        if ($con === null) {
            $con = Propel::getConnection(GroupingPeer::DATABASE_NAME);
        }
        $con->beginTransaction();
        try {
            $bottom = GroupingQuery::create()->getMaxRank($this->getSnapshotId(), $con);
            $res = $this->moveToRank($bottom, $con);
            $con->commit();

            return $res;
        } catch (Exception $e) {
            $con->rollback();
            throw $e;
        }
    }

    /**
     * Removes the current object from the list (moves it to the null scope).
     * The modifications are not persisted until the object is saved.
     *
     * @param     PropelPDO $con optional connection
     *
     * @return    Grouping the current object
     */
    public function removeFromList(PropelPDO $con = null)
    {
        // check if object is already removed
        if ($this->getSnapshotId() === null) {
            throw new PropelException('Object is already removed (has null scope)');
        }

        // move the object to the end of null scope
        $this->setSnapshotId(null);
    //    $this->insertAtBottom($con);

        return $this;
    }

    /**
     * Execute queries that were saved to be run inside the save transaction
     */
    protected function processSortableQueries($con)
    {
        foreach ($this->sortableQueries as $query) {
            $query['arguments'][]= $con;
            call_user_func_array($query['callable'], $query['arguments']);
        }
        $this->sortableQueries = array();
    }

}
