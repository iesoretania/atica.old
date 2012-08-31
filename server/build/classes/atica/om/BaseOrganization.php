<?php


/**
 * Base class that represents a row from the 'organization' table.
 *
 *
 *
 * @package    propel.generator.atica.om
 */
abstract class BaseOrganization extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'OrganizationPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        OrganizationPeer
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
     * The value for the display_name field.
     * @var        string
     */
    protected $display_name;

    /**
     * @var        PropelObjectCollection|Snapshot[] Collection to store aggregation of Snapshot objects.
     */
    protected $collSnapshots;
    protected $collSnapshotsPartial;

    /**
     * @var        PropelObjectCollection|Configuration[] Collection to store aggregation of Configuration objects.
     */
    protected $collConfigurations;
    protected $collConfigurationsPartial;

    /**
     * @var        PropelObjectCollection|PersonOrganization[] Collection to store aggregation of PersonOrganization objects.
     */
    protected $collPersonOrganizations;
    protected $collPersonOrganizationsPartial;

    /**
     * @var        PropelObjectCollection|Session[] Collection to store aggregation of Session objects.
     */
    protected $collSessions;
    protected $collSessionsPartial;

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
    protected $snapshotsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $configurationsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $personOrganizationsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $sessionsScheduledForDeletion = null;

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
     * Get the [display_name] column value.
     *
     * @return string
     */
    public function getDisplayName()
    {
        return $this->display_name;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Organization The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = OrganizationPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [display_name] column.
     *
     * @param string $v new value
     * @return Organization The current object (for fluent API support)
     */
    public function setDisplayName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->display_name !== $v) {
            $this->display_name = $v;
            $this->modifiedColumns[] = OrganizationPeer::DISPLAY_NAME;
        }


        return $this;
    } // setDisplayName()

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
            $this->display_name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 2; // 2 = OrganizationPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Organization object", $e);
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
            $con = Propel::getConnection(OrganizationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = OrganizationPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collSnapshots = null;

            $this->collConfigurations = null;

            $this->collPersonOrganizations = null;

            $this->collSessions = null;

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
            $con = Propel::getConnection(OrganizationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = OrganizationQuery::create()
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
            $con = Propel::getConnection(OrganizationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                OrganizationPeer::addInstanceToPool($this);
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

            if ($this->snapshotsScheduledForDeletion !== null) {
                if (!$this->snapshotsScheduledForDeletion->isEmpty()) {
                    SnapshotQuery::create()
                        ->filterByPrimaryKeys($this->snapshotsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->snapshotsScheduledForDeletion = null;
                }
            }

            if ($this->collSnapshots !== null) {
                foreach ($this->collSnapshots as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->configurationsScheduledForDeletion !== null) {
                if (!$this->configurationsScheduledForDeletion->isEmpty()) {
                    foreach ($this->configurationsScheduledForDeletion as $configuration) {
                        // need to save related object because we set the relation to null
                        $configuration->save($con);
                    }
                    $this->configurationsScheduledForDeletion = null;
                }
            }

            if ($this->collConfigurations !== null) {
                foreach ($this->collConfigurations as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->personOrganizationsScheduledForDeletion !== null) {
                if (!$this->personOrganizationsScheduledForDeletion->isEmpty()) {
                    PersonOrganizationQuery::create()
                        ->filterByPrimaryKeys($this->personOrganizationsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->personOrganizationsScheduledForDeletion = null;
                }
            }

            if ($this->collPersonOrganizations !== null) {
                foreach ($this->collPersonOrganizations as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->sessionsScheduledForDeletion !== null) {
                if (!$this->sessionsScheduledForDeletion->isEmpty()) {
                    SessionQuery::create()
                        ->filterByPrimaryKeys($this->sessionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->sessionsScheduledForDeletion = null;
                }
            }

            if ($this->collSessions !== null) {
                foreach ($this->collSessions as $referrerFK) {
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

        $this->modifiedColumns[] = OrganizationPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . OrganizationPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(OrganizationPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`ID`';
        }
        if ($this->isColumnModified(OrganizationPeer::DISPLAY_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`DISPLAY_NAME`';
        }

        $sql = sprintf(
            'INSERT INTO `organization` (%s) VALUES (%s)',
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
                    case '`DISPLAY_NAME`':
                        $stmt->bindValue($identifier, $this->display_name, PDO::PARAM_STR);
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


            if (($retval = OrganizationPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collSnapshots !== null) {
                    foreach ($this->collSnapshots as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collConfigurations !== null) {
                    foreach ($this->collConfigurations as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPersonOrganizations !== null) {
                    foreach ($this->collPersonOrganizations as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collSessions !== null) {
                    foreach ($this->collSessions as $referrerFK) {
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
        $pos = OrganizationPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getDisplayName();
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
        if (isset($alreadyDumpedObjects['Organization'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Organization'][$this->getPrimaryKey()] = true;
        $keys = OrganizationPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getDisplayName(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collSnapshots) {
                $result['Snapshots'] = $this->collSnapshots->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collConfigurations) {
                $result['Configurations'] = $this->collConfigurations->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPersonOrganizations) {
                $result['PersonOrganizations'] = $this->collPersonOrganizations->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSessions) {
                $result['Sessions'] = $this->collSessions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = OrganizationPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setDisplayName($value);
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
        $keys = OrganizationPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setDisplayName($arr[$keys[1]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(OrganizationPeer::DATABASE_NAME);

        if ($this->isColumnModified(OrganizationPeer::ID)) $criteria->add(OrganizationPeer::ID, $this->id);
        if ($this->isColumnModified(OrganizationPeer::DISPLAY_NAME)) $criteria->add(OrganizationPeer::DISPLAY_NAME, $this->display_name);

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
        $criteria = new Criteria(OrganizationPeer::DATABASE_NAME);
        $criteria->add(OrganizationPeer::ID, $this->id);

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
     * @param object $copyObj An object of Organization (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setDisplayName($this->getDisplayName());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getSnapshots() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSnapshot($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getConfigurations() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addConfiguration($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPersonOrganizations() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPersonOrganization($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSessions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSession($relObj->copy($deepCopy));
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
     * @return Organization Clone of current object.
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
     * @return OrganizationPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new OrganizationPeer();
        }

        return self::$peer;
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
        if ('Snapshot' == $relationName) {
            $this->initSnapshots();
        }
        if ('Configuration' == $relationName) {
            $this->initConfigurations();
        }
        if ('PersonOrganization' == $relationName) {
            $this->initPersonOrganizations();
        }
        if ('Session' == $relationName) {
            $this->initSessions();
        }
    }

    /**
     * Clears out the collSnapshots collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSnapshots()
     */
    public function clearSnapshots()
    {
        $this->collSnapshots = null; // important to set this to null since that means it is uninitialized
        $this->collSnapshotsPartial = null;
    }

    /**
     * reset is the collSnapshots collection loaded partially
     *
     * @return void
     */
    public function resetPartialSnapshots($v = true)
    {
        $this->collSnapshotsPartial = $v;
    }

    /**
     * Initializes the collSnapshots collection.
     *
     * By default this just sets the collSnapshots collection to an empty array (like clearcollSnapshots());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSnapshots($overrideExisting = true)
    {
        if (null !== $this->collSnapshots && !$overrideExisting) {
            return;
        }
        $this->collSnapshots = new PropelObjectCollection();
        $this->collSnapshots->setModel('Snapshot');
    }

    /**
     * Gets an array of Snapshot objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Organization is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Snapshot[] List of Snapshot objects
     * @throws PropelException
     */
    public function getSnapshots($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSnapshotsPartial && !$this->isNew();
        if (null === $this->collSnapshots || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSnapshots) {
                // return empty collection
                $this->initSnapshots();
            } else {
                $collSnapshots = SnapshotQuery::create(null, $criteria)
                    ->filterByOrganization($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSnapshotsPartial && count($collSnapshots)) {
                      $this->initSnapshots(false);

                      foreach($collSnapshots as $obj) {
                        if (false == $this->collSnapshots->contains($obj)) {
                          $this->collSnapshots->append($obj);
                        }
                      }

                      $this->collSnapshotsPartial = true;
                    }

                    return $collSnapshots;
                }

                if($partial && $this->collSnapshots) {
                    foreach($this->collSnapshots as $obj) {
                        if($obj->isNew()) {
                            $collSnapshots[] = $obj;
                        }
                    }
                }

                $this->collSnapshots = $collSnapshots;
                $this->collSnapshotsPartial = false;
            }
        }

        return $this->collSnapshots;
    }

    /**
     * Sets a collection of Snapshot objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $snapshots A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setSnapshots(PropelCollection $snapshots, PropelPDO $con = null)
    {
        $this->snapshotsScheduledForDeletion = $this->getSnapshots(new Criteria(), $con)->diff($snapshots);

        foreach ($this->snapshotsScheduledForDeletion as $snapshotRemoved) {
            $snapshotRemoved->setOrganization(null);
        }

        $this->collSnapshots = null;
        foreach ($snapshots as $snapshot) {
            $this->addSnapshot($snapshot);
        }

        $this->collSnapshots = $snapshots;
        $this->collSnapshotsPartial = false;
    }

    /**
     * Returns the number of related Snapshot objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Snapshot objects.
     * @throws PropelException
     */
    public function countSnapshots(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSnapshotsPartial && !$this->isNew();
        if (null === $this->collSnapshots || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSnapshots) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getSnapshots());
                }
                $query = SnapshotQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByOrganization($this)
                    ->count($con);
            }
        } else {
            return count($this->collSnapshots);
        }
    }

    /**
     * Method called to associate a Snapshot object to this object
     * through the Snapshot foreign key attribute.
     *
     * @param    Snapshot $l Snapshot
     * @return Organization The current object (for fluent API support)
     */
    public function addSnapshot(Snapshot $l)
    {
        if ($this->collSnapshots === null) {
            $this->initSnapshots();
            $this->collSnapshotsPartial = true;
        }
        if (!in_array($l, $this->collSnapshots->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSnapshot($l);
        }

        return $this;
    }

    /**
     * @param	Snapshot $snapshot The snapshot object to add.
     */
    protected function doAddSnapshot($snapshot)
    {
        $this->collSnapshots[]= $snapshot;
        $snapshot->setOrganization($this);
    }

    /**
     * @param	Snapshot $snapshot The snapshot object to remove.
     */
    public function removeSnapshot($snapshot)
    {
        if ($this->getSnapshots()->contains($snapshot)) {
            $this->collSnapshots->remove($this->collSnapshots->search($snapshot));
            if (null === $this->snapshotsScheduledForDeletion) {
                $this->snapshotsScheduledForDeletion = clone $this->collSnapshots;
                $this->snapshotsScheduledForDeletion->clear();
            }
            $this->snapshotsScheduledForDeletion[]= $snapshot;
            $snapshot->setOrganization(null);
        }
    }

    /**
     * Clears out the collConfigurations collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addConfigurations()
     */
    public function clearConfigurations()
    {
        $this->collConfigurations = null; // important to set this to null since that means it is uninitialized
        $this->collConfigurationsPartial = null;
    }

    /**
     * reset is the collConfigurations collection loaded partially
     *
     * @return void
     */
    public function resetPartialConfigurations($v = true)
    {
        $this->collConfigurationsPartial = $v;
    }

    /**
     * Initializes the collConfigurations collection.
     *
     * By default this just sets the collConfigurations collection to an empty array (like clearcollConfigurations());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initConfigurations($overrideExisting = true)
    {
        if (null !== $this->collConfigurations && !$overrideExisting) {
            return;
        }
        $this->collConfigurations = new PropelObjectCollection();
        $this->collConfigurations->setModel('Configuration');
    }

    /**
     * Gets an array of Configuration objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Organization is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Configuration[] List of Configuration objects
     * @throws PropelException
     */
    public function getConfigurations($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collConfigurationsPartial && !$this->isNew();
        if (null === $this->collConfigurations || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collConfigurations) {
                // return empty collection
                $this->initConfigurations();
            } else {
                $collConfigurations = ConfigurationQuery::create(null, $criteria)
                    ->filterByOrganization($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collConfigurationsPartial && count($collConfigurations)) {
                      $this->initConfigurations(false);

                      foreach($collConfigurations as $obj) {
                        if (false == $this->collConfigurations->contains($obj)) {
                          $this->collConfigurations->append($obj);
                        }
                      }

                      $this->collConfigurationsPartial = true;
                    }

                    return $collConfigurations;
                }

                if($partial && $this->collConfigurations) {
                    foreach($this->collConfigurations as $obj) {
                        if($obj->isNew()) {
                            $collConfigurations[] = $obj;
                        }
                    }
                }

                $this->collConfigurations = $collConfigurations;
                $this->collConfigurationsPartial = false;
            }
        }

        return $this->collConfigurations;
    }

    /**
     * Sets a collection of Configuration objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $configurations A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setConfigurations(PropelCollection $configurations, PropelPDO $con = null)
    {
        $this->configurationsScheduledForDeletion = $this->getConfigurations(new Criteria(), $con)->diff($configurations);

        foreach ($this->configurationsScheduledForDeletion as $configurationRemoved) {
            $configurationRemoved->setOrganization(null);
        }

        $this->collConfigurations = null;
        foreach ($configurations as $configuration) {
            $this->addConfiguration($configuration);
        }

        $this->collConfigurations = $configurations;
        $this->collConfigurationsPartial = false;
    }

    /**
     * Returns the number of related Configuration objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Configuration objects.
     * @throws PropelException
     */
    public function countConfigurations(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collConfigurationsPartial && !$this->isNew();
        if (null === $this->collConfigurations || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collConfigurations) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getConfigurations());
                }
                $query = ConfigurationQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByOrganization($this)
                    ->count($con);
            }
        } else {
            return count($this->collConfigurations);
        }
    }

    /**
     * Method called to associate a Configuration object to this object
     * through the Configuration foreign key attribute.
     *
     * @param    Configuration $l Configuration
     * @return Organization The current object (for fluent API support)
     */
    public function addConfiguration(Configuration $l)
    {
        if ($this->collConfigurations === null) {
            $this->initConfigurations();
            $this->collConfigurationsPartial = true;
        }
        if (!in_array($l, $this->collConfigurations->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddConfiguration($l);
        }

        return $this;
    }

    /**
     * @param	Configuration $configuration The configuration object to add.
     */
    protected function doAddConfiguration($configuration)
    {
        $this->collConfigurations[]= $configuration;
        $configuration->setOrganization($this);
    }

    /**
     * @param	Configuration $configuration The configuration object to remove.
     */
    public function removeConfiguration($configuration)
    {
        if ($this->getConfigurations()->contains($configuration)) {
            $this->collConfigurations->remove($this->collConfigurations->search($configuration));
            if (null === $this->configurationsScheduledForDeletion) {
                $this->configurationsScheduledForDeletion = clone $this->collConfigurations;
                $this->configurationsScheduledForDeletion->clear();
            }
            $this->configurationsScheduledForDeletion[]= $configuration;
            $configuration->setOrganization(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Organization is new, it will return
     * an empty collection; or if this Organization has previously
     * been saved, it will retrieve related Configurations from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Organization.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Configuration[] List of Configuration objects
     */
    public function getConfigurationsJoinSnapshot($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ConfigurationQuery::create(null, $criteria);
        $query->joinWith('Snapshot', $join_behavior);

        return $this->getConfigurations($query, $con);
    }

    /**
     * Clears out the collPersonOrganizations collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addPersonOrganizations()
     */
    public function clearPersonOrganizations()
    {
        $this->collPersonOrganizations = null; // important to set this to null since that means it is uninitialized
        $this->collPersonOrganizationsPartial = null;
    }

    /**
     * reset is the collPersonOrganizations collection loaded partially
     *
     * @return void
     */
    public function resetPartialPersonOrganizations($v = true)
    {
        $this->collPersonOrganizationsPartial = $v;
    }

    /**
     * Initializes the collPersonOrganizations collection.
     *
     * By default this just sets the collPersonOrganizations collection to an empty array (like clearcollPersonOrganizations());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPersonOrganizations($overrideExisting = true)
    {
        if (null !== $this->collPersonOrganizations && !$overrideExisting) {
            return;
        }
        $this->collPersonOrganizations = new PropelObjectCollection();
        $this->collPersonOrganizations->setModel('PersonOrganization');
    }

    /**
     * Gets an array of PersonOrganization objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Organization is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|PersonOrganization[] List of PersonOrganization objects
     * @throws PropelException
     */
    public function getPersonOrganizations($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPersonOrganizationsPartial && !$this->isNew();
        if (null === $this->collPersonOrganizations || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPersonOrganizations) {
                // return empty collection
                $this->initPersonOrganizations();
            } else {
                $collPersonOrganizations = PersonOrganizationQuery::create(null, $criteria)
                    ->filterByOrganization($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPersonOrganizationsPartial && count($collPersonOrganizations)) {
                      $this->initPersonOrganizations(false);

                      foreach($collPersonOrganizations as $obj) {
                        if (false == $this->collPersonOrganizations->contains($obj)) {
                          $this->collPersonOrganizations->append($obj);
                        }
                      }

                      $this->collPersonOrganizationsPartial = true;
                    }

                    return $collPersonOrganizations;
                }

                if($partial && $this->collPersonOrganizations) {
                    foreach($this->collPersonOrganizations as $obj) {
                        if($obj->isNew()) {
                            $collPersonOrganizations[] = $obj;
                        }
                    }
                }

                $this->collPersonOrganizations = $collPersonOrganizations;
                $this->collPersonOrganizationsPartial = false;
            }
        }

        return $this->collPersonOrganizations;
    }

    /**
     * Sets a collection of PersonOrganization objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $personOrganizations A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setPersonOrganizations(PropelCollection $personOrganizations, PropelPDO $con = null)
    {
        $this->personOrganizationsScheduledForDeletion = $this->getPersonOrganizations(new Criteria(), $con)->diff($personOrganizations);

        foreach ($this->personOrganizationsScheduledForDeletion as $personOrganizationRemoved) {
            $personOrganizationRemoved->setOrganization(null);
        }

        $this->collPersonOrganizations = null;
        foreach ($personOrganizations as $personOrganization) {
            $this->addPersonOrganization($personOrganization);
        }

        $this->collPersonOrganizations = $personOrganizations;
        $this->collPersonOrganizationsPartial = false;
    }

    /**
     * Returns the number of related PersonOrganization objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related PersonOrganization objects.
     * @throws PropelException
     */
    public function countPersonOrganizations(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPersonOrganizationsPartial && !$this->isNew();
        if (null === $this->collPersonOrganizations || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPersonOrganizations) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getPersonOrganizations());
                }
                $query = PersonOrganizationQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByOrganization($this)
                    ->count($con);
            }
        } else {
            return count($this->collPersonOrganizations);
        }
    }

    /**
     * Method called to associate a PersonOrganization object to this object
     * through the PersonOrganization foreign key attribute.
     *
     * @param    PersonOrganization $l PersonOrganization
     * @return Organization The current object (for fluent API support)
     */
    public function addPersonOrganization(PersonOrganization $l)
    {
        if ($this->collPersonOrganizations === null) {
            $this->initPersonOrganizations();
            $this->collPersonOrganizationsPartial = true;
        }
        if (!in_array($l, $this->collPersonOrganizations->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPersonOrganization($l);
        }

        return $this;
    }

    /**
     * @param	PersonOrganization $personOrganization The personOrganization object to add.
     */
    protected function doAddPersonOrganization($personOrganization)
    {
        $this->collPersonOrganizations[]= $personOrganization;
        $personOrganization->setOrganization($this);
    }

    /**
     * @param	PersonOrganization $personOrganization The personOrganization object to remove.
     */
    public function removePersonOrganization($personOrganization)
    {
        if ($this->getPersonOrganizations()->contains($personOrganization)) {
            $this->collPersonOrganizations->remove($this->collPersonOrganizations->search($personOrganization));
            if (null === $this->personOrganizationsScheduledForDeletion) {
                $this->personOrganizationsScheduledForDeletion = clone $this->collPersonOrganizations;
                $this->personOrganizationsScheduledForDeletion->clear();
            }
            $this->personOrganizationsScheduledForDeletion[]= $personOrganization;
            $personOrganization->setOrganization(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Organization is new, it will return
     * an empty collection; or if this Organization has previously
     * been saved, it will retrieve related PersonOrganizations from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Organization.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PersonOrganization[] List of PersonOrganization objects
     */
    public function getPersonOrganizationsJoinPerson($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PersonOrganizationQuery::create(null, $criteria);
        $query->joinWith('Person', $join_behavior);

        return $this->getPersonOrganizations($query, $con);
    }

    /**
     * Clears out the collSessions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSessions()
     */
    public function clearSessions()
    {
        $this->collSessions = null; // important to set this to null since that means it is uninitialized
        $this->collSessionsPartial = null;
    }

    /**
     * reset is the collSessions collection loaded partially
     *
     * @return void
     */
    public function resetPartialSessions($v = true)
    {
        $this->collSessionsPartial = $v;
    }

    /**
     * Initializes the collSessions collection.
     *
     * By default this just sets the collSessions collection to an empty array (like clearcollSessions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSessions($overrideExisting = true)
    {
        if (null !== $this->collSessions && !$overrideExisting) {
            return;
        }
        $this->collSessions = new PropelObjectCollection();
        $this->collSessions->setModel('Session');
    }

    /**
     * Gets an array of Session objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Organization is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Session[] List of Session objects
     * @throws PropelException
     */
    public function getSessions($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSessionsPartial && !$this->isNew();
        if (null === $this->collSessions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSessions) {
                // return empty collection
                $this->initSessions();
            } else {
                $collSessions = SessionQuery::create(null, $criteria)
                    ->filterByOrganization($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSessionsPartial && count($collSessions)) {
                      $this->initSessions(false);

                      foreach($collSessions as $obj) {
                        if (false == $this->collSessions->contains($obj)) {
                          $this->collSessions->append($obj);
                        }
                      }

                      $this->collSessionsPartial = true;
                    }

                    return $collSessions;
                }

                if($partial && $this->collSessions) {
                    foreach($this->collSessions as $obj) {
                        if($obj->isNew()) {
                            $collSessions[] = $obj;
                        }
                    }
                }

                $this->collSessions = $collSessions;
                $this->collSessionsPartial = false;
            }
        }

        return $this->collSessions;
    }

    /**
     * Sets a collection of Session objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $sessions A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setSessions(PropelCollection $sessions, PropelPDO $con = null)
    {
        $this->sessionsScheduledForDeletion = $this->getSessions(new Criteria(), $con)->diff($sessions);

        foreach ($this->sessionsScheduledForDeletion as $sessionRemoved) {
            $sessionRemoved->setOrganization(null);
        }

        $this->collSessions = null;
        foreach ($sessions as $session) {
            $this->addSession($session);
        }

        $this->collSessions = $sessions;
        $this->collSessionsPartial = false;
    }

    /**
     * Returns the number of related Session objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Session objects.
     * @throws PropelException
     */
    public function countSessions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSessionsPartial && !$this->isNew();
        if (null === $this->collSessions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSessions) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getSessions());
                }
                $query = SessionQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByOrganization($this)
                    ->count($con);
            }
        } else {
            return count($this->collSessions);
        }
    }

    /**
     * Method called to associate a Session object to this object
     * through the Session foreign key attribute.
     *
     * @param    Session $l Session
     * @return Organization The current object (for fluent API support)
     */
    public function addSession(Session $l)
    {
        if ($this->collSessions === null) {
            $this->initSessions();
            $this->collSessionsPartial = true;
        }
        if (!in_array($l, $this->collSessions->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSession($l);
        }

        return $this;
    }

    /**
     * @param	Session $session The session object to add.
     */
    protected function doAddSession($session)
    {
        $this->collSessions[]= $session;
        $session->setOrganization($this);
    }

    /**
     * @param	Session $session The session object to remove.
     */
    public function removeSession($session)
    {
        if ($this->getSessions()->contains($session)) {
            $this->collSessions->remove($this->collSessions->search($session));
            if (null === $this->sessionsScheduledForDeletion) {
                $this->sessionsScheduledForDeletion = clone $this->collSessions;
                $this->sessionsScheduledForDeletion->clear();
            }
            $this->sessionsScheduledForDeletion[]= $session;
            $session->setOrganization(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Organization is new, it will return
     * an empty collection; or if this Organization has previously
     * been saved, it will retrieve related Sessions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Organization.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Session[] List of Session objects
     */
    public function getSessionsJoinPerson($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SessionQuery::create(null, $criteria);
        $query->joinWith('Person', $join_behavior);

        return $this->getSessions($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->display_name = null;
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
            if ($this->collSnapshots) {
                foreach ($this->collSnapshots as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collConfigurations) {
                foreach ($this->collConfigurations as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPersonOrganizations) {
                foreach ($this->collPersonOrganizations as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSessions) {
                foreach ($this->collSessions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        if ($this->collSnapshots instanceof PropelCollection) {
            $this->collSnapshots->clearIterator();
        }
        $this->collSnapshots = null;
        if ($this->collConfigurations instanceof PropelCollection) {
            $this->collConfigurations->clearIterator();
        }
        $this->collConfigurations = null;
        if ($this->collPersonOrganizations instanceof PropelCollection) {
            $this->collPersonOrganizations->clearIterator();
        }
        $this->collPersonOrganizations = null;
        if ($this->collSessions instanceof PropelCollection) {
            $this->collSessions->clearIterator();
        }
        $this->collSessions = null;
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
