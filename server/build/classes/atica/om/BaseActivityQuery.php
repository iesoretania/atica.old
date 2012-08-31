<?php


/**
 * Base class that represents a query for the 'activity' table.
 *
 *
 *
 * @method ActivityQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ActivityQuery orderBySnapshotId($order = Criteria::ASC) Order by the snapshot_id column
 * @method ActivityQuery orderByDisplayName($order = Criteria::ASC) Order by the display_name column
 * @method ActivityQuery orderByDescription($order = Criteria::ASC) Order by the description column
 *
 * @method ActivityQuery groupById() Group by the id column
 * @method ActivityQuery groupBySnapshotId() Group by the snapshot_id column
 * @method ActivityQuery groupByDisplayName() Group by the display_name column
 * @method ActivityQuery groupByDescription() Group by the description column
 *
 * @method ActivityQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ActivityQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ActivityQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ActivityQuery leftJoinSnapshot($relationAlias = null) Adds a LEFT JOIN clause to the query using the Snapshot relation
 * @method ActivityQuery rightJoinSnapshot($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Snapshot relation
 * @method ActivityQuery innerJoinSnapshot($relationAlias = null) Adds a INNER JOIN clause to the query using the Snapshot relation
 *
 * @method ActivityQuery leftJoinActivityEvent($relationAlias = null) Adds a LEFT JOIN clause to the query using the ActivityEvent relation
 * @method ActivityQuery rightJoinActivityEvent($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ActivityEvent relation
 * @method ActivityQuery innerJoinActivityEvent($relationAlias = null) Adds a INNER JOIN clause to the query using the ActivityEvent relation
 *
 * @method ActivityQuery leftJoinActivityProfileGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the ActivityProfileGroup relation
 * @method ActivityQuery rightJoinActivityProfileGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ActivityProfileGroup relation
 * @method ActivityQuery innerJoinActivityProfileGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the ActivityProfileGroup relation
 *
 * @method Activity findOne(PropelPDO $con = null) Return the first Activity matching the query
 * @method Activity findOneOrCreate(PropelPDO $con = null) Return the first Activity matching the query, or a new Activity object populated from the query conditions when no match is found
 *
 * @method Activity findOneBySnapshotId(int $snapshot_id) Return the first Activity filtered by the snapshot_id column
 * @method Activity findOneByDisplayName(string $display_name) Return the first Activity filtered by the display_name column
 * @method Activity findOneByDescription(string $description) Return the first Activity filtered by the description column
 *
 * @method array findById(int $id) Return Activity objects filtered by the id column
 * @method array findBySnapshotId(int $snapshot_id) Return Activity objects filtered by the snapshot_id column
 * @method array findByDisplayName(string $display_name) Return Activity objects filtered by the display_name column
 * @method array findByDescription(string $description) Return Activity objects filtered by the description column
 *
 * @package    propel.generator.atica.om
 */
abstract class BaseActivityQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseActivityQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'atica', $modelName = 'Activity', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ActivityQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     ActivityQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ActivityQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ActivityQuery) {
            return $criteria;
        }
        $query = new ActivityQuery();
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
     * @return   Activity|Activity[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ActivityPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ActivityPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Activity A model object, or null if the key is not found
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
     * @return   Activity A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `SNAPSHOT_ID`, `DISPLAY_NAME`, `DESCRIPTION` FROM `activity` WHERE `ID` = :p0';
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
            $obj = new Activity();
            $obj->hydrate($row);
            ActivityPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Activity|Activity[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Activity[]|mixed the list of results, formatted by the current formatter
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
     * @return ActivityQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ActivityPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ActivityQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ActivityPeer::ID, $keys, Criteria::IN);
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
     * @return ActivityQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(ActivityPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the snapshot_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySnapshotId(1234); // WHERE snapshot_id = 1234
     * $query->filterBySnapshotId(array(12, 34)); // WHERE snapshot_id IN (12, 34)
     * $query->filterBySnapshotId(array('min' => 12)); // WHERE snapshot_id > 12
     * </code>
     *
     * @see       filterBySnapshot()
     *
     * @param     mixed $snapshotId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActivityQuery The current query, for fluid interface
     */
    public function filterBySnapshotId($snapshotId = null, $comparison = null)
    {
        if (is_array($snapshotId)) {
            $useMinMax = false;
            if (isset($snapshotId['min'])) {
                $this->addUsingAlias(ActivityPeer::SNAPSHOT_ID, $snapshotId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($snapshotId['max'])) {
                $this->addUsingAlias(ActivityPeer::SNAPSHOT_ID, $snapshotId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActivityPeer::SNAPSHOT_ID, $snapshotId, $comparison);
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
     * @return ActivityQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ActivityPeer::DISPLAY_NAME, $displayName, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%'); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActivityQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $description)) {
                $description = str_replace('*', '%', $description);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ActivityPeer::DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query by a related Snapshot object
     *
     * @param   Snapshot|PropelObjectCollection $snapshot The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ActivityQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBySnapshot($snapshot, $comparison = null)
    {
        if ($snapshot instanceof Snapshot) {
            return $this
                ->addUsingAlias(ActivityPeer::SNAPSHOT_ID, $snapshot->getId(), $comparison);
        } elseif ($snapshot instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ActivityPeer::SNAPSHOT_ID, $snapshot->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterBySnapshot() only accepts arguments of type Snapshot or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Snapshot relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ActivityQuery The current query, for fluid interface
     */
    public function joinSnapshot($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Snapshot');

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
            $this->addJoinObject($join, 'Snapshot');
        }

        return $this;
    }

    /**
     * Use the Snapshot relation Snapshot object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SnapshotQuery A secondary query class using the current class as primary query
     */
    public function useSnapshotQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSnapshot($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Snapshot', 'SnapshotQuery');
    }

    /**
     * Filter the query by a related ActivityEvent object
     *
     * @param   ActivityEvent|PropelObjectCollection $activityEvent  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ActivityQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByActivityEvent($activityEvent, $comparison = null)
    {
        if ($activityEvent instanceof ActivityEvent) {
            return $this
                ->addUsingAlias(ActivityPeer::ID, $activityEvent->getActivityId(), $comparison);
        } elseif ($activityEvent instanceof PropelObjectCollection) {
            return $this
                ->useActivityEventQuery()
                ->filterByPrimaryKeys($activityEvent->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByActivityEvent() only accepts arguments of type ActivityEvent or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ActivityEvent relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ActivityQuery The current query, for fluid interface
     */
    public function joinActivityEvent($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ActivityEvent');

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
            $this->addJoinObject($join, 'ActivityEvent');
        }

        return $this;
    }

    /**
     * Use the ActivityEvent relation ActivityEvent object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ActivityEventQuery A secondary query class using the current class as primary query
     */
    public function useActivityEventQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinActivityEvent($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ActivityEvent', 'ActivityEventQuery');
    }

    /**
     * Filter the query by a related ActivityProfileGroup object
     *
     * @param   ActivityProfileGroup|PropelObjectCollection $activityProfileGroup  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ActivityQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByActivityProfileGroup($activityProfileGroup, $comparison = null)
    {
        if ($activityProfileGroup instanceof ActivityProfileGroup) {
            return $this
                ->addUsingAlias(ActivityPeer::ID, $activityProfileGroup->getActivityId(), $comparison);
        } elseif ($activityProfileGroup instanceof PropelObjectCollection) {
            return $this
                ->useActivityProfileGroupQuery()
                ->filterByPrimaryKeys($activityProfileGroup->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByActivityProfileGroup() only accepts arguments of type ActivityProfileGroup or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ActivityProfileGroup relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ActivityQuery The current query, for fluid interface
     */
    public function joinActivityProfileGroup($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ActivityProfileGroup');

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
            $this->addJoinObject($join, 'ActivityProfileGroup');
        }

        return $this;
    }

    /**
     * Use the ActivityProfileGroup relation ActivityProfileGroup object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ActivityProfileGroupQuery A secondary query class using the current class as primary query
     */
    public function useActivityProfileGroupQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinActivityProfileGroup($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ActivityProfileGroup', 'ActivityProfileGroupQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Activity $activity Object to remove from the list of results
     *
     * @return ActivityQuery The current query, for fluid interface
     */
    public function prune($activity = null)
    {
        if ($activity) {
            $this->addUsingAlias(ActivityPeer::ID, $activity->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
