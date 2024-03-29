<?php


/**
 * Base static class for performing query and update operations on the 'person' table.
 *
 *
 *
 * @package propel.generator.atica.om
 */
abstract class BasePersonPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'atica';

    /** the table name for this class */
    const TABLE_NAME = 'person';

    /** the related Propel class for this table */
    const OM_CLASS = 'Person';

    /** the related TableMap class for this table */
    const TM_CLASS = 'PersonTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 16;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 16;

    /** the column name for the ID field */
    const ID = 'person.ID';

    /** the column name for the USER_NAME field */
    const USER_NAME = 'person.USER_NAME';

    /** the column name for the DISPLAY_NAME field */
    const DISPLAY_NAME = 'person.DISPLAY_NAME';

    /** the column name for the DESCRIPTION field */
    const DESCRIPTION = 'person.DESCRIPTION';

    /** the column name for the PASSWORD field */
    const PASSWORD = 'person.PASSWORD';

    /** the column name for the GENDER field */
    const GENDER = 'person.GENDER';

    /** the column name for the EMAIL field */
    const EMAIL = 'person.EMAIL';

    /** the column name for the EMAIL_ENABLED field */
    const EMAIL_ENABLED = 'person.EMAIL_ENABLED';

    /** the column name for the IS_GLOBAL_ADMINISTRATOR field */
    const IS_GLOBAL_ADMINISTRATOR = 'person.IS_GLOBAL_ADMINISTRATOR';

    /** the column name for the TOKEN field */
    const TOKEN = 'person.TOKEN';

    /** the column name for the TOKEN_EXPIRATION field */
    const TOKEN_EXPIRATION = 'person.TOKEN_EXPIRATION';

    /** the column name for the TOKEN_OPERATION field */
    const TOKEN_OPERATION = 'person.TOKEN_OPERATION';

    /** the column name for the TOKEN_DATA field */
    const TOKEN_DATA = 'person.TOKEN_DATA';

    /** the column name for the BAD_PASSWORD_COUNT field */
    const BAD_PASSWORD_COUNT = 'person.BAD_PASSWORD_COUNT';

    /** the column name for the BLOCKED_ACCESS field */
    const BLOCKED_ACCESS = 'person.BLOCKED_ACCESS';

    /** the column name for the LAST_LOGIN field */
    const LAST_LOGIN = 'person.LAST_LOGIN';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Person objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Person[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. PersonPeer::$fieldNames[PersonPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'UserName', 'DisplayName', 'Description', 'Password', 'Gender', 'Email', 'EmailEnabled', 'IsGlobalAdministrator', 'Token', 'TokenExpiration', 'TokenOperation', 'TokenData', 'BadPasswordCount', 'BlockedAccess', 'LastLogin', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'userName', 'displayName', 'description', 'password', 'gender', 'email', 'emailEnabled', 'isGlobalAdministrator', 'token', 'tokenExpiration', 'tokenOperation', 'tokenData', 'badPasswordCount', 'blockedAccess', 'lastLogin', ),
        BasePeer::TYPE_COLNAME => array (PersonPeer::ID, PersonPeer::USER_NAME, PersonPeer::DISPLAY_NAME, PersonPeer::DESCRIPTION, PersonPeer::PASSWORD, PersonPeer::GENDER, PersonPeer::EMAIL, PersonPeer::EMAIL_ENABLED, PersonPeer::IS_GLOBAL_ADMINISTRATOR, PersonPeer::TOKEN, PersonPeer::TOKEN_EXPIRATION, PersonPeer::TOKEN_OPERATION, PersonPeer::TOKEN_DATA, PersonPeer::BAD_PASSWORD_COUNT, PersonPeer::BLOCKED_ACCESS, PersonPeer::LAST_LOGIN, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'USER_NAME', 'DISPLAY_NAME', 'DESCRIPTION', 'PASSWORD', 'GENDER', 'EMAIL', 'EMAIL_ENABLED', 'IS_GLOBAL_ADMINISTRATOR', 'TOKEN', 'TOKEN_EXPIRATION', 'TOKEN_OPERATION', 'TOKEN_DATA', 'BAD_PASSWORD_COUNT', 'BLOCKED_ACCESS', 'LAST_LOGIN', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'user_name', 'display_name', 'description', 'password', 'gender', 'email', 'email_enabled', 'is_global_administrator', 'token', 'token_expiration', 'token_operation', 'token_data', 'bad_password_count', 'blocked_access', 'last_login', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. PersonPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'UserName' => 1, 'DisplayName' => 2, 'Description' => 3, 'Password' => 4, 'Gender' => 5, 'Email' => 6, 'EmailEnabled' => 7, 'IsGlobalAdministrator' => 8, 'Token' => 9, 'TokenExpiration' => 10, 'TokenOperation' => 11, 'TokenData' => 12, 'BadPasswordCount' => 13, 'BlockedAccess' => 14, 'LastLogin' => 15, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'userName' => 1, 'displayName' => 2, 'description' => 3, 'password' => 4, 'gender' => 5, 'email' => 6, 'emailEnabled' => 7, 'isGlobalAdministrator' => 8, 'token' => 9, 'tokenExpiration' => 10, 'tokenOperation' => 11, 'tokenData' => 12, 'badPasswordCount' => 13, 'blockedAccess' => 14, 'lastLogin' => 15, ),
        BasePeer::TYPE_COLNAME => array (PersonPeer::ID => 0, PersonPeer::USER_NAME => 1, PersonPeer::DISPLAY_NAME => 2, PersonPeer::DESCRIPTION => 3, PersonPeer::PASSWORD => 4, PersonPeer::GENDER => 5, PersonPeer::EMAIL => 6, PersonPeer::EMAIL_ENABLED => 7, PersonPeer::IS_GLOBAL_ADMINISTRATOR => 8, PersonPeer::TOKEN => 9, PersonPeer::TOKEN_EXPIRATION => 10, PersonPeer::TOKEN_OPERATION => 11, PersonPeer::TOKEN_DATA => 12, PersonPeer::BAD_PASSWORD_COUNT => 13, PersonPeer::BLOCKED_ACCESS => 14, PersonPeer::LAST_LOGIN => 15, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'USER_NAME' => 1, 'DISPLAY_NAME' => 2, 'DESCRIPTION' => 3, 'PASSWORD' => 4, 'GENDER' => 5, 'EMAIL' => 6, 'EMAIL_ENABLED' => 7, 'IS_GLOBAL_ADMINISTRATOR' => 8, 'TOKEN' => 9, 'TOKEN_EXPIRATION' => 10, 'TOKEN_OPERATION' => 11, 'TOKEN_DATA' => 12, 'BAD_PASSWORD_COUNT' => 13, 'BLOCKED_ACCESS' => 14, 'LAST_LOGIN' => 15, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'user_name' => 1, 'display_name' => 2, 'description' => 3, 'password' => 4, 'gender' => 5, 'email' => 6, 'email_enabled' => 7, 'is_global_administrator' => 8, 'token' => 9, 'token_expiration' => 10, 'token_operation' => 11, 'token_data' => 12, 'bad_password_count' => 13, 'blocked_access' => 14, 'last_login' => 15, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
    );

    /**
     * Translates a fieldname to another type
     *
     * @param      string $name field name
     * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @param      string $toType   One of the class type constants
     * @return string          translated name of the field.
     * @throws PropelException - if the specified name could not be found in the fieldname mappings.
     */
    public static function translateFieldName($name, $fromType, $toType)
    {
        $toNames = PersonPeer::getFieldNames($toType);
        $key = isset(PersonPeer::$fieldKeys[$fromType][$name]) ? PersonPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(PersonPeer::$fieldKeys[$fromType], true));
        }

        return $toNames[$key];
    }

    /**
     * Returns an array of field names.
     *
     * @param      string $type The type of fieldnames to return:
     *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @return array           A list of field names
     * @throws PropelException - if the type is not valid.
     */
    public static function getFieldNames($type = BasePeer::TYPE_PHPNAME)
    {
        if (!array_key_exists($type, PersonPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return PersonPeer::$fieldNames[$type];
    }

    /**
     * Convenience method which changes table.column to alias.column.
     *
     * Using this method you can maintain SQL abstraction while using column aliases.
     * <code>
     *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
     *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
     * </code>
     * @param      string $alias The alias for the current table.
     * @param      string $column The column name for current table. (i.e. PersonPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(PersonPeer::TABLE_NAME.'.', $alias.'.', $column);
    }

    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param      Criteria $criteria object containing the columns to add.
     * @param      string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(PersonPeer::ID);
            $criteria->addSelectColumn(PersonPeer::USER_NAME);
            $criteria->addSelectColumn(PersonPeer::DISPLAY_NAME);
            $criteria->addSelectColumn(PersonPeer::DESCRIPTION);
            $criteria->addSelectColumn(PersonPeer::PASSWORD);
            $criteria->addSelectColumn(PersonPeer::GENDER);
            $criteria->addSelectColumn(PersonPeer::EMAIL);
            $criteria->addSelectColumn(PersonPeer::EMAIL_ENABLED);
            $criteria->addSelectColumn(PersonPeer::IS_GLOBAL_ADMINISTRATOR);
            $criteria->addSelectColumn(PersonPeer::TOKEN);
            $criteria->addSelectColumn(PersonPeer::TOKEN_EXPIRATION);
            $criteria->addSelectColumn(PersonPeer::TOKEN_OPERATION);
            $criteria->addSelectColumn(PersonPeer::TOKEN_DATA);
            $criteria->addSelectColumn(PersonPeer::BAD_PASSWORD_COUNT);
            $criteria->addSelectColumn(PersonPeer::BLOCKED_ACCESS);
            $criteria->addSelectColumn(PersonPeer::LAST_LOGIN);
        } else {
            $criteria->addSelectColumn($alias . '.ID');
            $criteria->addSelectColumn($alias . '.USER_NAME');
            $criteria->addSelectColumn($alias . '.DISPLAY_NAME');
            $criteria->addSelectColumn($alias . '.DESCRIPTION');
            $criteria->addSelectColumn($alias . '.PASSWORD');
            $criteria->addSelectColumn($alias . '.GENDER');
            $criteria->addSelectColumn($alias . '.EMAIL');
            $criteria->addSelectColumn($alias . '.EMAIL_ENABLED');
            $criteria->addSelectColumn($alias . '.IS_GLOBAL_ADMINISTRATOR');
            $criteria->addSelectColumn($alias . '.TOKEN');
            $criteria->addSelectColumn($alias . '.TOKEN_EXPIRATION');
            $criteria->addSelectColumn($alias . '.TOKEN_OPERATION');
            $criteria->addSelectColumn($alias . '.TOKEN_DATA');
            $criteria->addSelectColumn($alias . '.BAD_PASSWORD_COUNT');
            $criteria->addSelectColumn($alias . '.BLOCKED_ACCESS');
            $criteria->addSelectColumn($alias . '.LAST_LOGIN');
        }
    }

    /**
     * Returns the number of rows matching criteria.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @return int Number of matching rows.
     */
    public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
    {
        // we may modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PersonPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PersonPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(PersonPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(PersonPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        // BasePeer returns a PDOStatement
        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }
    /**
     * Selects one object from the DB.
     *
     * @param      Criteria $criteria object used to create the SELECT statement.
     * @param      PropelPDO $con
     * @return                 Person
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = PersonPeer::doSelect($critcopy, $con);
        if ($objects) {
            return $objects[0];
        }

        return null;
    }
    /**
     * Selects several row from the DB.
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con
     * @return array           Array of selected Objects
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelect(Criteria $criteria, PropelPDO $con = null)
    {
        return PersonPeer::populateObjects(PersonPeer::doSelectStmt($criteria, $con));
    }
    /**
     * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
     *
     * Use this method directly if you want to work with an executed statement durirectly (for example
     * to perform your own object hydration).
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con The connection to use
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return PDOStatement The executed PDOStatement object.
     * @see        BasePeer::doSelect()
     */
    public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PersonPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            PersonPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(PersonPeer::DATABASE_NAME);

        // BasePeer returns a PDOStatement
        return BasePeer::doSelect($criteria, $con);
    }
    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doSelect*()
     * methods in your stub classes -- you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by doSelect*()
     * and retrieveByPK*() calls.
     *
     * @param      Person $obj A Person object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            PersonPeer::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param      mixed $value A Person object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Person) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Person object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(PersonPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Person Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(PersonPeer::$instances[$key])) {
                return PersonPeer::$instances[$key];
            }
        }

        return null; // just to be explicit
    }

    /**
     * Clear the instance pool.
     *
     * @return void
     */
    public static function clearInstancePool()
    {
        PersonPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to person
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in NonConformancePeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        NonConformancePeer::clearInstancePool();
        // Invalidate objects in NonConformancePeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        NonConformancePeer::clearInstancePool();
        // Invalidate objects in PersonOrganizationPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        PersonOrganizationPeer::clearInstancePool();
        // Invalidate objects in PersonProfilePeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        PersonProfilePeer::clearInstancePool();
        // Invalidate objects in RevisionPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        RevisionPeer::clearInstancePool();
        // Invalidate objects in RevisionPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        RevisionPeer::clearInstancePool();
        // Invalidate objects in RevisionPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        RevisionPeer::clearInstancePool();
        // Invalidate objects in SessionPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        SessionPeer::clearInstancePool();
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return string A string version of PK or null if the components of primary key in result array are all null.
     */
    public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
    {
        // If the PK cannot be derived from the row, return null.
        if ($row[$startcol] === null) {
            return null;
        }

        return (string) $row[$startcol];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $startcol = 0)
    {

        return (int) $row[$startcol];
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function populateObjects(PDOStatement $stmt)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = PersonPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = PersonPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = PersonPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PersonPeer::addInstanceToPool($obj, $key);
            } // if key exists
        }
        $stmt->closeCursor();

        return $results;
    }
    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return array (Person object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = PersonPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = PersonPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + PersonPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PersonPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            PersonPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * Returns the TableMap related to this peer.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getDatabaseMap(PersonPeer::DATABASE_NAME)->getTable(PersonPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BasePersonPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BasePersonPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new PersonTableMap());
      }
    }

    /**
     * The class that the Peer will make instances of.
     *
     *
     * @return string ClassName
     */
    public static function getOMClass()
    {
        return PersonPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Person or Criteria object.
     *
     * @param      mixed $values Criteria or Person object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PersonPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Person object
        }

        if ($criteria->containsKey(PersonPeer::ID) && $criteria->keyContainsValue(PersonPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.PersonPeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(PersonPeer::DATABASE_NAME);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = BasePeer::doInsert($criteria, $con);
            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

    /**
     * Performs an UPDATE on the database, given a Person or Criteria object.
     *
     * @param      mixed $values Criteria or Person object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PersonPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(PersonPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(PersonPeer::ID);
            $value = $criteria->remove(PersonPeer::ID);
            if ($value) {
                $selectCriteria->add(PersonPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(PersonPeer::TABLE_NAME);
            }

        } else { // $values is Person object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(PersonPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the person table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PersonPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(PersonPeer::TABLE_NAME, $con, PersonPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PersonPeer::clearInstancePool();
            PersonPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Person or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Person object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param      PropelPDO $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *				if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, PropelPDO $con = null)
     {
        if ($con === null) {
            $con = Propel::getConnection(PersonPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            PersonPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Person) { // it's a model object
            // invalidate the cache for this single object
            PersonPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PersonPeer::DATABASE_NAME);
            $criteria->add(PersonPeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                PersonPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(PersonPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            PersonPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Person object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Person $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(PersonPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(PersonPeer::TABLE_NAME);

            if (! is_array($cols)) {
                $cols = array($cols);
            }

            foreach ($cols as $colName) {
                if ($tableMap->hasColumn($colName)) {
                    $get = 'get' . $tableMap->getColumn($colName)->getPhpName();
                    $columns[$colName] = $obj->$get();
                }
            }
        } else {

        }

        return BasePeer::doValidate(PersonPeer::DATABASE_NAME, PersonPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Person
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = PersonPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(PersonPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(PersonPeer::DATABASE_NAME);
        $criteria->add(PersonPeer::ID, $pk);

        $v = PersonPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Person[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PersonPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(PersonPeer::DATABASE_NAME);
            $criteria->add(PersonPeer::ID, $pks, Criteria::IN);
            $objs = PersonPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BasePersonPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BasePersonPeer::buildTableMap();

