<?php


/**
 * Base class that represents a row from the 'non_conformance' table.
 *
 *
 *
 * @package    propel.generator.atica.om
 */
abstract class BaseNonConformance extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'NonConformancePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        NonConformancePeer
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
     * The value for the non_conformance_type_id field.
     * @var        int
     */
    protected $non_conformance_type_id;

    /**
     * The value for the non_conformity_type_detail field.
     * @var        string
     */
    protected $non_conformity_type_detail;

    /**
     * The value for the description field.
     * @var        string
     */
    protected $description;

    /**
     * The value for the opened_at field.
     * @var        string
     */
    protected $opened_at;

    /**
     * The value for the opened_by field.
     * @var        int
     */
    protected $opened_by;

    /**
     * The value for the closed_at field.
     * @var        string
     */
    protected $closed_at;

    /**
     * The value for the closed_by field.
     * @var        int
     */
    protected $closed_by;

    /**
     * The value for the close_comment field.
     * @var        string
     */
    protected $close_comment;

    /**
     * @var        Person
     */
    protected $aPersonRelatedByClosedBy;

    /**
     * @var        Person
     */
    protected $aPersonRelatedByOpenedBy;

    /**
     * @var        Snapshot
     */
    protected $aSnapshot;

    /**
     * @var        NonConformanceType
     */
    protected $aNonConformanceType;

    /**
     * @var        PropelObjectCollection|Action[] Collection to store aggregation of Action objects.
     */
    protected $collActions;
    protected $collActionsPartial;

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
    protected $actionsScheduledForDeletion = null;

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
     * Get the [non_conformance_type_id] column value.
     *
     * @return int
     */
    public function getNonConformanceTypeId()
    {
        return $this->non_conformance_type_id;
    }

    /**
     * Get the [non_conformity_type_detail] column value.
     *
     * @return string
     */
    public function getNonConformityTypeDetail()
    {
        return $this->non_conformity_type_detail;
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
     * Get the [optionally formatted] temporal [opened_at] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getOpenedAt($format = '%x')
    {
        if ($this->opened_at === null) {
            return null;
        }

        if ($this->opened_at === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        } else {
            try {
                $dt = new DateTime($this->opened_at);
            } catch (Exception $x) {
                throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->opened_at, true), $x);
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
     * Get the [opened_by] column value.
     *
     * @return int
     */
    public function getOpenedBy()
    {
        return $this->opened_by;
    }

    /**
     * Get the [optionally formatted] temporal [closed_at] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getClosedAt($format = '%x')
    {
        if ($this->closed_at === null) {
            return null;
        }

        if ($this->closed_at === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        } else {
            try {
                $dt = new DateTime($this->closed_at);
            } catch (Exception $x) {
                throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->closed_at, true), $x);
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
     * Get the [closed_by] column value.
     *
     * @return int
     */
    public function getClosedBy()
    {
        return $this->closed_by;
    }

    /**
     * Get the [close_comment] column value.
     *
     * @return string
     */
    public function getCloseComment()
    {
        return $this->close_comment;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return NonConformance The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = NonConformancePeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [snapshot_id] column.
     *
     * @param int $v new value
     * @return NonConformance The current object (for fluent API support)
     */
    public function setSnapshotId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->snapshot_id !== $v) {
            $this->snapshot_id = $v;
            $this->modifiedColumns[] = NonConformancePeer::SNAPSHOT_ID;
        }

        if ($this->aSnapshot !== null && $this->aSnapshot->getId() !== $v) {
            $this->aSnapshot = null;
        }


        return $this;
    } // setSnapshotId()

    /**
     * Set the value of [non_conformance_type_id] column.
     *
     * @param int $v new value
     * @return NonConformance The current object (for fluent API support)
     */
    public function setNonConformanceTypeId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->non_conformance_type_id !== $v) {
            $this->non_conformance_type_id = $v;
            $this->modifiedColumns[] = NonConformancePeer::NON_CONFORMANCE_TYPE_ID;
        }

        if ($this->aNonConformanceType !== null && $this->aNonConformanceType->getId() !== $v) {
            $this->aNonConformanceType = null;
        }


        return $this;
    } // setNonConformanceTypeId()

    /**
     * Set the value of [non_conformity_type_detail] column.
     *
     * @param string $v new value
     * @return NonConformance The current object (for fluent API support)
     */
    public function setNonConformityTypeDetail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->non_conformity_type_detail !== $v) {
            $this->non_conformity_type_detail = $v;
            $this->modifiedColumns[] = NonConformancePeer::NON_CONFORMITY_TYPE_DETAIL;
        }


        return $this;
    } // setNonConformityTypeDetail()

    /**
     * Set the value of [description] column.
     *
     * @param string $v new value
     * @return NonConformance The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[] = NonConformancePeer::DESCRIPTION;
        }


        return $this;
    } // setDescription()

    /**
     * Sets the value of [opened_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return NonConformance The current object (for fluent API support)
     */
    public function setOpenedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->opened_at !== null || $dt !== null) {
            $currentDateAsString = ($this->opened_at !== null && $tmpDt = new DateTime($this->opened_at)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->opened_at = $newDateAsString;
                $this->modifiedColumns[] = NonConformancePeer::OPENED_AT;
            }
        } // if either are not null


        return $this;
    } // setOpenedAt()

    /**
     * Set the value of [opened_by] column.
     *
     * @param int $v new value
     * @return NonConformance The current object (for fluent API support)
     */
    public function setOpenedBy($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->opened_by !== $v) {
            $this->opened_by = $v;
            $this->modifiedColumns[] = NonConformancePeer::OPENED_BY;
        }

        if ($this->aPersonRelatedByOpenedBy !== null && $this->aPersonRelatedByOpenedBy->getId() !== $v) {
            $this->aPersonRelatedByOpenedBy = null;
        }


        return $this;
    } // setOpenedBy()

    /**
     * Sets the value of [closed_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return NonConformance The current object (for fluent API support)
     */
    public function setClosedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->closed_at !== null || $dt !== null) {
            $currentDateAsString = ($this->closed_at !== null && $tmpDt = new DateTime($this->closed_at)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->closed_at = $newDateAsString;
                $this->modifiedColumns[] = NonConformancePeer::CLOSED_AT;
            }
        } // if either are not null


        return $this;
    } // setClosedAt()

    /**
     * Set the value of [closed_by] column.
     *
     * @param int $v new value
     * @return NonConformance The current object (for fluent API support)
     */
    public function setClosedBy($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->closed_by !== $v) {
            $this->closed_by = $v;
            $this->modifiedColumns[] = NonConformancePeer::CLOSED_BY;
        }

        if ($this->aPersonRelatedByClosedBy !== null && $this->aPersonRelatedByClosedBy->getId() !== $v) {
            $this->aPersonRelatedByClosedBy = null;
        }


        return $this;
    } // setClosedBy()

    /**
     * Set the value of [close_comment] column.
     *
     * @param string $v new value
     * @return NonConformance The current object (for fluent API support)
     */
    public function setCloseComment($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->close_comment !== $v) {
            $this->close_comment = $v;
            $this->modifiedColumns[] = NonConformancePeer::CLOSE_COMMENT;
        }


        return $this;
    } // setCloseComment()

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
            $this->non_conformance_type_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->non_conformity_type_detail = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->description = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->opened_at = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->opened_by = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->closed_at = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->closed_by = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->close_comment = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 10; // 10 = NonConformancePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating NonConformance object", $e);
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
        if ($this->aNonConformanceType !== null && $this->non_conformance_type_id !== $this->aNonConformanceType->getId()) {
            $this->aNonConformanceType = null;
        }
        if ($this->aPersonRelatedByOpenedBy !== null && $this->opened_by !== $this->aPersonRelatedByOpenedBy->getId()) {
            $this->aPersonRelatedByOpenedBy = null;
        }
        if ($this->aPersonRelatedByClosedBy !== null && $this->closed_by !== $this->aPersonRelatedByClosedBy->getId()) {
            $this->aPersonRelatedByClosedBy = null;
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
            $con = Propel::getConnection(NonConformancePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = NonConformancePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aPersonRelatedByClosedBy = null;
            $this->aPersonRelatedByOpenedBy = null;
            $this->aSnapshot = null;
            $this->aNonConformanceType = null;
            $this->collActions = null;

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
            $con = Propel::getConnection(NonConformancePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = NonConformanceQuery::create()
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
            $con = Propel::getConnection(NonConformancePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                NonConformancePeer::addInstanceToPool($this);
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

            if ($this->aPersonRelatedByClosedBy !== null) {
                if ($this->aPersonRelatedByClosedBy->isModified() || $this->aPersonRelatedByClosedBy->isNew()) {
                    $affectedRows += $this->aPersonRelatedByClosedBy->save($con);
                }
                $this->setPersonRelatedByClosedBy($this->aPersonRelatedByClosedBy);
            }

            if ($this->aPersonRelatedByOpenedBy !== null) {
                if ($this->aPersonRelatedByOpenedBy->isModified() || $this->aPersonRelatedByOpenedBy->isNew()) {
                    $affectedRows += $this->aPersonRelatedByOpenedBy->save($con);
                }
                $this->setPersonRelatedByOpenedBy($this->aPersonRelatedByOpenedBy);
            }

            if ($this->aSnapshot !== null) {
                if ($this->aSnapshot->isModified() || $this->aSnapshot->isNew()) {
                    $affectedRows += $this->aSnapshot->save($con);
                }
                $this->setSnapshot($this->aSnapshot);
            }

            if ($this->aNonConformanceType !== null) {
                if ($this->aNonConformanceType->isModified() || $this->aNonConformanceType->isNew()) {
                    $affectedRows += $this->aNonConformanceType->save($con);
                }
                $this->setNonConformanceType($this->aNonConformanceType);
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
                    foreach ($this->actionsScheduledForDeletion as $action) {
                        // need to save related object because we set the relation to null
                        $action->save($con);
                    }
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

        $this->modifiedColumns[] = NonConformancePeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . NonConformancePeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(NonConformancePeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`ID`';
        }
        if ($this->isColumnModified(NonConformancePeer::SNAPSHOT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`SNAPSHOT_ID`';
        }
        if ($this->isColumnModified(NonConformancePeer::NON_CONFORMANCE_TYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`NON_CONFORMANCE_TYPE_ID`';
        }
        if ($this->isColumnModified(NonConformancePeer::NON_CONFORMITY_TYPE_DETAIL)) {
            $modifiedColumns[':p' . $index++]  = '`NON_CONFORMITY_TYPE_DETAIL`';
        }
        if ($this->isColumnModified(NonConformancePeer::DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`DESCRIPTION`';
        }
        if ($this->isColumnModified(NonConformancePeer::OPENED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`OPENED_AT`';
        }
        if ($this->isColumnModified(NonConformancePeer::OPENED_BY)) {
            $modifiedColumns[':p' . $index++]  = '`OPENED_BY`';
        }
        if ($this->isColumnModified(NonConformancePeer::CLOSED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`CLOSED_AT`';
        }
        if ($this->isColumnModified(NonConformancePeer::CLOSED_BY)) {
            $modifiedColumns[':p' . $index++]  = '`CLOSED_BY`';
        }
        if ($this->isColumnModified(NonConformancePeer::CLOSE_COMMENT)) {
            $modifiedColumns[':p' . $index++]  = '`CLOSE_COMMENT`';
        }

        $sql = sprintf(
            'INSERT INTO `non_conformance` (%s) VALUES (%s)',
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
                    case '`NON_CONFORMANCE_TYPE_ID`':
                        $stmt->bindValue($identifier, $this->non_conformance_type_id, PDO::PARAM_INT);
                        break;
                    case '`NON_CONFORMITY_TYPE_DETAIL`':
                        $stmt->bindValue($identifier, $this->non_conformity_type_detail, PDO::PARAM_STR);
                        break;
                    case '`DESCRIPTION`':
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
                        break;
                    case '`OPENED_AT`':
                        $stmt->bindValue($identifier, $this->opened_at, PDO::PARAM_STR);
                        break;
                    case '`OPENED_BY`':
                        $stmt->bindValue($identifier, $this->opened_by, PDO::PARAM_INT);
                        break;
                    case '`CLOSED_AT`':
                        $stmt->bindValue($identifier, $this->closed_at, PDO::PARAM_STR);
                        break;
                    case '`CLOSED_BY`':
                        $stmt->bindValue($identifier, $this->closed_by, PDO::PARAM_INT);
                        break;
                    case '`CLOSE_COMMENT`':
                        $stmt->bindValue($identifier, $this->close_comment, PDO::PARAM_STR);
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

            if ($this->aPersonRelatedByClosedBy !== null) {
                if (!$this->aPersonRelatedByClosedBy->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPersonRelatedByClosedBy->getValidationFailures());
                }
            }

            if ($this->aPersonRelatedByOpenedBy !== null) {
                if (!$this->aPersonRelatedByOpenedBy->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPersonRelatedByOpenedBy->getValidationFailures());
                }
            }

            if ($this->aSnapshot !== null) {
                if (!$this->aSnapshot->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSnapshot->getValidationFailures());
                }
            }

            if ($this->aNonConformanceType !== null) {
                if (!$this->aNonConformanceType->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aNonConformanceType->getValidationFailures());
                }
            }


            if (($retval = NonConformancePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collActions !== null) {
                    foreach ($this->collActions as $referrerFK) {
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
        $pos = NonConformancePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getNonConformanceTypeId();
                break;
            case 3:
                return $this->getNonConformityTypeDetail();
                break;
            case 4:
                return $this->getDescription();
                break;
            case 5:
                return $this->getOpenedAt();
                break;
            case 6:
                return $this->getOpenedBy();
                break;
            case 7:
                return $this->getClosedAt();
                break;
            case 8:
                return $this->getClosedBy();
                break;
            case 9:
                return $this->getCloseComment();
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
        if (isset($alreadyDumpedObjects['NonConformance'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['NonConformance'][$this->getPrimaryKey()] = true;
        $keys = NonConformancePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getSnapshotId(),
            $keys[2] => $this->getNonConformanceTypeId(),
            $keys[3] => $this->getNonConformityTypeDetail(),
            $keys[4] => $this->getDescription(),
            $keys[5] => $this->getOpenedAt(),
            $keys[6] => $this->getOpenedBy(),
            $keys[7] => $this->getClosedAt(),
            $keys[8] => $this->getClosedBy(),
            $keys[9] => $this->getCloseComment(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aPersonRelatedByClosedBy) {
                $result['PersonRelatedByClosedBy'] = $this->aPersonRelatedByClosedBy->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPersonRelatedByOpenedBy) {
                $result['PersonRelatedByOpenedBy'] = $this->aPersonRelatedByOpenedBy->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSnapshot) {
                $result['Snapshot'] = $this->aSnapshot->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aNonConformanceType) {
                $result['NonConformanceType'] = $this->aNonConformanceType->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collActions) {
                $result['Actions'] = $this->collActions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = NonConformancePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setNonConformanceTypeId($value);
                break;
            case 3:
                $this->setNonConformityTypeDetail($value);
                break;
            case 4:
                $this->setDescription($value);
                break;
            case 5:
                $this->setOpenedAt($value);
                break;
            case 6:
                $this->setOpenedBy($value);
                break;
            case 7:
                $this->setClosedAt($value);
                break;
            case 8:
                $this->setClosedBy($value);
                break;
            case 9:
                $this->setCloseComment($value);
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
        $keys = NonConformancePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setSnapshotId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setNonConformanceTypeId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setNonConformityTypeDetail($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setDescription($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setOpenedAt($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setOpenedBy($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setClosedAt($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setClosedBy($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setCloseComment($arr[$keys[9]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(NonConformancePeer::DATABASE_NAME);

        if ($this->isColumnModified(NonConformancePeer::ID)) $criteria->add(NonConformancePeer::ID, $this->id);
        if ($this->isColumnModified(NonConformancePeer::SNAPSHOT_ID)) $criteria->add(NonConformancePeer::SNAPSHOT_ID, $this->snapshot_id);
        if ($this->isColumnModified(NonConformancePeer::NON_CONFORMANCE_TYPE_ID)) $criteria->add(NonConformancePeer::NON_CONFORMANCE_TYPE_ID, $this->non_conformance_type_id);
        if ($this->isColumnModified(NonConformancePeer::NON_CONFORMITY_TYPE_DETAIL)) $criteria->add(NonConformancePeer::NON_CONFORMITY_TYPE_DETAIL, $this->non_conformity_type_detail);
        if ($this->isColumnModified(NonConformancePeer::DESCRIPTION)) $criteria->add(NonConformancePeer::DESCRIPTION, $this->description);
        if ($this->isColumnModified(NonConformancePeer::OPENED_AT)) $criteria->add(NonConformancePeer::OPENED_AT, $this->opened_at);
        if ($this->isColumnModified(NonConformancePeer::OPENED_BY)) $criteria->add(NonConformancePeer::OPENED_BY, $this->opened_by);
        if ($this->isColumnModified(NonConformancePeer::CLOSED_AT)) $criteria->add(NonConformancePeer::CLOSED_AT, $this->closed_at);
        if ($this->isColumnModified(NonConformancePeer::CLOSED_BY)) $criteria->add(NonConformancePeer::CLOSED_BY, $this->closed_by);
        if ($this->isColumnModified(NonConformancePeer::CLOSE_COMMENT)) $criteria->add(NonConformancePeer::CLOSE_COMMENT, $this->close_comment);

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
        $criteria = new Criteria(NonConformancePeer::DATABASE_NAME);
        $criteria->add(NonConformancePeer::ID, $this->id);

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
     * @param object $copyObj An object of NonConformance (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSnapshotId($this->getSnapshotId());
        $copyObj->setNonConformanceTypeId($this->getNonConformanceTypeId());
        $copyObj->setNonConformityTypeDetail($this->getNonConformityTypeDetail());
        $copyObj->setDescription($this->getDescription());
        $copyObj->setOpenedAt($this->getOpenedAt());
        $copyObj->setOpenedBy($this->getOpenedBy());
        $copyObj->setClosedAt($this->getClosedAt());
        $copyObj->setClosedBy($this->getClosedBy());
        $copyObj->setCloseComment($this->getCloseComment());

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
     * @return NonConformance Clone of current object.
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
     * @return NonConformancePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new NonConformancePeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Person object.
     *
     * @param             Person $v
     * @return NonConformance The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPersonRelatedByClosedBy(Person $v = null)
    {
        if ($v === null) {
            $this->setClosedBy(NULL);
        } else {
            $this->setClosedBy($v->getId());
        }

        $this->aPersonRelatedByClosedBy = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Person object, it will not be re-added.
        if ($v !== null) {
            $v->addNonConformanceRelatedByClosedBy($this);
        }


        return $this;
    }


    /**
     * Get the associated Person object
     *
     * @param PropelPDO $con Optional Connection object.
     * @return Person The associated Person object.
     * @throws PropelException
     */
    public function getPersonRelatedByClosedBy(PropelPDO $con = null)
    {
        if ($this->aPersonRelatedByClosedBy === null && ($this->closed_by !== null)) {
            $this->aPersonRelatedByClosedBy = PersonQuery::create()->findPk($this->closed_by, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPersonRelatedByClosedBy->addNonConformancesRelatedByClosedBy($this);
             */
        }

        return $this->aPersonRelatedByClosedBy;
    }

    /**
     * Declares an association between this object and a Person object.
     *
     * @param             Person $v
     * @return NonConformance The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPersonRelatedByOpenedBy(Person $v = null)
    {
        if ($v === null) {
            $this->setOpenedBy(NULL);
        } else {
            $this->setOpenedBy($v->getId());
        }

        $this->aPersonRelatedByOpenedBy = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Person object, it will not be re-added.
        if ($v !== null) {
            $v->addNonConformanceRelatedByOpenedBy($this);
        }


        return $this;
    }


    /**
     * Get the associated Person object
     *
     * @param PropelPDO $con Optional Connection object.
     * @return Person The associated Person object.
     * @throws PropelException
     */
    public function getPersonRelatedByOpenedBy(PropelPDO $con = null)
    {
        if ($this->aPersonRelatedByOpenedBy === null && ($this->opened_by !== null)) {
            $this->aPersonRelatedByOpenedBy = PersonQuery::create()->findPk($this->opened_by, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPersonRelatedByOpenedBy->addNonConformancesRelatedByOpenedBy($this);
             */
        }

        return $this->aPersonRelatedByOpenedBy;
    }

    /**
     * Declares an association between this object and a Snapshot object.
     *
     * @param             Snapshot $v
     * @return NonConformance The current object (for fluent API support)
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
            $v->addNonConformance($this);
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
                $this->aSnapshot->addNonConformances($this);
             */
        }

        return $this->aSnapshot;
    }

    /**
     * Declares an association between this object and a NonConformanceType object.
     *
     * @param             NonConformanceType $v
     * @return NonConformance The current object (for fluent API support)
     * @throws PropelException
     */
    public function setNonConformanceType(NonConformanceType $v = null)
    {
        if ($v === null) {
            $this->setNonConformanceTypeId(NULL);
        } else {
            $this->setNonConformanceTypeId($v->getId());
        }

        $this->aNonConformanceType = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the NonConformanceType object, it will not be re-added.
        if ($v !== null) {
            $v->addNonConformance($this);
        }


        return $this;
    }


    /**
     * Get the associated NonConformanceType object
     *
     * @param PropelPDO $con Optional Connection object.
     * @return NonConformanceType The associated NonConformanceType object.
     * @throws PropelException
     */
    public function getNonConformanceType(PropelPDO $con = null)
    {
        if ($this->aNonConformanceType === null && ($this->non_conformance_type_id !== null)) {
            $this->aNonConformanceType = NonConformanceTypeQuery::create()->findPk($this->non_conformance_type_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aNonConformanceType->addNonConformances($this);
             */
        }

        return $this->aNonConformanceType;
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
     * If this NonConformance is new, it will return
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
                    ->filterByNonConformance($this)
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
            $actionRemoved->setNonConformance(null);
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
                    ->filterByNonConformance($this)
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
     * @return NonConformance The current object (for fluent API support)
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
        $action->setNonConformance($this);
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
            $action->setNonConformance(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this NonConformance is new, it will return
     * an empty collection; or if this NonConformance has previously
     * been saved, it will retrieve related Actions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in NonConformance.
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
     * Otherwise if this NonConformance is new, it will return
     * an empty collection; or if this NonConformance has previously
     * been saved, it will retrieve related Actions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in NonConformance.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Action[] List of Action objects
     */
    public function getActionsJoinSnapshot($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ActionQuery::create(null, $criteria);
        $query->joinWith('Snapshot', $join_behavior);

        return $this->getActions($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->snapshot_id = null;
        $this->non_conformance_type_id = null;
        $this->non_conformity_type_detail = null;
        $this->description = null;
        $this->opened_at = null;
        $this->opened_by = null;
        $this->closed_at = null;
        $this->closed_by = null;
        $this->close_comment = null;
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
            if ($this->collActions) {
                foreach ($this->collActions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        if ($this->collActions instanceof PropelCollection) {
            $this->collActions->clearIterator();
        }
        $this->collActions = null;
        $this->aPersonRelatedByClosedBy = null;
        $this->aPersonRelatedByOpenedBy = null;
        $this->aSnapshot = null;
        $this->aNonConformanceType = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(NonConformancePeer::DEFAULT_STRING_FORMAT);
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
