<?php


/**
 * Base class that represents a row from the 'event' table.
 *
 *
 *
 * @package    propel.generator.atica.om
 */
abstract class BaseEvent extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'EventPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        EventPeer
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
     * The value for the from_week field.
     * @var        int
     */
    protected $from_week;

    /**
     * The value for the duration field.
     * @var        int
     */
    protected $duration;

    /**
     * The value for the is_automatic field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $is_automatic;

    /**
     * The value for the is_manual field.
     * Note: this column has a database default value of: true
     * @var        boolean
     */
    protected $is_manual;

    /**
     * The value for the is_visible field.
     * Note: this column has a database default value of: true
     * @var        boolean
     */
    protected $is_visible;

    /**
     * @var        Snapshot
     */
    protected $aSnapshot;

    /**
     * @var        PropelObjectCollection|CompletedEvent[] Collection to store aggregation of CompletedEvent objects.
     */
    protected $collCompletedEvents;
    protected $collCompletedEventsPartial;

    /**
     * @var        PropelObjectCollection|EventDelivery[] Collection to store aggregation of EventDelivery objects.
     */
    protected $collEventDeliveries;
    protected $collEventDeliveriesPartial;

    /**
     * @var        PropelObjectCollection|EventFolder[] Collection to store aggregation of EventFolder objects.
     */
    protected $collEventFolders;
    protected $collEventFoldersPartial;

    /**
     * @var        PropelObjectCollection|ActivityEvent[] Collection to store aggregation of ActivityEvent objects.
     */
    protected $collActivityEvents;
    protected $collActivityEventsPartial;

    /**
     * @var        PropelObjectCollection|EventProfileGroup[] Collection to store aggregation of EventProfileGroup objects.
     */
    protected $collEventProfileGroups;
    protected $collEventProfileGroupsPartial;

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
    protected $completedEventsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $eventDeliveriesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $eventFoldersScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $activityEventsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $eventProfileGroupsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->is_automatic = false;
        $this->is_manual = true;
        $this->is_visible = true;
    }

    /**
     * Initializes internal state of BaseEvent object.
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
     * Get the [from_week] column value.
     *
     * @return int
     */
    public function getFromWeek()
    {
        return $this->from_week;
    }

    /**
     * Get the [duration] column value.
     *
     * @return int
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Get the [is_automatic] column value.
     *
     * @return boolean
     */
    public function getIsAutomatic()
    {
        return $this->is_automatic;
    }

    /**
     * Get the [is_manual] column value.
     *
     * @return boolean
     */
    public function getIsManual()
    {
        return $this->is_manual;
    }

    /**
     * Get the [is_visible] column value.
     *
     * @return boolean
     */
    public function getIsVisible()
    {
        return $this->is_visible;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Event The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = EventPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [snapshot_id] column.
     *
     * @param int $v new value
     * @return Event The current object (for fluent API support)
     */
    public function setSnapshotId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->snapshot_id !== $v) {
            $this->snapshot_id = $v;
            $this->modifiedColumns[] = EventPeer::SNAPSHOT_ID;
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
     * @return Event The current object (for fluent API support)
     */
    public function setDisplayName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->display_name !== $v) {
            $this->display_name = $v;
            $this->modifiedColumns[] = EventPeer::DISPLAY_NAME;
        }


        return $this;
    } // setDisplayName()

    /**
     * Set the value of [description] column.
     *
     * @param string $v new value
     * @return Event The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[] = EventPeer::DESCRIPTION;
        }


        return $this;
    } // setDescription()

    /**
     * Set the value of [from_week] column.
     *
     * @param int $v new value
     * @return Event The current object (for fluent API support)
     */
    public function setFromWeek($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->from_week !== $v) {
            $this->from_week = $v;
            $this->modifiedColumns[] = EventPeer::FROM_WEEK;
        }


        return $this;
    } // setFromWeek()

    /**
     * Set the value of [duration] column.
     *
     * @param int $v new value
     * @return Event The current object (for fluent API support)
     */
    public function setDuration($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->duration !== $v) {
            $this->duration = $v;
            $this->modifiedColumns[] = EventPeer::DURATION;
        }


        return $this;
    } // setDuration()

    /**
     * Sets the value of the [is_automatic] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Event The current object (for fluent API support)
     */
    public function setIsAutomatic($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_automatic !== $v) {
            $this->is_automatic = $v;
            $this->modifiedColumns[] = EventPeer::IS_AUTOMATIC;
        }


        return $this;
    } // setIsAutomatic()

    /**
     * Sets the value of the [is_manual] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Event The current object (for fluent API support)
     */
    public function setIsManual($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_manual !== $v) {
            $this->is_manual = $v;
            $this->modifiedColumns[] = EventPeer::IS_MANUAL;
        }


        return $this;
    } // setIsManual()

    /**
     * Sets the value of the [is_visible] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Event The current object (for fluent API support)
     */
    public function setIsVisible($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_visible !== $v) {
            $this->is_visible = $v;
            $this->modifiedColumns[] = EventPeer::IS_VISIBLE;
        }


        return $this;
    } // setIsVisible()

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
            if ($this->is_automatic !== false) {
                return false;
            }

            if ($this->is_manual !== true) {
                return false;
            }

            if ($this->is_visible !== true) {
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
            $this->display_name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->description = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->from_week = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->duration = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->is_automatic = ($row[$startcol + 6] !== null) ? (boolean) $row[$startcol + 6] : null;
            $this->is_manual = ($row[$startcol + 7] !== null) ? (boolean) $row[$startcol + 7] : null;
            $this->is_visible = ($row[$startcol + 8] !== null) ? (boolean) $row[$startcol + 8] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 9; // 9 = EventPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Event object", $e);
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
            $con = Propel::getConnection(EventPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = EventPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aSnapshot = null;
            $this->collCompletedEvents = null;

            $this->collEventDeliveries = null;

            $this->collEventFolders = null;

            $this->collActivityEvents = null;

            $this->collEventProfileGroups = null;

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
            $con = Propel::getConnection(EventPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = EventQuery::create()
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
            $con = Propel::getConnection(EventPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                EventPeer::addInstanceToPool($this);
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

            if ($this->completedEventsScheduledForDeletion !== null) {
                if (!$this->completedEventsScheduledForDeletion->isEmpty()) {
                    CompletedEventQuery::create()
                        ->filterByPrimaryKeys($this->completedEventsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->completedEventsScheduledForDeletion = null;
                }
            }

            if ($this->collCompletedEvents !== null) {
                foreach ($this->collCompletedEvents as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->eventDeliveriesScheduledForDeletion !== null) {
                if (!$this->eventDeliveriesScheduledForDeletion->isEmpty()) {
                    EventDeliveryQuery::create()
                        ->filterByPrimaryKeys($this->eventDeliveriesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->eventDeliveriesScheduledForDeletion = null;
                }
            }

            if ($this->collEventDeliveries !== null) {
                foreach ($this->collEventDeliveries as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->eventFoldersScheduledForDeletion !== null) {
                if (!$this->eventFoldersScheduledForDeletion->isEmpty()) {
                    EventFolderQuery::create()
                        ->filterByPrimaryKeys($this->eventFoldersScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->eventFoldersScheduledForDeletion = null;
                }
            }

            if ($this->collEventFolders !== null) {
                foreach ($this->collEventFolders as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
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

        $this->modifiedColumns[] = EventPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . EventPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(EventPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`ID`';
        }
        if ($this->isColumnModified(EventPeer::SNAPSHOT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`SNAPSHOT_ID`';
        }
        if ($this->isColumnModified(EventPeer::DISPLAY_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`DISPLAY_NAME`';
        }
        if ($this->isColumnModified(EventPeer::DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`DESCRIPTION`';
        }
        if ($this->isColumnModified(EventPeer::FROM_WEEK)) {
            $modifiedColumns[':p' . $index++]  = '`FROM_WEEK`';
        }
        if ($this->isColumnModified(EventPeer::DURATION)) {
            $modifiedColumns[':p' . $index++]  = '`DURATION`';
        }
        if ($this->isColumnModified(EventPeer::IS_AUTOMATIC)) {
            $modifiedColumns[':p' . $index++]  = '`IS_AUTOMATIC`';
        }
        if ($this->isColumnModified(EventPeer::IS_MANUAL)) {
            $modifiedColumns[':p' . $index++]  = '`IS_MANUAL`';
        }
        if ($this->isColumnModified(EventPeer::IS_VISIBLE)) {
            $modifiedColumns[':p' . $index++]  = '`IS_VISIBLE`';
        }

        $sql = sprintf(
            'INSERT INTO `event` (%s) VALUES (%s)',
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
                    case '`FROM_WEEK`':
                        $stmt->bindValue($identifier, $this->from_week, PDO::PARAM_INT);
                        break;
                    case '`DURATION`':
                        $stmt->bindValue($identifier, $this->duration, PDO::PARAM_INT);
                        break;
                    case '`IS_AUTOMATIC`':
                        $stmt->bindValue($identifier, (int) $this->is_automatic, PDO::PARAM_INT);
                        break;
                    case '`IS_MANUAL`':
                        $stmt->bindValue($identifier, (int) $this->is_manual, PDO::PARAM_INT);
                        break;
                    case '`IS_VISIBLE`':
                        $stmt->bindValue($identifier, (int) $this->is_visible, PDO::PARAM_INT);
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


            if (($retval = EventPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collCompletedEvents !== null) {
                    foreach ($this->collCompletedEvents as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collEventDeliveries !== null) {
                    foreach ($this->collEventDeliveries as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collEventFolders !== null) {
                    foreach ($this->collEventFolders as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collActivityEvents !== null) {
                    foreach ($this->collActivityEvents as $referrerFK) {
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
        $pos = EventPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
            case 4:
                return $this->getFromWeek();
                break;
            case 5:
                return $this->getDuration();
                break;
            case 6:
                return $this->getIsAutomatic();
                break;
            case 7:
                return $this->getIsManual();
                break;
            case 8:
                return $this->getIsVisible();
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
        if (isset($alreadyDumpedObjects['Event'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Event'][$this->getPrimaryKey()] = true;
        $keys = EventPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getSnapshotId(),
            $keys[2] => $this->getDisplayName(),
            $keys[3] => $this->getDescription(),
            $keys[4] => $this->getFromWeek(),
            $keys[5] => $this->getDuration(),
            $keys[6] => $this->getIsAutomatic(),
            $keys[7] => $this->getIsManual(),
            $keys[8] => $this->getIsVisible(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aSnapshot) {
                $result['Snapshot'] = $this->aSnapshot->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collCompletedEvents) {
                $result['CompletedEvents'] = $this->collCompletedEvents->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEventDeliveries) {
                $result['EventDeliveries'] = $this->collEventDeliveries->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEventFolders) {
                $result['EventFolders'] = $this->collEventFolders->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collActivityEvents) {
                $result['ActivityEvents'] = $this->collActivityEvents->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEventProfileGroups) {
                $result['EventProfileGroups'] = $this->collEventProfileGroups->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = EventPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
            case 4:
                $this->setFromWeek($value);
                break;
            case 5:
                $this->setDuration($value);
                break;
            case 6:
                $this->setIsAutomatic($value);
                break;
            case 7:
                $this->setIsManual($value);
                break;
            case 8:
                $this->setIsVisible($value);
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
        $keys = EventPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setSnapshotId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setDisplayName($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setDescription($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setFromWeek($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setDuration($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setIsAutomatic($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setIsManual($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setIsVisible($arr[$keys[8]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(EventPeer::DATABASE_NAME);

        if ($this->isColumnModified(EventPeer::ID)) $criteria->add(EventPeer::ID, $this->id);
        if ($this->isColumnModified(EventPeer::SNAPSHOT_ID)) $criteria->add(EventPeer::SNAPSHOT_ID, $this->snapshot_id);
        if ($this->isColumnModified(EventPeer::DISPLAY_NAME)) $criteria->add(EventPeer::DISPLAY_NAME, $this->display_name);
        if ($this->isColumnModified(EventPeer::DESCRIPTION)) $criteria->add(EventPeer::DESCRIPTION, $this->description);
        if ($this->isColumnModified(EventPeer::FROM_WEEK)) $criteria->add(EventPeer::FROM_WEEK, $this->from_week);
        if ($this->isColumnModified(EventPeer::DURATION)) $criteria->add(EventPeer::DURATION, $this->duration);
        if ($this->isColumnModified(EventPeer::IS_AUTOMATIC)) $criteria->add(EventPeer::IS_AUTOMATIC, $this->is_automatic);
        if ($this->isColumnModified(EventPeer::IS_MANUAL)) $criteria->add(EventPeer::IS_MANUAL, $this->is_manual);
        if ($this->isColumnModified(EventPeer::IS_VISIBLE)) $criteria->add(EventPeer::IS_VISIBLE, $this->is_visible);

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
        $criteria = new Criteria(EventPeer::DATABASE_NAME);
        $criteria->add(EventPeer::ID, $this->id);

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
     * @param object $copyObj An object of Event (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSnapshotId($this->getSnapshotId());
        $copyObj->setDisplayName($this->getDisplayName());
        $copyObj->setDescription($this->getDescription());
        $copyObj->setFromWeek($this->getFromWeek());
        $copyObj->setDuration($this->getDuration());
        $copyObj->setIsAutomatic($this->getIsAutomatic());
        $copyObj->setIsManual($this->getIsManual());
        $copyObj->setIsVisible($this->getIsVisible());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getCompletedEvents() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCompletedEvent($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEventDeliveries() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEventDelivery($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEventFolders() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEventFolder($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getActivityEvents() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addActivityEvent($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEventProfileGroups() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEventProfileGroup($relObj->copy($deepCopy));
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
     * @return Event Clone of current object.
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
     * @return EventPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new EventPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Snapshot object.
     *
     * @param             Snapshot $v
     * @return Event The current object (for fluent API support)
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
            $v->addEvent($this);
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
                $this->aSnapshot->addEvents($this);
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
        if ('CompletedEvent' == $relationName) {
            $this->initCompletedEvents();
        }
        if ('EventDelivery' == $relationName) {
            $this->initEventDeliveries();
        }
        if ('EventFolder' == $relationName) {
            $this->initEventFolders();
        }
        if ('ActivityEvent' == $relationName) {
            $this->initActivityEvents();
        }
        if ('EventProfileGroup' == $relationName) {
            $this->initEventProfileGroups();
        }
    }

    /**
     * Clears out the collCompletedEvents collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCompletedEvents()
     */
    public function clearCompletedEvents()
    {
        $this->collCompletedEvents = null; // important to set this to null since that means it is uninitialized
        $this->collCompletedEventsPartial = null;
    }

    /**
     * reset is the collCompletedEvents collection loaded partially
     *
     * @return void
     */
    public function resetPartialCompletedEvents($v = true)
    {
        $this->collCompletedEventsPartial = $v;
    }

    /**
     * Initializes the collCompletedEvents collection.
     *
     * By default this just sets the collCompletedEvents collection to an empty array (like clearcollCompletedEvents());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCompletedEvents($overrideExisting = true)
    {
        if (null !== $this->collCompletedEvents && !$overrideExisting) {
            return;
        }
        $this->collCompletedEvents = new PropelObjectCollection();
        $this->collCompletedEvents->setModel('CompletedEvent');
    }

    /**
     * Gets an array of CompletedEvent objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Event is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|CompletedEvent[] List of CompletedEvent objects
     * @throws PropelException
     */
    public function getCompletedEvents($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collCompletedEventsPartial && !$this->isNew();
        if (null === $this->collCompletedEvents || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCompletedEvents) {
                // return empty collection
                $this->initCompletedEvents();
            } else {
                $collCompletedEvents = CompletedEventQuery::create(null, $criteria)
                    ->filterByEvent($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collCompletedEventsPartial && count($collCompletedEvents)) {
                      $this->initCompletedEvents(false);

                      foreach($collCompletedEvents as $obj) {
                        if (false == $this->collCompletedEvents->contains($obj)) {
                          $this->collCompletedEvents->append($obj);
                        }
                      }

                      $this->collCompletedEventsPartial = true;
                    }

                    return $collCompletedEvents;
                }

                if($partial && $this->collCompletedEvents) {
                    foreach($this->collCompletedEvents as $obj) {
                        if($obj->isNew()) {
                            $collCompletedEvents[] = $obj;
                        }
                    }
                }

                $this->collCompletedEvents = $collCompletedEvents;
                $this->collCompletedEventsPartial = false;
            }
        }

        return $this->collCompletedEvents;
    }

    /**
     * Sets a collection of CompletedEvent objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $completedEvents A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setCompletedEvents(PropelCollection $completedEvents, PropelPDO $con = null)
    {
        $this->completedEventsScheduledForDeletion = $this->getCompletedEvents(new Criteria(), $con)->diff($completedEvents);

        foreach ($this->completedEventsScheduledForDeletion as $completedEventRemoved) {
            $completedEventRemoved->setEvent(null);
        }

        $this->collCompletedEvents = null;
        foreach ($completedEvents as $completedEvent) {
            $this->addCompletedEvent($completedEvent);
        }

        $this->collCompletedEvents = $completedEvents;
        $this->collCompletedEventsPartial = false;
    }

    /**
     * Returns the number of related CompletedEvent objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related CompletedEvent objects.
     * @throws PropelException
     */
    public function countCompletedEvents(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collCompletedEventsPartial && !$this->isNew();
        if (null === $this->collCompletedEvents || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCompletedEvents) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getCompletedEvents());
                }
                $query = CompletedEventQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByEvent($this)
                    ->count($con);
            }
        } else {
            return count($this->collCompletedEvents);
        }
    }

    /**
     * Method called to associate a CompletedEvent object to this object
     * through the CompletedEvent foreign key attribute.
     *
     * @param    CompletedEvent $l CompletedEvent
     * @return Event The current object (for fluent API support)
     */
    public function addCompletedEvent(CompletedEvent $l)
    {
        if ($this->collCompletedEvents === null) {
            $this->initCompletedEvents();
            $this->collCompletedEventsPartial = true;
        }
        if (!in_array($l, $this->collCompletedEvents->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddCompletedEvent($l);
        }

        return $this;
    }

    /**
     * @param	CompletedEvent $completedEvent The completedEvent object to add.
     */
    protected function doAddCompletedEvent($completedEvent)
    {
        $this->collCompletedEvents[]= $completedEvent;
        $completedEvent->setEvent($this);
    }

    /**
     * @param	CompletedEvent $completedEvent The completedEvent object to remove.
     */
    public function removeCompletedEvent($completedEvent)
    {
        if ($this->getCompletedEvents()->contains($completedEvent)) {
            $this->collCompletedEvents->remove($this->collCompletedEvents->search($completedEvent));
            if (null === $this->completedEventsScheduledForDeletion) {
                $this->completedEventsScheduledForDeletion = clone $this->collCompletedEvents;
                $this->completedEventsScheduledForDeletion->clear();
            }
            $this->completedEventsScheduledForDeletion[]= $completedEvent;
            $completedEvent->setEvent(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Event is new, it will return
     * an empty collection; or if this Event has previously
     * been saved, it will retrieve related CompletedEvents from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Event.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|CompletedEvent[] List of CompletedEvent objects
     */
    public function getCompletedEventsJoinPerson($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = CompletedEventQuery::create(null, $criteria);
        $query->joinWith('Person', $join_behavior);

        return $this->getCompletedEvents($query, $con);
    }

    /**
     * Clears out the collEventDeliveries collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEventDeliveries()
     */
    public function clearEventDeliveries()
    {
        $this->collEventDeliveries = null; // important to set this to null since that means it is uninitialized
        $this->collEventDeliveriesPartial = null;
    }

    /**
     * reset is the collEventDeliveries collection loaded partially
     *
     * @return void
     */
    public function resetPartialEventDeliveries($v = true)
    {
        $this->collEventDeliveriesPartial = $v;
    }

    /**
     * Initializes the collEventDeliveries collection.
     *
     * By default this just sets the collEventDeliveries collection to an empty array (like clearcollEventDeliveries());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEventDeliveries($overrideExisting = true)
    {
        if (null !== $this->collEventDeliveries && !$overrideExisting) {
            return;
        }
        $this->collEventDeliveries = new PropelObjectCollection();
        $this->collEventDeliveries->setModel('EventDelivery');
    }

    /**
     * Gets an array of EventDelivery objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Event is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|EventDelivery[] List of EventDelivery objects
     * @throws PropelException
     */
    public function getEventDeliveries($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collEventDeliveriesPartial && !$this->isNew();
        if (null === $this->collEventDeliveries || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEventDeliveries) {
                // return empty collection
                $this->initEventDeliveries();
            } else {
                $collEventDeliveries = EventDeliveryQuery::create(null, $criteria)
                    ->filterByEvent($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collEventDeliveriesPartial && count($collEventDeliveries)) {
                      $this->initEventDeliveries(false);

                      foreach($collEventDeliveries as $obj) {
                        if (false == $this->collEventDeliveries->contains($obj)) {
                          $this->collEventDeliveries->append($obj);
                        }
                      }

                      $this->collEventDeliveriesPartial = true;
                    }

                    return $collEventDeliveries;
                }

                if($partial && $this->collEventDeliveries) {
                    foreach($this->collEventDeliveries as $obj) {
                        if($obj->isNew()) {
                            $collEventDeliveries[] = $obj;
                        }
                    }
                }

                $this->collEventDeliveries = $collEventDeliveries;
                $this->collEventDeliveriesPartial = false;
            }
        }

        return $this->collEventDeliveries;
    }

    /**
     * Sets a collection of EventDelivery objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $eventDeliveries A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setEventDeliveries(PropelCollection $eventDeliveries, PropelPDO $con = null)
    {
        $this->eventDeliveriesScheduledForDeletion = $this->getEventDeliveries(new Criteria(), $con)->diff($eventDeliveries);

        foreach ($this->eventDeliveriesScheduledForDeletion as $eventDeliveryRemoved) {
            $eventDeliveryRemoved->setEvent(null);
        }

        $this->collEventDeliveries = null;
        foreach ($eventDeliveries as $eventDelivery) {
            $this->addEventDelivery($eventDelivery);
        }

        $this->collEventDeliveries = $eventDeliveries;
        $this->collEventDeliveriesPartial = false;
    }

    /**
     * Returns the number of related EventDelivery objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related EventDelivery objects.
     * @throws PropelException
     */
    public function countEventDeliveries(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collEventDeliveriesPartial && !$this->isNew();
        if (null === $this->collEventDeliveries || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEventDeliveries) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getEventDeliveries());
                }
                $query = EventDeliveryQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByEvent($this)
                    ->count($con);
            }
        } else {
            return count($this->collEventDeliveries);
        }
    }

    /**
     * Method called to associate a EventDelivery object to this object
     * through the EventDelivery foreign key attribute.
     *
     * @param    EventDelivery $l EventDelivery
     * @return Event The current object (for fluent API support)
     */
    public function addEventDelivery(EventDelivery $l)
    {
        if ($this->collEventDeliveries === null) {
            $this->initEventDeliveries();
            $this->collEventDeliveriesPartial = true;
        }
        if (!in_array($l, $this->collEventDeliveries->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddEventDelivery($l);
        }

        return $this;
    }

    /**
     * @param	EventDelivery $eventDelivery The eventDelivery object to add.
     */
    protected function doAddEventDelivery($eventDelivery)
    {
        $this->collEventDeliveries[]= $eventDelivery;
        $eventDelivery->setEvent($this);
    }

    /**
     * @param	EventDelivery $eventDelivery The eventDelivery object to remove.
     */
    public function removeEventDelivery($eventDelivery)
    {
        if ($this->getEventDeliveries()->contains($eventDelivery)) {
            $this->collEventDeliveries->remove($this->collEventDeliveries->search($eventDelivery));
            if (null === $this->eventDeliveriesScheduledForDeletion) {
                $this->eventDeliveriesScheduledForDeletion = clone $this->collEventDeliveries;
                $this->eventDeliveriesScheduledForDeletion->clear();
            }
            $this->eventDeliveriesScheduledForDeletion[]= $eventDelivery;
            $eventDelivery->setEvent(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Event is new, it will return
     * an empty collection; or if this Event has previously
     * been saved, it will retrieve related EventDeliveries from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Event.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|EventDelivery[] List of EventDelivery objects
     */
    public function getEventDeliveriesJoinDelivery($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = EventDeliveryQuery::create(null, $criteria);
        $query->joinWith('Delivery', $join_behavior);

        return $this->getEventDeliveries($query, $con);
    }

    /**
     * Clears out the collEventFolders collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEventFolders()
     */
    public function clearEventFolders()
    {
        $this->collEventFolders = null; // important to set this to null since that means it is uninitialized
        $this->collEventFoldersPartial = null;
    }

    /**
     * reset is the collEventFolders collection loaded partially
     *
     * @return void
     */
    public function resetPartialEventFolders($v = true)
    {
        $this->collEventFoldersPartial = $v;
    }

    /**
     * Initializes the collEventFolders collection.
     *
     * By default this just sets the collEventFolders collection to an empty array (like clearcollEventFolders());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEventFolders($overrideExisting = true)
    {
        if (null !== $this->collEventFolders && !$overrideExisting) {
            return;
        }
        $this->collEventFolders = new PropelObjectCollection();
        $this->collEventFolders->setModel('EventFolder');
    }

    /**
     * Gets an array of EventFolder objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Event is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|EventFolder[] List of EventFolder objects
     * @throws PropelException
     */
    public function getEventFolders($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collEventFoldersPartial && !$this->isNew();
        if (null === $this->collEventFolders || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEventFolders) {
                // return empty collection
                $this->initEventFolders();
            } else {
                $collEventFolders = EventFolderQuery::create(null, $criteria)
                    ->filterByEvent($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collEventFoldersPartial && count($collEventFolders)) {
                      $this->initEventFolders(false);

                      foreach($collEventFolders as $obj) {
                        if (false == $this->collEventFolders->contains($obj)) {
                          $this->collEventFolders->append($obj);
                        }
                      }

                      $this->collEventFoldersPartial = true;
                    }

                    return $collEventFolders;
                }

                if($partial && $this->collEventFolders) {
                    foreach($this->collEventFolders as $obj) {
                        if($obj->isNew()) {
                            $collEventFolders[] = $obj;
                        }
                    }
                }

                $this->collEventFolders = $collEventFolders;
                $this->collEventFoldersPartial = false;
            }
        }

        return $this->collEventFolders;
    }

    /**
     * Sets a collection of EventFolder objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $eventFolders A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setEventFolders(PropelCollection $eventFolders, PropelPDO $con = null)
    {
        $this->eventFoldersScheduledForDeletion = $this->getEventFolders(new Criteria(), $con)->diff($eventFolders);

        foreach ($this->eventFoldersScheduledForDeletion as $eventFolderRemoved) {
            $eventFolderRemoved->setEvent(null);
        }

        $this->collEventFolders = null;
        foreach ($eventFolders as $eventFolder) {
            $this->addEventFolder($eventFolder);
        }

        $this->collEventFolders = $eventFolders;
        $this->collEventFoldersPartial = false;
    }

    /**
     * Returns the number of related EventFolder objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related EventFolder objects.
     * @throws PropelException
     */
    public function countEventFolders(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collEventFoldersPartial && !$this->isNew();
        if (null === $this->collEventFolders || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEventFolders) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getEventFolders());
                }
                $query = EventFolderQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByEvent($this)
                    ->count($con);
            }
        } else {
            return count($this->collEventFolders);
        }
    }

    /**
     * Method called to associate a EventFolder object to this object
     * through the EventFolder foreign key attribute.
     *
     * @param    EventFolder $l EventFolder
     * @return Event The current object (for fluent API support)
     */
    public function addEventFolder(EventFolder $l)
    {
        if ($this->collEventFolders === null) {
            $this->initEventFolders();
            $this->collEventFoldersPartial = true;
        }
        if (!in_array($l, $this->collEventFolders->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddEventFolder($l);
        }

        return $this;
    }

    /**
     * @param	EventFolder $eventFolder The eventFolder object to add.
     */
    protected function doAddEventFolder($eventFolder)
    {
        $this->collEventFolders[]= $eventFolder;
        $eventFolder->setEvent($this);
    }

    /**
     * @param	EventFolder $eventFolder The eventFolder object to remove.
     */
    public function removeEventFolder($eventFolder)
    {
        if ($this->getEventFolders()->contains($eventFolder)) {
            $this->collEventFolders->remove($this->collEventFolders->search($eventFolder));
            if (null === $this->eventFoldersScheduledForDeletion) {
                $this->eventFoldersScheduledForDeletion = clone $this->collEventFolders;
                $this->eventFoldersScheduledForDeletion->clear();
            }
            $this->eventFoldersScheduledForDeletion[]= $eventFolder;
            $eventFolder->setEvent(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Event is new, it will return
     * an empty collection; or if this Event has previously
     * been saved, it will retrieve related EventFolders from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Event.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|EventFolder[] List of EventFolder objects
     */
    public function getEventFoldersJoinFolder($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = EventFolderQuery::create(null, $criteria);
        $query->joinWith('Folder', $join_behavior);

        return $this->getEventFolders($query, $con);
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
     * If this Event is new, it will return
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
                    ->filterByEvent($this)
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
            $activityEventRemoved->setEvent(null);
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
                    ->filterByEvent($this)
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
     * @return Event The current object (for fluent API support)
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
        $activityEvent->setEvent($this);
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
            $activityEvent->setEvent(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Event is new, it will return
     * an empty collection; or if this Event has previously
     * been saved, it will retrieve related ActivityEvents from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Event.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ActivityEvent[] List of ActivityEvent objects
     */
    public function getActivityEventsJoinActivity($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ActivityEventQuery::create(null, $criteria);
        $query->joinWith('Activity', $join_behavior);

        return $this->getActivityEvents($query, $con);
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
     * If this Event is new, it will return
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
                    ->filterByEvent($this)
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
            $eventProfileGroupRemoved->setEvent(null);
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
                    ->filterByEvent($this)
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
     * @return Event The current object (for fluent API support)
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
        $eventProfileGroup->setEvent($this);
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
            $eventProfileGroup->setEvent(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Event is new, it will return
     * an empty collection; or if this Event has previously
     * been saved, it will retrieve related EventProfileGroups from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Event.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|EventProfileGroup[] List of EventProfileGroup objects
     */
    public function getEventProfileGroupsJoinProfileGroup($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = EventProfileGroupQuery::create(null, $criteria);
        $query->joinWith('ProfileGroup', $join_behavior);

        return $this->getEventProfileGroups($query, $con);
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
        $this->from_week = null;
        $this->duration = null;
        $this->is_automatic = null;
        $this->is_manual = null;
        $this->is_visible = null;
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
            if ($this->collCompletedEvents) {
                foreach ($this->collCompletedEvents as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEventDeliveries) {
                foreach ($this->collEventDeliveries as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEventFolders) {
                foreach ($this->collEventFolders as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collActivityEvents) {
                foreach ($this->collActivityEvents as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEventProfileGroups) {
                foreach ($this->collEventProfileGroups as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        if ($this->collCompletedEvents instanceof PropelCollection) {
            $this->collCompletedEvents->clearIterator();
        }
        $this->collCompletedEvents = null;
        if ($this->collEventDeliveries instanceof PropelCollection) {
            $this->collEventDeliveries->clearIterator();
        }
        $this->collEventDeliveries = null;
        if ($this->collEventFolders instanceof PropelCollection) {
            $this->collEventFolders->clearIterator();
        }
        $this->collEventFolders = null;
        if ($this->collActivityEvents instanceof PropelCollection) {
            $this->collActivityEvents->clearIterator();
        }
        $this->collActivityEvents = null;
        if ($this->collEventProfileGroups instanceof PropelCollection) {
            $this->collEventProfileGroups->clearIterator();
        }
        $this->collEventProfileGroups = null;
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
