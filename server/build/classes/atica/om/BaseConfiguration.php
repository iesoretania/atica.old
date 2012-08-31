<?php


/**
 * Base class that represents a row from the 'configuration' table.
 *
 *
 *
 * @package    propel.generator.atica.om
 */
abstract class BaseConfiguration extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ConfigurationPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ConfigurationPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id field.
     * @var        string
     */
    protected $id;

    /**
     * The value for the organization_id field.
     * @var        int
     */
    protected $organization_id;

    /**
     * The value for the snapshot_id field.
     * @var        int
     */
    protected $snapshot_id;

    /**
     * The value for the content_type field.
     * @var        int
     */
    protected $content_type;

    /**
     * The value for the content_subtype field.
     * @var        int
     */
    protected $content_subtype;

    /**
     * The value for the order_nr field.
     * @var        int
     */
    protected $order_nr;

    /**
     * The value for the section_group field.
     * @var        string
     */
    protected $section_group;

    /**
     * The value for the description field.
     * @var        string
     */
    protected $description;

    /**
     * The value for the content field.
     * @var        string
     */
    protected $content;

    /**
     * The value for the is_organization_preference field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $is_organization_preference;

    /**
     * The value for the is_snapshot_preference field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $is_snapshot_preference;

    /**
     * @var        Organization
     */
    protected $aOrganization;

    /**
     * @var        Snapshot
     */
    protected $aSnapshot;

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
        $this->is_organization_preference = false;
        $this->is_snapshot_preference = false;
    }

    /**
     * Initializes internal state of BaseConfiguration object.
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
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [organization_id] column value.
     *
     * @return int
     */
    public function getOrganizationId()
    {
        return $this->organization_id;
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
     * Get the [content_type] column value.
     *
     * @return int
     */
    public function getContentType()
    {
        return $this->content_type;
    }

    /**
     * Get the [content_subtype] column value.
     *
     * @return int
     */
    public function getContentSubtype()
    {
        return $this->content_subtype;
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
     * Get the [section_group] column value.
     *
     * @return string
     */
    public function getSectionGroup()
    {
        return $this->section_group;
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
     * Get the [content] column value.
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Get the [is_organization_preference] column value.
     *
     * @return boolean
     */
    public function getIsOrganizationPreference()
    {
        return $this->is_organization_preference;
    }

    /**
     * Get the [is_snapshot_preference] column value.
     *
     * @return boolean
     */
    public function getIsSnapshotPreference()
    {
        return $this->is_snapshot_preference;
    }

    /**
     * Set the value of [id] column.
     *
     * @param string $v new value
     * @return Configuration The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = ConfigurationPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [organization_id] column.
     *
     * @param int $v new value
     * @return Configuration The current object (for fluent API support)
     */
    public function setOrganizationId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->organization_id !== $v) {
            $this->organization_id = $v;
            $this->modifiedColumns[] = ConfigurationPeer::ORGANIZATION_ID;
        }

        if ($this->aOrganization !== null && $this->aOrganization->getId() !== $v) {
            $this->aOrganization = null;
        }


        return $this;
    } // setOrganizationId()

    /**
     * Set the value of [snapshot_id] column.
     *
     * @param int $v new value
     * @return Configuration The current object (for fluent API support)
     */
    public function setSnapshotId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->snapshot_id !== $v) {
            $this->snapshot_id = $v;
            $this->modifiedColumns[] = ConfigurationPeer::SNAPSHOT_ID;
        }

        if ($this->aSnapshot !== null && $this->aSnapshot->getId() !== $v) {
            $this->aSnapshot = null;
        }


        return $this;
    } // setSnapshotId()

    /**
     * Set the value of [content_type] column.
     *
     * @param int $v new value
     * @return Configuration The current object (for fluent API support)
     */
    public function setContentType($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->content_type !== $v) {
            $this->content_type = $v;
            $this->modifiedColumns[] = ConfigurationPeer::CONTENT_TYPE;
        }


        return $this;
    } // setContentType()

    /**
     * Set the value of [content_subtype] column.
     *
     * @param int $v new value
     * @return Configuration The current object (for fluent API support)
     */
    public function setContentSubtype($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->content_subtype !== $v) {
            $this->content_subtype = $v;
            $this->modifiedColumns[] = ConfigurationPeer::CONTENT_SUBTYPE;
        }


        return $this;
    } // setContentSubtype()

    /**
     * Set the value of [order_nr] column.
     *
     * @param int $v new value
     * @return Configuration The current object (for fluent API support)
     */
    public function setOrderNr($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->order_nr !== $v) {
            $this->order_nr = $v;
            $this->modifiedColumns[] = ConfigurationPeer::ORDER_NR;
        }


        return $this;
    } // setOrderNr()

    /**
     * Set the value of [section_group] column.
     *
     * @param string $v new value
     * @return Configuration The current object (for fluent API support)
     */
    public function setSectionGroup($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->section_group !== $v) {
            $this->section_group = $v;
            $this->modifiedColumns[] = ConfigurationPeer::SECTION_GROUP;
        }


        return $this;
    } // setSectionGroup()

    /**
     * Set the value of [description] column.
     *
     * @param string $v new value
     * @return Configuration The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[] = ConfigurationPeer::DESCRIPTION;
        }


        return $this;
    } // setDescription()

    /**
     * Set the value of [content] column.
     *
     * @param string $v new value
     * @return Configuration The current object (for fluent API support)
     */
    public function setContent($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->content !== $v) {
            $this->content = $v;
            $this->modifiedColumns[] = ConfigurationPeer::CONTENT;
        }


        return $this;
    } // setContent()

    /**
     * Sets the value of the [is_organization_preference] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Configuration The current object (for fluent API support)
     */
    public function setIsOrganizationPreference($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_organization_preference !== $v) {
            $this->is_organization_preference = $v;
            $this->modifiedColumns[] = ConfigurationPeer::IS_ORGANIZATION_PREFERENCE;
        }


        return $this;
    } // setIsOrganizationPreference()

    /**
     * Sets the value of the [is_snapshot_preference] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Configuration The current object (for fluent API support)
     */
    public function setIsSnapshotPreference($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_snapshot_preference !== $v) {
            $this->is_snapshot_preference = $v;
            $this->modifiedColumns[] = ConfigurationPeer::IS_SNAPSHOT_PREFERENCE;
        }


        return $this;
    } // setIsSnapshotPreference()

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
            if ($this->is_organization_preference !== false) {
                return false;
            }

            if ($this->is_snapshot_preference !== false) {
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

            $this->id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->organization_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->snapshot_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->content_type = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->content_subtype = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->order_nr = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->section_group = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->description = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->content = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->is_organization_preference = ($row[$startcol + 9] !== null) ? (boolean) $row[$startcol + 9] : null;
            $this->is_snapshot_preference = ($row[$startcol + 10] !== null) ? (boolean) $row[$startcol + 10] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 11; // 11 = ConfigurationPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Configuration object", $e);
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

        if ($this->aOrganization !== null && $this->organization_id !== $this->aOrganization->getId()) {
            $this->aOrganization = null;
        }
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
            $con = Propel::getConnection(ConfigurationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ConfigurationPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aOrganization = null;
            $this->aSnapshot = null;
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
            $con = Propel::getConnection(ConfigurationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ConfigurationQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            // sortable behavior

            ConfigurationPeer::shiftRank(-1, $this->getOrderNr() + 1, null, $con);
            ConfigurationPeer::clearInstancePool();

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
            $con = Propel::getConnection(ConfigurationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                if (!$this->isColumnModified(ConfigurationPeer::RANK_COL)) {
                    $this->setOrderNr(ConfigurationQuery::create()->getMaxRank($con) + 1);
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
                ConfigurationPeer::addInstanceToPool($this);
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

            if ($this->aOrganization !== null) {
                if ($this->aOrganization->isModified() || $this->aOrganization->isNew()) {
                    $affectedRows += $this->aOrganization->save($con);
                }
                $this->setOrganization($this->aOrganization);
            }

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
        if ($this->isColumnModified(ConfigurationPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`ID`';
        }
        if ($this->isColumnModified(ConfigurationPeer::ORGANIZATION_ID)) {
            $modifiedColumns[':p' . $index++]  = '`ORGANIZATION_ID`';
        }
        if ($this->isColumnModified(ConfigurationPeer::SNAPSHOT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`SNAPSHOT_ID`';
        }
        if ($this->isColumnModified(ConfigurationPeer::CONTENT_TYPE)) {
            $modifiedColumns[':p' . $index++]  = '`CONTENT_TYPE`';
        }
        if ($this->isColumnModified(ConfigurationPeer::CONTENT_SUBTYPE)) {
            $modifiedColumns[':p' . $index++]  = '`CONTENT_SUBTYPE`';
        }
        if ($this->isColumnModified(ConfigurationPeer::ORDER_NR)) {
            $modifiedColumns[':p' . $index++]  = '`ORDER_NR`';
        }
        if ($this->isColumnModified(ConfigurationPeer::SECTION_GROUP)) {
            $modifiedColumns[':p' . $index++]  = '`SECTION_GROUP`';
        }
        if ($this->isColumnModified(ConfigurationPeer::DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`DESCRIPTION`';
        }
        if ($this->isColumnModified(ConfigurationPeer::CONTENT)) {
            $modifiedColumns[':p' . $index++]  = '`CONTENT`';
        }
        if ($this->isColumnModified(ConfigurationPeer::IS_ORGANIZATION_PREFERENCE)) {
            $modifiedColumns[':p' . $index++]  = '`IS_ORGANIZATION_PREFERENCE`';
        }
        if ($this->isColumnModified(ConfigurationPeer::IS_SNAPSHOT_PREFERENCE)) {
            $modifiedColumns[':p' . $index++]  = '`IS_SNAPSHOT_PREFERENCE`';
        }

        $sql = sprintf(
            'INSERT INTO `configuration` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`ID`':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_STR);
                        break;
                    case '`ORGANIZATION_ID`':
                        $stmt->bindValue($identifier, $this->organization_id, PDO::PARAM_INT);
                        break;
                    case '`SNAPSHOT_ID`':
                        $stmt->bindValue($identifier, $this->snapshot_id, PDO::PARAM_INT);
                        break;
                    case '`CONTENT_TYPE`':
                        $stmt->bindValue($identifier, $this->content_type, PDO::PARAM_INT);
                        break;
                    case '`CONTENT_SUBTYPE`':
                        $stmt->bindValue($identifier, $this->content_subtype, PDO::PARAM_INT);
                        break;
                    case '`ORDER_NR`':
                        $stmt->bindValue($identifier, $this->order_nr, PDO::PARAM_INT);
                        break;
                    case '`SECTION_GROUP`':
                        $stmt->bindValue($identifier, $this->section_group, PDO::PARAM_STR);
                        break;
                    case '`DESCRIPTION`':
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
                        break;
                    case '`CONTENT`':
                        $stmt->bindValue($identifier, $this->content, PDO::PARAM_STR);
                        break;
                    case '`IS_ORGANIZATION_PREFERENCE`':
                        $stmt->bindValue($identifier, (int) $this->is_organization_preference, PDO::PARAM_INT);
                        break;
                    case '`IS_SNAPSHOT_PREFERENCE`':
                        $stmt->bindValue($identifier, (int) $this->is_snapshot_preference, PDO::PARAM_INT);
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

            if ($this->aOrganization !== null) {
                if (!$this->aOrganization->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aOrganization->getValidationFailures());
                }
            }

            if ($this->aSnapshot !== null) {
                if (!$this->aSnapshot->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSnapshot->getValidationFailures());
                }
            }


            if (($retval = ConfigurationPeer::doValidate($this, $columns)) !== true) {
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
        $pos = ConfigurationPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getOrganizationId();
                break;
            case 2:
                return $this->getSnapshotId();
                break;
            case 3:
                return $this->getContentType();
                break;
            case 4:
                return $this->getContentSubtype();
                break;
            case 5:
                return $this->getOrderNr();
                break;
            case 6:
                return $this->getSectionGroup();
                break;
            case 7:
                return $this->getDescription();
                break;
            case 8:
                return $this->getContent();
                break;
            case 9:
                return $this->getIsOrganizationPreference();
                break;
            case 10:
                return $this->getIsSnapshotPreference();
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
        if (isset($alreadyDumpedObjects['Configuration'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Configuration'][$this->getPrimaryKey()] = true;
        $keys = ConfigurationPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getOrganizationId(),
            $keys[2] => $this->getSnapshotId(),
            $keys[3] => $this->getContentType(),
            $keys[4] => $this->getContentSubtype(),
            $keys[5] => $this->getOrderNr(),
            $keys[6] => $this->getSectionGroup(),
            $keys[7] => $this->getDescription(),
            $keys[8] => $this->getContent(),
            $keys[9] => $this->getIsOrganizationPreference(),
            $keys[10] => $this->getIsSnapshotPreference(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aOrganization) {
                $result['Organization'] = $this->aOrganization->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSnapshot) {
                $result['Snapshot'] = $this->aSnapshot->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = ConfigurationPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setOrganizationId($value);
                break;
            case 2:
                $this->setSnapshotId($value);
                break;
            case 3:
                $this->setContentType($value);
                break;
            case 4:
                $this->setContentSubtype($value);
                break;
            case 5:
                $this->setOrderNr($value);
                break;
            case 6:
                $this->setSectionGroup($value);
                break;
            case 7:
                $this->setDescription($value);
                break;
            case 8:
                $this->setContent($value);
                break;
            case 9:
                $this->setIsOrganizationPreference($value);
                break;
            case 10:
                $this->setIsSnapshotPreference($value);
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
        $keys = ConfigurationPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setOrganizationId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setSnapshotId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setContentType($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setContentSubtype($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setOrderNr($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setSectionGroup($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setDescription($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setContent($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setIsOrganizationPreference($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setIsSnapshotPreference($arr[$keys[10]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ConfigurationPeer::DATABASE_NAME);

        if ($this->isColumnModified(ConfigurationPeer::ID)) $criteria->add(ConfigurationPeer::ID, $this->id);
        if ($this->isColumnModified(ConfigurationPeer::ORGANIZATION_ID)) $criteria->add(ConfigurationPeer::ORGANIZATION_ID, $this->organization_id);
        if ($this->isColumnModified(ConfigurationPeer::SNAPSHOT_ID)) $criteria->add(ConfigurationPeer::SNAPSHOT_ID, $this->snapshot_id);
        if ($this->isColumnModified(ConfigurationPeer::CONTENT_TYPE)) $criteria->add(ConfigurationPeer::CONTENT_TYPE, $this->content_type);
        if ($this->isColumnModified(ConfigurationPeer::CONTENT_SUBTYPE)) $criteria->add(ConfigurationPeer::CONTENT_SUBTYPE, $this->content_subtype);
        if ($this->isColumnModified(ConfigurationPeer::ORDER_NR)) $criteria->add(ConfigurationPeer::ORDER_NR, $this->order_nr);
        if ($this->isColumnModified(ConfigurationPeer::SECTION_GROUP)) $criteria->add(ConfigurationPeer::SECTION_GROUP, $this->section_group);
        if ($this->isColumnModified(ConfigurationPeer::DESCRIPTION)) $criteria->add(ConfigurationPeer::DESCRIPTION, $this->description);
        if ($this->isColumnModified(ConfigurationPeer::CONTENT)) $criteria->add(ConfigurationPeer::CONTENT, $this->content);
        if ($this->isColumnModified(ConfigurationPeer::IS_ORGANIZATION_PREFERENCE)) $criteria->add(ConfigurationPeer::IS_ORGANIZATION_PREFERENCE, $this->is_organization_preference);
        if ($this->isColumnModified(ConfigurationPeer::IS_SNAPSHOT_PREFERENCE)) $criteria->add(ConfigurationPeer::IS_SNAPSHOT_PREFERENCE, $this->is_snapshot_preference);

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
        $criteria = new Criteria(ConfigurationPeer::DATABASE_NAME);
        $criteria->add(ConfigurationPeer::ID, $this->id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param  string $key Primary key.
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
     * @param object $copyObj An object of Configuration (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setOrganizationId($this->getOrganizationId());
        $copyObj->setSnapshotId($this->getSnapshotId());
        $copyObj->setContentType($this->getContentType());
        $copyObj->setContentSubtype($this->getContentSubtype());
        $copyObj->setOrderNr($this->getOrderNr());
        $copyObj->setSectionGroup($this->getSectionGroup());
        $copyObj->setDescription($this->getDescription());
        $copyObj->setContent($this->getContent());
        $copyObj->setIsOrganizationPreference($this->getIsOrganizationPreference());
        $copyObj->setIsSnapshotPreference($this->getIsSnapshotPreference());

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
     * @return Configuration Clone of current object.
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
     * @return ConfigurationPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ConfigurationPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Organization object.
     *
     * @param             Organization $v
     * @return Configuration The current object (for fluent API support)
     * @throws PropelException
     */
    public function setOrganization(Organization $v = null)
    {
        if ($v === null) {
            $this->setOrganizationId(NULL);
        } else {
            $this->setOrganizationId($v->getId());
        }

        $this->aOrganization = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Organization object, it will not be re-added.
        if ($v !== null) {
            $v->addConfiguration($this);
        }


        return $this;
    }


    /**
     * Get the associated Organization object
     *
     * @param PropelPDO $con Optional Connection object.
     * @return Organization The associated Organization object.
     * @throws PropelException
     */
    public function getOrganization(PropelPDO $con = null)
    {
        if ($this->aOrganization === null && ($this->organization_id !== null)) {
            $this->aOrganization = OrganizationQuery::create()->findPk($this->organization_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aOrganization->addConfigurations($this);
             */
        }

        return $this->aOrganization;
    }

    /**
     * Declares an association between this object and a Snapshot object.
     *
     * @param             Snapshot $v
     * @return Configuration The current object (for fluent API support)
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
            $v->addConfiguration($this);
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
                $this->aSnapshot->addConfigurations($this);
             */
        }

        return $this->aSnapshot;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->organization_id = null;
        $this->snapshot_id = null;
        $this->content_type = null;
        $this->content_subtype = null;
        $this->order_nr = null;
        $this->section_group = null;
        $this->description = null;
        $this->content = null;
        $this->is_organization_preference = null;
        $this->is_snapshot_preference = null;
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

        $this->aOrganization = null;
        $this->aSnapshot = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string The value of the 'content' column
     */
    public function __toString()
    {
        return (string) $this->getContent();
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
     * @return    Configuration
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
        return $this->getOrderNr() == ConfigurationQuery::create()->getMaxRank($con);
    }

    /**
     * Get the next item in the list, i.e. the one for which rank is immediately higher
     *
     * @param     PropelPDO  $con      optional connection
     *
     * @return    Configuration
     */
    public function getNext(PropelPDO $con = null)
    {

        return ConfigurationQuery::create()->findOneByRank($this->getOrderNr() + 1, $con);
    }

    /**
     * Get the previous item in the list, i.e. the one for which rank is immediately lower
     *
     * @param     PropelPDO  $con      optional connection
     *
     * @return    Configuration
     */
    public function getPrevious(PropelPDO $con = null)
    {

        return ConfigurationQuery::create()->findOneByRank($this->getOrderNr() - 1, $con);
    }

    /**
     * Insert at specified rank
     * The modifications are not persisted until the object is saved.
     *
     * @param     integer    $rank rank value
     * @param     PropelPDO  $con      optional connection
     *
     * @return    Configuration the current object
     *
     * @throws    PropelException
     */
    public function insertAtRank($rank, PropelPDO $con = null)
    {
        $maxRank = ConfigurationQuery::create()->getMaxRank($con);
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
     * @return    Configuration the current object
     *
     * @throws    PropelException
     */
    public function insertAtBottom(PropelPDO $con = null)
    {
        $this->setOrderNr(ConfigurationQuery::create()->getMaxRank($con) + 1);

        return $this;
    }

    /**
     * Insert in the first rank
     * The modifications are not persisted until the object is saved.
     *
     * @return    Configuration the current object
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
     * @return    Configuration the current object
     *
     * @throws    PropelException
     */
    public function moveToRank($newRank, PropelPDO $con = null)
    {
        if ($this->isNew()) {
            throw new PropelException('New objects cannot be moved. Please use insertAtRank() instead');
        }
        if ($con === null) {
            $con = Propel::getConnection(ConfigurationPeer::DATABASE_NAME);
        }
        if ($newRank < 1 || $newRank > ConfigurationQuery::create()->getMaxRank($con)) {
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
            ConfigurationPeer::shiftRank($delta, min($oldRank, $newRank), max($oldRank, $newRank), $con);

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
     * @param     Configuration $object
     * @param     PropelPDO $con optional connection
     *
     * @return    Configuration the current object
     *
     * @throws Exception if the database cannot execute the two updates
     */
    public function swapWith($object, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ConfigurationPeer::DATABASE_NAME);
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
     * @return    Configuration the current object
     */
    public function moveUp(PropelPDO $con = null)
    {
        if ($this->isFirst()) {
            return $this;
        }
        if ($con === null) {
            $con = Propel::getConnection(ConfigurationPeer::DATABASE_NAME);
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
     * @return    Configuration the current object
     */
    public function moveDown(PropelPDO $con = null)
    {
        if ($this->isLast($con)) {
            return $this;
        }
        if ($con === null) {
            $con = Propel::getConnection(ConfigurationPeer::DATABASE_NAME);
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
     * @return    Configuration the current object
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
            $con = Propel::getConnection(ConfigurationPeer::DATABASE_NAME);
        }
        $con->beginTransaction();
        try {
            $bottom = ConfigurationQuery::create()->getMaxRank($con);
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
     * @return    Configuration the current object
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
