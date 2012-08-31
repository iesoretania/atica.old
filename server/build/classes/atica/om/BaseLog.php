<?php


/**
 * Base class that represents a row from the 'log' table.
 *
 *
 *
 * @package    propel.generator.atica.om
 */
abstract class BaseLog extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'LogPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        LogPeer
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
     * The value for the ip field.
     * @var        string
     */
    protected $ip;

    /**
     * The value for the when field.
     * @var        string
     */
    protected $when;

    /**
     * The value for the person_id field.
     * @var        int
     */
    protected $person_id;

    /**
     * The value for the organization_id field.
     * @var        int
     */
    protected $organization_id;

    /**
     * The value for the category_id field.
     * @var        int
     */
    protected $category_id;

    /**
     * The value for the grouping_id field.
     * @var        int
     */
    protected $grouping_id;

    /**
     * The value for the activity_id field.
     * @var        int
     */
    protected $activity_id;

    /**
     * The value for the event_id field.
     * @var        int
     */
    protected $event_id;

    /**
     * The value for the folder_id field.
     * @var        int
     */
    protected $folder_id;

    /**
     * The value for the delivery_id field.
     * @var        int
     */
    protected $delivery_id;

    /**
     * The value for the revision_id field.
     * @var        int
     */
    protected $revision_id;

    /**
     * The value for the document_id field.
     * @var        int
     */
    protected $document_id;

    /**
     * The value for the kind field.
     * @var        string
     */
    protected $kind;

    /**
     * The value for the detail field.
     * @var        string
     */
    protected $detail;

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
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [ip] column value.
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Get the [optionally formatted] temporal [when] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getWhen($format = 'Y-m-d H:i:s')
    {
        if ($this->when === null) {
            return null;
        }

        if ($this->when === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        } else {
            try {
                $dt = new DateTime($this->when);
            } catch (Exception $x) {
                throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->when, true), $x);
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
     * Get the [person_id] column value.
     *
     * @return int
     */
    public function getPersonId()
    {
        return $this->person_id;
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
     * Get the [category_id] column value.
     *
     * @return int
     */
    public function getCategoryId()
    {
        return $this->category_id;
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
     * Get the [activity_id] column value.
     *
     * @return int
     */
    public function getActivityId()
    {
        return $this->activity_id;
    }

    /**
     * Get the [event_id] column value.
     *
     * @return int
     */
    public function getEventId()
    {
        return $this->event_id;
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
     * Get the [delivery_id] column value.
     *
     * @return int
     */
    public function getDeliveryId()
    {
        return $this->delivery_id;
    }

    /**
     * Get the [revision_id] column value.
     *
     * @return int
     */
    public function getRevisionId()
    {
        return $this->revision_id;
    }

    /**
     * Get the [document_id] column value.
     *
     * @return int
     */
    public function getDocumentId()
    {
        return $this->document_id;
    }

    /**
     * Get the [kind] column value.
     *
     * @return string
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * Get the [detail] column value.
     *
     * @return string
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Log The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = LogPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [ip] column.
     *
     * @param string $v new value
     * @return Log The current object (for fluent API support)
     */
    public function setIp($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ip !== $v) {
            $this->ip = $v;
            $this->modifiedColumns[] = LogPeer::IP;
        }


        return $this;
    } // setIp()

    /**
     * Sets the value of [when] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Log The current object (for fluent API support)
     */
    public function setWhen($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->when !== null || $dt !== null) {
            $currentDateAsString = ($this->when !== null && $tmpDt = new DateTime($this->when)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->when = $newDateAsString;
                $this->modifiedColumns[] = LogPeer::WHEN;
            }
        } // if either are not null


        return $this;
    } // setWhen()

    /**
     * Set the value of [person_id] column.
     *
     * @param int $v new value
     * @return Log The current object (for fluent API support)
     */
    public function setPersonId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->person_id !== $v) {
            $this->person_id = $v;
            $this->modifiedColumns[] = LogPeer::PERSON_ID;
        }


        return $this;
    } // setPersonId()

    /**
     * Set the value of [organization_id] column.
     *
     * @param int $v new value
     * @return Log The current object (for fluent API support)
     */
    public function setOrganizationId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->organization_id !== $v) {
            $this->organization_id = $v;
            $this->modifiedColumns[] = LogPeer::ORGANIZATION_ID;
        }


        return $this;
    } // setOrganizationId()

    /**
     * Set the value of [category_id] column.
     *
     * @param int $v new value
     * @return Log The current object (for fluent API support)
     */
    public function setCategoryId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->category_id !== $v) {
            $this->category_id = $v;
            $this->modifiedColumns[] = LogPeer::CATEGORY_ID;
        }


        return $this;
    } // setCategoryId()

    /**
     * Set the value of [grouping_id] column.
     *
     * @param int $v new value
     * @return Log The current object (for fluent API support)
     */
    public function setGroupingId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->grouping_id !== $v) {
            $this->grouping_id = $v;
            $this->modifiedColumns[] = LogPeer::GROUPING_ID;
        }


        return $this;
    } // setGroupingId()

    /**
     * Set the value of [activity_id] column.
     *
     * @param int $v new value
     * @return Log The current object (for fluent API support)
     */
    public function setActivityId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->activity_id !== $v) {
            $this->activity_id = $v;
            $this->modifiedColumns[] = LogPeer::ACTIVITY_ID;
        }


        return $this;
    } // setActivityId()

    /**
     * Set the value of [event_id] column.
     *
     * @param int $v new value
     * @return Log The current object (for fluent API support)
     */
    public function setEventId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->event_id !== $v) {
            $this->event_id = $v;
            $this->modifiedColumns[] = LogPeer::EVENT_ID;
        }


        return $this;
    } // setEventId()

    /**
     * Set the value of [folder_id] column.
     *
     * @param int $v new value
     * @return Log The current object (for fluent API support)
     */
    public function setFolderId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->folder_id !== $v) {
            $this->folder_id = $v;
            $this->modifiedColumns[] = LogPeer::FOLDER_ID;
        }


        return $this;
    } // setFolderId()

    /**
     * Set the value of [delivery_id] column.
     *
     * @param int $v new value
     * @return Log The current object (for fluent API support)
     */
    public function setDeliveryId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->delivery_id !== $v) {
            $this->delivery_id = $v;
            $this->modifiedColumns[] = LogPeer::DELIVERY_ID;
        }


        return $this;
    } // setDeliveryId()

    /**
     * Set the value of [revision_id] column.
     *
     * @param int $v new value
     * @return Log The current object (for fluent API support)
     */
    public function setRevisionId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->revision_id !== $v) {
            $this->revision_id = $v;
            $this->modifiedColumns[] = LogPeer::REVISION_ID;
        }


        return $this;
    } // setRevisionId()

    /**
     * Set the value of [document_id] column.
     *
     * @param int $v new value
     * @return Log The current object (for fluent API support)
     */
    public function setDocumentId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->document_id !== $v) {
            $this->document_id = $v;
            $this->modifiedColumns[] = LogPeer::DOCUMENT_ID;
        }


        return $this;
    } // setDocumentId()

    /**
     * Set the value of [kind] column.
     *
     * @param string $v new value
     * @return Log The current object (for fluent API support)
     */
    public function setKind($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->kind !== $v) {
            $this->kind = $v;
            $this->modifiedColumns[] = LogPeer::KIND;
        }


        return $this;
    } // setKind()

    /**
     * Set the value of [detail] column.
     *
     * @param string $v new value
     * @return Log The current object (for fluent API support)
     */
    public function setDetail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->detail !== $v) {
            $this->detail = $v;
            $this->modifiedColumns[] = LogPeer::DETAIL;
        }


        return $this;
    } // setDetail()

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
            $this->ip = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->when = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->person_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->organization_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->category_id = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->grouping_id = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->activity_id = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->event_id = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->folder_id = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
            $this->delivery_id = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
            $this->revision_id = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
            $this->document_id = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
            $this->kind = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->detail = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 15; // 15 = LogPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Log object", $e);
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
            $con = Propel::getConnection(LogPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = LogPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

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
            $con = Propel::getConnection(LogPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = LogQuery::create()
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
            $con = Propel::getConnection(LogPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                LogPeer::addInstanceToPool($this);
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

        $this->modifiedColumns[] = LogPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . LogPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(LogPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`ID`';
        }
        if ($this->isColumnModified(LogPeer::IP)) {
            $modifiedColumns[':p' . $index++]  = '`IP`';
        }
        if ($this->isColumnModified(LogPeer::WHEN)) {
            $modifiedColumns[':p' . $index++]  = '`WHEN`';
        }
        if ($this->isColumnModified(LogPeer::PERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`PERSON_ID`';
        }
        if ($this->isColumnModified(LogPeer::ORGANIZATION_ID)) {
            $modifiedColumns[':p' . $index++]  = '`ORGANIZATION_ID`';
        }
        if ($this->isColumnModified(LogPeer::CATEGORY_ID)) {
            $modifiedColumns[':p' . $index++]  = '`CATEGORY_ID`';
        }
        if ($this->isColumnModified(LogPeer::GROUPING_ID)) {
            $modifiedColumns[':p' . $index++]  = '`GROUPING_ID`';
        }
        if ($this->isColumnModified(LogPeer::ACTIVITY_ID)) {
            $modifiedColumns[':p' . $index++]  = '`ACTIVITY_ID`';
        }
        if ($this->isColumnModified(LogPeer::EVENT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`EVENT_ID`';
        }
        if ($this->isColumnModified(LogPeer::FOLDER_ID)) {
            $modifiedColumns[':p' . $index++]  = '`FOLDER_ID`';
        }
        if ($this->isColumnModified(LogPeer::DELIVERY_ID)) {
            $modifiedColumns[':p' . $index++]  = '`DELIVERY_ID`';
        }
        if ($this->isColumnModified(LogPeer::REVISION_ID)) {
            $modifiedColumns[':p' . $index++]  = '`REVISION_ID`';
        }
        if ($this->isColumnModified(LogPeer::DOCUMENT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`DOCUMENT_ID`';
        }
        if ($this->isColumnModified(LogPeer::KIND)) {
            $modifiedColumns[':p' . $index++]  = '`KIND`';
        }
        if ($this->isColumnModified(LogPeer::DETAIL)) {
            $modifiedColumns[':p' . $index++]  = '`DETAIL`';
        }

        $sql = sprintf(
            'INSERT INTO `log` (%s) VALUES (%s)',
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
                    case '`IP`':
                        $stmt->bindValue($identifier, $this->ip, PDO::PARAM_STR);
                        break;
                    case '`WHEN`':
                        $stmt->bindValue($identifier, $this->when, PDO::PARAM_STR);
                        break;
                    case '`PERSON_ID`':
                        $stmt->bindValue($identifier, $this->person_id, PDO::PARAM_INT);
                        break;
                    case '`ORGANIZATION_ID`':
                        $stmt->bindValue($identifier, $this->organization_id, PDO::PARAM_INT);
                        break;
                    case '`CATEGORY_ID`':
                        $stmt->bindValue($identifier, $this->category_id, PDO::PARAM_INT);
                        break;
                    case '`GROUPING_ID`':
                        $stmt->bindValue($identifier, $this->grouping_id, PDO::PARAM_INT);
                        break;
                    case '`ACTIVITY_ID`':
                        $stmt->bindValue($identifier, $this->activity_id, PDO::PARAM_INT);
                        break;
                    case '`EVENT_ID`':
                        $stmt->bindValue($identifier, $this->event_id, PDO::PARAM_INT);
                        break;
                    case '`FOLDER_ID`':
                        $stmt->bindValue($identifier, $this->folder_id, PDO::PARAM_INT);
                        break;
                    case '`DELIVERY_ID`':
                        $stmt->bindValue($identifier, $this->delivery_id, PDO::PARAM_INT);
                        break;
                    case '`REVISION_ID`':
                        $stmt->bindValue($identifier, $this->revision_id, PDO::PARAM_INT);
                        break;
                    case '`DOCUMENT_ID`':
                        $stmt->bindValue($identifier, $this->document_id, PDO::PARAM_INT);
                        break;
                    case '`KIND`':
                        $stmt->bindValue($identifier, $this->kind, PDO::PARAM_STR);
                        break;
                    case '`DETAIL`':
                        $stmt->bindValue($identifier, $this->detail, PDO::PARAM_STR);
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


            if (($retval = LogPeer::doValidate($this, $columns)) !== true) {
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
        $pos = LogPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIp();
                break;
            case 2:
                return $this->getWhen();
                break;
            case 3:
                return $this->getPersonId();
                break;
            case 4:
                return $this->getOrganizationId();
                break;
            case 5:
                return $this->getCategoryId();
                break;
            case 6:
                return $this->getGroupingId();
                break;
            case 7:
                return $this->getActivityId();
                break;
            case 8:
                return $this->getEventId();
                break;
            case 9:
                return $this->getFolderId();
                break;
            case 10:
                return $this->getDeliveryId();
                break;
            case 11:
                return $this->getRevisionId();
                break;
            case 12:
                return $this->getDocumentId();
                break;
            case 13:
                return $this->getKind();
                break;
            case 14:
                return $this->getDetail();
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
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {
        if (isset($alreadyDumpedObjects['Log'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Log'][$this->getPrimaryKey()] = true;
        $keys = LogPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getIp(),
            $keys[2] => $this->getWhen(),
            $keys[3] => $this->getPersonId(),
            $keys[4] => $this->getOrganizationId(),
            $keys[5] => $this->getCategoryId(),
            $keys[6] => $this->getGroupingId(),
            $keys[7] => $this->getActivityId(),
            $keys[8] => $this->getEventId(),
            $keys[9] => $this->getFolderId(),
            $keys[10] => $this->getDeliveryId(),
            $keys[11] => $this->getRevisionId(),
            $keys[12] => $this->getDocumentId(),
            $keys[13] => $this->getKind(),
            $keys[14] => $this->getDetail(),
        );

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
        $pos = LogPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIp($value);
                break;
            case 2:
                $this->setWhen($value);
                break;
            case 3:
                $this->setPersonId($value);
                break;
            case 4:
                $this->setOrganizationId($value);
                break;
            case 5:
                $this->setCategoryId($value);
                break;
            case 6:
                $this->setGroupingId($value);
                break;
            case 7:
                $this->setActivityId($value);
                break;
            case 8:
                $this->setEventId($value);
                break;
            case 9:
                $this->setFolderId($value);
                break;
            case 10:
                $this->setDeliveryId($value);
                break;
            case 11:
                $this->setRevisionId($value);
                break;
            case 12:
                $this->setDocumentId($value);
                break;
            case 13:
                $this->setKind($value);
                break;
            case 14:
                $this->setDetail($value);
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
        $keys = LogPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIp($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setWhen($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setPersonId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setOrganizationId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setCategoryId($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setGroupingId($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setActivityId($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setEventId($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setFolderId($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setDeliveryId($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setRevisionId($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setDocumentId($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setKind($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setDetail($arr[$keys[14]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(LogPeer::DATABASE_NAME);

        if ($this->isColumnModified(LogPeer::ID)) $criteria->add(LogPeer::ID, $this->id);
        if ($this->isColumnModified(LogPeer::IP)) $criteria->add(LogPeer::IP, $this->ip);
        if ($this->isColumnModified(LogPeer::WHEN)) $criteria->add(LogPeer::WHEN, $this->when);
        if ($this->isColumnModified(LogPeer::PERSON_ID)) $criteria->add(LogPeer::PERSON_ID, $this->person_id);
        if ($this->isColumnModified(LogPeer::ORGANIZATION_ID)) $criteria->add(LogPeer::ORGANIZATION_ID, $this->organization_id);
        if ($this->isColumnModified(LogPeer::CATEGORY_ID)) $criteria->add(LogPeer::CATEGORY_ID, $this->category_id);
        if ($this->isColumnModified(LogPeer::GROUPING_ID)) $criteria->add(LogPeer::GROUPING_ID, $this->grouping_id);
        if ($this->isColumnModified(LogPeer::ACTIVITY_ID)) $criteria->add(LogPeer::ACTIVITY_ID, $this->activity_id);
        if ($this->isColumnModified(LogPeer::EVENT_ID)) $criteria->add(LogPeer::EVENT_ID, $this->event_id);
        if ($this->isColumnModified(LogPeer::FOLDER_ID)) $criteria->add(LogPeer::FOLDER_ID, $this->folder_id);
        if ($this->isColumnModified(LogPeer::DELIVERY_ID)) $criteria->add(LogPeer::DELIVERY_ID, $this->delivery_id);
        if ($this->isColumnModified(LogPeer::REVISION_ID)) $criteria->add(LogPeer::REVISION_ID, $this->revision_id);
        if ($this->isColumnModified(LogPeer::DOCUMENT_ID)) $criteria->add(LogPeer::DOCUMENT_ID, $this->document_id);
        if ($this->isColumnModified(LogPeer::KIND)) $criteria->add(LogPeer::KIND, $this->kind);
        if ($this->isColumnModified(LogPeer::DETAIL)) $criteria->add(LogPeer::DETAIL, $this->detail);

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
        $criteria = new Criteria(LogPeer::DATABASE_NAME);
        $criteria->add(LogPeer::ID, $this->id);

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
     * @param object $copyObj An object of Log (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIp($this->getIp());
        $copyObj->setWhen($this->getWhen());
        $copyObj->setPersonId($this->getPersonId());
        $copyObj->setOrganizationId($this->getOrganizationId());
        $copyObj->setCategoryId($this->getCategoryId());
        $copyObj->setGroupingId($this->getGroupingId());
        $copyObj->setActivityId($this->getActivityId());
        $copyObj->setEventId($this->getEventId());
        $copyObj->setFolderId($this->getFolderId());
        $copyObj->setDeliveryId($this->getDeliveryId());
        $copyObj->setRevisionId($this->getRevisionId());
        $copyObj->setDocumentId($this->getDocumentId());
        $copyObj->setKind($this->getKind());
        $copyObj->setDetail($this->getDetail());
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
     * @return Log Clone of current object.
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
     * @return LogPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new LogPeer();
        }

        return self::$peer;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->ip = null;
        $this->when = null;
        $this->person_id = null;
        $this->organization_id = null;
        $this->category_id = null;
        $this->grouping_id = null;
        $this->activity_id = null;
        $this->event_id = null;
        $this->folder_id = null;
        $this->delivery_id = null;
        $this->revision_id = null;
        $this->document_id = null;
        $this->kind = null;
        $this->detail = null;
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

    }

    /**
     * return the string representation of this object
     *
     * @return string The value of the 'detail' column
     */
    public function __toString()
    {
        return (string) $this->getDetail();
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
