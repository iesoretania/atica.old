<?php


/**
 * Base class that represents a row from the 'person' table.
 *
 *
 *
 * @package    propel.generator.atica.om
 */
abstract class BasePerson extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'PersonPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        PersonPeer
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
     * The value for the user_name field.
     * @var        string
     */
    protected $user_name;

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
     * The value for the password field.
     * @var        string
     */
    protected $password;

    /**
     * The value for the gender field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $gender;

    /**
     * The value for the email field.
     * @var        string
     */
    protected $email;

    /**
     * The value for the email_enabled field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $email_enabled;

    /**
     * The value for the is_global_administrator field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $is_global_administrator;

    /**
     * The value for the token field.
     * @var        string
     */
    protected $token;

    /**
     * The value for the token_expiration field.
     * @var        string
     */
    protected $token_expiration;

    /**
     * The value for the token_operation field.
     * @var        int
     */
    protected $token_operation;

    /**
     * The value for the token_data field.
     * @var        string
     */
    protected $token_data;

    /**
     * The value for the bad_password_count field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $bad_password_count;

    /**
     * The value for the blocked_access field.
     * @var        string
     */
    protected $blocked_access;

    /**
     * The value for the last_login field.
     * @var        string
     */
    protected $last_login;

    /**
     * @var        PropelObjectCollection|CompletedEvent[] Collection to store aggregation of CompletedEvent objects.
     */
    protected $collCompletedEvents;
    protected $collCompletedEventsPartial;

    /**
     * @var        PropelObjectCollection|NonConformance[] Collection to store aggregation of NonConformance objects.
     */
    protected $collNonConformancesRelatedByClosedBy;
    protected $collNonConformancesRelatedByClosedByPartial;

    /**
     * @var        PropelObjectCollection|NonConformance[] Collection to store aggregation of NonConformance objects.
     */
    protected $collNonConformancesRelatedByOpenedBy;
    protected $collNonConformancesRelatedByOpenedByPartial;

    /**
     * @var        PropelObjectCollection|PersonOrganization[] Collection to store aggregation of PersonOrganization objects.
     */
    protected $collPersonOrganizations;
    protected $collPersonOrganizationsPartial;

    /**
     * @var        PropelObjectCollection|PersonPreferences[] Collection to store aggregation of PersonPreferences objects.
     */
    protected $collPersonPreferencess;
    protected $collPersonPreferencessPartial;

    /**
     * @var        PropelObjectCollection|PersonProfile[] Collection to store aggregation of PersonProfile objects.
     */
    protected $collPersonProfiles;
    protected $collPersonProfilesPartial;

    /**
     * @var        PropelObjectCollection|Revision[] Collection to store aggregation of Revision objects.
     */
    protected $collRevisionsRelatedByApproverPersonId;
    protected $collRevisionsRelatedByApproverPersonIdPartial;

    /**
     * @var        PropelObjectCollection|Revision[] Collection to store aggregation of Revision objects.
     */
    protected $collRevisionsRelatedByReviewerPersonId;
    protected $collRevisionsRelatedByReviewerPersonIdPartial;

    /**
     * @var        PropelObjectCollection|Revision[] Collection to store aggregation of Revision objects.
     */
    protected $collRevisionsRelatedByUploaderPersonId;
    protected $collRevisionsRelatedByUploaderPersonIdPartial;

    /**
     * @var        PropelObjectCollection|Session[] Collection to store aggregation of Session objects.
     */
    protected $collSessions;
    protected $collSessionsPartial;

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
    protected $nonConformancesRelatedByClosedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $nonConformancesRelatedByOpenedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $personOrganizationsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $personPreferencessScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $personProfilesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $revisionsRelatedByApproverPersonIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $revisionsRelatedByReviewerPersonIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $revisionsRelatedByUploaderPersonIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $sessionsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->gender = 0;
        $this->email_enabled = false;
        $this->is_global_administrator = false;
        $this->bad_password_count = 0;
    }

    /**
     * Initializes internal state of BasePerson object.
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
     * Get the [user_name] column value.
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->user_name;
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
     * Get the [password] column value.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the [gender] column value.
     *
     * @return int
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Get the [email] column value.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the [email_enabled] column value.
     *
     * @return boolean
     */
    public function getEmailEnabled()
    {
        return $this->email_enabled;
    }

    /**
     * Get the [is_global_administrator] column value.
     *
     * @return boolean
     */
    public function getIsGlobalAdministrator()
    {
        return $this->is_global_administrator;
    }

    /**
     * Get the [token] column value.
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Get the [optionally formatted] temporal [token_expiration] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTokenExpiration($format = 'Y-m-d H:i:s')
    {
        if ($this->token_expiration === null) {
            return null;
        }

        if ($this->token_expiration === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        } else {
            try {
                $dt = new DateTime($this->token_expiration);
            } catch (Exception $x) {
                throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->token_expiration, true), $x);
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
     * Get the [token_operation] column value.
     *
     * @return int
     */
    public function getTokenOperation()
    {
        return $this->token_operation;
    }

    /**
     * Get the [token_data] column value.
     *
     * @return string
     */
    public function getTokenData()
    {
        return $this->token_data;
    }

    /**
     * Get the [bad_password_count] column value.
     *
     * @return int
     */
    public function getBadPasswordCount()
    {
        return $this->bad_password_count;
    }

    /**
     * Get the [optionally formatted] temporal [blocked_access] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getBlockedAccess($format = 'Y-m-d H:i:s')
    {
        if ($this->blocked_access === null) {
            return null;
        }

        if ($this->blocked_access === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        } else {
            try {
                $dt = new DateTime($this->blocked_access);
            } catch (Exception $x) {
                throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->blocked_access, true), $x);
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
     * Get the [optionally formatted] temporal [last_login] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getLastLogin($format = 'Y-m-d H:i:s')
    {
        if ($this->last_login === null) {
            return null;
        }

        if ($this->last_login === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        } else {
            try {
                $dt = new DateTime($this->last_login);
            } catch (Exception $x) {
                throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->last_login, true), $x);
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
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = PersonPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [user_name] column.
     *
     * @param string $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setUserName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->user_name !== $v) {
            $this->user_name = $v;
            $this->modifiedColumns[] = PersonPeer::USER_NAME;
        }


        return $this;
    } // setUserName()

    /**
     * Set the value of [display_name] column.
     *
     * @param string $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setDisplayName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->display_name !== $v) {
            $this->display_name = $v;
            $this->modifiedColumns[] = PersonPeer::DISPLAY_NAME;
        }


        return $this;
    } // setDisplayName()

    /**
     * Set the value of [description] column.
     *
     * @param string $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[] = PersonPeer::DESCRIPTION;
        }


        return $this;
    } // setDescription()

    /**
     * Set the value of [password] column.
     *
     * @param string $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setPassword($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->password !== $v) {
            $this->password = $v;
            $this->modifiedColumns[] = PersonPeer::PASSWORD;
        }


        return $this;
    } // setPassword()

    /**
     * Set the value of [gender] column.
     *
     * @param int $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setGender($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->gender !== $v) {
            $this->gender = $v;
            $this->modifiedColumns[] = PersonPeer::GENDER;
        }


        return $this;
    } // setGender()

    /**
     * Set the value of [email] column.
     *
     * @param string $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[] = PersonPeer::EMAIL;
        }


        return $this;
    } // setEmail()

    /**
     * Sets the value of the [email_enabled] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Person The current object (for fluent API support)
     */
    public function setEmailEnabled($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->email_enabled !== $v) {
            $this->email_enabled = $v;
            $this->modifiedColumns[] = PersonPeer::EMAIL_ENABLED;
        }


        return $this;
    } // setEmailEnabled()

    /**
     * Sets the value of the [is_global_administrator] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Person The current object (for fluent API support)
     */
    public function setIsGlobalAdministrator($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_global_administrator !== $v) {
            $this->is_global_administrator = $v;
            $this->modifiedColumns[] = PersonPeer::IS_GLOBAL_ADMINISTRATOR;
        }


        return $this;
    } // setIsGlobalAdministrator()

    /**
     * Set the value of [token] column.
     *
     * @param string $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setToken($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->token !== $v) {
            $this->token = $v;
            $this->modifiedColumns[] = PersonPeer::TOKEN;
        }


        return $this;
    } // setToken()

    /**
     * Sets the value of [token_expiration] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Person The current object (for fluent API support)
     */
    public function setTokenExpiration($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->token_expiration !== null || $dt !== null) {
            $currentDateAsString = ($this->token_expiration !== null && $tmpDt = new DateTime($this->token_expiration)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->token_expiration = $newDateAsString;
                $this->modifiedColumns[] = PersonPeer::TOKEN_EXPIRATION;
            }
        } // if either are not null


        return $this;
    } // setTokenExpiration()

    /**
     * Set the value of [token_operation] column.
     *
     * @param int $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setTokenOperation($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->token_operation !== $v) {
            $this->token_operation = $v;
            $this->modifiedColumns[] = PersonPeer::TOKEN_OPERATION;
        }


        return $this;
    } // setTokenOperation()

    /**
     * Set the value of [token_data] column.
     *
     * @param string $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setTokenData($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->token_data !== $v) {
            $this->token_data = $v;
            $this->modifiedColumns[] = PersonPeer::TOKEN_DATA;
        }


        return $this;
    } // setTokenData()

    /**
     * Set the value of [bad_password_count] column.
     *
     * @param int $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setBadPasswordCount($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->bad_password_count !== $v) {
            $this->bad_password_count = $v;
            $this->modifiedColumns[] = PersonPeer::BAD_PASSWORD_COUNT;
        }


        return $this;
    } // setBadPasswordCount()

    /**
     * Sets the value of [blocked_access] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Person The current object (for fluent API support)
     */
    public function setBlockedAccess($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->blocked_access !== null || $dt !== null) {
            $currentDateAsString = ($this->blocked_access !== null && $tmpDt = new DateTime($this->blocked_access)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->blocked_access = $newDateAsString;
                $this->modifiedColumns[] = PersonPeer::BLOCKED_ACCESS;
            }
        } // if either are not null


        return $this;
    } // setBlockedAccess()

    /**
     * Sets the value of [last_login] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Person The current object (for fluent API support)
     */
    public function setLastLogin($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_login !== null || $dt !== null) {
            $currentDateAsString = ($this->last_login !== null && $tmpDt = new DateTime($this->last_login)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_login = $newDateAsString;
                $this->modifiedColumns[] = PersonPeer::LAST_LOGIN;
            }
        } // if either are not null


        return $this;
    } // setLastLogin()

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
            if ($this->gender !== 0) {
                return false;
            }

            if ($this->email_enabled !== false) {
                return false;
            }

            if ($this->is_global_administrator !== false) {
                return false;
            }

            if ($this->bad_password_count !== 0) {
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
            $this->user_name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->display_name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->description = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->password = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->gender = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->email = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->email_enabled = ($row[$startcol + 7] !== null) ? (boolean) $row[$startcol + 7] : null;
            $this->is_global_administrator = ($row[$startcol + 8] !== null) ? (boolean) $row[$startcol + 8] : null;
            $this->token = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->token_expiration = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->token_operation = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
            $this->token_data = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->bad_password_count = ($row[$startcol + 13] !== null) ? (int) $row[$startcol + 13] : null;
            $this->blocked_access = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->last_login = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 16; // 16 = PersonPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Person object", $e);
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
            $con = Propel::getConnection(PersonPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = PersonPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collCompletedEvents = null;

            $this->collNonConformancesRelatedByClosedBy = null;

            $this->collNonConformancesRelatedByOpenedBy = null;

            $this->collPersonOrganizations = null;

            $this->collPersonPreferencess = null;

            $this->collPersonProfiles = null;

            $this->collRevisionsRelatedByApproverPersonId = null;

            $this->collRevisionsRelatedByReviewerPersonId = null;

            $this->collRevisionsRelatedByUploaderPersonId = null;

            $this->collSessions = null;

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
            $con = Propel::getConnection(PersonPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = PersonQuery::create()
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
            $con = Propel::getConnection(PersonPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                PersonPeer::addInstanceToPool($this);
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

            if ($this->nonConformancesRelatedByClosedByScheduledForDeletion !== null) {
                if (!$this->nonConformancesRelatedByClosedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->nonConformancesRelatedByClosedByScheduledForDeletion as $nonConformanceRelatedByClosedBy) {
                        // need to save related object because we set the relation to null
                        $nonConformanceRelatedByClosedBy->save($con);
                    }
                    $this->nonConformancesRelatedByClosedByScheduledForDeletion = null;
                }
            }

            if ($this->collNonConformancesRelatedByClosedBy !== null) {
                foreach ($this->collNonConformancesRelatedByClosedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->nonConformancesRelatedByOpenedByScheduledForDeletion !== null) {
                if (!$this->nonConformancesRelatedByOpenedByScheduledForDeletion->isEmpty()) {
                    NonConformanceQuery::create()
                        ->filterByPrimaryKeys($this->nonConformancesRelatedByOpenedByScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->nonConformancesRelatedByOpenedByScheduledForDeletion = null;
                }
            }

            if ($this->collNonConformancesRelatedByOpenedBy !== null) {
                foreach ($this->collNonConformancesRelatedByOpenedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->personOrganizationsScheduledForDeletion !== null) {
                if (!$this->personOrganizationsScheduledForDeletion->isEmpty()) {
                    PersonOrganizationQuery::create()
                        ->filterByPrimaryKeys($this->personOrganizationsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->personOrganizationsScheduledForDeletion = null;
                }
            }

            if ($this->collPersonOrganizations !== null) {
                foreach ($this->collPersonOrganizations as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->personPreferencessScheduledForDeletion !== null) {
                if (!$this->personPreferencessScheduledForDeletion->isEmpty()) {
                    PersonPreferencesQuery::create()
                        ->filterByPrimaryKeys($this->personPreferencessScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->personPreferencessScheduledForDeletion = null;
                }
            }

            if ($this->collPersonPreferencess !== null) {
                foreach ($this->collPersonPreferencess as $referrerFK) {
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

            if ($this->revisionsRelatedByApproverPersonIdScheduledForDeletion !== null) {
                if (!$this->revisionsRelatedByApproverPersonIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->revisionsRelatedByApproverPersonIdScheduledForDeletion as $revisionRelatedByApproverPersonId) {
                        // need to save related object because we set the relation to null
                        $revisionRelatedByApproverPersonId->save($con);
                    }
                    $this->revisionsRelatedByApproverPersonIdScheduledForDeletion = null;
                }
            }

            if ($this->collRevisionsRelatedByApproverPersonId !== null) {
                foreach ($this->collRevisionsRelatedByApproverPersonId as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->revisionsRelatedByReviewerPersonIdScheduledForDeletion !== null) {
                if (!$this->revisionsRelatedByReviewerPersonIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->revisionsRelatedByReviewerPersonIdScheduledForDeletion as $revisionRelatedByReviewerPersonId) {
                        // need to save related object because we set the relation to null
                        $revisionRelatedByReviewerPersonId->save($con);
                    }
                    $this->revisionsRelatedByReviewerPersonIdScheduledForDeletion = null;
                }
            }

            if ($this->collRevisionsRelatedByReviewerPersonId !== null) {
                foreach ($this->collRevisionsRelatedByReviewerPersonId as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->revisionsRelatedByUploaderPersonIdScheduledForDeletion !== null) {
                if (!$this->revisionsRelatedByUploaderPersonIdScheduledForDeletion->isEmpty()) {
                    RevisionQuery::create()
                        ->filterByPrimaryKeys($this->revisionsRelatedByUploaderPersonIdScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->revisionsRelatedByUploaderPersonIdScheduledForDeletion = null;
                }
            }

            if ($this->collRevisionsRelatedByUploaderPersonId !== null) {
                foreach ($this->collRevisionsRelatedByUploaderPersonId as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->sessionsScheduledForDeletion !== null) {
                if (!$this->sessionsScheduledForDeletion->isEmpty()) {
                    SessionQuery::create()
                        ->filterByPrimaryKeys($this->sessionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->sessionsScheduledForDeletion = null;
                }
            }

            if ($this->collSessions !== null) {
                foreach ($this->collSessions as $referrerFK) {
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

        $this->modifiedColumns[] = PersonPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . PersonPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(PersonPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`ID`';
        }
        if ($this->isColumnModified(PersonPeer::USER_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`USER_NAME`';
        }
        if ($this->isColumnModified(PersonPeer::DISPLAY_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`DISPLAY_NAME`';
        }
        if ($this->isColumnModified(PersonPeer::DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`DESCRIPTION`';
        }
        if ($this->isColumnModified(PersonPeer::PASSWORD)) {
            $modifiedColumns[':p' . $index++]  = '`PASSWORD`';
        }
        if ($this->isColumnModified(PersonPeer::GENDER)) {
            $modifiedColumns[':p' . $index++]  = '`GENDER`';
        }
        if ($this->isColumnModified(PersonPeer::EMAIL)) {
            $modifiedColumns[':p' . $index++]  = '`EMAIL`';
        }
        if ($this->isColumnModified(PersonPeer::EMAIL_ENABLED)) {
            $modifiedColumns[':p' . $index++]  = '`EMAIL_ENABLED`';
        }
        if ($this->isColumnModified(PersonPeer::IS_GLOBAL_ADMINISTRATOR)) {
            $modifiedColumns[':p' . $index++]  = '`IS_GLOBAL_ADMINISTRATOR`';
        }
        if ($this->isColumnModified(PersonPeer::TOKEN)) {
            $modifiedColumns[':p' . $index++]  = '`TOKEN`';
        }
        if ($this->isColumnModified(PersonPeer::TOKEN_EXPIRATION)) {
            $modifiedColumns[':p' . $index++]  = '`TOKEN_EXPIRATION`';
        }
        if ($this->isColumnModified(PersonPeer::TOKEN_OPERATION)) {
            $modifiedColumns[':p' . $index++]  = '`TOKEN_OPERATION`';
        }
        if ($this->isColumnModified(PersonPeer::TOKEN_DATA)) {
            $modifiedColumns[':p' . $index++]  = '`TOKEN_DATA`';
        }
        if ($this->isColumnModified(PersonPeer::BAD_PASSWORD_COUNT)) {
            $modifiedColumns[':p' . $index++]  = '`BAD_PASSWORD_COUNT`';
        }
        if ($this->isColumnModified(PersonPeer::BLOCKED_ACCESS)) {
            $modifiedColumns[':p' . $index++]  = '`BLOCKED_ACCESS`';
        }
        if ($this->isColumnModified(PersonPeer::LAST_LOGIN)) {
            $modifiedColumns[':p' . $index++]  = '`LAST_LOGIN`';
        }

        $sql = sprintf(
            'INSERT INTO `person` (%s) VALUES (%s)',
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
                    case '`USER_NAME`':
                        $stmt->bindValue($identifier, $this->user_name, PDO::PARAM_STR);
                        break;
                    case '`DISPLAY_NAME`':
                        $stmt->bindValue($identifier, $this->display_name, PDO::PARAM_STR);
                        break;
                    case '`DESCRIPTION`':
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
                        break;
                    case '`PASSWORD`':
                        $stmt->bindValue($identifier, $this->password, PDO::PARAM_STR);
                        break;
                    case '`GENDER`':
                        $stmt->bindValue($identifier, $this->gender, PDO::PARAM_INT);
                        break;
                    case '`EMAIL`':
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case '`EMAIL_ENABLED`':
                        $stmt->bindValue($identifier, (int) $this->email_enabled, PDO::PARAM_INT);
                        break;
                    case '`IS_GLOBAL_ADMINISTRATOR`':
                        $stmt->bindValue($identifier, (int) $this->is_global_administrator, PDO::PARAM_INT);
                        break;
                    case '`TOKEN`':
                        $stmt->bindValue($identifier, $this->token, PDO::PARAM_STR);
                        break;
                    case '`TOKEN_EXPIRATION`':
                        $stmt->bindValue($identifier, $this->token_expiration, PDO::PARAM_STR);
                        break;
                    case '`TOKEN_OPERATION`':
                        $stmt->bindValue($identifier, $this->token_operation, PDO::PARAM_INT);
                        break;
                    case '`TOKEN_DATA`':
                        $stmt->bindValue($identifier, $this->token_data, PDO::PARAM_STR);
                        break;
                    case '`BAD_PASSWORD_COUNT`':
                        $stmt->bindValue($identifier, $this->bad_password_count, PDO::PARAM_INT);
                        break;
                    case '`BLOCKED_ACCESS`':
                        $stmt->bindValue($identifier, $this->blocked_access, PDO::PARAM_STR);
                        break;
                    case '`LAST_LOGIN`':
                        $stmt->bindValue($identifier, $this->last_login, PDO::PARAM_STR);
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


            if (($retval = PersonPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collCompletedEvents !== null) {
                    foreach ($this->collCompletedEvents as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collNonConformancesRelatedByClosedBy !== null) {
                    foreach ($this->collNonConformancesRelatedByClosedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collNonConformancesRelatedByOpenedBy !== null) {
                    foreach ($this->collNonConformancesRelatedByOpenedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPersonOrganizations !== null) {
                    foreach ($this->collPersonOrganizations as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPersonPreferencess !== null) {
                    foreach ($this->collPersonPreferencess as $referrerFK) {
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

                if ($this->collRevisionsRelatedByApproverPersonId !== null) {
                    foreach ($this->collRevisionsRelatedByApproverPersonId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collRevisionsRelatedByReviewerPersonId !== null) {
                    foreach ($this->collRevisionsRelatedByReviewerPersonId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collRevisionsRelatedByUploaderPersonId !== null) {
                    foreach ($this->collRevisionsRelatedByUploaderPersonId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collSessions !== null) {
                    foreach ($this->collSessions as $referrerFK) {
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
        $pos = PersonPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getUserName();
                break;
            case 2:
                return $this->getDisplayName();
                break;
            case 3:
                return $this->getDescription();
                break;
            case 4:
                return $this->getPassword();
                break;
            case 5:
                return $this->getGender();
                break;
            case 6:
                return $this->getEmail();
                break;
            case 7:
                return $this->getEmailEnabled();
                break;
            case 8:
                return $this->getIsGlobalAdministrator();
                break;
            case 9:
                return $this->getToken();
                break;
            case 10:
                return $this->getTokenExpiration();
                break;
            case 11:
                return $this->getTokenOperation();
                break;
            case 12:
                return $this->getTokenData();
                break;
            case 13:
                return $this->getBadPasswordCount();
                break;
            case 14:
                return $this->getBlockedAccess();
                break;
            case 15:
                return $this->getLastLogin();
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
        if (isset($alreadyDumpedObjects['Person'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Person'][$this->getPrimaryKey()] = true;
        $keys = PersonPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getUserName(),
            $keys[2] => $this->getDisplayName(),
            $keys[3] => $this->getDescription(),
            $keys[4] => $this->getPassword(),
            $keys[5] => $this->getGender(),
            $keys[6] => $this->getEmail(),
            $keys[7] => $this->getEmailEnabled(),
            $keys[8] => $this->getIsGlobalAdministrator(),
            $keys[9] => $this->getToken(),
            $keys[10] => $this->getTokenExpiration(),
            $keys[11] => $this->getTokenOperation(),
            $keys[12] => $this->getTokenData(),
            $keys[13] => $this->getBadPasswordCount(),
            $keys[14] => $this->getBlockedAccess(),
            $keys[15] => $this->getLastLogin(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collCompletedEvents) {
                $result['CompletedEvents'] = $this->collCompletedEvents->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collNonConformancesRelatedByClosedBy) {
                $result['NonConformancesRelatedByClosedBy'] = $this->collNonConformancesRelatedByClosedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collNonConformancesRelatedByOpenedBy) {
                $result['NonConformancesRelatedByOpenedBy'] = $this->collNonConformancesRelatedByOpenedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPersonOrganizations) {
                $result['PersonOrganizations'] = $this->collPersonOrganizations->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPersonPreferencess) {
                $result['PersonPreferencess'] = $this->collPersonPreferencess->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPersonProfiles) {
                $result['PersonProfiles'] = $this->collPersonProfiles->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRevisionsRelatedByApproverPersonId) {
                $result['RevisionsRelatedByApproverPersonId'] = $this->collRevisionsRelatedByApproverPersonId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRevisionsRelatedByReviewerPersonId) {
                $result['RevisionsRelatedByReviewerPersonId'] = $this->collRevisionsRelatedByReviewerPersonId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRevisionsRelatedByUploaderPersonId) {
                $result['RevisionsRelatedByUploaderPersonId'] = $this->collRevisionsRelatedByUploaderPersonId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSessions) {
                $result['Sessions'] = $this->collSessions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = PersonPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setUserName($value);
                break;
            case 2:
                $this->setDisplayName($value);
                break;
            case 3:
                $this->setDescription($value);
                break;
            case 4:
                $this->setPassword($value);
                break;
            case 5:
                $this->setGender($value);
                break;
            case 6:
                $this->setEmail($value);
                break;
            case 7:
                $this->setEmailEnabled($value);
                break;
            case 8:
                $this->setIsGlobalAdministrator($value);
                break;
            case 9:
                $this->setToken($value);
                break;
            case 10:
                $this->setTokenExpiration($value);
                break;
            case 11:
                $this->setTokenOperation($value);
                break;
            case 12:
                $this->setTokenData($value);
                break;
            case 13:
                $this->setBadPasswordCount($value);
                break;
            case 14:
                $this->setBlockedAccess($value);
                break;
            case 15:
                $this->setLastLogin($value);
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
        $keys = PersonPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setUserName($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setDisplayName($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setDescription($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setPassword($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setGender($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setEmail($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setEmailEnabled($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setIsGlobalAdministrator($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setToken($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setTokenExpiration($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setTokenOperation($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setTokenData($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setBadPasswordCount($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setBlockedAccess($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setLastLogin($arr[$keys[15]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(PersonPeer::DATABASE_NAME);

        if ($this->isColumnModified(PersonPeer::ID)) $criteria->add(PersonPeer::ID, $this->id);
        if ($this->isColumnModified(PersonPeer::USER_NAME)) $criteria->add(PersonPeer::USER_NAME, $this->user_name);
        if ($this->isColumnModified(PersonPeer::DISPLAY_NAME)) $criteria->add(PersonPeer::DISPLAY_NAME, $this->display_name);
        if ($this->isColumnModified(PersonPeer::DESCRIPTION)) $criteria->add(PersonPeer::DESCRIPTION, $this->description);
        if ($this->isColumnModified(PersonPeer::PASSWORD)) $criteria->add(PersonPeer::PASSWORD, $this->password);
        if ($this->isColumnModified(PersonPeer::GENDER)) $criteria->add(PersonPeer::GENDER, $this->gender);
        if ($this->isColumnModified(PersonPeer::EMAIL)) $criteria->add(PersonPeer::EMAIL, $this->email);
        if ($this->isColumnModified(PersonPeer::EMAIL_ENABLED)) $criteria->add(PersonPeer::EMAIL_ENABLED, $this->email_enabled);
        if ($this->isColumnModified(PersonPeer::IS_GLOBAL_ADMINISTRATOR)) $criteria->add(PersonPeer::IS_GLOBAL_ADMINISTRATOR, $this->is_global_administrator);
        if ($this->isColumnModified(PersonPeer::TOKEN)) $criteria->add(PersonPeer::TOKEN, $this->token);
        if ($this->isColumnModified(PersonPeer::TOKEN_EXPIRATION)) $criteria->add(PersonPeer::TOKEN_EXPIRATION, $this->token_expiration);
        if ($this->isColumnModified(PersonPeer::TOKEN_OPERATION)) $criteria->add(PersonPeer::TOKEN_OPERATION, $this->token_operation);
        if ($this->isColumnModified(PersonPeer::TOKEN_DATA)) $criteria->add(PersonPeer::TOKEN_DATA, $this->token_data);
        if ($this->isColumnModified(PersonPeer::BAD_PASSWORD_COUNT)) $criteria->add(PersonPeer::BAD_PASSWORD_COUNT, $this->bad_password_count);
        if ($this->isColumnModified(PersonPeer::BLOCKED_ACCESS)) $criteria->add(PersonPeer::BLOCKED_ACCESS, $this->blocked_access);
        if ($this->isColumnModified(PersonPeer::LAST_LOGIN)) $criteria->add(PersonPeer::LAST_LOGIN, $this->last_login);

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
        $criteria = new Criteria(PersonPeer::DATABASE_NAME);
        $criteria->add(PersonPeer::ID, $this->id);

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
     * @param object $copyObj An object of Person (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setUserName($this->getUserName());
        $copyObj->setDisplayName($this->getDisplayName());
        $copyObj->setDescription($this->getDescription());
        $copyObj->setPassword($this->getPassword());
        $copyObj->setGender($this->getGender());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setEmailEnabled($this->getEmailEnabled());
        $copyObj->setIsGlobalAdministrator($this->getIsGlobalAdministrator());
        $copyObj->setToken($this->getToken());
        $copyObj->setTokenExpiration($this->getTokenExpiration());
        $copyObj->setTokenOperation($this->getTokenOperation());
        $copyObj->setTokenData($this->getTokenData());
        $copyObj->setBadPasswordCount($this->getBadPasswordCount());
        $copyObj->setBlockedAccess($this->getBlockedAccess());
        $copyObj->setLastLogin($this->getLastLogin());

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

            foreach ($this->getNonConformancesRelatedByClosedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addNonConformanceRelatedByClosedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getNonConformancesRelatedByOpenedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addNonConformanceRelatedByOpenedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPersonOrganizations() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPersonOrganization($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPersonPreferencess() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPersonPreferences($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPersonProfiles() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPersonProfile($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRevisionsRelatedByApproverPersonId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRevisionRelatedByApproverPersonId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRevisionsRelatedByReviewerPersonId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRevisionRelatedByReviewerPersonId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRevisionsRelatedByUploaderPersonId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRevisionRelatedByUploaderPersonId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSessions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSession($relObj->copy($deepCopy));
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
     * @return Person Clone of current object.
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
     * @return PersonPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new PersonPeer();
        }

        return self::$peer;
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
        if ('NonConformanceRelatedByClosedBy' == $relationName) {
            $this->initNonConformancesRelatedByClosedBy();
        }
        if ('NonConformanceRelatedByOpenedBy' == $relationName) {
            $this->initNonConformancesRelatedByOpenedBy();
        }
        if ('PersonOrganization' == $relationName) {
            $this->initPersonOrganizations();
        }
        if ('PersonPreferences' == $relationName) {
            $this->initPersonPreferencess();
        }
        if ('PersonProfile' == $relationName) {
            $this->initPersonProfiles();
        }
        if ('RevisionRelatedByApproverPersonId' == $relationName) {
            $this->initRevisionsRelatedByApproverPersonId();
        }
        if ('RevisionRelatedByReviewerPersonId' == $relationName) {
            $this->initRevisionsRelatedByReviewerPersonId();
        }
        if ('RevisionRelatedByUploaderPersonId' == $relationName) {
            $this->initRevisionsRelatedByUploaderPersonId();
        }
        if ('Session' == $relationName) {
            $this->initSessions();
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
     * If this Person is new, it will return
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
                    ->filterByPerson($this)
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
            $completedEventRemoved->setPerson(null);
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
                    ->filterByPerson($this)
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
     * @return Person The current object (for fluent API support)
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
        $completedEvent->setPerson($this);
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
            $completedEvent->setPerson(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related CompletedEvents from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|CompletedEvent[] List of CompletedEvent objects
     */
    public function getCompletedEventsJoinEvent($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = CompletedEventQuery::create(null, $criteria);
        $query->joinWith('Event', $join_behavior);

        return $this->getCompletedEvents($query, $con);
    }

    /**
     * Clears out the collNonConformancesRelatedByClosedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addNonConformancesRelatedByClosedBy()
     */
    public function clearNonConformancesRelatedByClosedBy()
    {
        $this->collNonConformancesRelatedByClosedBy = null; // important to set this to null since that means it is uninitialized
        $this->collNonConformancesRelatedByClosedByPartial = null;
    }

    /**
     * reset is the collNonConformancesRelatedByClosedBy collection loaded partially
     *
     * @return void
     */
    public function resetPartialNonConformancesRelatedByClosedBy($v = true)
    {
        $this->collNonConformancesRelatedByClosedByPartial = $v;
    }

    /**
     * Initializes the collNonConformancesRelatedByClosedBy collection.
     *
     * By default this just sets the collNonConformancesRelatedByClosedBy collection to an empty array (like clearcollNonConformancesRelatedByClosedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initNonConformancesRelatedByClosedBy($overrideExisting = true)
    {
        if (null !== $this->collNonConformancesRelatedByClosedBy && !$overrideExisting) {
            return;
        }
        $this->collNonConformancesRelatedByClosedBy = new PropelObjectCollection();
        $this->collNonConformancesRelatedByClosedBy->setModel('NonConformance');
    }

    /**
     * Gets an array of NonConformance objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Person is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|NonConformance[] List of NonConformance objects
     * @throws PropelException
     */
    public function getNonConformancesRelatedByClosedBy($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collNonConformancesRelatedByClosedByPartial && !$this->isNew();
        if (null === $this->collNonConformancesRelatedByClosedBy || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collNonConformancesRelatedByClosedBy) {
                // return empty collection
                $this->initNonConformancesRelatedByClosedBy();
            } else {
                $collNonConformancesRelatedByClosedBy = NonConformanceQuery::create(null, $criteria)
                    ->filterByPersonRelatedByClosedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collNonConformancesRelatedByClosedByPartial && count($collNonConformancesRelatedByClosedBy)) {
                      $this->initNonConformancesRelatedByClosedBy(false);

                      foreach($collNonConformancesRelatedByClosedBy as $obj) {
                        if (false == $this->collNonConformancesRelatedByClosedBy->contains($obj)) {
                          $this->collNonConformancesRelatedByClosedBy->append($obj);
                        }
                      }

                      $this->collNonConformancesRelatedByClosedByPartial = true;
                    }

                    return $collNonConformancesRelatedByClosedBy;
                }

                if($partial && $this->collNonConformancesRelatedByClosedBy) {
                    foreach($this->collNonConformancesRelatedByClosedBy as $obj) {
                        if($obj->isNew()) {
                            $collNonConformancesRelatedByClosedBy[] = $obj;
                        }
                    }
                }

                $this->collNonConformancesRelatedByClosedBy = $collNonConformancesRelatedByClosedBy;
                $this->collNonConformancesRelatedByClosedByPartial = false;
            }
        }

        return $this->collNonConformancesRelatedByClosedBy;
    }

    /**
     * Sets a collection of NonConformanceRelatedByClosedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $nonConformancesRelatedByClosedBy A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setNonConformancesRelatedByClosedBy(PropelCollection $nonConformancesRelatedByClosedBy, PropelPDO $con = null)
    {
        $this->nonConformancesRelatedByClosedByScheduledForDeletion = $this->getNonConformancesRelatedByClosedBy(new Criteria(), $con)->diff($nonConformancesRelatedByClosedBy);

        foreach ($this->nonConformancesRelatedByClosedByScheduledForDeletion as $nonConformanceRelatedByClosedByRemoved) {
            $nonConformanceRelatedByClosedByRemoved->setPersonRelatedByClosedBy(null);
        }

        $this->collNonConformancesRelatedByClosedBy = null;
        foreach ($nonConformancesRelatedByClosedBy as $nonConformanceRelatedByClosedBy) {
            $this->addNonConformanceRelatedByClosedBy($nonConformanceRelatedByClosedBy);
        }

        $this->collNonConformancesRelatedByClosedBy = $nonConformancesRelatedByClosedBy;
        $this->collNonConformancesRelatedByClosedByPartial = false;
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
    public function countNonConformancesRelatedByClosedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collNonConformancesRelatedByClosedByPartial && !$this->isNew();
        if (null === $this->collNonConformancesRelatedByClosedBy || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collNonConformancesRelatedByClosedBy) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getNonConformancesRelatedByClosedBy());
                }
                $query = NonConformanceQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByPersonRelatedByClosedBy($this)
                    ->count($con);
            }
        } else {
            return count($this->collNonConformancesRelatedByClosedBy);
        }
    }

    /**
     * Method called to associate a NonConformance object to this object
     * through the NonConformance foreign key attribute.
     *
     * @param    NonConformance $l NonConformance
     * @return Person The current object (for fluent API support)
     */
    public function addNonConformanceRelatedByClosedBy(NonConformance $l)
    {
        if ($this->collNonConformancesRelatedByClosedBy === null) {
            $this->initNonConformancesRelatedByClosedBy();
            $this->collNonConformancesRelatedByClosedByPartial = true;
        }
        if (!in_array($l, $this->collNonConformancesRelatedByClosedBy->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddNonConformanceRelatedByClosedBy($l);
        }

        return $this;
    }

    /**
     * @param	NonConformanceRelatedByClosedBy $nonConformanceRelatedByClosedBy The nonConformanceRelatedByClosedBy object to add.
     */
    protected function doAddNonConformanceRelatedByClosedBy($nonConformanceRelatedByClosedBy)
    {
        $this->collNonConformancesRelatedByClosedBy[]= $nonConformanceRelatedByClosedBy;
        $nonConformanceRelatedByClosedBy->setPersonRelatedByClosedBy($this);
    }

    /**
     * @param	NonConformanceRelatedByClosedBy $nonConformanceRelatedByClosedBy The nonConformanceRelatedByClosedBy object to remove.
     */
    public function removeNonConformanceRelatedByClosedBy($nonConformanceRelatedByClosedBy)
    {
        if ($this->getNonConformancesRelatedByClosedBy()->contains($nonConformanceRelatedByClosedBy)) {
            $this->collNonConformancesRelatedByClosedBy->remove($this->collNonConformancesRelatedByClosedBy->search($nonConformanceRelatedByClosedBy));
            if (null === $this->nonConformancesRelatedByClosedByScheduledForDeletion) {
                $this->nonConformancesRelatedByClosedByScheduledForDeletion = clone $this->collNonConformancesRelatedByClosedBy;
                $this->nonConformancesRelatedByClosedByScheduledForDeletion->clear();
            }
            $this->nonConformancesRelatedByClosedByScheduledForDeletion[]= $nonConformanceRelatedByClosedBy;
            $nonConformanceRelatedByClosedBy->setPersonRelatedByClosedBy(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related NonConformancesRelatedByClosedBy from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|NonConformance[] List of NonConformance objects
     */
    public function getNonConformancesRelatedByClosedByJoinSnapshot($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = NonConformanceQuery::create(null, $criteria);
        $query->joinWith('Snapshot', $join_behavior);

        return $this->getNonConformancesRelatedByClosedBy($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related NonConformancesRelatedByClosedBy from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|NonConformance[] List of NonConformance objects
     */
    public function getNonConformancesRelatedByClosedByJoinNonConformanceType($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = NonConformanceQuery::create(null, $criteria);
        $query->joinWith('NonConformanceType', $join_behavior);

        return $this->getNonConformancesRelatedByClosedBy($query, $con);
    }

    /**
     * Clears out the collNonConformancesRelatedByOpenedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addNonConformancesRelatedByOpenedBy()
     */
    public function clearNonConformancesRelatedByOpenedBy()
    {
        $this->collNonConformancesRelatedByOpenedBy = null; // important to set this to null since that means it is uninitialized
        $this->collNonConformancesRelatedByOpenedByPartial = null;
    }

    /**
     * reset is the collNonConformancesRelatedByOpenedBy collection loaded partially
     *
     * @return void
     */
    public function resetPartialNonConformancesRelatedByOpenedBy($v = true)
    {
        $this->collNonConformancesRelatedByOpenedByPartial = $v;
    }

    /**
     * Initializes the collNonConformancesRelatedByOpenedBy collection.
     *
     * By default this just sets the collNonConformancesRelatedByOpenedBy collection to an empty array (like clearcollNonConformancesRelatedByOpenedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initNonConformancesRelatedByOpenedBy($overrideExisting = true)
    {
        if (null !== $this->collNonConformancesRelatedByOpenedBy && !$overrideExisting) {
            return;
        }
        $this->collNonConformancesRelatedByOpenedBy = new PropelObjectCollection();
        $this->collNonConformancesRelatedByOpenedBy->setModel('NonConformance');
    }

    /**
     * Gets an array of NonConformance objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Person is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|NonConformance[] List of NonConformance objects
     * @throws PropelException
     */
    public function getNonConformancesRelatedByOpenedBy($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collNonConformancesRelatedByOpenedByPartial && !$this->isNew();
        if (null === $this->collNonConformancesRelatedByOpenedBy || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collNonConformancesRelatedByOpenedBy) {
                // return empty collection
                $this->initNonConformancesRelatedByOpenedBy();
            } else {
                $collNonConformancesRelatedByOpenedBy = NonConformanceQuery::create(null, $criteria)
                    ->filterByPersonRelatedByOpenedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collNonConformancesRelatedByOpenedByPartial && count($collNonConformancesRelatedByOpenedBy)) {
                      $this->initNonConformancesRelatedByOpenedBy(false);

                      foreach($collNonConformancesRelatedByOpenedBy as $obj) {
                        if (false == $this->collNonConformancesRelatedByOpenedBy->contains($obj)) {
                          $this->collNonConformancesRelatedByOpenedBy->append($obj);
                        }
                      }

                      $this->collNonConformancesRelatedByOpenedByPartial = true;
                    }

                    return $collNonConformancesRelatedByOpenedBy;
                }

                if($partial && $this->collNonConformancesRelatedByOpenedBy) {
                    foreach($this->collNonConformancesRelatedByOpenedBy as $obj) {
                        if($obj->isNew()) {
                            $collNonConformancesRelatedByOpenedBy[] = $obj;
                        }
                    }
                }

                $this->collNonConformancesRelatedByOpenedBy = $collNonConformancesRelatedByOpenedBy;
                $this->collNonConformancesRelatedByOpenedByPartial = false;
            }
        }

        return $this->collNonConformancesRelatedByOpenedBy;
    }

    /**
     * Sets a collection of NonConformanceRelatedByOpenedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $nonConformancesRelatedByOpenedBy A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setNonConformancesRelatedByOpenedBy(PropelCollection $nonConformancesRelatedByOpenedBy, PropelPDO $con = null)
    {
        $this->nonConformancesRelatedByOpenedByScheduledForDeletion = $this->getNonConformancesRelatedByOpenedBy(new Criteria(), $con)->diff($nonConformancesRelatedByOpenedBy);

        foreach ($this->nonConformancesRelatedByOpenedByScheduledForDeletion as $nonConformanceRelatedByOpenedByRemoved) {
            $nonConformanceRelatedByOpenedByRemoved->setPersonRelatedByOpenedBy(null);
        }

        $this->collNonConformancesRelatedByOpenedBy = null;
        foreach ($nonConformancesRelatedByOpenedBy as $nonConformanceRelatedByOpenedBy) {
            $this->addNonConformanceRelatedByOpenedBy($nonConformanceRelatedByOpenedBy);
        }

        $this->collNonConformancesRelatedByOpenedBy = $nonConformancesRelatedByOpenedBy;
        $this->collNonConformancesRelatedByOpenedByPartial = false;
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
    public function countNonConformancesRelatedByOpenedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collNonConformancesRelatedByOpenedByPartial && !$this->isNew();
        if (null === $this->collNonConformancesRelatedByOpenedBy || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collNonConformancesRelatedByOpenedBy) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getNonConformancesRelatedByOpenedBy());
                }
                $query = NonConformanceQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByPersonRelatedByOpenedBy($this)
                    ->count($con);
            }
        } else {
            return count($this->collNonConformancesRelatedByOpenedBy);
        }
    }

    /**
     * Method called to associate a NonConformance object to this object
     * through the NonConformance foreign key attribute.
     *
     * @param    NonConformance $l NonConformance
     * @return Person The current object (for fluent API support)
     */
    public function addNonConformanceRelatedByOpenedBy(NonConformance $l)
    {
        if ($this->collNonConformancesRelatedByOpenedBy === null) {
            $this->initNonConformancesRelatedByOpenedBy();
            $this->collNonConformancesRelatedByOpenedByPartial = true;
        }
        if (!in_array($l, $this->collNonConformancesRelatedByOpenedBy->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddNonConformanceRelatedByOpenedBy($l);
        }

        return $this;
    }

    /**
     * @param	NonConformanceRelatedByOpenedBy $nonConformanceRelatedByOpenedBy The nonConformanceRelatedByOpenedBy object to add.
     */
    protected function doAddNonConformanceRelatedByOpenedBy($nonConformanceRelatedByOpenedBy)
    {
        $this->collNonConformancesRelatedByOpenedBy[]= $nonConformanceRelatedByOpenedBy;
        $nonConformanceRelatedByOpenedBy->setPersonRelatedByOpenedBy($this);
    }

    /**
     * @param	NonConformanceRelatedByOpenedBy $nonConformanceRelatedByOpenedBy The nonConformanceRelatedByOpenedBy object to remove.
     */
    public function removeNonConformanceRelatedByOpenedBy($nonConformanceRelatedByOpenedBy)
    {
        if ($this->getNonConformancesRelatedByOpenedBy()->contains($nonConformanceRelatedByOpenedBy)) {
            $this->collNonConformancesRelatedByOpenedBy->remove($this->collNonConformancesRelatedByOpenedBy->search($nonConformanceRelatedByOpenedBy));
            if (null === $this->nonConformancesRelatedByOpenedByScheduledForDeletion) {
                $this->nonConformancesRelatedByOpenedByScheduledForDeletion = clone $this->collNonConformancesRelatedByOpenedBy;
                $this->nonConformancesRelatedByOpenedByScheduledForDeletion->clear();
            }
            $this->nonConformancesRelatedByOpenedByScheduledForDeletion[]= $nonConformanceRelatedByOpenedBy;
            $nonConformanceRelatedByOpenedBy->setPersonRelatedByOpenedBy(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related NonConformancesRelatedByOpenedBy from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|NonConformance[] List of NonConformance objects
     */
    public function getNonConformancesRelatedByOpenedByJoinSnapshot($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = NonConformanceQuery::create(null, $criteria);
        $query->joinWith('Snapshot', $join_behavior);

        return $this->getNonConformancesRelatedByOpenedBy($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related NonConformancesRelatedByOpenedBy from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|NonConformance[] List of NonConformance objects
     */
    public function getNonConformancesRelatedByOpenedByJoinNonConformanceType($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = NonConformanceQuery::create(null, $criteria);
        $query->joinWith('NonConformanceType', $join_behavior);

        return $this->getNonConformancesRelatedByOpenedBy($query, $con);
    }

    /**
     * Clears out the collPersonOrganizations collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addPersonOrganizations()
     */
    public function clearPersonOrganizations()
    {
        $this->collPersonOrganizations = null; // important to set this to null since that means it is uninitialized
        $this->collPersonOrganizationsPartial = null;
    }

    /**
     * reset is the collPersonOrganizations collection loaded partially
     *
     * @return void
     */
    public function resetPartialPersonOrganizations($v = true)
    {
        $this->collPersonOrganizationsPartial = $v;
    }

    /**
     * Initializes the collPersonOrganizations collection.
     *
     * By default this just sets the collPersonOrganizations collection to an empty array (like clearcollPersonOrganizations());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPersonOrganizations($overrideExisting = true)
    {
        if (null !== $this->collPersonOrganizations && !$overrideExisting) {
            return;
        }
        $this->collPersonOrganizations = new PropelObjectCollection();
        $this->collPersonOrganizations->setModel('PersonOrganization');
    }

    /**
     * Gets an array of PersonOrganization objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Person is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|PersonOrganization[] List of PersonOrganization objects
     * @throws PropelException
     */
    public function getPersonOrganizations($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPersonOrganizationsPartial && !$this->isNew();
        if (null === $this->collPersonOrganizations || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPersonOrganizations) {
                // return empty collection
                $this->initPersonOrganizations();
            } else {
                $collPersonOrganizations = PersonOrganizationQuery::create(null, $criteria)
                    ->filterByPerson($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPersonOrganizationsPartial && count($collPersonOrganizations)) {
                      $this->initPersonOrganizations(false);

                      foreach($collPersonOrganizations as $obj) {
                        if (false == $this->collPersonOrganizations->contains($obj)) {
                          $this->collPersonOrganizations->append($obj);
                        }
                      }

                      $this->collPersonOrganizationsPartial = true;
                    }

                    return $collPersonOrganizations;
                }

                if($partial && $this->collPersonOrganizations) {
                    foreach($this->collPersonOrganizations as $obj) {
                        if($obj->isNew()) {
                            $collPersonOrganizations[] = $obj;
                        }
                    }
                }

                $this->collPersonOrganizations = $collPersonOrganizations;
                $this->collPersonOrganizationsPartial = false;
            }
        }

        return $this->collPersonOrganizations;
    }

    /**
     * Sets a collection of PersonOrganization objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $personOrganizations A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setPersonOrganizations(PropelCollection $personOrganizations, PropelPDO $con = null)
    {
        $this->personOrganizationsScheduledForDeletion = $this->getPersonOrganizations(new Criteria(), $con)->diff($personOrganizations);

        foreach ($this->personOrganizationsScheduledForDeletion as $personOrganizationRemoved) {
            $personOrganizationRemoved->setPerson(null);
        }

        $this->collPersonOrganizations = null;
        foreach ($personOrganizations as $personOrganization) {
            $this->addPersonOrganization($personOrganization);
        }

        $this->collPersonOrganizations = $personOrganizations;
        $this->collPersonOrganizationsPartial = false;
    }

    /**
     * Returns the number of related PersonOrganization objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related PersonOrganization objects.
     * @throws PropelException
     */
    public function countPersonOrganizations(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPersonOrganizationsPartial && !$this->isNew();
        if (null === $this->collPersonOrganizations || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPersonOrganizations) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getPersonOrganizations());
                }
                $query = PersonOrganizationQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByPerson($this)
                    ->count($con);
            }
        } else {
            return count($this->collPersonOrganizations);
        }
    }

    /**
     * Method called to associate a PersonOrganization object to this object
     * through the PersonOrganization foreign key attribute.
     *
     * @param    PersonOrganization $l PersonOrganization
     * @return Person The current object (for fluent API support)
     */
    public function addPersonOrganization(PersonOrganization $l)
    {
        if ($this->collPersonOrganizations === null) {
            $this->initPersonOrganizations();
            $this->collPersonOrganizationsPartial = true;
        }
        if (!in_array($l, $this->collPersonOrganizations->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPersonOrganization($l);
        }

        return $this;
    }

    /**
     * @param	PersonOrganization $personOrganization The personOrganization object to add.
     */
    protected function doAddPersonOrganization($personOrganization)
    {
        $this->collPersonOrganizations[]= $personOrganization;
        $personOrganization->setPerson($this);
    }

    /**
     * @param	PersonOrganization $personOrganization The personOrganization object to remove.
     */
    public function removePersonOrganization($personOrganization)
    {
        if ($this->getPersonOrganizations()->contains($personOrganization)) {
            $this->collPersonOrganizations->remove($this->collPersonOrganizations->search($personOrganization));
            if (null === $this->personOrganizationsScheduledForDeletion) {
                $this->personOrganizationsScheduledForDeletion = clone $this->collPersonOrganizations;
                $this->personOrganizationsScheduledForDeletion->clear();
            }
            $this->personOrganizationsScheduledForDeletion[]= $personOrganization;
            $personOrganization->setPerson(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related PersonOrganizations from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PersonOrganization[] List of PersonOrganization objects
     */
    public function getPersonOrganizationsJoinOrganization($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PersonOrganizationQuery::create(null, $criteria);
        $query->joinWith('Organization', $join_behavior);

        return $this->getPersonOrganizations($query, $con);
    }

    /**
     * Clears out the collPersonPreferencess collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addPersonPreferencess()
     */
    public function clearPersonPreferencess()
    {
        $this->collPersonPreferencess = null; // important to set this to null since that means it is uninitialized
        $this->collPersonPreferencessPartial = null;
    }

    /**
     * reset is the collPersonPreferencess collection loaded partially
     *
     * @return void
     */
    public function resetPartialPersonPreferencess($v = true)
    {
        $this->collPersonPreferencessPartial = $v;
    }

    /**
     * Initializes the collPersonPreferencess collection.
     *
     * By default this just sets the collPersonPreferencess collection to an empty array (like clearcollPersonPreferencess());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPersonPreferencess($overrideExisting = true)
    {
        if (null !== $this->collPersonPreferencess && !$overrideExisting) {
            return;
        }
        $this->collPersonPreferencess = new PropelObjectCollection();
        $this->collPersonPreferencess->setModel('PersonPreferences');
    }

    /**
     * Gets an array of PersonPreferences objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Person is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|PersonPreferences[] List of PersonPreferences objects
     * @throws PropelException
     */
    public function getPersonPreferencess($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPersonPreferencessPartial && !$this->isNew();
        if (null === $this->collPersonPreferencess || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPersonPreferencess) {
                // return empty collection
                $this->initPersonPreferencess();
            } else {
                $collPersonPreferencess = PersonPreferencesQuery::create(null, $criteria)
                    ->filterByPerson($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPersonPreferencessPartial && count($collPersonPreferencess)) {
                      $this->initPersonPreferencess(false);

                      foreach($collPersonPreferencess as $obj) {
                        if (false == $this->collPersonPreferencess->contains($obj)) {
                          $this->collPersonPreferencess->append($obj);
                        }
                      }

                      $this->collPersonPreferencessPartial = true;
                    }

                    return $collPersonPreferencess;
                }

                if($partial && $this->collPersonPreferencess) {
                    foreach($this->collPersonPreferencess as $obj) {
                        if($obj->isNew()) {
                            $collPersonPreferencess[] = $obj;
                        }
                    }
                }

                $this->collPersonPreferencess = $collPersonPreferencess;
                $this->collPersonPreferencessPartial = false;
            }
        }

        return $this->collPersonPreferencess;
    }

    /**
     * Sets a collection of PersonPreferences objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $personPreferencess A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setPersonPreferencess(PropelCollection $personPreferencess, PropelPDO $con = null)
    {
        $this->personPreferencessScheduledForDeletion = $this->getPersonPreferencess(new Criteria(), $con)->diff($personPreferencess);

        foreach ($this->personPreferencessScheduledForDeletion as $personPreferencesRemoved) {
            $personPreferencesRemoved->setPerson(null);
        }

        $this->collPersonPreferencess = null;
        foreach ($personPreferencess as $personPreferences) {
            $this->addPersonPreferences($personPreferences);
        }

        $this->collPersonPreferencess = $personPreferencess;
        $this->collPersonPreferencessPartial = false;
    }

    /**
     * Returns the number of related PersonPreferences objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related PersonPreferences objects.
     * @throws PropelException
     */
    public function countPersonPreferencess(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPersonPreferencessPartial && !$this->isNew();
        if (null === $this->collPersonPreferencess || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPersonPreferencess) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getPersonPreferencess());
                }
                $query = PersonPreferencesQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByPerson($this)
                    ->count($con);
            }
        } else {
            return count($this->collPersonPreferencess);
        }
    }

    /**
     * Method called to associate a PersonPreferences object to this object
     * through the PersonPreferences foreign key attribute.
     *
     * @param    PersonPreferences $l PersonPreferences
     * @return Person The current object (for fluent API support)
     */
    public function addPersonPreferences(PersonPreferences $l)
    {
        if ($this->collPersonPreferencess === null) {
            $this->initPersonPreferencess();
            $this->collPersonPreferencessPartial = true;
        }
        if (!in_array($l, $this->collPersonPreferencess->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPersonPreferences($l);
        }

        return $this;
    }

    /**
     * @param	PersonPreferences $personPreferences The personPreferences object to add.
     */
    protected function doAddPersonPreferences($personPreferences)
    {
        $this->collPersonPreferencess[]= $personPreferences;
        $personPreferences->setPerson($this);
    }

    /**
     * @param	PersonPreferences $personPreferences The personPreferences object to remove.
     */
    public function removePersonPreferences($personPreferences)
    {
        if ($this->getPersonPreferencess()->contains($personPreferences)) {
            $this->collPersonPreferencess->remove($this->collPersonPreferencess->search($personPreferences));
            if (null === $this->personPreferencessScheduledForDeletion) {
                $this->personPreferencessScheduledForDeletion = clone $this->collPersonPreferencess;
                $this->personPreferencessScheduledForDeletion->clear();
            }
            $this->personPreferencessScheduledForDeletion[]= $personPreferences;
            $personPreferences->setPerson(null);
        }
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
     * If this Person is new, it will return
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
                    ->filterByPerson($this)
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
            $personProfileRemoved->setPerson(null);
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
                    ->filterByPerson($this)
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
     * @return Person The current object (for fluent API support)
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
        $personProfile->setPerson($this);
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
            $personProfile->setPerson(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related PersonProfiles from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PersonProfile[] List of PersonProfile objects
     */
    public function getPersonProfilesJoinProfile($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PersonProfileQuery::create(null, $criteria);
        $query->joinWith('Profile', $join_behavior);

        return $this->getPersonProfiles($query, $con);
    }

    /**
     * Clears out the collRevisionsRelatedByApproverPersonId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addRevisionsRelatedByApproverPersonId()
     */
    public function clearRevisionsRelatedByApproverPersonId()
    {
        $this->collRevisionsRelatedByApproverPersonId = null; // important to set this to null since that means it is uninitialized
        $this->collRevisionsRelatedByApproverPersonIdPartial = null;
    }

    /**
     * reset is the collRevisionsRelatedByApproverPersonId collection loaded partially
     *
     * @return void
     */
    public function resetPartialRevisionsRelatedByApproverPersonId($v = true)
    {
        $this->collRevisionsRelatedByApproverPersonIdPartial = $v;
    }

    /**
     * Initializes the collRevisionsRelatedByApproverPersonId collection.
     *
     * By default this just sets the collRevisionsRelatedByApproverPersonId collection to an empty array (like clearcollRevisionsRelatedByApproverPersonId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRevisionsRelatedByApproverPersonId($overrideExisting = true)
    {
        if (null !== $this->collRevisionsRelatedByApproverPersonId && !$overrideExisting) {
            return;
        }
        $this->collRevisionsRelatedByApproverPersonId = new PropelObjectCollection();
        $this->collRevisionsRelatedByApproverPersonId->setModel('Revision');
    }

    /**
     * Gets an array of Revision objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Person is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Revision[] List of Revision objects
     * @throws PropelException
     */
    public function getRevisionsRelatedByApproverPersonId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRevisionsRelatedByApproverPersonIdPartial && !$this->isNew();
        if (null === $this->collRevisionsRelatedByApproverPersonId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRevisionsRelatedByApproverPersonId) {
                // return empty collection
                $this->initRevisionsRelatedByApproverPersonId();
            } else {
                $collRevisionsRelatedByApproverPersonId = RevisionQuery::create(null, $criteria)
                    ->filterByPersonRelatedByApproverPersonId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRevisionsRelatedByApproverPersonIdPartial && count($collRevisionsRelatedByApproverPersonId)) {
                      $this->initRevisionsRelatedByApproverPersonId(false);

                      foreach($collRevisionsRelatedByApproverPersonId as $obj) {
                        if (false == $this->collRevisionsRelatedByApproverPersonId->contains($obj)) {
                          $this->collRevisionsRelatedByApproverPersonId->append($obj);
                        }
                      }

                      $this->collRevisionsRelatedByApproverPersonIdPartial = true;
                    }

                    return $collRevisionsRelatedByApproverPersonId;
                }

                if($partial && $this->collRevisionsRelatedByApproverPersonId) {
                    foreach($this->collRevisionsRelatedByApproverPersonId as $obj) {
                        if($obj->isNew()) {
                            $collRevisionsRelatedByApproverPersonId[] = $obj;
                        }
                    }
                }

                $this->collRevisionsRelatedByApproverPersonId = $collRevisionsRelatedByApproverPersonId;
                $this->collRevisionsRelatedByApproverPersonIdPartial = false;
            }
        }

        return $this->collRevisionsRelatedByApproverPersonId;
    }

    /**
     * Sets a collection of RevisionRelatedByApproverPersonId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $revisionsRelatedByApproverPersonId A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setRevisionsRelatedByApproverPersonId(PropelCollection $revisionsRelatedByApproverPersonId, PropelPDO $con = null)
    {
        $this->revisionsRelatedByApproverPersonIdScheduledForDeletion = $this->getRevisionsRelatedByApproverPersonId(new Criteria(), $con)->diff($revisionsRelatedByApproverPersonId);

        foreach ($this->revisionsRelatedByApproverPersonIdScheduledForDeletion as $revisionRelatedByApproverPersonIdRemoved) {
            $revisionRelatedByApproverPersonIdRemoved->setPersonRelatedByApproverPersonId(null);
        }

        $this->collRevisionsRelatedByApproverPersonId = null;
        foreach ($revisionsRelatedByApproverPersonId as $revisionRelatedByApproverPersonId) {
            $this->addRevisionRelatedByApproverPersonId($revisionRelatedByApproverPersonId);
        }

        $this->collRevisionsRelatedByApproverPersonId = $revisionsRelatedByApproverPersonId;
        $this->collRevisionsRelatedByApproverPersonIdPartial = false;
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
    public function countRevisionsRelatedByApproverPersonId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRevisionsRelatedByApproverPersonIdPartial && !$this->isNew();
        if (null === $this->collRevisionsRelatedByApproverPersonId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRevisionsRelatedByApproverPersonId) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getRevisionsRelatedByApproverPersonId());
                }
                $query = RevisionQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByPersonRelatedByApproverPersonId($this)
                    ->count($con);
            }
        } else {
            return count($this->collRevisionsRelatedByApproverPersonId);
        }
    }

    /**
     * Method called to associate a Revision object to this object
     * through the Revision foreign key attribute.
     *
     * @param    Revision $l Revision
     * @return Person The current object (for fluent API support)
     */
    public function addRevisionRelatedByApproverPersonId(Revision $l)
    {
        if ($this->collRevisionsRelatedByApproverPersonId === null) {
            $this->initRevisionsRelatedByApproverPersonId();
            $this->collRevisionsRelatedByApproverPersonIdPartial = true;
        }
        if (!in_array($l, $this->collRevisionsRelatedByApproverPersonId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRevisionRelatedByApproverPersonId($l);
        }

        return $this;
    }

    /**
     * @param	RevisionRelatedByApproverPersonId $revisionRelatedByApproverPersonId The revisionRelatedByApproverPersonId object to add.
     */
    protected function doAddRevisionRelatedByApproverPersonId($revisionRelatedByApproverPersonId)
    {
        $this->collRevisionsRelatedByApproverPersonId[]= $revisionRelatedByApproverPersonId;
        $revisionRelatedByApproverPersonId->setPersonRelatedByApproverPersonId($this);
    }

    /**
     * @param	RevisionRelatedByApproverPersonId $revisionRelatedByApproverPersonId The revisionRelatedByApproverPersonId object to remove.
     */
    public function removeRevisionRelatedByApproverPersonId($revisionRelatedByApproverPersonId)
    {
        if ($this->getRevisionsRelatedByApproverPersonId()->contains($revisionRelatedByApproverPersonId)) {
            $this->collRevisionsRelatedByApproverPersonId->remove($this->collRevisionsRelatedByApproverPersonId->search($revisionRelatedByApproverPersonId));
            if (null === $this->revisionsRelatedByApproverPersonIdScheduledForDeletion) {
                $this->revisionsRelatedByApproverPersonIdScheduledForDeletion = clone $this->collRevisionsRelatedByApproverPersonId;
                $this->revisionsRelatedByApproverPersonIdScheduledForDeletion->clear();
            }
            $this->revisionsRelatedByApproverPersonIdScheduledForDeletion[]= $revisionRelatedByApproverPersonId;
            $revisionRelatedByApproverPersonId->setPersonRelatedByApproverPersonId(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related RevisionsRelatedByApproverPersonId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Revision[] List of Revision objects
     */
    public function getRevisionsRelatedByApproverPersonIdJoinDeliveryRelatedByDeliveryId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RevisionQuery::create(null, $criteria);
        $query->joinWith('DeliveryRelatedByDeliveryId', $join_behavior);

        return $this->getRevisionsRelatedByApproverPersonId($query, $con);
    }

    /**
     * Clears out the collRevisionsRelatedByReviewerPersonId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addRevisionsRelatedByReviewerPersonId()
     */
    public function clearRevisionsRelatedByReviewerPersonId()
    {
        $this->collRevisionsRelatedByReviewerPersonId = null; // important to set this to null since that means it is uninitialized
        $this->collRevisionsRelatedByReviewerPersonIdPartial = null;
    }

    /**
     * reset is the collRevisionsRelatedByReviewerPersonId collection loaded partially
     *
     * @return void
     */
    public function resetPartialRevisionsRelatedByReviewerPersonId($v = true)
    {
        $this->collRevisionsRelatedByReviewerPersonIdPartial = $v;
    }

    /**
     * Initializes the collRevisionsRelatedByReviewerPersonId collection.
     *
     * By default this just sets the collRevisionsRelatedByReviewerPersonId collection to an empty array (like clearcollRevisionsRelatedByReviewerPersonId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRevisionsRelatedByReviewerPersonId($overrideExisting = true)
    {
        if (null !== $this->collRevisionsRelatedByReviewerPersonId && !$overrideExisting) {
            return;
        }
        $this->collRevisionsRelatedByReviewerPersonId = new PropelObjectCollection();
        $this->collRevisionsRelatedByReviewerPersonId->setModel('Revision');
    }

    /**
     * Gets an array of Revision objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Person is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Revision[] List of Revision objects
     * @throws PropelException
     */
    public function getRevisionsRelatedByReviewerPersonId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRevisionsRelatedByReviewerPersonIdPartial && !$this->isNew();
        if (null === $this->collRevisionsRelatedByReviewerPersonId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRevisionsRelatedByReviewerPersonId) {
                // return empty collection
                $this->initRevisionsRelatedByReviewerPersonId();
            } else {
                $collRevisionsRelatedByReviewerPersonId = RevisionQuery::create(null, $criteria)
                    ->filterByPersonRelatedByReviewerPersonId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRevisionsRelatedByReviewerPersonIdPartial && count($collRevisionsRelatedByReviewerPersonId)) {
                      $this->initRevisionsRelatedByReviewerPersonId(false);

                      foreach($collRevisionsRelatedByReviewerPersonId as $obj) {
                        if (false == $this->collRevisionsRelatedByReviewerPersonId->contains($obj)) {
                          $this->collRevisionsRelatedByReviewerPersonId->append($obj);
                        }
                      }

                      $this->collRevisionsRelatedByReviewerPersonIdPartial = true;
                    }

                    return $collRevisionsRelatedByReviewerPersonId;
                }

                if($partial && $this->collRevisionsRelatedByReviewerPersonId) {
                    foreach($this->collRevisionsRelatedByReviewerPersonId as $obj) {
                        if($obj->isNew()) {
                            $collRevisionsRelatedByReviewerPersonId[] = $obj;
                        }
                    }
                }

                $this->collRevisionsRelatedByReviewerPersonId = $collRevisionsRelatedByReviewerPersonId;
                $this->collRevisionsRelatedByReviewerPersonIdPartial = false;
            }
        }

        return $this->collRevisionsRelatedByReviewerPersonId;
    }

    /**
     * Sets a collection of RevisionRelatedByReviewerPersonId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $revisionsRelatedByReviewerPersonId A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setRevisionsRelatedByReviewerPersonId(PropelCollection $revisionsRelatedByReviewerPersonId, PropelPDO $con = null)
    {
        $this->revisionsRelatedByReviewerPersonIdScheduledForDeletion = $this->getRevisionsRelatedByReviewerPersonId(new Criteria(), $con)->diff($revisionsRelatedByReviewerPersonId);

        foreach ($this->revisionsRelatedByReviewerPersonIdScheduledForDeletion as $revisionRelatedByReviewerPersonIdRemoved) {
            $revisionRelatedByReviewerPersonIdRemoved->setPersonRelatedByReviewerPersonId(null);
        }

        $this->collRevisionsRelatedByReviewerPersonId = null;
        foreach ($revisionsRelatedByReviewerPersonId as $revisionRelatedByReviewerPersonId) {
            $this->addRevisionRelatedByReviewerPersonId($revisionRelatedByReviewerPersonId);
        }

        $this->collRevisionsRelatedByReviewerPersonId = $revisionsRelatedByReviewerPersonId;
        $this->collRevisionsRelatedByReviewerPersonIdPartial = false;
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
    public function countRevisionsRelatedByReviewerPersonId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRevisionsRelatedByReviewerPersonIdPartial && !$this->isNew();
        if (null === $this->collRevisionsRelatedByReviewerPersonId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRevisionsRelatedByReviewerPersonId) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getRevisionsRelatedByReviewerPersonId());
                }
                $query = RevisionQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByPersonRelatedByReviewerPersonId($this)
                    ->count($con);
            }
        } else {
            return count($this->collRevisionsRelatedByReviewerPersonId);
        }
    }

    /**
     * Method called to associate a Revision object to this object
     * through the Revision foreign key attribute.
     *
     * @param    Revision $l Revision
     * @return Person The current object (for fluent API support)
     */
    public function addRevisionRelatedByReviewerPersonId(Revision $l)
    {
        if ($this->collRevisionsRelatedByReviewerPersonId === null) {
            $this->initRevisionsRelatedByReviewerPersonId();
            $this->collRevisionsRelatedByReviewerPersonIdPartial = true;
        }
        if (!in_array($l, $this->collRevisionsRelatedByReviewerPersonId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRevisionRelatedByReviewerPersonId($l);
        }

        return $this;
    }

    /**
     * @param	RevisionRelatedByReviewerPersonId $revisionRelatedByReviewerPersonId The revisionRelatedByReviewerPersonId object to add.
     */
    protected function doAddRevisionRelatedByReviewerPersonId($revisionRelatedByReviewerPersonId)
    {
        $this->collRevisionsRelatedByReviewerPersonId[]= $revisionRelatedByReviewerPersonId;
        $revisionRelatedByReviewerPersonId->setPersonRelatedByReviewerPersonId($this);
    }

    /**
     * @param	RevisionRelatedByReviewerPersonId $revisionRelatedByReviewerPersonId The revisionRelatedByReviewerPersonId object to remove.
     */
    public function removeRevisionRelatedByReviewerPersonId($revisionRelatedByReviewerPersonId)
    {
        if ($this->getRevisionsRelatedByReviewerPersonId()->contains($revisionRelatedByReviewerPersonId)) {
            $this->collRevisionsRelatedByReviewerPersonId->remove($this->collRevisionsRelatedByReviewerPersonId->search($revisionRelatedByReviewerPersonId));
            if (null === $this->revisionsRelatedByReviewerPersonIdScheduledForDeletion) {
                $this->revisionsRelatedByReviewerPersonIdScheduledForDeletion = clone $this->collRevisionsRelatedByReviewerPersonId;
                $this->revisionsRelatedByReviewerPersonIdScheduledForDeletion->clear();
            }
            $this->revisionsRelatedByReviewerPersonIdScheduledForDeletion[]= $revisionRelatedByReviewerPersonId;
            $revisionRelatedByReviewerPersonId->setPersonRelatedByReviewerPersonId(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related RevisionsRelatedByReviewerPersonId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Revision[] List of Revision objects
     */
    public function getRevisionsRelatedByReviewerPersonIdJoinDeliveryRelatedByDeliveryId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RevisionQuery::create(null, $criteria);
        $query->joinWith('DeliveryRelatedByDeliveryId', $join_behavior);

        return $this->getRevisionsRelatedByReviewerPersonId($query, $con);
    }

    /**
     * Clears out the collRevisionsRelatedByUploaderPersonId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addRevisionsRelatedByUploaderPersonId()
     */
    public function clearRevisionsRelatedByUploaderPersonId()
    {
        $this->collRevisionsRelatedByUploaderPersonId = null; // important to set this to null since that means it is uninitialized
        $this->collRevisionsRelatedByUploaderPersonIdPartial = null;
    }

    /**
     * reset is the collRevisionsRelatedByUploaderPersonId collection loaded partially
     *
     * @return void
     */
    public function resetPartialRevisionsRelatedByUploaderPersonId($v = true)
    {
        $this->collRevisionsRelatedByUploaderPersonIdPartial = $v;
    }

    /**
     * Initializes the collRevisionsRelatedByUploaderPersonId collection.
     *
     * By default this just sets the collRevisionsRelatedByUploaderPersonId collection to an empty array (like clearcollRevisionsRelatedByUploaderPersonId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRevisionsRelatedByUploaderPersonId($overrideExisting = true)
    {
        if (null !== $this->collRevisionsRelatedByUploaderPersonId && !$overrideExisting) {
            return;
        }
        $this->collRevisionsRelatedByUploaderPersonId = new PropelObjectCollection();
        $this->collRevisionsRelatedByUploaderPersonId->setModel('Revision');
    }

    /**
     * Gets an array of Revision objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Person is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Revision[] List of Revision objects
     * @throws PropelException
     */
    public function getRevisionsRelatedByUploaderPersonId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRevisionsRelatedByUploaderPersonIdPartial && !$this->isNew();
        if (null === $this->collRevisionsRelatedByUploaderPersonId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRevisionsRelatedByUploaderPersonId) {
                // return empty collection
                $this->initRevisionsRelatedByUploaderPersonId();
            } else {
                $collRevisionsRelatedByUploaderPersonId = RevisionQuery::create(null, $criteria)
                    ->filterByPersonRelatedByUploaderPersonId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRevisionsRelatedByUploaderPersonIdPartial && count($collRevisionsRelatedByUploaderPersonId)) {
                      $this->initRevisionsRelatedByUploaderPersonId(false);

                      foreach($collRevisionsRelatedByUploaderPersonId as $obj) {
                        if (false == $this->collRevisionsRelatedByUploaderPersonId->contains($obj)) {
                          $this->collRevisionsRelatedByUploaderPersonId->append($obj);
                        }
                      }

                      $this->collRevisionsRelatedByUploaderPersonIdPartial = true;
                    }

                    return $collRevisionsRelatedByUploaderPersonId;
                }

                if($partial && $this->collRevisionsRelatedByUploaderPersonId) {
                    foreach($this->collRevisionsRelatedByUploaderPersonId as $obj) {
                        if($obj->isNew()) {
                            $collRevisionsRelatedByUploaderPersonId[] = $obj;
                        }
                    }
                }

                $this->collRevisionsRelatedByUploaderPersonId = $collRevisionsRelatedByUploaderPersonId;
                $this->collRevisionsRelatedByUploaderPersonIdPartial = false;
            }
        }

        return $this->collRevisionsRelatedByUploaderPersonId;
    }

    /**
     * Sets a collection of RevisionRelatedByUploaderPersonId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $revisionsRelatedByUploaderPersonId A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setRevisionsRelatedByUploaderPersonId(PropelCollection $revisionsRelatedByUploaderPersonId, PropelPDO $con = null)
    {
        $this->revisionsRelatedByUploaderPersonIdScheduledForDeletion = $this->getRevisionsRelatedByUploaderPersonId(new Criteria(), $con)->diff($revisionsRelatedByUploaderPersonId);

        foreach ($this->revisionsRelatedByUploaderPersonIdScheduledForDeletion as $revisionRelatedByUploaderPersonIdRemoved) {
            $revisionRelatedByUploaderPersonIdRemoved->setPersonRelatedByUploaderPersonId(null);
        }

        $this->collRevisionsRelatedByUploaderPersonId = null;
        foreach ($revisionsRelatedByUploaderPersonId as $revisionRelatedByUploaderPersonId) {
            $this->addRevisionRelatedByUploaderPersonId($revisionRelatedByUploaderPersonId);
        }

        $this->collRevisionsRelatedByUploaderPersonId = $revisionsRelatedByUploaderPersonId;
        $this->collRevisionsRelatedByUploaderPersonIdPartial = false;
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
    public function countRevisionsRelatedByUploaderPersonId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRevisionsRelatedByUploaderPersonIdPartial && !$this->isNew();
        if (null === $this->collRevisionsRelatedByUploaderPersonId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRevisionsRelatedByUploaderPersonId) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getRevisionsRelatedByUploaderPersonId());
                }
                $query = RevisionQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByPersonRelatedByUploaderPersonId($this)
                    ->count($con);
            }
        } else {
            return count($this->collRevisionsRelatedByUploaderPersonId);
        }
    }

    /**
     * Method called to associate a Revision object to this object
     * through the Revision foreign key attribute.
     *
     * @param    Revision $l Revision
     * @return Person The current object (for fluent API support)
     */
    public function addRevisionRelatedByUploaderPersonId(Revision $l)
    {
        if ($this->collRevisionsRelatedByUploaderPersonId === null) {
            $this->initRevisionsRelatedByUploaderPersonId();
            $this->collRevisionsRelatedByUploaderPersonIdPartial = true;
        }
        if (!in_array($l, $this->collRevisionsRelatedByUploaderPersonId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRevisionRelatedByUploaderPersonId($l);
        }

        return $this;
    }

    /**
     * @param	RevisionRelatedByUploaderPersonId $revisionRelatedByUploaderPersonId The revisionRelatedByUploaderPersonId object to add.
     */
    protected function doAddRevisionRelatedByUploaderPersonId($revisionRelatedByUploaderPersonId)
    {
        $this->collRevisionsRelatedByUploaderPersonId[]= $revisionRelatedByUploaderPersonId;
        $revisionRelatedByUploaderPersonId->setPersonRelatedByUploaderPersonId($this);
    }

    /**
     * @param	RevisionRelatedByUploaderPersonId $revisionRelatedByUploaderPersonId The revisionRelatedByUploaderPersonId object to remove.
     */
    public function removeRevisionRelatedByUploaderPersonId($revisionRelatedByUploaderPersonId)
    {
        if ($this->getRevisionsRelatedByUploaderPersonId()->contains($revisionRelatedByUploaderPersonId)) {
            $this->collRevisionsRelatedByUploaderPersonId->remove($this->collRevisionsRelatedByUploaderPersonId->search($revisionRelatedByUploaderPersonId));
            if (null === $this->revisionsRelatedByUploaderPersonIdScheduledForDeletion) {
                $this->revisionsRelatedByUploaderPersonIdScheduledForDeletion = clone $this->collRevisionsRelatedByUploaderPersonId;
                $this->revisionsRelatedByUploaderPersonIdScheduledForDeletion->clear();
            }
            $this->revisionsRelatedByUploaderPersonIdScheduledForDeletion[]= $revisionRelatedByUploaderPersonId;
            $revisionRelatedByUploaderPersonId->setPersonRelatedByUploaderPersonId(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related RevisionsRelatedByUploaderPersonId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Revision[] List of Revision objects
     */
    public function getRevisionsRelatedByUploaderPersonIdJoinDeliveryRelatedByDeliveryId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RevisionQuery::create(null, $criteria);
        $query->joinWith('DeliveryRelatedByDeliveryId', $join_behavior);

        return $this->getRevisionsRelatedByUploaderPersonId($query, $con);
    }

    /**
     * Clears out the collSessions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSessions()
     */
    public function clearSessions()
    {
        $this->collSessions = null; // important to set this to null since that means it is uninitialized
        $this->collSessionsPartial = null;
    }

    /**
     * reset is the collSessions collection loaded partially
     *
     * @return void
     */
    public function resetPartialSessions($v = true)
    {
        $this->collSessionsPartial = $v;
    }

    /**
     * Initializes the collSessions collection.
     *
     * By default this just sets the collSessions collection to an empty array (like clearcollSessions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSessions($overrideExisting = true)
    {
        if (null !== $this->collSessions && !$overrideExisting) {
            return;
        }
        $this->collSessions = new PropelObjectCollection();
        $this->collSessions->setModel('Session');
    }

    /**
     * Gets an array of Session objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Person is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Session[] List of Session objects
     * @throws PropelException
     */
    public function getSessions($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSessionsPartial && !$this->isNew();
        if (null === $this->collSessions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSessions) {
                // return empty collection
                $this->initSessions();
            } else {
                $collSessions = SessionQuery::create(null, $criteria)
                    ->filterByPerson($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSessionsPartial && count($collSessions)) {
                      $this->initSessions(false);

                      foreach($collSessions as $obj) {
                        if (false == $this->collSessions->contains($obj)) {
                          $this->collSessions->append($obj);
                        }
                      }

                      $this->collSessionsPartial = true;
                    }

                    return $collSessions;
                }

                if($partial && $this->collSessions) {
                    foreach($this->collSessions as $obj) {
                        if($obj->isNew()) {
                            $collSessions[] = $obj;
                        }
                    }
                }

                $this->collSessions = $collSessions;
                $this->collSessionsPartial = false;
            }
        }

        return $this->collSessions;
    }

    /**
     * Sets a collection of Session objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $sessions A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setSessions(PropelCollection $sessions, PropelPDO $con = null)
    {
        $this->sessionsScheduledForDeletion = $this->getSessions(new Criteria(), $con)->diff($sessions);

        foreach ($this->sessionsScheduledForDeletion as $sessionRemoved) {
            $sessionRemoved->setPerson(null);
        }

        $this->collSessions = null;
        foreach ($sessions as $session) {
            $this->addSession($session);
        }

        $this->collSessions = $sessions;
        $this->collSessionsPartial = false;
    }

    /**
     * Returns the number of related Session objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Session objects.
     * @throws PropelException
     */
    public function countSessions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSessionsPartial && !$this->isNew();
        if (null === $this->collSessions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSessions) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getSessions());
                }
                $query = SessionQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByPerson($this)
                    ->count($con);
            }
        } else {
            return count($this->collSessions);
        }
    }

    /**
     * Method called to associate a Session object to this object
     * through the Session foreign key attribute.
     *
     * @param    Session $l Session
     * @return Person The current object (for fluent API support)
     */
    public function addSession(Session $l)
    {
        if ($this->collSessions === null) {
            $this->initSessions();
            $this->collSessionsPartial = true;
        }
        if (!in_array($l, $this->collSessions->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSession($l);
        }

        return $this;
    }

    /**
     * @param	Session $session The session object to add.
     */
    protected function doAddSession($session)
    {
        $this->collSessions[]= $session;
        $session->setPerson($this);
    }

    /**
     * @param	Session $session The session object to remove.
     */
    public function removeSession($session)
    {
        if ($this->getSessions()->contains($session)) {
            $this->collSessions->remove($this->collSessions->search($session));
            if (null === $this->sessionsScheduledForDeletion) {
                $this->sessionsScheduledForDeletion = clone $this->collSessions;
                $this->sessionsScheduledForDeletion->clear();
            }
            $this->sessionsScheduledForDeletion[]= $session;
            $session->setPerson(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related Sessions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Session[] List of Session objects
     */
    public function getSessionsJoinOrganization($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SessionQuery::create(null, $criteria);
        $query->joinWith('Organization', $join_behavior);

        return $this->getSessions($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->user_name = null;
        $this->display_name = null;
        $this->description = null;
        $this->password = null;
        $this->gender = null;
        $this->email = null;
        $this->email_enabled = null;
        $this->is_global_administrator = null;
        $this->token = null;
        $this->token_expiration = null;
        $this->token_operation = null;
        $this->token_data = null;
        $this->bad_password_count = null;
        $this->blocked_access = null;
        $this->last_login = null;
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
            if ($this->collNonConformancesRelatedByClosedBy) {
                foreach ($this->collNonConformancesRelatedByClosedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collNonConformancesRelatedByOpenedBy) {
                foreach ($this->collNonConformancesRelatedByOpenedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPersonOrganizations) {
                foreach ($this->collPersonOrganizations as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPersonPreferencess) {
                foreach ($this->collPersonPreferencess as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPersonProfiles) {
                foreach ($this->collPersonProfiles as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRevisionsRelatedByApproverPersonId) {
                foreach ($this->collRevisionsRelatedByApproverPersonId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRevisionsRelatedByReviewerPersonId) {
                foreach ($this->collRevisionsRelatedByReviewerPersonId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRevisionsRelatedByUploaderPersonId) {
                foreach ($this->collRevisionsRelatedByUploaderPersonId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSessions) {
                foreach ($this->collSessions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        if ($this->collCompletedEvents instanceof PropelCollection) {
            $this->collCompletedEvents->clearIterator();
        }
        $this->collCompletedEvents = null;
        if ($this->collNonConformancesRelatedByClosedBy instanceof PropelCollection) {
            $this->collNonConformancesRelatedByClosedBy->clearIterator();
        }
        $this->collNonConformancesRelatedByClosedBy = null;
        if ($this->collNonConformancesRelatedByOpenedBy instanceof PropelCollection) {
            $this->collNonConformancesRelatedByOpenedBy->clearIterator();
        }
        $this->collNonConformancesRelatedByOpenedBy = null;
        if ($this->collPersonOrganizations instanceof PropelCollection) {
            $this->collPersonOrganizations->clearIterator();
        }
        $this->collPersonOrganizations = null;
        if ($this->collPersonPreferencess instanceof PropelCollection) {
            $this->collPersonPreferencess->clearIterator();
        }
        $this->collPersonPreferencess = null;
        if ($this->collPersonProfiles instanceof PropelCollection) {
            $this->collPersonProfiles->clearIterator();
        }
        $this->collPersonProfiles = null;
        if ($this->collRevisionsRelatedByApproverPersonId instanceof PropelCollection) {
            $this->collRevisionsRelatedByApproverPersonId->clearIterator();
        }
        $this->collRevisionsRelatedByApproverPersonId = null;
        if ($this->collRevisionsRelatedByReviewerPersonId instanceof PropelCollection) {
            $this->collRevisionsRelatedByReviewerPersonId->clearIterator();
        }
        $this->collRevisionsRelatedByReviewerPersonId = null;
        if ($this->collRevisionsRelatedByUploaderPersonId instanceof PropelCollection) {
            $this->collRevisionsRelatedByUploaderPersonId->clearIterator();
        }
        $this->collRevisionsRelatedByUploaderPersonId = null;
        if ($this->collSessions instanceof PropelCollection) {
            $this->collSessions->clearIterator();
        }
        $this->collSessions = null;
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
