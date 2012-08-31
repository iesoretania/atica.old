<?php


/**
 * Base class that represents a query for the 'action' table.
 *
 *
 *
 * @method ActionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ActionQuery orderBySnapshotId($order = Criteria::ASC) Order by the snapshot_id column
 * @method ActionQuery orderByActionTypeId($order = Criteria::ASC) Order by the action_type_id column
 * @method ActionQuery orderByNonConformanceId($order = Criteria::ASC) Order by the non_conformance_id column
 * @method ActionQuery orderByActionLeft($order = Criteria::ASC) Order by the action_left column
 * @method ActionQuery orderByActionRight($order = Criteria::ASC) Order by the action_right column
 * @method ActionQuery orderByActionLevel($order = Criteria::ASC) Order by the action_level column
 * @method ActionQuery orderByDisplayName($order = Criteria::ASC) Order by the display_name column
 * @method ActionQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method ActionQuery orderByCheckDue($order = Criteria::ASC) Order by the check_due column
 * @method ActionQuery orderByCheckedAt($order = Criteria::ASC) Order by the checked_at column
 * @method ActionQuery orderByResult($order = Criteria::ASC) Order by the result column
 * @method ActionQuery orderByResultDescription($order = Criteria::ASC) Order by the result_description column
 *
 * @method ActionQuery groupById() Group by the id column
 * @method ActionQuery groupBySnapshotId() Group by the snapshot_id column
 * @method ActionQuery groupByActionTypeId() Group by the action_type_id column
 * @method ActionQuery groupByNonConformanceId() Group by the non_conformance_id column
 * @method ActionQuery groupByActionLeft() Group by the action_left column
 * @method ActionQuery groupByActionRight() Group by the action_right column
 * @method ActionQuery groupByActionLevel() Group by the action_level column
 * @method ActionQuery groupByDisplayName() Group by the display_name column
 * @method ActionQuery groupByDescription() Group by the description column
 * @method ActionQuery groupByCheckDue() Group by the check_due column
 * @method ActionQuery groupByCheckedAt() Group by the checked_at column
 * @method ActionQuery groupByResult() Group by the result column
 * @method ActionQuery groupByResultDescription() Group by the result_description column
 *
 * @method ActionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ActionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ActionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ActionQuery leftJoinActionType($relationAlias = null) Adds a LEFT JOIN clause to the query using the ActionType relation
 * @method ActionQuery rightJoinActionType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ActionType relation
 * @method ActionQuery innerJoinActionType($relationAlias = null) Adds a INNER JOIN clause to the query using the ActionType relation
 *
 * @method ActionQuery leftJoinNonConformance($relationAlias = null) Adds a LEFT JOIN clause to the query using the NonConformance relation
 * @method ActionQuery rightJoinNonConformance($relationAlias = null) Adds a RIGHT JOIN clause to the query using the NonConformance relation
 * @method ActionQuery innerJoinNonConformance($relationAlias = null) Adds a INNER JOIN clause to the query using the NonConformance relation
 *
 * @method ActionQuery leftJoinSnapshot($relationAlias = null) Adds a LEFT JOIN clause to the query using the Snapshot relation
 * @method ActionQuery rightJoinSnapshot($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Snapshot relation
 * @method ActionQuery innerJoinSnapshot($relationAlias = null) Adds a INNER JOIN clause to the query using the Snapshot relation
 *
 * @method Action findOne(PropelPDO $con = null) Return the first Action matching the query
 * @method Action findOneOrCreate(PropelPDO $con = null) Return the first Action matching the query, or a new Action object populated from the query conditions when no match is found
 *
 * @method Action findOneBySnapshotId(int $snapshot_id) Return the first Action filtered by the snapshot_id column
 * @method Action findOneByActionTypeId(int $action_type_id) Return the first Action filtered by the action_type_id column
 * @method Action findOneByNonConformanceId(int $non_conformance_id) Return the first Action filtered by the non_conformance_id column
 * @method Action findOneByActionLeft(int $action_left) Return the first Action filtered by the action_left column
 * @method Action findOneByActionRight(int $action_right) Return the first Action filtered by the action_right column
 * @method Action findOneByActionLevel(int $action_level) Return the first Action filtered by the action_level column
 * @method Action findOneByDisplayName(string $display_name) Return the first Action filtered by the display_name column
 * @method Action findOneByDescription(string $description) Return the first Action filtered by the description column
 * @method Action findOneByCheckDue(string $check_due) Return the first Action filtered by the check_due column
 * @method Action findOneByCheckedAt(string $checked_at) Return the first Action filtered by the checked_at column
 * @method Action findOneByResult(int $result) Return the first Action filtered by the result column
 * @method Action findOneByResultDescription(string $result_description) Return the first Action filtered by the result_description column
 *
 * @method array findById(int $id) Return Action objects filtered by the id column
 * @method array findBySnapshotId(int $snapshot_id) Return Action objects filtered by the snapshot_id column
 * @method array findByActionTypeId(int $action_type_id) Return Action objects filtered by the action_type_id column
 * @method array findByNonConformanceId(int $non_conformance_id) Return Action objects filtered by the non_conformance_id column
 * @method array findByActionLeft(int $action_left) Return Action objects filtered by the action_left column
 * @method array findByActionRight(int $action_right) Return Action objects filtered by the action_right column
 * @method array findByActionLevel(int $action_level) Return Action objects filtered by the action_level column
 * @method array findByDisplayName(string $display_name) Return Action objects filtered by the display_name column
 * @method array findByDescription(string $description) Return Action objects filtered by the description column
 * @method array findByCheckDue(string $check_due) Return Action objects filtered by the check_due column
 * @method array findByCheckedAt(string $checked_at) Return Action objects filtered by the checked_at column
 * @method array findByResult(int $result) Return Action objects filtered by the result column
 * @method array findByResultDescription(string $result_description) Return Action objects filtered by the result_description column
 *
 * @package    propel.generator.atica.om
 */
abstract class BaseActionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseActionQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'atica', $modelName = 'Action', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ActionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     ActionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ActionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ActionQuery) {
            return $criteria;
        }
        $query = new ActionQuery();
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
     * @return   Action|Action[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ActionPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ActionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Action A model object, or null if the key is not found
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
     * @return   Action A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `SNAPSHOT_ID`, `ACTION_TYPE_ID`, `NON_CONFORMANCE_ID`, `ACTION_LEFT`, `ACTION_RIGHT`, `ACTION_LEVEL`, `DISPLAY_NAME`, `DESCRIPTION`, `CHECK_DUE`, `CHECKED_AT`, `RESULT`, `RESULT_DESCRIPTION` FROM `action` WHERE `ID` = :p0';
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
            $obj = new Action();
            $obj->hydrate($row);
            ActionPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Action|Action[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Action[]|mixed the list of results, formatted by the current formatter
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
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ActionPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ActionPeer::ID, $keys, Criteria::IN);
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
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(ActionPeer::ID, $id, $comparison);
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
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterBySnapshotId($snapshotId = null, $comparison = null)
    {
        if (is_array($snapshotId)) {
            $useMinMax = false;
            if (isset($snapshotId['min'])) {
                $this->addUsingAlias(ActionPeer::SNAPSHOT_ID, $snapshotId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($snapshotId['max'])) {
                $this->addUsingAlias(ActionPeer::SNAPSHOT_ID, $snapshotId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionPeer::SNAPSHOT_ID, $snapshotId, $comparison);
    }

    /**
     * Filter the query on the action_type_id column
     *
     * Example usage:
     * <code>
     * $query->filterByActionTypeId(1234); // WHERE action_type_id = 1234
     * $query->filterByActionTypeId(array(12, 34)); // WHERE action_type_id IN (12, 34)
     * $query->filterByActionTypeId(array('min' => 12)); // WHERE action_type_id > 12
     * </code>
     *
     * @see       filterByActionType()
     *
     * @param     mixed $actionTypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByActionTypeId($actionTypeId = null, $comparison = null)
    {
        if (is_array($actionTypeId)) {
            $useMinMax = false;
            if (isset($actionTypeId['min'])) {
                $this->addUsingAlias(ActionPeer::ACTION_TYPE_ID, $actionTypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($actionTypeId['max'])) {
                $this->addUsingAlias(ActionPeer::ACTION_TYPE_ID, $actionTypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionPeer::ACTION_TYPE_ID, $actionTypeId, $comparison);
    }

    /**
     * Filter the query on the non_conformance_id column
     *
     * Example usage:
     * <code>
     * $query->filterByNonConformanceId(1234); // WHERE non_conformance_id = 1234
     * $query->filterByNonConformanceId(array(12, 34)); // WHERE non_conformance_id IN (12, 34)
     * $query->filterByNonConformanceId(array('min' => 12)); // WHERE non_conformance_id > 12
     * </code>
     *
     * @see       filterByNonConformance()
     *
     * @param     mixed $nonConformanceId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByNonConformanceId($nonConformanceId = null, $comparison = null)
    {
        if (is_array($nonConformanceId)) {
            $useMinMax = false;
            if (isset($nonConformanceId['min'])) {
                $this->addUsingAlias(ActionPeer::NON_CONFORMANCE_ID, $nonConformanceId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nonConformanceId['max'])) {
                $this->addUsingAlias(ActionPeer::NON_CONFORMANCE_ID, $nonConformanceId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionPeer::NON_CONFORMANCE_ID, $nonConformanceId, $comparison);
    }

    /**
     * Filter the query on the action_left column
     *
     * Example usage:
     * <code>
     * $query->filterByActionLeft(1234); // WHERE action_left = 1234
     * $query->filterByActionLeft(array(12, 34)); // WHERE action_left IN (12, 34)
     * $query->filterByActionLeft(array('min' => 12)); // WHERE action_left > 12
     * </code>
     *
     * @param     mixed $actionLeft The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByActionLeft($actionLeft = null, $comparison = null)
    {
        if (is_array($actionLeft)) {
            $useMinMax = false;
            if (isset($actionLeft['min'])) {
                $this->addUsingAlias(ActionPeer::ACTION_LEFT, $actionLeft['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($actionLeft['max'])) {
                $this->addUsingAlias(ActionPeer::ACTION_LEFT, $actionLeft['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionPeer::ACTION_LEFT, $actionLeft, $comparison);
    }

    /**
     * Filter the query on the action_right column
     *
     * Example usage:
     * <code>
     * $query->filterByActionRight(1234); // WHERE action_right = 1234
     * $query->filterByActionRight(array(12, 34)); // WHERE action_right IN (12, 34)
     * $query->filterByActionRight(array('min' => 12)); // WHERE action_right > 12
     * </code>
     *
     * @param     mixed $actionRight The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByActionRight($actionRight = null, $comparison = null)
    {
        if (is_array($actionRight)) {
            $useMinMax = false;
            if (isset($actionRight['min'])) {
                $this->addUsingAlias(ActionPeer::ACTION_RIGHT, $actionRight['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($actionRight['max'])) {
                $this->addUsingAlias(ActionPeer::ACTION_RIGHT, $actionRight['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionPeer::ACTION_RIGHT, $actionRight, $comparison);
    }

    /**
     * Filter the query on the action_level column
     *
     * Example usage:
     * <code>
     * $query->filterByActionLevel(1234); // WHERE action_level = 1234
     * $query->filterByActionLevel(array(12, 34)); // WHERE action_level IN (12, 34)
     * $query->filterByActionLevel(array('min' => 12)); // WHERE action_level > 12
     * </code>
     *
     * @param     mixed $actionLevel The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByActionLevel($actionLevel = null, $comparison = null)
    {
        if (is_array($actionLevel)) {
            $useMinMax = false;
            if (isset($actionLevel['min'])) {
                $this->addUsingAlias(ActionPeer::ACTION_LEVEL, $actionLevel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($actionLevel['max'])) {
                $this->addUsingAlias(ActionPeer::ACTION_LEVEL, $actionLevel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionPeer::ACTION_LEVEL, $actionLevel, $comparison);
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
     * @return ActionQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ActionPeer::DISPLAY_NAME, $displayName, $comparison);
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
     * @return ActionQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ActionPeer::DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the check_due column
     *
     * Example usage:
     * <code>
     * $query->filterByCheckDue('2011-03-14'); // WHERE check_due = '2011-03-14'
     * $query->filterByCheckDue('now'); // WHERE check_due = '2011-03-14'
     * $query->filterByCheckDue(array('max' => 'yesterday')); // WHERE check_due > '2011-03-13'
     * </code>
     *
     * @param     mixed $checkDue The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByCheckDue($checkDue = null, $comparison = null)
    {
        if (is_array($checkDue)) {
            $useMinMax = false;
            if (isset($checkDue['min'])) {
                $this->addUsingAlias(ActionPeer::CHECK_DUE, $checkDue['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($checkDue['max'])) {
                $this->addUsingAlias(ActionPeer::CHECK_DUE, $checkDue['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionPeer::CHECK_DUE, $checkDue, $comparison);
    }

    /**
     * Filter the query on the checked_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCheckedAt('2011-03-14'); // WHERE checked_at = '2011-03-14'
     * $query->filterByCheckedAt('now'); // WHERE checked_at = '2011-03-14'
     * $query->filterByCheckedAt(array('max' => 'yesterday')); // WHERE checked_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $checkedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByCheckedAt($checkedAt = null, $comparison = null)
    {
        if (is_array($checkedAt)) {
            $useMinMax = false;
            if (isset($checkedAt['min'])) {
                $this->addUsingAlias(ActionPeer::CHECKED_AT, $checkedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($checkedAt['max'])) {
                $this->addUsingAlias(ActionPeer::CHECKED_AT, $checkedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionPeer::CHECKED_AT, $checkedAt, $comparison);
    }

    /**
     * Filter the query on the result column
     *
     * Example usage:
     * <code>
     * $query->filterByResult(1234); // WHERE result = 1234
     * $query->filterByResult(array(12, 34)); // WHERE result IN (12, 34)
     * $query->filterByResult(array('min' => 12)); // WHERE result > 12
     * </code>
     *
     * @param     mixed $result The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByResult($result = null, $comparison = null)
    {
        if (is_array($result)) {
            $useMinMax = false;
            if (isset($result['min'])) {
                $this->addUsingAlias(ActionPeer::RESULT, $result['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($result['max'])) {
                $this->addUsingAlias(ActionPeer::RESULT, $result['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionPeer::RESULT, $result, $comparison);
    }

    /**
     * Filter the query on the result_description column
     *
     * Example usage:
     * <code>
     * $query->filterByResultDescription('fooValue');   // WHERE result_description = 'fooValue'
     * $query->filterByResultDescription('%fooValue%'); // WHERE result_description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $resultDescription The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByResultDescription($resultDescription = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($resultDescription)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $resultDescription)) {
                $resultDescription = str_replace('*', '%', $resultDescription);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ActionPeer::RESULT_DESCRIPTION, $resultDescription, $comparison);
    }

    /**
     * Filter the query by a related ActionType object
     *
     * @param   ActionType|PropelObjectCollection $actionType The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ActionQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByActionType($actionType, $comparison = null)
    {
        if ($actionType instanceof ActionType) {
            return $this
                ->addUsingAlias(ActionPeer::ACTION_TYPE_ID, $actionType->getId(), $comparison);
        } elseif ($actionType instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ActionPeer::ACTION_TYPE_ID, $actionType->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByActionType() only accepts arguments of type ActionType or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ActionType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ActionQuery The current query, for fluid interface
     */
    public function joinActionType($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ActionType');

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
            $this->addJoinObject($join, 'ActionType');
        }

        return $this;
    }

    /**
     * Use the ActionType relation ActionType object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ActionTypeQuery A secondary query class using the current class as primary query
     */
    public function useActionTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinActionType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ActionType', 'ActionTypeQuery');
    }

    /**
     * Filter the query by a related NonConformance object
     *
     * @param   NonConformance|PropelObjectCollection $nonConformance The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ActionQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByNonConformance($nonConformance, $comparison = null)
    {
        if ($nonConformance instanceof NonConformance) {
            return $this
                ->addUsingAlias(ActionPeer::NON_CONFORMANCE_ID, $nonConformance->getId(), $comparison);
        } elseif ($nonConformance instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ActionPeer::NON_CONFORMANCE_ID, $nonConformance->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return ActionQuery The current query, for fluid interface
     */
    public function joinNonConformance($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useNonConformanceQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinNonConformance($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'NonConformance', 'NonConformanceQuery');
    }

    /**
     * Filter the query by a related Snapshot object
     *
     * @param   Snapshot|PropelObjectCollection $snapshot The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ActionQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBySnapshot($snapshot, $comparison = null)
    {
        if ($snapshot instanceof Snapshot) {
            return $this
                ->addUsingAlias(ActionPeer::SNAPSHOT_ID, $snapshot->getId(), $comparison);
        } elseif ($snapshot instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ActionPeer::SNAPSHOT_ID, $snapshot->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return ActionQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   Action $action Object to remove from the list of results
     *
     * @return ActionQuery The current query, for fluid interface
     */
    public function prune($action = null)
    {
        if ($action) {
            $this->addUsingAlias(ActionPeer::ID, $action->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // nested_set behavior

    /**
     * Filter the query to restrict the result to root objects
     *
     * @return    ActionQuery The current query, for fluid interface
     */
    public function treeRoots()
    {
        return $this->addUsingAlias(ActionPeer::LEFT_COL, 1, Criteria::EQUAL);
    }

    /**
     * Returns the objects in a certain tree, from the tree scope
     *
     * @param     int $scope		Scope to determine which objects node to return
     *
     * @return    ActionQuery The current query, for fluid interface
     */
    public function inTree($scope = null)
    {
        return $this->addUsingAlias(ActionPeer::SCOPE_COL, $scope, Criteria::EQUAL);
    }

    /**
     * Filter the query to restrict the result to descendants of an object
     *
     * @param     Action $action The object to use for descendant search
     *
     * @return    ActionQuery The current query, for fluid interface
     */
    public function descendantsOf($action)
    {
        return $this
            ->inTree($action->getScopeValue())
            ->addUsingAlias(ActionPeer::LEFT_COL, $action->getLeftValue(), Criteria::GREATER_THAN)
            ->addUsingAlias(ActionPeer::LEFT_COL, $action->getRightValue(), Criteria::LESS_THAN);
    }

    /**
     * Filter the query to restrict the result to the branch of an object.
     * Same as descendantsOf(), except that it includes the object passed as parameter in the result
     *
     * @param     Action $action The object to use for branch search
     *
     * @return    ActionQuery The current query, for fluid interface
     */
    public function branchOf($action)
    {
        return $this
            ->inTree($action->getScopeValue())
            ->addUsingAlias(ActionPeer::LEFT_COL, $action->getLeftValue(), Criteria::GREATER_EQUAL)
            ->addUsingAlias(ActionPeer::LEFT_COL, $action->getRightValue(), Criteria::LESS_EQUAL);
    }

    /**
     * Filter the query to restrict the result to children of an object
     *
     * @param     Action $action The object to use for child search
     *
     * @return    ActionQuery The current query, for fluid interface
     */
    public function childrenOf($action)
    {
        return $this
            ->descendantsOf($action)
            ->addUsingAlias(ActionPeer::LEVEL_COL, $action->getLevel() + 1, Criteria::EQUAL);
    }

    /**
     * Filter the query to restrict the result to siblings of an object.
     * The result does not include the object passed as parameter.
     *
     * @param     Action $action The object to use for sibling search
     * @param      PropelPDO $con Connection to use.
     *
     * @return    ActionQuery The current query, for fluid interface
     */
    public function siblingsOf($action, PropelPDO $con = null)
    {
        if ($action->isRoot()) {
            return $this->
                add(ActionPeer::LEVEL_COL, '1<>1', Criteria::CUSTOM);
        } else {
            return $this
                ->childrenOf($action->getParent($con))
                ->prune($action);
        }
    }

    /**
     * Filter the query to restrict the result to ancestors of an object
     *
     * @param     Action $action The object to use for ancestors search
     *
     * @return    ActionQuery The current query, for fluid interface
     */
    public function ancestorsOf($action)
    {
        return $this
            ->inTree($action->getScopeValue())
            ->addUsingAlias(ActionPeer::LEFT_COL, $action->getLeftValue(), Criteria::LESS_THAN)
            ->addUsingAlias(ActionPeer::RIGHT_COL, $action->getRightValue(), Criteria::GREATER_THAN);
    }

    /**
     * Filter the query to restrict the result to roots of an object.
     * Same as ancestorsOf(), except that it includes the object passed as parameter in the result
     *
     * @param     Action $action The object to use for roots search
     *
     * @return    ActionQuery The current query, for fluid interface
     */
    public function rootsOf($action)
    {
        return $this
            ->inTree($action->getScopeValue())
            ->addUsingAlias(ActionPeer::LEFT_COL, $action->getLeftValue(), Criteria::LESS_EQUAL)
            ->addUsingAlias(ActionPeer::RIGHT_COL, $action->getRightValue(), Criteria::GREATER_EQUAL);
    }

    /**
     * Order the result by branch, i.e. natural tree order
     *
     * @param     bool $reverse if true, reverses the order
     *
     * @return    ActionQuery The current query, for fluid interface
     */
    public function orderByBranch($reverse = false)
    {
        if ($reverse) {
            return $this
                ->addDescendingOrderByColumn(ActionPeer::LEFT_COL);
        } else {
            return $this
                ->addAscendingOrderByColumn(ActionPeer::LEFT_COL);
        }
    }

    /**
     * Order the result by level, the closer to the root first
     *
     * @param     bool $reverse if true, reverses the order
     *
     * @return    ActionQuery The current query, for fluid interface
     */
    public function orderByLevel($reverse = false)
    {
        if ($reverse) {
            return $this
                ->addAscendingOrderByColumn(ActionPeer::RIGHT_COL);
        } else {
            return $this
                ->addDescendingOrderByColumn(ActionPeer::RIGHT_COL);
        }
    }

    /**
     * Returns a root node for the tree
     *
     * @param      int $scope		Scope to determine which root node to return
     * @param      PropelPDO $con	Connection to use.
     *
     * @return     Action The tree root object
     */
    public function findRoot($scope = null, $con = null)
    {
        return $this
            ->addUsingAlias(ActionPeer::LEFT_COL, 1, Criteria::EQUAL)
            ->inTree($scope)
            ->findOne($con);
    }

    /**
     * Returns the root objects for all trees.
     *
     * @param      PropelPDO $con	Connection to use.
     *
     * @return    mixed the list of results, formatted by the current formatter
     */
    public function findRoots($con = null)
    {
        return $this
            ->treeRoots()
            ->find($con);
    }

    /**
     * Returns a tree of objects
     *
     * @param      int $scope		Scope to determine which tree node to return
     * @param      PropelPDO $con	Connection to use.
     *
     * @return     mixed the list of results, formatted by the current formatter
     */
    public function findTree($scope = null, $con = null)
    {
        return $this
            ->inTree($scope)
            ->orderByBranch()
            ->find($con);
    }

}
