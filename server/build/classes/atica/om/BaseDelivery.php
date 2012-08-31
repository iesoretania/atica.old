<?php


/**
 * Base class that represents a row from the 'delivery' table.
 *
 *
 *
 * @package    propel.generator.atica.om
 */
abstract class BaseDelivery extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DeliveryPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        DeliveryPeer
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
     * The value for the profile_id field.
     * @var        int
     */
    protected $profile_id;

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
     * The value for the creation_date field.
     * @var        string
     */
    protected $creation_date;

    /**
     * The value for the current_revision_id field.
     * @var        int
     */
    protected $current_revision_id;

    /**
     * The value for the public_token field.
     * @var        string
     */
    protected $public_token;

    /**
     * @var        Profile
     */
    protected $aProfile;

    /**
     * @var        Revision
     */
    protected $aRevisionRelatedByCurrentRevisionId;

    /**
     * @var        Snapshot
     */
    protected $aSnapshot;

    /**
     * @var        PropelObjectCollection|FolderDelivery[] Collection to store aggregation of FolderDelivery objects.
     */
    protected $collFolderDeliveries;
    protected $collFolderDeliveriesPartial;

    /**
     * @var        PropelObjectCollection|EventDelivery[] Collection to store aggregation of EventDelivery objects.
     */
    protected $collEventDeliveries;
    protected $collEventDeliveriesPartial;

    /**
     * @var        PropelObjectCollection|Revision[] Collection to store aggregation of Revision objects.
     */
    protected $collRevisionsRelatedByDeliveryId;
    protected $collRevisionsRelatedByDeliveryIdPartial;

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
    protected $folderDeliveriesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $eventDeliveriesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $revisionsRelatedByDeliveryIdScheduledForDeletion = null;

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
     * Get the [profile_id] column value.
     *
     * @return int
     */
    public function getProfileId()
    {
        return $this->profile_id;
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
     * Get the [optionally formatted] temporal [creation_date] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreationDate($format = 'Y-m-d H:i:s')
    {
        if ($this->creation_date === null) {
            return null;
        }

        if ($this->creation_date === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        } else {
            try {
                $dt = new DateTime($this->creation_date);
            } catch (Exception $x) {
                throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->creation_date, true), $x);
            }
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        } elseif (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        } else {
            return $dt->format($format);
        }
    }

    /**
     * Get the [current_revision_id] column value.
     *
     * @return int
     */
    public function getCurrentRevisionId()
    {
        return $this->current_revision_id;
    }

    /**
     * Get the [public_token] column value.
     *
     * @return string
     */
    public function getPublicToken()
    {
        return $this->public_token;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Delivery The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = DeliveryPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [snapshot_id] column.
     *
     * @param int $v new value
     * @return Delivery The current object (for fluent API support)
     */
    public function setSnapshotId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->snapshot_id !== $v) {
            $this->snapshot_id = $v;
            $this->modifiedColumns[] = DeliveryPeer::SNAPSHOT_ID;
        }

        if ($this->aSnapshot !== null && $this->aSnapshot->getId() !== $v) {
            $this->aSnapshot = null;
        }


        return $this;
    } // setSnapshotId()

    /**
     * Set the value of [profile_id] column.
     *
     * @param int $v new value
     * @return Delivery The current object (for fluent API support)
     */
    public function setProfileId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->profile_id !== $v) {
            $this->profile_id = $v;
            $this->modifiedColumns[] = DeliveryPeer::PROFILE_ID;
        }

        if ($this->aProfile !== null && $this->aProfile->getId() !== $v) {
            $this->aProfile = null;
        }


        return $this;
    } // setProfileId()

    /**
     * Set the value of [display_name] column.
     *
     * @param string $v new value
     * @return Delivery The current object (for fluent API support)
     */
    public function setDisplayName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->display_name !== $v) {
            $this->display_name = $v;
            $this->modifiedColumns[] = DeliveryPeer::DISPLAY_NAME;
        }


        return $this;
    } // setDisplayName()

    /**
     * Set the value of [description] column.
     *
     * @param string $v new value
     * @return Delivery The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[] = DeliveryPeer::DESCRIPTION;
        }


        return $this;
    } // setDescription()

    /**
     * Sets the value of [creation_date] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Delivery The current object (for fluent API support)
     */
    public function setCreationDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->creation_date !== null || $dt !== null) {
            $currentDateAsString = ($this->creation_date !== null && $tmpDt = new DateTime($this->creation_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->creation_date = $newDateAsString;
                $this->modifiedColumns[] = DeliveryPeer::CREATION_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreationDate()

    /**
     * Set the value of [current_revision_id] column.
     *
     * @param int $v new value
     * @return Delivery The current object (for fluent API support)
     */
    public function setCurrentRevisionId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->current_revision_id !== $v) {
            $this->current_revision_id = $v;
            $this->modifiedColumns[] = DeliveryPeer::CURRENT_REVISION_ID;
        }

        if ($this->aRevisionRelatedByCurrentRevisionId !== null && $this->aRevisionRelatedByCurrentRevisionId->getId() !== $v) {
            $this->aRevisionRelatedByCurrentRevisionId = null;
        }


        return $this;
    } // setCurrentRevisionId()

    /**
     * Set the value of [public_token] column.
     *
     * @param string $v new value
     * @return Delivery The current object (for fluent API support)
     */
    public function setPublicToken($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->public_token !== $v) {
            $this->public_token = $v;
            $this->modifiedColumns[] = DeliveryPeer::PUBLIC_TOKEN;
        }


        return $this;
    } // setPublicToken()

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
            $this->profile_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->display_name = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->description = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->creation_date = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->current_revision_id = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->public_token = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 8; // 8 = DeliveryPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Delivery object", $e);
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
        if ($this->aProfile !== null && $this->profile_id !== $this->aProfile->getId()) {
            $this->aProfile = null;
        }
        if ($this->aRevisionRelatedByCurrentRevisionId !== null && $this->current_revision_id !== $this->aRevisionRelatedByCurrentRevisionId->getId()) {
            $this->aRevisionRelatedByCurrentRevisionId = null;
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
            $con = Propel::getConnection(DeliveryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = DeliveryPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aProfile = null;
            $this->aRevisionRelatedByCurrentRevisionId = null;
            $this->aSnapshot = null;
            $this->collFolderDeliveries = null;

            $this->collEventDeliveries = null;

            $this->collRevisionsRelatedByDeliveryId = null;

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
            $con = Propel::getConnection(DeliveryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = DeliveryQuery::create()
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
            $con = Propel::getConnection(DeliveryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                DeliveryPeer::addInstanceToPool($this);
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

            if ($this->aProfile !== null) {
                if ($this->aProfile->isModified() || $this->aProfile->isNew()) {
                    $affectedRows += $this->aProfile->save($con);
                }
                $this->setProfile($this->aProfile);
            }

            if ($this->aRevisionRelatedByCurrentRevisionId !== null) {
                if ($this->aRevisionRelatedByCurrentRevisionId->isModified() || $this->aRevisionRelatedByCurrentRevisionId->isNew()) {
                    $affectedRows += $this->aRevisionRelatedByCurrentRevisionId->save($con);
                }
                $this->setRevisionRelatedByCurrentRevisionId($this->aRevisionRelatedByCurrentRevisionId);
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

            if ($this->folderDeliveriesScheduledForDeletion !== null) {
                if (!$this->folderDeliveriesScheduledForDeletion->isEmpty()) {
                    FolderDeliveryQuery::create()
                        ->filterByPrimaryKeys($this->folderDeliveriesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->folderDeliveriesScheduledForDeletion = null;
                }
            }

            if ($this->collFolderDeliveries !== null) {
                foreach ($this->collFolderDeliveries as $referrerFK) {
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

            if ($this->revisionsRelatedByDeliveryIdScheduledForDeletion !== null) {
                if (!$this->revisionsRelatedByDeliveryIdScheduledForDeletion->isEmpty()) {
                    RevisionQuery::create()
                        ->filterByPrimaryKeys($this->revisionsRelatedByDeliveryIdScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->revisionsRelatedByDeliveryIdScheduledForDeletion = null;
                }
            }

            if ($this->collRevisionsRelatedByDeliveryId !== null) {
                foreach ($this->collRevisionsRelatedByDeliveryId as $referrerFK) {
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

        $this->modifiedColumns[] = DeliveryPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . DeliveryPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(DeliveryPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`ID`';
        }
        if ($this->isColumnModified(DeliveryPeer::SNAPSHOT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`SNAPSHOT_ID`';
        }
        if ($this->isColumnModified(DeliveryPeer::PROFILE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`PROFILE_ID`';
        }
        if ($this->isColumnModified(DeliveryPeer::DISPLAY_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`DISPLAY_NAME`';
        }
        if ($this->isColumnModified(DeliveryPeer::DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`DESCRIPTION`';
        }
        if ($this->isColumnModified(DeliveryPeer::CREATION_DATE)) {
            $modifiedColumns[':p' . $index++]  = '`CREATION_DATE`';
        }
        if ($this->isColumnModified(DeliveryPeer::CURRENT_REVISION_ID)) {
            $modifiedColumns[':p' . $index++]  = '`CURRENT_REVISION_ID`';
        }
        if ($this->isColumnModified(DeliveryPeer::PUBLIC_TOKEN)) {
            $modifiedColumns[':p' . $index++]  = '`PUBLIC_TOKEN`';
        }

        $sql = sprintf(
            'INSERT INTO `delivery` (%s) VALUES (%s)',
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
                    case '`PROFILE_ID`':
                        $stmt->bindValue($identifier, $this->profile_id, PDO::PARAM_INT);
                        break;
                    case '`DISPLAY_NAME`':
                        $stmt->bindValue($identifier, $this->display_name, PDO::PARAM_STR);
                        break;
                    case '`DESCRIPTION`':
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
                        break;
                    case '`CREATION_DATE`':
                        $stmt->bindValue($identifier, $this->creation_date, PDO::PARAM_STR);
                        break;
                    case '`CURRENT_REVISION_ID`':
                        $stmt->bindValue($identifier, $this->current_revision_id, PDO::PARAM_INT);
                        break;
                    case '`PUBLIC_TOKEN`':
                        $stmt->bindValue($identifier, $this->public_token, PDO::PARAM_STR);
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

            if ($this->aProfile !== null) {
                if (!$this->aProfile->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aProfile->getValidationFailures());
                }
            }

            if ($this->aRevisionRelatedByCurrentRevisionId !== null) {
                if (!$this->aRevisionRelatedByCurrentRevisionId->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRevisionRelatedByCurrentRevisionId->getValidationFailures());
                }
            }

            if ($this->aSnapshot !== null) {
                if (!$this->aSnapshot->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSnapshot->getValidationFailures());
                }
            }


            if (($retval = DeliveryPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collFolderDeliveries !== null) {
                    foreach ($this->collFolderDeliveries as $referrerFK) {
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

                if ($this->collRevisionsRelatedByDeliveryId !== null) {
                    foreach ($this->collRevisionsRelatedByDeliveryId as $referrerFK) {
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
        $pos = DeliveryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getProfileId();
                break;
            case 3:
                return $this->getDisplayName();
                break;
            case 4:
                return $this->getDescription();
                break;
            case 5:
                return $this->getCreationDate();
                break;
            case 6:
                return $this->getCurrentRevisionId();
                break;
            case 7:
                return $this->getPublicToken();
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
        if (isset($alreadyDumpedObjects['Delivery'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Delivery'][$this->getPrimaryKey()] = true;
        $keys = DeliveryPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getSnapshotId(),
            $keys[2] => $this->getProfileId(),
            $keys[3] => $this->getDisplayName(),
            $keys[4] => $this->getDescription(),
            $keys[5] => $this->getCreationDate(),
            $keys[6] => $this->getCurrentRevisionId(),
            $keys[7] => $this->getPublicToken(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aProfile) {
                $result['Profile'] = $this->aProfile->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aRevisionRelatedByCurrentRevisionId) {
                $result['RevisionRelatedByCurrentRevisionId'] = $this->aRevisionRelatedByCurrentRevisionId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSnapshot) {
                $result['Snapshot'] = $this->aSnapshot->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collFolderDeliveries) {
                $result['FolderDeliveries'] = $this->collFolderDeliveries->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEventDeliveries) {
                $result['EventDeliveries'] = $this->collEventDeliveries->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRevisionsRelatedByDeliveryId) {
                $result['RevisionsRelatedByDeliveryId'] = $this->collRevisionsRelatedByDeliveryId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = DeliveryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setProfileId($value);
                break;
            case 3:
                $this->setDisplayName($value);
                break;
            case 4:
                $this->setDescription($value);
                break;
            case 5:
                $this->setCreationDate($value);
                break;
            case 6:
                $this->setCurrentRevisionId($value);
                break;
            case 7:
                $this->setPublicToken($value);
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
        $keys = DeliveryPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setSnapshotId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setProfileId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setDisplayName($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setDescription($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setCreationDate($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setCurrentRevisionId($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setPublicToken($arr[$keys[7]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(DeliveryPeer::DATABASE_NAME);

        if ($this->isColumnModified(DeliveryPeer::ID)) $criteria->add(DeliveryPeer::ID, $this->id);
        if ($this->isColumnModified(DeliveryPeer::SNAPSHOT_ID)) $criteria->add(DeliveryPeer::SNAPSHOT_ID, $this->snapshot_id);
        if ($this->isColumnModified(DeliveryPeer::PROFILE_ID)) $criteria->add(DeliveryPeer::PROFILE_ID, $this->profile_id);
        if ($this->isColumnModified(DeliveryPeer::DISPLAY_NAME)) $criteria->add(DeliveryPeer::DISPLAY_NAME, $this->display_name);
        if ($this->isColumnModified(DeliveryPeer::DESCRIPTION)) $criteria->add(DeliveryPeer::DESCRIPTION, $this->description);
        if ($this->isColumnModified(DeliveryPeer::CREATION_DATE)) $criteria->add(DeliveryPeer::CREATION_DATE, $this->creation_date);
        if ($this->isColumnModified(DeliveryPeer::CURRENT_REVISION_ID)) $criteria->add(DeliveryPeer::CURRENT_REVISION_ID, $this->current_revision_id);
        if ($this->isColumnModified(DeliveryPeer::PUBLIC_TOKEN)) $criteria->add(DeliveryPeer::PUBLIC_TOKEN, $this->public_token);

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
        $criteria = new Criteria(DeliveryPeer::DATABASE_NAME);
        $criteria->add(DeliveryPeer::ID, $this->id);

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
     * @param object $copyObj An object of Delivery (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSnapshotId($this->getSnapshotId());
        $copyObj->setProfileId($this->getProfileId());
        $copyObj->setDisplayName($this->getDisplayName());
        $copyObj->setDescription($this->getDescription());
        $copyObj->setCreationDate($this->getCreationDate());
        $copyObj->setCurrentRevisionId($this->getCurrentRevisionId());
        $copyObj->setPublicToken($this->getPublicToken());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getFolderDeliveries() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addFolderDelivery($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEventDeliveries() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEventDelivery($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRevisionsRelatedByDeliveryId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRevisionRelatedByDeliveryId($relObj->copy($deepCopy));
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
     * @return Delivery Clone of current object.
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
     * @return DeliveryPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new DeliveryPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Profile object.
     *
     * @param             Profile $v
     * @return Delivery The current object (for fluent API support)
     * @throws PropelException
     */
    public function setProfile(Profile $v = null)
    {
        if ($v === null) {
            $this->setProfileId(NULL);
        } else {
            $this->setProfileId($v->getId());
        }

        $this->aProfile = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Profile object, it will not be re-added.
        if ($v !== null) {
            $v->addDelivery($this);
        }


        return $this;
    }


    /**
     * Get the associated Profile object
     *
     * @param PropelPDO $con Optional Connection object.
     * @return Profile The associated Profile object.
     * @throws PropelException
     */
    public function getProfile(PropelPDO $con = null)
    {
        if ($this->aProfile === null && ($this->profile_id !== null)) {
            $this->aProfile = ProfileQuery::create()->findPk($this->profile_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aProfile->addDeliveries($this);
             */
        }

        return $this->aProfile;
    }

    /**
     * Declares an association between this object and a Revision object.
     *
     * @param             Revision $v
     * @return Delivery The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRevisionRelatedByCurrentRevisionId(Revision $v = null)
    {
        if ($v === null) {
            $this->setCurrentRevisionId(NULL);
        } else {
            $this->setCurrentRevisionId($v->getId());
        }

        $this->aRevisionRelatedByCurrentRevisionId = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Revision object, it will not be re-added.
        if ($v !== null) {
            $v->addDeliveryRelatedByCurrentRevisionId($this);
        }


        return $this;
    }


    /**
     * Get the associated Revision object
     *
     * @param PropelPDO $con Optional Connection object.
     * @return Revision The associated Revision object.
     * @throws PropelException
     */
    public function getRevisionRelatedByCurrentRevisionId(PropelPDO $con = null)
    {
        if ($this->aRevisionRelatedByCurrentRevisionId === null && ($this->current_revision_id !== null)) {
            $this->aRevisionRelatedByCurrentRevisionId = RevisionQuery::create()->findPk($this->current_revision_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRevisionRelatedByCurrentRevisionId->addDeliveriesRelatedByCurrentRevisionId($this);
             */
        }

        return $this->aRevisionRelatedByCurrentRevisionId;
    }

    /**
     * Declares an association between this object and a Snapshot object.
     *
     * @param             Snapshot $v
     * @return Delivery The current object (for fluent API support)
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
            $v->addDelivery($this);
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
                $this->aSnapshot->addDeliveries($this);
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
        if ('FolderDelivery' == $relationName) {
            $this->initFolderDeliveries();
        }
        if ('EventDelivery' == $relationName) {
            $this->initEventDeliveries();
        }
        if ('RevisionRelatedByDeliveryId' == $relationName) {
            $this->initRevisionsRelatedByDeliveryId();
        }
    }

    /**
     * Clears out the collFolderDeliveries collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addFolderDeliveries()
     */
    public function clearFolderDeliveries()
    {
        $this->collFolderDeliveries = null; // important to set this to null since that means it is uninitialized
        $this->collFolderDeliveriesPartial = null;
    }

    /**
     * reset is the collFolderDeliveries collection loaded partially
     *
     * @return void
     */
    public function resetPartialFolderDeliveries($v = true)
    {
        $this->collFolderDeliveriesPartial = $v;
    }

    /**
     * Initializes the collFolderDeliveries collection.
     *
     * By default this just sets the collFolderDeliveries collection to an empty array (like clearcollFolderDeliveries());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initFolderDeliveries($overrideExisting = true)
    {
        if (null !== $this->collFolderDeliveries && !$overrideExisting) {
            return;
        }
        $this->collFolderDeliveries = new PropelObjectCollection();
        $this->collFolderDeliveries->setModel('FolderDelivery');
    }

    /**
     * Gets an array of FolderDelivery objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Delivery is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|FolderDelivery[] List of FolderDelivery objects
     * @throws PropelException
     */
    public function getFolderDeliveries($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collFolderDeliveriesPartial && !$this->isNew();
        if (null === $this->collFolderDeliveries || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collFolderDeliveries) {
                // return empty collection
                $this->initFolderDeliveries();
            } else {
                $collFolderDeliveries = FolderDeliveryQuery::create(null, $criteria)
                    ->filterByDelivery($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collFolderDeliveriesPartial && count($collFolderDeliveries)) {
                      $this->initFolderDeliveries(false);

                      foreach($collFolderDeliveries as $obj) {
                        if (false == $this->collFolderDeliveries->contains($obj)) {
                          $this->collFolderDeliveries->append($obj);
                        }
                      }

                      $this->collFolderDeliveriesPartial = true;
                    }

                    return $collFolderDeliveries;
                }

                if($partial && $this->collFolderDeliveries) {
                    foreach($this->collFolderDeliveries as $obj) {
                        if($obj->isNew()) {
                            $collFolderDeliveries[] = $obj;
                        }
                    }
                }

                $this->collFolderDeliveries = $collFolderDeliveries;
                $this->collFolderDeliveriesPartial = false;
            }
        }

        return $this->collFolderDeliveries;
    }

    /**
     * Sets a collection of FolderDelivery objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $folderDeliveries A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setFolderDeliveries(PropelCollection $folderDeliveries, PropelPDO $con = null)
    {
        $this->folderDeliveriesScheduledForDeletion = $this->getFolderDeliveries(new Criteria(), $con)->diff($folderDeliveries);

        foreach ($this->folderDeliveriesScheduledForDeletion as $folderDeliveryRemoved) {
            $folderDeliveryRemoved->setDelivery(null);
        }

        $this->collFolderDeliveries = null;
        foreach ($folderDeliveries as $folderDelivery) {
            $this->addFolderDelivery($folderDelivery);
        }

        $this->collFolderDeliveries = $folderDeliveries;
        $this->collFolderDeliveriesPartial = false;
    }

    /**
     * Returns the number of related FolderDelivery objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related FolderDelivery objects.
     * @throws PropelException
     */
    public function countFolderDeliveries(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collFolderDeliveriesPartial && !$this->isNew();
        if (null === $this->collFolderDeliveries || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collFolderDeliveries) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getFolderDeliveries());
                }
                $query = FolderDeliveryQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByDelivery($this)
                    ->count($con);
            }
        } else {
            return count($this->collFolderDeliveries);
        }
    }

    /**
     * Method called to associate a FolderDelivery object to this object
     * through the FolderDelivery foreign key attribute.
     *
     * @param    FolderDelivery $l FolderDelivery
     * @return Delivery The current object (for fluent API support)
     */
    public function addFolderDelivery(FolderDelivery $l)
    {
        if ($this->collFolderDeliveries === null) {
            $this->initFolderDeliveries();
            $this->collFolderDeliveriesPartial = true;
        }
        if (!in_array($l, $this->collFolderDeliveries->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddFolderDelivery($l);
        }

        return $this;
    }

    /**
     * @param	FolderDelivery $folderDelivery The folderDelivery object to add.
     */
    protected function doAddFolderDelivery($folderDelivery)
    {
        $this->collFolderDeliveries[]= $folderDelivery;
        $folderDelivery->setDelivery($this);
    }

    /**
     * @param	FolderDelivery $folderDelivery The folderDelivery object to remove.
     */
    public function removeFolderDelivery($folderDelivery)
    {
        if ($this->getFolderDeliveries()->contains($folderDelivery)) {
            $this->collFolderDeliveries->remove($this->collFolderDeliveries->search($folderDelivery));
            if (null === $this->folderDeliveriesScheduledForDeletion) {
                $this->folderDeliveriesScheduledForDeletion = clone $this->collFolderDeliveries;
                $this->folderDeliveriesScheduledForDeletion->clear();
            }
            $this->folderDeliveriesScheduledForDeletion[]= $folderDelivery;
            $folderDelivery->setDelivery(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Delivery is new, it will return
     * an empty collection; or if this Delivery has previously
     * been saved, it will retrieve related FolderDeliveries from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Delivery.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|FolderDelivery[] List of FolderDelivery objects
     */
    public function getFolderDeliveriesJoinFolder($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = FolderDeliveryQuery::create(null, $criteria);
        $query->joinWith('Folder', $join_behavior);

        return $this->getFolderDeliveries($query, $con);
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
     * If this Delivery is new, it will return
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
                    ->filterByDelivery($this)
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
            $eventDeliveryRemoved->setDelivery(null);
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
                    ->filterByDelivery($this)
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
     * @return Delivery The current object (for fluent API support)
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
        $eventDelivery->setDelivery($this);
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
            $eventDelivery->setDelivery(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Delivery is new, it will return
     * an empty collection; or if this Delivery has previously
     * been saved, it will retrieve related EventDeliveries from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Delivery.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|EventDelivery[] List of EventDelivery objects
     */
    public function getEventDeliveriesJoinEvent($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = EventDeliveryQuery::create(null, $criteria);
        $query->joinWith('Event', $join_behavior);

        return $this->getEventDeliveries($query, $con);
    }

    /**
     * Clears out the collRevisionsRelatedByDeliveryId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addRevisionsRelatedByDeliveryId()
     */
    public function clearRevisionsRelatedByDeliveryId()
    {
        $this->collRevisionsRelatedByDeliveryId = null; // important to set this to null since that means it is uninitialized
        $this->collRevisionsRelatedByDeliveryIdPartial = null;
    }

    /**
     * reset is the collRevisionsRelatedByDeliveryId collection loaded partially
     *
     * @return void
     */
    public function resetPartialRevisionsRelatedByDeliveryId($v = true)
    {
        $this->collRevisionsRelatedByDeliveryIdPartial = $v;
    }

    /**
     * Initializes the collRevisionsRelatedByDeliveryId collection.
     *
     * By default this just sets the collRevisionsRelatedByDeliveryId collection to an empty array (like clearcollRevisionsRelatedByDeliveryId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRevisionsRelatedByDeliveryId($overrideExisting = true)
    {
        if (null !== $this->collRevisionsRelatedByDeliveryId && !$overrideExisting) {
            return;
        }
        $this->collRevisionsRelatedByDeliveryId = new PropelObjectCollection();
        $this->collRevisionsRelatedByDeliveryId->setModel('Revision');
    }

    /**
     * Gets an array of Revision objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Delivery is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Revision[] List of Revision objects
     * @throws PropelException
     */
    public function getRevisionsRelatedByDeliveryId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRevisionsRelatedByDeliveryIdPartial && !$this->isNew();
        if (null === $this->collRevisionsRelatedByDeliveryId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRevisionsRelatedByDeliveryId) {
                // return empty collection
                $this->initRevisionsRelatedByDeliveryId();
            } else {
                $collRevisionsRelatedByDeliveryId = RevisionQuery::create(null, $criteria)
                    ->filterByDeliveryRelatedByDeliveryId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRevisionsRelatedByDeliveryIdPartial && count($collRevisionsRelatedByDeliveryId)) {
                      $this->initRevisionsRelatedByDeliveryId(false);

                      foreach($collRevisionsRelatedByDeliveryId as $obj) {
                        if (false == $this->collRevisionsRelatedByDeliveryId->contains($obj)) {
                          $this->collRevisionsRelatedByDeliveryId->append($obj);
                        }
                      }

                      $this->collRevisionsRelatedByDeliveryIdPartial = true;
                    }

                    return $collRevisionsRelatedByDeliveryId;
                }

                if($partial && $this->collRevisionsRelatedByDeliveryId) {
                    foreach($this->collRevisionsRelatedByDeliveryId as $obj) {
                        if($obj->isNew()) {
                            $collRevisionsRelatedByDeliveryId[] = $obj;
                        }
                    }
                }

                $this->collRevisionsRelatedByDeliveryId = $collRevisionsRelatedByDeliveryId;
                $this->collRevisionsRelatedByDeliveryIdPartial = false;
            }
        }

        return $this->collRevisionsRelatedByDeliveryId;
    }

    /**
     * Sets a collection of RevisionRelatedByDeliveryId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $revisionsRelatedByDeliveryId A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setRevisionsRelatedByDeliveryId(PropelCollection $revisionsRelatedByDeliveryId, PropelPDO $con = null)
    {
        $this->revisionsRelatedByDeliveryIdScheduledForDeletion = $this->getRevisionsRelatedByDeliveryId(new Criteria(), $con)->diff($revisionsRelatedByDeliveryId);

        foreach ($this->revisionsRelatedByDeliveryIdScheduledForDeletion as $revisionRelatedByDeliveryIdRemoved) {
            $revisionRelatedByDeliveryIdRemoved->setDeliveryRelatedByDeliveryId(null);
        }

        $this->collRevisionsRelatedByDeliveryId = null;
        foreach ($revisionsRelatedByDeliveryId as $revisionRelatedByDeliveryId) {
            $this->addRevisionRelatedByDeliveryId($revisionRelatedByDeliveryId);
        }

        $this->collRevisionsRelatedByDeliveryId = $revisionsRelatedByDeliveryId;
        $this->collRevisionsRelatedByDeliveryIdPartial = false;
    }

    /**
     * Returns the number of related Revision objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Revision objects.
     * @throws PropelException
     */
    public function countRevisionsRelatedByDeliveryId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRevisionsRelatedByDeliveryIdPartial && !$this->isNew();
        if (null === $this->collRevisionsRelatedByDeliveryId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRevisionsRelatedByDeliveryId) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getRevisionsRelatedByDeliveryId());
                }
                $query = RevisionQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByDeliveryRelatedByDeliveryId($this)
                    ->count($con);
            }
        } else {
            return count($this->collRevisionsRelatedByDeliveryId);
        }
    }

    /**
     * Method called to associate a Revision object to this object
     * through the Revision foreign key attribute.
     *
     * @param    Revision $l Revision
     * @return Delivery The current object (for fluent API support)
     */
    public function addRevisionRelatedByDeliveryId(Revision $l)
    {
        if ($this->collRevisionsRelatedByDeliveryId === null) {
            $this->initRevisionsRelatedByDeliveryId();
            $this->collRevisionsRelatedByDeliveryIdPartial = true;
        }
        if (!in_array($l, $this->collRevisionsRelatedByDeliveryId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRevisionRelatedByDeliveryId($l);
        }

        return $this;
    }

    /**
     * @param	RevisionRelatedByDeliveryId $revisionRelatedByDeliveryId The revisionRelatedByDeliveryId object to add.
     */
    protected function doAddRevisionRelatedByDeliveryId($revisionRelatedByDeliveryId)
    {
        $this->collRevisionsRelatedByDeliveryId[]= $revisionRelatedByDeliveryId;
        $revisionRelatedByDeliveryId->setDeliveryRelatedByDeliveryId($this);
    }

    /**
     * @param	RevisionRelatedByDeliveryId $revisionRelatedByDeliveryId The revisionRelatedByDeliveryId object to remove.
     */
    public function removeRevisionRelatedByDeliveryId($revisionRelatedByDeliveryId)
    {
        if ($this->getRevisionsRelatedByDeliveryId()->contains($revisionRelatedByDeliveryId)) {
            $this->collRevisionsRelatedByDeliveryId->remove($this->collRevisionsRelatedByDeliveryId->search($revisionRelatedByDeliveryId));
            if (null === $this->revisionsRelatedByDeliveryIdScheduledForDeletion) {
                $this->revisionsRelatedByDeliveryIdScheduledForDeletion = clone $this->collRevisionsRelatedByDeliveryId;
                $this->revisionsRelatedByDeliveryIdScheduledForDeletion->clear();
            }
            $this->revisionsRelatedByDeliveryIdScheduledForDeletion[]= $revisionRelatedByDeliveryId;
            $revisionRelatedByDeliveryId->setDeliveryRelatedByDeliveryId(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Delivery is new, it will return
     * an empty collection; or if this Delivery has previously
     * been saved, it will retrieve related RevisionsRelatedByDeliveryId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Delivery.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Revision[] List of Revision objects
     */
    public function getRevisionsRelatedByDeliveryIdJoinPersonRelatedByApproverPersonId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RevisionQuery::create(null, $criteria);
        $query->joinWith('PersonRelatedByApproverPersonId', $join_behavior);

        return $this->getRevisionsRelatedByDeliveryId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Delivery is new, it will return
     * an empty collection; or if this Delivery has previously
     * been saved, it will retrieve related RevisionsRelatedByDeliveryId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Delivery.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Revision[] List of Revision objects
     */
    public function getRevisionsRelatedByDeliveryIdJoinPersonRelatedByReviewerPersonId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RevisionQuery::create(null, $criteria);
        $query->joinWith('PersonRelatedByReviewerPersonId', $join_behavior);

        return $this->getRevisionsRelatedByDeliveryId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Delivery is new, it will return
     * an empty collection; or if this Delivery has previously
     * been saved, it will retrieve related RevisionsRelatedByDeliveryId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Delivery.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Revision[] List of Revision objects
     */
    public function getRevisionsRelatedByDeliveryIdJoinPersonRelatedByUploaderPersonId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RevisionQuery::create(null, $criteria);
        $query->joinWith('PersonRelatedByUploaderPersonId', $join_behavior);

        return $this->getRevisionsRelatedByDeliveryId($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->snapshot_id = null;
        $this->profile_id = null;
        $this->display_name = null;
        $this->description = null;
        $this->creation_date = null;
        $this->current_revision_id = null;
        $this->public_token = null;
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
            if ($this->collFolderDeliveries) {
                foreach ($this->collFolderDeliveries as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEventDeliveries) {
                foreach ($this->collEventDeliveries as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRevisionsRelatedByDeliveryId) {
                foreach ($this->collRevisionsRelatedByDeliveryId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        if ($this->collFolderDeliveries instanceof PropelCollection) {
            $this->collFolderDeliveries->clearIterator();
        }
        $this->collFolderDeliveries = null;
        if ($this->collEventDeliveries instanceof PropelCollection) {
            $this->collEventDeliveries->clearIterator();
        }
        $this->collEventDeliveries = null;
        if ($this->collRevisionsRelatedByDeliveryId instanceof PropelCollection) {
            $this->collRevisionsRelatedByDeliveryId->clearIterator();
        }
        $this->collRevisionsRelatedByDeliveryId = null;
        $this->aProfile = null;
        $this->aRevisionRelatedByCurrentRevisionId = null;
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
