<?php


/**
 * Base static class for performing query and update operations on the 'action' table.
 *
 *
 *
 * @package propel.generator.atica.om
 */
abstract class BaseActionPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'atica';

    /** the table name for this class */
    const TABLE_NAME = 'action';

    /** the related Propel class for this table */
    const OM_CLASS = 'Action';

    /** the related TableMap class for this table */
    const TM_CLASS = 'ActionTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 13;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 13;

    /** the column name for the ID field */
    const ID = 'action.ID';

    /** the column name for the SNAPSHOT_ID field */
    const SNAPSHOT_ID = 'action.SNAPSHOT_ID';

    /** the column name for the ACTION_TYPE_ID field */
    const ACTION_TYPE_ID = 'action.ACTION_TYPE_ID';

    /** the column name for the NON_CONFORMANCE_ID field */
    const NON_CONFORMANCE_ID = 'action.NON_CONFORMANCE_ID';

    /** the column name for the ACTION_LEFT field */
    const ACTION_LEFT = 'action.ACTION_LEFT';

    /** the column name for the ACTION_RIGHT field */
    const ACTION_RIGHT = 'action.ACTION_RIGHT';

    /** the column name for the ACTION_LEVEL field */
    const ACTION_LEVEL = 'action.ACTION_LEVEL';

    /** the column name for the DISPLAY_NAME field */
    const DISPLAY_NAME = 'action.DISPLAY_NAME';

    /** the column name for the DESCRIPTION field */
    const DESCRIPTION = 'action.DESCRIPTION';

    /** the column name for the CHECK_DUE field */
    const CHECK_DUE = 'action.CHECK_DUE';

    /** the column name for the CHECKED_AT field */
    const CHECKED_AT = 'action.CHECKED_AT';

    /** the column name for the RESULT field */
    const RESULT = 'action.RESULT';

    /** the column name for the RESULT_DESCRIPTION field */
    const RESULT_DESCRIPTION = 'action.RESULT_DESCRIPTION';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Action objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Action[]
     */
    public static $instances = array();


    // nested_set behavior

    /**
     * Left column for the set
     */
    const LEFT_COL = 'action.ACTION_LEFT';

    /**
     * Right column for the set
     */
    const RIGHT_COL = 'action.ACTION_RIGHT';

    /**
     * Level column for the set
     */
    const LEVEL_COL = 'action.ACTION_LEVEL';

    /**
     * Scope column for the set
     */
    const SCOPE_COL = 'action.SNAPSHOT_ID';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. ActionPeer::$fieldNames[ActionPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'SnapshotId', 'ActionTypeId', 'NonConformanceId', 'ActionLeft', 'ActionRight', 'ActionLevel', 'DisplayName', 'Description', 'CheckDue', 'CheckedAt', 'Result', 'ResultDescription', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'snapshotId', 'actionTypeId', 'nonConformanceId', 'actionLeft', 'actionRight', 'actionLevel', 'displayName', 'description', 'checkDue', 'checkedAt', 'result', 'resultDescription', ),
        BasePeer::TYPE_COLNAME => array (ActionPeer::ID, ActionPeer::SNAPSHOT_ID, ActionPeer::ACTION_TYPE_ID, ActionPeer::NON_CONFORMANCE_ID, ActionPeer::ACTION_LEFT, ActionPeer::ACTION_RIGHT, ActionPeer::ACTION_LEVEL, ActionPeer::DISPLAY_NAME, ActionPeer::DESCRIPTION, ActionPeer::CHECK_DUE, ActionPeer::CHECKED_AT, ActionPeer::RESULT, ActionPeer::RESULT_DESCRIPTION, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'SNAPSHOT_ID', 'ACTION_TYPE_ID', 'NON_CONFORMANCE_ID', 'ACTION_LEFT', 'ACTION_RIGHT', 'ACTION_LEVEL', 'DISPLAY_NAME', 'DESCRIPTION', 'CHECK_DUE', 'CHECKED_AT', 'RESULT', 'RESULT_DESCRIPTION', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'snapshot_id', 'action_type_id', 'non_conformance_id', 'action_left', 'action_right', 'action_level', 'display_name', 'description', 'check_due', 'checked_at', 'result', 'result_description', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. ActionPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'SnapshotId' => 1, 'ActionTypeId' => 2, 'NonConformanceId' => 3, 'ActionLeft' => 4, 'ActionRight' => 5, 'ActionLevel' => 6, 'DisplayName' => 7, 'Description' => 8, 'CheckDue' => 9, 'CheckedAt' => 10, 'Result' => 11, 'ResultDescription' => 12, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'snapshotId' => 1, 'actionTypeId' => 2, 'nonConformanceId' => 3, 'actionLeft' => 4, 'actionRight' => 5, 'actionLevel' => 6, 'displayName' => 7, 'description' => 8, 'checkDue' => 9, 'checkedAt' => 10, 'result' => 11, 'resultDescription' => 12, ),
        BasePeer::TYPE_COLNAME => array (ActionPeer::ID => 0, ActionPeer::SNAPSHOT_ID => 1, ActionPeer::ACTION_TYPE_ID => 2, ActionPeer::NON_CONFORMANCE_ID => 3, ActionPeer::ACTION_LEFT => 4, ActionPeer::ACTION_RIGHT => 5, ActionPeer::ACTION_LEVEL => 6, ActionPeer::DISPLAY_NAME => 7, ActionPeer::DESCRIPTION => 8, ActionPeer::CHECK_DUE => 9, ActionPeer::CHECKED_AT => 10, ActionPeer::RESULT => 11, ActionPeer::RESULT_DESCRIPTION => 12, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'SNAPSHOT_ID' => 1, 'ACTION_TYPE_ID' => 2, 'NON_CONFORMANCE_ID' => 3, 'ACTION_LEFT' => 4, 'ACTION_RIGHT' => 5, 'ACTION_LEVEL' => 6, 'DISPLAY_NAME' => 7, 'DESCRIPTION' => 8, 'CHECK_DUE' => 9, 'CHECKED_AT' => 10, 'RESULT' => 11, 'RESULT_DESCRIPTION' => 12, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'snapshot_id' => 1, 'action_type_id' => 2, 'non_conformance_id' => 3, 'action_left' => 4, 'action_right' => 5, 'action_level' => 6, 'display_name' => 7, 'description' => 8, 'check_due' => 9, 'checked_at' => 10, 'result' => 11, 'result_description' => 12, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
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
        $toNames = ActionPeer::getFieldNames($toType);
        $key = isset(ActionPeer::$fieldKeys[$fromType][$name]) ? ActionPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(ActionPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, ActionPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return ActionPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. ActionPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(ActionPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(ActionPeer::ID);
            $criteria->addSelectColumn(ActionPeer::SNAPSHOT_ID);
            $criteria->addSelectColumn(ActionPeer::ACTION_TYPE_ID);
            $criteria->addSelectColumn(ActionPeer::NON_CONFORMANCE_ID);
            $criteria->addSelectColumn(ActionPeer::ACTION_LEFT);
            $criteria->addSelectColumn(ActionPeer::ACTION_RIGHT);
            $criteria->addSelectColumn(ActionPeer::ACTION_LEVEL);
            $criteria->addSelectColumn(ActionPeer::DISPLAY_NAME);
            $criteria->addSelectColumn(ActionPeer::DESCRIPTION);
            $criteria->addSelectColumn(ActionPeer::CHECK_DUE);
            $criteria->addSelectColumn(ActionPeer::CHECKED_AT);
            $criteria->addSelectColumn(ActionPeer::RESULT);
            $criteria->addSelectColumn(ActionPeer::RESULT_DESCRIPTION);
        } else {
            $criteria->addSelectColumn($alias . '.ID');
            $criteria->addSelectColumn($alias . '.SNAPSHOT_ID');
            $criteria->addSelectColumn($alias . '.ACTION_TYPE_ID');
            $criteria->addSelectColumn($alias . '.NON_CONFORMANCE_ID');
            $criteria->addSelectColumn($alias . '.ACTION_LEFT');
            $criteria->addSelectColumn($alias . '.ACTION_RIGHT');
            $criteria->addSelectColumn($alias . '.ACTION_LEVEL');
            $criteria->addSelectColumn($alias . '.DISPLAY_NAME');
            $criteria->addSelectColumn($alias . '.DESCRIPTION');
            $criteria->addSelectColumn($alias . '.CHECK_DUE');
            $criteria->addSelectColumn($alias . '.CHECKED_AT');
            $criteria->addSelectColumn($alias . '.RESULT');
            $criteria->addSelectColumn($alias . '.RESULT_DESCRIPTION');
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
        $criteria->setPrimaryTableName(ActionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ActionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(ActionPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(ActionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Action
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = ActionPeer::doSelect($critcopy, $con);
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
        return ActionPeer::populateObjects(ActionPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(ActionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            ActionPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(ActionPeer::DATABASE_NAME);

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
     * @param      Action $obj A Action object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            ActionPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Action object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Action) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Action object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(ActionPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Action Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(ActionPeer::$instances[$key])) {
                return ActionPeer::$instances[$key];
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
        ActionPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to action
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
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
        $cls = ActionPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = ActionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = ActionPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ActionPeer::addInstanceToPool($obj, $key);
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
     * @return array (Action object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = ActionPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = ActionPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + ActionPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ActionPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            ActionPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related ActionType table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinActionType(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ActionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ActionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ActionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ActionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ActionPeer::ACTION_TYPE_ID, ActionTypePeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related NonConformance table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinNonConformance(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ActionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ActionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ActionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ActionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ActionPeer::NON_CONFORMANCE_ID, NonConformancePeer::ID, $join_behavior);

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
        $criteria->setPrimaryTableName(ActionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ActionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ActionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ActionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ActionPeer::SNAPSHOT_ID, SnapshotPeer::ID, $join_behavior);

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
     * Selects a collection of Action objects pre-filled with their ActionType objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Action objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinActionType(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ActionPeer::DATABASE_NAME);
        }

        ActionPeer::addSelectColumns($criteria);
        $startcol = ActionPeer::NUM_HYDRATE_COLUMNS;
        ActionTypePeer::addSelectColumns($criteria);

        $criteria->addJoin(ActionPeer::ACTION_TYPE_ID, ActionTypePeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ActionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ActionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ActionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ActionPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ActionTypePeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ActionTypePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ActionTypePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ActionTypePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Action) to $obj2 (ActionType)
                $obj2->addAction($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Action objects pre-filled with their NonConformance objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Action objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinNonConformance(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ActionPeer::DATABASE_NAME);
        }

        ActionPeer::addSelectColumns($criteria);
        $startcol = ActionPeer::NUM_HYDRATE_COLUMNS;
        NonConformancePeer::addSelectColumns($criteria);

        $criteria->addJoin(ActionPeer::NON_CONFORMANCE_ID, NonConformancePeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ActionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ActionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ActionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ActionPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = NonConformancePeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = NonConformancePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = NonConformancePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    NonConformancePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Action) to $obj2 (NonConformance)
                $obj2->addAction($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Action objects pre-filled with their Snapshot objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Action objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSnapshot(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ActionPeer::DATABASE_NAME);
        }

        ActionPeer::addSelectColumns($criteria);
        $startcol = ActionPeer::NUM_HYDRATE_COLUMNS;
        SnapshotPeer::addSelectColumns($criteria);

        $criteria->addJoin(ActionPeer::SNAPSHOT_ID, SnapshotPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ActionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ActionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ActionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ActionPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Action) to $obj2 (Snapshot)
                $obj2->addAction($obj1);

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
        $criteria->setPrimaryTableName(ActionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ActionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ActionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ActionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ActionPeer::ACTION_TYPE_ID, ActionTypePeer::ID, $join_behavior);

        $criteria->addJoin(ActionPeer::NON_CONFORMANCE_ID, NonConformancePeer::ID, $join_behavior);

        $criteria->addJoin(ActionPeer::SNAPSHOT_ID, SnapshotPeer::ID, $join_behavior);

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
     * Selects a collection of Action objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Action objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ActionPeer::DATABASE_NAME);
        }

        ActionPeer::addSelectColumns($criteria);
        $startcol2 = ActionPeer::NUM_HYDRATE_COLUMNS;

        ActionTypePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ActionTypePeer::NUM_HYDRATE_COLUMNS;

        NonConformancePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + NonConformancePeer::NUM_HYDRATE_COLUMNS;

        SnapshotPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SnapshotPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ActionPeer::ACTION_TYPE_ID, ActionTypePeer::ID, $join_behavior);

        $criteria->addJoin(ActionPeer::NON_CONFORMANCE_ID, NonConformancePeer::ID, $join_behavior);

        $criteria->addJoin(ActionPeer::SNAPSHOT_ID, SnapshotPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ActionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ActionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ActionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ActionPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined ActionType rows

            $key2 = ActionTypePeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = ActionTypePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ActionTypePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ActionTypePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Action) to the collection in $obj2 (ActionType)
                $obj2->addAction($obj1);
            } // if joined row not null

            // Add objects for joined NonConformance rows

            $key3 = NonConformancePeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = NonConformancePeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = NonConformancePeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    NonConformancePeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Action) to the collection in $obj3 (NonConformance)
                $obj3->addAction($obj1);
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

                // Add the $obj1 (Action) to the collection in $obj4 (Snapshot)
                $obj4->addAction($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related ActionType table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptActionType(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ActionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ActionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ActionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ActionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ActionPeer::NON_CONFORMANCE_ID, NonConformancePeer::ID, $join_behavior);

        $criteria->addJoin(ActionPeer::SNAPSHOT_ID, SnapshotPeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related NonConformance table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptNonConformance(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ActionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ActionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ActionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ActionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ActionPeer::ACTION_TYPE_ID, ActionTypePeer::ID, $join_behavior);

        $criteria->addJoin(ActionPeer::SNAPSHOT_ID, SnapshotPeer::ID, $join_behavior);

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
        $criteria->setPrimaryTableName(ActionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ActionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ActionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ActionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ActionPeer::ACTION_TYPE_ID, ActionTypePeer::ID, $join_behavior);

        $criteria->addJoin(ActionPeer::NON_CONFORMANCE_ID, NonConformancePeer::ID, $join_behavior);

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
     * Selects a collection of Action objects pre-filled with all related objects except ActionType.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Action objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptActionType(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ActionPeer::DATABASE_NAME);
        }

        ActionPeer::addSelectColumns($criteria);
        $startcol2 = ActionPeer::NUM_HYDRATE_COLUMNS;

        NonConformancePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + NonConformancePeer::NUM_HYDRATE_COLUMNS;

        SnapshotPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SnapshotPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ActionPeer::NON_CONFORMANCE_ID, NonConformancePeer::ID, $join_behavior);

        $criteria->addJoin(ActionPeer::SNAPSHOT_ID, SnapshotPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ActionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ActionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ActionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ActionPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined NonConformance rows

                $key2 = NonConformancePeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = NonConformancePeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = NonConformancePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    NonConformancePeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Action) to the collection in $obj2 (NonConformance)
                $obj2->addAction($obj1);

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

                // Add the $obj1 (Action) to the collection in $obj3 (Snapshot)
                $obj3->addAction($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Action objects pre-filled with all related objects except NonConformance.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Action objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptNonConformance(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ActionPeer::DATABASE_NAME);
        }

        ActionPeer::addSelectColumns($criteria);
        $startcol2 = ActionPeer::NUM_HYDRATE_COLUMNS;

        ActionTypePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ActionTypePeer::NUM_HYDRATE_COLUMNS;

        SnapshotPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SnapshotPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ActionPeer::ACTION_TYPE_ID, ActionTypePeer::ID, $join_behavior);

        $criteria->addJoin(ActionPeer::SNAPSHOT_ID, SnapshotPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ActionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ActionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ActionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ActionPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined ActionType rows

                $key2 = ActionTypePeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = ActionTypePeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = ActionTypePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ActionTypePeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Action) to the collection in $obj2 (ActionType)
                $obj2->addAction($obj1);

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

                // Add the $obj1 (Action) to the collection in $obj3 (Snapshot)
                $obj3->addAction($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Action objects pre-filled with all related objects except Snapshot.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Action objects.
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
            $criteria->setDbName(ActionPeer::DATABASE_NAME);
        }

        ActionPeer::addSelectColumns($criteria);
        $startcol2 = ActionPeer::NUM_HYDRATE_COLUMNS;

        ActionTypePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ActionTypePeer::NUM_HYDRATE_COLUMNS;

        NonConformancePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + NonConformancePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ActionPeer::ACTION_TYPE_ID, ActionTypePeer::ID, $join_behavior);

        $criteria->addJoin(ActionPeer::NON_CONFORMANCE_ID, NonConformancePeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ActionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ActionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ActionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ActionPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined ActionType rows

                $key2 = ActionTypePeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = ActionTypePeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = ActionTypePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ActionTypePeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Action) to the collection in $obj2 (ActionType)
                $obj2->addAction($obj1);

            } // if joined row is not null

                // Add objects for joined NonConformance rows

                $key3 = NonConformancePeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = NonConformancePeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = NonConformancePeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    NonConformancePeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Action) to the collection in $obj3 (NonConformance)
                $obj3->addAction($obj1);

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
        return Propel::getDatabaseMap(ActionPeer::DATABASE_NAME)->getTable(ActionPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseActionPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseActionPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new ActionTableMap());
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
        return ActionPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Action or Criteria object.
     *
     * @param      mixed $values Criteria or Action object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ActionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Action object
        }

        if ($criteria->containsKey(ActionPeer::ID) && $criteria->keyContainsValue(ActionPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ActionPeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(ActionPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Action or Criteria object.
     *
     * @param      mixed $values Criteria or Action object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ActionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(ActionPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(ActionPeer::ID);
            $value = $criteria->remove(ActionPeer::ID);
            if ($value) {
                $selectCriteria->add(ActionPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(ActionPeer::TABLE_NAME);
            }

        } else { // $values is Action object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(ActionPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the action table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ActionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(ActionPeer::TABLE_NAME, $con, ActionPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ActionPeer::clearInstancePool();
            ActionPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Action or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Action object or primary key or array of primary keys
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
            $con = Propel::getConnection(ActionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            ActionPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Action) { // it's a model object
            // invalidate the cache for this single object
            ActionPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ActionPeer::DATABASE_NAME);
            $criteria->add(ActionPeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                ActionPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(ActionPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            ActionPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Action object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Action $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(ActionPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(ActionPeer::TABLE_NAME);

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

        return BasePeer::doValidate(ActionPeer::DATABASE_NAME, ActionPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Action
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = ActionPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(ActionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(ActionPeer::DATABASE_NAME);
        $criteria->add(ActionPeer::ID, $pk);

        $v = ActionPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Action[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ActionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(ActionPeer::DATABASE_NAME);
            $criteria->add(ActionPeer::ID, $pks, Criteria::IN);
            $objs = ActionPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

    // nested_set behavior

    /**
     * Returns the root nodes for the tree
     *
     * @param      PropelPDO $con	Connection to use.
     * @return     Action			Propel object for root node
     */
    public static function retrieveRoots(Criteria $criteria = null, PropelPDO $con = null)
    {
        if ($criteria === null) {
            $criteria = new Criteria(ActionPeer::DATABASE_NAME);
        }
        $criteria->add(ActionPeer::LEFT_COL, 1, Criteria::EQUAL);

        return ActionPeer::doSelect($criteria, $con);
    }

    /**
     * Returns the root node for a given scope
     *
     * @param      int $scope		Scope to determine which root node to return
     * @param      PropelPDO $con	Connection to use.
     * @return     Action			Propel object for root node
     */
    public static function retrieveRoot($scope = null, PropelPDO $con = null)
    {
        $c = new Criteria(ActionPeer::DATABASE_NAME);
        $c->add(ActionPeer::LEFT_COL, 1, Criteria::EQUAL);
        $c->add(ActionPeer::SCOPE_COL, $scope, Criteria::EQUAL);

        return ActionPeer::doSelectOne($c, $con);
    }

    /**
     * Returns the whole tree node for a given scope
     *
     * @param      int $scope		Scope to determine which root node to return
     * @param      Criteria $criteria	Optional Criteria to filter the query
     * @param      PropelPDO $con	Connection to use.
     * @return     Action			Propel object for root node
     */
    public static function retrieveTree($scope = null, Criteria $criteria = null, PropelPDO $con = null)
    {
        if ($criteria === null) {
            $criteria = new Criteria(ActionPeer::DATABASE_NAME);
        }
        $criteria->addAscendingOrderByColumn(ActionPeer::LEFT_COL);
        $criteria->add(ActionPeer::SCOPE_COL, $scope, Criteria::EQUAL);

        return ActionPeer::doSelect($criteria, $con);
    }

    /**
     * Tests if node is valid
     *
     * @param      Action $node	Propel object for src node
     * @return     bool
     */
    public static function isValid(Action $node = null)
    {
        if (is_object($node) && $node->getRightValue() > $node->getLeftValue()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Delete an entire tree
     *
     * @param      int $scope		Scope to determine which tree to delete
     * @param      PropelPDO $con	Connection to use.
     *
     * @return     int  The number of deleted nodes
     */
    public static function deleteTree($scope = null, PropelPDO $con = null)
    {
        $c = new Criteria(ActionPeer::DATABASE_NAME);
        $c->add(ActionPeer::SCOPE_COL, $scope, Criteria::EQUAL);

        return ActionPeer::doDelete($c, $con);
    }

    /**
     * Adds $delta to all L and R values that are >= $first and <= $last.
     * '$delta' can also be negative.
     *
     * @param      int $delta		Value to be shifted by, can be negative
     * @param      int $first		First node to be shifted
     * @param      int $last			Last node to be shifted (optional)
     * @param      int $scope		Scope to use for the shift
     * @param      PropelPDO $con		Connection to use.
     */
    public static function shiftRLValues($delta, $first, $last = null, $scope = null, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ActionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        // Shift left column values
        $whereCriteria = new Criteria(ActionPeer::DATABASE_NAME);
        $criterion = $whereCriteria->getNewCriterion(ActionPeer::LEFT_COL, $first, Criteria::GREATER_EQUAL);
        if (null !== $last) {
            $criterion->addAnd($whereCriteria->getNewCriterion(ActionPeer::LEFT_COL, $last, Criteria::LESS_EQUAL));
        }
        $whereCriteria->add($criterion);
        $whereCriteria->add(ActionPeer::SCOPE_COL, $scope, Criteria::EQUAL);

        $valuesCriteria = new Criteria(ActionPeer::DATABASE_NAME);
        $valuesCriteria->add(ActionPeer::LEFT_COL, array('raw' => ActionPeer::LEFT_COL . ' + ?', 'value' => $delta), Criteria::CUSTOM_EQUAL);

        BasePeer::doUpdate($whereCriteria, $valuesCriteria, $con);

        // Shift right column values
        $whereCriteria = new Criteria(ActionPeer::DATABASE_NAME);
        $criterion = $whereCriteria->getNewCriterion(ActionPeer::RIGHT_COL, $first, Criteria::GREATER_EQUAL);
        if (null !== $last) {
            $criterion->addAnd($whereCriteria->getNewCriterion(ActionPeer::RIGHT_COL, $last, Criteria::LESS_EQUAL));
        }
        $whereCriteria->add($criterion);
        $whereCriteria->add(ActionPeer::SCOPE_COL, $scope, Criteria::EQUAL);

        $valuesCriteria = new Criteria(ActionPeer::DATABASE_NAME);
        $valuesCriteria->add(ActionPeer::RIGHT_COL, array('raw' => ActionPeer::RIGHT_COL . ' + ?', 'value' => $delta), Criteria::CUSTOM_EQUAL);

        BasePeer::doUpdate($whereCriteria, $valuesCriteria, $con);
    }

    /**
     * Adds $delta to level for nodes having left value >= $first and right value <= $last.
     * '$delta' can also be negative.
     *
     * @param      int $delta		Value to be shifted by, can be negative
     * @param      int $first		First node to be shifted
     * @param      int $last			Last node to be shifted
     * @param      int $scope		Scope to use for the shift
     * @param      PropelPDO $con		Connection to use.
     */
    public static function shiftLevel($delta, $first, $last, $scope = null, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ActionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $whereCriteria = new Criteria(ActionPeer::DATABASE_NAME);
        $whereCriteria->add(ActionPeer::LEFT_COL, $first, Criteria::GREATER_EQUAL);
        $whereCriteria->add(ActionPeer::RIGHT_COL, $last, Criteria::LESS_EQUAL);
        $whereCriteria->add(ActionPeer::SCOPE_COL, $scope, Criteria::EQUAL);

        $valuesCriteria = new Criteria(ActionPeer::DATABASE_NAME);
        $valuesCriteria->add(ActionPeer::LEVEL_COL, array('raw' => ActionPeer::LEVEL_COL . ' + ?', 'value' => $delta), Criteria::CUSTOM_EQUAL);

        BasePeer::doUpdate($whereCriteria, $valuesCriteria, $con);
    }

    /**
     * Reload all already loaded nodes to sync them with updated db
     *
     * @param      Action $prune		Object to prune from the update
     * @param      PropelPDO $con		Connection to use.
     */
    public static function updateLoadedNodes($prune = null, PropelPDO $con = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            $keys = array();
            foreach (ActionPeer::$instances as $obj) {
                if (!$prune || !$prune->equals($obj)) {
                    $keys[] = $obj->getPrimaryKey();
                }
            }

            if (!empty($keys)) {
                // We don't need to alter the object instance pool; we're just modifying these ones
                // already in the pool.
                $criteria = new Criteria(ActionPeer::DATABASE_NAME);
                $criteria->add(ActionPeer::ID, $keys, Criteria::IN);
                $stmt = ActionPeer::doSelectStmt($criteria, $con);
                while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    $key = ActionPeer::getPrimaryKeyHashFromRow($row, 0);
                    if (null !== ($object = ActionPeer::getInstanceFromPool($key))) {
                        $object->setLeftValue($row[4]);
                        $object->setRightValue($row[5]);
                        $object->setLevel($row[6]);
                        $object->clearNestedSetChildren();
                    }
                }
                $stmt->closeCursor();
            }
        }
    }

    /**
     * Update the tree to allow insertion of a leaf at the specified position
     *
     * @param      int $left	left column value
     * @param      integer $scope	scope column value
     * @param      mixed $prune	Object to prune from the shift
     * @param      PropelPDO $con	Connection to use.
     */
    public static function makeRoomForLeaf($left, $scope, $prune = null, PropelPDO $con = null)
    {
        // Update database nodes
        ActionPeer::shiftRLValues(2, $left, null, $scope, $con);

        // Update all loaded nodes
        ActionPeer::updateLoadedNodes($prune, $con);
    }

    /**
     * Update the tree to allow insertion of a leaf at the specified position
     *
     * @param      integer $scope	scope column value
     * @param      PropelPDO $con	Connection to use.
     */
    public static function fixLevels($scope, PropelPDO $con = null)
    {
        $c = new Criteria();
        $c->add(ActionPeer::SCOPE_COL, $scope, Criteria::EQUAL);
        $c->addAscendingOrderByColumn(ActionPeer::LEFT_COL);
        $stmt = ActionPeer::doSelectStmt($c, $con);

        // set the class once to avoid overhead in the loop
        $cls = ActionPeer::getOMClass(false);
        $level = null;
        // iterate over the statement
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {

            // hydrate object
            $key = ActionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null === ($obj = ActionPeer::getInstanceFromPool($key))) {
                $obj = new $cls();
                $obj->hydrate($row);
                ActionPeer::addInstanceToPool($obj, $key);
            }

            // compute level
            // Algorithm shamelessly stolen from sfPropelActAsNestedSetBehaviorPlugin
            // Probably authored by Tristan Rivoallan
            if ($level === null) {
                $level = 0;
                $i = 0;
                $prev = array($obj->getRightValue());
            } else {
                while ($obj->getRightValue() > $prev[$i]) {
                    $i--;
                }
                $level = ++$i;
                $prev[$i] = $obj->getRightValue();
            }

            // update level in node if necessary
            if ($obj->getLevel() !== $level) {
                $obj->setLevel($level);
                $obj->save($con);
            }
        }
        $stmt->closeCursor();
    }

} // BaseActionPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseActionPeer::buildTableMap();

