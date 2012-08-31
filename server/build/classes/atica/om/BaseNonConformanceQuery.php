<?php


/**
 * Base class that represents a query for the 'non_conformance' table.
 *
 *
 *
 * @method NonConformanceQuery orderById($order = Criteria::ASC) Order by the id column
 * @method NonConformanceQuery orderBySnapshotId($order = Criteria::ASC) Order by the snapshot_id column
 * @method NonConformanceQuery orderByNonConformanceTypeId($order = Criteria::ASC) Order by the non_conformance_type_id column
 * @method NonConformanceQuery orderByNonConformityTypeDetail($order = Criteria::ASC) Order by the non_conformity_type_detail column
 * @method NonConformanceQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method NonConformanceQuery orderByOpenedAt($order = Criteria::ASC) Order by the opened_at column
 * @method NonConformanceQuery orderByOpenedBy($order = Criteria::ASC) Order by the opened_by column
 * @method NonConformanceQuery orderByClosedAt($order = Criteria::ASC) Order by the closed_at column
 * @method NonConformanceQuery orderByClosedBy($order = Criteria::ASC) Order by the closed_by column
 * @method NonConformanceQuery orderByCloseComment($order = Criteria::ASC) Order by the close_comment column
 *
 * @method NonConformanceQuery groupById() Group by the id column
 * @method NonConformanceQuery groupBySnapshotId() Group by the snapshot_id column
 * @method NonConformanceQuery groupByNonConformanceTypeId() Group by the non_conformance_type_id column
 * @method NonConformanceQuery groupByNonConformityTypeDetail() Group by the non_conformity_type_detail column
 * @method NonConformanceQuery groupByDescription() Group by the description column
 * @method NonConformanceQuery groupByOpenedAt() Group by the opened_at column
 * @method NonConformanceQuery groupByOpenedBy() Group by the opened_by column
 * @method NonConformanceQuery groupByClosedAt() Group by the closed_at column
 * @method NonConformanceQuery groupByClosedBy() Group by the closed_by column
 * @method NonConformanceQuery groupByCloseComment() Group by the close_comment column
 *
 * @method NonConformanceQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method NonConformanceQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method NonConformanceQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method NonConformanceQuery leftJoinPersonRelatedByClosedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the PersonRelatedByClosedBy relation
 * @method NonConformanceQuery rightJoinPersonRelatedByClosedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PersonRelatedByClosedBy relation
 * @method NonConformanceQuery innerJoinPersonRelatedByClosedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the PersonRelatedByClosedBy relation
 *
 * @method NonConformanceQuery leftJoinPersonRelatedByOpenedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the PersonRelatedByOpenedBy relation
 * @method NonConformanceQuery rightJoinPersonRelatedByOpenedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PersonRelatedByOpenedBy relation
 * @method NonConformanceQuery innerJoinPersonRelatedByOpenedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the PersonRelatedByOpenedBy relation
 *
 * @method NonConformanceQuery leftJoinSnapshot($relationAlias = null) Adds a LEFT JOIN clause to the query using the Snapshot relation
 * @method NonConformanceQuery rightJoinSnapshot($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Snapshot relation
 * @method NonConformanceQuery innerJoinSnapshot($relationAlias = null) Adds a INNER JOIN clause to the query using the Snapshot relation
 *
 * @method NonConformanceQuery leftJoinNonConformanceType($relationAlias = null) Adds a LEFT JOIN clause to the query using the NonConformanceType relation
 * @method NonConformanceQuery rightJoinNonConformanceType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the NonConformanceType relation
 * @method NonConformanceQuery innerJoinNonConformanceType($relationAlias = null) Adds a INNER JOIN clause to the query using the NonConformanceType relation
 *
 * @method NonConformanceQuery leftJoinAction($relationAlias = null) Adds a LEFT JOIN clause to the query using the Action relation
 * @method NonConformanceQuery rightJoinAction($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Action relation
 * @method NonConformanceQuery innerJoinAction($relationAlias = null) Adds a INNER JOIN clause to the query using the Action relation
 *
 * @method NonConformance findOne(PropelPDO $con = null) Return the first NonConformance matching the query
 * @method NonConformance findOneOrCreate(PropelPDO $con = null) Return the first NonConformance matching the query, or a new NonConformance object populated from the query conditions when no match is found
 *
 * @method NonConformance findOneBySnapshotId(int $snapshot_id) Return the first NonConformance filtered by the snapshot_id column
 * @method NonConformance findOneByNonConformanceTypeId(int $non_conformance_type_id) Return the first NonConformance filtered by the non_conformance_type_id column
 * @method NonConformance findOneByNonConformityTypeDetail(string $non_conformity_type_detail) Return the first NonConformance filtered by the non_conformity_type_detail column
 * @method NonConformance findOneByDescription(string $description) Return the first NonConformance filtered by the description column
 * @method NonConformance findOneByOpenedAt(string $opened_at) Return the first NonConformance filtered by the opened_at column
 * @method NonConformance findOneByOpenedBy(int $opened_by) Return the first NonConformance filtered by the opened_by column
 * @method NonConformance findOneByClosedAt(string $closed_at) Return the first NonConformance filtered by the closed_at column
 * @method NonConformance findOneByClosedBy(int $closed_by) Return the first NonConformance filtered by the closed_by column
 * @method NonConformance findOneByCloseComment(string $close_comment) Return the first NonConformance filtered by the close_comment column
 *
 * @method array findById(int $id) Return NonConformance objects filtered by the id column
 * @method array findBySnapshotId(int $snapshot_id) Return NonConformance objects filtered by the snapshot_id column
 * @method array findByNonConformanceTypeId(int $non_conformance_type_id) Return NonConformance objects filtered by the non_conformance_type_id column
 * @method array findByNonConformityTypeDetail(string $non_conformity_type_detail) Return NonConformance objects filtered by the non_conformity_type_detail column
 * @method array findByDescription(string $description) Return NonConformance objects filtered by the description column
 * @method array findByOpenedAt(string $opened_at) Return NonConformance objects filtered by the opened_at column
 * @method array findByOpenedBy(int $opened_by) Return NonConformance objects filtered by the opened_by column
 * @method array findByClosedAt(string $closed_at) Return NonConformance objects filtered by the closed_at column
 * @method array findByClosedBy(int $closed_by) Return NonConformance objects filtered by the closed_by column
 * @method array findByCloseComment(string $close_comment) Return NonConformance objects filtered by the close_comment column
 *
 * @package    propel.generator.atica.om
 */
abstract class BaseNonConformanceQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseNonConformanceQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'atica', $modelName = 'NonConformance', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new NonConformanceQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     NonConformanceQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return NonConformanceQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof NonConformanceQuery) {
            return $criteria;
        }
        $query = new NonConformanceQuery();
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
     * @return   NonConformance|NonConformance[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = NonConformancePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(NonConformancePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   NonConformance A model object, or null if the key is not found
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
     * @return   NonConformance A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `SNAPSHOT_ID`, `NON_CONFORMANCE_TYPE_ID`, `NON_CONFORMITY_TYPE_DETAIL`, `DESCRIPTION`, `OPENED_AT`, `OPENED_BY`, `CLOSED_AT`, `CLOSED_BY`, `CLOSE_COMMENT` FROM `non_conformance` WHERE `ID` = :p0';
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
            $obj = new NonConformance();
            $obj->hydrate($row);
            NonConformancePeer::addInstanceToPool($obj, (string) $key);
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
     * @return NonConformance|NonConformance[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|NonConformance[]|mixed the list of results, formatted by the current formatter
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
     * @return NonConformanceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(NonConformancePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return NonConformanceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(NonConformancePeer::ID, $keys, Criteria::IN);
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
     * @return NonConformanceQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(NonConformancePeer::ID, $id, $comparison);
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
     * @return NonConformanceQuery The current query, for fluid interface
     */
    public function filterBySnapshotId($snapshotId = null, $comparison = null)
    {
        if (is_array($snapshotId)) {
            $useMinMax = false;
            if (isset($snapshotId['min'])) {
                $this->addUsingAlias(NonConformancePeer::SNAPSHOT_ID, $snapshotId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($snapshotId['max'])) {
                $this->addUsingAlias(NonConformancePeer::SNAPSHOT_ID, $snapshotId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NonConformancePeer::SNAPSHOT_ID, $snapshotId, $comparison);
    }

    /**
     * Filter the query on the non_conformance_type_id column
     *
     * Example usage:
     * <code>
     * $query->filterByNonConformanceTypeId(1234); // WHERE non_conformance_type_id = 1234
     * $query->filterByNonConformanceTypeId(array(12, 34)); // WHERE non_conformance_type_id IN (12, 34)
     * $query->filterByNonConformanceTypeId(array('min' => 12)); // WHERE non_conformance_type_id > 12
     * </code>
     *
     * @see       filterByNonConformanceType()
     *
     * @param     mixed $nonConformanceTypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NonConformanceQuery The current query, for fluid interface
     */
    public function filterByNonConformanceTypeId($nonConformanceTypeId = null, $comparison = null)
    {
        if (is_array($nonConformanceTypeId)) {
            $useMinMax = false;
            if (isset($nonConformanceTypeId['min'])) {
                $this->addUsingAlias(NonConformancePeer::NON_CONFORMANCE_TYPE_ID, $nonConformanceTypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nonConformanceTypeId['max'])) {
                $this->addUsingAlias(NonConformancePeer::NON_CONFORMANCE_TYPE_ID, $nonConformanceTypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NonConformancePeer::NON_CONFORMANCE_TYPE_ID, $nonConformanceTypeId, $comparison);
    }

    /**
     * Filter the query on the non_conformity_type_detail column
     *
     * Example usage:
     * <code>
     * $query->filterByNonConformityTypeDetail('fooValue');   // WHERE non_conformity_type_detail = 'fooValue'
     * $query->filterByNonConformityTypeDetail('%fooValue%'); // WHERE non_conformity_type_detail LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nonConformityTypeDetail The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NonConformanceQuery The current query, for fluid interface
     */
    public function filterByNonConformityTypeDetail($nonConformityTypeDetail = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nonConformityTypeDetail)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nonConformityTypeDetail)) {
                $nonConformityTypeDetail = str_replace('*', '%', $nonConformityTypeDetail);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NonConformancePeer::NON_CONFORMITY_TYPE_DETAIL, $nonConformityTypeDetail, $comparison);
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
     * @return NonConformanceQuery The current query, for fluid interface
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

        return $this->addUsingAlias(NonConformancePeer::DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the opened_at column
     *
     * Example usage:
     * <code>
     * $query->filterByOpenedAt('2011-03-14'); // WHERE opened_at = '2011-03-14'
     * $query->filterByOpenedAt('now'); // WHERE opened_at = '2011-03-14'
     * $query->filterByOpenedAt(array('max' => 'yesterday')); // WHERE opened_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $openedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NonConformanceQuery The current query, for fluid interface
     */
    public function filterByOpenedAt($openedAt = null, $comparison = null)
    {
        if (is_array($openedAt)) {
            $useMinMax = false;
            if (isset($openedAt['min'])) {
                $this->addUsingAlias(NonConformancePeer::OPENED_AT, $openedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($openedAt['max'])) {
                $this->addUsingAlias(NonConformancePeer::OPENED_AT, $openedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NonConformancePeer::OPENED_AT, $openedAt, $comparison);
    }

    /**
     * Filter the query on the opened_by column
     *
     * Example usage:
     * <code>
     * $query->filterByOpenedBy(1234); // WHERE opened_by = 1234
     * $query->filterByOpenedBy(array(12, 34)); // WHERE opened_by IN (12, 34)
     * $query->filterByOpenedBy(array('min' => 12)); // WHERE opened_by > 12
     * </code>
     *
     * @see       filterByPersonRelatedByOpenedBy()
     *
     * @param     mixed $openedBy The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NonConformanceQuery The current query, for fluid interface
     */
    public function filterByOpenedBy($openedBy = null, $comparison = null)
    {
        if (is_array($openedBy)) {
            $useMinMax = false;
            if (isset($openedBy['min'])) {
                $this->addUsingAlias(NonConformancePeer::OPENED_BY, $openedBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($openedBy['max'])) {
                $this->addUsingAlias(NonConformancePeer::OPENED_BY, $openedBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NonConformancePeer::OPENED_BY, $openedBy, $comparison);
    }

    /**
     * Filter the query on the closed_at column
     *
     * Example usage:
     * <code>
     * $query->filterByClosedAt('2011-03-14'); // WHERE closed_at = '2011-03-14'
     * $query->filterByClosedAt('now'); // WHERE closed_at = '2011-03-14'
     * $query->filterByClosedAt(array('max' => 'yesterday')); // WHERE closed_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $closedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NonConformanceQuery The current query, for fluid interface
     */
    public function filterByClosedAt($closedAt = null, $comparison = null)
    {
        if (is_array($closedAt)) {
            $useMinMax = false;
            if (isset($closedAt['min'])) {
                $this->addUsingAlias(NonConformancePeer::CLOSED_AT, $closedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($closedAt['max'])) {
                $this->addUsingAlias(NonConformancePeer::CLOSED_AT, $closedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NonConformancePeer::CLOSED_AT, $closedAt, $comparison);
    }

    /**
     * Filter the query on the closed_by column
     *
     * Example usage:
     * <code>
     * $query->filterByClosedBy(1234); // WHERE closed_by = 1234
     * $query->filterByClosedBy(array(12, 34)); // WHERE closed_by IN (12, 34)
     * $query->filterByClosedBy(array('min' => 12)); // WHERE closed_by > 12
     * </code>
     *
     * @see       filterByPersonRelatedByClosedBy()
     *
     * @param     mixed $closedBy The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NonConformanceQuery The current query, for fluid interface
     */
    public function filterByClosedBy($closedBy = null, $comparison = null)
    {
        if (is_array($closedBy)) {
            $useMinMax = false;
            if (isset($closedBy['min'])) {
                $this->addUsingAlias(NonConformancePeer::CLOSED_BY, $closedBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($closedBy['max'])) {
                $this->addUsingAlias(NonConformancePeer::CLOSED_BY, $closedBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NonConformancePeer::CLOSED_BY, $closedBy, $comparison);
    }

    /**
     * Filter the query on the close_comment column
     *
     * Example usage:
     * <code>
     * $query->filterByCloseComment('fooValue');   // WHERE close_comment = 'fooValue'
     * $query->filterByCloseComment('%fooValue%'); // WHERE close_comment LIKE '%fooValue%'
     * </code>
     *
     * @param     string $closeComment The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NonConformanceQuery The current query, for fluid interface
     */
    public function filterByCloseComment($closeComment = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($closeComment)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $closeComment)) {
                $closeComment = str_replace('*', '%', $closeComment);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NonConformancePeer::CLOSE_COMMENT, $closeComment, $comparison);
    }

    /**
     * Filter the query by a related Person object
     *
     * @param   Person|PropelObjectCollection $person The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   NonConformanceQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByPersonRelatedByClosedBy($person, $comparison = null)
    {
        if ($person instanceof Person) {
            return $this
                ->addUsingAlias(NonConformancePeer::CLOSED_BY, $person->getId(), $comparison);
        } elseif ($person instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(NonConformancePeer::CLOSED_BY, $person->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByPersonRelatedByClosedBy() only accepts arguments of type Person or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PersonRelatedByClosedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return NonConformanceQuery The current query, for fluid interface
     */
    public function joinPersonRelatedByClosedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PersonRelatedByClosedBy');

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
            $this->addJoinObject($join, 'PersonRelatedByClosedBy');
        }

        return $this;
    }

    /**
     * Use the PersonRelatedByClosedBy relation Person object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   PersonQuery A secondary query class using the current class as primary query
     */
    public function usePersonRelatedByClosedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPersonRelatedByClosedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PersonRelatedByClosedBy', 'PersonQuery');
    }

    /**
     * Filter the query by a related Person object
     *
     * @param   Person|PropelObjectCollection $person The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   NonConformanceQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByPersonRelatedByOpenedBy($person, $comparison = null)
    {
        if ($person instanceof Person) {
            return $this
                ->addUsingAlias(NonConformancePeer::OPENED_BY, $person->getId(), $comparison);
        } elseif ($person instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(NonConformancePeer::OPENED_BY, $person->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByPersonRelatedByOpenedBy() only accepts arguments of type Person or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PersonRelatedByOpenedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return NonConformanceQuery The current query, for fluid interface
     */
    public function joinPersonRelatedByOpenedBy($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PersonRelatedByOpenedBy');

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
            $this->addJoinObject($join, 'PersonRelatedByOpenedBy');
        }

        return $this;
    }

    /**
     * Use the PersonRelatedByOpenedBy relation Person object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   PersonQuery A secondary query class using the current class as primary query
     */
    public function usePersonRelatedByOpenedByQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPersonRelatedByOpenedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PersonRelatedByOpenedBy', 'PersonQuery');
    }

    /**
     * Filter the query by a related Snapshot object
     *
     * @param   Snapshot|PropelObjectCollection $snapshot The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   NonConformanceQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBySnapshot($snapshot, $comparison = null)
    {
        if ($snapshot instanceof Snapshot) {
            return $this
                ->addUsingAlias(NonConformancePeer::SNAPSHOT_ID, $snapshot->getId(), $comparison);
        } elseif ($snapshot instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(NonConformancePeer::SNAPSHOT_ID, $snapshot->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return NonConformanceQuery The current query, for fluid interface
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
     * Filter the query by a related NonConformanceType object
     *
     * @param   NonConformanceType|PropelObjectCollection $nonConformanceType The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   NonConformanceQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByNonConformanceType($nonConformanceType, $comparison = null)
    {
        if ($nonConformanceType instanceof NonConformanceType) {
            return $this
                ->addUsingAlias(NonConformancePeer::NON_CONFORMANCE_TYPE_ID, $nonConformanceType->getId(), $comparison);
        } elseif ($nonConformanceType instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(NonConformancePeer::NON_CONFORMANCE_TYPE_ID, $nonConformanceType->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByNonConformanceType() only accepts arguments of type NonConformanceType or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the NonConformanceType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return NonConformanceQuery The current query, for fluid interface
     */
    public function joinNonConformanceType($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('NonConformanceType');

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
            $this->addJoinObject($join, 'NonConformanceType');
        }

        return $this;
    }

    /**
     * Use the NonConformanceType relation NonConformanceType object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   NonConformanceTypeQuery A secondary query class using the current class as primary query
     */
    public function useNonConformanceTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinNonConformanceType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'NonConformanceType', 'NonConformanceTypeQuery');
    }

    /**
     * Filter the query by a related Action object
     *
     * @param   Action|PropelObjectCollection $action  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   NonConformanceQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByAction($action, $comparison = null)
    {
        if ($action instanceof Action) {
            return $this
                ->addUsingAlias(NonConformancePeer::ID, $action->getNonConformanceId(), $comparison);
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
     * @return NonConformanceQuery The current query, for fluid interface
     */
    public function joinAction($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useActionQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinAction($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Action', 'ActionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   NonConformance $nonConformance Object to remove from the list of results
     *
     * @return NonConformanceQuery The current query, for fluid interface
     */
    public function prune($nonConformance = null)
    {
        if ($nonConformance) {
            $this->addUsingAlias(NonConformancePeer::ID, $nonConformance->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
