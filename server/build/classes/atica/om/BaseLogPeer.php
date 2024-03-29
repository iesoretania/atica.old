<?php


/**
 * Base static class for performing query and update operations on the 'log' table.
 *
 *
 *
 * @package propel.generator.atica.om
 */
abstract class BaseLogPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'atica';

    /** the table name for this class */
    const TABLE_NAME = 'log';

    /** the related Propel class for this table */
    const OM_CLASS = 'Log';

    /** the related TableMap class for this table */
    const TM_CLASS = 'LogTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 15;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 15;

    /** the column name for the ID field */
    const ID = 'log.ID';

    /** the column name for the IP field */
    const IP = 'log.IP';

    /** the column name for the WHEN field */
    const WHEN = 'log.WHEN';

    /** the column name for the PERSON_ID field */
    const PERSON_ID = 'log.PERSON_ID';

    /** the column name for the ORGANIZATION_ID field */
    const ORGANIZATION_ID = 'log.ORGANIZATION_ID';

    /** the column name for the CATEGORY_ID field */
    const CATEGORY_ID = 'log.CATEGORY_ID';

    /** the column name for the GROUPING_ID field */
    const GROUPING_ID = 'log.GROUPING_ID';

    /** the column name for the ACTIVITY_ID field */
    const ACTIVITY_ID = 'log.ACTIVITY_ID';

    /** the column name for the EVENT_ID field */
    const EVENT_ID = 'log.EVENT_ID';

    /** the column name for the FOLDER_ID field */
    const FOLDER_ID = 'log.FOLDER_ID';

    /** the column name for the DELIVERY_ID field */
    const DELIVERY_ID = 'log.DELIVERY_ID';

    /** the column name for the REVISION_ID field */
    const REVISION_ID = 'log.REVISION_ID';

    /** the column name for the DOCUMENT_ID field */
    const DOCUMENT_ID = 'log.DOCUMENT_ID';

    /** the column name for the KIND field */
    const KIND = 'log.KIND';

    /** the column name for the DETAIL field */
    const DETAIL = 'log.DETAIL';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Log objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Log[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. LogPeer::$fieldNames[LogPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'Ip', 'When', 'PersonId', 'OrganizationId', 'CategoryId', 'GroupingId', 'ActivityId', 'EventId', 'FolderId', 'DeliveryId', 'RevisionId', 'DocumentId', 'Kind', 'Detail', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'ip', 'when', 'personId', 'organizationId', 'categoryId', 'groupingId', 'activityId', 'eventId', 'folderId', 'deliveryId', 'revisionId', 'documentId', 'kind', 'detail', ),
        BasePeer::TYPE_COLNAME => array (LogPeer::ID, LogPeer::IP, LogPeer::WHEN, LogPeer::PERSON_ID, LogPeer::ORGANIZATION_ID, LogPeer::CATEGORY_ID, LogPeer::GROUPING_ID, LogPeer::ACTIVITY_ID, LogPeer::EVENT_ID, LogPeer::FOLDER_ID, LogPeer::DELIVERY_ID, LogPeer::REVISION_ID, LogPeer::DOCUMENT_ID, LogPeer::KIND, LogPeer::DETAIL, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'IP', 'WHEN', 'PERSON_ID', 'ORGANIZATION_ID', 'CATEGORY_ID', 'GROUPING_ID', 'ACTIVITY_ID', 'EVENT_ID', 'FOLDER_ID', 'DELIVERY_ID', 'REVISION_ID', 'DOCUMENT_ID', 'KIND', 'DETAIL', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'ip', 'when', 'person_id', 'organization_id', 'category_id', 'grouping_id', 'activity_id', 'event_id', 'folder_id', 'delivery_id', 'revision_id', 'document_id', 'kind', 'detail', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. LogPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Ip' => 1, 'When' => 2, 'PersonId' => 3, 'OrganizationId' => 4, 'CategoryId' => 5, 'GroupingId' => 6, 'ActivityId' => 7, 'EventId' => 8, 'FolderId' => 9, 'DeliveryId' => 10, 'RevisionId' => 11, 'DocumentId' => 12, 'Kind' => 13, 'Detail' => 14, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'ip' => 1, 'when' => 2, 'personId' => 3, 'organizationId' => 4, 'categoryId' => 5, 'groupingId' => 6, 'activityId' => 7, 'eventId' => 8, 'folderId' => 9, 'deliveryId' => 10, 'revisionId' => 11, 'documentId' => 12, 'kind' => 13, 'detail' => 14, ),
        BasePeer::TYPE_COLNAME => array (LogPeer::ID => 0, LogPeer::IP => 1, LogPeer::WHEN => 2, LogPeer::PERSON_ID => 3, LogPeer::ORGANIZATION_ID => 4, LogPeer::CATEGORY_ID => 5, LogPeer::GROUPING_ID => 6, LogPeer::ACTIVITY_ID => 7, LogPeer::EVENT_ID => 8, LogPeer::FOLDER_ID => 9, LogPeer::DELIVERY_ID => 10, LogPeer::REVISION_ID => 11, LogPeer::DOCUMENT_ID => 12, LogPeer::KIND => 13, LogPeer::DETAIL => 14, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'IP' => 1, 'WHEN' => 2, 'PERSON_ID' => 3, 'ORGANIZATION_ID' => 4, 'CATEGORY_ID' => 5, 'GROUPING_ID' => 6, 'ACTIVITY_ID' => 7, 'EVENT_ID' => 8, 'FOLDER_ID' => 9, 'DELIVERY_ID' => 10, 'REVISION_ID' => 11, 'DOCUMENT_ID' => 12, 'KIND' => 13, 'DETAIL' => 14, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'ip' => 1, 'when' => 2, 'person_id' => 3, 'organization_id' => 4, 'category_id' => 5, 'grouping_id' => 6, 'activity_id' => 7, 'event_id' => 8, 'folder_id' => 9, 'delivery_id' => 10, 'revision_id' => 11, 'document_id' => 12, 'kind' => 13, 'detail' => 14, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
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
        $toNames = LogPeer::getFieldNames($toType);
        $key = isset(LogPeer::$fieldKeys[$fromType][$name]) ? LogPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(LogPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, LogPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return LogPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. LogPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(LogPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(LogPeer::ID);
            $criteria->addSelectColumn(LogPeer::IP);
            $criteria->addSelectColumn(LogPeer::WHEN);
            $criteria->addSelectColumn(LogPeer::PERSON_ID);
            $criteria->addSelectColumn(LogPeer::ORGANIZATION_ID);
            $criteria->addSelectColumn(LogPeer::CATEGORY_ID);
            $criteria->addSelectColumn(LogPeer::GROUPING_ID);
            $criteria->addSelectColumn(LogPeer::ACTIVITY_ID);
            $criteria->addSelectColumn(LogPeer::EVENT_ID);
            $criteria->addSelectColumn(LogPeer::FOLDER_ID);
            $criteria->addSelectColumn(LogPeer::DELIVERY_ID);
            $criteria->addSelectColumn(LogPeer::REVISION_ID);
            $criteria->addSelectColumn(LogPeer::DOCUMENT_ID);
            $criteria->addSelectColumn(LogPeer::KIND);
            $criteria->addSelectColumn(LogPeer::DETAIL);
        } else {
            $criteria->addSelectColumn($alias . '.ID');
            $criteria->addSelectColumn($alias . '.IP');
            $criteria->addSelectColumn($alias . '.WHEN');
            $criteria->addSelectColumn($alias . '.PERSON_ID');
            $criteria->addSelectColumn($alias . '.ORGANIZATION_ID');
            $criteria->addSelectColumn($alias . '.CATEGORY_ID');
            $criteria->addSelectColumn($alias . '.GROUPING_ID');
            $criteria->addSelectColumn($alias . '.ACTIVITY_ID');
            $criteria->addSelectColumn($alias . '.EVENT_ID');
            $criteria->addSelectColumn($alias . '.FOLDER_ID');
            $criteria->addSelectColumn($alias . '.DELIVERY_ID');
            $criteria->addSelectColumn($alias . '.REVISION_ID');
            $criteria->addSelectColumn($alias . '.DOCUMENT_ID');
            $criteria->addSelectColumn($alias . '.KIND');
            $criteria->addSelectColumn($alias . '.DETAIL');
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
        $criteria->setPrimaryTableName(LogPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            LogPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(LogPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(LogPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Log
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = LogPeer::doSelect($critcopy, $con);
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
        return LogPeer::populateObjects(LogPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(LogPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            LogPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(LogPeer::DATABASE_NAME);

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
     * @param      Log $obj A Log object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            LogPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Log object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Log) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Log object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(LogPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Log Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(LogPeer::$instances[$key])) {
                return LogPeer::$instances[$key];
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
        LogPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to log
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
        $cls = LogPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = LogPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = LogPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                LogPeer::addInstanceToPool($obj, $key);
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
     * @return array (Log object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = LogPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = LogPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + LogPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = LogPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            LogPeer::addInstanceToPool($obj, $key);
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
        return Propel::getDatabaseMap(LogPeer::DATABASE_NAME)->getTable(LogPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseLogPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseLogPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new LogTableMap());
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
        return LogPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Log or Criteria object.
     *
     * @param      mixed $values Criteria or Log object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(LogPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Log object
        }

        if ($criteria->containsKey(LogPeer::ID) && $criteria->keyContainsValue(LogPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.LogPeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(LogPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Log or Criteria object.
     *
     * @param      mixed $values Criteria or Log object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(LogPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(LogPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(LogPeer::ID);
            $value = $criteria->remove(LogPeer::ID);
            if ($value) {
                $selectCriteria->add(LogPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(LogPeer::TABLE_NAME);
            }

        } else { // $values is Log object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(LogPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the log table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(LogPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(LogPeer::TABLE_NAME, $con, LogPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            LogPeer::clearInstancePool();
            LogPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Log or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Log object or primary key or array of primary keys
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
            $con = Propel::getConnection(LogPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            LogPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Log) { // it's a model object
            // invalidate the cache for this single object
            LogPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(LogPeer::DATABASE_NAME);
            $criteria->add(LogPeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                LogPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(LogPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            LogPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Log object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Log $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(LogPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(LogPeer::TABLE_NAME);

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

        return BasePeer::doValidate(LogPeer::DATABASE_NAME, LogPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Log
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = LogPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(LogPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(LogPeer::DATABASE_NAME);
        $criteria->add(LogPeer::ID, $pk);

        $v = LogPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Log[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(LogPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(LogPeer::DATABASE_NAME);
            $criteria->add(LogPeer::ID, $pks, Criteria::IN);
            $objs = LogPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseLogPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseLogPeer::buildTableMap();

