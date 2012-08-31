<?php


/**
 * Base class that represents a query for the 'non_conformance_type' table.
 *
 *
 *
 * @method NonConformanceTypeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method NonConformanceTypeQuery orderByDisplayName($order = Criteria::ASC) Order by the display_name column
 * @method NonConformanceTypeQuery orderByDescription($order = Criteria::ASC) Order by the description column
 *
 * @method NonConformanceTypeQuery groupById() Group by the id column
 * @method NonConformanceTypeQuery groupByDisplayName() Group by the display_name column
 * @method NonConformanceTypeQuery groupByDescription() Group by the description column
 *
 * @method NonConformanceTypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method NonConformanceTypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method NonConformanceTypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method NonConformanceTypeQuery leftJoinNonConformance($relationAlias = null) Adds a LEFT JOIN clause to the query using the NonConformance relation
 * @method NonConformanceTypeQuery rightJoinNonConformance($relationAlias = null) Adds a RIGHT JOIN clause to the query using the NonConformance relation
 * @method NonConformanceTypeQuery innerJoinNonConformance($relationAlias = null) Adds a INNER JOIN clause to the query using the NonConformance relation
 *
 * @method NonConformanceType findOne(PropelPDO $con = null) Return the first NonConformanceType matching the query
 * @method NonConformanceType findOneOrCreate(PropelPDO $con = null) Return the first NonConformanceType matching the query, or a new NonConformanceType object populated from the query conditions when no match is found
 *
 * @method NonConformanceType findOneByDisplayName(string $display_name) Return the first NonConformanceType filtered by the display_name column
 * @method NonConformanceType findOneByDescription(string $description) Return the first NonConformanceType filtered by the description column
 *
 * @method array findById(int $id) Return NonConformanceType objects filtered by the id column
 * @method array findByDisplayName(string $display_name) Return NonConformanceType objects filtered by the display_name column
 * @method array findByDescription(string $description) Return NonConformanceType objects filtered by the description column
 *
 * @package    propel.generator.atica.om
 */
abstract class BaseNonConformanceTypeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseNonConformanceTypeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'atica', $modelName = 'NonConformanceType', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new NonConformanceTypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     NonConformanceTypeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return NonConformanceTypeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof NonConformanceTypeQuery) {
            return $criteria;
        }
        $query = new NonConformanceTypeQuery();
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
     * @return   NonConformanceType|NonConformanceType[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = NonConformanceTypePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(NonConformanceTypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   NonConformanceType A model object, or null if the key is not found
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
     * @return   NonConformanceType A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `DISPLAY_NAME`, `DESCRIPTION` FROM `non_conformance_type` WHERE `ID` = :p0';
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
            $obj = new NonConformanceType();
            $obj->hydrate($row);
            NonConformanceTypePeer::addInstanceToPool($obj, (string) $key);
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
     * @return NonConformanceType|NonConformanceType[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|NonConformanceType[]|mixed the list of results, formatted by the current formatter
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
     * @return NonConformanceTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(NonConformanceTypePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return NonConformanceTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(NonConformanceTypePeer::ID, $keys, Criteria::IN);
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
     * @return NonConformanceTypeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(NonConformanceTypePeer::ID, $id, $comparison);
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
     * @return NonConformanceTypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(NonConformanceTypePeer::DISPLAY_NAME, $displayName, $comparison);
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
     * @return NonConformanceTypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(NonConformanceTypePeer::DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query by a related NonConformance object
     *
     * @param   NonConformance|PropelObjectCollection $nonConformance  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   NonConformanceTypeQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByNonConformance($nonConformance, $comparison = null)
    {
        if ($nonConformance instanceof NonConformance) {
            return $this
                ->addUsingAlias(NonConformanceTypePeer::ID, $nonConformance->getNonConformanceTypeId(), $comparison);
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
     * @return NonConformanceTypeQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   NonConformanceType $nonConformanceType Object to remove from the list of results
     *
     * @return NonConformanceTypeQuery The current query, for fluid interface
     */
    public function prune($nonConformanceType = null)
    {
        if ($nonConformanceType) {
            $this->addUsingAlias(NonConformanceTypePeer::ID, $nonConformanceType->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
