<?php


/**
 * Base class that represents a query for the 'event' table.
 *
 *
 *
 * @method EventQuery orderById($order = Criteria::ASC) Order by the id column
 * @method EventQuery orderBySnapshotId($order = Criteria::ASC) Order by the snapshot_id column
 * @method EventQuery orderByDisplayName($order = Criteria::ASC) Order by the display_name column
 * @method EventQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method EventQuery orderByFromWeek($order = Criteria::ASC) Order by the from_week column
 * @method EventQuery orderByDuration($order = Criteria::ASC) Order by the duration column
 * @method EventQuery orderByIsAutomatic($order = Criteria::ASC) Order by the is_automatic column
 * @method EventQuery orderByIsManual($order = Criteria::ASC) Order by the is_manual column
 * @method EventQuery orderByIsVisible($order = Criteria::ASC) Order by the is_visible column
 *
 * @method EventQuery groupById() Group by the id column
 * @method EventQuery groupBySnapshotId() Group by the snapshot_id column
 * @method EventQuery groupByDisplayName() Group by the display_name column
 * @method EventQuery groupByDescription() Group by the description column
 * @method EventQuery groupByFromWeek() Group by the from_week column
 * @method EventQuery groupByDuration() Group by the duration column
 * @method EventQuery groupByIsAutomatic() Group by the is_automatic column
 * @method EventQuery groupByIsManual() Group by the is_manual column
 * @method EventQuery groupByIsVisible() Group by the is_visible column
 *
 * @method EventQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method EventQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method EventQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method EventQuery leftJoinSnapshot($relationAlias = null) Adds a LEFT JOIN clause to the query using the Snapshot relation
 * @method EventQuery rightJoinSnapshot($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Snapshot relation
 * @method EventQuery innerJoinSnapshot($relationAlias = null) Adds a INNER JOIN clause to the query using the Snapshot relation
 *
 * @method EventQuery leftJoinCompletedEvent($relationAlias = null) Adds a LEFT JOIN clause to the query using the CompletedEvent relation
 * @method EventQuery rightJoinCompletedEvent($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CompletedEvent relation
 * @method EventQuery innerJoinCompletedEvent($relationAlias = null) Adds a INNER JOIN clause to the query using the CompletedEvent relation
 *
 * @method EventQuery leftJoinEventDelivery($relationAlias = null) Adds a LEFT JOIN clause to the query using the EventDelivery relation
 * @method EventQuery rightJoinEventDelivery($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EventDelivery relation
 * @method EventQuery innerJoinEventDelivery($relationAlias = null) Adds a INNER JOIN clause to the query using the EventDelivery relation
 *
 * @method EventQuery leftJoinEventFolder($relationAlias = null) Adds a LEFT JOIN clause to the query using the EventFolder relation
 * @method EventQuery rightJoinEventFolder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EventFolder relation
 * @method EventQuery innerJoinEventFolder($relationAlias = null) Adds a INNER JOIN clause to the query using the EventFolder relation
 *
 * @method EventQuery leftJoinActivityEvent($relationAlias = null) Adds a LEFT JOIN clause to the query using the ActivityEvent relation
 * @method EventQuery rightJoinActivityEvent($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ActivityEvent relation
 * @method EventQuery innerJoinActivityEvent($relationAlias = null) Adds a INNER JOIN clause to the query using the ActivityEvent relation
 *
 * @method EventQuery leftJoinEventProfileGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the EventProfileGroup relation
 * @method EventQuery rightJoinEventProfileGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EventProfileGroup relation
 * @method EventQuery innerJoinEventProfileGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the EventProfileGroup relation
 *
 * @method Event findOne(PropelPDO $con = null) Return the first Event matching the query
 * @method Event findOneOrCreate(PropelPDO $con = null) Return the first Event matching the query, or a new Event object populated from the query conditions when no match is found
 *
 * @method Event findOneBySnapshotId(int $snapshot_id) Return the first Event filtered by the snapshot_id column
 * @method Event findOneByDisplayName(string $display_name) Return the first Event filtered by the display_name column
 * @method Event findOneByDescription(string $description) Return the first Event filtered by the description column
 * @method Event findOneByFromWeek(int $from_week) Return the first Event filtered by the from_week column
 * @method Event findOneByDuration(int $duration) Return the first Event filtered by the duration column
 * @method Event findOneByIsAutomatic(boolean $is_automatic) Return the first Event filtered by the is_automatic column
 * @method Event findOneByIsManual(boolean $is_manual) Return the first Event filtered by the is_manual column
 * @method Event findOneByIsVisible(boolean $is_visible) Return the first Event filtered by the is_visible column
 *
 * @method array findById(int $id) Return Event objects filtered by the id column
 * @method array findBySnapshotId(int $snapshot_id) Return Event objects filtered by the snapshot_id column
 * @method array findByDisplayName(string $display_name) Return Event objects filtered by the display_name column
 * @method array findByDescription(string $description) Return Event objects filtered by the description column
 * @method array findByFromWeek(int $from_week) Return Event objects filtered by the from_week column
 * @method array findByDuration(int $duration) Return Event objects filtered by the duration column
 * @method array findByIsAutomatic(boolean $is_automatic) Return Event objects filtered by the is_automatic column
 * @method array findByIsManual(boolean $is_manual) Return Event objects filtered by the is_manual column
 * @method array findByIsVisible(boolean $is_visible) Return Event objects filtered by the is_visible column
 *
 * @package    propel.generator.atica.om
 */
abstract class BaseEventQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseEventQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'atica', $modelName = 'Event', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new EventQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     EventQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return EventQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof EventQuery) {
            return $criteria;
        }
        $query = new EventQuery();
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
     * @return   Event|Event[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = EventPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(EventPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Event A model object, or null if the key is not found
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
     * @return   Event A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `SNAPSHOT_ID`, `DISPLAY_NAME`, `DESCRIPTION`, `FROM_WEEK`, `DURATION`, `IS_AUTOMATIC`, `IS_MANUAL`, `IS_VISIBLE` FROM `event` WHERE `ID` = :p0';
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
            $obj = new Event();
            $obj->hydrate($row);
            EventPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Event|Event[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Event[]|mixed the list of results, formatted by the current formatter
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
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EventPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EventPeer::ID, $keys, Criteria::IN);
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
     * @return EventQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(EventPeer::ID, $id, $comparison);
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
     * @return EventQuery The current query, for fluid interface
     */
    public function filterBySnapshotId($snapshotId = null, $comparison = null)
    {
        if (is_array($snapshotId)) {
            $useMinMax = false;
            if (isset($snapshotId['min'])) {
                $this->addUsingAlias(EventPeer::SNAPSHOT_ID, $snapshotId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($snapshotId['max'])) {
                $this->addUsingAlias(EventPeer::SNAPSHOT_ID, $snapshotId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::SNAPSHOT_ID, $snapshotId, $comparison);
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
     * @return EventQuery The current query, for fluid interface
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

        return $this->addUsingAlias(EventPeer::DISPLAY_NAME, $displayName, $comparison);
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
     * @return EventQuery The current query, for fluid interface
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

        return $this->addUsingAlias(EventPeer::DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the from_week column
     *
     * Example usage:
     * <code>
     * $query->filterByFromWeek(1234); // WHERE from_week = 1234
     * $query->filterByFromWeek(array(12, 34)); // WHERE from_week IN (12, 34)
     * $query->filterByFromWeek(array('min' => 12)); // WHERE from_week > 12
     * </code>
     *
     * @param     mixed $fromWeek The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByFromWeek($fromWeek = null, $comparison = null)
    {
        if (is_array($fromWeek)) {
            $useMinMax = false;
            if (isset($fromWeek['min'])) {
                $this->addUsingAlias(EventPeer::FROM_WEEK, $fromWeek['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fromWeek['max'])) {
                $this->addUsingAlias(EventPeer::FROM_WEEK, $fromWeek['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::FROM_WEEK, $fromWeek, $comparison);
    }

    /**
     * Filter the query on the duration column
     *
     * Example usage:
     * <code>
     * $query->filterByDuration(1234); // WHERE duration = 1234
     * $query->filterByDuration(array(12, 34)); // WHERE duration IN (12, 34)
     * $query->filterByDuration(array('min' => 12)); // WHERE duration > 12
     * </code>
     *
     * @param     mixed $duration The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByDuration($duration = null, $comparison = null)
    {
        if (is_array($duration)) {
            $useMinMax = false;
            if (isset($duration['min'])) {
                $this->addUsingAlias(EventPeer::DURATION, $duration['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($duration['max'])) {
                $this->addUsingAlias(EventPeer::DURATION, $duration['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::DURATION, $duration, $comparison);
    }

    /**
     * Filter the query on the is_automatic column
     *
     * Example usage:
     * <code>
     * $query->filterByIsAutomatic(true); // WHERE is_automatic = true
     * $query->filterByIsAutomatic('yes'); // WHERE is_automatic = true
     * </code>
     *
     * @param     boolean|string $isAutomatic The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByIsAutomatic($isAutomatic = null, $comparison = null)
    {
        if (is_string($isAutomatic)) {
            $is_automatic = in_array(strtolower($isAutomatic), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EventPeer::IS_AUTOMATIC, $isAutomatic, $comparison);
    }

    /**
     * Filter the query on the is_manual column
     *
     * Example usage:
     * <code>
     * $query->filterByIsManual(true); // WHERE is_manual = true
     * $query->filterByIsManual('yes'); // WHERE is_manual = true
     * </code>
     *
     * @param     boolean|string $isManual The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByIsManual($isManual = null, $comparison = null)
    {
        if (is_string($isManual)) {
            $is_manual = in_array(strtolower($isManual), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EventPeer::IS_MANUAL, $isManual, $comparison);
    }

    /**
     * Filter the query on the is_visible column
     *
     * Example usage:
     * <code>
     * $query->filterByIsVisible(true); // WHERE is_visible = true
     * $query->filterByIsVisible('yes'); // WHERE is_visible = true
     * </code>
     *
     * @param     boolean|string $isVisible The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByIsVisible($isVisible = null, $comparison = null)
    {
        if (is_string($isVisible)) {
            $is_visible = in_array(strtolower($isVisible), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EventPeer::IS_VISIBLE, $isVisible, $comparison);
    }

    /**
     * Filter the query by a related Snapshot object
     *
     * @param   Snapshot|PropelObjectCollection $snapshot The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   EventQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBySnapshot($snapshot, $comparison = null)
    {
        if ($snapshot instanceof Snapshot) {
            return $this
                ->addUsingAlias(EventPeer::SNAPSHOT_ID, $snapshot->getId(), $comparison);
        } elseif ($snapshot instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EventPeer::SNAPSHOT_ID, $snapshot->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return EventQuery The current query, for fluid interface
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
     * Filter the query by a related CompletedEvent object
     *
     * @param   CompletedEvent|PropelObjectCollection $completedEvent  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   EventQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByCompletedEvent($completedEvent, $comparison = null)
    {
        if ($completedEvent instanceof CompletedEvent) {
            return $this
                ->addUsingAlias(EventPeer::ID, $completedEvent->getEventId(), $comparison);
        } elseif ($completedEvent instanceof PropelObjectCollection) {
            return $this
                ->useCompletedEventQuery()
                ->filterByPrimaryKeys($completedEvent->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCompletedEvent() only accepts arguments of type CompletedEvent or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CompletedEvent relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function joinCompletedEvent($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CompletedEvent');

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
            $this->addJoinObject($join, 'CompletedEvent');
        }

        return $this;
    }

    /**
     * Use the CompletedEvent relation CompletedEvent object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CompletedEventQuery A secondary query class using the current class as primary query
     */
    public function useCompletedEventQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCompletedEvent($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CompletedEvent', 'CompletedEventQuery');
    }

    /**
     * Filter the query by a related EventDelivery object
     *
     * @param   EventDelivery|PropelObjectCollection $eventDelivery  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   EventQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByEventDelivery($eventDelivery, $comparison = null)
    {
        if ($eventDelivery instanceof EventDelivery) {
            return $this
                ->addUsingAlias(EventPeer::ID, $eventDelivery->getEventId(), $comparison);
        } elseif ($eventDelivery instanceof PropelObjectCollection) {
            return $this
                ->useEventDeliveryQuery()
                ->filterByPrimaryKeys($eventDelivery->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEventDelivery() only accepts arguments of type EventDelivery or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EventDelivery relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function joinEventDelivery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EventDelivery');

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
            $this->addJoinObject($join, 'EventDelivery');
        }

        return $this;
    }

    /**
     * Use the EventDelivery relation EventDelivery object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   EventDeliveryQuery A secondary query class using the current class as primary query
     */
    public function useEventDeliveryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEventDelivery($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EventDelivery', 'EventDeliveryQuery');
    }

    /**
     * Filter the query by a related EventFolder object
     *
     * @param   EventFolder|PropelObjectCollection $eventFolder  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   EventQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByEventFolder($eventFolder, $comparison = null)
    {
        if ($eventFolder instanceof EventFolder) {
            return $this
                ->addUsingAlias(EventPeer::ID, $eventFolder->getEventId(), $comparison);
        } elseif ($eventFolder instanceof PropelObjectCollection) {
            return $this
                ->useEventFolderQuery()
                ->filterByPrimaryKeys($eventFolder->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEventFolder() only accepts arguments of type EventFolder or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EventFolder relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function joinEventFolder($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EventFolder');

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
            $this->addJoinObject($join, 'EventFolder');
        }

        return $this;
    }

    /**
     * Use the EventFolder relation EventFolder object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   EventFolderQuery A secondary query class using the current class as primary query
     */
    public function useEventFolderQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEventFolder($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EventFolder', 'EventFolderQuery');
    }

    /**
     * Filter the query by a related ActivityEvent object
     *
     * @param   ActivityEvent|PropelObjectCollection $activityEvent  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   EventQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByActivityEvent($activityEvent, $comparison = null)
    {
        if ($activityEvent instanceof ActivityEvent) {
            return $this
                ->addUsingAlias(EventPeer::ID, $activityEvent->getEventId(), $comparison);
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
     * @return EventQuery The current query, for fluid interface
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
     * Filter the query by a related EventProfileGroup object
     *
     * @param   EventProfileGroup|PropelObjectCollection $eventProfileGroup  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   EventQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByEventProfileGroup($eventProfileGroup, $comparison = null)
    {
        if ($eventProfileGroup instanceof EventProfileGroup) {
            return $this
                ->addUsingAlias(EventPeer::ID, $eventProfileGroup->getEventId(), $comparison);
        } elseif ($eventProfileGroup instanceof PropelObjectCollection) {
            return $this
                ->useEventProfileGroupQuery()
                ->filterByPrimaryKeys($eventProfileGroup->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEventProfileGroup() only accepts arguments of type EventProfileGroup or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EventProfileGroup relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function joinEventProfileGroup($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EventProfileGroup');

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
            $this->addJoinObject($join, 'EventProfileGroup');
        }

        return $this;
    }

    /**
     * Use the EventProfileGroup relation EventProfileGroup object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   EventProfileGroupQuery A secondary query class using the current class as primary query
     */
    public function useEventProfileGroupQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEventProfileGroup($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EventProfileGroup', 'EventProfileGroupQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Event $event Object to remove from the list of results
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function prune($event = null)
    {
        if ($event) {
            $this->addUsingAlias(EventPeer::ID, $event->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
