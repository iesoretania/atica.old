<?php


/**
 * Base class that represents a row from the 'grouping_folder' table.
 *
 *
 *
 * @package    propel.generator.atica.om
 */
abstract class BaseGroupingFolder extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'GroupingFolderPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        GroupingFolderPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the grouping_id field.
     * @var        int
     */
    protected $grouping_id;

    /**
     * The value for the folder_id field.
     * @var        int
     */
    protected $folder_id;

    /**
     * The value for the order_nr field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $order_nr;

    /**
     * The value for the alt_display_name field.
     * @var        string
     */
    protected $alt_display_name;

    /**
     * @var        Folder
     */
    protected $aFolder;

    /**
     * @var        Grouping
     */
    protected $aGrouping;

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
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->order_nr = 0;
    }

    /**
     * Initializes internal state of BaseGroupingFolder object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [grouping_id] column value.
     *
     * @return int
     */
    public function getGroupingId()
    {
        return $this->grouping_id;
    }

    /**
     * Get the [folder_id] column value.
     *
     * @return int
     */
    public function getFolderId()
    {
        return $this->folder_id;
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
     * Get the [alt_display_name] column value.
     *
     * @return string
     */
    public function getAltDisplayName()
    {
        return $this->alt_display_name;
    }

    /**
     * Set the value of [grouping_id] column.
     *
     * @param int $v new value
     * @return GroupingFolder The current object (for fluent API support)
     */
    public function setGroupingId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->grouping_id !== $v) {
            $this->grouping_id = $v;
            $this->modifiedColumns[] = GroupingFolderPeer::GROUPING_ID;
        }

        if ($this->aGrouping !== null && $this->aGrouping->getId() !== $v) {
            $this->aGrouping = null;
        }


        return $this;
    } // setGroupingId()

    /**
     * Set the value of [folder_id] column.
     *
     * @param int $v new value
     * @return GroupingFolder The current object (for fluent API support)
     */
    public function setFolderId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->folder_id !== $v) {
            $this->folder_id = $v;
            $this->modifiedColumns[] = GroupingFolderPeer::FOLDER_ID;
        }

        if ($this->aFolder !== null && $this->aFolder->getId() !== $v) {
            $this->aFolder = null;
        }


        return $this;
    } // setFolderId()

    /**
     * Set the value of [order_nr] column.
     *
     * @param int $v new value
     * @return GroupingFolder The current object (for fluent API support)
     */
    public function setOrderNr($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->order_nr !== $v) {
            $this->order_nr = $v;
            $this->modifiedColumns[] = GroupingFolderPeer::ORDER_NR;
        }


        return $this;
    } // setOrderNr()

    /**
     * Set the value of [alt_display_name] column.
     *
     * @param string $v new value
     * @return GroupingFolder The current object (for fluent API support)
     */
    public function setAltDisplayName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->alt_display_name !== $v) {
            $this->alt_display_name = $v;
            $this->modifiedColumns[] = GroupingFolderPeer::ALT_DISPLAY_NAME;
        }


        return $this;
    } // setAltDisplayName()

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
            if ($this->order_nr !== 0) {
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

            $this->grouping_id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->folder_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->order_nr = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->alt_display_name = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 4; // 4 = GroupingFolderPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating GroupingFolder object", $e);
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

        if ($this->aGrouping !== null && $this->grouping_id !== $this->aGrouping->getId()) {
            $this->aGrouping = null;
        }
        if ($this->aFolder !== null && $this->folder_id !== $this->aFolder->getId()) {
            $this->aFolder = null;
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
            $con = Propel::getConnection(GroupingFolderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = GroupingFolderPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aFolder = null;
            $this->aGrouping = null;
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
            $con = Propel::getConnection(GroupingFolderPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = GroupingFolderQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            // sortable behavior

            GroupingFolderPeer::shiftRank(-1, $this->getOrderNr() + 1, null, $con);
            GroupingFolderPeer::clearInstancePool();

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
            $con = Propel::getConnection(GroupingFolderPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                if (!$this->isColumnModified(GroupingFolderPeer::RANK_COL)) {
                    $this->setOrderNr(GroupingFolderQuery::create()->getMaxRank($con) + 1);
                }

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
                GroupingFolderPeer::addInstanceToPool($this);
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

            if ($this->aFolder !== null) {
                if ($this->aFolder->isModified() || $this->aFolder->isNew()) {
                    $affectedRows += $this->aFolder->save($con);
                }
                $this->setFolder($this->aFolder);
            }

            if ($this->aGrouping !== null) {
                if ($this->aGrouping->isModified() || $this->aGrouping->isNew()) {
                    $affectedRows += $this->aGrouping->save($con);
                }
                $this->setGrouping($this->aGrouping);
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


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(GroupingFolderPeer::GROUPING_ID)) {
            $modifiedColumns[':p' . $index++]  = '`GROUPING_ID`';
        }
        if ($this->isColumnModified(GroupingFolderPeer::FOLDER_ID)) {
            $modifiedColumns[':p' . $index++]  = '`FOLDER_ID`';
        }
        if ($this->isColumnModified(GroupingFolderPeer::ORDER_NR)) {
            $modifiedColumns[':p' . $index++]  = '`ORDER_NR`';
        }
        if ($this->isColumnModified(GroupingFolderPeer::ALT_DISPLAY_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`ALT_DISPLAY_NAME`';
        }

        $sql = sprintf(
            'INSERT INTO `grouping_folder` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`GROUPING_ID`':
                        $stmt->bindValue($identifier, $this->grouping_id, PDO::PARAM_INT);
                        break;
                    case '`FOLDER_ID`':
                        $stmt->bindValue($identifier, $this->folder_id, PDO::PARAM_INT);
                        break;
                    case '`ORDER_NR`':
                        $stmt->bindValue($identifier, $this->order_nr, PDO::PARAM_INT);
                        break;
                    case '`ALT_DISPLAY_NAME`':
                        $stmt->bindValue($identifier, $this->alt_display_name, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

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

            if ($this->aFolder !== null) {
                if (!$this->aFolder->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aFolder->getValidationFailures());
                }
            }

            if ($this->aGrouping !== null) {
                if (!$this->aGrouping->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aGrouping->getValidationFailures());
                }
            }


            if (($retval = GroupingFolderPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
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
        $pos = GroupingFolderPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getGroupingId();
                break;
            case 1:
                return $this->getFolderId();
                break;
            case 2:
                return $this->getOrderNr();
                break;
            case 3:
                return $this->getAltDisplayName();
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
        if (isset($alreadyDumpedObjects['GroupingFolder'][serialize($this->getPrimaryKey())])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['GroupingFolder'][serialize($this->getPrimaryKey())] = true;
        $keys = GroupingFolderPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getGroupingId(),
            $keys[1] => $this->getFolderId(),
            $keys[2] => $this->getOrderNr(),
            $keys[3] => $this->getAltDisplayName(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aFolder) {
                $result['Folder'] = $this->aFolder->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aGrouping) {
                $result['Grouping'] = $this->aGrouping->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = GroupingFolderPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setGroupingId($value);
                break;
            case 1:
                $this->setFolderId($value);
                break;
            case 2:
                $this->setOrderNr($value);
                break;
            case 3:
                $this->setAltDisplayName($value);
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
        $keys = GroupingFolderPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setGroupingId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setFolderId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setOrderNr($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setAltDisplayName($arr[$keys[3]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(GroupingFolderPeer::DATABASE_NAME);

        if ($this->isColumnModified(GroupingFolderPeer::GROUPING_ID)) $criteria->add(GroupingFolderPeer::GROUPING_ID, $this->grouping_id);
        if ($this->isColumnModified(GroupingFolderPeer::FOLDER_ID)) $criteria->add(GroupingFolderPeer::FOLDER_ID, $this->folder_id);
        if ($this->isColumnModified(GroupingFolderPeer::ORDER_NR)) $criteria->add(GroupingFolderPeer::ORDER_NR, $this->order_nr);
        if ($this->isColumnModified(GroupingFolderPeer::ALT_DISPLAY_NAME)) $criteria->add(GroupingFolderPeer::ALT_DISPLAY_NAME, $this->alt_display_name);

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
        $criteria = new Criteria(GroupingFolderPeer::DATABASE_NAME);
        $criteria->add(GroupingFolderPeer::GROUPING_ID, $this->grouping_id);
        $criteria->add(GroupingFolderPeer::FOLDER_ID, $this->folder_id);

        return $criteria;
    }

    /**
     * Returns the composite primary key for this object.
     * The array elements will be in same order as specified in XML.
     * @return array
     */
    public function getPrimaryKey()
    {
        $pks = array();
        $pks[0] = $this->getGroupingId();
        $pks[1] = $this->getFolderId();

        return $pks;
    }

    /**
     * Set the [composite] primary key.
     *
     * @param array $keys The elements of the composite key (order must match the order in XML file).
     * @return void
     */
    public function setPrimaryKey($keys)
    {
        $this->setGroupingId($keys[0]);
        $this->setFolderId($keys[1]);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return (null === $this->getGroupingId()) && (null === $this->getFolderId());
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of GroupingFolder (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setGroupingId($this->getGroupingId());
        $copyObj->setFolderId($this->getFolderId());
        $copyObj->setOrderNr($this->getOrderNr());
        $copyObj->setAltDisplayName($this->getAltDisplayName());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
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
     * @return GroupingFolder Clone of current object.
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
     * @return GroupingFolderPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new GroupingFolderPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Folder object.
     *
     * @param             Folder $v
     * @return GroupingFolder The current object (for fluent API support)
     * @throws PropelException
     */
    public function setFolder(Folder $v = null)
    {
        if ($v === null) {
            $this->setFolderId(NULL);
        } else {
            $this->setFolderId($v->getId());
        }

        $this->aFolder = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Folder object, it will not be re-added.
        if ($v !== null) {
            $v->addGroupingFolder($this);
        }


        return $this;
    }


    /**
     * Get the associated Folder object
     *
     * @param PropelPDO $con Optional Connection object.
     * @return Folder The associated Folder object.
     * @throws PropelException
     */
    public function getFolder(PropelPDO $con = null)
    {
        if ($this->aFolder === null && ($this->folder_id !== null)) {
            $this->aFolder = FolderQuery::create()->findPk($this->folder_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aFolder->addGroupingFolders($this);
             */
        }

        return $this->aFolder;
    }

    /**
     * Declares an association between this object and a Grouping object.
     *
     * @param             Grouping $v
     * @return GroupingFolder The current object (for fluent API support)
     * @throws PropelException
     */
    public function setGrouping(Grouping $v = null)
    {
        if ($v === null) {
            $this->setGroupingId(NULL);
        } else {
            $this->setGroupingId($v->getId());
        }

        $this->aGrouping = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Grouping object, it will not be re-added.
        if ($v !== null) {
            $v->addGroupingFolder($this);
        }


        return $this;
    }


    /**
     * Get the associated Grouping object
     *
     * @param PropelPDO $con Optional Connection object.
     * @return Grouping The associated Grouping object.
     * @throws PropelException
     */
    public function getGrouping(PropelPDO $con = null)
    {
        if ($this->aGrouping === null && ($this->grouping_id !== null)) {
            $this->aGrouping = GroupingQuery::create()->findPk($this->grouping_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aGrouping->addGroupingFolders($this);
             */
        }

        return $this->aGrouping;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->grouping_id = null;
        $this->folder_id = null;
        $this->order_nr = null;
        $this->alt_display_name = null;
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
        } // if ($deep)

        $this->aFolder = null;
        $this->aGrouping = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string The value of the 'alt_display_name' column
     */
    public function __toString()
    {
        return (string) $this->getAltDisplayName();
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
     * @return    GroupingFolder
     */
    public function setRank($v)
    {
        return $this->setOrderNr($v);
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
        return $this->getOrderNr() == GroupingFolderQuery::create()->getMaxRank($con);
    }

    /**
     * Get the next item in the list, i.e. the one for which rank is immediately higher
     *
     * @param     PropelPDO  $con      optional connection
     *
     * @return    GroupingFolder
     */
    public function getNext(PropelPDO $con = null)
    {

        return GroupingFolderQuery::create()->findOneByRank($this->getOrderNr() + 1, $con);
    }

    /**
     * Get the previous item in the list, i.e. the one for which rank is immediately lower
     *
     * @param     PropelPDO  $con      optional connection
     *
     * @return    GroupingFolder
     */
    public function getPrevious(PropelPDO $con = null)
    {

        return GroupingFolderQuery::create()->findOneByRank($this->getOrderNr() - 1, $con);
    }

    /**
     * Insert at specified rank
     * The modifications are not persisted until the object is saved.
     *
     * @param     integer    $rank rank value
     * @param     PropelPDO  $con      optional connection
     *
     * @return    GroupingFolder the current object
     *
     * @throws    PropelException
     */
    public function insertAtRank($rank, PropelPDO $con = null)
    {
        $maxRank = GroupingFolderQuery::create()->getMaxRank($con);
        if ($rank < 1 || $rank > $maxRank + 1) {
            throw new PropelException('Invalid rank ' . $rank);
        }
        // move the object in the list, at the given rank
        $this->setOrderNr($rank);
        if ($rank != $maxRank + 1) {
            // Keep the list modification query for the save() transaction
            $this->sortableQueries []= array(
                'callable'  => array(self::PEER, 'shiftRank'),
                'arguments' => array(1, $rank, null, )
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
     * @return    GroupingFolder the current object
     *
     * @throws    PropelException
     */
    public function insertAtBottom(PropelPDO $con = null)
    {
        $this->setOrderNr(GroupingFolderQuery::create()->getMaxRank($con) + 1);

        return $this;
    }

    /**
     * Insert in the first rank
     * The modifications are not persisted until the object is saved.
     *
     * @return    GroupingFolder the current object
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
     * @return    GroupingFolder the current object
     *
     * @throws    PropelException
     */
    public function moveToRank($newRank, PropelPDO $con = null)
    {
        if ($this->isNew()) {
            throw new PropelException('New objects cannot be moved. Please use insertAtRank() instead');
        }
        if ($con === null) {
            $con = Propel::getConnection(GroupingFolderPeer::DATABASE_NAME);
        }
        if ($newRank < 1 || $newRank > GroupingFolderQuery::create()->getMaxRank($con)) {
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
            GroupingFolderPeer::shiftRank($delta, min($oldRank, $newRank), max($oldRank, $newRank), $con);

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
     * @param     GroupingFolder $object
     * @param     PropelPDO $con optional connection
     *
     * @return    GroupingFolder the current object
     *
     * @throws Exception if the database cannot execute the two updates
     */
    public function swapWith($object, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(GroupingFolderPeer::DATABASE_NAME);
        }
        $con->beginTransaction();
        try {
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
     * @return    GroupingFolder the current object
     */
    public function moveUp(PropelPDO $con = null)
    {
        if ($this->isFirst()) {
            return $this;
        }
        if ($con === null) {
            $con = Propel::getConnection(GroupingFolderPeer::DATABASE_NAME);
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
     * @return    GroupingFolder the current object
     */
    public function moveDown(PropelPDO $con = null)
    {
        if ($this->isLast($con)) {
            return $this;
        }
        if ($con === null) {
            $con = Propel::getConnection(GroupingFolderPeer::DATABASE_NAME);
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
     * @return    GroupingFolder the current object
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
            $con = Propel::getConnection(GroupingFolderPeer::DATABASE_NAME);
        }
        $con->beginTransaction();
        try {
            $bottom = GroupingFolderQuery::create()->getMaxRank($con);
            $res = $this->moveToRank($bottom, $con);
            $con->commit();

            return $res;
        } catch (Exception $e) {
            $con->rollback();
            throw $e;
        }
    }

    /**
     * Removes the current object from the list.
     * The modifications are not persisted until the object is saved.
     *
     * @param     PropelPDO $con optional connection
     *
     * @return    GroupingFolder the current object
     */
    public function removeFromList(PropelPDO $con = null)
    {
        // Keep the list modification query for the save() transaction
        $this->sortableQueries []= array(
            'callable'  => array(self::PEER, 'shiftRank'),
            'arguments' => array(-1, $this->getOrderNr() + 1, null)
        );
        // remove the object from the list
        $this->setOrderNr(null);

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
