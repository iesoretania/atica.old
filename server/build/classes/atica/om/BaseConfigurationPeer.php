<?php


/**
 * Base static class for performing query and update operations on the 'configuration' table.
 *
 *
 *
 * @package propel.generator.atica.om
 */
abstract class BaseConfigurationPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'atica';

    /** the table name for this class */
    const TABLE_NAME = 'configuration';

    /** the related Propel class for this table */
    const OM_CLASS = 'Configuration';

    /** the related TableMap class for this table */
    const TM_CLASS = 'ConfigurationTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 11;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 11;

    /** the column name for the ID field */
    const ID = 'configuration.ID';

    /** the column name for the ORGANIZATION_ID field */
    const ORGANIZATION_ID = 'configuration.ORGANIZATION_ID';

    /** the column name for the SNAPSHOT_ID field */
    const SNAPSHOT_ID = 'configuration.SNAPSHOT_ID';

    /** the column name for the CONTENT_TYPE field */
    const CONTENT_TYPE = 'configuration.CONTENT_TYPE';

    /** the column name for the CONTENT_SUBTYPE field */
    const CONTENT_SUBTYPE = 'configuration.CONTENT_SUBTYPE';

    /** the column name for the ORDER_NR field */
    const ORDER_NR = 'configuration.ORDER_NR';

    /** the column name for the SECTION_GROUP field */
    const SECTION_GROUP = 'configuration.SECTION_GROUP';

    /** the column name for the DESCRIPTION field */
    const DESCRIPTION = 'configuration.DESCRIPTION';

    /** the column name for the CONTENT field */
    const CONTENT = 'configuration.CONTENT';

    /** the column name for the IS_ORGANIZATION_PREFERENCE field */
    const IS_ORGANIZATION_PREFERENCE = 'configuration.IS_ORGANIZATION_PREFERENCE';

    /** the column name for the IS_SNAPSHOT_PREFERENCE field */
    const IS_SNAPSHOT_PREFERENCE = 'configuration.IS_SNAPSHOT_PREFERENCE';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Configuration objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Configuration[]
     */
    public static $instances = array();


    // sortable behavior

    /**
     * rank column
     */
    const RANK_COL = 'configuration.ORDER_NR';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. ConfigurationPeer::$fieldNames[ConfigurationPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'OrganizationId', 'SnapshotId', 'ContentType', 'ContentSubtype', 'OrderNr', 'SectionGroup', 'Description', 'Content', 'IsOrganizationPreference', 'IsSnapshotPreference', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'organizationId', 'snapshotId', 'contentType', 'contentSubtype', 'orderNr', 'sectionGroup', 'description', 'content', 'isOrganizationPreference', 'isSnapshotPreference', ),
        BasePeer::TYPE_COLNAME => array (ConfigurationPeer::ID, ConfigurationPeer::ORGANIZATION_ID, ConfigurationPeer::SNAPSHOT_ID, ConfigurationPeer::CONTENT_TYPE, ConfigurationPeer::CONTENT_SUBTYPE, ConfigurationPeer::ORDER_NR, ConfigurationPeer::SECTION_GROUP, ConfigurationPeer::DESCRIPTION, ConfigurationPeer::CONTENT, ConfigurationPeer::IS_ORGANIZATION_PREFERENCE, ConfigurationPeer::IS_SNAPSHOT_PREFERENCE, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'ORGANIZATION_ID', 'SNAPSHOT_ID', 'CONTENT_TYPE', 'CONTENT_SUBTYPE', 'ORDER_NR', 'SECTION_GROUP', 'DESCRIPTION', 'CONTENT', 'IS_ORGANIZATION_PREFERENCE', 'IS_SNAPSHOT_PREFERENCE', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'organization_id', 'snapshot_id', 'content_type', 'content_subtype', 'order_nr', 'section_group', 'description', 'content', 'is_organization_preference', 'is_snapshot_preference', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. ConfigurationPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'OrganizationId' => 1, 'SnapshotId' => 2, 'ContentType' => 3, 'ContentSubtype' => 4, 'OrderNr' => 5, 'SectionGroup' => 6, 'Description' => 7, 'Content' => 8, 'IsOrganizationPreference' => 9, 'IsSnapshotPreference' => 10, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'organizationId' => 1, 'snapshotId' => 2, 'contentType' => 3, 'contentSubtype' => 4, 'orderNr' => 5, 'sectionGroup' => 6, 'description' => 7, 'content' => 8, 'isOrganizationPreference' => 9, 'isSnapshotPreference' => 10, ),
        BasePeer::TYPE_COLNAME => array (ConfigurationPeer::ID => 0, ConfigurationPeer::ORGANIZATION_ID => 1, ConfigurationPeer::SNAPSHOT_ID => 2, ConfigurationPeer::CONTENT_TYPE => 3, ConfigurationPeer::CONTENT_SUBTYPE => 4, ConfigurationPeer::ORDER_NR => 5, ConfigurationPeer::SECTION_GROUP => 6, ConfigurationPeer::DESCRIPTION => 7, ConfigurationPeer::CONTENT => 8, ConfigurationPeer::IS_ORGANIZATION_PREFERENCE => 9, ConfigurationPeer::IS_SNAPSHOT_PREFERENCE => 10, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'ORGANIZATION_ID' => 1, 'SNAPSHOT_ID' => 2, 'CONTENT_TYPE' => 3, 'CONTENT_SUBTYPE' => 4, 'ORDER_NR' => 5, 'SECTION_GROUP' => 6, 'DESCRIPTION' => 7, 'CONTENT' => 8, 'IS_ORGANIZATION_PREFERENCE' => 9, 'IS_SNAPSHOT_PREFERENCE' => 10, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'organization_id' => 1, 'snapshot_id' => 2, 'content_type' => 3, 'content_subtype' => 4, 'order_nr' => 5, 'section_group' => 6, 'description' => 7, 'content' => 8, 'is_organization_preference' => 9, 'is_snapshot_preference' => 10, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
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
        $toNames = ConfigurationPeer::getFieldNames($toType);
        $key = isset(ConfigurationPeer::$fieldKeys[$fromType][$name]) ? ConfigurationPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(ConfigurationPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, ConfigurationPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return ConfigurationPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. ConfigurationPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(ConfigurationPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(ConfigurationPeer::ID);
            $criteria->addSelectColumn(ConfigurationPeer::ORGANIZATION_ID);
            $criteria->addSelectColumn(ConfigurationPeer::SNAPSHOT_ID);
            $criteria->addSelectColumn(ConfigurationPeer::CONTENT_TYPE);
            $criteria->addSelectColumn(ConfigurationPeer::CONTENT_SUBTYPE);
            $criteria->addSelectColumn(ConfigurationPeer::ORDER_NR);
            $criteria->addSelectColumn(ConfigurationPeer::SECTION_GROUP);
            $criteria->addSelectColumn(ConfigurationPeer::DESCRIPTION);
            $criteria->addSelectColumn(ConfigurationPeer::CONTENT);
            $criteria->addSelectColumn(ConfigurationPeer::IS_ORGANIZATION_PREFERENCE);
            $criteria->addSelectColumn(ConfigurationPeer::IS_SNAPSHOT_PREFERENCE);
        } else {
            $criteria->addSelectColumn($alias . '.ID');
            $criteria->addSelectColumn($alias . '.ORGANIZATION_ID');
            $criteria->addSelectColumn($alias . '.SNAPSHOT_ID');
            $criteria->addSelectColumn($alias . '.CONTENT_TYPE');
            $criteria->addSelectColumn($alias . '.CONTENT_SUBTYPE');
            $criteria->addSelectColumn($alias . '.ORDER_NR');
            $criteria->addSelectColumn($alias . '.SECTION_GROUP');
            $criteria->addSelectColumn($alias . '.DESCRIPTION');
            $criteria->addSelectColumn($alias . '.CONTENT');
            $criteria->addSelectColumn($alias . '.IS_ORGANIZATION_PREFERENCE');
            $criteria->addSelectColumn($alias . '.IS_SNAPSHOT_PREFERENCE');
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
        $criteria->setPrimaryTableName(ConfigurationPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ConfigurationPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(ConfigurationPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(ConfigurationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Configuration
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = ConfigurationPeer::doSelect($critcopy, $con);
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
        return ConfigurationPeer::populateObjects(ConfigurationPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(ConfigurationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            ConfigurationPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(ConfigurationPeer::DATABASE_NAME);

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
     * @param      Configuration $obj A Configuration object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            ConfigurationPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Configuration object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Configuration) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Configuration object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(ConfigurationPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Configuration Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(ConfigurationPeer::$instances[$key])) {
                return ConfigurationPeer::$instances[$key];
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
        ConfigurationPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to configuration
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

        return (string) $row[$startcol];
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
        $cls = ConfigurationPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = ConfigurationPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = ConfigurationPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ConfigurationPeer::addInstanceToPool($obj, $key);
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
     * @return array (Configuration object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = ConfigurationPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = ConfigurationPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + ConfigurationPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ConfigurationPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            ConfigurationPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Organization table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinOrganization(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ConfigurationPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ConfigurationPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ConfigurationPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ConfigurationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ConfigurationPeer::ORGANIZATION_ID, OrganizationPeer::ID, $join_behavior);

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
        $criteria->setPrimaryTableName(ConfigurationPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ConfigurationPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ConfigurationPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ConfigurationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ConfigurationPeer::SNAPSHOT_ID, SnapshotPeer::ID, $join_behavior);

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
     * Selects a collection of Configuration objects pre-filled with their Organization objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Configuration objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinOrganization(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ConfigurationPeer::DATABASE_NAME);
        }

        ConfigurationPeer::addSelectColumns($criteria);
        $startcol = ConfigurationPeer::NUM_HYDRATE_COLUMNS;
        OrganizationPeer::addSelectColumns($criteria);

        $criteria->addJoin(ConfigurationPeer::ORGANIZATION_ID, OrganizationPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ConfigurationPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ConfigurationPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ConfigurationPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ConfigurationPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = OrganizationPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = OrganizationPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = OrganizationPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    OrganizationPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Configuration) to $obj2 (Organization)
                $obj2->addConfiguration($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Configuration objects pre-filled with their Snapshot objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Configuration objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSnapshot(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ConfigurationPeer::DATABASE_NAME);
        }

        ConfigurationPeer::addSelectColumns($criteria);
        $startcol = ConfigurationPeer::NUM_HYDRATE_COLUMNS;
        SnapshotPeer::addSelectColumns($criteria);

        $criteria->addJoin(ConfigurationPeer::SNAPSHOT_ID, SnapshotPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ConfigurationPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ConfigurationPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ConfigurationPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ConfigurationPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Configuration) to $obj2 (Snapshot)
                $obj2->addConfiguration($obj1);

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
        $criteria->setPrimaryTableName(ConfigurationPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ConfigurationPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ConfigurationPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ConfigurationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ConfigurationPeer::ORGANIZATION_ID, OrganizationPeer::ID, $join_behavior);

        $criteria->addJoin(ConfigurationPeer::SNAPSHOT_ID, SnapshotPeer::ID, $join_behavior);

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
     * Selects a collection of Configuration objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Configuration objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ConfigurationPeer::DATABASE_NAME);
        }

        ConfigurationPeer::addSelectColumns($criteria);
        $startcol2 = ConfigurationPeer::NUM_HYDRATE_COLUMNS;

        OrganizationPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + OrganizationPeer::NUM_HYDRATE_COLUMNS;

        SnapshotPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SnapshotPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ConfigurationPeer::ORGANIZATION_ID, OrganizationPeer::ID, $join_behavior);

        $criteria->addJoin(ConfigurationPeer::SNAPSHOT_ID, SnapshotPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ConfigurationPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ConfigurationPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ConfigurationPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ConfigurationPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Organization rows

            $key2 = OrganizationPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = OrganizationPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = OrganizationPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    OrganizationPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Configuration) to the collection in $obj2 (Organization)
                $obj2->addConfiguration($obj1);
            } // if joined row not null

            // Add objects for joined Snapshot rows

            $key3 = SnapshotPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = SnapshotPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = SnapshotPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SnapshotPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Configuration) to the collection in $obj3 (Snapshot)
                $obj3->addConfiguration($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Organization table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptOrganization(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ConfigurationPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ConfigurationPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ConfigurationPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ConfigurationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ConfigurationPeer::SNAPSHOT_ID, SnapshotPeer::ID, $join_behavior);

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
        $criteria->setPrimaryTableName(ConfigurationPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ConfigurationPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ConfigurationPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ConfigurationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ConfigurationPeer::ORGANIZATION_ID, OrganizationPeer::ID, $join_behavior);

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
     * Selects a collection of Configuration objects pre-filled with all related objects except Organization.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Configuration objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptOrganization(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ConfigurationPeer::DATABASE_NAME);
        }

        ConfigurationPeer::addSelectColumns($criteria);
        $startcol2 = ConfigurationPeer::NUM_HYDRATE_COLUMNS;

        SnapshotPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SnapshotPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ConfigurationPeer::SNAPSHOT_ID, SnapshotPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ConfigurationPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ConfigurationPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ConfigurationPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ConfigurationPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Snapshot rows

                $key2 = SnapshotPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = SnapshotPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = SnapshotPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    SnapshotPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Configuration) to the collection in $obj2 (Snapshot)
                $obj2->addConfiguration($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Configuration objects pre-filled with all related objects except Snapshot.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Configuration objects.
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
            $criteria->setDbName(ConfigurationPeer::DATABASE_NAME);
        }

        ConfigurationPeer::addSelectColumns($criteria);
        $startcol2 = ConfigurationPeer::NUM_HYDRATE_COLUMNS;

        OrganizationPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + OrganizationPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ConfigurationPeer::ORGANIZATION_ID, OrganizationPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ConfigurationPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ConfigurationPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ConfigurationPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ConfigurationPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Organization rows

                $key2 = OrganizationPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = OrganizationPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = OrganizationPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    OrganizationPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Configuration) to the collection in $obj2 (Organization)
                $obj2->addConfiguration($obj1);

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
        return Propel::getDatabaseMap(ConfigurationPeer::DATABASE_NAME)->getTable(ConfigurationPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseConfigurationPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseConfigurationPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new ConfigurationTableMap());
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
        return ConfigurationPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Configuration or Criteria object.
     *
     * @param      mixed $values Criteria or Configuration object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ConfigurationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Configuration object
        }


        // Set the correct dbName
        $criteria->setDbName(ConfigurationPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Configuration or Criteria object.
     *
     * @param      mixed $values Criteria or Configuration object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ConfigurationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(ConfigurationPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(ConfigurationPeer::ID);
            $value = $criteria->remove(ConfigurationPeer::ID);
            if ($value) {
                $selectCriteria->add(ConfigurationPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(ConfigurationPeer::TABLE_NAME);
            }

        } else { // $values is Configuration object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(ConfigurationPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the configuration table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ConfigurationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(ConfigurationPeer::TABLE_NAME, $con, ConfigurationPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ConfigurationPeer::clearInstancePool();
            ConfigurationPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Configuration or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Configuration object or primary key or array of primary keys
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
            $con = Propel::getConnection(ConfigurationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            ConfigurationPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Configuration) { // it's a model object
            // invalidate the cache for this single object
            ConfigurationPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ConfigurationPeer::DATABASE_NAME);
            $criteria->add(ConfigurationPeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                ConfigurationPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(ConfigurationPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            ConfigurationPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Configuration object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Configuration $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(ConfigurationPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(ConfigurationPeer::TABLE_NAME);

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

        return BasePeer::doValidate(ConfigurationPeer::DATABASE_NAME, ConfigurationPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Configuration
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = ConfigurationPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(ConfigurationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(ConfigurationPeer::DATABASE_NAME);
        $criteria->add(ConfigurationPeer::ID, $pk);

        $v = ConfigurationPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Configuration[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ConfigurationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(ConfigurationPeer::DATABASE_NAME);
            $criteria->add(ConfigurationPeer::ID, $pks, Criteria::IN);
            $objs = ConfigurationPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

    // sortable behavior

    /**
     * Get the highest rank
     *
     * @param     PropelPDO optional connection
     *
     * @return    integer highest position
     */
    public static function getMaxRank(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ConfigurationPeer::DATABASE_NAME);
        }
        // shift the objects with a position lower than the one of object
        $c = new Criteria();
        $c->addSelectColumn('MAX(' . ConfigurationPeer::RANK_COL . ')');
        $stmt = ConfigurationPeer::doSelectStmt($c, $con);

        return $stmt->fetchColumn();
    }

    /**
     * Get an item from the list based on its rank
     *
     * @param     integer   $rank rank
     * @param     PropelPDO $con optional connection
     *
     * @return Configuration
     */
    public static function retrieveByRank($rank, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ConfigurationPeer::DATABASE_NAME);
        }

        $c = new Criteria;
        $c->add(ConfigurationPeer::RANK_COL, $rank);

        return ConfigurationPeer::doSelectOne($c, $con);
    }

    /**
     * Reorder a set of sortable objects based on a list of id/position
     * Beware that there is no check made on the positions passed
     * So incoherent positions will result in an incoherent list
     *
     * @param     array     $order id => rank pairs
     * @param     PropelPDO $con   optional connection
     *
     * @return    boolean true if the reordering took place, false if a database problem prevented it
     */
    public static function reorder(array $order, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ConfigurationPeer::DATABASE_NAME);
        }

        $con->beginTransaction();
        try {
            $ids = array_keys($order);
            $objects = ConfigurationPeer::retrieveByPKs($ids);
            foreach ($objects as $object) {
                $pk = $object->getPrimaryKey();
                if ($object->getOrderNr() != $order[$pk]) {
                    $object->setOrderNr($order[$pk]);
                    $object->save($con);
                }
            }
            $con->commit();

            return true;
        } catch (PropelException $e) {
            $con->rollback();
            throw $e;
        }
    }

    /**
     * Return an array of sortable objects ordered by position
     *
     * @param     Criteria  $criteria  optional criteria object
     * @param     string    $order     sorting order, to be chosen between Criteria::ASC (default) and Criteria::DESC
     * @param     PropelPDO $con       optional connection
     *
     * @return    array list of sortable objects
     */
    public static function doSelectOrderByRank(Criteria $criteria = null, $order = Criteria::ASC, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ConfigurationPeer::DATABASE_NAME);
        }

        if ($criteria === null) {
            $criteria = new Criteria();
        } elseif ($criteria instanceof Criteria) {
            $criteria = clone $criteria;
        }

        $criteria->clearOrderByColumns();

        if ($order == Criteria::ASC) {
            $criteria->addAscendingOrderByColumn(ConfigurationPeer::RANK_COL);
        } else {
            $criteria->addDescendingOrderByColumn(ConfigurationPeer::RANK_COL);
        }

        return ConfigurationPeer::doSelect($criteria, $con);
    }

    /**
     * Adds $delta to all Rank values that are >= $first and <= $last.
     * '$delta' can also be negative.
     *
     * @param      int $delta Value to be shifted by, can be negative
     * @param      int $first First node to be shifted
     * @param      int $last  Last node to be shifted
     * @param      PropelPDO $con Connection to use.
     */
    public static function shiftRank($delta, $first, $last = null, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ConfigurationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $whereCriteria = new Criteria(ConfigurationPeer::DATABASE_NAME);
        $criterion = $whereCriteria->getNewCriterion(ConfigurationPeer::RANK_COL, $first, Criteria::GREATER_EQUAL);
        if (null !== $last) {
            $criterion->addAnd($whereCriteria->getNewCriterion(ConfigurationPeer::RANK_COL, $last, Criteria::LESS_EQUAL));
        }
        $whereCriteria->add($criterion);

        $valuesCriteria = new Criteria(ConfigurationPeer::DATABASE_NAME);
        $valuesCriteria->add(ConfigurationPeer::RANK_COL, array('raw' => ConfigurationPeer::RANK_COL . ' + ?', 'value' => $delta), Criteria::CUSTOM_EQUAL);

        BasePeer::doUpdate($whereCriteria, $valuesCriteria, $con);
        ConfigurationPeer::clearInstancePool();
    }

} // BaseConfigurationPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseConfigurationPeer::buildTableMap();

