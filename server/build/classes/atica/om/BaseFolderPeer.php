<?php


/**
 * Base static class for performing query and update operations on the 'folder' table.
 *
 *
 *
 * @package propel.generator.atica.om
 */
abstract class BaseFolderPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'atica';

    /** the table name for this class */
    const TABLE_NAME = 'folder';

    /** the related Propel class for this table */
    const OM_CLASS = 'Folder';

    /** the related TableMap class for this table */
    const TM_CLASS = 'FolderTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 18;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 18;

    /** the column name for the ID field */
    const ID = 'folder.ID';

    /** the column name for the SNAPSHOT_ID field */
    const SNAPSHOT_ID = 'folder.SNAPSHOT_ID';

    /** the column name for the CATEGORY_ID field */
    const CATEGORY_ID = 'folder.CATEGORY_ID';

    /** the column name for the ORDER_NR field */
    const ORDER_NR = 'folder.ORDER_NR';

    /** the column name for the DISPLAY_NAME field */
    const DISPLAY_NAME = 'folder.DISPLAY_NAME';

    /** the column name for the DESCRIPTION field */
    const DESCRIPTION = 'folder.DESCRIPTION';

    /** the column name for the IS_DIVIDED field */
    const IS_DIVIDED = 'folder.IS_DIVIDED';

    /** the column name for the IS_PRIVATE field */
    const IS_PRIVATE = 'folder.IS_PRIVATE';

    /** the column name for the FILTER field */
    const FILTER = 'folder.FILTER';

    /** the column name for the FILTER_DESCRIPTION field */
    const FILTER_DESCRIPTION = 'folder.FILTER_DESCRIPTION';

    /** the column name for the MANDATORY_REVIEW field */
    const MANDATORY_REVIEW = 'folder.MANDATORY_REVIEW';

    /** the column name for the MANDATORY_APPROVAL field */
    const MANDATORY_APPROVAL = 'folder.MANDATORY_APPROVAL';

    /** the column name for the REVIEW_NOTES field */
    const REVIEW_NOTES = 'folder.REVIEW_NOTES';

    /** the column name for the APPROVAL_NOTES field */
    const APPROVAL_NOTES = 'folder.APPROVAL_NOTES';

    /** the column name for the SHOW_REVISION_NR field */
    const SHOW_REVISION_NR = 'folder.SHOW_REVISION_NR';

    /** the column name for the AUTOCLEAN field */
    const AUTOCLEAN = 'folder.AUTOCLEAN';

    /** the column name for the MAX_UPLOADS field */
    const MAX_UPLOADS = 'folder.MAX_UPLOADS';

    /** the column name for the PUBLIC_TOKEN field */
    const PUBLIC_TOKEN = 'folder.PUBLIC_TOKEN';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Folder objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Folder[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. FolderPeer::$fieldNames[FolderPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'SnapshotId', 'CategoryId', 'OrderNr', 'DisplayName', 'Description', 'IsDivided', 'IsPrivate', 'Filter', 'FilterDescription', 'MandatoryReview', 'MandatoryApproval', 'ReviewNotes', 'ApprovalNotes', 'ShowRevisionNr', 'Autoclean', 'MaxUploads', 'PublicToken', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'snapshotId', 'categoryId', 'orderNr', 'displayName', 'description', 'isDivided', 'isPrivate', 'filter', 'filterDescription', 'mandatoryReview', 'mandatoryApproval', 'reviewNotes', 'approvalNotes', 'showRevisionNr', 'autoclean', 'maxUploads', 'publicToken', ),
        BasePeer::TYPE_COLNAME => array (FolderPeer::ID, FolderPeer::SNAPSHOT_ID, FolderPeer::CATEGORY_ID, FolderPeer::ORDER_NR, FolderPeer::DISPLAY_NAME, FolderPeer::DESCRIPTION, FolderPeer::IS_DIVIDED, FolderPeer::IS_PRIVATE, FolderPeer::FILTER, FolderPeer::FILTER_DESCRIPTION, FolderPeer::MANDATORY_REVIEW, FolderPeer::MANDATORY_APPROVAL, FolderPeer::REVIEW_NOTES, FolderPeer::APPROVAL_NOTES, FolderPeer::SHOW_REVISION_NR, FolderPeer::AUTOCLEAN, FolderPeer::MAX_UPLOADS, FolderPeer::PUBLIC_TOKEN, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'SNAPSHOT_ID', 'CATEGORY_ID', 'ORDER_NR', 'DISPLAY_NAME', 'DESCRIPTION', 'IS_DIVIDED', 'IS_PRIVATE', 'FILTER', 'FILTER_DESCRIPTION', 'MANDATORY_REVIEW', 'MANDATORY_APPROVAL', 'REVIEW_NOTES', 'APPROVAL_NOTES', 'SHOW_REVISION_NR', 'AUTOCLEAN', 'MAX_UPLOADS', 'PUBLIC_TOKEN', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'snapshot_id', 'category_id', 'order_nr', 'display_name', 'description', 'is_divided', 'is_private', 'filter', 'filter_description', 'mandatory_review', 'mandatory_approval', 'review_notes', 'approval_notes', 'show_revision_nr', 'autoclean', 'max_uploads', 'public_token', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. FolderPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'SnapshotId' => 1, 'CategoryId' => 2, 'OrderNr' => 3, 'DisplayName' => 4, 'Description' => 5, 'IsDivided' => 6, 'IsPrivate' => 7, 'Filter' => 8, 'FilterDescription' => 9, 'MandatoryReview' => 10, 'MandatoryApproval' => 11, 'ReviewNotes' => 12, 'ApprovalNotes' => 13, 'ShowRevisionNr' => 14, 'Autoclean' => 15, 'MaxUploads' => 16, 'PublicToken' => 17, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'snapshotId' => 1, 'categoryId' => 2, 'orderNr' => 3, 'displayName' => 4, 'description' => 5, 'isDivided' => 6, 'isPrivate' => 7, 'filter' => 8, 'filterDescription' => 9, 'mandatoryReview' => 10, 'mandatoryApproval' => 11, 'reviewNotes' => 12, 'approvalNotes' => 13, 'showRevisionNr' => 14, 'autoclean' => 15, 'maxUploads' => 16, 'publicToken' => 17, ),
        BasePeer::TYPE_COLNAME => array (FolderPeer::ID => 0, FolderPeer::SNAPSHOT_ID => 1, FolderPeer::CATEGORY_ID => 2, FolderPeer::ORDER_NR => 3, FolderPeer::DISPLAY_NAME => 4, FolderPeer::DESCRIPTION => 5, FolderPeer::IS_DIVIDED => 6, FolderPeer::IS_PRIVATE => 7, FolderPeer::FILTER => 8, FolderPeer::FILTER_DESCRIPTION => 9, FolderPeer::MANDATORY_REVIEW => 10, FolderPeer::MANDATORY_APPROVAL => 11, FolderPeer::REVIEW_NOTES => 12, FolderPeer::APPROVAL_NOTES => 13, FolderPeer::SHOW_REVISION_NR => 14, FolderPeer::AUTOCLEAN => 15, FolderPeer::MAX_UPLOADS => 16, FolderPeer::PUBLIC_TOKEN => 17, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'SNAPSHOT_ID' => 1, 'CATEGORY_ID' => 2, 'ORDER_NR' => 3, 'DISPLAY_NAME' => 4, 'DESCRIPTION' => 5, 'IS_DIVIDED' => 6, 'IS_PRIVATE' => 7, 'FILTER' => 8, 'FILTER_DESCRIPTION' => 9, 'MANDATORY_REVIEW' => 10, 'MANDATORY_APPROVAL' => 11, 'REVIEW_NOTES' => 12, 'APPROVAL_NOTES' => 13, 'SHOW_REVISION_NR' => 14, 'AUTOCLEAN' => 15, 'MAX_UPLOADS' => 16, 'PUBLIC_TOKEN' => 17, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'snapshot_id' => 1, 'category_id' => 2, 'order_nr' => 3, 'display_name' => 4, 'description' => 5, 'is_divided' => 6, 'is_private' => 7, 'filter' => 8, 'filter_description' => 9, 'mandatory_review' => 10, 'mandatory_approval' => 11, 'review_notes' => 12, 'approval_notes' => 13, 'show_revision_nr' => 14, 'autoclean' => 15, 'max_uploads' => 16, 'public_token' => 17, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
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
        $toNames = FolderPeer::getFieldNames($toType);
        $key = isset(FolderPeer::$fieldKeys[$fromType][$name]) ? FolderPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(FolderPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, FolderPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return FolderPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. FolderPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(FolderPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(FolderPeer::ID);
            $criteria->addSelectColumn(FolderPeer::SNAPSHOT_ID);
            $criteria->addSelectColumn(FolderPeer::CATEGORY_ID);
            $criteria->addSelectColumn(FolderPeer::ORDER_NR);
            $criteria->addSelectColumn(FolderPeer::DISPLAY_NAME);
            $criteria->addSelectColumn(FolderPeer::DESCRIPTION);
            $criteria->addSelectColumn(FolderPeer::IS_DIVIDED);
            $criteria->addSelectColumn(FolderPeer::IS_PRIVATE);
            $criteria->addSelectColumn(FolderPeer::FILTER);
            $criteria->addSelectColumn(FolderPeer::FILTER_DESCRIPTION);
            $criteria->addSelectColumn(FolderPeer::MANDATORY_REVIEW);
            $criteria->addSelectColumn(FolderPeer::MANDATORY_APPROVAL);
            $criteria->addSelectColumn(FolderPeer::REVIEW_NOTES);
            $criteria->addSelectColumn(FolderPeer::APPROVAL_NOTES);
            $criteria->addSelectColumn(FolderPeer::SHOW_REVISION_NR);
            $criteria->addSelectColumn(FolderPeer::AUTOCLEAN);
            $criteria->addSelectColumn(FolderPeer::MAX_UPLOADS);
            $criteria->addSelectColumn(FolderPeer::PUBLIC_TOKEN);
        } else {
            $criteria->addSelectColumn($alias . '.ID');
            $criteria->addSelectColumn($alias . '.SNAPSHOT_ID');
            $criteria->addSelectColumn($alias . '.CATEGORY_ID');
            $criteria->addSelectColumn($alias . '.ORDER_NR');
            $criteria->addSelectColumn($alias . '.DISPLAY_NAME');
            $criteria->addSelectColumn($alias . '.DESCRIPTION');
            $criteria->addSelectColumn($alias . '.IS_DIVIDED');
            $criteria->addSelectColumn($alias . '.IS_PRIVATE');
            $criteria->addSelectColumn($alias . '.FILTER');
            $criteria->addSelectColumn($alias . '.FILTER_DESCRIPTION');
            $criteria->addSelectColumn($alias . '.MANDATORY_REVIEW');
            $criteria->addSelectColumn($alias . '.MANDATORY_APPROVAL');
            $criteria->addSelectColumn($alias . '.REVIEW_NOTES');
            $criteria->addSelectColumn($alias . '.APPROVAL_NOTES');
            $criteria->addSelectColumn($alias . '.SHOW_REVISION_NR');
            $criteria->addSelectColumn($alias . '.AUTOCLEAN');
            $criteria->addSelectColumn($alias . '.MAX_UPLOADS');
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
        $criteria->setPrimaryTableName(FolderPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            FolderPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(FolderPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(FolderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Folder
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = FolderPeer::doSelect($critcopy, $con);
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
        return FolderPeer::populateObjects(FolderPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(FolderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            FolderPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(FolderPeer::DATABASE_NAME);

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
     * @param      Folder $obj A Folder object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            FolderPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Folder object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Folder) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Folder object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(FolderPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Folder Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(FolderPeer::$instances[$key])) {
                return FolderPeer::$instances[$key];
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
        FolderPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to folder
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in FolderDeliveryPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        FolderDeliveryPeer::clearInstancePool();
        // Invalidate objects in CategoryFolderPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        CategoryFolderPeer::clearInstancePool();
        // Invalidate objects in GroupingFolderPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        GroupingFolderPeer::clearInstancePool();
        // Invalidate objects in FolderPermissionPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        FolderPermissionPeer::clearInstancePool();
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
        $cls = FolderPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = FolderPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = FolderPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                FolderPeer::addInstanceToPool($obj, $key);
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
     * @return array (Folder object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = FolderPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = FolderPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + FolderPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = FolderPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            FolderPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
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
        $criteria->setPrimaryTableName(FolderPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            FolderPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(FolderPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(FolderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(FolderPeer::SNAPSHOT_ID, SnapshotPeer::ID, $join_behavior);

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
     * Selects a collection of Folder objects pre-filled with their Snapshot objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Folder objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSnapshot(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(FolderPeer::DATABASE_NAME);
        }

        FolderPeer::addSelectColumns($criteria);
        $startcol = FolderPeer::NUM_HYDRATE_COLUMNS;
        SnapshotPeer::addSelectColumns($criteria);

        $criteria->addJoin(FolderPeer::SNAPSHOT_ID, SnapshotPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = FolderPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = FolderPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = FolderPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                FolderPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Folder) to $obj2 (Snapshot)
                $obj2->addFolder($obj1);

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
        $criteria->setPrimaryTableName(FolderPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            FolderPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(FolderPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(FolderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(FolderPeer::SNAPSHOT_ID, SnapshotPeer::ID, $join_behavior);

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
     * Selects a collection of Folder objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Folder objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(FolderPeer::DATABASE_NAME);
        }

        FolderPeer::addSelectColumns($criteria);
        $startcol2 = FolderPeer::NUM_HYDRATE_COLUMNS;

        SnapshotPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SnapshotPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(FolderPeer::SNAPSHOT_ID, SnapshotPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = FolderPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = FolderPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = FolderPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                FolderPeer::addInstanceToPool($obj1, $key1);
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
                } // if obj2 loaded

                // Add the $obj1 (Folder) to the collection in $obj2 (Snapshot)
                $obj2->addFolder($obj1);
            } // if joined row not null

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
        return Propel::getDatabaseMap(FolderPeer::DATABASE_NAME)->getTable(FolderPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseFolderPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseFolderPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new FolderTableMap());
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
        return FolderPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Folder or Criteria object.
     *
     * @param      mixed $values Criteria or Folder object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(FolderPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Folder object
        }

        if ($criteria->containsKey(FolderPeer::ID) && $criteria->keyContainsValue(FolderPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.FolderPeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(FolderPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Folder or Criteria object.
     *
     * @param      mixed $values Criteria or Folder object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(FolderPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(FolderPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(FolderPeer::ID);
            $value = $criteria->remove(FolderPeer::ID);
            if ($value) {
                $selectCriteria->add(FolderPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(FolderPeer::TABLE_NAME);
            }

        } else { // $values is Folder object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(FolderPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the folder table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(FolderPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(FolderPeer::TABLE_NAME, $con, FolderPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            FolderPeer::clearInstancePool();
            FolderPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Folder or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Folder object or primary key or array of primary keys
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
            $con = Propel::getConnection(FolderPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            FolderPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Folder) { // it's a model object
            // invalidate the cache for this single object
            FolderPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(FolderPeer::DATABASE_NAME);
            $criteria->add(FolderPeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                FolderPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(FolderPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            FolderPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Folder object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Folder $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(FolderPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(FolderPeer::TABLE_NAME);

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

        return BasePeer::doValidate(FolderPeer::DATABASE_NAME, FolderPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Folder
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = FolderPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(FolderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(FolderPeer::DATABASE_NAME);
        $criteria->add(FolderPeer::ID, $pk);

        $v = FolderPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Folder[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(FolderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(FolderPeer::DATABASE_NAME);
            $criteria->add(FolderPeer::ID, $pks, Criteria::IN);
            $objs = FolderPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseFolderPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseFolderPeer::buildTableMap();

