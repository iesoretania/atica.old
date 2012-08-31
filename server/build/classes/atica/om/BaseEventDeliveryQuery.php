<?php


/**
 * Base class that represents a query for the 'event_delivery' table.
 *
 *
 *
 * @method EventDeliveryQuery orderByEventId($order = Criteria::ASC) Order by the event_id column
 * @method EventDeliveryQuery orderByDeliveryId($order = Criteria::ASC) Order by the delivery_id column
 * @method EventDeliveryQuery orderByDescription($order = Criteria::ASC) Order by the description column
 *
 * @method EventDeliveryQuery groupByEventId() Group by the event_id column
 * @method EventDeliveryQuery groupByDeliveryId() Group by the delivery_id column
 * @method EventDeliveryQuery groupByDescription() Group by the description column
 *
 * @method EventDeliveryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method EventDeliveryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method EventDeliveryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method EventDeliveryQuery leftJoinDelivery($relationAlias = null) Adds a LEFT JOIN clause to the query using the Delivery relation
 * @method EventDeliveryQuery rightJoinDelivery($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Delivery relation
 * @method EventDeliveryQuery innerJoinDelivery($relationAlias = null) Adds a INNER JOIN clause to the query using the Delivery relation
 *
 * @method EventDeliveryQuery leftJoinEvent($relationAlias = null) Adds a LEFT JOIN clause to the query using the Event relation
 * @method EventDeliveryQuery rightJoinEvent($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Event relation
 * @method EventDeliveryQuery innerJoinEvent($relationAlias = null) Adds a INNER JOIN clause to the query using the Event relation
 *
 * @method EventDelivery findOne(PropelPDO $con = null) Return the first EventDelivery matching the query
 * @method EventDelivery findOneOrCreate(PropelPDO $con = null) Return the first EventDelivery matching the query, or a new EventDelivery object populated from the query conditions when no match is found
 *
 * @method EventDelivery findOneByEventId(int $event_id) Return the first EventDelivery filtered by the event_id column
 * @method EventDelivery findOneByDeliveryId(int $delivery_id) Return the first EventDelivery filtered by the delivery_id column
 * @method EventDelivery findOneByDescription(string $description) Return the first EventDelivery filtered by the description column
 *
 * @method array findByEventId(int $event_id) Return EventDelivery objects filtered by the event_id column
 * @method array findByDeliveryId(int $delivery_id) Return EventDelivery objects filtered by the delivery_id column
 * @method array findByDescription(string $description) Return EventDelivery objects filtered by the description column
 *
 * @package    propel.generator.atica.om
 */
abstract class BaseEventDeliveryQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseEventDeliveryQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'atica', $modelName = 'EventDelivery', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new EventDeliveryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     EventDeliveryQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return EventDeliveryQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof EventDeliveryQuery) {
            return $criteria;
        }
        $query = new EventDeliveryQuery();
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
                         A Primary key composition: [$event_id, $delivery_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   EventDelivery|EventDelivery[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = EventDeliveryPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(EventDeliveryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   EventDelivery A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `EVENT_ID`, `DELIVERY_ID`, `DESCRIPTION` FROM `event_delivery` WHERE `EVENT_ID` = :p0 AND `DELIVERY_ID` = :p1';
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
            $obj = new EventDelivery();
            $obj->hydrate($row);
            EventDeliveryPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return EventDelivery|EventDelivery[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|EventDelivery[]|mixed the list of results, formatted by the current formatter
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
     * @return EventDeliveryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(EventDeliveryPeer::EVENT_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(EventDeliveryPeer::DELIVERY_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return EventDeliveryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(EventDeliveryPeer::EVENT_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(EventDeliveryPeer::DELIVERY_ID, $key[1], Criteria::EQUAL);
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
     * @return EventDeliveryQuery The current query, for fluid interface
     */
    public function filterByEventId($eventId = null, $comparison = null)
    {
        if (is_array($eventId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(EventDeliveryPeer::EVENT_ID, $eventId, $comparison);
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
     * @return EventDeliveryQuery The current query, for fluid interface
     */
    public function filterByDeliveryId($deliveryId = null, $comparison = null)
    {
        if (is_array($deliveryId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(EventDeliveryPeer::DELIVERY_ID, $deliveryId, $comparison);
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
     * @return EventDeliveryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(EventDeliveryPeer::DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query by a related Delivery object
     *
     * @param   Delivery|PropelObjectCollection $delivery The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   EventDeliveryQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByDelivery($delivery, $comparison = null)
    {
        if ($delivery instanceof Delivery) {
            return $this
                ->addUsingAlias(EventDeliveryPeer::DELIVERY_ID, $delivery->getId(), $comparison);
        } elseif ($delivery instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EventDeliveryPeer::DELIVERY_ID, $delivery->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return EventDeliveryQuery The current query, for fluid interface
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
     * @param   Event|PropelObjectCollection $event The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   EventDeliveryQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByEvent($event, $comparison = null)
    {
        if ($event instanceof Event) {
            return $this
                ->addUsingAlias(EventDeliveryPeer::EVENT_ID, $event->getId(), $comparison);
        } elseif ($event instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EventDeliveryPeer::EVENT_ID, $event->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return EventDeliveryQuery The current query, for fluid interface
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
     * @param   EventDelivery $eventDelivery Object to remove from the list of results
     *
     * @return EventDeliveryQuery The current query, for fluid interface
     */
    public function prune($eventDelivery = null)
    {
        if ($eventDelivery) {
            $this->addCond('pruneCond0', $this->getAliasedColName(EventDeliveryPeer::EVENT_ID), $eventDelivery->getEventId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(EventDeliveryPeer::DELIVERY_ID), $eventDelivery->getDeliveryId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
