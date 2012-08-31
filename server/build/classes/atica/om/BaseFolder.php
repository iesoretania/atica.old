<?php


/**
 * Base class that represents a row from the 'folder' table.
 *
 *
 *
 * @package    propel.generator.atica.om
 */
abstract class BaseFolder extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'FolderPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        FolderPeer
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
     * The value for the category_id field.
     * @var        int
     */
    protected $category_id;

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
     * The value for the description field.
     * @var        string
     */
    protected $description;

    /**
     * The value for the is_divided field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $is_divided;

    /**
     * The value for the is_private field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $is_private;

    /**
     * The value for the filter field.
     * @var        string
     */
    protected $filter;

    /**
     * The value for the filter_description field.
     * @var        string
     */
    protected $filter_description;

    /**
     * The value for the mandatory_review field.
     * @var        boolean
     */
    protected $mandatory_review;

    /**
     * The value for the mandatory_approval field.
     * @var        boolean
     */
    protected $mandatory_approval;

    /**
     * The value for the review_notes field.
     * @var        string
     */
    protected $review_notes;

    /**
     * The value for the approval_notes field.
     * @var        string
     */
    protected $approval_notes;

    /**
     * The value for the show_revision_nr field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $show_revision_nr;

    /**
     * The value for the autoclean field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $autoclean;

    /**
     * The value for the max_uploads field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $max_uploads;

    /**
     * The value for the public_token field.
     * @var        string
     */
    protected $public_token;

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
     * @var        PropelObjectCollection|EventFolder[] Collection to store aggregation of EventFolder objects.
     */
    protected $collEventFolders;
    protected $collEventFoldersPartial;

    /**
     * @var        PropelObjectCollection|CategoryFolder[] Collection to store aggregation of CategoryFolder objects.
     */
    protected $collCategoryFolders;
    protected $collCategoryFoldersPartial;

    /**
     * @var        PropelObjectCollection|GroupingFolder[] Collection to store aggregation of GroupingFolder objects.
     */
    protected $collGroupingFolders;
    protected $collGroupingFoldersPartial;

    /**
     * @var        PropelObjectCollection|FolderPermission[] Collection to store aggregation of FolderPermission objects.
     */
    protected $collFolderPermissions;
    protected $collFolderPermissionsPartial;

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
    protected $eventFoldersScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $categoryFoldersScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $groupingFoldersScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $folderPermissionsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->is_divided = false;
        $this->is_private = false;
        $this->show_revision_nr = false;
        $this->autoclean = false;
        $this->max_uploads = 0;
    }

    /**
     * Initializes internal state of BaseFolder object.
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
     * Get the [category_id] column value.
     *
     * @return int
     */
    public function getCategoryId()
    {
        return $this->category_id;
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
     * Get the [is_divided] column value.
     *
     * @return boolean
     */
    public function getIsDivided()
    {
        return $this->is_divided;
    }

    /**
     * Get the [is_private] column value.
     *
     * @return boolean
     */
    public function getIsPrivate()
    {
        return $this->is_private;
    }

    /**
     * Get the [filter] column value.
     *
     * @return string
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * Get the [filter_description] column value.
     *
     * @return string
     */
    public function getFilterDescription()
    {
        return $this->filter_description;
    }

    /**
     * Get the [mandatory_review] column value.
     *
     * @return boolean
     */
    public function getMandatoryReview()
    {
        return $this->mandatory_review;
    }

    /**
     * Get the [mandatory_approval] column value.
     *
     * @return boolean
     */
    public function getMandatoryApproval()
    {
        return $this->mandatory_approval;
    }

    /**
     * Get the [review_notes] column value.
     *
     * @return string
     */
    public function getReviewNotes()
    {
        return $this->review_notes;
    }

    /**
     * Get the [approval_notes] column value.
     *
     * @return string
     */
    public function getApprovalNotes()
    {
        return $this->approval_notes;
    }

    /**
     * Get the [show_revision_nr] column value.
     *
     * @return boolean
     */
    public function getShowRevisionNr()
    {
        return $this->show_revision_nr;
    }

    /**
     * Get the [autoclean] column value.
     *
     * @return boolean
     */
    public function getAutoclean()
    {
        return $this->autoclean;
    }

    /**
     * Get the [max_uploads] column value.
     *
     * @return int
     */
    public function getMaxUploads()
    {
        return $this->max_uploads;
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
     * @return Folder The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = FolderPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [snapshot_id] column.
     *
     * @param int $v new value
     * @return Folder The current object (for fluent API support)
     */
    public function setSnapshotId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->snapshot_id !== $v) {
            $this->snapshot_id = $v;
            $this->modifiedColumns[] = FolderPeer::SNAPSHOT_ID;
        }

        if ($this->aSnapshot !== null && $this->aSnapshot->getId() !== $v) {
            $this->aSnapshot = null;
        }


        return $this;
    } // setSnapshotId()

    /**
     * Set the value of [category_id] column.
     *
     * @param int $v new value
     * @return Folder The current object (for fluent API support)
     */
    public function setCategoryId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->category_id !== $v) {
            $this->category_id = $v;
            $this->modifiedColumns[] = FolderPeer::CATEGORY_ID;
        }


        return $this;
    } // setCategoryId()

    /**
     * Set the value of [order_nr] column.
     *
     * @param int $v new value
     * @return Folder The current object (for fluent API support)
     */
    public function setOrderNr($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->order_nr !== $v) {
            $this->order_nr = $v;
            $this->modifiedColumns[] = FolderPeer::ORDER_NR;
        }


        return $this;
    } // setOrderNr()

    /**
     * Set the value of [display_name] column.
     *
     * @param string $v new value
     * @return Folder The current object (for fluent API support)
     */
    public function setDisplayName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->display_name !== $v) {
            $this->display_name = $v;
            $this->modifiedColumns[] = FolderPeer::DISPLAY_NAME;
        }


        return $this;
    } // setDisplayName()

    /**
     * Set the value of [description] column.
     *
     * @param string $v new value
     * @return Folder The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[] = FolderPeer::DESCRIPTION;
        }


        return $this;
    } // setDescription()

    /**
     * Sets the value of the [is_divided] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Folder The current object (for fluent API support)
     */
    public function setIsDivided($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_divided !== $v) {
            $this->is_divided = $v;
            $this->modifiedColumns[] = FolderPeer::IS_DIVIDED;
        }


        return $this;
    } // setIsDivided()

    /**
     * Sets the value of the [is_private] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Folder The current object (for fluent API support)
     */
    public function setIsPrivate($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_private !== $v) {
            $this->is_private = $v;
            $this->modifiedColumns[] = FolderPeer::IS_PRIVATE;
        }


        return $this;
    } // setIsPrivate()

    /**
     * Set the value of [filter] column.
     *
     * @param string $v new value
     * @return Folder The current object (for fluent API support)
     */
    public function setFilter($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->filter !== $v) {
            $this->filter = $v;
            $this->modifiedColumns[] = FolderPeer::FILTER;
        }


        return $this;
    } // setFilter()

    /**
     * Set the value of [filter_description] column.
     *
     * @param string $v new value
     * @return Folder The current object (for fluent API support)
     */
    public function setFilterDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->filter_description !== $v) {
            $this->filter_description = $v;
            $this->modifiedColumns[] = FolderPeer::FILTER_DESCRIPTION;
        }


        return $this;
    } // setFilterDescription()

    /**
     * Sets the value of the [mandatory_review] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Folder The current object (for fluent API support)
     */
    public function setMandatoryReview($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->mandatory_review !== $v) {
            $this->mandatory_review = $v;
            $this->modifiedColumns[] = FolderPeer::MANDATORY_REVIEW;
        }


        return $this;
    } // setMandatoryReview()

    /**
     * Sets the value of the [mandatory_approval] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Folder The current object (for fluent API support)
     */
    public function setMandatoryApproval($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->mandatory_approval !== $v) {
            $this->mandatory_approval = $v;
            $this->modifiedColumns[] = FolderPeer::MANDATORY_APPROVAL;
        }


        return $this;
    } // setMandatoryApproval()

    /**
     * Set the value of [review_notes] column.
     *
     * @param string $v new value
     * @return Folder The current object (for fluent API support)
     */
    public function setReviewNotes($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->review_notes !== $v) {
            $this->review_notes = $v;
            $this->modifiedColumns[] = FolderPeer::REVIEW_NOTES;
        }


        return $this;
    } // setReviewNotes()

    /**
     * Set the value of [approval_notes] column.
     *
     * @param string $v new value
     * @return Folder The current object (for fluent API support)
     */
    public function setApprovalNotes($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->approval_notes !== $v) {
            $this->approval_notes = $v;
            $this->modifiedColumns[] = FolderPeer::APPROVAL_NOTES;
        }


        return $this;
    } // setApprovalNotes()

    /**
     * Sets the value of the [show_revision_nr] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Folder The current object (for fluent API support)
     */
    public function setShowRevisionNr($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->show_revision_nr !== $v) {
            $this->show_revision_nr = $v;
            $this->modifiedColumns[] = FolderPeer::SHOW_REVISION_NR;
        }


        return $this;
    } // setShowRevisionNr()

    /**
     * Sets the value of the [autoclean] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Folder The current object (for fluent API support)
     */
    public function setAutoclean($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->autoclean !== $v) {
            $this->autoclean = $v;
            $this->modifiedColumns[] = FolderPeer::AUTOCLEAN;
        }


        return $this;
    } // setAutoclean()

    /**
     * Set the value of [max_uploads] column.
     *
     * @param int $v new value
     * @return Folder The current object (for fluent API support)
     */
    public function setMaxUploads($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->max_uploads !== $v) {
            $this->max_uploads = $v;
            $this->modifiedColumns[] = FolderPeer::MAX_UPLOADS;
        }


        return $this;
    } // setMaxUploads()

    /**
     * Set the value of [public_token] column.
     *
     * @param string $v new value
     * @return Folder The current object (for fluent API support)
     */
    public function setPublicToken($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->public_token !== $v) {
            $this->public_token = $v;
            $this->modifiedColumns[] = FolderPeer::PUBLIC_TOKEN;
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
            if ($this->is_divided !== false) {
                return false;
            }

            if ($this->is_private !== false) {
                return false;
            }

            if ($this->show_revision_nr !== false) {
                return false;
            }

            if ($this->autoclean !== false) {
                return false;
            }

            if ($this->max_uploads !== 0) {
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
            $this->category_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->order_nr = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->display_name = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->description = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->is_divided = ($row[$startcol + 6] !== null) ? (boolean) $row[$startcol + 6] : null;
            $this->is_private = ($row[$startcol + 7] !== null) ? (boolean) $row[$startcol + 7] : null;
            $this->filter = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->filter_description = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->mandatory_review = ($row[$startcol + 10] !== null) ? (boolean) $row[$startcol + 10] : null;
            $this->mandatory_approval = ($row[$startcol + 11] !== null) ? (boolean) $row[$startcol + 11] : null;
            $this->review_notes = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->approval_notes = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->show_revision_nr = ($row[$startcol + 14] !== null) ? (boolean) $row[$startcol + 14] : null;
            $this->autoclean = ($row[$startcol + 15] !== null) ? (boolean) $row[$startcol + 15] : null;
            $this->max_uploads = ($row[$startcol + 16] !== null) ? (int) $row[$startcol + 16] : null;
            $this->public_token = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 18; // 18 = FolderPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Folder object", $e);
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
            $con = Propel::getConnection(FolderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = FolderPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aSnapshot = null;
            $this->collFolderDeliveries = null;

            $this->collEventFolders = null;

            $this->collCategoryFolders = null;

            $this->collGroupingFolders = null;

            $this->collFolderPermissions = null;

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
            $con = Propel::getConnection(FolderPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = FolderQuery::create()
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
            $con = Propel::getConnection(FolderPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                FolderPeer::addInstanceToPool($this);
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

            if ($this->categoryFoldersScheduledForDeletion !== null) {
                if (!$this->categoryFoldersScheduledForDeletion->isEmpty()) {
                    CategoryFolderQuery::create()
                        ->filterByPrimaryKeys($this->categoryFoldersScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->categoryFoldersScheduledForDeletion = null;
                }
            }

            if ($this->collCategoryFolders !== null) {
                foreach ($this->collCategoryFolders as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->groupingFoldersScheduledForDeletion !== null) {
                if (!$this->groupingFoldersScheduledForDeletion->isEmpty()) {
                    GroupingFolderQuery::create()
                        ->filterByPrimaryKeys($this->groupingFoldersScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->groupingFoldersScheduledForDeletion = null;
                }
            }

            if ($this->collGroupingFolders !== null) {
                foreach ($this->collGroupingFolders as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->folderPermissionsScheduledForDeletion !== null) {
                if (!$this->folderPermissionsScheduledForDeletion->isEmpty()) {
                    FolderPermissionQuery::create()
                        ->filterByPrimaryKeys($this->folderPermissionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->folderPermissionsScheduledForDeletion = null;
                }
            }

            if ($this->collFolderPermissions !== null) {
                foreach ($this->collFolderPermissions as $referrerFK) {
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

        $this->modifiedColumns[] = FolderPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . FolderPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(FolderPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`ID`';
        }
        if ($this->isColumnModified(FolderPeer::SNAPSHOT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`SNAPSHOT_ID`';
        }
        if ($this->isColumnModified(FolderPeer::CATEGORY_ID)) {
            $modifiedColumns[':p' . $index++]  = '`CATEGORY_ID`';
        }
        if ($this->isColumnModified(FolderPeer::ORDER_NR)) {
            $modifiedColumns[':p' . $index++]  = '`ORDER_NR`';
        }
        if ($this->isColumnModified(FolderPeer::DISPLAY_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`DISPLAY_NAME`';
        }
        if ($this->isColumnModified(FolderPeer::DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`DESCRIPTION`';
        }
        if ($this->isColumnModified(FolderPeer::IS_DIVIDED)) {
            $modifiedColumns[':p' . $index++]  = '`IS_DIVIDED`';
        }
        if ($this->isColumnModified(FolderPeer::IS_PRIVATE)) {
            $modifiedColumns[':p' . $index++]  = '`IS_PRIVATE`';
        }
        if ($this->isColumnModified(FolderPeer::FILTER)) {
            $modifiedColumns[':p' . $index++]  = '`FILTER`';
        }
        if ($this->isColumnModified(FolderPeer::FILTER_DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`FILTER_DESCRIPTION`';
        }
        if ($this->isColumnModified(FolderPeer::MANDATORY_REVIEW)) {
            $modifiedColumns[':p' . $index++]  = '`MANDATORY_REVIEW`';
        }
        if ($this->isColumnModified(FolderPeer::MANDATORY_APPROVAL)) {
            $modifiedColumns[':p' . $index++]  = '`MANDATORY_APPROVAL`';
        }
        if ($this->isColumnModified(FolderPeer::REVIEW_NOTES)) {
            $modifiedColumns[':p' . $index++]  = '`REVIEW_NOTES`';
        }
        if ($this->isColumnModified(FolderPeer::APPROVAL_NOTES)) {
            $modifiedColumns[':p' . $index++]  = '`APPROVAL_NOTES`';
        }
        if ($this->isColumnModified(FolderPeer::SHOW_REVISION_NR)) {
            $modifiedColumns[':p' . $index++]  = '`SHOW_REVISION_NR`';
        }
        if ($this->isColumnModified(FolderPeer::AUTOCLEAN)) {
            $modifiedColumns[':p' . $index++]  = '`AUTOCLEAN`';
        }
        if ($this->isColumnModified(FolderPeer::MAX_UPLOADS)) {
            $modifiedColumns[':p' . $index++]  = '`MAX_UPLOADS`';
        }
        if ($this->isColumnModified(FolderPeer::PUBLIC_TOKEN)) {
            $modifiedColumns[':p' . $index++]  = '`PUBLIC_TOKEN`';
        }

        $sql = sprintf(
            'INSERT INTO `folder` (%s) VALUES (%s)',
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
                    case '`CATEGORY_ID`':
                        $stmt->bindValue($identifier, $this->category_id, PDO::PARAM_INT);
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
                    case '`IS_DIVIDED`':
                        $stmt->bindValue($identifier, (int) $this->is_divided, PDO::PARAM_INT);
                        break;
                    case '`IS_PRIVATE`':
                        $stmt->bindValue($identifier, (int) $this->is_private, PDO::PARAM_INT);
                        break;
                    case '`FILTER`':
                        $stmt->bindValue($identifier, $this->filter, PDO::PARAM_STR);
                        break;
                    case '`FILTER_DESCRIPTION`':
                        $stmt->bindValue($identifier, $this->filter_description, PDO::PARAM_STR);
                        break;
                    case '`MANDATORY_REVIEW`':
                        $stmt->bindValue($identifier, (int) $this->mandatory_review, PDO::PARAM_INT);
                        break;
                    case '`MANDATORY_APPROVAL`':
                        $stmt->bindValue($identifier, (int) $this->mandatory_approval, PDO::PARAM_INT);
                        break;
                    case '`REVIEW_NOTES`':
                        $stmt->bindValue($identifier, $this->review_notes, PDO::PARAM_STR);
                        break;
                    case '`APPROVAL_NOTES`':
                        $stmt->bindValue($identifier, $this->approval_notes, PDO::PARAM_STR);
                        break;
                    case '`SHOW_REVISION_NR`':
                        $stmt->bindValue($identifier, (int) $this->show_revision_nr, PDO::PARAM_INT);
                        break;
                    case '`AUTOCLEAN`':
                        $stmt->bindValue($identifier, (int) $this->autoclean, PDO::PARAM_INT);
                        break;
                    case '`MAX_UPLOADS`':
                        $stmt->bindValue($identifier, $this->max_uploads, PDO::PARAM_INT);
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

            if ($this->aSnapshot !== null) {
                if (!$this->aSnapshot->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSnapshot->getValidationFailures());
                }
            }


            if (($retval = FolderPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collFolderDeliveries !== null) {
                    foreach ($this->collFolderDeliveries as $referrerFK) {
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

                if ($this->collCategoryFolders !== null) {
                    foreach ($this->collCategoryFolders as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collGroupingFolders !== null) {
                    foreach ($this->collGroupingFolders as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collFolderPermissions !== null) {
                    foreach ($this->collFolderPermissions as $referrerFK) {
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
        $pos = FolderPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getCategoryId();
                break;
            case 3:
                return $this->getOrderNr();
                break;
            case 4:
                return $this->getDisplayName();
                break;
            case 5:
                return $this->getDescription();
                break;
            case 6:
                return $this->getIsDivided();
                break;
            case 7:
                return $this->getIsPrivate();
                break;
            case 8:
                return $this->getFilter();
                break;
            case 9:
                return $this->getFilterDescription();
                break;
            case 10:
                return $this->getMandatoryReview();
                break;
            case 11:
                return $this->getMandatoryApproval();
                break;
            case 12:
                return $this->getReviewNotes();
                break;
            case 13:
                return $this->getApprovalNotes();
                break;
            case 14:
                return $this->getShowRevisionNr();
                break;
            case 15:
                return $this->getAutoclean();
                break;
            case 16:
                return $this->getMaxUploads();
                break;
            case 17:
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
        if (isset($alreadyDumpedObjects['Folder'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Folder'][$this->getPrimaryKey()] = true;
        $keys = FolderPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getSnapshotId(),
            $keys[2] => $this->getCategoryId(),
            $keys[3] => $this->getOrderNr(),
            $keys[4] => $this->getDisplayName(),
            $keys[5] => $this->getDescription(),
            $keys[6] => $this->getIsDivided(),
            $keys[7] => $this->getIsPrivate(),
            $keys[8] => $this->getFilter(),
            $keys[9] => $this->getFilterDescription(),
            $keys[10] => $this->getMandatoryReview(),
            $keys[11] => $this->getMandatoryApproval(),
            $keys[12] => $this->getReviewNotes(),
            $keys[13] => $this->getApprovalNotes(),
            $keys[14] => $this->getShowRevisionNr(),
            $keys[15] => $this->getAutoclean(),
            $keys[16] => $this->getMaxUploads(),
            $keys[17] => $this->getPublicToken(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aSnapshot) {
                $result['Snapshot'] = $this->aSnapshot->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collFolderDeliveries) {
                $result['FolderDeliveries'] = $this->collFolderDeliveries->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEventFolders) {
                $result['EventFolders'] = $this->collEventFolders->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collCategoryFolders) {
                $result['CategoryFolders'] = $this->collCategoryFolders->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collGroupingFolders) {
                $result['GroupingFolders'] = $this->collGroupingFolders->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collFolderPermissions) {
                $result['FolderPermissions'] = $this->collFolderPermissions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = FolderPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setCategoryId($value);
                break;
            case 3:
                $this->setOrderNr($value);
                break;
            case 4:
                $this->setDisplayName($value);
                break;
            case 5:
                $this->setDescription($value);
                break;
            case 6:
                $this->setIsDivided($value);
                break;
            case 7:
                $this->setIsPrivate($value);
                break;
            case 8:
                $this->setFilter($value);
                break;
            case 9:
                $this->setFilterDescription($value);
                break;
            case 10:
                $this->setMandatoryReview($value);
                break;
            case 11:
                $this->setMandatoryApproval($value);
                break;
            case 12:
                $this->setReviewNotes($value);
                break;
            case 13:
                $this->setApprovalNotes($value);
                break;
            case 14:
                $this->setShowRevisionNr($value);
                break;
            case 15:
                $this->setAutoclean($value);
                break;
            case 16:
                $this->setMaxUploads($value);
                break;
            case 17:
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
        $keys = FolderPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setSnapshotId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setCategoryId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setOrderNr($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setDisplayName($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setDescription($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setIsDivided($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setIsPrivate($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setFilter($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setFilterDescription($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setMandatoryReview($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setMandatoryApproval($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setReviewNotes($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setApprovalNotes($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setShowRevisionNr($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setAutoclean($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setMaxUploads($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setPublicToken($arr[$keys[17]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(FolderPeer::DATABASE_NAME);

        if ($this->isColumnModified(FolderPeer::ID)) $criteria->add(FolderPeer::ID, $this->id);
        if ($this->isColumnModified(FolderPeer::SNAPSHOT_ID)) $criteria->add(FolderPeer::SNAPSHOT_ID, $this->snapshot_id);
        if ($this->isColumnModified(FolderPeer::CATEGORY_ID)) $criteria->add(FolderPeer::CATEGORY_ID, $this->category_id);
        if ($this->isColumnModified(FolderPeer::ORDER_NR)) $criteria->add(FolderPeer::ORDER_NR, $this->order_nr);
        if ($this->isColumnModified(FolderPeer::DISPLAY_NAME)) $criteria->add(FolderPeer::DISPLAY_NAME, $this->display_name);
        if ($this->isColumnModified(FolderPeer::DESCRIPTION)) $criteria->add(FolderPeer::DESCRIPTION, $this->description);
        if ($this->isColumnModified(FolderPeer::IS_DIVIDED)) $criteria->add(FolderPeer::IS_DIVIDED, $this->is_divided);
        if ($this->isColumnModified(FolderPeer::IS_PRIVATE)) $criteria->add(FolderPeer::IS_PRIVATE, $this->is_private);
        if ($this->isColumnModified(FolderPeer::FILTER)) $criteria->add(FolderPeer::FILTER, $this->filter);
        if ($this->isColumnModified(FolderPeer::FILTER_DESCRIPTION)) $criteria->add(FolderPeer::FILTER_DESCRIPTION, $this->filter_description);
        if ($this->isColumnModified(FolderPeer::MANDATORY_REVIEW)) $criteria->add(FolderPeer::MANDATORY_REVIEW, $this->mandatory_review);
        if ($this->isColumnModified(FolderPeer::MANDATORY_APPROVAL)) $criteria->add(FolderPeer::MANDATORY_APPROVAL, $this->mandatory_approval);
        if ($this->isColumnModified(FolderPeer::REVIEW_NOTES)) $criteria->add(FolderPeer::REVIEW_NOTES, $this->review_notes);
        if ($this->isColumnModified(FolderPeer::APPROVAL_NOTES)) $criteria->add(FolderPeer::APPROVAL_NOTES, $this->approval_notes);
        if ($this->isColumnModified(FolderPeer::SHOW_REVISION_NR)) $criteria->add(FolderPeer::SHOW_REVISION_NR, $this->show_revision_nr);
        if ($this->isColumnModified(FolderPeer::AUTOCLEAN)) $criteria->add(FolderPeer::AUTOCLEAN, $this->autoclean);
        if ($this->isColumnModified(FolderPeer::MAX_UPLOADS)) $criteria->add(FolderPeer::MAX_UPLOADS, $this->max_uploads);
        if ($this->isColumnModified(FolderPeer::PUBLIC_TOKEN)) $criteria->add(FolderPeer::PUBLIC_TOKEN, $this->public_token);

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
        $criteria = new Criteria(FolderPeer::DATABASE_NAME);
        $criteria->add(FolderPeer::ID, $this->id);

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
     * @param object $copyObj An object of Folder (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSnapshotId($this->getSnapshotId());
        $copyObj->setCategoryId($this->getCategoryId());
        $copyObj->setOrderNr($this->getOrderNr());
        $copyObj->setDisplayName($this->getDisplayName());
        $copyObj->setDescription($this->getDescription());
        $copyObj->setIsDivided($this->getIsDivided());
        $copyObj->setIsPrivate($this->getIsPrivate());
        $copyObj->setFilter($this->getFilter());
        $copyObj->setFilterDescription($this->getFilterDescription());
        $copyObj->setMandatoryReview($this->getMandatoryReview());
        $copyObj->setMandatoryApproval($this->getMandatoryApproval());
        $copyObj->setReviewNotes($this->getReviewNotes());
        $copyObj->setApprovalNotes($this->getApprovalNotes());
        $copyObj->setShowRevisionNr($this->getShowRevisionNr());
        $copyObj->setAutoclean($this->getAutoclean());
        $copyObj->setMaxUploads($this->getMaxUploads());
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

            foreach ($this->getEventFolders() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEventFolder($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCategoryFolders() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCategoryFolder($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getGroupingFolders() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addGroupingFolder($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getFolderPermissions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addFolderPermission($relObj->copy($deepCopy));
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
     * @return Folder Clone of current object.
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
     * @return FolderPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new FolderPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Snapshot object.
     *
     * @param             Snapshot $v
     * @return Folder The current object (for fluent API support)
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
            $v->addFolder($this);
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
                $this->aSnapshot->addFolders($this);
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
        if ('EventFolder' == $relationName) {
            $this->initEventFolders();
        }
        if ('CategoryFolder' == $relationName) {
            $this->initCategoryFolders();
        }
        if ('GroupingFolder' == $relationName) {
            $this->initGroupingFolders();
        }
        if ('FolderPermission' == $relationName) {
            $this->initFolderPermissions();
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
     * If this Folder is new, it will return
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
                    ->filterByFolder($this)
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
            $folderDeliveryRemoved->setFolder(null);
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
                    ->filterByFolder($this)
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
     * @return Folder The current object (for fluent API support)
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
        $folderDelivery->setFolder($this);
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
            $folderDelivery->setFolder(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Folder is new, it will return
     * an empty collection; or if this Folder has previously
     * been saved, it will retrieve related FolderDeliveries from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Folder.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|FolderDelivery[] List of FolderDelivery objects
     */
    public function getFolderDeliveriesJoinDelivery($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = FolderDeliveryQuery::create(null, $criteria);
        $query->joinWith('Delivery', $join_behavior);

        return $this->getFolderDeliveries($query, $con);
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
     * If this Folder is new, it will return
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
                    ->filterByFolder($this)
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
            $eventFolderRemoved->setFolder(null);
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
                    ->filterByFolder($this)
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
     * @return Folder The current object (for fluent API support)
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
        $eventFolder->setFolder($this);
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
            $eventFolder->setFolder(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Folder is new, it will return
     * an empty collection; or if this Folder has previously
     * been saved, it will retrieve related EventFolders from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Folder.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|EventFolder[] List of EventFolder objects
     */
    public function getEventFoldersJoinEvent($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = EventFolderQuery::create(null, $criteria);
        $query->joinWith('Event', $join_behavior);

        return $this->getEventFolders($query, $con);
    }

    /**
     * Clears out the collCategoryFolders collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCategoryFolders()
     */
    public function clearCategoryFolders()
    {
        $this->collCategoryFolders = null; // important to set this to null since that means it is uninitialized
        $this->collCategoryFoldersPartial = null;
    }

    /**
     * reset is the collCategoryFolders collection loaded partially
     *
     * @return void
     */
    public function resetPartialCategoryFolders($v = true)
    {
        $this->collCategoryFoldersPartial = $v;
    }

    /**
     * Initializes the collCategoryFolders collection.
     *
     * By default this just sets the collCategoryFolders collection to an empty array (like clearcollCategoryFolders());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCategoryFolders($overrideExisting = true)
    {
        if (null !== $this->collCategoryFolders && !$overrideExisting) {
            return;
        }
        $this->collCategoryFolders = new PropelObjectCollection();
        $this->collCategoryFolders->setModel('CategoryFolder');
    }

    /**
     * Gets an array of CategoryFolder objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Folder is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|CategoryFolder[] List of CategoryFolder objects
     * @throws PropelException
     */
    public function getCategoryFolders($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collCategoryFoldersPartial && !$this->isNew();
        if (null === $this->collCategoryFolders || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCategoryFolders) {
                // return empty collection
                $this->initCategoryFolders();
            } else {
                $collCategoryFolders = CategoryFolderQuery::create(null, $criteria)
                    ->filterByFolder($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collCategoryFoldersPartial && count($collCategoryFolders)) {
                      $this->initCategoryFolders(false);

                      foreach($collCategoryFolders as $obj) {
                        if (false == $this->collCategoryFolders->contains($obj)) {
                          $this->collCategoryFolders->append($obj);
                        }
                      }

                      $this->collCategoryFoldersPartial = true;
                    }

                    return $collCategoryFolders;
                }

                if($partial && $this->collCategoryFolders) {
                    foreach($this->collCategoryFolders as $obj) {
                        if($obj->isNew()) {
                            $collCategoryFolders[] = $obj;
                        }
                    }
                }

                $this->collCategoryFolders = $collCategoryFolders;
                $this->collCategoryFoldersPartial = false;
            }
        }

        return $this->collCategoryFolders;
    }

    /**
     * Sets a collection of CategoryFolder objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $categoryFolders A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setCategoryFolders(PropelCollection $categoryFolders, PropelPDO $con = null)
    {
        $this->categoryFoldersScheduledForDeletion = $this->getCategoryFolders(new Criteria(), $con)->diff($categoryFolders);

        foreach ($this->categoryFoldersScheduledForDeletion as $categoryFolderRemoved) {
            $categoryFolderRemoved->setFolder(null);
        }

        $this->collCategoryFolders = null;
        foreach ($categoryFolders as $categoryFolder) {
            $this->addCategoryFolder($categoryFolder);
        }

        $this->collCategoryFolders = $categoryFolders;
        $this->collCategoryFoldersPartial = false;
    }

    /**
     * Returns the number of related CategoryFolder objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related CategoryFolder objects.
     * @throws PropelException
     */
    public function countCategoryFolders(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collCategoryFoldersPartial && !$this->isNew();
        if (null === $this->collCategoryFolders || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCategoryFolders) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getCategoryFolders());
                }
                $query = CategoryFolderQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByFolder($this)
                    ->count($con);
            }
        } else {
            return count($this->collCategoryFolders);
        }
    }

    /**
     * Method called to associate a CategoryFolder object to this object
     * through the CategoryFolder foreign key attribute.
     *
     * @param    CategoryFolder $l CategoryFolder
     * @return Folder The current object (for fluent API support)
     */
    public function addCategoryFolder(CategoryFolder $l)
    {
        if ($this->collCategoryFolders === null) {
            $this->initCategoryFolders();
            $this->collCategoryFoldersPartial = true;
        }
        if (!in_array($l, $this->collCategoryFolders->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddCategoryFolder($l);
        }

        return $this;
    }

    /**
     * @param	CategoryFolder $categoryFolder The categoryFolder object to add.
     */
    protected function doAddCategoryFolder($categoryFolder)
    {
        $this->collCategoryFolders[]= $categoryFolder;
        $categoryFolder->setFolder($this);
    }

    /**
     * @param	CategoryFolder $categoryFolder The categoryFolder object to remove.
     */
    public function removeCategoryFolder($categoryFolder)
    {
        if ($this->getCategoryFolders()->contains($categoryFolder)) {
            $this->collCategoryFolders->remove($this->collCategoryFolders->search($categoryFolder));
            if (null === $this->categoryFoldersScheduledForDeletion) {
                $this->categoryFoldersScheduledForDeletion = clone $this->collCategoryFolders;
                $this->categoryFoldersScheduledForDeletion->clear();
            }
            $this->categoryFoldersScheduledForDeletion[]= $categoryFolder;
            $categoryFolder->setFolder(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Folder is new, it will return
     * an empty collection; or if this Folder has previously
     * been saved, it will retrieve related CategoryFolders from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Folder.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|CategoryFolder[] List of CategoryFolder objects
     */
    public function getCategoryFoldersJoinCategory($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = CategoryFolderQuery::create(null, $criteria);
        $query->joinWith('Category', $join_behavior);

        return $this->getCategoryFolders($query, $con);
    }

    /**
     * Clears out the collGroupingFolders collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addGroupingFolders()
     */
    public function clearGroupingFolders()
    {
        $this->collGroupingFolders = null; // important to set this to null since that means it is uninitialized
        $this->collGroupingFoldersPartial = null;
    }

    /**
     * reset is the collGroupingFolders collection loaded partially
     *
     * @return void
     */
    public function resetPartialGroupingFolders($v = true)
    {
        $this->collGroupingFoldersPartial = $v;
    }

    /**
     * Initializes the collGroupingFolders collection.
     *
     * By default this just sets the collGroupingFolders collection to an empty array (like clearcollGroupingFolders());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initGroupingFolders($overrideExisting = true)
    {
        if (null !== $this->collGroupingFolders && !$overrideExisting) {
            return;
        }
        $this->collGroupingFolders = new PropelObjectCollection();
        $this->collGroupingFolders->setModel('GroupingFolder');
    }

    /**
     * Gets an array of GroupingFolder objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Folder is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|GroupingFolder[] List of GroupingFolder objects
     * @throws PropelException
     */
    public function getGroupingFolders($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collGroupingFoldersPartial && !$this->isNew();
        if (null === $this->collGroupingFolders || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collGroupingFolders) {
                // return empty collection
                $this->initGroupingFolders();
            } else {
                $collGroupingFolders = GroupingFolderQuery::create(null, $criteria)
                    ->filterByFolder($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collGroupingFoldersPartial && count($collGroupingFolders)) {
                      $this->initGroupingFolders(false);

                      foreach($collGroupingFolders as $obj) {
                        if (false == $this->collGroupingFolders->contains($obj)) {
                          $this->collGroupingFolders->append($obj);
                        }
                      }

                      $this->collGroupingFoldersPartial = true;
                    }

                    return $collGroupingFolders;
                }

                if($partial && $this->collGroupingFolders) {
                    foreach($this->collGroupingFolders as $obj) {
                        if($obj->isNew()) {
                            $collGroupingFolders[] = $obj;
                        }
                    }
                }

                $this->collGroupingFolders = $collGroupingFolders;
                $this->collGroupingFoldersPartial = false;
            }
        }

        return $this->collGroupingFolders;
    }

    /**
     * Sets a collection of GroupingFolder objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $groupingFolders A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setGroupingFolders(PropelCollection $groupingFolders, PropelPDO $con = null)
    {
        $this->groupingFoldersScheduledForDeletion = $this->getGroupingFolders(new Criteria(), $con)->diff($groupingFolders);

        foreach ($this->groupingFoldersScheduledForDeletion as $groupingFolderRemoved) {
            $groupingFolderRemoved->setFolder(null);
        }

        $this->collGroupingFolders = null;
        foreach ($groupingFolders as $groupingFolder) {
            $this->addGroupingFolder($groupingFolder);
        }

        $this->collGroupingFolders = $groupingFolders;
        $this->collGroupingFoldersPartial = false;
    }

    /**
     * Returns the number of related GroupingFolder objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related GroupingFolder objects.
     * @throws PropelException
     */
    public function countGroupingFolders(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collGroupingFoldersPartial && !$this->isNew();
        if (null === $this->collGroupingFolders || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collGroupingFolders) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getGroupingFolders());
                }
                $query = GroupingFolderQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByFolder($this)
                    ->count($con);
            }
        } else {
            return count($this->collGroupingFolders);
        }
    }

    /**
     * Method called to associate a GroupingFolder object to this object
     * through the GroupingFolder foreign key attribute.
     *
     * @param    GroupingFolder $l GroupingFolder
     * @return Folder The current object (for fluent API support)
     */
    public function addGroupingFolder(GroupingFolder $l)
    {
        if ($this->collGroupingFolders === null) {
            $this->initGroupingFolders();
            $this->collGroupingFoldersPartial = true;
        }
        if (!in_array($l, $this->collGroupingFolders->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddGroupingFolder($l);
        }

        return $this;
    }

    /**
     * @param	GroupingFolder $groupingFolder The groupingFolder object to add.
     */
    protected function doAddGroupingFolder($groupingFolder)
    {
        $this->collGroupingFolders[]= $groupingFolder;
        $groupingFolder->setFolder($this);
    }

    /**
     * @param	GroupingFolder $groupingFolder The groupingFolder object to remove.
     */
    public function removeGroupingFolder($groupingFolder)
    {
        if ($this->getGroupingFolders()->contains($groupingFolder)) {
            $this->collGroupingFolders->remove($this->collGroupingFolders->search($groupingFolder));
            if (null === $this->groupingFoldersScheduledForDeletion) {
                $this->groupingFoldersScheduledForDeletion = clone $this->collGroupingFolders;
                $this->groupingFoldersScheduledForDeletion->clear();
            }
            $this->groupingFoldersScheduledForDeletion[]= $groupingFolder;
            $groupingFolder->setFolder(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Folder is new, it will return
     * an empty collection; or if this Folder has previously
     * been saved, it will retrieve related GroupingFolders from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Folder.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|GroupingFolder[] List of GroupingFolder objects
     */
    public function getGroupingFoldersJoinGrouping($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = GroupingFolderQuery::create(null, $criteria);
        $query->joinWith('Grouping', $join_behavior);

        return $this->getGroupingFolders($query, $con);
    }

    /**
     * Clears out the collFolderPermissions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addFolderPermissions()
     */
    public function clearFolderPermissions()
    {
        $this->collFolderPermissions = null; // important to set this to null since that means it is uninitialized
        $this->collFolderPermissionsPartial = null;
    }

    /**
     * reset is the collFolderPermissions collection loaded partially
     *
     * @return void
     */
    public function resetPartialFolderPermissions($v = true)
    {
        $this->collFolderPermissionsPartial = $v;
    }

    /**
     * Initializes the collFolderPermissions collection.
     *
     * By default this just sets the collFolderPermissions collection to an empty array (like clearcollFolderPermissions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initFolderPermissions($overrideExisting = true)
    {
        if (null !== $this->collFolderPermissions && !$overrideExisting) {
            return;
        }
        $this->collFolderPermissions = new PropelObjectCollection();
        $this->collFolderPermissions->setModel('FolderPermission');
    }

    /**
     * Gets an array of FolderPermission objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Folder is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|FolderPermission[] List of FolderPermission objects
     * @throws PropelException
     */
    public function getFolderPermissions($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collFolderPermissionsPartial && !$this->isNew();
        if (null === $this->collFolderPermissions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collFolderPermissions) {
                // return empty collection
                $this->initFolderPermissions();
            } else {
                $collFolderPermissions = FolderPermissionQuery::create(null, $criteria)
                    ->filterByFolder($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collFolderPermissionsPartial && count($collFolderPermissions)) {
                      $this->initFolderPermissions(false);

                      foreach($collFolderPermissions as $obj) {
                        if (false == $this->collFolderPermissions->contains($obj)) {
                          $this->collFolderPermissions->append($obj);
                        }
                      }

                      $this->collFolderPermissionsPartial = true;
                    }

                    return $collFolderPermissions;
                }

                if($partial && $this->collFolderPermissions) {
                    foreach($this->collFolderPermissions as $obj) {
                        if($obj->isNew()) {
                            $collFolderPermissions[] = $obj;
                        }
                    }
                }

                $this->collFolderPermissions = $collFolderPermissions;
                $this->collFolderPermissionsPartial = false;
            }
        }

        return $this->collFolderPermissions;
    }

    /**
     * Sets a collection of FolderPermission objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $folderPermissions A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setFolderPermissions(PropelCollection $folderPermissions, PropelPDO $con = null)
    {
        $this->folderPermissionsScheduledForDeletion = $this->getFolderPermissions(new Criteria(), $con)->diff($folderPermissions);

        foreach ($this->folderPermissionsScheduledForDeletion as $folderPermissionRemoved) {
            $folderPermissionRemoved->setFolder(null);
        }

        $this->collFolderPermissions = null;
        foreach ($folderPermissions as $folderPermission) {
            $this->addFolderPermission($folderPermission);
        }

        $this->collFolderPermissions = $folderPermissions;
        $this->collFolderPermissionsPartial = false;
    }

    /**
     * Returns the number of related FolderPermission objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related FolderPermission objects.
     * @throws PropelException
     */
    public function countFolderPermissions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collFolderPermissionsPartial && !$this->isNew();
        if (null === $this->collFolderPermissions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collFolderPermissions) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getFolderPermissions());
                }
                $query = FolderPermissionQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByFolder($this)
                    ->count($con);
            }
        } else {
            return count($this->collFolderPermissions);
        }
    }

    /**
     * Method called to associate a FolderPermission object to this object
     * through the FolderPermission foreign key attribute.
     *
     * @param    FolderPermission $l FolderPermission
     * @return Folder The current object (for fluent API support)
     */
    public function addFolderPermission(FolderPermission $l)
    {
        if ($this->collFolderPermissions === null) {
            $this->initFolderPermissions();
            $this->collFolderPermissionsPartial = true;
        }
        if (!in_array($l, $this->collFolderPermissions->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddFolderPermission($l);
        }

        return $this;
    }

    /**
     * @param	FolderPermission $folderPermission The folderPermission object to add.
     */
    protected function doAddFolderPermission($folderPermission)
    {
        $this->collFolderPermissions[]= $folderPermission;
        $folderPermission->setFolder($this);
    }

    /**
     * @param	FolderPermission $folderPermission The folderPermission object to remove.
     */
    public function removeFolderPermission($folderPermission)
    {
        if ($this->getFolderPermissions()->contains($folderPermission)) {
            $this->collFolderPermissions->remove($this->collFolderPermissions->search($folderPermission));
            if (null === $this->folderPermissionsScheduledForDeletion) {
                $this->folderPermissionsScheduledForDeletion = clone $this->collFolderPermissions;
                $this->folderPermissionsScheduledForDeletion->clear();
            }
            $this->folderPermissionsScheduledForDeletion[]= $folderPermission;
            $folderPermission->setFolder(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Folder is new, it will return
     * an empty collection; or if this Folder has previously
     * been saved, it will retrieve related FolderPermissions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Folder.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|FolderPermission[] List of FolderPermission objects
     */
    public function getFolderPermissionsJoinProfileGroup($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = FolderPermissionQuery::create(null, $criteria);
        $query->joinWith('ProfileGroup', $join_behavior);

        return $this->getFolderPermissions($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->snapshot_id = null;
        $this->category_id = null;
        $this->order_nr = null;
        $this->display_name = null;
        $this->description = null;
        $this->is_divided = null;
        $this->is_private = null;
        $this->filter = null;
        $this->filter_description = null;
        $this->mandatory_review = null;
        $this->mandatory_approval = null;
        $this->review_notes = null;
        $this->approval_notes = null;
        $this->show_revision_nr = null;
        $this->autoclean = null;
        $this->max_uploads = null;
        $this->public_token = null;
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
            if ($this->collFolderDeliveries) {
                foreach ($this->collFolderDeliveries as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEventFolders) {
                foreach ($this->collEventFolders as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCategoryFolders) {
                foreach ($this->collCategoryFolders as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collGroupingFolders) {
                foreach ($this->collGroupingFolders as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collFolderPermissions) {
                foreach ($this->collFolderPermissions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        if ($this->collFolderDeliveries instanceof PropelCollection) {
            $this->collFolderDeliveries->clearIterator();
        }
        $this->collFolderDeliveries = null;
        if ($this->collEventFolders instanceof PropelCollection) {
            $this->collEventFolders->clearIterator();
        }
        $this->collEventFolders = null;
        if ($this->collCategoryFolders instanceof PropelCollection) {
            $this->collCategoryFolders->clearIterator();
        }
        $this->collCategoryFolders = null;
        if ($this->collGroupingFolders instanceof PropelCollection) {
            $this->collGroupingFolders->clearIterator();
        }
        $this->collGroupingFolders = null;
        if ($this->collFolderPermissions instanceof PropelCollection) {
            $this->collFolderPermissions->clearIterator();
        }
        $this->collFolderPermissions = null;
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
