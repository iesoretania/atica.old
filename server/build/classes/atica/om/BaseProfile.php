<?php


/**
 * Base class that represents a row from the 'profile' table.
 *
 *
 *
 * @package    propel.generator.atica.om
 */
abstract class BaseProfile extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProfilePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProfilePeer
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
     * The value for the profile_group_id field.
     * @var        int
     */
    protected $profile_group_id;

    /**
     * The value for the order_nr field.
     * @var        int
     */
    protected $order_nr;

    /**
     * The value for the display_name field.
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $display_name;

    /**
     * The value for the description field.
     * @var        string
     */
    protected $description;

    /**
     * @var        ProfileGroup
     */
    protected $aProfileGroup;

    /**
     * @var        PropelObjectCollection|Delivery[] Collection to store aggregation of Delivery objects.
     */
    protected $collDeliveries;
    protected $collDeliveriesPartial;

    /**
     * @var        PropelObjectCollection|PersonProfile[] Collection to store aggregation of PersonProfile objects.
     */
    protected $collPersonProfiles;
    protected $collPersonProfilesPartial;

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
    protected $deliveriesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $personProfilesScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->display_name = '';
    }

    /**
     * Initializes internal state of BaseProfile object.
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
     * Get the [profile_group_id] column value.
     *
     * @return int
     */
    public function getProfileGroupId()
    {
        return $this->profile_group_id;
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
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Profile The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = ProfilePeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [profile_group_id] column.
     *
     * @param int $v new value
     * @return Profile The current object (for fluent API support)
     */
    public function setProfileGroupId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->profile_group_id !== $v) {
            // sortable behavior
            $this->oldScope = $this->getProfileGroupId();

            $this->profile_group_id = $v;
            $this->modifiedColumns[] = ProfilePeer::PROFILE_GROUP_ID;
        }

        if ($this->aProfileGroup !== null && $this->aProfileGroup->getId() !== $v) {
            $this->aProfileGroup = null;
        }


        return $this;
    } // setProfileGroupId()

    /**
     * Set the value of [order_nr] column.
     *
     * @param int $v new value
     * @return Profile The current object (for fluent API support)
     */
    public function setOrderNr($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->order_nr !== $v) {
            $this->order_nr = $v;
            $this->modifiedColumns[] = ProfilePeer::ORDER_NR;
        }


        return $this;
    } // setOrderNr()

    /**
     * Set the value of [display_name] column.
     *
     * @param string $v new value
     * @return Profile The current object (for fluent API support)
     */
    public function setDisplayName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->display_name !== $v) {
            $this->display_name = $v;
            $this->modifiedColumns[] = ProfilePeer::DISPLAY_NAME;
        }


        return $this;
    } // setDisplayName()

    /**
     * Set the value of [description] column.
     *
     * @param string $v new value
     * @return Profile The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[] = ProfilePeer::DESCRIPTION;
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
            if ($this->display_name !== '') {
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
            $this->profile_group_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->order_nr = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->display_name = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->description = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 5; // 5 = ProfilePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Profile object", $e);
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

        if ($this->aProfileGroup !== null && $this->profile_group_id !== $this->aProfileGroup->getId()) {
            $this->aProfileGroup = null;
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
            $con = Propel::getConnection(ProfilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProfilePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aProfileGroup = null;
            $this->collDeliveries = null;

            $this->collPersonProfiles = null;

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
            $con = Propel::getConnection(ProfilePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProfileQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            // sortable behavior

            ProfilePeer::shiftRank(-1, $this->getOrderNr() + 1, null, $this->getProfileGroupId(), $con);
            ProfilePeer::clearInstancePool();

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
            $con = Propel::getConnection(ProfilePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                if (!$this->isColumnModified(ProfilePeer::RANK_COL)) {
                    $this->setOrderNr(ProfileQuery::create()->getMaxRank($this->getProfileGroupId(), $con) + 1);
                }

            } else {
                $ret = $ret && $this->preUpdate($con);
                // sortable behavior
                // if scope has changed and rank was not modified (if yes, assuming superior action)
                // insert object to the end of new scope and cleanup old one
                if ($this->isColumnModified(ProfilePeer::SCOPE_COL) && !$this->isColumnModified(ProfilePeer::RANK_COL)) {
                    ProfilePeer::shiftRank(-1, $this->getOrderNr() + 1, null, $this->oldScope, $con);
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
                ProfilePeer::addInstanceToPool($this);
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

            if ($this->aProfileGroup !== null) {
                if ($this->aProfileGroup->isModified() || $this->aProfileGroup->isNew()) {
                    $affectedRows += $this->aProfileGroup->save($con);
                }
                $this->setProfileGroup($this->aProfileGroup);
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

            if ($this->deliveriesScheduledForDeletion !== null) {
                if (!$this->deliveriesScheduledForDeletion->isEmpty()) {
                    foreach ($this->deliveriesScheduledForDeletion as $delivery) {
                        // need to save related object because we set the relation to null
                        $delivery->save($con);
                    }
                    $this->deliveriesScheduledForDeletion = null;
                }
            }

            if ($this->collDeliveries !== null) {
                foreach ($this->collDeliveries as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->personProfilesScheduledForDeletion !== null) {
                if (!$this->personProfilesScheduledForDeletion->isEmpty()) {
                    PersonProfileQuery::create()
                        ->filterByPrimaryKeys($this->personProfilesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->personProfilesScheduledForDeletion = null;
                }
            }

            if ($this->collPersonProfiles !== null) {
                foreach ($this->collPersonProfiles as $referrerFK) {
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

        $this->modifiedColumns[] = ProfilePeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProfilePeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProfilePeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`ID`';
        }
        if ($this->isColumnModified(ProfilePeer::PROFILE_GROUP_ID)) {
            $modifiedColumns[':p' . $index++]  = '`PROFILE_GROUP_ID`';
        }
        if ($this->isColumnModified(ProfilePeer::ORDER_NR)) {
            $modifiedColumns[':p' . $index++]  = '`ORDER_NR`';
        }
        if ($this->isColumnModified(ProfilePeer::DISPLAY_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`DISPLAY_NAME`';
        }
        if ($this->isColumnModified(ProfilePeer::DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`DESCRIPTION`';
        }

        $sql = sprintf(
            'INSERT INTO `profile` (%s) VALUES (%s)',
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
                    case '`PROFILE_GROUP_ID`':
                        $stmt->bindValue($identifier, $this->profile_group_id, PDO::PARAM_INT);
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

            if ($this->aProfileGroup !== null) {
                if (!$this->aProfileGroup->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aProfileGroup->getValidationFailures());
                }
            }


            if (($retval = ProfilePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collDeliveries !== null) {
                    foreach ($this->collDeliveries as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPersonProfiles !== null) {
                    foreach ($this->collPersonProfiles as $referrerFK) {
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
        $pos = ProfilePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getProfileGroupId();
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
        if (isset($alreadyDumpedObjects['Profile'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Profile'][$this->getPrimaryKey()] = true;
        $keys = ProfilePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getProfileGroupId(),
            $keys[2] => $this->getOrderNr(),
            $keys[3] => $this->getDisplayName(),
            $keys[4] => $this->getDescription(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aProfileGroup) {
                $result['ProfileGroup'] = $this->aProfileGroup->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collDeliveries) {
                $result['Deliveries'] = $this->collDeliveries->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPersonProfiles) {
                $result['PersonProfiles'] = $this->collPersonProfiles->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProfilePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setProfileGroupId($value);
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
        $keys = ProfilePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setProfileGroupId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setOrderNr($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setDisplayName($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setDescription($arr[$keys[4]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProfilePeer::DATABASE_NAME);

        if ($this->isColumnModified(ProfilePeer::ID)) $criteria->add(ProfilePeer::ID, $this->id);
        if ($this->isColumnModified(ProfilePeer::PROFILE_GROUP_ID)) $criteria->add(ProfilePeer::PROFILE_GROUP_ID, $this->profile_group_id);
        if ($this->isColumnModified(ProfilePeer::ORDER_NR)) $criteria->add(ProfilePeer::ORDER_NR, $this->order_nr);
        if ($this->isColumnModified(ProfilePeer::DISPLAY_NAME)) $criteria->add(ProfilePeer::DISPLAY_NAME, $this->display_name);
        if ($this->isColumnModified(ProfilePeer::DESCRIPTION)) $criteria->add(ProfilePeer::DESCRIPTION, $this->description);

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
        $criteria = new Criteria(ProfilePeer::DATABASE_NAME);
        $criteria->add(ProfilePeer::ID, $this->id);

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
     * @param object $copyObj An object of Profile (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setProfileGroupId($this->getProfileGroupId());
        $copyObj->setOrderNr($this->getOrderNr());
        $copyObj->setDisplayName($this->getDisplayName());
        $copyObj->setDescription($this->getDescription());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getDeliveries() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDelivery($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPersonProfiles() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPersonProfile($relObj->copy($deepCopy));
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
     * @return Profile Clone of current object.
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
     * @return ProfilePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProfilePeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a ProfileGroup object.
     *
     * @param             ProfileGroup $v
     * @return Profile The current object (for fluent API support)
     * @throws PropelException
     */
    public function setProfileGroup(ProfileGroup $v = null)
    {
        if ($v === null) {
            $this->setProfileGroupId(NULL);
        } else {
            $this->setProfileGroupId($v->getId());
        }

        $this->aProfileGroup = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProfileGroup object, it will not be re-added.
        if ($v !== null) {
            $v->addProfile($this);
        }


        return $this;
    }


    /**
     * Get the associated ProfileGroup object
     *
     * @param PropelPDO $con Optional Connection object.
     * @return ProfileGroup The associated ProfileGroup object.
     * @throws PropelException
     */
    public function getProfileGroup(PropelPDO $con = null)
    {
        if ($this->aProfileGroup === null && ($this->profile_group_id !== null)) {
            $this->aProfileGroup = ProfileGroupQuery::create()->findPk($this->profile_group_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aProfileGroup->addProfiles($this);
             */
        }

        return $this->aProfileGroup;
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
        if ('Delivery' == $relationName) {
            $this->initDeliveries();
        }
        if ('PersonProfile' == $relationName) {
            $this->initPersonProfiles();
        }
    }

    /**
     * Clears out the collDeliveries collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addDeliveries()
     */
    public function clearDeliveries()
    {
        $this->collDeliveries = null; // important to set this to null since that means it is uninitialized
        $this->collDeliveriesPartial = null;
    }

    /**
     * reset is the collDeliveries collection loaded partially
     *
     * @return void
     */
    public function resetPartialDeliveries($v = true)
    {
        $this->collDeliveriesPartial = $v;
    }

    /**
     * Initializes the collDeliveries collection.
     *
     * By default this just sets the collDeliveries collection to an empty array (like clearcollDeliveries());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDeliveries($overrideExisting = true)
    {
        if (null !== $this->collDeliveries && !$overrideExisting) {
            return;
        }
        $this->collDeliveries = new PropelObjectCollection();
        $this->collDeliveries->setModel('Delivery');
    }

    /**
     * Gets an array of Delivery objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Profile is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Delivery[] List of Delivery objects
     * @throws PropelException
     */
    public function getDeliveries($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collDeliveriesPartial && !$this->isNew();
        if (null === $this->collDeliveries || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDeliveries) {
                // return empty collection
                $this->initDeliveries();
            } else {
                $collDeliveries = DeliveryQuery::create(null, $criteria)
                    ->filterByProfile($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collDeliveriesPartial && count($collDeliveries)) {
                      $this->initDeliveries(false);

                      foreach($collDeliveries as $obj) {
                        if (false == $this->collDeliveries->contains($obj)) {
                          $this->collDeliveries->append($obj);
                        }
                      }

                      $this->collDeliveriesPartial = true;
                    }

                    return $collDeliveries;
                }

                if($partial && $this->collDeliveries) {
                    foreach($this->collDeliveries as $obj) {
                        if($obj->isNew()) {
                            $collDeliveries[] = $obj;
                        }
                    }
                }

                $this->collDeliveries = $collDeliveries;
                $this->collDeliveriesPartial = false;
            }
        }

        return $this->collDeliveries;
    }

    /**
     * Sets a collection of Delivery objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $deliveries A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setDeliveries(PropelCollection $deliveries, PropelPDO $con = null)
    {
        $this->deliveriesScheduledForDeletion = $this->getDeliveries(new Criteria(), $con)->diff($deliveries);

        foreach ($this->deliveriesScheduledForDeletion as $deliveryRemoved) {
            $deliveryRemoved->setProfile(null);
        }

        $this->collDeliveries = null;
        foreach ($deliveries as $delivery) {
            $this->addDelivery($delivery);
        }

        $this->collDeliveries = $deliveries;
        $this->collDeliveriesPartial = false;
    }

    /**
     * Returns the number of related Delivery objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Delivery objects.
     * @throws PropelException
     */
    public function countDeliveries(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collDeliveriesPartial && !$this->isNew();
        if (null === $this->collDeliveries || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDeliveries) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getDeliveries());
                }
                $query = DeliveryQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByProfile($this)
                    ->count($con);
            }
        } else {
            return count($this->collDeliveries);
        }
    }

    /**
     * Method called to associate a Delivery object to this object
     * through the Delivery foreign key attribute.
     *
     * @param    Delivery $l Delivery
     * @return Profile The current object (for fluent API support)
     */
    public function addDelivery(Delivery $l)
    {
        if ($this->collDeliveries === null) {
            $this->initDeliveries();
            $this->collDeliveriesPartial = true;
        }
        if (!in_array($l, $this->collDeliveries->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddDelivery($l);
        }

        return $this;
    }

    /**
     * @param	Delivery $delivery The delivery object to add.
     */
    protected function doAddDelivery($delivery)
    {
        $this->collDeliveries[]= $delivery;
        $delivery->setProfile($this);
    }

    /**
     * @param	Delivery $delivery The delivery object to remove.
     */
    public function removeDelivery($delivery)
    {
        if ($this->getDeliveries()->contains($delivery)) {
            $this->collDeliveries->remove($this->collDeliveries->search($delivery));
            if (null === $this->deliveriesScheduledForDeletion) {
                $this->deliveriesScheduledForDeletion = clone $this->collDeliveries;
                $this->deliveriesScheduledForDeletion->clear();
            }
            $this->deliveriesScheduledForDeletion[]= $delivery;
            $delivery->setProfile(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Profile is new, it will return
     * an empty collection; or if this Profile has previously
     * been saved, it will retrieve related Deliveries from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Profile.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Delivery[] List of Delivery objects
     */
    public function getDeliveriesJoinRevisionRelatedByCurrentRevisionId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = DeliveryQuery::create(null, $criteria);
        $query->joinWith('RevisionRelatedByCurrentRevisionId', $join_behavior);

        return $this->getDeliveries($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Profile is new, it will return
     * an empty collection; or if this Profile has previously
     * been saved, it will retrieve related Deliveries from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Profile.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Delivery[] List of Delivery objects
     */
    public function getDeliveriesJoinSnapshot($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = DeliveryQuery::create(null, $criteria);
        $query->joinWith('Snapshot', $join_behavior);

        return $this->getDeliveries($query, $con);
    }

    /**
     * Clears out the collPersonProfiles collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addPersonProfiles()
     */
    public function clearPersonProfiles()
    {
        $this->collPersonProfiles = null; // important to set this to null since that means it is uninitialized
        $this->collPersonProfilesPartial = null;
    }

    /**
     * reset is the collPersonProfiles collection loaded partially
     *
     * @return void
     */
    public function resetPartialPersonProfiles($v = true)
    {
        $this->collPersonProfilesPartial = $v;
    }

    /**
     * Initializes the collPersonProfiles collection.
     *
     * By default this just sets the collPersonProfiles collection to an empty array (like clearcollPersonProfiles());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPersonProfiles($overrideExisting = true)
    {
        if (null !== $this->collPersonProfiles && !$overrideExisting) {
            return;
        }
        $this->collPersonProfiles = new PropelObjectCollection();
        $this->collPersonProfiles->setModel('PersonProfile');
    }

    /**
     * Gets an array of PersonProfile objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Profile is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|PersonProfile[] List of PersonProfile objects
     * @throws PropelException
     */
    public function getPersonProfiles($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPersonProfilesPartial && !$this->isNew();
        if (null === $this->collPersonProfiles || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPersonProfiles) {
                // return empty collection
                $this->initPersonProfiles();
            } else {
                $collPersonProfiles = PersonProfileQuery::create(null, $criteria)
                    ->filterByProfile($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPersonProfilesPartial && count($collPersonProfiles)) {
                      $this->initPersonProfiles(false);

                      foreach($collPersonProfiles as $obj) {
                        if (false == $this->collPersonProfiles->contains($obj)) {
                          $this->collPersonProfiles->append($obj);
                        }
                      }

                      $this->collPersonProfilesPartial = true;
                    }

                    return $collPersonProfiles;
                }

                if($partial && $this->collPersonProfiles) {
                    foreach($this->collPersonProfiles as $obj) {
                        if($obj->isNew()) {
                            $collPersonProfiles[] = $obj;
                        }
                    }
                }

                $this->collPersonProfiles = $collPersonProfiles;
                $this->collPersonProfilesPartial = false;
            }
        }

        return $this->collPersonProfiles;
    }

    /**
     * Sets a collection of PersonProfile objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $personProfiles A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setPersonProfiles(PropelCollection $personProfiles, PropelPDO $con = null)
    {
        $this->personProfilesScheduledForDeletion = $this->getPersonProfiles(new Criteria(), $con)->diff($personProfiles);

        foreach ($this->personProfilesScheduledForDeletion as $personProfileRemoved) {
            $personProfileRemoved->setProfile(null);
        }

        $this->collPersonProfiles = null;
        foreach ($personProfiles as $personProfile) {
            $this->addPersonProfile($personProfile);
        }

        $this->collPersonProfiles = $personProfiles;
        $this->collPersonProfilesPartial = false;
    }

    /**
     * Returns the number of related PersonProfile objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related PersonProfile objects.
     * @throws PropelException
     */
    public function countPersonProfiles(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPersonProfilesPartial && !$this->isNew();
        if (null === $this->collPersonProfiles || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPersonProfiles) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getPersonProfiles());
                }
                $query = PersonProfileQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByProfile($this)
                    ->count($con);
            }
        } else {
            return count($this->collPersonProfiles);
        }
    }

    /**
     * Method called to associate a PersonProfile object to this object
     * through the PersonProfile foreign key attribute.
     *
     * @param    PersonProfile $l PersonProfile
     * @return Profile The current object (for fluent API support)
     */
    public function addPersonProfile(PersonProfile $l)
    {
        if ($this->collPersonProfiles === null) {
            $this->initPersonProfiles();
            $this->collPersonProfilesPartial = true;
        }
        if (!in_array($l, $this->collPersonProfiles->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPersonProfile($l);
        }

        return $this;
    }

    /**
     * @param	PersonProfile $personProfile The personProfile object to add.
     */
    protected function doAddPersonProfile($personProfile)
    {
        $this->collPersonProfiles[]= $personProfile;
        $personProfile->setProfile($this);
    }

    /**
     * @param	PersonProfile $personProfile The personProfile object to remove.
     */
    public function removePersonProfile($personProfile)
    {
        if ($this->getPersonProfiles()->contains($personProfile)) {
            $this->collPersonProfiles->remove($this->collPersonProfiles->search($personProfile));
            if (null === $this->personProfilesScheduledForDeletion) {
                $this->personProfilesScheduledForDeletion = clone $this->collPersonProfiles;
                $this->personProfilesScheduledForDeletion->clear();
            }
            $this->personProfilesScheduledForDeletion[]= $personProfile;
            $personProfile->setProfile(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Profile is new, it will return
     * an empty collection; or if this Profile has previously
     * been saved, it will retrieve related PersonProfiles from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Profile.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PersonProfile[] List of PersonProfile objects
     */
    public function getPersonProfilesJoinPerson($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PersonProfileQuery::create(null, $criteria);
        $query->joinWith('Person', $join_behavior);

        return $this->getPersonProfiles($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->profile_group_id = null;
        $this->order_nr = null;
        $this->display_name = null;
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
            if ($this->collDeliveries) {
                foreach ($this->collDeliveries as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPersonProfiles) {
                foreach ($this->collPersonProfiles as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        if ($this->collDeliveries instanceof PropelCollection) {
            $this->collDeliveries->clearIterator();
        }
        $this->collDeliveries = null;
        if ($this->collPersonProfiles instanceof PropelCollection) {
            $this->collPersonProfiles->clearIterator();
        }
        $this->collPersonProfiles = null;
        $this->aProfileGroup = null;
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
     * @return    Profile
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
        return $this->profile_group_id;
    }

    /**
     * Wrap the setter for scope value
     *
     * @param     int
     * @return    Profile
     */
    public function setScopeValue($v)
    {
        return $this->setProfileGroupId($v);
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
        return $this->getOrderNr() == ProfileQuery::create()->getMaxRank($this->getProfileGroupId(), $con);
    }

    /**
     * Get the next item in the list, i.e. the one for which rank is immediately higher
     *
     * @param     PropelPDO  $con      optional connection
     *
     * @return    Profile
     */
    public function getNext(PropelPDO $con = null)
    {

        return ProfileQuery::create()->findOneByRank($this->getOrderNr() + 1, $this->getProfileGroupId(), $con);
    }

    /**
     * Get the previous item in the list, i.e. the one for which rank is immediately lower
     *
     * @param     PropelPDO  $con      optional connection
     *
     * @return    Profile
     */
    public function getPrevious(PropelPDO $con = null)
    {

        return ProfileQuery::create()->findOneByRank($this->getOrderNr() - 1, $this->getProfileGroupId(), $con);
    }

    /**
     * Insert at specified rank
     * The modifications are not persisted until the object is saved.
     *
     * @param     integer    $rank rank value
     * @param     PropelPDO  $con      optional connection
     *
     * @return    Profile the current object
     *
     * @throws    PropelException
     */
    public function insertAtRank($rank, PropelPDO $con = null)
    {
        $maxRank = ProfileQuery::create()->getMaxRank($this->getProfileGroupId(), $con);
        if ($rank < 1 || $rank > $maxRank + 1) {
            throw new PropelException('Invalid rank ' . $rank);
        }
        // move the object in the list, at the given rank
        $this->setOrderNr($rank);
        if ($rank != $maxRank + 1) {
            // Keep the list modification query for the save() transaction
            $this->sortableQueries []= array(
                'callable'  => array(self::PEER, 'shiftRank'),
                'arguments' => array(1, $rank, null, $this->getProfileGroupId())
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
     * @return    Profile the current object
     *
     * @throws    PropelException
     */
    public function insertAtBottom(PropelPDO $con = null)
    {
        $this->setOrderNr(ProfileQuery::create()->getMaxRank($this->getProfileGroupId(), $con) + 1);

        return $this;
    }

    /**
     * Insert in the first rank
     * The modifications are not persisted until the object is saved.
     *
     * @return    Profile the current object
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
     * @return    Profile the current object
     *
     * @throws    PropelException
     */
    public function moveToRank($newRank, PropelPDO $con = null)
    {
        if ($this->isNew()) {
            throw new PropelException('New objects cannot be moved. Please use insertAtRank() instead');
        }
        if ($con === null) {
            $con = Propel::getConnection(ProfilePeer::DATABASE_NAME);
        }
        if ($newRank < 1 || $newRank > ProfileQuery::create()->getMaxRank($this->getProfileGroupId(), $con)) {
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
            ProfilePeer::shiftRank($delta, min($oldRank, $newRank), max($oldRank, $newRank), $this->getProfileGroupId(), $con);

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
     * @param     Profile $object
     * @param     PropelPDO $con optional connection
     *
     * @return    Profile the current object
     *
     * @throws Exception if the database cannot execute the two updates
     */
    public function swapWith($object, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProfilePeer::DATABASE_NAME);
        }
        $con->beginTransaction();
        try {
            $oldScope = $this->getProfileGroupId();
            $newScope = $object->getProfileGroupId();
            if ($oldScope != $newScope) {
                $this->setProfileGroupId($newScope);
                $object->setProfileGroupId($oldScope);
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
     * @return    Profile the current object
     */
    public function moveUp(PropelPDO $con = null)
    {
        if ($this->isFirst()) {
            return $this;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProfilePeer::DATABASE_NAME);
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
     * @return    Profile the current object
     */
    public function moveDown(PropelPDO $con = null)
    {
        if ($this->isLast($con)) {
            return $this;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProfilePeer::DATABASE_NAME);
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
     * @return    Profile the current object
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
            $con = Propel::getConnection(ProfilePeer::DATABASE_NAME);
        }
        $con->beginTransaction();
        try {
            $bottom = ProfileQuery::create()->getMaxRank($this->getProfileGroupId(), $con);
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
     * @return    Profile the current object
     */
    public function removeFromList(PropelPDO $con = null)
    {
        // check if object is already removed
        if ($this->getProfileGroupId() === null) {
            throw new PropelException('Object is already removed (has null scope)');
        }

        // move the object to the end of null scope
        $this->setProfileGroupId(null);
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
