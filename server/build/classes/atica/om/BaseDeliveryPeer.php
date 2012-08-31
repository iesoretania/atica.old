<?php


/**
 * Base static class for performing query and update operations on the 'delivery' table.
 *
 *
 *
 * @package propel.generator.atica.om
 */
abstract class BaseDeliveryPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'atica';

    /** the table name for this class */
    const TABLE_NAME = 'delivery';

    /** the related Propel class for this table */
    const OM_CLASS = 'Delivery';

    /** the related TableMap class for this table */
    const TM_CLASS = 'DeliveryTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 8;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 8;

    /** the column name for the ID field */
    const ID = 'delivery.ID';

    /** the column name for the SNAPSHOT_ID field */
    const SNAPSHOT_ID = 'delivery.SNAPSHOT_ID';

    /** the column name for the PROFILE_ID field */
    const PROFILE_ID = 'delivery.PROFILE_ID';

    /** the column name for the DISPLAY_NAME field */
    const DISPLAY_NAME = 'delivery.DISPLAY_NAME';

    /** the column name for the DESCRIPTION field */
    const DESCRIPTION = 'delivery.DESCRIPTION';

    /** the column name for the CREATION_DATE field */
    const CREATION_DATE = 'delivery.CREATION_DATE';

    /** the column name for the CURRENT_REVISION_ID field */
    const CURRENT_REVISION_ID = 'delivery.CURRENT_REVISION_ID';

    /** the column name for the PUBLIC_TOKEN field */
    const PUBLIC_TOKEN = 'delivery.PUBLIC_TOKEN';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Delivery objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Delivery[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. DeliveryPeer::$fieldNames[DeliveryPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'SnapshotId', 'ProfileId', 'DisplayName', 'Description', 'CreationDate', 'CurrentRevisionId', 'PublicToken', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'snapshotId', 'profileId', 'displayName', 'description', 'creationDate', 'currentRevisionId', 'publicToken', ),
        BasePeer::TYPE_COLNAME => array (DeliveryPeer::ID, DeliveryPeer::SNAPSHOT_ID, DeliveryPeer::PROFILE_ID, DeliveryPeer::DISPLAY_NAME, DeliveryPeer::DESCRIPTION, DeliveryPeer::CREATION_DATE, DeliveryPeer::CURRENT_REVISION_ID, DeliveryPeer::PUBLIC_TOKEN, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'SNAPSHOT_ID', 'PROFILE_ID', 'DISPLAY_NAME', 'DESCRIPTION', 'CREATION_DATE', 'CURRENT_REVISION_ID', 'PUBLIC_TOKEN', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'snapshot_id', 'profile_id', 'display_name', 'description', 'creation_date', 'current_revision_id', 'public_token', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. DeliveryPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'SnapshotId' => 1, 'ProfileId' => 2, 'DisplayName' => 3, 'Description' => 4, 'CreationDate' => 5, 'CurrentRevisionId' => 6, 'PublicToken' => 7, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'snapshotId' => 1, 'profileId' => 2, 'displayName' => 3, 'description' => 4, 'creationDate' => 5, 'currentRevisionId' => 6, 'publicToken' => 7, ),
        BasePeer::TYPE_COLNAME => array (DeliveryPeer::ID => 0, DeliveryPeer::SNAPSHOT_ID => 1, DeliveryPeer::PROFILE_ID => 2, DeliveryPeer::DISPLAY_NAME => 3, DeliveryPeer::DESCRIPTION => 4, DeliveryPeer::CREATION_DATE => 5, DeliveryPeer::CURRENT_REVISION_ID => 6, DeliveryPeer::PUBLIC_TOKEN => 7, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'SNAPSHOT_ID' => 1, 'PROFILE_ID' => 2, 'DISPLAY_NAME' => 3, 'DESCRIPTION' => 4, 'CREATION_DATE' => 5, 'CURRENT_REVISION_ID' => 6, 'PUBLIC_TOKEN' => 7, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'snapshot_id' => 1, 'profile_id' => 2, 'display_name' => 3, 'description' => 4, 'creation_date' => 5, 'current_revision_id' => 6, 'public_token' => 7, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
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
        $toNames = DeliveryPeer::getFieldNames($toType);
        $key = isset(DeliveryPeer::$fieldKeys[$fromType][$name]) ? DeliveryPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(DeliveryPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, DeliveryPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return DeliveryPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. DeliveryPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(DeliveryPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(DeliveryPeer::ID);
            $criteria->addSelectColumn(DeliveryPeer::SNAPSHOT_ID);
            $criteria->addSelectColumn(DeliveryPeer::PROFILE_ID);
            $criteria->addSelectColumn(DeliveryPeer::DISPLAY_NAME);
            $criteria->addSelectColumn(DeliveryPeer::DESCRIPTION);
            $criteria->addSelectColumn(DeliveryPeer::CREATION_DATE);
            $criteria->addSelectColumn(DeliveryPeer::CURRENT_REVISION_ID);
            $criteria->addSelectColumn(DeliveryPeer::PUBLIC_TOKEN);
        } else {
            $criteria->addSelectColumn($alias . '.ID');
            $criteria->addSelectColumn($alias . '.SNAPSHOT_ID');
            $criteria->addSelectColumn($alias . '.PROFILE_ID');
            $criteria->addSelectColumn($alias . '.DISPLAY_NAME');
            $criteria->addSelectColumn($alias . '.DESCRIPTION');
            $criteria->addSelectColumn($alias . '.CREATION_DATE');
            $criteria->addSelectColumn($alias . '.CURRENT_REVISION_ID');
            $criteria->addSelectColumn($alias . '.PUBLIC_TOKEN');
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
        $criteria->setPrimaryTableName(DeliveryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            DeliveryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(DeliveryPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(DeliveryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Delivery
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = DeliveryPeer::doSelect($critcopy, $con);
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
        return DeliveryPeer::populateObjects(DeliveryPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(DeliveryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            DeliveryPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(DeliveryPeer::DATABASE_NAME);

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
     * @param      Delivery $obj A Delivery object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            DeliveryPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Delivery object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Delivery) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Delivery object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(DeliveryPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Delivery Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(DeliveryPeer::$instances[$key])) {
                return DeliveryPeer::$instances[$key];
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
        DeliveryPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to delivery
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in FolderDeliveryPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        FolderDeliveryPeer::clearInstancePool();
        // Invalidate objects in EventDeliveryPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        EventDeliveryPeer::clearInstancePool();
        // Invalidate objects in RevisionPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        RevisionPeer::clearInstancePool();
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
        $cls = DeliveryPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = DeliveryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = DeliveryPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                DeliveryPeer::addInstanceToPool($obj, $key);
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
     * @return array (Delivery object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = DeliveryPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = DeliveryPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + DeliveryPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = DeliveryPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            DeliveryPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Profile table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinProfile(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(DeliveryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            DeliveryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(DeliveryPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(DeliveryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(DeliveryPeer::PROFILE_ID, ProfilePeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related RevisionRelatedByCurrentRevisionId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinRevisionRelatedByCurrentRevisionId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(DeliveryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            DeliveryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(DeliveryPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(DeliveryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(DeliveryPeer::CURRENT_REVISION_ID, RevisionPeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Snapshot table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinSnapshot(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(DeliveryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            DeliveryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(DeliveryPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(DeliveryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(DeliveryPeer::SNAPSHOT_ID, SnapshotPeer::ID, $join_behavior);

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
     * Selects a collection of Delivery objects pre-filled with their Profile objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Delivery objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinProfile(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(DeliveryPeer::DATABASE_NAME);
        }

        DeliveryPeer::addSelectColumns($criteria);
        $startcol = DeliveryPeer::NUM_HYDRATE_COLUMNS;
        ProfilePeer::addSelectColumns($criteria);

        $criteria->addJoin(DeliveryPeer::PROFILE_ID, ProfilePeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = DeliveryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = DeliveryPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = DeliveryPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                DeliveryPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ProfilePeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ProfilePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ProfilePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ProfilePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Delivery) to $obj2 (Profile)
                $obj2->addDelivery($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Delivery objects pre-filled with their Revision objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Delivery objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinRevisionRelatedByCurrentRevisionId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(DeliveryPeer::DATABASE_NAME);
        }

        DeliveryPeer::addSelectColumns($criteria);
        $startcol = DeliveryPeer::NUM_HYDRATE_COLUMNS;
        RevisionPeer::addSelectColumns($criteria);

        $criteria->addJoin(DeliveryPeer::CURRENT_REVISION_ID, RevisionPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = DeliveryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = DeliveryPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = DeliveryPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                DeliveryPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = RevisionPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = RevisionPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = RevisionPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    RevisionPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Delivery) to $obj2 (Revision)
                $obj2->addDeliveryRelatedByCurrentRevisionId($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Delivery objects pre-filled with their Snapshot objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Delivery objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSnapshot(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(DeliveryPeer::DATABASE_NAME);
        }

        DeliveryPeer::addSelectColumns($criteria);
        $startcol = DeliveryPeer::NUM_HYDRATE_COLUMNS;
        SnapshotPeer::addSelectColumns($criteria);

        $criteria->addJoin(DeliveryPeer::SNAPSHOT_ID, SnapshotPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = DeliveryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = DeliveryPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = DeliveryPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                DeliveryPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = SnapshotPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = SnapshotPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = SnapshotPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    SnapshotPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Delivery) to $obj2 (Snapshot)
                $obj2->addDelivery($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining all related tables
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(DeliveryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            DeliveryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(DeliveryPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(DeliveryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(DeliveryPeer::PROFILE_ID, ProfilePeer::ID, $join_behavior);

        $criteria->addJoin(DeliveryPeer::CURRENT_REVISION_ID, RevisionPeer::ID, $join_behavior);

        $criteria->addJoin(DeliveryPeer::SNAPSHOT_ID, SnapshotPeer::ID, $join_behavior);

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
     * Selects a collection of Delivery objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Delivery objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(DeliveryPeer::DATABASE_NAME);
        }

        DeliveryPeer::addSelectColumns($criteria);
        $startcol2 = DeliveryPeer::NUM_HYDRATE_COLUMNS;

        ProfilePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ProfilePeer::NUM_HYDRATE_COLUMNS;

        RevisionPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + RevisionPeer::NUM_HYDRATE_COLUMNS;

        SnapshotPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SnapshotPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(DeliveryPeer::PROFILE_ID, ProfilePeer::ID, $join_behavior);

        $criteria->addJoin(DeliveryPeer::CURRENT_REVISION_ID, RevisionPeer::ID, $join_behavior);

        $criteria->addJoin(DeliveryPeer::SNAPSHOT_ID, SnapshotPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = DeliveryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = DeliveryPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = DeliveryPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                DeliveryPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Profile rows

            $key2 = ProfilePeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = ProfilePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ProfilePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ProfilePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Delivery) to the collection in $obj2 (Profile)
                $obj2->addDelivery($obj1);
            } // if joined row not null

            // Add objects for joined Revision rows

            $key3 = RevisionPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = RevisionPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = RevisionPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    RevisionPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Delivery) to the collection in $obj3 (Revision)
                $obj3->addDeliveryRelatedByCurrentRevisionId($obj1);
            } // if joined row not null

            // Add objects for joined Snapshot rows

            $key4 = SnapshotPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = SnapshotPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = SnapshotPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    SnapshotPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (Delivery) to the collection in $obj4 (Snapshot)
                $obj4->addDelivery($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Profile table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptProfile(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(DeliveryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            DeliveryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(DeliveryPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(DeliveryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(DeliveryPeer::CURRENT_REVISION_ID, RevisionPeer::ID, $join_behavior);

        $criteria->addJoin(DeliveryPeer::SNAPSHOT_ID, SnapshotPeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related RevisionRelatedByCurrentRevisionId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptRevisionRelatedByCurrentRevisionId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(DeliveryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            DeliveryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(DeliveryPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(DeliveryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(DeliveryPeer::PROFILE_ID, ProfilePeer::ID, $join_behavior);

        $criteria->addJoin(DeliveryPeer::SNAPSHOT_ID, SnapshotPeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Snapshot table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptSnapshot(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(DeliveryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            DeliveryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(DeliveryPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(DeliveryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(DeliveryPeer::PROFILE_ID, ProfilePeer::ID, $join_behavior);

        $criteria->addJoin(DeliveryPeer::CURRENT_REVISION_ID, RevisionPeer::ID, $join_behavior);

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
     * Selects a collection of Delivery objects pre-filled with all related objects except Profile.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Delivery objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptProfile(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(DeliveryPeer::DATABASE_NAME);
        }

        DeliveryPeer::addSelectColumns($criteria);
        $startcol2 = DeliveryPeer::NUM_HYDRATE_COLUMNS;

        RevisionPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RevisionPeer::NUM_HYDRATE_COLUMNS;

        SnapshotPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SnapshotPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(DeliveryPeer::CURRENT_REVISION_ID, RevisionPeer::ID, $join_behavior);

        $criteria->addJoin(DeliveryPeer::SNAPSHOT_ID, SnapshotPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = DeliveryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = DeliveryPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = DeliveryPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                DeliveryPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Revision rows

                $key2 = RevisionPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = RevisionPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = RevisionPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    RevisionPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Delivery) to the collection in $obj2 (Revision)
                $obj2->addDeliveryRelatedByCurrentRevisionId($obj1);

            } // if joined row is not null

                // Add objects for joined Snapshot rows

                $key3 = SnapshotPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SnapshotPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = SnapshotPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SnapshotPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Delivery) to the collection in $obj3 (Snapshot)
                $obj3->addDelivery($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Delivery objects pre-filled with all related objects except RevisionRelatedByCurrentRevisionId.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Delivery objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptRevisionRelatedByCurrentRevisionId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(DeliveryPeer::DATABASE_NAME);
        }

        DeliveryPeer::addSelectColumns($criteria);
        $startcol2 = DeliveryPeer::NUM_HYDRATE_COLUMNS;

        ProfilePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ProfilePeer::NUM_HYDRATE_COLUMNS;

        SnapshotPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SnapshotPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(DeliveryPeer::PROFILE_ID, ProfilePeer::ID, $join_behavior);

        $criteria->addJoin(DeliveryPeer::SNAPSHOT_ID, SnapshotPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = DeliveryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = DeliveryPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = DeliveryPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                DeliveryPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Profile rows

                $key2 = ProfilePeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = ProfilePeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = ProfilePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ProfilePeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Delivery) to the collection in $obj2 (Profile)
                $obj2->addDelivery($obj1);

            } // if joined row is not null

                // Add objects for joined Snapshot rows

                $key3 = SnapshotPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SnapshotPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = SnapshotPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SnapshotPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Delivery) to the collection in $obj3 (Snapshot)
                $obj3->addDelivery($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Delivery objects pre-filled with all related objects except Snapshot.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Delivery objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptSnapshot(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(DeliveryPeer::DATABASE_NAME);
        }

        DeliveryPeer::addSelectColumns($criteria);
        $startcol2 = DeliveryPeer::NUM_HYDRATE_COLUMNS;

        ProfilePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ProfilePeer::NUM_HYDRATE_COLUMNS;

        RevisionPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + RevisionPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(DeliveryPeer::PROFILE_ID, ProfilePeer::ID, $join_behavior);

        $criteria->addJoin(DeliveryPeer::CURRENT_REVISION_ID, RevisionPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = DeliveryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = DeliveryPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = DeliveryPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                DeliveryPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Profile rows

                $key2 = ProfilePeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = ProfilePeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = ProfilePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ProfilePeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Delivery) to the collection in $obj2 (Profile)
                $obj2->addDelivery($obj1);

            } // if joined row is not null

                // Add objects for joined Revision rows

                $key3 = RevisionPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = RevisionPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = RevisionPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    RevisionPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Delivery) to the collection in $obj3 (Revision)
                $obj3->addDeliveryRelatedByCurrentRevisionId($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
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
        return Propel::getDatabaseMap(DeliveryPeer::DATABASE_NAME)->getTable(DeliveryPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseDeliveryPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseDeliveryPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new DeliveryTableMap());
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
        return DeliveryPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Delivery or Criteria object.
     *
     * @param      mixed $values Criteria or Delivery object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(DeliveryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Delivery object
        }

        if ($criteria->containsKey(DeliveryPeer::ID) && $criteria->keyContainsValue(DeliveryPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.DeliveryPeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(DeliveryPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Delivery or Criteria object.
     *
     * @param      mixed $values Criteria or Delivery object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(DeliveryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(DeliveryPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(DeliveryPeer::ID);
            $value = $criteria->remove(DeliveryPeer::ID);
            if ($value) {
                $selectCriteria->add(DeliveryPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(DeliveryPeer::TABLE_NAME);
            }

        } else { // $values is Delivery object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(DeliveryPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the delivery table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(DeliveryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(DeliveryPeer::TABLE_NAME, $con, DeliveryPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            DeliveryPeer::clearInstancePool();
            DeliveryPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Delivery or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Delivery object or primary key or array of primary keys
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
            $con = Propel::getConnection(DeliveryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            DeliveryPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Delivery) { // it's a model object
            // invalidate the cache for this single object
            DeliveryPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(DeliveryPeer::DATABASE_NAME);
            $criteria->add(DeliveryPeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                DeliveryPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(DeliveryPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            DeliveryPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Delivery object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Delivery $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(DeliveryPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(DeliveryPeer::TABLE_NAME);

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

        return BasePeer::doValidate(DeliveryPeer::DATABASE_NAME, DeliveryPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Delivery
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = DeliveryPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(DeliveryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(DeliveryPeer::DATABASE_NAME);
        $criteria->add(DeliveryPeer::ID, $pk);

        $v = DeliveryPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Delivery[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(DeliveryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(DeliveryPeer::DATABASE_NAME);
            $criteria->add(DeliveryPeer::ID, $pks, Criteria::IN);
            $objs = DeliveryPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseDeliveryPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseDeliveryPeer::buildTableMap();

