<?php


/**
 * Base class that represents a row from the 'action' table.
 *
 *
 *
 * @package    propel.generator.atica.om
 */
abstract class BaseAction extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ActionPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ActionPeer
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
     * The value for the action_type_id field.
     * @var        int
     */
    protected $action_type_id;

    /**
     * The value for the non_conformance_id field.
     * @var        int
     */
    protected $non_conformance_id;

    /**
     * The value for the action_left field.
     * @var        int
     */
    protected $action_left;

    /**
     * The value for the action_right field.
     * @var        int
     */
    protected $action_right;

    /**
     * The value for the action_level field.
     * @var        int
     */
    protected $action_level;

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
     * The value for the check_due field.
     * @var        string
     */
    protected $check_due;

    /**
     * The value for the checked_at field.
     * @var        string
     */
    protected $checked_at;

    /**
     * The value for the result field.
     * @var        int
     */
    protected $result;

    /**
     * The value for the result_description field.
     * @var        string
     */
    protected $result_description;

    /**
     * @var        ActionType
     */
    protected $aActionType;

    /**
     * @var        NonConformance
     */
    protected $aNonConformance;

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

    // nested_set behavior

    /**
     * Queries to be executed in the save transaction
     * @var        array
     */
    protected $nestedSetQueries = array();

    /**
     * Internal cache for children nodes
     * @var        null|PropelObjectCollection
     */
    protected $collNestedSetChildren = null;

    /**
     * Internal cache for parent node
     * @var        null|Action
     */
    protected $aNestedSetParent = null;


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
     * Get the [action_type_id] column value.
     *
     * @return int
     */
    public function getActionTypeId()
    {
        return $this->action_type_id;
    }

    /**
     * Get the [non_conformance_id] column value.
     *
     * @return int
     */
    public function getNonConformanceId()
    {
        return $this->non_conformance_id;
    }

    /**
     * Get the [action_left] column value.
     *
     * @return int
     */
    public function getActionLeft()
    {
        return $this->action_left;
    }

    /**
     * Get the [action_right] column value.
     *
     * @return int
     */
    public function getActionRight()
    {
        return $this->action_right;
    }

    /**
     * Get the [action_level] column value.
     *
     * @return int
     */
    public function getActionLevel()
    {
        return $this->action_level;
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
     * Get the [optionally formatted] temporal [check_due] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCheckDue($format = '%x')
    {
        if ($this->check_due === null) {
            return null;
        }

        if ($this->check_due === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        } else {
            try {
                $dt = new DateTime($this->check_due);
            } catch (Exception $x) {
                throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->check_due, true), $x);
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
     * Get the [optionally formatted] temporal [checked_at] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCheckedAt($format = '%x')
    {
        if ($this->checked_at === null) {
            return null;
        }

        if ($this->checked_at === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        } else {
            try {
                $dt = new DateTime($this->checked_at);
            } catch (Exception $x) {
                throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->checked_at, true), $x);
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
     * Get the [result] column value.
     *
     * @return int
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Get the [result_description] column value.
     *
     * @return string
     */
    public function getResultDescription()
    {
        return $this->result_description;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Action The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = ActionPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [snapshot_id] column.
     *
     * @param int $v new value
     * @return Action The current object (for fluent API support)
     */
    public function setSnapshotId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->snapshot_id !== $v) {
            $this->snapshot_id = $v;
            $this->modifiedColumns[] = ActionPeer::SNAPSHOT_ID;
        }

        if ($this->aSnapshot !== null && $this->aSnapshot->getId() !== $v) {
            $this->aSnapshot = null;
        }


        return $this;
    } // setSnapshotId()

    /**
     * Set the value of [action_type_id] column.
     *
     * @param int $v new value
     * @return Action The current object (for fluent API support)
     */
    public function setActionTypeId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->action_type_id !== $v) {
            $this->action_type_id = $v;
            $this->modifiedColumns[] = ActionPeer::ACTION_TYPE_ID;
        }

        if ($this->aActionType !== null && $this->aActionType->getId() !== $v) {
            $this->aActionType = null;
        }


        return $this;
    } // setActionTypeId()

    /**
     * Set the value of [non_conformance_id] column.
     *
     * @param int $v new value
     * @return Action The current object (for fluent API support)
     */
    public function setNonConformanceId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->non_conformance_id !== $v) {
            $this->non_conformance_id = $v;
            $this->modifiedColumns[] = ActionPeer::NON_CONFORMANCE_ID;
        }

        if ($this->aNonConformance !== null && $this->aNonConformance->getId() !== $v) {
            $this->aNonConformance = null;
        }


        return $this;
    } // setNonConformanceId()

    /**
     * Set the value of [action_left] column.
     *
     * @param int $v new value
     * @return Action The current object (for fluent API support)
     */
    public function setActionLeft($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->action_left !== $v) {
            $this->action_left = $v;
            $this->modifiedColumns[] = ActionPeer::ACTION_LEFT;
        }


        return $this;
    } // setActionLeft()

    /**
     * Set the value of [action_right] column.
     *
     * @param int $v new value
     * @return Action The current object (for fluent API support)
     */
    public function setActionRight($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->action_right !== $v) {
            $this->action_right = $v;
            $this->modifiedColumns[] = ActionPeer::ACTION_RIGHT;
        }


        return $this;
    } // setActionRight()

    /**
     * Set the value of [action_level] column.
     *
     * @param int $v new value
     * @return Action The current object (for fluent API support)
     */
    public function setActionLevel($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->action_level !== $v) {
            $this->action_level = $v;
            $this->modifiedColumns[] = ActionPeer::ACTION_LEVEL;
        }


        return $this;
    } // setActionLevel()

    /**
     * Set the value of [display_name] column.
     *
     * @param string $v new value
     * @return Action The current object (for fluent API support)
     */
    public function setDisplayName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->display_name !== $v) {
            $this->display_name = $v;
            $this->modifiedColumns[] = ActionPeer::DISPLAY_NAME;
        }


        return $this;
    } // setDisplayName()

    /**
     * Set the value of [description] column.
     *
     * @param string $v new value
     * @return Action The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[] = ActionPeer::DESCRIPTION;
        }


        return $this;
    } // setDescription()

    /**
     * Sets the value of [check_due] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Action The current object (for fluent API support)
     */
    public function setCheckDue($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->check_due !== null || $dt !== null) {
            $currentDateAsString = ($this->check_due !== null && $tmpDt = new DateTime($this->check_due)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->check_due = $newDateAsString;
                $this->modifiedColumns[] = ActionPeer::CHECK_DUE;
            }
        } // if either are not null


        return $this;
    } // setCheckDue()

    /**
     * Sets the value of [checked_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Action The current object (for fluent API support)
     */
    public function setCheckedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->checked_at !== null || $dt !== null) {
            $currentDateAsString = ($this->checked_at !== null && $tmpDt = new DateTime($this->checked_at)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->checked_at = $newDateAsString;
                $this->modifiedColumns[] = ActionPeer::CHECKED_AT;
            }
        } // if either are not null


        return $this;
    } // setCheckedAt()

    /**
     * Set the value of [result] column.
     *
     * @param int $v new value
     * @return Action The current object (for fluent API support)
     */
    public function setResult($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->result !== $v) {
            $this->result = $v;
            $this->modifiedColumns[] = ActionPeer::RESULT;
        }


        return $this;
    } // setResult()

    /**
     * Set the value of [result_description] column.
     *
     * @param string $v new value
     * @return Action The current object (for fluent API support)
     */
    public function setResultDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->result_description !== $v) {
            $this->result_description = $v;
            $this->modifiedColumns[] = ActionPeer::RESULT_DESCRIPTION;
        }


        return $this;
    } // setResultDescription()

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
            $this->action_type_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->non_conformance_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->action_left = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->action_right = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->action_level = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->display_name = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->description = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->check_due = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->checked_at = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->result = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
            $this->result_description = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 13; // 13 = ActionPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Action object", $e);
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
        if ($this->aActionType !== null && $this->action_type_id !== $this->aActionType->getId()) {
            $this->aActionType = null;
        }
        if ($this->aNonConformance !== null && $this->non_conformance_id !== $this->aNonConformance->getId()) {
            $this->aNonConformance = null;
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
            $con = Propel::getConnection(ActionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ActionPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aActionType = null;
            $this->aNonConformance = null;
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
            $con = Propel::getConnection(ActionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ActionQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            // nested_set behavior
            if ($this->isRoot()) {
                throw new PropelException('Deletion of a root node is disabled for nested sets. Use ActionPeer::deleteTree($scope) instead to delete an entire tree');
            }

            if ($this->isInTree()) {
                $this->deleteDescendants($con);
            }

            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                // nested_set behavior
                if ($this->isInTree()) {
                    // fill up the room that was used by the node
                    ActionPeer::shiftRLValues(-2, $this->getRightValue() + 1, null, $this->getScopeValue(), $con);
                }

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
            $con = Propel::getConnection(ActionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            // nested_set behavior
            if ($this->isNew() && $this->isRoot()) {
                // check if no other root exist in, the tree
                $nbRoots = ActionQuery::create()
                    ->addUsingAlias(ActionPeer::LEFT_COL, 1, Criteria::EQUAL)
                    ->addUsingAlias(ActionPeer::SCOPE_COL, $this->getScopeValue(), Criteria::EQUAL)
                    ->count($con);
                if ($nbRoots > 0) {
                        throw new PropelException(sprintf('A root node already exists in this tree with scope "%s".', $this->getScopeValue()));
                }
            }
            $this->processNestedSetQueries($con);
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
                ActionPeer::addInstanceToPool($this);
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

            if ($this->aActionType !== null) {
                if ($this->aActionType->isModified() || $this->aActionType->isNew()) {
                    $affectedRows += $this->aActionType->save($con);
                }
                $this->setActionType($this->aActionType);
            }

            if ($this->aNonConformance !== null) {
                if ($this->aNonConformance->isModified() || $this->aNonConformance->isNew()) {
                    $affectedRows += $this->aNonConformance->save($con);
                }
                $this->setNonConformance($this->aNonConformance);
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

        $this->modifiedColumns[] = ActionPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ActionPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ActionPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`ID`';
        }
        if ($this->isColumnModified(ActionPeer::SNAPSHOT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`SNAPSHOT_ID`';
        }
        if ($this->isColumnModified(ActionPeer::ACTION_TYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`ACTION_TYPE_ID`';
        }
        if ($this->isColumnModified(ActionPeer::NON_CONFORMANCE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`NON_CONFORMANCE_ID`';
        }
        if ($this->isColumnModified(ActionPeer::ACTION_LEFT)) {
            $modifiedColumns[':p' . $index++]  = '`ACTION_LEFT`';
        }
        if ($this->isColumnModified(ActionPeer::ACTION_RIGHT)) {
            $modifiedColumns[':p' . $index++]  = '`ACTION_RIGHT`';
        }
        if ($this->isColumnModified(ActionPeer::ACTION_LEVEL)) {
            $modifiedColumns[':p' . $index++]  = '`ACTION_LEVEL`';
        }
        if ($this->isColumnModified(ActionPeer::DISPLAY_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`DISPLAY_NAME`';
        }
        if ($this->isColumnModified(ActionPeer::DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`DESCRIPTION`';
        }
        if ($this->isColumnModified(ActionPeer::CHECK_DUE)) {
            $modifiedColumns[':p' . $index++]  = '`CHECK_DUE`';
        }
        if ($this->isColumnModified(ActionPeer::CHECKED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`CHECKED_AT`';
        }
        if ($this->isColumnModified(ActionPeer::RESULT)) {
            $modifiedColumns[':p' . $index++]  = '`RESULT`';
        }
        if ($this->isColumnModified(ActionPeer::RESULT_DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`RESULT_DESCRIPTION`';
        }

        $sql = sprintf(
            'INSERT INTO `action` (%s) VALUES (%s)',
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
                    case '`ACTION_TYPE_ID`':
                        $stmt->bindValue($identifier, $this->action_type_id, PDO::PARAM_INT);
                        break;
                    case '`NON_CONFORMANCE_ID`':
                        $stmt->bindValue($identifier, $this->non_conformance_id, PDO::PARAM_INT);
                        break;
                    case '`ACTION_LEFT`':
                        $stmt->bindValue($identifier, $this->action_left, PDO::PARAM_INT);
                        break;
                    case '`ACTION_RIGHT`':
                        $stmt->bindValue($identifier, $this->action_right, PDO::PARAM_INT);
                        break;
                    case '`ACTION_LEVEL`':
                        $stmt->bindValue($identifier, $this->action_level, PDO::PARAM_INT);
                        break;
                    case '`DISPLAY_NAME`':
                        $stmt->bindValue($identifier, $this->display_name, PDO::PARAM_STR);
                        break;
                    case '`DESCRIPTION`':
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
                        break;
                    case '`CHECK_DUE`':
                        $stmt->bindValue($identifier, $this->check_due, PDO::PARAM_STR);
                        break;
                    case '`CHECKED_AT`':
                        $stmt->bindValue($identifier, $this->checked_at, PDO::PARAM_STR);
                        break;
                    case '`RESULT`':
                        $stmt->bindValue($identifier, $this->result, PDO::PARAM_INT);
                        break;
                    case '`RESULT_DESCRIPTION`':
                        $stmt->bindValue($identifier, $this->result_description, PDO::PARAM_STR);
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

            if ($this->aActionType !== null) {
                if (!$this->aActionType->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aActionType->getValidationFailures());
                }
            }

            if ($this->aNonConformance !== null) {
                if (!$this->aNonConformance->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aNonConformance->getValidationFailures());
                }
            }

            if ($this->aSnapshot !== null) {
                if (!$this->aSnapshot->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSnapshot->getValidationFailures());
                }
            }


            if (($retval = ActionPeer::doValidate($this, $columns)) !== true) {
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
        $pos = ActionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getActionTypeId();
                break;
            case 3:
                return $this->getNonConformanceId();
                break;
            case 4:
                return $this->getActionLeft();
                break;
            case 5:
                return $this->getActionRight();
                break;
            case 6:
                return $this->getActionLevel();
                break;
            case 7:
                return $this->getDisplayName();
                break;
            case 8:
                return $this->getDescription();
                break;
            case 9:
                return $this->getCheckDue();
                break;
            case 10:
                return $this->getCheckedAt();
                break;
            case 11:
                return $this->getResult();
                break;
            case 12:
                return $this->getResultDescription();
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
        if (isset($alreadyDumpedObjects['Action'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Action'][$this->getPrimaryKey()] = true;
        $keys = ActionPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getSnapshotId(),
            $keys[2] => $this->getActionTypeId(),
            $keys[3] => $this->getNonConformanceId(),
            $keys[4] => $this->getActionLeft(),
            $keys[5] => $this->getActionRight(),
            $keys[6] => $this->getActionLevel(),
            $keys[7] => $this->getDisplayName(),
            $keys[8] => $this->getDescription(),
            $keys[9] => $this->getCheckDue(),
            $keys[10] => $this->getCheckedAt(),
            $keys[11] => $this->getResult(),
            $keys[12] => $this->getResultDescription(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aActionType) {
                $result['ActionType'] = $this->aActionType->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aNonConformance) {
                $result['NonConformance'] = $this->aNonConformance->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = ActionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setActionTypeId($value);
                break;
            case 3:
                $this->setNonConformanceId($value);
                break;
            case 4:
                $this->setActionLeft($value);
                break;
            case 5:
                $this->setActionRight($value);
                break;
            case 6:
                $this->setActionLevel($value);
                break;
            case 7:
                $this->setDisplayName($value);
                break;
            case 8:
                $this->setDescription($value);
                break;
            case 9:
                $this->setCheckDue($value);
                break;
            case 10:
                $this->setCheckedAt($value);
                break;
            case 11:
                $this->setResult($value);
                break;
            case 12:
                $this->setResultDescription($value);
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
        $keys = ActionPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setSnapshotId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setActionTypeId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setNonConformanceId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setActionLeft($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setActionRight($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setActionLevel($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setDisplayName($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setDescription($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setCheckDue($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setCheckedAt($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setResult($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setResultDescription($arr[$keys[12]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ActionPeer::DATABASE_NAME);

        if ($this->isColumnModified(ActionPeer::ID)) $criteria->add(ActionPeer::ID, $this->id);
        if ($this->isColumnModified(ActionPeer::SNAPSHOT_ID)) $criteria->add(ActionPeer::SNAPSHOT_ID, $this->snapshot_id);
        if ($this->isColumnModified(ActionPeer::ACTION_TYPE_ID)) $criteria->add(ActionPeer::ACTION_TYPE_ID, $this->action_type_id);
        if ($this->isColumnModified(ActionPeer::NON_CONFORMANCE_ID)) $criteria->add(ActionPeer::NON_CONFORMANCE_ID, $this->non_conformance_id);
        if ($this->isColumnModified(ActionPeer::ACTION_LEFT)) $criteria->add(ActionPeer::ACTION_LEFT, $this->action_left);
        if ($this->isColumnModified(ActionPeer::ACTION_RIGHT)) $criteria->add(ActionPeer::ACTION_RIGHT, $this->action_right);
        if ($this->isColumnModified(ActionPeer::ACTION_LEVEL)) $criteria->add(ActionPeer::ACTION_LEVEL, $this->action_level);
        if ($this->isColumnModified(ActionPeer::DISPLAY_NAME)) $criteria->add(ActionPeer::DISPLAY_NAME, $this->display_name);
        if ($this->isColumnModified(ActionPeer::DESCRIPTION)) $criteria->add(ActionPeer::DESCRIPTION, $this->description);
        if ($this->isColumnModified(ActionPeer::CHECK_DUE)) $criteria->add(ActionPeer::CHECK_DUE, $this->check_due);
        if ($this->isColumnModified(ActionPeer::CHECKED_AT)) $criteria->add(ActionPeer::CHECKED_AT, $this->checked_at);
        if ($this->isColumnModified(ActionPeer::RESULT)) $criteria->add(ActionPeer::RESULT, $this->result);
        if ($this->isColumnModified(ActionPeer::RESULT_DESCRIPTION)) $criteria->add(ActionPeer::RESULT_DESCRIPTION, $this->result_description);

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
        $criteria = new Criteria(ActionPeer::DATABASE_NAME);
        $criteria->add(ActionPeer::ID, $this->id);

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
     * @param object $copyObj An object of Action (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSnapshotId($this->getSnapshotId());
        $copyObj->setActionTypeId($this->getActionTypeId());
        $copyObj->setNonConformanceId($this->getNonConformanceId());
        $copyObj->setActionLeft($this->getActionLeft());
        $copyObj->setActionRight($this->getActionRight());
        $copyObj->setActionLevel($this->getActionLevel());
        $copyObj->setDisplayName($this->getDisplayName());
        $copyObj->setDescription($this->getDescription());
        $copyObj->setCheckDue($this->getCheckDue());
        $copyObj->setCheckedAt($this->getCheckedAt());
        $copyObj->setResult($this->getResult());
        $copyObj->setResultDescription($this->getResultDescription());

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
     * @return Action Clone of current object.
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
     * @return ActionPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ActionPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a ActionType object.
     *
     * @param             ActionType $v
     * @return Action The current object (for fluent API support)
     * @throws PropelException
     */
    public function setActionType(ActionType $v = null)
    {
        if ($v === null) {
            $this->setActionTypeId(NULL);
        } else {
            $this->setActionTypeId($v->getId());
        }

        $this->aActionType = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ActionType object, it will not be re-added.
        if ($v !== null) {
            $v->addAction($this);
        }


        return $this;
    }


    /**
     * Get the associated ActionType object
     *
     * @param PropelPDO $con Optional Connection object.
     * @return ActionType The associated ActionType object.
     * @throws PropelException
     */
    public function getActionType(PropelPDO $con = null)
    {
        if ($this->aActionType === null && ($this->action_type_id !== null)) {
            $this->aActionType = ActionTypeQuery::create()->findPk($this->action_type_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aActionType->addActions($this);
             */
        }

        return $this->aActionType;
    }

    /**
     * Declares an association between this object and a NonConformance object.
     *
     * @param             NonConformance $v
     * @return Action The current object (for fluent API support)
     * @throws PropelException
     */
    public function setNonConformance(NonConformance $v = null)
    {
        if ($v === null) {
            $this->setNonConformanceId(NULL);
        } else {
            $this->setNonConformanceId($v->getId());
        }

        $this->aNonConformance = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the NonConformance object, it will not be re-added.
        if ($v !== null) {
            $v->addAction($this);
        }


        return $this;
    }


    /**
     * Get the associated NonConformance object
     *
     * @param PropelPDO $con Optional Connection object.
     * @return NonConformance The associated NonConformance object.
     * @throws PropelException
     */
    public function getNonConformance(PropelPDO $con = null)
    {
        if ($this->aNonConformance === null && ($this->non_conformance_id !== null)) {
            $this->aNonConformance = NonConformanceQuery::create()->findPk($this->non_conformance_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aNonConformance->addActions($this);
             */
        }

        return $this->aNonConformance;
    }

    /**
     * Declares an association between this object and a Snapshot object.
     *
     * @param             Snapshot $v
     * @return Action The current object (for fluent API support)
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
            $v->addAction($this);
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
                $this->aSnapshot->addActions($this);
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
        $this->snapshot_id = null;
        $this->action_type_id = null;
        $this->non_conformance_id = null;
        $this->action_left = null;
        $this->action_right = null;
        $this->action_level = null;
        $this->display_name = null;
        $this->description = null;
        $this->check_due = null;
        $this->checked_at = null;
        $this->result = null;
        $this->result_description = null;
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
        } // if ($deep)

        // nested_set behavior
        $this->collNestedSetChildren = null;
        $this->aNestedSetParent = null;
        $this->aActionType = null;
        $this->aNonConformance = null;
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

    // nested_set behavior

    /**
     * Execute queries that were saved to be run inside the save transaction
     */
    protected function processNestedSetQueries($con)
    {
        foreach ($this->nestedSetQueries as $query) {
            $query['arguments'][]= $con;
            call_user_func_array($query['callable'], $query['arguments']);
        }
        $this->nestedSetQueries = array();
    }

    /**
     * Proxy getter method for the left value of the nested set model.
     * It provides a generic way to get the value, whatever the actual column name is.
     *
     * @return     int The nested set left value
     */
    public function getLeftValue()
    {
        return $this->action_left;
    }

    /**
     * Proxy getter method for the right value of the nested set model.
     * It provides a generic way to get the value, whatever the actual column name is.
     *
     * @return     int The nested set right value
     */
    public function getRightValue()
    {
        return $this->action_right;
    }

    /**
     * Proxy getter method for the level value of the nested set model.
     * It provides a generic way to get the value, whatever the actual column name is.
     *
     * @return     int The nested set level value
     */
    public function getLevel()
    {
        return $this->action_level;
    }

    /**
     * Proxy getter method for the scope value of the nested set model.
     * It provides a generic way to get the value, whatever the actual column name is.
     *
     * @return     int The nested set scope value
     */
    public function getScopeValue()
    {
        return $this->snapshot_id;
    }

    /**
     * Proxy setter method for the left value of the nested set model.
     * It provides a generic way to set the value, whatever the actual column name is.
     *
     * @param      int $v The nested set left value
     * @return     Action The current object (for fluent API support)
     */
    public function setLeftValue($v)
    {
        return $this->setActionLeft($v);
    }

    /**
     * Proxy setter method for the right value of the nested set model.
     * It provides a generic way to set the value, whatever the actual column name is.
     *
     * @param      int $v The nested set right value
     * @return     Action The current object (for fluent API support)
     */
    public function setRightValue($v)
    {
        return $this->setActionRight($v);
    }

    /**
     * Proxy setter method for the level value of the nested set model.
     * It provides a generic way to set the value, whatever the actual column name is.
     *
     * @param      int $v The nested set level value
     * @return     Action The current object (for fluent API support)
     */
    public function setLevel($v)
    {
        return $this->setActionLevel($v);
    }

    /**
     * Proxy setter method for the scope value of the nested set model.
     * It provides a generic way to set the value, whatever the actual column name is.
     *
     * @param      int $v The nested set scope value
     * @return     Action The current object (for fluent API support)
     */
    public function setScopeValue($v)
    {
        return $this->setSnapshotId($v);
    }

    /**
     * Creates the supplied node as the root node.
     *
     * @return     Action The current object (for fluent API support)
     * @throws     PropelException
     */
    public function makeRoot()
    {
        if ($this->getLeftValue() || $this->getRightValue()) {
            throw new PropelException('Cannot turn an existing node into a root node.');
        }

        $this->setLeftValue(1);
        $this->setRightValue(2);
        $this->setLevel(0);

        return $this;
    }

    /**
     * Tests if onbject is a node, i.e. if it is inserted in the tree
     *
     * @return     bool
     */
    public function isInTree()
    {
        return $this->getLeftValue() > 0 && $this->getRightValue() > $this->getLeftValue();
    }

    /**
     * Tests if node is a root
     *
     * @return     bool
     */
    public function isRoot()
    {
        return $this->isInTree() && $this->getLeftValue() == 1;
    }

    /**
     * Tests if node is a leaf
     *
     * @return     bool
     */
    public function isLeaf()
    {
        return $this->isInTree() &&  ($this->getRightValue() - $this->getLeftValue()) == 1;
    }

    /**
     * Tests if node is a descendant of another node
     *
     * @param      Action $node Propel node object
     * @return     bool
     */
    public function isDescendantOf($parent)
    {
        if ($this->getScopeValue() !== $parent->getScopeValue()) {
            throw new PropelException('Comparing two nodes of different trees');
        }

        return $this->isInTree() && $this->getLeftValue() > $parent->getLeftValue() && $this->getRightValue() < $parent->getRightValue();
    }

    /**
     * Tests if node is a ancestor of another node
     *
     * @param      Action $node Propel node object
     * @return     bool
     */
    public function isAncestorOf($child)
    {
        return $child->isDescendantOf($this);
    }

    /**
     * Tests if object has an ancestor
     *
     * @param      PropelPDO $con Connection to use.
     * @return     bool
     */
    public function hasParent(PropelPDO $con = null)
    {
        return $this->getLevel() > 0;
    }

    /**
     * Sets the cache for parent node of the current object.
     * Warning: this does not move the current object in the tree.
     * Use moveTofirstChildOf() or moveToLastChildOf() for that purpose
     *
     * @param      Action $parent
     * @return     Action The current object, for fluid interface
     */
    public function setParent($parent = null)
    {
        $this->aNestedSetParent = $parent;

        return $this;
    }

    /**
     * Gets parent node for the current object if it exists
     * The result is cached so further calls to the same method don't issue any queries
     *
     * @param      PropelPDO $con Connection to use.
     * @return     mixed 		Propel object if exists else false
     */
    public function getParent(PropelPDO $con = null)
    {
        if ($this->aNestedSetParent === null && $this->hasParent()) {
            $this->aNestedSetParent = ActionQuery::create()
                ->ancestorsOf($this)
                ->orderByLevel(true)
                ->findOne($con);
        }

        return $this->aNestedSetParent;
    }

    /**
     * Determines if the node has previous sibling
     *
     * @param      PropelPDO $con Connection to use.
     * @return     bool
     */
    public function hasPrevSibling(PropelPDO $con = null)
    {
        if (!ActionPeer::isValid($this)) {
            return false;
        }

        return ActionQuery::create()
            ->filterByActionRight($this->getLeftValue() - 1)
            ->inTree($this->getScopeValue())
            ->count($con) > 0;
    }

    /**
     * Gets previous sibling for the given node if it exists
     *
     * @param      PropelPDO $con Connection to use.
     * @return     mixed 		Propel object if exists else false
     */
    public function getPrevSibling(PropelPDO $con = null)
    {
        return ActionQuery::create()
            ->filterByActionRight($this->getLeftValue() - 1)
            ->inTree($this->getScopeValue())
            ->findOne($con);
    }

    /**
     * Determines if the node has next sibling
     *
     * @param      PropelPDO $con Connection to use.
     * @return     bool
     */
    public function hasNextSibling(PropelPDO $con = null)
    {
        if (!ActionPeer::isValid($this)) {
            return false;
        }

        return ActionQuery::create()
            ->filterByActionLeft($this->getRightValue() + 1)
            ->inTree($this->getScopeValue())
            ->count($con) > 0;
    }

    /**
     * Gets next sibling for the given node if it exists
     *
     * @param      PropelPDO $con Connection to use.
     * @return     mixed 		Propel object if exists else false
     */
    public function getNextSibling(PropelPDO $con = null)
    {
        return ActionQuery::create()
            ->filterByActionLeft($this->getRightValue() + 1)
            ->inTree($this->getScopeValue())
            ->findOne($con);
    }

    /**
     * Clears out the $collNestedSetChildren collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return     void
     */
    public function clearNestedSetChildren()
    {
        $this->collNestedSetChildren = null;
    }

    /**
     * Initializes the $collNestedSetChildren collection.
     *
     * @return     void
     */
    public function initNestedSetChildren()
    {
        $this->collNestedSetChildren = new PropelObjectCollection();
        $this->collNestedSetChildren->setModel('Action');
    }

    /**
     * Adds an element to the internal $collNestedSetChildren collection.
     * Beware that this doesn't insert a node in the tree.
     * This method is only used to facilitate children hydration.
     *
     * @param      Action $action
     *
     * @return     void
     */
    public function addNestedSetChild($action)
    {
        if ($this->collNestedSetChildren === null) {
            $this->initNestedSetChildren();
        }
        if (!in_array($action, $this->collNestedSetChildren->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->collNestedSetChildren[]= $action;
            $action->setParent($this);
        }
    }

    /**
     * Tests if node has children
     *
     * @return     bool
     */
    public function hasChildren()
    {
        return ($this->getRightValue() - $this->getLeftValue()) > 1;
    }

    /**
     * Gets the children of the given node
     *
     * @param      Criteria  $criteria Criteria to filter results.
     * @param      PropelPDO $con Connection to use.
     * @return     array     List of Action objects
     */
    public function getChildren($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collNestedSetChildren || null !== $criteria) {
            if ($this->isLeaf() || ($this->isNew() && null === $this->collNestedSetChildren)) {
                // return empty collection
                $this->initNestedSetChildren();
            } else {
                $collNestedSetChildren = ActionQuery::create(null, $criteria)
                  ->childrenOf($this)
                  ->orderByBranch()
                    ->find($con);
                if (null !== $criteria) {
                    return $collNestedSetChildren;
                }
                $this->collNestedSetChildren = $collNestedSetChildren;
            }
        }

        return $this->collNestedSetChildren;
    }

    /**
     * Gets number of children for the given node
     *
     * @param      Criteria  $criteria Criteria to filter results.
     * @param      PropelPDO $con Connection to use.
     * @return     int       Number of children
     */
    public function countChildren($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collNestedSetChildren || null !== $criteria) {
            if ($this->isLeaf() || ($this->isNew() && null === $this->collNestedSetChildren)) {
                return 0;
            } else {
                return ActionQuery::create(null, $criteria)
                    ->childrenOf($this)
                    ->count($con);
            }
        } else {
            return count($this->collNestedSetChildren);
        }
    }

    /**
     * Gets the first child of the given node
     *
     * @param      Criteria $query Criteria to filter results.
     * @param      PropelPDO $con Connection to use.
     * @return     array 		List of Action objects
     */
    public function getFirstChild($query = null, PropelPDO $con = null)
    {
        if ($this->isLeaf()) {
            return array();
        } else {
            return ActionQuery::create(null, $query)
                ->childrenOf($this)
                ->orderByBranch()
                ->findOne($con);
        }
    }

    /**
     * Gets the last child of the given node
     *
     * @param      Criteria $query Criteria to filter results.
     * @param      PropelPDO $con Connection to use.
     * @return     array 		List of Action objects
     */
    public function getLastChild($query = null, PropelPDO $con = null)
    {
        if ($this->isLeaf()) {
            return array();
        } else {
            return ActionQuery::create(null, $query)
                ->childrenOf($this)
                ->orderByBranch(true)
                ->findOne($con);
        }
    }

    /**
     * Gets the siblings of the given node
     *
     * @param      bool			$includeNode Whether to include the current node or not
     * @param      Criteria $query Criteria to filter results.
     * @param      PropelPDO $con Connection to use.
     *
     * @return     array 		List of Action objects
     */
    public function getSiblings($includeNode = false, $query = null, PropelPDO $con = null)
    {
        if ($this->isRoot()) {
            return array();
        } else {
             $query = ActionQuery::create(null, $query)
                    ->childrenOf($this->getParent($con))
                    ->orderByBranch();
            if (!$includeNode) {
                $query->prune($this);
            }

            return $query->find($con);
        }
    }

    /**
     * Gets descendants for the given node
     *
     * @param      Criteria $query Criteria to filter results.
     * @param      PropelPDO $con Connection to use.
     * @return     array 		List of Action objects
     */
    public function getDescendants($query = null, PropelPDO $con = null)
    {
        if ($this->isLeaf()) {
            return array();
        } else {
            return ActionQuery::create(null, $query)
                ->descendantsOf($this)
                ->orderByBranch()
                ->find($con);
        }
    }

    /**
     * Gets number of descendants for the given node
     *
     * @param      Criteria $query Criteria to filter results.
     * @param      PropelPDO $con Connection to use.
     * @return     int 		Number of descendants
     */
    public function countDescendants($query = null, PropelPDO $con = null)
    {
        if ($this->isLeaf()) {
            // save one query
            return 0;
        } else {
            return ActionQuery::create(null, $query)
                ->descendantsOf($this)
                ->count($con);
        }
    }

    /**
     * Gets descendants for the given node, plus the current node
     *
     * @param      Criteria $query Criteria to filter results.
     * @param      PropelPDO $con Connection to use.
     * @return     array 		List of Action objects
     */
    public function getBranch($query = null, PropelPDO $con = null)
    {
        return ActionQuery::create(null, $query)
            ->branchOf($this)
            ->orderByBranch()
            ->find($con);
    }

    /**
     * Gets ancestors for the given node, starting with the root node
     * Use it for breadcrumb paths for instance
     *
     * @param      Criteria $query Criteria to filter results.
     * @param      PropelPDO $con Connection to use.
     * @return     array 		List of Action objects
     */
    public function getAncestors($query = null, PropelPDO $con = null)
    {
        if ($this->isRoot()) {
            // save one query
            return array();
        } else {
            return ActionQuery::create(null, $query)
                ->ancestorsOf($this)
                ->orderByBranch()
                ->find($con);
        }
    }

    /**
     * Inserts the given $child node as first child of current
     * The modifications in the current object and the tree
     * are not persisted until the child object is saved.
     *
     * @param      Action $child	Propel object for child node
     *
     * @return     Action The current Propel object
     */
    public function addChild(Action $child)
    {
        if ($this->isNew()) {
            throw new PropelException('A Action object must not be new to accept children.');
        }
        $child->insertAsFirstChildOf($this);

        return $this;
    }

    /**
     * Inserts the current node as first child of given $parent node
     * The modifications in the current object and the tree
     * are not persisted until the current object is saved.
     *
     * @param      Action $parent	Propel object for parent node
     *
     * @return     Action The current Propel object
     */
    public function insertAsFirstChildOf($parent)
    {
        if ($this->isInTree()) {
            throw new PropelException('A Action object must not already be in the tree to be inserted. Use the moveToFirstChildOf() instead.');
        }
        $left = $parent->getLeftValue() + 1;
        // Update node properties
        $this->setLeftValue($left);
        $this->setRightValue($left + 1);
        $this->setLevel($parent->getLevel() + 1);
        $scope = $parent->getScopeValue();
        $this->setScopeValue($scope);
        // update the children collection of the parent
        $parent->addNestedSetChild($this);

        // Keep the tree modification query for the save() transaction
        $this->nestedSetQueries []= array(
            'callable'  => array('ActionPeer', 'makeRoomForLeaf'),
            'arguments' => array($left, $scope, $this->isNew() ? null : $this)
        );

        return $this;
    }

    /**
     * Inserts the current node as last child of given $parent node
     * The modifications in the current object and the tree
     * are not persisted until the current object is saved.
     *
     * @param      Action $parent	Propel object for parent node
     *
     * @return     Action The current Propel object
     */
    public function insertAsLastChildOf($parent)
    {
        if ($this->isInTree()) {
            throw new PropelException('A Action object must not already be in the tree to be inserted. Use the moveToLastChildOf() instead.');
        }
        $left = $parent->getRightValue();
        // Update node properties
        $this->setLeftValue($left);
        $this->setRightValue($left + 1);
        $this->setLevel($parent->getLevel() + 1);
        $scope = $parent->getScopeValue();
        $this->setScopeValue($scope);
        // update the children collection of the parent
        $parent->addNestedSetChild($this);

        // Keep the tree modification query for the save() transaction
        $this->nestedSetQueries []= array(
            'callable'  => array('ActionPeer', 'makeRoomForLeaf'),
            'arguments' => array($left, $scope, $this->isNew() ? null : $this)
        );

        return $this;
    }

    /**
     * Inserts the current node as prev sibling given $sibling node
     * The modifications in the current object and the tree
     * are not persisted until the current object is saved.
     *
     * @param      Action $sibling	Propel object for parent node
     *
     * @return     Action The current Propel object
     */
    public function insertAsPrevSiblingOf($sibling)
    {
        if ($this->isInTree()) {
            throw new PropelException('A Action object must not already be in the tree to be inserted. Use the moveToPrevSiblingOf() instead.');
        }
        $left = $sibling->getLeftValue();
        // Update node properties
        $this->setLeftValue($left);
        $this->setRightValue($left + 1);
        $this->setLevel($sibling->getLevel());
        $scope = $sibling->getScopeValue();
        $this->setScopeValue($scope);
        // Keep the tree modification query for the save() transaction
        $this->nestedSetQueries []= array(
            'callable'  => array('ActionPeer', 'makeRoomForLeaf'),
            'arguments' => array($left, $scope, $this->isNew() ? null : $this)
        );

        return $this;
    }

    /**
     * Inserts the current node as next sibling given $sibling node
     * The modifications in the current object and the tree
     * are not persisted until the current object is saved.
     *
     * @param      Action $sibling	Propel object for parent node
     *
     * @return     Action The current Propel object
     */
    public function insertAsNextSiblingOf($sibling)
    {
        if ($this->isInTree()) {
            throw new PropelException('A Action object must not already be in the tree to be inserted. Use the moveToNextSiblingOf() instead.');
        }
        $left = $sibling->getRightValue() + 1;
        // Update node properties
        $this->setLeftValue($left);
        $this->setRightValue($left + 1);
        $this->setLevel($sibling->getLevel());
        $scope = $sibling->getScopeValue();
        $this->setScopeValue($scope);
        // Keep the tree modification query for the save() transaction
        $this->nestedSetQueries []= array(
            'callable'  => array('ActionPeer', 'makeRoomForLeaf'),
            'arguments' => array($left, $scope, $this->isNew() ? null : $this)
        );

        return $this;
    }

    /**
     * Moves current node and its subtree to be the first child of $parent
     * The modifications in the current object and the tree are immediate
     *
     * @param      Action $parent	Propel object for parent node
     * @param      PropelPDO $con	Connection to use.
     *
     * @return     Action The current Propel object
     */
    public function moveToFirstChildOf($parent, PropelPDO $con = null)
    {
        if (!$this->isInTree()) {
            throw new PropelException('A Action object must be already in the tree to be moved. Use the insertAsFirstChildOf() instead.');
        }
        if ($parent->getScopeValue() != $this->getScopeValue()) {
            throw new PropelException('Moving nodes across trees is not supported');
        }
        if ($parent->isDescendantOf($this)) {
            throw new PropelException('Cannot move a node as child of one of its subtree nodes.');
        }

        $this->moveSubtreeTo($parent->getLeftValue() + 1, $parent->getLevel() - $this->getLevel() + 1, $con);

        return $this;
    }

    /**
     * Moves current node and its subtree to be the last child of $parent
     * The modifications in the current object and the tree are immediate
     *
     * @param      Action $parent	Propel object for parent node
     * @param      PropelPDO $con	Connection to use.
     *
     * @return     Action The current Propel object
     */
    public function moveToLastChildOf($parent, PropelPDO $con = null)
    {
        if (!$this->isInTree()) {
            throw new PropelException('A Action object must be already in the tree to be moved. Use the insertAsLastChildOf() instead.');
        }
        if ($parent->getScopeValue() != $this->getScopeValue()) {
            throw new PropelException('Moving nodes across trees is not supported');
        }
        if ($parent->isDescendantOf($this)) {
            throw new PropelException('Cannot move a node as child of one of its subtree nodes.');
        }

        $this->moveSubtreeTo($parent->getRightValue(), $parent->getLevel() - $this->getLevel() + 1, $con);

        return $this;
    }

    /**
     * Moves current node and its subtree to be the previous sibling of $sibling
     * The modifications in the current object and the tree are immediate
     *
     * @param      Action $sibling	Propel object for sibling node
     * @param      PropelPDO $con	Connection to use.
     *
     * @return     Action The current Propel object
     */
    public function moveToPrevSiblingOf($sibling, PropelPDO $con = null)
    {
        if (!$this->isInTree()) {
            throw new PropelException('A Action object must be already in the tree to be moved. Use the insertAsPrevSiblingOf() instead.');
        }
        if ($sibling->isRoot()) {
            throw new PropelException('Cannot move to previous sibling of a root node.');
        }
        if ($sibling->getScopeValue() != $this->getScopeValue()) {
            throw new PropelException('Moving nodes across trees is not supported');
        }
        if ($sibling->isDescendantOf($this)) {
            throw new PropelException('Cannot move a node as sibling of one of its subtree nodes.');
        }

        $this->moveSubtreeTo($sibling->getLeftValue(), $sibling->getLevel() - $this->getLevel(), $con);

        return $this;
    }

    /**
     * Moves current node and its subtree to be the next sibling of $sibling
     * The modifications in the current object and the tree are immediate
     *
     * @param      Action $sibling	Propel object for sibling node
     * @param      PropelPDO $con	Connection to use.
     *
     * @return     Action The current Propel object
     */
    public function moveToNextSiblingOf($sibling, PropelPDO $con = null)
    {
        if (!$this->isInTree()) {
            throw new PropelException('A Action object must be already in the tree to be moved. Use the insertAsNextSiblingOf() instead.');
        }
        if ($sibling->isRoot()) {
            throw new PropelException('Cannot move to next sibling of a root node.');
        }
        if ($sibling->getScopeValue() != $this->getScopeValue()) {
            throw new PropelException('Moving nodes across trees is not supported');
        }
        if ($sibling->isDescendantOf($this)) {
            throw new PropelException('Cannot move a node as sibling of one of its subtree nodes.');
        }

        $this->moveSubtreeTo($sibling->getRightValue() + 1, $sibling->getLevel() - $this->getLevel(), $con);

        return $this;
    }

    /**
     * Move current node and its children to location $destLeft and updates rest of tree
     *
     * @param      int	$destLeft Destination left value
     * @param      int	$levelDelta Delta to add to the levels
     * @param      PropelPDO $con		Connection to use.
     */
    protected function moveSubtreeTo($destLeft, $levelDelta, PropelPDO $con = null)
    {
        $left  = $this->getLeftValue();
        $right = $this->getRightValue();
        $scope = $this->getScopeValue();

        $treeSize = $right - $left +1;

        if ($con === null) {
            $con = Propel::getConnection(ActionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            // make room next to the target for the subtree
            ActionPeer::shiftRLValues($treeSize, $destLeft, null, $scope, $con);

            if ($left >= $destLeft) { // src was shifted too?
                $left += $treeSize;
                $right += $treeSize;
            }

            if ($levelDelta) {
                // update the levels of the subtree
                ActionPeer::shiftLevel($levelDelta, $left, $right, $scope, $con);
            }

            // move the subtree to the target
            ActionPeer::shiftRLValues($destLeft - $left, $left, $right, $scope, $con);

            // remove the empty room at the previous location of the subtree
            ActionPeer::shiftRLValues(-$treeSize, $right + 1, null, $scope, $con);

            // update all loaded nodes
            ActionPeer::updateLoadedNodes(null, $con);

            $con->commit();
        } catch (PropelException $e) {
            $con->rollback();
            throw $e;
        }
    }

    /**
     * Deletes all descendants for the given node
     * Instance pooling is wiped out by this command,
     * so existing Action instances are probably invalid (except for the current one)
     *
     * @param      PropelPDO $con Connection to use.
     *
     * @return     int 		number of deleted nodes
     */
    public function deleteDescendants(PropelPDO $con = null)
    {
        if ($this->isLeaf()) {
            // save one query
            return;
        }
        if ($con === null) {
            $con = Propel::getConnection(ActionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $left = $this->getLeftValue();
        $right = $this->getRightValue();
        $scope = $this->getScopeValue();
        $con->beginTransaction();
        try {
            // delete descendant nodes (will empty the instance pool)
            $ret = ActionQuery::create()
                ->descendantsOf($this)
                ->delete($con);

            // fill up the room that was used by descendants
            ActionPeer::shiftRLValues($left - $right + 1, $right, null, $scope, $con);

            // fix the right value for the current node, which is now a leaf
            $this->setRightValue($left + 1);

            $con->commit();
        } catch (Exception $e) {
            $con->rollback();
            throw $e;
        }

        return $ret;
    }

    /**
     * Returns a pre-order iterator for this node and its children.
     *
     * @return     RecursiveIterator
     */
    public function getIterator()
    {
        return new NestedSetRecursiveIterator($this);
    }

}
