<?php


/**
 * Base class that represents a query for the 'grouping_folder' table.
 *
 *
 *
 * @method GroupingFolderQuery orderByGroupingId($order = Criteria::ASC) Order by the grouping_id column
 * @method GroupingFolderQuery orderByFolderId($order = Criteria::ASC) Order by the folder_id column
 * @method GroupingFolderQuery orderByOrderNr($order = Criteria::ASC) Order by the order_nr column
 * @method GroupingFolderQuery orderByAltDisplayName($order = Criteria::ASC) Order by the alt_display_name column
 *
 * @method GroupingFolderQuery groupByGroupingId() Group by the grouping_id column
 * @method GroupingFolderQuery groupByFolderId() Group by the folder_id column
 * @method GroupingFolderQuery groupByOrderNr() Group by the order_nr column
 * @method GroupingFolderQuery groupByAltDisplayName() Group by the alt_display_name column
 *
 * @method GroupingFolderQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method GroupingFolderQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method GroupingFolderQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method GroupingFolderQuery leftJoinFolder($relationAlias = null) Adds a LEFT JOIN clause to the query using the Folder relation
 * @method GroupingFolderQuery rightJoinFolder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Folder relation
 * @method GroupingFolderQuery innerJoinFolder($relationAlias = null) Adds a INNER JOIN clause to the query using the Folder relation
 *
 * @method GroupingFolderQuery leftJoinGrouping($relationAlias = null) Adds a LEFT JOIN clause to the query using the Grouping relation
 * @method GroupingFolderQuery rightJoinGrouping($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Grouping relation
 * @method GroupingFolderQuery innerJoinGrouping($relationAlias = null) Adds a INNER JOIN clause to the query using the Grouping relation
 *
 * @method GroupingFolder findOne(PropelPDO $con = null) Return the first GroupingFolder matching the query
 * @method GroupingFolder findOneOrCreate(PropelPDO $con = null) Return the first GroupingFolder matching the query, or a new GroupingFolder object populated from the query conditions when no match is found
 *
 * @method GroupingFolder findOneByGroupingId(int $grouping_id) Return the first GroupingFolder filtered by the grouping_id column
 * @method GroupingFolder findOneByFolderId(int $folder_id) Return the first GroupingFolder filtered by the folder_id column
 * @method GroupingFolder findOneByOrderNr(int $order_nr) Return the first GroupingFolder filtered by the order_nr column
 * @method GroupingFolder findOneByAltDisplayName(string $alt_display_name) Return the first GroupingFolder filtered by the alt_display_name column
 *
 * @method array findByGroupingId(int $grouping_id) Return GroupingFolder objects filtered by the grouping_id column
 * @method array findByFolderId(int $folder_id) Return GroupingFolder objects filtered by the folder_id column
 * @method array findByOrderNr(int $order_nr) Return GroupingFolder objects filtered by the order_nr column
 * @method array findByAltDisplayName(string $alt_display_name) Return GroupingFolder objects filtered by the alt_display_name column
 *
 * @package    propel.generator.atica.om
 */
abstract class BaseGroupingFolderQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseGroupingFolderQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'atica', $modelName = 'GroupingFolder', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new GroupingFolderQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     GroupingFolderQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return GroupingFolderQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof GroupingFolderQuery) {
            return $criteria;
        }
        $query = new GroupingFolderQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query
                         A Primary key composition: [$grouping_id, $folder_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   GroupingFolder|GroupingFolder[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = GroupingFolderPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(GroupingFolderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return   GroupingFolder A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `GROUPING_ID`, `FOLDER_ID`, `ORDER_NR`, `ALT_DISPLAY_NAME` FROM `grouping_folder` WHERE `GROUPING_ID` = :p0 AND `FOLDER_ID` = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new GroupingFolder();
            $obj->hydrate($row);
            GroupingFolderPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return GroupingFolder|GroupingFolder[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|GroupingFolder[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return GroupingFolderQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(GroupingFolderPeer::GROUPING_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(GroupingFolderPeer::FOLDER_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return GroupingFolderQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(GroupingFolderPeer::GROUPING_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(GroupingFolderPeer::FOLDER_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the grouping_id column
     *
     * Example usage:
     * <code>
     * $query->filterByGroupingId(1234); // WHERE grouping_id = 1234
     * $query->filterByGroupingId(array(12, 34)); // WHERE grouping_id IN (12, 34)
     * $query->filterByGroupingId(array('min' => 12)); // WHERE grouping_id > 12
     * </code>
     *
     * @see       filterByGrouping()
     *
     * @param     mixed $groupingId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return GroupingFolderQuery The current query, for fluid interface
     */
    public function filterByGroupingId($groupingId = null, $comparison = null)
    {
        if (is_array($groupingId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(GroupingFolderPeer::GROUPING_ID, $groupingId, $comparison);
    }

    /**
     * Filter the query on the folder_id column
     *
     * Example usage:
     * <code>
     * $query->filterByFolderId(1234); // WHERE folder_id = 1234
     * $query->filterByFolderId(array(12, 34)); // WHERE folder_id IN (12, 34)
     * $query->filterByFolderId(array('min' => 12)); // WHERE folder_id > 12
     * </code>
     *
     * @see       filterByFolder()
     *
     * @param     mixed $folderId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return GroupingFolderQuery The current query, for fluid interface
     */
    public function filterByFolderId($folderId = null, $comparison = null)
    {
        if (is_array($folderId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(GroupingFolderPeer::FOLDER_ID, $folderId, $comparison);
    }

    /**
     * Filter the query on the order_nr column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderNr(1234); // WHERE order_nr = 1234
     * $query->filterByOrderNr(array(12, 34)); // WHERE order_nr IN (12, 34)
     * $query->filterByOrderNr(array('min' => 12)); // WHERE order_nr > 12
     * </code>
     *
     * @param     mixed $orderNr The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return GroupingFolderQuery The current query, for fluid interface
     */
    public function filterByOrderNr($orderNr = null, $comparison = null)
    {
        if (is_array($orderNr)) {
            $useMinMax = false;
            if (isset($orderNr['min'])) {
                $this->addUsingAlias(GroupingFolderPeer::ORDER_NR, $orderNr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderNr['max'])) {
                $this->addUsingAlias(GroupingFolderPeer::ORDER_NR, $orderNr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GroupingFolderPeer::ORDER_NR, $orderNr, $comparison);
    }

    /**
     * Filter the query on the alt_display_name column
     *
     * Example usage:
     * <code>
     * $query->filterByAltDisplayName('fooValue');   // WHERE alt_display_name = 'fooValue'
     * $query->filterByAltDisplayName('%fooValue%'); // WHERE alt_display_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $altDisplayName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return GroupingFolderQuery The current query, for fluid interface
     */
    public function filterByAltDisplayName($altDisplayName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($altDisplayName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $altDisplayName)) {
                $altDisplayName = str_replace('*', '%', $altDisplayName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(GroupingFolderPeer::ALT_DISPLAY_NAME, $altDisplayName, $comparison);
    }

    /**
     * Filter the query by a related Folder object
     *
     * @param   Folder|PropelObjectCollection $folder The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   GroupingFolderQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByFolder($folder, $comparison = null)
    {
        if ($folder instanceof Folder) {
            return $this
                ->addUsingAlias(GroupingFolderPeer::FOLDER_ID, $folder->getId(), $comparison);
        } elseif ($folder instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(GroupingFolderPeer::FOLDER_ID, $folder->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByFolder() only accepts arguments of type Folder or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Folder relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return GroupingFolderQuery The current query, for fluid interface
     */
    public function joinFolder($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Folder');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Folder');
        }

        return $this;
    }

    /**
     * Use the Folder relation Folder object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   FolderQuery A secondary query class using the current class as primary query
     */
    public function useFolderQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinFolder($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Folder', 'FolderQuery');
    }

    /**
     * Filter the query by a related Grouping object
     *
     * @param   Grouping|PropelObjectCollection $grouping The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   GroupingFolderQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByGrouping($grouping, $comparison = null)
    {
        if ($grouping instanceof Grouping) {
            return $this
                ->addUsingAlias(GroupingFolderPeer::GROUPING_ID, $grouping->getId(), $comparison);
        } elseif ($grouping instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(GroupingFolderPeer::GROUPING_ID, $grouping->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByGrouping() only accepts arguments of type Grouping or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Grouping relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return GroupingFolderQuery The current query, for fluid interface
     */
    public function joinGrouping($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Grouping');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Grouping');
        }

        return $this;
    }

    /**
     * Use the Grouping relation Grouping object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   GroupingQuery A secondary query class using the current class as primary query
     */
    public function useGroupingQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinGrouping($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Grouping', 'GroupingQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   GroupingFolder $groupingFolder Object to remove from the list of results
     *
     * @return GroupingFolderQuery The current query, for fluid interface
     */
    public function prune($groupingFolder = null)
    {
        if ($groupingFolder) {
            $this->addCond('pruneCond0', $this->getAliasedColName(GroupingFolderPeer::GROUPING_ID), $groupingFolder->getGroupingId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(GroupingFolderPeer::FOLDER_ID), $groupingFolder->getFolderId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    // sortable behavior

    /**
     * Filter the query based on a rank in the list
     *
     * @param     integer   $rank rank
     *
     * @return    GroupingFolderQuery The current query, for fluid interface
     */
    public function filterByRank($rank)
    {
        return $this
            ->addUsingAlias(GroupingFolderPeer::RANK_COL, $rank, Criteria::EQUAL);
    }

    /**
     * Order the query based on the rank in the list.
     * Using the default $order, returns the item with the lowest rank first
     *
     * @param     string $order either Criteria::ASC (default) or Criteria::DESC
     *
     * @return    GroupingFolderQuery The current query, for fluid interface
     */
    public function orderByRank($order = Criteria::ASC)
    {
        $order = strtoupper($order);
        switch ($order) {
            case Criteria::ASC:
                return $this->addAscendingOrderByColumn($this->getAliasedColName(GroupingFolderPeer::RANK_COL));
                break;
            case Criteria::DESC:
                return $this->addDescendingOrderByColumn($this->getAliasedColName(GroupingFolderPeer::RANK_COL));
                break;
            default:
                throw new PropelException('GroupingFolderQuery::orderBy() only accepts "asc" or "desc" as argument');
        }
    }

    /**
     * Get an item from the list based on its rank
     *
     * @param     integer   $rank rank
     * @param     PropelPDO $con optional connection
     *
     * @return    GroupingFolder
     */
    public function findOneByRank($rank, PropelPDO $con = null)
    {
        return $this
            ->filterByRank($rank)
            ->findOne($con);
    }

    /**
     * Returns the list of objects
     *
     * @param      PropelPDO $con	Connection to use.
     *
     * @return     mixed the list of results, formatted by the current formatter
     */
    public function findList($con = null)
    {
        return $this
            ->orderByRank()
            ->find($con);
    }

    /**
     * Get the highest rank
     *
     * @param     PropelPDO optional connection
     *
     * @return    integer highest position
     */
    public function getMaxRank(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(GroupingFolderPeer::DATABASE_NAME);
        }
        // shift the objects with a position lower than the one of object
        $this->addSelectColumn('MAX(' . GroupingFolderPeer::RANK_COL . ')');
        $stmt = $this->doSelect($con);

        return $stmt->fetchColumn();
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
    public function reorder(array $order, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(GroupingFolderPeer::DATABASE_NAME);
        }

        $con->beginTransaction();
        try {
            $ids = array_keys($order);
            $objects = $this->findPks($ids, $con);
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

}
