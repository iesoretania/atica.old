<?php


/**
 * Base class that represents a query for the 'event_profile_group' table.
 *
 *
 *
 * @method EventProfileGroupQuery orderByEventId($order = Criteria::ASC) Order by the event_id column
 * @method EventProfileGroupQuery orderByProfileGroupId($order = Criteria::ASC) Order by the profile_group_id column
 *
 * @method EventProfileGroupQuery groupByEventId() Group by the event_id column
 * @method EventProfileGroupQuery groupByProfileGroupId() Group by the profile_group_id column
 *
 * @method EventProfileGroupQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method EventProfileGroupQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method EventProfileGroupQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method EventProfileGroupQuery leftJoinProfileGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProfileGroup relation
 * @method EventProfileGroupQuery rightJoinProfileGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProfileGroup relation
 * @method EventProfileGroupQuery innerJoinProfileGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the ProfileGroup relation
 *
 * @method EventProfileGroupQuery leftJoinEvent($relationAlias = null) Adds a LEFT JOIN clause to the query using the Event relation
 * @method EventProfileGroupQuery rightJoinEvent($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Event relation
 * @method EventProfileGroupQuery innerJoinEvent($relationAlias = null) Adds a INNER JOIN clause to the query using the Event relation
 *
 * @method EventProfileGroup findOne(PropelPDO $con = null) Return the first EventProfileGroup matching the query
 * @method EventProfileGroup findOneOrCreate(PropelPDO $con = null) Return the first EventProfileGroup matching the query, or a new EventProfileGroup object populated from the query conditions when no match is found
 *
 * @method EventProfileGroup findOneByEventId(int $event_id) Return the first EventProfileGroup filtered by the event_id column
 * @method EventProfileGroup findOneByProfileGroupId(int $profile_group_id) Return the first EventProfileGroup filtered by the profile_group_id column
 *
 * @method array findByEventId(int $event_id) Return EventProfileGroup objects filtered by the event_id column
 * @method array findByProfileGroupId(int $profile_group_id) Return EventProfileGroup objects filtered by the profile_group_id column
 *
 * @package    propel.generator.atica.om
 */
abstract class BaseEventProfileGroupQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseEventProfileGroupQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'atica', $modelName = 'EventProfileGroup', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new EventProfileGroupQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     EventProfileGroupQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return EventProfileGroupQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof EventProfileGroupQuery) {
            return $criteria;
        }
        $query = new EventProfileGroupQuery();
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
                         A Primary key composition: [$event_id, $profile_group_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   EventProfileGroup|EventProfileGroup[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = EventProfileGroupPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(EventProfileGroupPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   EventProfileGroup A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `EVENT_ID`, `PROFILE_GROUP_ID` FROM `event_profile_group` WHERE `EVENT_ID` = :p0 AND `PROFILE_GROUP_ID` = :p1';
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
            $obj = new EventProfileGroup();
            $obj->hydrate($row);
            EventProfileGroupPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return EventProfileGroup|EventProfileGroup[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|EventProfileGroup[]|mixed the list of results, formatted by the current formatter
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
     * @return EventProfileGroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(EventProfileGroupPeer::EVENT_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(EventProfileGroupPeer::PROFILE_GROUP_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return EventProfileGroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(EventProfileGroupPeer::EVENT_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(EventProfileGroupPeer::PROFILE_GROUP_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the event_id column
     *
     * Example usage:
     * <code>
     * $query->filterByEventId(1234); // WHERE event_id = 1234
     * $query->filterByEventId(array(12, 34)); // WHERE event_id IN (12, 34)
     * $query->filterByEventId(array('min' => 12)); // WHERE event_id > 12
     * </code>
     *
     * @see       filterByEvent()
     *
     * @param     mixed $eventId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventProfileGroupQuery The current query, for fluid interface
     */
    public function filterByEventId($eventId = null, $comparison = null)
    {
        if (is_array($eventId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(EventProfileGroupPeer::EVENT_ID, $eventId, $comparison);
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
     * @return EventProfileGroupQuery The current query, for fluid interface
     */
    public function filterByProfileGroupId($profileGroupId = null, $comparison = null)
    {
        if (is_array($profileGroupId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(EventProfileGroupPeer::PROFILE_GROUP_ID, $profileGroupId, $comparison);
    }

    /**
     * Filter the query by a related ProfileGroup object
     *
     * @param   ProfileGroup|PropelObjectCollection $profileGroup The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   EventProfileGroupQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByProfileGroup($profileGroup, $comparison = null)
    {
        if ($profileGroup instanceof ProfileGroup) {
            return $this
                ->addUsingAlias(EventProfileGroupPeer::PROFILE_GROUP_ID, $profileGroup->getId(), $comparison);
        } elseif ($profileGroup instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EventProfileGroupPeer::PROFILE_GROUP_ID, $profileGroup->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return EventProfileGroupQuery The current query, for fluid interface
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
     * Filter the query by a related Event object
     *
     * @param   Event|PropelObjectCollection $event The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   EventProfileGroupQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByEvent($event, $comparison = null)
    {
        if ($event instanceof Event) {
            return $this
                ->addUsingAlias(EventProfileGroupPeer::EVENT_ID, $event->getId(), $comparison);
        } elseif ($event instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EventProfileGroupPeer::EVENT_ID, $event->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return EventProfileGroupQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   EventProfileGroup $eventProfileGroup Object to remove from the list of results
     *
     * @return EventProfileGroupQuery The current query, for fluid interface
     */
    public function prune($eventProfileGroup = null)
    {
        if ($eventProfileGroup) {
            $this->addCond('pruneCond0', $this->getAliasedColName(EventProfileGroupPeer::EVENT_ID), $eventProfileGroup->getEventId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(EventProfileGroupPeer::PROFILE_GROUP_ID), $eventProfileGroup->getProfileGroupId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
