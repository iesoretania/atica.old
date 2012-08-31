<?php


/**
 * Base class that represents a row from the 'snapshot' table.
 *
 *
 *
 * @package    propel.generator.atica.om
 */
abstract class BaseSnapshot extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'SnapshotPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        SnapshotPeer
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
     * The value for the visible field.
     * Note: this column has a database default value of: true
     * @var        boolean
     */
    protected $visible;

    /**
     * The value for the restricted field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $restricted;

    /**
     * The value for the organization_id field.
     * @var        int
     */
    protected $organization_id;

    /**
     * @var        Organization
     */
    protected $aOrganization;

    /**
     * @var        PropelObjectCollection|Action[] Collection to store aggregation of Action objects.
     */
    protected $collActions;
    protected $collActionsPartial;

    /**
     * @var        PropelObjectCollection|Category[] Collection to store aggregation of Category objects.
     */
    protected $collCategories;
    protected $collCategoriesPartial;

    /**
     * @var        PropelObjectCollection|Configuration[] Collection to store aggregation of Configuration objects.
     */
    protected $collConfigurations;
    protected $collConfigurationsPartial;

    /**
     * @var        PropelObjectCollection|Delivery[] Collection to store aggregation of Delivery objects.
     */
    protected $collDeliveries;
    protected $collDeliveriesPartial;

    /**
     * @var        PropelObjectCollection|Event[] Collection to store aggregation of Event objects.
     */
    protected $collEvents;
    protected $collEventsPartial;

    /**
     * @var        PropelObjectCollection|Activity[] Collection to store aggregation of Activity objects.
     */
    protected $collActivities;
    protected $collActivitiesPartial;

    /**
     * @var        PropelObjectCollection|Folder[] Collection to store aggregation of Folder objects.
     */
    protected $collFolders;
    protected $collFoldersPartial;

    /**
     * @var        PropelObjectCollection|NonConformance[] Collection to store aggregation of NonConformance objects.
     */
    protected $collNonConformances;
    protected $collNonConformancesPartial;

    /**
     * @var        PropelObjectCollection|ProfileGroup[] Collection to store aggregation of ProfileGroup objects.
     */
    protected $collProfileGroups;
    protected $collProfileGroupsPartial;

    /**
     * @var        PropelObjectCollection|Grouping[] Collection to store aggregation of Grouping objects.
     */
    protected $collGroupings;
    protected $collGroupingsPartial;

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
    protected $actionsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $categoriesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $configurationsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $deliveriesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $eventsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $activitiesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $foldersScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $nonConformancesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $profileGroupsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $groupingsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->visible = true;
        $this->restricted = false;
    }

    /**
     * Initializes internal state of BaseSnapshot object.
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
     * Get the [visible] column value.
     *
     * @return boolean
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * Get the [restricted] column value.
     *
     * @return boolean
     */
    public function getRestricted()
    {
        return $this->restricted;
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
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Snapshot The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = SnapshotPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [order_nr] column.
     *
     * @param int $v new value
     * @return Snapshot The current object (for fluent API support)
     */
    public function setOrderNr($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->order_nr !== $v) {
            $this->order_nr = $v;
            $this->modifiedColumns[] = SnapshotPeer::ORDER_NR;
        }


        return $this;
    } // setOrderNr()

    /**
     * Set the value of [display_name] column.
     *
     * @param string $v new value
     * @return Snapshot The current object (for fluent API support)
     */
    public function setDisplayName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->display_name !== $v) {
            $this->display_name = $v;
            $this->modifiedColumns[] = SnapshotPeer::DISPLAY_NAME;
        }


        return $this;
    } // setDisplayName()

    /**
     * Sets the value of the [visible] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Snapshot The current object (for fluent API support)
     */
    public function setVisible($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->visible !== $v) {
            $this->visible = $v;
            $this->modifiedColumns[] = SnapshotPeer::VISIBLE;
        }


        return $this;
    } // setVisible()

    /**
     * Sets the value of the [restricted] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Snapshot The current object (for fluent API support)
     */
    public function setRestricted($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->restricted !== $v) {
            $this->restricted = $v;
            $this->modifiedColumns[] = SnapshotPeer::RESTRICTED;
        }


        return $this;
    } // setRestricted()

    /**
     * Set the value of [organization_id] column.
     *
     * @param int $v new value
     * @return Snapshot The current object (for fluent API support)
     */
    public function setOrganizationId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->organization_id !== $v) {
            // sortable behavior
            $this->oldScope = $this->getOrganizationId();

            $this->organization_id = $v;
            $this->modifiedColumns[] = SnapshotPeer::ORGANIZATION_ID;
        }

        if ($this->aOrganization !== null && $this->aOrganization->getId() !== $v) {
            $this->aOrganization = null;
        }


        return $this;
    } // setOrganizationId()

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
            if ($this->visible !== true) {
                return false;
            }

            if ($this->restricted !== false) {
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
            $this->order_nr = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->display_name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->visible = ($row[$startcol + 3] !== null) ? (boolean) $row[$startcol + 3] : null;
            $this->restricted = ($row[$startcol + 4] !== null) ? (boolean) $row[$startcol + 4] : null;
            $this->organization_id = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 6; // 6 = SnapshotPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Snapshot object", $e);
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
            $con = Propel::getConnection(SnapshotPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = SnapshotPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aOrganization = null;
            $this->collActions = null;

            $this->collCategories = null;

            $this->collConfigurations = null;

            $this->collDeliveries = null;

            $this->collEvents = null;

            $this->collActivities = null;

            $this->collFolders = null;

            $this->collNonConformances = null;

            $this->collProfileGroups = null;

            $this->collGroupings = null;

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
            $con = Propel::getConnection(SnapshotPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = SnapshotQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            // sortable behavior

            SnapshotPeer::shiftRank(-1, $this->getOrderNr() + 1, null, $this->getOrganizationId(), $con);
            SnapshotPeer::clearInstancePool();

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
            $con = Propel::getConnection(SnapshotPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                if (!$this->isColumnModified(SnapshotPeer::RANK_COL)) {
                    $this->setOrderNr(SnapshotQuery::create()->getMaxRank($this->getOrganizationId(), $con) + 1);
                }

            } else {
                $ret = $ret && $this->preUpdate($con);
                // sortable behavior
                // if scope has changed and rank was not modified (if yes, assuming superior action)
                // insert object to the end of new scope and cleanup old one
                if ($this->isColumnModified(SnapshotPeer::SCOPE_COL) && !$this->isColumnModified(SnapshotPeer::RANK_COL)) {
                    SnapshotPeer::shiftRank(-1, $this->getOrderNr() + 1, null, $this->oldScope, $con);
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
                SnapshotPeer::addInstanceToPool($this);
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

            if ($this->actionsScheduledForDeletion !== null) {
                if (!$this->actionsScheduledForDeletion->isEmpty()) {
                    ActionQuery::create()
                        ->filterByPrimaryKeys($this->actionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->actionsScheduledForDeletion = null;
                }
            }

            if ($this->collActions !== null) {
                foreach ($this->collActions as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->categoriesScheduledForDeletion !== null) {
                if (!$this->categoriesScheduledForDeletion->isEmpty()) {
                    CategoryQuery::create()
                        ->filterByPrimaryKeys($this->categoriesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->categoriesScheduledForDeletion = null;
                }
            }

            if ($this->collCategories !== null) {
                foreach ($this->collCategories as $referrerFK) {
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

            if ($this->deliveriesScheduledForDeletion !== null) {
                if (!$this->deliveriesScheduledForDeletion->isEmpty()) {
                    DeliveryQuery::create()
                        ->filterByPrimaryKeys($this->deliveriesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
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

            if ($this->eventsScheduledForDeletion !== null) {
                if (!$this->eventsScheduledForDeletion->isEmpty()) {
                    EventQuery::create()
                        ->filterByPrimaryKeys($this->eventsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->eventsScheduledForDeletion = null;
                }
            }

            if ($this->collEvents !== null) {
                foreach ($this->collEvents as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->activitiesScheduledForDeletion !== null) {
                if (!$this->activitiesScheduledForDeletion->isEmpty()) {
                    ActivityQuery::create()
                        ->filterByPrimaryKeys($this->activitiesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->activitiesScheduledForDeletion = null;
                }
            }

            if ($this->collActivities !== null) {
                foreach ($this->collActivities as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->foldersScheduledForDeletion !== null) {
                if (!$this->foldersScheduledForDeletion->isEmpty()) {
                    FolderQuery::create()
                        ->filterByPrimaryKeys($this->foldersScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->foldersScheduledForDeletion = null;
                }
            }

            if ($this->collFolders !== null) {
                foreach ($this->collFolders as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->nonConformancesScheduledForDeletion !== null) {
                if (!$this->nonConformancesScheduledForDeletion->isEmpty()) {
                    NonConformanceQuery::create()
                        ->filterByPrimaryKeys($this->nonConformancesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->nonConformancesScheduledForDeletion = null;
                }
            }

            if ($this->collNonConformances !== null) {
                foreach ($this->collNonConformances as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->profileGroupsScheduledForDeletion !== null) {
                if (!$this->profileGroupsScheduledForDeletion->isEmpty()) {
                    ProfileGroupQuery::create()
                        ->filterByPrimaryKeys($this->profileGroupsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->profileGroupsScheduledForDeletion = null;
                }
            }

            if ($this->collProfileGroups !== null) {
                foreach ($this->collProfileGroups as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->groupingsScheduledForDeletion !== null) {
                if (!$this->groupingsScheduledForDeletion->isEmpty()) {
                    GroupingQuery::create()
                        ->filterByPrimaryKeys($this->groupingsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->groupingsScheduledForDeletion = null;
                }
            }

            if ($this->collGroupings !== null) {
                foreach ($this->collGroupings as $referrerFK) {
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

        $this->modifiedColumns[] = SnapshotPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SnapshotPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SnapshotPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`ID`';
        }
        if ($this->isColumnModified(SnapshotPeer::ORDER_NR)) {
            $modifiedColumns[':p' . $index++]  = '`ORDER_NR`';
        }
        if ($this->isColumnModified(SnapshotPeer::DISPLAY_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`DISPLAY_NAME`';
        }
        if ($this->isColumnModified(SnapshotPeer::VISIBLE)) {
            $modifiedColumns[':p' . $index++]  = '`VISIBLE`';
        }
        if ($this->isColumnModified(SnapshotPeer::RESTRICTED)) {
            $modifiedColumns[':p' . $index++]  = '`RESTRICTED`';
        }
        if ($this->isColumnModified(SnapshotPeer::ORGANIZATION_ID)) {
            $modifiedColumns[':p' . $index++]  = '`ORGANIZATION_ID`';
        }

        $sql = sprintf(
            'INSERT INTO `snapshot` (%s) VALUES (%s)',
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
                    case '`ORDER_NR`':
                        $stmt->bindValue($identifier, $this->order_nr, PDO::PARAM_INT);
                        break;
                    case '`DISPLAY_NAME`':
                        $stmt->bindValue($identifier, $this->display_name, PDO::PARAM_STR);
                        break;
                    case '`VISIBLE`':
                        $stmt->bindValue($identifier, (int) $this->visible, PDO::PARAM_INT);
                        break;
                    case '`RESTRICTED`':
                        $stmt->bindValue($identifier, (int) $this->restricted, PDO::PARAM_INT);
                        break;
                    case '`ORGANIZATION_ID`':
                        $stmt->bindValue($identifier, $this->organization_id, PDO::PARAM_INT);
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

            if ($this->aOrganization !== null) {
                if (!$this->aOrganization->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aOrganization->getValidationFailures());
                }
            }


            if (($retval = SnapshotPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collActions !== null) {
                    foreach ($this->collActions as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collCategories !== null) {
                    foreach ($this->collCategories as $referrerFK) {
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

                if ($this->collDeliveries !== null) {
                    foreach ($this->collDeliveries as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collEvents !== null) {
                    foreach ($this->collEvents as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collActivities !== null) {
                    foreach ($this->collActivities as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collFolders !== null) {
                    foreach ($this->collFolders as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collNonConformances !== null) {
                    foreach ($this->collNonConformances as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collProfileGroups !== null) {
                    foreach ($this->collProfileGroups as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collGroupings !== null) {
                    foreach ($this->collGroupings as $referrerFK) {
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
        $pos = SnapshotPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getOrderNr();
                break;
            case 2:
                return $this->getDisplayName();
                break;
            case 3:
                return $this->getVisible();
                break;
            case 4:
                return $this->getRestricted();
                break;
            case 5:
                return $this->getOrganizationId();
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
        if (isset($alreadyDumpedObjects['Snapshot'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Snapshot'][$this->getPrimaryKey()] = true;
        $keys = SnapshotPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getOrderNr(),
            $keys[2] => $this->getDisplayName(),
            $keys[3] => $this->getVisible(),
            $keys[4] => $this->getRestricted(),
            $keys[5] => $this->getOrganizationId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aOrganization) {
                $result['Organization'] = $this->aOrganization->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collActions) {
                $result['Actions'] = $this->collActions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collCategories) {
                $result['Categories'] = $this->collCategories->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collConfigurations) {
                $result['Configurations'] = $this->collConfigurations->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collDeliveries) {
                $result['Deliveries'] = $this->collDeliveries->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEvents) {
                $result['Events'] = $this->collEvents->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collActivities) {
                $result['Activities'] = $this->collActivities->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collFolders) {
                $result['Folders'] = $this->collFolders->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collNonConformances) {
                $result['NonConformances'] = $this->collNonConformances->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collProfileGroups) {
                $result['ProfileGroups'] = $this->collProfileGroups->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collGroupings) {
                $result['Groupings'] = $this->collGroupings->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = SnapshotPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setOrderNr($value);
                break;
            case 2:
                $this->setDisplayName($value);
                break;
            case 3:
                $this->setVisible($value);
                break;
            case 4:
                $this->setRestricted($value);
                break;
            case 5:
                $this->setOrganizationId($value);
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
        $keys = SnapshotPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setOrderNr($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setDisplayName($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setVisible($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setRestricted($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setOrganizationId($arr[$keys[5]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(SnapshotPeer::DATABASE_NAME);

        if ($this->isColumnModified(SnapshotPeer::ID)) $criteria->add(SnapshotPeer::ID, $this->id);
        if ($this->isColumnModified(SnapshotPeer::ORDER_NR)) $criteria->add(SnapshotPeer::ORDER_NR, $this->order_nr);
        if ($this->isColumnModified(SnapshotPeer::DISPLAY_NAME)) $criteria->add(SnapshotPeer::DISPLAY_NAME, $this->display_name);
        if ($this->isColumnModified(SnapshotPeer::VISIBLE)) $criteria->add(SnapshotPeer::VISIBLE, $this->visible);
        if ($this->isColumnModified(SnapshotPeer::RESTRICTED)) $criteria->add(SnapshotPeer::RESTRICTED, $this->restricted);
        if ($this->isColumnModified(SnapshotPeer::ORGANIZATION_ID)) $criteria->add(SnapshotPeer::ORGANIZATION_ID, $this->organization_id);

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
        $criteria = new Criteria(SnapshotPeer::DATABASE_NAME);
        $criteria->add(SnapshotPeer::ID, $this->id);

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
     * @param object $copyObj An object of Snapshot (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setOrderNr($this->getOrderNr());
        $copyObj->setDisplayName($this->getDisplayName());
        $copyObj->setVisible($this->getVisible());
        $copyObj->setRestricted($this->getRestricted());
        $copyObj->setOrganizationId($this->getOrganizationId());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getActions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAction($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCategories() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCategory($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getConfigurations() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addConfiguration($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getDeliveries() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDelivery($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEvents() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEvent($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getActivities() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addActivity($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getFolders() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addFolder($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getNonConformances() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addNonConformance($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getProfileGroups() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addProfileGroup($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getGroupings() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addGrouping($relObj->copy($deepCopy));
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
     * @return Snapshot Clone of current object.
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
     * @return SnapshotPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new SnapshotPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Organization object.
     *
     * @param             Organization $v
     * @return Snapshot The current object (for fluent API support)
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
            $v->addSnapshot($this);
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
                $this->aOrganization->addSnapshots($this);
             */
        }

        return $this->aOrganization;
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
        if ('Action' == $relationName) {
            $this->initActions();
        }
        if ('Category' == $relationName) {
            $this->initCategories();
        }
        if ('Configuration' == $relationName) {
            $this->initConfigurations();
        }
        if ('Delivery' == $relationName) {
            $this->initDeliveries();
        }
        if ('Event' == $relationName) {
            $this->initEvents();
        }
        if ('Activity' == $relationName) {
            $this->initActivities();
        }
        if ('Folder' == $relationName) {
            $this->initFolders();
        }
        if ('NonConformance' == $relationName) {
            $this->initNonConformances();
        }
        if ('ProfileGroup' == $relationName) {
            $this->initProfileGroups();
        }
        if ('Grouping' == $relationName) {
            $this->initGroupings();
        }
    }

    /**
     * Clears out the collActions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addActions()
     */
    public function clearActions()
    {
        $this->collActions = null; // important to set this to null since that means it is uninitialized
        $this->collActionsPartial = null;
    }

    /**
     * reset is the collActions collection loaded partially
     *
     * @return void
     */
    public function resetPartialActions($v = true)
    {
        $this->collActionsPartial = $v;
    }

    /**
     * Initializes the collActions collection.
     *
     * By default this just sets the collActions collection to an empty array (like clearcollActions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initActions($overrideExisting = true)
    {
        if (null !== $this->collActions && !$overrideExisting) {
            return;
        }
        $this->collActions = new PropelObjectCollection();
        $this->collActions->setModel('Action');
    }

    /**
     * Gets an array of Action objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Snapshot is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Action[] List of Action objects
     * @throws PropelException
     */
    public function getActions($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collActionsPartial && !$this->isNew();
        if (null === $this->collActions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collActions) {
                // return empty collection
                $this->initActions();
            } else {
                $collActions = ActionQuery::create(null, $criteria)
                    ->filterBySnapshot($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collActionsPartial && count($collActions)) {
                      $this->initActions(false);

                      foreach($collActions as $obj) {
                        if (false == $this->collActions->contains($obj)) {
                          $this->collActions->append($obj);
                        }
                      }

                      $this->collActionsPartial = true;
                    }

                    return $collActions;
                }

                if($partial && $this->collActions) {
                    foreach($this->collActions as $obj) {
                        if($obj->isNew()) {
                            $collActions[] = $obj;
                        }
                    }
                }

                $this->collActions = $collActions;
                $this->collActionsPartial = false;
            }
        }

        return $this->collActions;
    }

    /**
     * Sets a collection of Action objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $actions A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setActions(PropelCollection $actions, PropelPDO $con = null)
    {
        $this->actionsScheduledForDeletion = $this->getActions(new Criteria(), $con)->diff($actions);

        foreach ($this->actionsScheduledForDeletion as $actionRemoved) {
            $actionRemoved->setSnapshot(null);
        }

        $this->collActions = null;
        foreach ($actions as $action) {
            $this->addAction($action);
        }

        $this->collActions = $actions;
        $this->collActionsPartial = false;
    }

    /**
     * Returns the number of related Action objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Action objects.
     * @throws PropelException
     */
    public function countActions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collActionsPartial && !$this->isNew();
        if (null === $this->collActions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collActions) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getActions());
                }
                $query = ActionQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBySnapshot($this)
                    ->count($con);
            }
        } else {
            return count($this->collActions);
        }
    }

    /**
     * Method called to associate a Action object to this object
     * through the Action foreign key attribute.
     *
     * @param    Action $l Action
     * @return Snapshot The current object (for fluent API support)
     */
    public function addAction(Action $l)
    {
        if ($this->collActions === null) {
            $this->initActions();
            $this->collActionsPartial = true;
        }
        if (!in_array($l, $this->collActions->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAction($l);
        }

        return $this;
    }

    /**
     * @param	Action $action The action object to add.
     */
    protected function doAddAction($action)
    {
        $this->collActions[]= $action;
        $action->setSnapshot($this);
    }

    /**
     * @param	Action $action The action object to remove.
     */
    public function removeAction($action)
    {
        if ($this->getActions()->contains($action)) {
            $this->collActions->remove($this->collActions->search($action));
            if (null === $this->actionsScheduledForDeletion) {
                $this->actionsScheduledForDeletion = clone $this->collActions;
                $this->actionsScheduledForDeletion->clear();
            }
            $this->actionsScheduledForDeletion[]= $action;
            $action->setSnapshot(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Snapshot is new, it will return
     * an empty collection; or if this Snapshot has previously
     * been saved, it will retrieve related Actions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Snapshot.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Action[] List of Action objects
     */
    public function getActionsJoinActionType($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ActionQuery::create(null, $criteria);
        $query->joinWith('ActionType', $join_behavior);

        return $this->getActions($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Snapshot is new, it will return
     * an empty collection; or if this Snapshot has previously
     * been saved, it will retrieve related Actions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Snapshot.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Action[] List of Action objects
     */
    public function getActionsJoinNonConformance($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ActionQuery::create(null, $criteria);
        $query->joinWith('NonConformance', $join_behavior);

        return $this->getActions($query, $con);
    }

    /**
     * Clears out the collCategories collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCategories()
     */
    public function clearCategories()
    {
        $this->collCategories = null; // important to set this to null since that means it is uninitialized
        $this->collCategoriesPartial = null;
    }

    /**
     * reset is the collCategories collection loaded partially
     *
     * @return void
     */
    public function resetPartialCategories($v = true)
    {
        $this->collCategoriesPartial = $v;
    }

    /**
     * Initializes the collCategories collection.
     *
     * By default this just sets the collCategories collection to an empty array (like clearcollCategories());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCategories($overrideExisting = true)
    {
        if (null !== $this->collCategories && !$overrideExisting) {
            return;
        }
        $this->collCategories = new PropelObjectCollection();
        $this->collCategories->setModel('Category');
    }

    /**
     * Gets an array of Category objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Snapshot is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Category[] List of Category objects
     * @throws PropelException
     */
    public function getCategories($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collCategoriesPartial && !$this->isNew();
        if (null === $this->collCategories || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCategories) {
                // return empty collection
                $this->initCategories();
            } else {
                $collCategories = CategoryQuery::create(null, $criteria)
                    ->filterBySnapshot($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collCategoriesPartial && count($collCategories)) {
                      $this->initCategories(false);

                      foreach($collCategories as $obj) {
                        if (false == $this->collCategories->contains($obj)) {
                          $this->collCategories->append($obj);
                        }
                      }

                      $this->collCategoriesPartial = true;
                    }

                    return $collCategories;
                }

                if($partial && $this->collCategories) {
                    foreach($this->collCategories as $obj) {
                        if($obj->isNew()) {
                            $collCategories[] = $obj;
                        }
                    }
                }

                $this->collCategories = $collCategories;
                $this->collCategoriesPartial = false;
            }
        }

        return $this->collCategories;
    }

    /**
     * Sets a collection of Category objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $categories A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setCategories(PropelCollection $categories, PropelPDO $con = null)
    {
        $this->categoriesScheduledForDeletion = $this->getCategories(new Criteria(), $con)->diff($categories);

        foreach ($this->categoriesScheduledForDeletion as $categoryRemoved) {
            $categoryRemoved->setSnapshot(null);
        }

        $this->collCategories = null;
        foreach ($categories as $category) {
            $this->addCategory($category);
        }

        $this->collCategories = $categories;
        $this->collCategoriesPartial = false;
    }

    /**
     * Returns the number of related Category objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Category objects.
     * @throws PropelException
     */
    public function countCategories(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collCategoriesPartial && !$this->isNew();
        if (null === $this->collCategories || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCategories) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getCategories());
                }
                $query = CategoryQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBySnapshot($this)
                    ->count($con);
            }
        } else {
            return count($this->collCategories);
        }
    }

    /**
     * Method called to associate a Category object to this object
     * through the Category foreign key attribute.
     *
     * @param    Category $l Category
     * @return Snapshot The current object (for fluent API support)
     */
    public function addCategory(Category $l)
    {
        if ($this->collCategories === null) {
            $this->initCategories();
            $this->collCategoriesPartial = true;
        }
        if (!in_array($l, $this->collCategories->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddCategory($l);
        }

        return $this;
    }

    /**
     * @param	Category $category The category object to add.
     */
    protected function doAddCategory($category)
    {
        $this->collCategories[]= $category;
        $category->setSnapshot($this);
    }

    /**
     * @param	Category $category The category object to remove.
     */
    public function removeCategory($category)
    {
        if ($this->getCategories()->contains($category)) {
            $this->collCategories->remove($this->collCategories->search($category));
            if (null === $this->categoriesScheduledForDeletion) {
                $this->categoriesScheduledForDeletion = clone $this->collCategories;
                $this->categoriesScheduledForDeletion->clear();
            }
            $this->categoriesScheduledForDeletion[]= $category;
            $category->setSnapshot(null);
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
     * If this Snapshot is new, it will return
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
                    ->filterBySnapshot($this)
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
            $configurationRemoved->setSnapshot(null);
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
                    ->filterBySnapshot($this)
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
     * @return Snapshot The current object (for fluent API support)
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
        $configuration->setSnapshot($this);
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
            $configuration->setSnapshot(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Snapshot is new, it will return
     * an empty collection; or if this Snapshot has previously
     * been saved, it will retrieve related Configurations from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Snapshot.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Configuration[] List of Configuration objects
     */
    public function getConfigurationsJoinOrganization($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ConfigurationQuery::create(null, $criteria);
        $query->joinWith('Organization', $join_behavior);

        return $this->getConfigurations($query, $con);
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
     * If this Snapshot is new, it will return
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
                    ->filterBySnapshot($this)
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
            $deliveryRemoved->setSnapshot(null);
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
                    ->filterBySnapshot($this)
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
     * @return Snapshot The current object (for fluent API support)
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
        $delivery->setSnapshot($this);
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
            $delivery->setSnapshot(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Snapshot is new, it will return
     * an empty collection; or if this Snapshot has previously
     * been saved, it will retrieve related Deliveries from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Snapshot.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Delivery[] List of Delivery objects
     */
    public function getDeliveriesJoinProfile($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = DeliveryQuery::create(null, $criteria);
        $query->joinWith('Profile', $join_behavior);

        return $this->getDeliveries($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Snapshot is new, it will return
     * an empty collection; or if this Snapshot has previously
     * been saved, it will retrieve related Deliveries from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Snapshot.
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
     * Clears out the collEvents collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEvents()
     */
    public function clearEvents()
    {
        $this->collEvents = null; // important to set this to null since that means it is uninitialized
        $this->collEventsPartial = null;
    }

    /**
     * reset is the collEvents collection loaded partially
     *
     * @return void
     */
    public function resetPartialEvents($v = true)
    {
        $this->collEventsPartial = $v;
    }

    /**
     * Initializes the collEvents collection.
     *
     * By default this just sets the collEvents collection to an empty array (like clearcollEvents());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEvents($overrideExisting = true)
    {
        if (null !== $this->collEvents && !$overrideExisting) {
            return;
        }
        $this->collEvents = new PropelObjectCollection();
        $this->collEvents->setModel('Event');
    }

    /**
     * Gets an array of Event objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Snapshot is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Event[] List of Event objects
     * @throws PropelException
     */
    public function getEvents($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collEventsPartial && !$this->isNew();
        if (null === $this->collEvents || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEvents) {
                // return empty collection
                $this->initEvents();
            } else {
                $collEvents = EventQuery::create(null, $criteria)
                    ->filterBySnapshot($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collEventsPartial && count($collEvents)) {
                      $this->initEvents(false);

                      foreach($collEvents as $obj) {
                        if (false == $this->collEvents->contains($obj)) {
                          $this->collEvents->append($obj);
                        }
                      }

                      $this->collEventsPartial = true;
                    }

                    return $collEvents;
                }

                if($partial && $this->collEvents) {
                    foreach($this->collEvents as $obj) {
                        if($obj->isNew()) {
                            $collEvents[] = $obj;
                        }
                    }
                }

                $this->collEvents = $collEvents;
                $this->collEventsPartial = false;
            }
        }

        return $this->collEvents;
    }

    /**
     * Sets a collection of Event objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $events A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setEvents(PropelCollection $events, PropelPDO $con = null)
    {
        $this->eventsScheduledForDeletion = $this->getEvents(new Criteria(), $con)->diff($events);

        foreach ($this->eventsScheduledForDeletion as $eventRemoved) {
            $eventRemoved->setSnapshot(null);
        }

        $this->collEvents = null;
        foreach ($events as $event) {
            $this->addEvent($event);
        }

        $this->collEvents = $events;
        $this->collEventsPartial = false;
    }

    /**
     * Returns the number of related Event objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Event objects.
     * @throws PropelException
     */
    public function countEvents(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collEventsPartial && !$this->isNew();
        if (null === $this->collEvents || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEvents) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getEvents());
                }
                $query = EventQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBySnapshot($this)
                    ->count($con);
            }
        } else {
            return count($this->collEvents);
        }
    }

    /**
     * Method called to associate a Event object to this object
     * through the Event foreign key attribute.
     *
     * @param    Event $l Event
     * @return Snapshot The current object (for fluent API support)
     */
    public function addEvent(Event $l)
    {
        if ($this->collEvents === null) {
            $this->initEvents();
            $this->collEventsPartial = true;
        }
        if (!in_array($l, $this->collEvents->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddEvent($l);
        }

        return $this;
    }

    /**
     * @param	Event $event The event object to add.
     */
    protected function doAddEvent($event)
    {
        $this->collEvents[]= $event;
        $event->setSnapshot($this);
    }

    /**
     * @param	Event $event The event object to remove.
     */
    public function removeEvent($event)
    {
        if ($this->getEvents()->contains($event)) {
            $this->collEvents->remove($this->collEvents->search($event));
            if (null === $this->eventsScheduledForDeletion) {
                $this->eventsScheduledForDeletion = clone $this->collEvents;
                $this->eventsScheduledForDeletion->clear();
            }
            $this->eventsScheduledForDeletion[]= $event;
            $event->setSnapshot(null);
        }
    }

    /**
     * Clears out the collActivities collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addActivities()
     */
    public function clearActivities()
    {
        $this->collActivities = null; // important to set this to null since that means it is uninitialized
        $this->collActivitiesPartial = null;
    }

    /**
     * reset is the collActivities collection loaded partially
     *
     * @return void
     */
    public function resetPartialActivities($v = true)
    {
        $this->collActivitiesPartial = $v;
    }

    /**
     * Initializes the collActivities collection.
     *
     * By default this just sets the collActivities collection to an empty array (like clearcollActivities());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initActivities($overrideExisting = true)
    {
        if (null !== $this->collActivities && !$overrideExisting) {
            return;
        }
        $this->collActivities = new PropelObjectCollection();
        $this->collActivities->setModel('Activity');
    }

    /**
     * Gets an array of Activity objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Snapshot is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Activity[] List of Activity objects
     * @throws PropelException
     */
    public function getActivities($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collActivitiesPartial && !$this->isNew();
        if (null === $this->collActivities || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collActivities) {
                // return empty collection
                $this->initActivities();
            } else {
                $collActivities = ActivityQuery::create(null, $criteria)
                    ->filterBySnapshot($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collActivitiesPartial && count($collActivities)) {
                      $this->initActivities(false);

                      foreach($collActivities as $obj) {
                        if (false == $this->collActivities->contains($obj)) {
                          $this->collActivities->append($obj);
                        }
                      }

                      $this->collActivitiesPartial = true;
                    }

                    return $collActivities;
                }

                if($partial && $this->collActivities) {
                    foreach($this->collActivities as $obj) {
                        if($obj->isNew()) {
                            $collActivities[] = $obj;
                        }
                    }
                }

                $this->collActivities = $collActivities;
                $this->collActivitiesPartial = false;
            }
        }

        return $this->collActivities;
    }

    /**
     * Sets a collection of Activity objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $activities A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setActivities(PropelCollection $activities, PropelPDO $con = null)
    {
        $this->activitiesScheduledForDeletion = $this->getActivities(new Criteria(), $con)->diff($activities);

        foreach ($this->activitiesScheduledForDeletion as $activityRemoved) {
            $activityRemoved->setSnapshot(null);
        }

        $this->collActivities = null;
        foreach ($activities as $activity) {
            $this->addActivity($activity);
        }

        $this->collActivities = $activities;
        $this->collActivitiesPartial = false;
    }

    /**
     * Returns the number of related Activity objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Activity objects.
     * @throws PropelException
     */
    public function countActivities(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collActivitiesPartial && !$this->isNew();
        if (null === $this->collActivities || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collActivities) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getActivities());
                }
                $query = ActivityQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBySnapshot($this)
                    ->count($con);
            }
        } else {
            return count($this->collActivities);
        }
    }

    /**
     * Method called to associate a Activity object to this object
     * through the Activity foreign key attribute.
     *
     * @param    Activity $l Activity
     * @return Snapshot The current object (for fluent API support)
     */
    public function addActivity(Activity $l)
    {
        if ($this->collActivities === null) {
            $this->initActivities();
            $this->collActivitiesPartial = true;
        }
        if (!in_array($l, $this->collActivities->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddActivity($l);
        }

        return $this;
    }

    /**
     * @param	Activity $activity The activity object to add.
     */
    protected function doAddActivity($activity)
    {
        $this->collActivities[]= $activity;
        $activity->setSnapshot($this);
    }

    /**
     * @param	Activity $activity The activity object to remove.
     */
    public function removeActivity($activity)
    {
        if ($this->getActivities()->contains($activity)) {
            $this->collActivities->remove($this->collActivities->search($activity));
            if (null === $this->activitiesScheduledForDeletion) {
                $this->activitiesScheduledForDeletion = clone $this->collActivities;
                $this->activitiesScheduledForDeletion->clear();
            }
            $this->activitiesScheduledForDeletion[]= $activity;
            $activity->setSnapshot(null);
        }
    }

    /**
     * Clears out the collFolders collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addFolders()
     */
    public function clearFolders()
    {
        $this->collFolders = null; // important to set this to null since that means it is uninitialized
        $this->collFoldersPartial = null;
    }

    /**
     * reset is the collFolders collection loaded partially
     *
     * @return void
     */
    public function resetPartialFolders($v = true)
    {
        $this->collFoldersPartial = $v;
    }

    /**
     * Initializes the collFolders collection.
     *
     * By default this just sets the collFolders collection to an empty array (like clearcollFolders());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initFolders($overrideExisting = true)
    {
        if (null !== $this->collFolders && !$overrideExisting) {
            return;
        }
        $this->collFolders = new PropelObjectCollection();
        $this->collFolders->setModel('Folder');
    }

    /**
     * Gets an array of Folder objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Snapshot is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Folder[] List of Folder objects
     * @throws PropelException
     */
    public function getFolders($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collFoldersPartial && !$this->isNew();
        if (null === $this->collFolders || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collFolders) {
                // return empty collection
                $this->initFolders();
            } else {
                $collFolders = FolderQuery::create(null, $criteria)
                    ->filterBySnapshot($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collFoldersPartial && count($collFolders)) {
                      $this->initFolders(false);

                      foreach($collFolders as $obj) {
                        if (false == $this->collFolders->contains($obj)) {
                          $this->collFolders->append($obj);
                        }
                      }

                      $this->collFoldersPartial = true;
                    }

                    return $collFolders;
                }

                if($partial && $this->collFolders) {
                    foreach($this->collFolders as $obj) {
                        if($obj->isNew()) {
                            $collFolders[] = $obj;
                        }
                    }
                }

                $this->collFolders = $collFolders;
                $this->collFoldersPartial = false;
            }
        }

        return $this->collFolders;
    }

    /**
     * Sets a collection of Folder objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $folders A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setFolders(PropelCollection $folders, PropelPDO $con = null)
    {
        $this->foldersScheduledForDeletion = $this->getFolders(new Criteria(), $con)->diff($folders);

        foreach ($this->foldersScheduledForDeletion as $folderRemoved) {
            $folderRemoved->setSnapshot(null);
        }

        $this->collFolders = null;
        foreach ($folders as $folder) {
            $this->addFolder($folder);
        }

        $this->collFolders = $folders;
        $this->collFoldersPartial = false;
    }

    /**
     * Returns the number of related Folder objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Folder objects.
     * @throws PropelException
     */
    public function countFolders(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collFoldersPartial && !$this->isNew();
        if (null === $this->collFolders || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collFolders) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getFolders());
                }
                $query = FolderQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBySnapshot($this)
                    ->count($con);
            }
        } else {
            return count($this->collFolders);
        }
    }

    /**
     * Method called to associate a Folder object to this object
     * through the Folder foreign key attribute.
     *
     * @param    Folder $l Folder
     * @return Snapshot The current object (for fluent API support)
     */
    public function addFolder(Folder $l)
    {
        if ($this->collFolders === null) {
            $this->initFolders();
            $this->collFoldersPartial = true;
        }
        if (!in_array($l, $this->collFolders->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddFolder($l);
        }

        return $this;
    }

    /**
     * @param	Folder $folder The folder object to add.
     */
    protected function doAddFolder($folder)
    {
        $this->collFolders[]= $folder;
        $folder->setSnapshot($this);
    }

    /**
     * @param	Folder $folder The folder object to remove.
     */
    public function removeFolder($folder)
    {
        if ($this->getFolders()->contains($folder)) {
            $this->collFolders->remove($this->collFolders->search($folder));
            if (null === $this->foldersScheduledForDeletion) {
                $this->foldersScheduledForDeletion = clone $this->collFolders;
                $this->foldersScheduledForDeletion->clear();
            }
            $this->foldersScheduledForDeletion[]= $folder;
            $folder->setSnapshot(null);
        }
    }

    /**
     * Clears out the collNonConformances collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addNonConformances()
     */
    public function clearNonConformances()
    {
        $this->collNonConformances = null; // important to set this to null since that means it is uninitialized
        $this->collNonConformancesPartial = null;
    }

    /**
     * reset is the collNonConformances collection loaded partially
     *
     * @return void
     */
    public function resetPartialNonConformances($v = true)
    {
        $this->collNonConformancesPartial = $v;
    }

    /**
     * Initializes the collNonConformances collection.
     *
     * By default this just sets the collNonConformances collection to an empty array (like clearcollNonConformances());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initNonConformances($overrideExisting = true)
    {
        if (null !== $this->collNonConformances && !$overrideExisting) {
            return;
        }
        $this->collNonConformances = new PropelObjectCollection();
        $this->collNonConformances->setModel('NonConformance');
    }

    /**
     * Gets an array of NonConformance objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Snapshot is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|NonConformance[] List of NonConformance objects
     * @throws PropelException
     */
    public function getNonConformances($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collNonConformancesPartial && !$this->isNew();
        if (null === $this->collNonConformances || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collNonConformances) {
                // return empty collection
                $this->initNonConformances();
            } else {
                $collNonConformances = NonConformanceQuery::create(null, $criteria)
                    ->filterBySnapshot($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collNonConformancesPartial && count($collNonConformances)) {
                      $this->initNonConformances(false);

                      foreach($collNonConformances as $obj) {
                        if (false == $this->collNonConformances->contains($obj)) {
                          $this->collNonConformances->append($obj);
                        }
                      }

                      $this->collNonConformancesPartial = true;
                    }

                    return $collNonConformances;
                }

                if($partial && $this->collNonConformances) {
                    foreach($this->collNonConformances as $obj) {
                        if($obj->isNew()) {
                            $collNonConformances[] = $obj;
                        }
                    }
                }

                $this->collNonConformances = $collNonConformances;
                $this->collNonConformancesPartial = false;
            }
        }

        return $this->collNonConformances;
    }

    /**
     * Sets a collection of NonConformance objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $nonConformances A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setNonConformances(PropelCollection $nonConformances, PropelPDO $con = null)
    {
        $this->nonConformancesScheduledForDeletion = $this->getNonConformances(new Criteria(), $con)->diff($nonConformances);

        foreach ($this->nonConformancesScheduledForDeletion as $nonConformanceRemoved) {
            $nonConformanceRemoved->setSnapshot(null);
        }

        $this->collNonConformances = null;
        foreach ($nonConformances as $nonConformance) {
            $this->addNonConformance($nonConformance);
        }

        $this->collNonConformances = $nonConformances;
        $this->collNonConformancesPartial = false;
    }

    /**
     * Returns the number of related NonConformance objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related NonConformance objects.
     * @throws PropelException
     */
    public function countNonConformances(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collNonConformancesPartial && !$this->isNew();
        if (null === $this->collNonConformances || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collNonConformances) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getNonConformances());
                }
                $query = NonConformanceQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBySnapshot($this)
                    ->count($con);
            }
        } else {
            return count($this->collNonConformances);
        }
    }

    /**
     * Method called to associate a NonConformance object to this object
     * through the NonConformance foreign key attribute.
     *
     * @param    NonConformance $l NonConformance
     * @return Snapshot The current object (for fluent API support)
     */
    public function addNonConformance(NonConformance $l)
    {
        if ($this->collNonConformances === null) {
            $this->initNonConformances();
            $this->collNonConformancesPartial = true;
        }
        if (!in_array($l, $this->collNonConformances->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddNonConformance($l);
        }

        return $this;
    }

    /**
     * @param	NonConformance $nonConformance The nonConformance object to add.
     */
    protected function doAddNonConformance($nonConformance)
    {
        $this->collNonConformances[]= $nonConformance;
        $nonConformance->setSnapshot($this);
    }

    /**
     * @param	NonConformance $nonConformance The nonConformance object to remove.
     */
    public function removeNonConformance($nonConformance)
    {
        if ($this->getNonConformances()->contains($nonConformance)) {
            $this->collNonConformances->remove($this->collNonConformances->search($nonConformance));
            if (null === $this->nonConformancesScheduledForDeletion) {
                $this->nonConformancesScheduledForDeletion = clone $this->collNonConformances;
                $this->nonConformancesScheduledForDeletion->clear();
            }
            $this->nonConformancesScheduledForDeletion[]= $nonConformance;
            $nonConformance->setSnapshot(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Snapshot is new, it will return
     * an empty collection; or if this Snapshot has previously
     * been saved, it will retrieve related NonConformances from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Snapshot.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|NonConformance[] List of NonConformance objects
     */
    public function getNonConformancesJoinPersonRelatedByClosedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = NonConformanceQuery::create(null, $criteria);
        $query->joinWith('PersonRelatedByClosedBy', $join_behavior);

        return $this->getNonConformances($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Snapshot is new, it will return
     * an empty collection; or if this Snapshot has previously
     * been saved, it will retrieve related NonConformances from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Snapshot.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|NonConformance[] List of NonConformance objects
     */
    public function getNonConformancesJoinPersonRelatedByOpenedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = NonConformanceQuery::create(null, $criteria);
        $query->joinWith('PersonRelatedByOpenedBy', $join_behavior);

        return $this->getNonConformances($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Snapshot is new, it will return
     * an empty collection; or if this Snapshot has previously
     * been saved, it will retrieve related NonConformances from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Snapshot.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|NonConformance[] List of NonConformance objects
     */
    public function getNonConformancesJoinNonConformanceType($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = NonConformanceQuery::create(null, $criteria);
        $query->joinWith('NonConformanceType', $join_behavior);

        return $this->getNonConformances($query, $con);
    }

    /**
     * Clears out the collProfileGroups collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addProfileGroups()
     */
    public function clearProfileGroups()
    {
        $this->collProfileGroups = null; // important to set this to null since that means it is uninitialized
        $this->collProfileGroupsPartial = null;
    }

    /**
     * reset is the collProfileGroups collection loaded partially
     *
     * @return void
     */
    public function resetPartialProfileGroups($v = true)
    {
        $this->collProfileGroupsPartial = $v;
    }

    /**
     * Initializes the collProfileGroups collection.
     *
     * By default this just sets the collProfileGroups collection to an empty array (like clearcollProfileGroups());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initProfileGroups($overrideExisting = true)
    {
        if (null !== $this->collProfileGroups && !$overrideExisting) {
            return;
        }
        $this->collProfileGroups = new PropelObjectCollection();
        $this->collProfileGroups->setModel('ProfileGroup');
    }

    /**
     * Gets an array of ProfileGroup objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Snapshot is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProfileGroup[] List of ProfileGroup objects
     * @throws PropelException
     */
    public function getProfileGroups($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collProfileGroupsPartial && !$this->isNew();
        if (null === $this->collProfileGroups || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collProfileGroups) {
                // return empty collection
                $this->initProfileGroups();
            } else {
                $collProfileGroups = ProfileGroupQuery::create(null, $criteria)
                    ->filterBySnapshot($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collProfileGroupsPartial && count($collProfileGroups)) {
                      $this->initProfileGroups(false);

                      foreach($collProfileGroups as $obj) {
                        if (false == $this->collProfileGroups->contains($obj)) {
                          $this->collProfileGroups->append($obj);
                        }
                      }

                      $this->collProfileGroupsPartial = true;
                    }

                    return $collProfileGroups;
                }

                if($partial && $this->collProfileGroups) {
                    foreach($this->collProfileGroups as $obj) {
                        if($obj->isNew()) {
                            $collProfileGroups[] = $obj;
                        }
                    }
                }

                $this->collProfileGroups = $collProfileGroups;
                $this->collProfileGroupsPartial = false;
            }
        }

        return $this->collProfileGroups;
    }

    /**
     * Sets a collection of ProfileGroup objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $profileGroups A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setProfileGroups(PropelCollection $profileGroups, PropelPDO $con = null)
    {
        $this->profileGroupsScheduledForDeletion = $this->getProfileGroups(new Criteria(), $con)->diff($profileGroups);

        foreach ($this->profileGroupsScheduledForDeletion as $profileGroupRemoved) {
            $profileGroupRemoved->setSnapshot(null);
        }

        $this->collProfileGroups = null;
        foreach ($profileGroups as $profileGroup) {
            $this->addProfileGroup($profileGroup);
        }

        $this->collProfileGroups = $profileGroups;
        $this->collProfileGroupsPartial = false;
    }

    /**
     * Returns the number of related ProfileGroup objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProfileGroup objects.
     * @throws PropelException
     */
    public function countProfileGroups(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collProfileGroupsPartial && !$this->isNew();
        if (null === $this->collProfileGroups || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProfileGroups) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getProfileGroups());
                }
                $query = ProfileGroupQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBySnapshot($this)
                    ->count($con);
            }
        } else {
            return count($this->collProfileGroups);
        }
    }

    /**
     * Method called to associate a ProfileGroup object to this object
     * through the ProfileGroup foreign key attribute.
     *
     * @param    ProfileGroup $l ProfileGroup
     * @return Snapshot The current object (for fluent API support)
     */
    public function addProfileGroup(ProfileGroup $l)
    {
        if ($this->collProfileGroups === null) {
            $this->initProfileGroups();
            $this->collProfileGroupsPartial = true;
        }
        if (!in_array($l, $this->collProfileGroups->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddProfileGroup($l);
        }

        return $this;
    }

    /**
     * @param	ProfileGroup $profileGroup The profileGroup object to add.
     */
    protected function doAddProfileGroup($profileGroup)
    {
        $this->collProfileGroups[]= $profileGroup;
        $profileGroup->setSnapshot($this);
    }

    /**
     * @param	ProfileGroup $profileGroup The profileGroup object to remove.
     */
    public function removeProfileGroup($profileGroup)
    {
        if ($this->getProfileGroups()->contains($profileGroup)) {
            $this->collProfileGroups->remove($this->collProfileGroups->search($profileGroup));
            if (null === $this->profileGroupsScheduledForDeletion) {
                $this->profileGroupsScheduledForDeletion = clone $this->collProfileGroups;
                $this->profileGroupsScheduledForDeletion->clear();
            }
            $this->profileGroupsScheduledForDeletion[]= $profileGroup;
            $profileGroup->setSnapshot(null);
        }
    }

    /**
     * Clears out the collGroupings collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addGroupings()
     */
    public function clearGroupings()
    {
        $this->collGroupings = null; // important to set this to null since that means it is uninitialized
        $this->collGroupingsPartial = null;
    }

    /**
     * reset is the collGroupings collection loaded partially
     *
     * @return void
     */
    public function resetPartialGroupings($v = true)
    {
        $this->collGroupingsPartial = $v;
    }

    /**
     * Initializes the collGroupings collection.
     *
     * By default this just sets the collGroupings collection to an empty array (like clearcollGroupings());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initGroupings($overrideExisting = true)
    {
        if (null !== $this->collGroupings && !$overrideExisting) {
            return;
        }
        $this->collGroupings = new PropelObjectCollection();
        $this->collGroupings->setModel('Grouping');
    }

    /**
     * Gets an array of Grouping objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Snapshot is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Grouping[] List of Grouping objects
     * @throws PropelException
     */
    public function getGroupings($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collGroupingsPartial && !$this->isNew();
        if (null === $this->collGroupings || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collGroupings) {
                // return empty collection
                $this->initGroupings();
            } else {
                $collGroupings = GroupingQuery::create(null, $criteria)
                    ->filterBySnapshot($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collGroupingsPartial && count($collGroupings)) {
                      $this->initGroupings(false);

                      foreach($collGroupings as $obj) {
                        if (false == $this->collGroupings->contains($obj)) {
                          $this->collGroupings->append($obj);
                        }
                      }

                      $this->collGroupingsPartial = true;
                    }

                    return $collGroupings;
                }

                if($partial && $this->collGroupings) {
                    foreach($this->collGroupings as $obj) {
                        if($obj->isNew()) {
                            $collGroupings[] = $obj;
                        }
                    }
                }

                $this->collGroupings = $collGroupings;
                $this->collGroupingsPartial = false;
            }
        }

        return $this->collGroupings;
    }

    /**
     * Sets a collection of Grouping objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $groupings A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setGroupings(PropelCollection $groupings, PropelPDO $con = null)
    {
        $this->groupingsScheduledForDeletion = $this->getGroupings(new Criteria(), $con)->diff($groupings);

        foreach ($this->groupingsScheduledForDeletion as $groupingRemoved) {
            $groupingRemoved->setSnapshot(null);
        }

        $this->collGroupings = null;
        foreach ($groupings as $grouping) {
            $this->addGrouping($grouping);
        }

        $this->collGroupings = $groupings;
        $this->collGroupingsPartial = false;
    }

    /**
     * Returns the number of related Grouping objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Grouping objects.
     * @throws PropelException
     */
    public function countGroupings(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collGroupingsPartial && !$this->isNew();
        if (null === $this->collGroupings || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collGroupings) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getGroupings());
                }
                $query = GroupingQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBySnapshot($this)
                    ->count($con);
            }
        } else {
            return count($this->collGroupings);
        }
    }

    /**
     * Method called to associate a Grouping object to this object
     * through the Grouping foreign key attribute.
     *
     * @param    Grouping $l Grouping
     * @return Snapshot The current object (for fluent API support)
     */
    public function addGrouping(Grouping $l)
    {
        if ($this->collGroupings === null) {
            $this->initGroupings();
            $this->collGroupingsPartial = true;
        }
        if (!in_array($l, $this->collGroupings->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddGrouping($l);
        }

        return $this;
    }

    /**
     * @param	Grouping $grouping The grouping object to add.
     */
    protected function doAddGrouping($grouping)
    {
        $this->collGroupings[]= $grouping;
        $grouping->setSnapshot($this);
    }

    /**
     * @param	Grouping $grouping The grouping object to remove.
     */
    public function removeGrouping($grouping)
    {
        if ($this->getGroupings()->contains($grouping)) {
            $this->collGroupings->remove($this->collGroupings->search($grouping));
            if (null === $this->groupingsScheduledForDeletion) {
                $this->groupingsScheduledForDeletion = clone $this->collGroupings;
                $this->groupingsScheduledForDeletion->clear();
            }
            $this->groupingsScheduledForDeletion[]= $grouping;
            $grouping->setSnapshot(null);
        }
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->order_nr = null;
        $this->display_name = null;
        $this->visible = null;
        $this->restricted = null;
        $this->organization_id = null;
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
            if ($this->collActions) {
                foreach ($this->collActions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCategories) {
                foreach ($this->collCategories as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collConfigurations) {
                foreach ($this->collConfigurations as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collDeliveries) {
                foreach ($this->collDeliveries as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEvents) {
                foreach ($this->collEvents as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collActivities) {
                foreach ($this->collActivities as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collFolders) {
                foreach ($this->collFolders as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collNonConformances) {
                foreach ($this->collNonConformances as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collProfileGroups) {
                foreach ($this->collProfileGroups as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collGroupings) {
                foreach ($this->collGroupings as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        if ($this->collActions instanceof PropelCollection) {
            $this->collActions->clearIterator();
        }
        $this->collActions = null;
        if ($this->collCategories instanceof PropelCollection) {
            $this->collCategories->clearIterator();
        }
        $this->collCategories = null;
        if ($this->collConfigurations instanceof PropelCollection) {
            $this->collConfigurations->clearIterator();
        }
        $this->collConfigurations = null;
        if ($this->collDeliveries instanceof PropelCollection) {
            $this->collDeliveries->clearIterator();
        }
        $this->collDeliveries = null;
        if ($this->collEvents instanceof PropelCollection) {
            $this->collEvents->clearIterator();
        }
        $this->collEvents = null;
        if ($this->collActivities instanceof PropelCollection) {
            $this->collActivities->clearIterator();
        }
        $this->collActivities = null;
        if ($this->collFolders instanceof PropelCollection) {
            $this->collFolders->clearIterator();
        }
        $this->collFolders = null;
        if ($this->collNonConformances instanceof PropelCollection) {
            $this->collNonConformances->clearIterator();
        }
        $this->collNonConformances = null;
        if ($this->collProfileGroups instanceof PropelCollection) {
            $this->collProfileGroups->clearIterator();
        }
        $this->collProfileGroups = null;
        if ($this->collGroupings instanceof PropelCollection) {
            $this->collGroupings->clearIterator();
        }
        $this->collGroupings = null;
        $this->aOrganization = null;
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
     * @return    Snapshot
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
        return $this->organization_id;
    }

    /**
     * Wrap the setter for scope value
     *
     * @param     int
     * @return    Snapshot
     */
    public function setScopeValue($v)
    {
        return $this->setOrganizationId($v);
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
        return $this->getOrderNr() == SnapshotQuery::create()->getMaxRank($this->getOrganizationId(), $con);
    }

    /**
     * Get the next item in the list, i.e. the one for which rank is immediately higher
     *
     * @param     PropelPDO  $con      optional connection
     *
     * @return    Snapshot
     */
    public function getNext(PropelPDO $con = null)
    {

        return SnapshotQuery::create()->findOneByRank($this->getOrderNr() + 1, $this->getOrganizationId(), $con);
    }

    /**
     * Get the previous item in the list, i.e. the one for which rank is immediately lower
     *
     * @param     PropelPDO  $con      optional connection
     *
     * @return    Snapshot
     */
    public function getPrevious(PropelPDO $con = null)
    {

        return SnapshotQuery::create()->findOneByRank($this->getOrderNr() - 1, $this->getOrganizationId(), $con);
    }

    /**
     * Insert at specified rank
     * The modifications are not persisted until the object is saved.
     *
     * @param     integer    $rank rank value
     * @param     PropelPDO  $con      optional connection
     *
     * @return    Snapshot the current object
     *
     * @throws    PropelException
     */
    public function insertAtRank($rank, PropelPDO $con = null)
    {
        $maxRank = SnapshotQuery::create()->getMaxRank($this->getOrganizationId(), $con);
        if ($rank < 1 || $rank > $maxRank + 1) {
            throw new PropelException('Invalid rank ' . $rank);
        }
        // move the object in the list, at the given rank
        $this->setOrderNr($rank);
        if ($rank != $maxRank + 1) {
            // Keep the list modification query for the save() transaction
            $this->sortableQueries []= array(
                'callable'  => array(self::PEER, 'shiftRank'),
                'arguments' => array(1, $rank, null, $this->getOrganizationId())
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
     * @return    Snapshot the current object
     *
     * @throws    PropelException
     */
    public function insertAtBottom(PropelPDO $con = null)
    {
        $this->setOrderNr(SnapshotQuery::create()->getMaxRank($this->getOrganizationId(), $con) + 1);

        return $this;
    }

    /**
     * Insert in the first rank
     * The modifications are not persisted until the object is saved.
     *
     * @return    Snapshot the current object
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
     * @return    Snapshot the current object
     *
     * @throws    PropelException
     */
    public function moveToRank($newRank, PropelPDO $con = null)
    {
        if ($this->isNew()) {
            throw new PropelException('New objects cannot be moved. Please use insertAtRank() instead');
        }
        if ($con === null) {
            $con = Propel::getConnection(SnapshotPeer::DATABASE_NAME);
        }
        if ($newRank < 1 || $newRank > SnapshotQuery::create()->getMaxRank($this->getOrganizationId(), $con)) {
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
            SnapshotPeer::shiftRank($delta, min($oldRank, $newRank), max($oldRank, $newRank), $this->getOrganizationId(), $con);

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
     * @param     Snapshot $object
     * @param     PropelPDO $con optional connection
     *
     * @return    Snapshot the current object
     *
     * @throws Exception if the database cannot execute the two updates
     */
    public function swapWith($object, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(SnapshotPeer::DATABASE_NAME);
        }
        $con->beginTransaction();
        try {
            $oldScope = $this->getOrganizationId();
            $newScope = $object->getOrganizationId();
            if ($oldScope != $newScope) {
                $this->setOrganizationId($newScope);
                $object->setOrganizationId($oldScope);
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
     * @return    Snapshot the current object
     */
    public function moveUp(PropelPDO $con = null)
    {
        if ($this->isFirst()) {
            return $this;
        }
        if ($con === null) {
            $con = Propel::getConnection(SnapshotPeer::DATABASE_NAME);
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
     * @return    Snapshot the current object
     */
    public function moveDown(PropelPDO $con = null)
    {
        if ($this->isLast($con)) {
            return $this;
        }
        if ($con === null) {
            $con = Propel::getConnection(SnapshotPeer::DATABASE_NAME);
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
     * @return    Snapshot the current object
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
            $con = Propel::getConnection(SnapshotPeer::DATABASE_NAME);
        }
        $con->beginTransaction();
        try {
            $bottom = SnapshotQuery::create()->getMaxRank($this->getOrganizationId(), $con);
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
     * @return    Snapshot the current object
     */
    public function removeFromList(PropelPDO $con = null)
    {
        // check if object is already removed
        if ($this->getOrganizationId() === null) {
            throw new PropelException('Object is already removed (has null scope)');
        }

        // move the object to the end of null scope
        $this->setOrganizationId(null);
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
