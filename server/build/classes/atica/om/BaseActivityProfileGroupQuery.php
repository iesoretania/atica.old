<?php


/**
 * Base class that represents a query for the 'activity_profile_group' table.
 *
 *
 *
 * @method ActivityProfileGroupQuery orderByActivityId($order = Criteria::ASC) Order by the activity_id column
 * @method ActivityProfileGroupQuery orderByProfileGroupId($order = Criteria::ASC) Order by the profile_group_id column
 *
 * @method ActivityProfileGroupQuery groupByActivityId() Group by the activity_id column
 * @method ActivityProfileGroupQuery groupByProfileGroupId() Group by the profile_group_id column
 *
 * @method ActivityProfileGroupQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ActivityProfileGroupQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ActivityProfileGroupQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ActivityProfileGroupQuery leftJoinActivity($relationAlias = null) Adds a LEFT JOIN clause to the query using the Activity relation
 * @method ActivityProfileGroupQuery rightJoinActivity($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Activity relation
 * @method ActivityProfileGroupQuery innerJoinActivity($relationAlias = null) Adds a INNER JOIN clause to the query using the Activity relation
 *
 * @method ActivityProfileGroupQuery leftJoinProfileGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProfileGroup relation
 * @method ActivityProfileGroupQuery rightJoinProfileGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProfileGroup relation
 * @method ActivityProfileGroupQuery innerJoinProfileGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the ProfileGroup relation
 *
 * @method ActivityProfileGroup findOne(PropelPDO $con = null) Return the first ActivityProfileGroup matching the query
 * @method ActivityProfileGroup findOneOrCreate(PropelPDO $con = null) Return the first ActivityProfileGroup matching the query, or a new ActivityProfileGroup object populated from the query conditions when no match is found
 *
 * @method ActivityProfileGroup findOneByActivityId(int $activity_id) Return the first ActivityProfileGroup filtered by the activity_id column
 * @method ActivityProfileGroup findOneByProfileGroupId(int $profile_group_id) Return the first ActivityProfileGroup filtered by the profile_group_id column
 *
 * @method array findByActivityId(int $activity_id) Return ActivityProfileGroup objects filtered by the activity_id column
 * @method array findByProfileGroupId(int $profile_group_id) Return ActivityProfileGroup objects filtered by the profile_group_id column
 *
 * @package    propel.generator.atica.om
 */
abstract class BaseActivityProfileGroupQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseActivityProfileGroupQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'atica', $modelName = 'ActivityProfileGroup', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ActivityProfileGroupQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     ActivityProfileGroupQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ActivityProfileGroupQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ActivityProfileGroupQuery) {
            return $criteria;
        }
        $query = new ActivityProfileGroupQuery();
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
                         A Primary key composition: [$activity_id, $profile_group_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   ActivityProfileGroup|ActivityProfileGroup[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ActivityProfileGroupPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ActivityProfileGroupPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   ActivityProfileGroup A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ACTIVITY_ID`, `PROFILE_GROUP_ID` FROM `activity_profile_group` WHERE `ACTIVITY_ID` = :p0 AND `PROFILE_GROUP_ID` = :p1';
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
            $obj = new ActivityProfileGroup();
            $obj->hydrate($row);
            ActivityProfileGroupPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ActivityProfileGroup|ActivityProfileGroup[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ActivityProfileGroup[]|mixed the list of results, formatted by the current formatter
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
     * @return ActivityProfileGroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(ActivityProfileGroupPeer::ACTIVITY_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(ActivityProfileGroupPeer::PROFILE_GROUP_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ActivityProfileGroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(ActivityProfileGroupPeer::ACTIVITY_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(ActivityProfileGroupPeer::PROFILE_GROUP_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the activity_id column
     *
     * Example usage:
     * <code>
     * $query->filterByActivityId(1234); // WHERE activity_id = 1234
     * $query->filterByActivityId(array(12, 34)); // WHERE activity_id IN (12, 34)
     * $query->filterByActivityId(array('min' => 12)); // WHERE activity_id > 12
     * </code>
     *
     * @see       filterByActivity()
     *
     * @param     mixed $activityId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActivityProfileGroupQuery The current query, for fluid interface
     */
    public function filterByActivityId($activityId = null, $comparison = null)
    {
        if (is_array($activityId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(ActivityProfileGroupPeer::ACTIVITY_ID, $activityId, $comparison);
    }

    /**
     * Filter the query on the profile_group_id column
     *
     * Example usage:
     * <code>
     * $query->filterByProfileGroupId(1234); // WHERE profile_group_id = 1234
     * $query->filterByProfileGroupId(array(12, 34)); // WHERE profile_group_id IN (12, 34)
     * $query->filterByProfileGroupId(array('min' => 12)); // WHERE profile_group_id > 12
     * </code>
     *
     * @see       filterByProfileGroup()
     *
     * @param     mixed $profileGroupId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActivityProfileGroupQuery The current query, for fluid interface
     */
    public function filterByProfileGroupId($profileGroupId = null, $comparison = null)
    {
        if (is_array($profileGroupId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(ActivityProfileGroupPeer::PROFILE_GROUP_ID, $profileGroupId, $comparison);
    }

    /**
     * Filter the query by a related Activity object
     *
     * @param   Activity|PropelObjectCollection $activity The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ActivityProfileGroupQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByActivity($activity, $comparison = null)
    {
        if ($activity instanceof Activity) {
            return $this
                ->addUsingAlias(ActivityProfileGroupPeer::ACTIVITY_ID, $activity->getId(), $comparison);
        } elseif ($activity instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ActivityProfileGroupPeer::ACTIVITY_ID, $activity->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return ActivityProfileGroupQuery The current query, for fluid interface
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
     * Filter the query by a related ProfileGroup object
     *
     * @param   ProfileGroup|PropelObjectCollection $profileGroup The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ActivityProfileGroupQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByProfileGroup($profileGroup, $comparison = null)
    {
        if ($profileGroup instanceof ProfileGroup) {
            return $this
                ->addUsingAlias(ActivityProfileGroupPeer::PROFILE_GROUP_ID, $profileGroup->getId(), $comparison);
        } elseif ($profileGroup instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ActivityProfileGroupPeer::PROFILE_GROUP_ID, $profileGroup->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return ActivityProfileGroupQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ActivityProfileGroup $activityProfileGroup Object to remove from the list of results
     *
     * @return ActivityProfileGroupQuery The current query, for fluid interface
     */
    public function prune($activityProfileGroup = null)
    {
        if ($activityProfileGroup) {
            $this->addCond('pruneCond0', $this->getAliasedColName(ActivityProfileGroupPeer::ACTIVITY_ID), $activityProfileGroup->getActivityId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(ActivityProfileGroupPeer::PROFILE_GROUP_ID), $activityProfileGroup->getProfileGroupId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
