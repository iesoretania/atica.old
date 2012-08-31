<?php


/**
 * Base class that represents a query for the 'snapshot' table.
 *
 *
 *
 * @method SnapshotQuery orderById($order = Criteria::ASC) Order by the id column
 * @method SnapshotQuery orderByOrderNr($order = Criteria::ASC) Order by the order_nr column
 * @method SnapshotQuery orderByDisplayName($order = Criteria::ASC) Order by the display_name column
 * @method SnapshotQuery orderByVisible($order = Criteria::ASC) Order by the visible column
 * @method SnapshotQuery orderByRestricted($order = Criteria::ASC) Order by the restricted column
 * @method SnapshotQuery orderByOrganizationId($order = Criteria::ASC) Order by the organization_id column
 *
 * @method SnapshotQuery groupById() Group by the id column
 * @method SnapshotQuery groupByOrderNr() Group by the order_nr column
 * @method SnapshotQuery groupByDisplayName() Group by the display_name column
 * @method SnapshotQuery groupByVisible() Group by the visible column
 * @method SnapshotQuery groupByRestricted() Group by the restricted column
 * @method SnapshotQuery groupByOrganizationId() Group by the organization_id column
 *
 * @method SnapshotQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method SnapshotQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method SnapshotQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method SnapshotQuery leftJoinOrganization($relationAlias = null) Adds a LEFT JOIN clause to the query using the Organization relation
 * @method SnapshotQuery rightJoinOrganization($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Organization relation
 * @method SnapshotQuery innerJoinOrganization($relationAlias = null) Adds a INNER JOIN clause to the query using the Organization relation
 *
 * @method SnapshotQuery leftJoinAction($relationAlias = null) Adds a LEFT JOIN clause to the query using the Action relation
 * @method SnapshotQuery rightJoinAction($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Action relation
 * @method SnapshotQuery innerJoinAction($relationAlias = null) Adds a INNER JOIN clause to the query using the Action relation
 *
 * @method SnapshotQuery leftJoinCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the Category relation
 * @method SnapshotQuery rightJoinCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Category relation
 * @method SnapshotQuery innerJoinCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the Category relation
 *
 * @method SnapshotQuery leftJoinConfiguration($relationAlias = null) Adds a LEFT JOIN clause to the query using the Configuration relation
 * @method SnapshotQuery rightJoinConfiguration($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Configuration relation
 * @method SnapshotQuery innerJoinConfiguration($relationAlias = null) Adds a INNER JOIN clause to the query using the Configuration relation
 *
 * @method SnapshotQuery leftJoinDelivery($relationAlias = null) Adds a LEFT JOIN clause to the query using the Delivery relation
 * @method SnapshotQuery rightJoinDelivery($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Delivery relation
 * @method SnapshotQuery innerJoinDelivery($relationAlias = null) Adds a INNER JOIN clause to the query using the Delivery relation
 *
 * @method SnapshotQuery leftJoinEvent($relationAlias = null) Adds a LEFT JOIN clause to the query using the Event relation
 * @method SnapshotQuery rightJoinEvent($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Event relation
 * @method SnapshotQuery innerJoinEvent($relationAlias = null) Adds a INNER JOIN clause to the query using the Event relation
 *
 * @method SnapshotQuery leftJoinActivity($relationAlias = null) Adds a LEFT JOIN clause to the query using the Activity relation
 * @method SnapshotQuery rightJoinActivity($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Activity relation
 * @method SnapshotQuery innerJoinActivity($relationAlias = null) Adds a INNER JOIN clause to the query using the Activity relation
 *
 * @method SnapshotQuery leftJoinFolder($relationAlias = null) Adds a LEFT JOIN clause to the query using the Folder relation
 * @method SnapshotQuery rightJoinFolder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Folder relation
 * @method SnapshotQuery innerJoinFolder($relationAlias = null) Adds a INNER JOIN clause to the query using the Folder relation
 *
 * @method SnapshotQuery leftJoinNonConformance($relationAlias = null) Adds a LEFT JOIN clause to the query using the NonConformance relation
 * @method SnapshotQuery rightJoinNonConformance($relationAlias = null) Adds a RIGHT JOIN clause to the query using the NonConformance relation
 * @method SnapshotQuery innerJoinNonConformance($relationAlias = null) Adds a INNER JOIN clause to the query using the NonConformance relation
 *
 * @method SnapshotQuery leftJoinProfileGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProfileGroup relation
 * @method SnapshotQuery rightJoinProfileGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProfileGroup relation
 * @method SnapshotQuery innerJoinProfileGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the ProfileGroup relation
 *
 * @method SnapshotQuery leftJoinGrouping($relationAlias = null) Adds a LEFT JOIN clause to the query using the Grouping relation
 * @method SnapshotQuery rightJoinGrouping($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Grouping relation
 * @method SnapshotQuery innerJoinGrouping($relationAlias = null) Adds a INNER JOIN clause to the query using the Grouping relation
 *
 * @method Snapshot findOne(PropelPDO $con = null) Return the first Snapshot matching the query
 * @method Snapshot findOneOrCreate(PropelPDO $con = null) Return the first Snapshot matching the query, or a new Snapshot object populated from the query conditions when no match is found
 *
 * @method Snapshot findOneByOrderNr(int $order_nr) Return the first Snapshot filtered by the order_nr column
 * @method Snapshot findOneByDisplayName(string $display_name) Return the first Snapshot filtered by the display_name column
 * @method Snapshot findOneByVisible(boolean $visible) Return the first Snapshot filtered by the visible column
 * @method Snapshot findOneByRestricted(boolean $restricted) Return the first Snapshot filtered by the restricted column
 * @method Snapshot findOneByOrganizationId(int $organization_id) Return the first Snapshot filtered by the organization_id column
 *
 * @method array findById(int $id) Return Snapshot objects filtered by the id column
 * @method array findByOrderNr(int $order_nr) Return Snapshot objects filtered by the order_nr column
 * @method array findByDisplayName(string $display_name) Return Snapshot objects filtered by the display_name column
 * @method array findByVisible(boolean $visible) Return Snapshot objects filtered by the visible column
 * @method array findByRestricted(boolean $restricted) Return Snapshot objects filtered by the restricted column
 * @method array findByOrganizationId(int $organization_id) Return Snapshot objects filtered by the organization_id column
 *
 * @package    propel.generator.atica.om
 */
abstract class BaseSnapshotQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseSnapshotQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'atica', $modelName = 'Snapshot', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SnapshotQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     SnapshotQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SnapshotQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SnapshotQuery) {
            return $criteria;
        }
        $query = new SnapshotQuery();
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
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Snapshot|Snapshot[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SnapshotPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SnapshotPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return   Snapshot A model object, or null if the key is not found
     * @throws   PropelException
     */
     public function findOneById($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return   Snapshot A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `ORDER_NR`, `DISPLAY_NAME`, `VISIBLE`, `RESTRICTED`, `ORGANIZATION_ID` FROM `snapshot` WHERE `ID` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Snapshot();
            $obj->hydrate($row);
            SnapshotPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Snapshot|Snapshot[]|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Snapshot[]|mixed the list of results, formatted by the current formatter
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
     * @return SnapshotQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SnapshotPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SnapshotQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SnapshotPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SnapshotQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(SnapshotPeer::ID, $id, $comparison);
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
     * @return SnapshotQuery The current query, for fluid interface
     */
    public function filterByOrderNr($orderNr = null, $comparison = null)
    {
        if (is_array($orderNr)) {
            $useMinMax = false;
            if (isset($orderNr['min'])) {
                $this->addUsingAlias(SnapshotPeer::ORDER_NR, $orderNr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderNr['max'])) {
                $this->addUsingAlias(SnapshotPeer::ORDER_NR, $orderNr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SnapshotPeer::ORDER_NR, $orderNr, $comparison);
    }

    /**
     * Filter the query on the display_name column
     *
     * Example usage:
     * <code>
     * $query->filterByDisplayName('fooValue');   // WHERE display_name = 'fooValue'
     * $query->filterByDisplayName('%fooValue%'); // WHERE display_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $displayName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SnapshotQuery The current query, for fluid interface
     */
    public function filterByDisplayName($displayName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($displayName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $displayName)) {
                $displayName = str_replace('*', '%', $displayName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SnapshotPeer::DISPLAY_NAME, $displayName, $comparison);
    }

    /**
     * Filter the query on the visible column
     *
     * Example usage:
     * <code>
     * $query->filterByVisible(true); // WHERE visible = true
     * $query->filterByVisible('yes'); // WHERE visible = true
     * </code>
     *
     * @param     boolean|string $visible The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SnapshotQuery The current query, for fluid interface
     */
    public function filterByVisible($visible = null, $comparison = null)
    {
        if (is_string($visible)) {
            $visible = in_array(strtolower($visible), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(SnapshotPeer::VISIBLE, $visible, $comparison);
    }

    /**
     * Filter the query on the restricted column
     *
     * Example usage:
     * <code>
     * $query->filterByRestricted(true); // WHERE restricted = true
     * $query->filterByRestricted('yes'); // WHERE restricted = true
     * </code>
     *
     * @param     boolean|string $restricted The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SnapshotQuery The current query, for fluid interface
     */
    public function filterByRestricted($restricted = null, $comparison = null)
    {
        if (is_string($restricted)) {
            $restricted = in_array(strtolower($restricted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(SnapshotPeer::RESTRICTED, $restricted, $comparison);
    }

    /**
     * Filter the query on the organization_id column
     *
     * Example usage:
     * <code>
     * $query->filterByOrganizationId(1234); // WHERE organization_id = 1234
     * $query->filterByOrganizationId(array(12, 34)); // WHERE organization_id IN (12, 34)
     * $query->filterByOrganizationId(array('min' => 12)); // WHERE organization_id > 12
     * </code>
     *
     * @see       filterByOrganization()
     *
     * @param     mixed $organizationId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SnapshotQuery The current query, for fluid interface
     */
    public function filterByOrganizationId($organizationId = null, $comparison = null)
    {
        if (is_array($organizationId)) {
            $useMinMax = false;
            if (isset($organizationId['min'])) {
                $this->addUsingAlias(SnapshotPeer::ORGANIZATION_ID, $organizationId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($organizationId['max'])) {
                $this->addUsingAlias(SnapshotPeer::ORGANIZATION_ID, $organizationId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SnapshotPeer::ORGANIZATION_ID, $organizationId, $comparison);
    }

    /**
     * Filter the query by a related Organization object
     *
     * @param   Organization|PropelObjectCollection $organization The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   SnapshotQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByOrganization($organization, $comparison = null)
    {
        if ($organization instanceof Organization) {
            return $this
                ->addUsingAlias(SnapshotPeer::ORGANIZATION_ID, $organization->getId(), $comparison);
        } elseif ($organization instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SnapshotPeer::ORGANIZATION_ID, $organization->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByOrganization() only accepts arguments of type Organization or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Organization relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SnapshotQuery The current query, for fluid interface
     */
    public function joinOrganization($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Organization');

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
            $this->addJoinObject($join, 'Organization');
        }

        return $this;
    }

    /**
     * Use the Organization relation Organization object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   OrganizationQuery A secondary query class using the current class as primary query
     */
    public function useOrganizationQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrganization($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Organization', 'OrganizationQuery');
    }

    /**
     * Filter the query by a related Action object
     *
     * @param   Action|PropelObjectCollection $action  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   SnapshotQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByAction($action, $comparison = null)
    {
        if ($action instanceof Action) {
            return $this
                ->addUsingAlias(SnapshotPeer::ID, $action->getSnapshotId(), $comparison);
        } elseif ($action instanceof PropelObjectCollection) {
            return $this
                ->useActionQuery()
                ->filterByPrimaryKeys($action->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAction() only accepts arguments of type Action or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Action relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SnapshotQuery The current query, for fluid interface
     */
    public function joinAction($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Action');

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
            $this->addJoinObject($join, 'Action');
        }

        return $this;
    }

    /**
     * Use the Action relation Action object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ActionQuery A secondary query class using the current class as primary query
     */
    public function useActionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAction($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Action', 'ActionQuery');
    }

    /**
     * Filter the query by a related Category object
     *
     * @param   Category|PropelObjectCollection $category  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   SnapshotQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByCategory($category, $comparison = null)
    {
        if ($category instanceof Category) {
            return $this
                ->addUsingAlias(SnapshotPeer::ID, $category->getSnapshotId(), $comparison);
        } elseif ($category instanceof PropelObjectCollection) {
            return $this
                ->useCategoryQuery()
                ->filterByPrimaryKeys($category->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCategory() only accepts arguments of type Category or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Category relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SnapshotQuery The current query, for fluid interface
     */
    public function joinCategory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Category');

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
            $this->addJoinObject($join, 'Category');
        }

        return $this;
    }

    /**
     * Use the Category relation Category object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CategoryQuery A secondary query class using the current class as primary query
     */
    public function useCategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCategory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Category', 'CategoryQuery');
    }

    /**
     * Filter the query by a related Configuration object
     *
     * @param   Configuration|PropelObjectCollection $configuration  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   SnapshotQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByConfiguration($configuration, $comparison = null)
    {
        if ($configuration instanceof Configuration) {
            return $this
                ->addUsingAlias(SnapshotPeer::ID, $configuration->getSnapshotId(), $comparison);
        } elseif ($configuration instanceof PropelObjectCollection) {
            return $this
                ->useConfigurationQuery()
                ->filterByPrimaryKeys($configuration->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByConfiguration() only accepts arguments of type Configuration or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Configuration relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SnapshotQuery The current query, for fluid interface
     */
    public function joinConfiguration($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Configuration');

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
            $this->addJoinObject($join, 'Configuration');
        }

        return $this;
    }

    /**
     * Use the Configuration relation Configuration object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ConfigurationQuery A secondary query class using the current class as primary query
     */
    public function useConfigurationQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinConfiguration($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Configuration', 'ConfigurationQuery');
    }

    /**
     * Filter the query by a related Delivery object
     *
     * @param   Delivery|PropelObjectCollection $delivery  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   SnapshotQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByDelivery($delivery, $comparison = null)
    {
        if ($delivery instanceof Delivery) {
            return $this
                ->addUsingAlias(SnapshotPeer::ID, $delivery->getSnapshotId(), $comparison);
        } elseif ($delivery instanceof PropelObjectCollection) {
            return $this
                ->useDeliveryQuery()
                ->filterByPrimaryKeys($delivery->getPrimaryKeys())
                ->endUse();
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
     * @return SnapshotQuery The current query, for fluid interface
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
     * Filter the query by a related Event object
     *
     * @param   Event|PropelObjectCollection $event  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   SnapshotQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByEvent($event, $comparison = null)
    {
        if ($event instanceof Event) {
            return $this
                ->addUsingAlias(SnapshotPeer::ID, $event->getSnapshotId(), $comparison);
        } elseif ($event instanceof PropelObjectCollection) {
            return $this
                ->useEventQuery()
                ->filterByPrimaryKeys($event->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEvent() only accepts arguments of type Event or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Event relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SnapshotQuery The current query, for fluid interface
     */
    public function joinEvent($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Event');

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
            $this->addJoinObject($join, 'Event');
        }

        return $this;
    }

    /**
     * Use the Event relation Event object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   EventQuery A secondary query class using the current class as primary query
     */
    public function useEventQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEvent($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Event', 'EventQuery');
    }

    /**
     * Filter the query by a related Activity object
     *
     * @param   Activity|PropelObjectCollection $activity  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   SnapshotQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByActivity($activity, $comparison = null)
    {
        if ($activity instanceof Activity) {
            return $this
                ->addUsingAlias(SnapshotPeer::ID, $activity->getSnapshotId(), $comparison);
        } elseif ($activity instanceof PropelObjectCollection) {
            return $this
                ->useActivityQuery()
                ->filterByPrimaryKeys($activity->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByActivity() only accepts arguments of type Activity or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Activity relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SnapshotQuery The current query, for fluid interface
     */
    public function joinActivity($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Activity');

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
            $this->addJoinObject($join, 'Activity');
        }

        return $this;
    }

    /**
     * Use the Activity relation Activity object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ActivityQuery A secondary query class using the current class as primary query
     */
    public function useActivityQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinActivity($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Activity', 'ActivityQuery');
    }

    /**
     * Filter the query by a related Folder object
     *
     * @param   Folder|PropelObjectCollection $folder  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   SnapshotQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByFolder($folder, $comparison = null)
    {
        if ($folder instanceof Folder) {
            return $this
                ->addUsingAlias(SnapshotPeer::ID, $folder->getSnapshotId(), $comparison);
        } elseif ($folder instanceof PropelObjectCollection) {
            return $this
                ->useFolderQuery()
                ->filterByPrimaryKeys($folder->getPrimaryKeys())
                ->endUse();
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
     * @return SnapshotQuery The current query, for fluid interface
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
     * Filter the query by a related NonConformance object
     *
     * @param   NonConformance|PropelObjectCollection $nonConformance  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   SnapshotQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByNonConformance($nonConformance, $comparison = null)
    {
        if ($nonConformance instanceof NonConformance) {
            return $this
                ->addUsingAlias(SnapshotPeer::ID, $nonConformance->getSnapshotId(), $comparison);
        } elseif ($nonConformance instanceof PropelObjectCollection) {
            return $this
                ->useNonConformanceQuery()
                ->filterByPrimaryKeys($nonConformance->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByNonConformance() only accepts arguments of type NonConformance or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the NonConformance relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SnapshotQuery The current query, for fluid interface
     */
    public function joinNonConformance($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('NonConformance');

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
            $this->addJoinObject($join, 'NonConformance');
        }

        return $this;
    }

    /**
     * Use the NonConformance relation NonConformance object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   NonConformanceQuery A secondary query class using the current class as primary query
     */
    public function useNonConformanceQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinNonConformance($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'NonConformance', 'NonConformanceQuery');
    }

    /**
     * Filter the query by a related ProfileGroup object
     *
     * @param   ProfileGroup|PropelObjectCollection $profileGroup  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   SnapshotQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByProfileGroup($profileGroup, $comparison = null)
    {
        if ($profileGroup instanceof ProfileGroup) {
            return $this
                ->addUsingAlias(SnapshotPeer::ID, $profileGroup->getSnapshotId(), $comparison);
        } elseif ($profileGroup instanceof PropelObjectCollection) {
            return $this
                ->useProfileGroupQuery()
                ->filterByPrimaryKeys($profileGroup->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProfileGroup() only accepts arguments of type ProfileGroup or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ProfileGroup relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SnapshotQuery The current query, for fluid interface
     */
    public function joinProfileGroup($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ProfileGroup');

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
            $this->addJoinObject($join, 'ProfileGroup');
        }

        return $this;
    }

    /**
     * Use the ProfileGroup relation ProfileGroup object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProfileGroupQuery A secondary query class using the current class as primary query
     */
    public function useProfileGroupQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProfileGroup($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ProfileGroup', 'ProfileGroupQuery');
    }

    /**
     * Filter the query by a related Grouping object
     *
     * @param   Grouping|PropelObjectCollection $grouping  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   SnapshotQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByGrouping($grouping, $comparison = null)
    {
        if ($grouping instanceof Grouping) {
            return $this
                ->addUsingAlias(SnapshotPeer::ID, $grouping->getSnapshotId(), $comparison);
        } elseif ($grouping instanceof PropelObjectCollection) {
            return $this
                ->useGroupingQuery()
                ->filterByPrimaryKeys($grouping->getPrimaryKeys())
                ->endUse();
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
     * @return SnapshotQuery The current query, for fluid interface
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
     * @param   Snapshot $snapshot Object to remove from the list of results
     *
     * @return SnapshotQuery The current query, for fluid interface
     */
    public function prune($snapshot = null)
    {
        if ($snapshot) {
            $this->addUsingAlias(SnapshotPeer::ID, $snapshot->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // sortable behavior

    /**
     * Returns the objects in a certain list, from the list scope
     *
     * @param     int $scope		Scope to determine which objects node to return
     *
     * @return    SnapshotQuery The current query, for fluid interface
     */
    public function inList($scope = null)
    {
        return $this->addUsingAlias(SnapshotPeer::SCOPE_COL, $scope, Criteria::EQUAL);
    }

    /**
     * Filter the query based on a rank in the list
     *
     * @param     integer   $rank rank
     * @param     int $scope		Scope to determine which suite to consider
     *
     * @return    SnapshotQuery The current query, for fluid interface
     */
    public function filterByRank($rank, $scope = null)
    {
        return $this
            ->inList($scope)
            ->addUsingAlias(SnapshotPeer::RANK_COL, $rank, Criteria::EQUAL);
    }

    /**
     * Order the query based on the rank in the list.
     * Using the default $order, returns the item with the lowest rank first
     *
     * @param     string $order either Criteria::ASC (default) or Criteria::DESC
     *
     * @return    SnapshotQuery The current query, for fluid interface
     */
    public function orderByRank($order = Criteria::ASC)
    {
        $order = strtoupper($order);
        switch ($order) {
            case Criteria::ASC:
                return $this->addAscendingOrderByColumn($this->getAliasedColName(SnapshotPeer::RANK_COL));
                break;
            case Criteria::DESC:
                return $this->addDescendingOrderByColumn($this->getAliasedColName(SnapshotPeer::RANK_COL));
                break;
            default:
                throw new PropelException('SnapshotQuery::orderBy() only accepts "asc" or "desc" as argument');
        }
    }

    /**
     * Get an item from the list based on its rank
     *
     * @param     integer   $rank rank
     * @param     int $scope		Scope to determine which suite to consider
     * @param     PropelPDO $con optional connection
     *
     * @return    Snapshot
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
            $con = Propel::getConnection(SnapshotPeer::DATABASE_NAME);
        }
        // shift the objects with a position lower than the one of object
        $this->addSelectColumn('MAX(' . SnapshotPeer::RANK_COL . ')');
        $this->add(SnapshotPeer::SCOPE_COL, $scope, Criteria::EQUAL);
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
            $con = Propel::getConnection(SnapshotPeer::DATABASE_NAME);
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
