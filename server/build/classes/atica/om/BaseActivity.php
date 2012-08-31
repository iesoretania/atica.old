<?php


/**
 * Base class that represents a row from the 'activity' table.
 *
 *
 *
 * @package    propel.generator.atica.om
 */
abstract class BaseActivity extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ActivityPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ActivityPeer
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
     * @var        Snapshot
     */
    protected $aSnapshot;

    /**
     * @var        PropelObjectCollection|ActivityEvent[] Collection to store aggregation of ActivityEvent objects.
     */
    protected $collActivityEvents;
    protected $collActivityEventsPartial;

    /**
     * @var        PropelObjectCollection|ActivityProfileGroup[] Collection to store aggregation of ActivityProfileGroup objects.
     */
    protected $collActivityProfileGroups;
    protected $collActivityProfileGroupsPartial;

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
    protected $activityEventsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $activityProfileGroupsScheduledForDeletion = null;

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
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Activity The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = ActivityPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [snapshot_id] column.
     *
     * @param int $v new value
     * @return Activity The current object (for fluent API support)
     */
    public function setSnapshotId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->snapshot_id !== $v) {
            $this->snapshot_id = $v;
            $this->modifiedColumns[] = ActivityPeer::SNAPSHOT_ID;
        }

        if ($this->aSnapshot !== null && $this->aSnapshot->getId() !== $v) {
            $this->aSnapshot = null;
        }


        return $this;
    } // setSnapshotId()

    /**
     * Set the value of [display_name] column.
     *
     * @param string $v new value
     * @return Activity The current object (for fluent API support)
     */
    public function setDisplayName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->display_name !== $v) {
            $this->display_name = $v;
            $this->modifiedColumns[] = ActivityPeer::DISPLAY_NAME;
        }


        return $this;
    } // setDisplayName()

    /**
     * Set the value of [description] column.
     *
     * @param string $v new value
     * @return Activity The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[] = ActivityPeer::DESCRIPTION;
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
            $this->display_name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->description = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 4; // 4 = ActivityPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Activity object", $e);
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
            $con = Propel::getConnection(ActivityPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ActivityPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aSnapshot = null;
            $this->collActivityEvents = null;

            $this->collActivityProfileGroups = null;

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
            $con = Propel::getConnection(ActivityPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ActivityQuery::create()
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
            $con = Propel::getConnection(ActivityPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                ActivityPeer::addInstanceToPool($this);
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

            if ($this->activityEventsScheduledForDeletion !== null) {
                if (!$this->activityEventsScheduledForDeletion->isEmpty()) {
                    ActivityEventQuery::create()
                        ->filterByPrimaryKeys($this->activityEventsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->activityEventsScheduledForDeletion = null;
                }
            }

            if ($this->collActivityEvents !== null) {
                foreach ($this->collActivityEvents as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
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

        $this->modifiedColumns[] = ActivityPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ActivityPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ActivityPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`ID`';
        }
        if ($this->isColumnModified(ActivityPeer::SNAPSHOT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`SNAPSHOT_ID`';
        }
        if ($this->isColumnModified(ActivityPeer::DISPLAY_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`DISPLAY_NAME`';
        }
        if ($this->isColumnModified(ActivityPeer::DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`DESCRIPTION`';
        }

        $sql = sprintf(
            'INSERT INTO `activity` (%s) VALUES (%s)',
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
                    case '`DISPLAY_NAME`':
                        $stmt->bindValue($identifier, $this->display_name, PDO::PARAM_STR);
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


            if (($retval = ActivityPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collActivityEvents !== null) {
                    foreach ($this->collActivityEvents as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collActivityProfileGroups !== null) {
                    foreach ($this->collActivityProfileGroups as $referrerFK) {
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
        $pos = ActivityPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getDisplayName();
                break;
            case 3:
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
        if (isset($alreadyDumpedObjects['Activity'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Activity'][$this->getPrimaryKey()] = true;
        $keys = ActivityPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getSnapshotId(),
            $keys[2] => $this->getDisplayName(),
            $keys[3] => $this->getDescription(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aSnapshot) {
                $result['Snapshot'] = $this->aSnapshot->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collActivityEvents) {
                $result['ActivityEvents'] = $this->collActivityEvents->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collActivityProfileGroups) {
                $result['ActivityProfileGroups'] = $this->collActivityProfileGroups->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ActivityPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setDisplayName($value);
                break;
            case 3:
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
        $keys = ActivityPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setSnapshotId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setDisplayName($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setDescription($arr[$keys[3]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ActivityPeer::DATABASE_NAME);

        if ($this->isColumnModified(ActivityPeer::ID)) $criteria->add(ActivityPeer::ID, $this->id);
        if ($this->isColumnModified(ActivityPeer::SNAPSHOT_ID)) $criteria->add(ActivityPeer::SNAPSHOT_ID, $this->snapshot_id);
        if ($this->isColumnModified(ActivityPeer::DISPLAY_NAME)) $criteria->add(ActivityPeer::DISPLAY_NAME, $this->display_name);
        if ($this->isColumnModified(ActivityPeer::DESCRIPTION)) $criteria->add(ActivityPeer::DESCRIPTION, $this->description);

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
        $criteria = new Criteria(ActivityPeer::DATABASE_NAME);
        $criteria->add(ActivityPeer::ID, $this->id);

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
     * @param object $copyObj An object of Activity (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSnapshotId($this->getSnapshotId());
        $copyObj->setDisplayName($this->getDisplayName());
        $copyObj->setDescription($this->getDescription());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getActivityEvents() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addActivityEvent($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getActivityProfileGroups() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addActivityProfileGroup($relObj->copy($deepCopy));
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
     * @return Activity Clone of current object.
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
     * @return ActivityPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ActivityPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Snapshot object.
     *
     * @param             Snapshot $v
     * @return Activity The current object (for fluent API support)
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
            $v->addActivity($this);
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
                $this->aSnapshot->addActivities($this);
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
        if ('ActivityEvent' == $relationName) {
            $this->initActivityEvents();
        }
        if ('ActivityProfileGroup' == $relationName) {
            $this->initActivityProfileGroups();
        }
    }

    /**
     * Clears out the collActivityEvents collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addActivityEvents()
     */
    public function clearActivityEvents()
    {
        $this->collActivityEvents = null; // important to set this to null since that means it is uninitialized
        $this->collActivityEventsPartial = null;
    }

    /**
     * reset is the collActivityEvents collection loaded partially
     *
     * @return void
     */
    public function resetPartialActivityEvents($v = true)
    {
        $this->collActivityEventsPartial = $v;
    }

    /**
     * Initializes the collActivityEvents collection.
     *
     * By default this just sets the collActivityEvents collection to an empty array (like clearcollActivityEvents());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initActivityEvents($overrideExisting = true)
    {
        if (null !== $this->collActivityEvents && !$overrideExisting) {
            return;
        }
        $this->collActivityEvents = new PropelObjectCollection();
        $this->collActivityEvents->setModel('ActivityEvent');
    }

    /**
     * Gets an array of ActivityEvent objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Activity is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ActivityEvent[] List of ActivityEvent objects
     * @throws PropelException
     */
    public function getActivityEvents($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collActivityEventsPartial && !$this->isNew();
        if (null === $this->collActivityEvents || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collActivityEvents) {
                // return empty collection
                $this->initActivityEvents();
            } else {
                $collActivityEvents = ActivityEventQuery::create(null, $criteria)
                    ->filterByActivity($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collActivityEventsPartial && count($collActivityEvents)) {
                      $this->initActivityEvents(false);

                      foreach($collActivityEvents as $obj) {
                        if (false == $this->collActivityEvents->contains($obj)) {
                          $this->collActivityEvents->append($obj);
                        }
                      }

                      $this->collActivityEventsPartial = true;
                    }

                    return $collActivityEvents;
                }

                if($partial && $this->collActivityEvents) {
                    foreach($this->collActivityEvents as $obj) {
                        if($obj->isNew()) {
                            $collActivityEvents[] = $obj;
                        }
                    }
                }

                $this->collActivityEvents = $collActivityEvents;
                $this->collActivityEventsPartial = false;
            }
        }

        return $this->collActivityEvents;
    }

    /**
     * Sets a collection of ActivityEvent objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $activityEvents A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setActivityEvents(PropelCollection $activityEvents, PropelPDO $con = null)
    {
        $this->activityEventsScheduledForDeletion = $this->getActivityEvents(new Criteria(), $con)->diff($activityEvents);

        foreach ($this->activityEventsScheduledForDeletion as $activityEventRemoved) {
            $activityEventRemoved->setActivity(null);
        }

        $this->collActivityEvents = null;
        foreach ($activityEvents as $activityEvent) {
            $this->addActivityEvent($activityEvent);
        }

        $this->collActivityEvents = $activityEvents;
        $this->collActivityEventsPartial = false;
    }

    /**
     * Returns the number of related ActivityEvent objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ActivityEvent objects.
     * @throws PropelException
     */
    public function countActivityEvents(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collActivityEventsPartial && !$this->isNew();
        if (null === $this->collActivityEvents || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collActivityEvents) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getActivityEvents());
                }
                $query = ActivityEventQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByActivity($this)
                    ->count($con);
            }
        } else {
            return count($this->collActivityEvents);
        }
    }

    /**
     * Method called to associate a ActivityEvent object to this object
     * through the ActivityEvent foreign key attribute.
     *
     * @param    ActivityEvent $l ActivityEvent
     * @return Activity The current object (for fluent API support)
     */
    public function addActivityEvent(ActivityEvent $l)
    {
        if ($this->collActivityEvents === null) {
            $this->initActivityEvents();
            $this->collActivityEventsPartial = true;
        }
        if (!in_array($l, $this->collActivityEvents->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddActivityEvent($l);
        }

        return $this;
    }

    /**
     * @param	ActivityEvent $activityEvent The activityEvent object to add.
     */
    protected function doAddActivityEvent($activityEvent)
    {
        $this->collActivityEvents[]= $activityEvent;
        $activityEvent->setActivity($this);
    }

    /**
     * @param	ActivityEvent $activityEvent The activityEvent object to remove.
     */
    public function removeActivityEvent($activityEvent)
    {
        if ($this->getActivityEvents()->contains($activityEvent)) {
            $this->collActivityEvents->remove($this->collActivityEvents->search($activityEvent));
            if (null === $this->activityEventsScheduledForDeletion) {
                $this->activityEventsScheduledForDeletion = clone $this->collActivityEvents;
                $this->activityEventsScheduledForDeletion->clear();
            }
            $this->activityEventsScheduledForDeletion[]= $activityEvent;
            $activityEvent->setActivity(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Activity is new, it will return
     * an empty collection; or if this Activity has previously
     * been saved, it will retrieve related ActivityEvents from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Activity.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ActivityEvent[] List of ActivityEvent objects
     */
    public function getActivityEventsJoinEvent($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ActivityEventQuery::create(null, $criteria);
        $query->joinWith('Event', $join_behavior);

        return $this->getActivityEvents($query, $con);
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
     * If this Activity is new, it will return
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
                    ->filterByActivity($this)
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
            $activityProfileGroupRemoved->setActivity(null);
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
                    ->filterByActivity($this)
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
     * @return Activity The current object (for fluent API support)
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
        $activityProfileGroup->setActivity($this);
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
            $activityProfileGroup->setActivity(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Activity is new, it will return
     * an empty collection; or if this Activity has previously
     * been saved, it will retrieve related ActivityProfileGroups from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Activity.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ActivityProfileGroup[] List of ActivityProfileGroup objects
     */
    public function getActivityProfileGroupsJoinProfileGroup($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ActivityProfileGroupQuery::create(null, $criteria);
        $query->joinWith('ProfileGroup', $join_behavior);

        return $this->getActivityProfileGroups($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->snapshot_id = null;
        $this->display_name = null;
        $this->description = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->clearAllReferences();
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
            if ($this->collActivityEvents) {
                foreach ($this->collActivityEvents as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collActivityProfileGroups) {
                foreach ($this->collActivityProfileGroups as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        if ($this->collActivityEvents instanceof PropelCollection) {
            $this->collActivityEvents->clearIterator();
        }
        $this->collActivityEvents = null;
        if ($this->collActivityProfileGroups instanceof PropelCollection) {
            $this->collActivityProfileGroups->clearIterator();
        }
        $this->collActivityProfileGroups = null;
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

}
