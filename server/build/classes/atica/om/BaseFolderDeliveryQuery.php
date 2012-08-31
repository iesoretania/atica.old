<?php


/**
 * Base class that represents a query for the 'folder_delivery' table.
 *
 *
 *
 * @method FolderDeliveryQuery orderByFolderId($order = Criteria::ASC) Order by the folder_id column
 * @method FolderDeliveryQuery orderByDeliveryId($order = Criteria::ASC) Order by the delivery_id column
 * @method FolderDeliveryQuery orderByOrderNr($order = Criteria::ASC) Order by the order_nr column
 *
 * @method FolderDeliveryQuery groupByFolderId() Group by the folder_id column
 * @method FolderDeliveryQuery groupByDeliveryId() Group by the delivery_id column
 * @method FolderDeliveryQuery groupByOrderNr() Group by the order_nr column
 *
 * @method FolderDeliveryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method FolderDeliveryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method FolderDeliveryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method FolderDeliveryQuery leftJoinFolder($relationAlias = null) Adds a LEFT JOIN clause to the query using the Folder relation
 * @method FolderDeliveryQuery rightJoinFolder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Folder relation
 * @method FolderDeliveryQuery innerJoinFolder($relationAlias = null) Adds a INNER JOIN clause to the query using the Folder relation
 *
 * @method FolderDeliveryQuery leftJoinDelivery($relationAlias = null) Adds a LEFT JOIN clause to the query using the Delivery relation
 * @method FolderDeliveryQuery rightJoinDelivery($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Delivery relation
 * @method FolderDeliveryQuery innerJoinDelivery($relationAlias = null) Adds a INNER JOIN clause to the query using the Delivery relation
 *
 * @method FolderDelivery findOne(PropelPDO $con = null) Return the first FolderDelivery matching the query
 * @method FolderDelivery findOneOrCreate(PropelPDO $con = null) Return the first FolderDelivery matching the query, or a new FolderDelivery object populated from the query conditions when no match is found
 *
 * @method FolderDelivery findOneByFolderId(int $folder_id) Return the first FolderDelivery filtered by the folder_id column
 * @method FolderDelivery findOneByDeliveryId(int $delivery_id) Return the first FolderDelivery filtered by the delivery_id column
 * @method FolderDelivery findOneByOrderNr(int $order_nr) Return the first FolderDelivery filtered by the order_nr column
 *
 * @method array findByFolderId(int $folder_id) Return FolderDelivery objects filtered by the folder_id column
 * @method array findByDeliveryId(int $delivery_id) Return FolderDelivery objects filtered by the delivery_id column
 * @method array findByOrderNr(int $order_nr) Return FolderDelivery objects filtered by the order_nr column
 *
 * @package    propel.generator.atica.om
 */
abstract class BaseFolderDeliveryQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseFolderDeliveryQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'atica', $modelName = 'FolderDelivery', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new FolderDeliveryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     FolderDeliveryQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return FolderDeliveryQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof FolderDeliveryQuery) {
            return $criteria;
        }
        $query = new FolderDeliveryQuery();
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
                         A Primary key composition: [$folder_id, $delivery_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   FolderDelivery|FolderDelivery[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = FolderDeliveryPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(FolderDeliveryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   FolderDelivery A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `FOLDER_ID`, `DELIVERY_ID`, `ORDER_NR` FROM `folder_delivery` WHERE `FOLDER_ID` = :p0 AND `DELIVERY_ID` = :p1';
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
            $obj = new FolderDelivery();
            $obj->hydrate($row);
            FolderDeliveryPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return FolderDelivery|FolderDelivery[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|FolderDelivery[]|mixed the list of results, formatted by the current formatter
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
     * @return FolderDeliveryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(FolderDeliveryPeer::FOLDER_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(FolderDeliveryPeer::DELIVERY_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return FolderDeliveryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(FolderDeliveryPeer::FOLDER_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(FolderDeliveryPeer::DELIVERY_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
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
     * @return FolderDeliveryQuery The current query, for fluid interface
     */
    public function filterByFolderId($folderId = null, $comparison = null)
    {
        if (is_array($folderId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(FolderDeliveryPeer::FOLDER_ID, $folderId, $comparison);
    }

    /**
     * Filter the query on the delivery_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDeliveryId(1234); // WHERE delivery_id = 1234
     * $query->filterByDeliveryId(array(12, 34)); // WHERE delivery_id IN (12, 34)
     * $query->filterByDeliveryId(array('min' => 12)); // WHERE delivery_id > 12
     * </code>
     *
     * @see       filterByDelivery()
     *
     * @param     mixed $deliveryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FolderDeliveryQuery The current query, for fluid interface
     */
    public function filterByDeliveryId($deliveryId = null, $comparison = null)
    {
        if (is_array($deliveryId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(FolderDeliveryPeer::DELIVERY_ID, $deliveryId, $comparison);
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
     * @return FolderDeliveryQuery The current query, for fluid interface
     */
    public function filterByOrderNr($orderNr = null, $comparison = null)
    {
        if (is_array($orderNr)) {
            $useMinMax = false;
            if (isset($orderNr['min'])) {
                $this->addUsingAlias(FolderDeliveryPeer::ORDER_NR, $orderNr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderNr['max'])) {
                $this->addUsingAlias(FolderDeliveryPeer::ORDER_NR, $orderNr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FolderDeliveryPeer::ORDER_NR, $orderNr, $comparison);
    }

    /**
     * Filter the query by a related Folder object
     *
     * @param   Folder|PropelObjectCollection $folder The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   FolderDeliveryQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByFolder($folder, $comparison = null)
    {
        if ($folder instanceof Folder) {
            return $this
                ->addUsingAlias(FolderDeliveryPeer::FOLDER_ID, $folder->getId(), $comparison);
        } elseif ($folder instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(FolderDeliveryPeer::FOLDER_ID, $folder->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return FolderDeliveryQuery The current query, for fluid interface
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
     * Filter the query by a related Delivery object
     *
     * @param   Delivery|PropelObjectCollection $delivery The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   FolderDeliveryQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByDelivery($delivery, $comparison = null)
    {
        if ($delivery instanceof Delivery) {
            return $this
                ->addUsingAlias(FolderDeliveryPeer::DELIVERY_ID, $delivery->getId(), $comparison);
        } elseif ($delivery instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(FolderDeliveryPeer::DELIVERY_ID, $delivery->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByDelivery() only accepts arguments of type Delivery or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Delivery relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return FolderDeliveryQuery The current query, for fluid interface
     */
    public function joinDelivery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Delivery');

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
            $this->addJoinObject($join, 'Delivery');
        }

        return $this;
    }

    /**
     * Use the Delivery relation Delivery object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   DeliveryQuery A secondary query class using the current class as primary query
     */
    public function useDeliveryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDelivery($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Delivery', 'DeliveryQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   FolderDelivery $folderDelivery Object to remove from the list of results
     *
     * @return FolderDeliveryQuery The current query, for fluid interface
     */
    public function prune($folderDelivery = null)
    {
        if ($folderDelivery) {
            $this->addCond('pruneCond0', $this->getAliasedColName(FolderDeliveryPeer::FOLDER_ID), $folderDelivery->getFolderId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(FolderDeliveryPeer::DELIVERY_ID), $folderDelivery->getDeliveryId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    // sortable behavior

    /**
     * Returns the objects in a certain list, from the list scope
     *
     * @param     int $scope		Scope to determine which objects node to return
     *
     * @return    FolderDeliveryQuery The current query, for fluid interface
     */
    public function inList($scope = null)
    {
        return $this->addUsingAlias(FolderDeliveryPeer::SCOPE_COL, $scope, Criteria::EQUAL);
    }

    /**
     * Filter the query based on a rank in the list
     *
     * @param     integer   $rank rank
     * @param     int $scope		Scope to determine which suite to consider
     *
     * @return    FolderDeliveryQuery The current query, for fluid interface
     */
    public function filterByRank($rank, $scope = null)
    {
        return $this
            ->inList($scope)
            ->addUsingAlias(FolderDeliveryPeer::RANK_COL, $rank, Criteria::EQUAL);
    }

    /**
     * Order the query based on the rank in the list.
     * Using the default $order, returns the item with the lowest rank first
     *
     * @param     string $order either Criteria::ASC (default) or Criteria::DESC
     *
     * @return    FolderDeliveryQuery The current query, for fluid interface
     */
    public function orderByRank($order = Criteria::ASC)
    {
        $order = strtoupper($order);
        switch ($order) {
            case Criteria::ASC:
                return $this->addAscendingOrderByColumn($this->getAliasedColName(FolderDeliveryPeer::RANK_COL));
                break;
            case Criteria::DESC:
                return $this->addDescendingOrderByColumn($this->getAliasedColName(FolderDeliveryPeer::RANK_COL));
                break;
            default:
                throw new PropelException('FolderDeliveryQuery::orderBy() only accepts "asc" or "desc" as argument');
        }
    }

    /**
     * Get an item from the list based on its rank
     *
     * @param     integer   $rank rank
     * @param     int $scope		Scope to determine which suite to consider
     * @param     PropelPDO $con optional connection
     *
     * @return    FolderDelivery
     */
    public function findOneByRank($rank, $scope = null, PropelPDO $con = null)
    {
        return $this
            ->filterByRank($rank, $scope)
            ->findOne($con);
    }

    /**
     * Returns a list of objects
     *
     * @param      int $scope		Scope to determine which list to return
     * @param      PropelPDO $con	Connection to use.
     *
     * @return     mixed the list of results, formatted by the current formatter
     */
    public function findList($scope = null, $con = null)
    {
        return $this
            ->inList($scope)
            ->orderByRank()
            ->find($con);
    }

    /**
     * Get the highest rank
     *
     * @param      int $scope		Scope to determine which suite to consider
     * @param     PropelPDO optional connection
     *
     * @return    integer highest position
     */
    public function getMaxRank($scope = null, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(FolderDeliveryPeer::DATABASE_NAME);
        }
        // shift the objects with a position lower than the one of object
        $this->addSelectColumn('MAX(' . FolderDeliveryPeer::RANK_COL . ')');
        $this->add(FolderDeliveryPeer::SCOPE_COL, $scope, Criteria::EQUAL);
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
            $con = Propel::getConnection(FolderDeliveryPeer::DATABASE_NAME);
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
