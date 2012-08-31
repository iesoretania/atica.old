<?php


/**
 * Base class that represents a query for the 'category' table.
 *
 *
 *
 * @method CategoryQuery orderById($order = Criteria::ASC) Order by the id column
 * @method CategoryQuery orderBySnapshotId($order = Criteria::ASC) Order by the snapshot_id column
 * @method CategoryQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method CategoryQuery orderByCategoryLeft($order = Criteria::ASC) Order by the category_left column
 * @method CategoryQuery orderByCategoryRight($order = Criteria::ASC) Order by the category_right column
 * @method CategoryQuery orderByCategoryLevel($order = Criteria::ASC) Order by the category_level column
 * @method CategoryQuery orderByDisplayName($order = Criteria::ASC) Order by the display_name column
 * @method CategoryQuery orderByDescription($order = Criteria::ASC) Order by the description column
 *
 * @method CategoryQuery groupById() Group by the id column
 * @method CategoryQuery groupBySnapshotId() Group by the snapshot_id column
 * @method CategoryQuery groupByCode() Group by the code column
 * @method CategoryQuery groupByCategoryLeft() Group by the category_left column
 * @method CategoryQuery groupByCategoryRight() Group by the category_right column
 * @method CategoryQuery groupByCategoryLevel() Group by the category_level column
 * @method CategoryQuery groupByDisplayName() Group by the display_name column
 * @method CategoryQuery groupByDescription() Group by the description column
 *
 * @method CategoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method CategoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method CategoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method CategoryQuery leftJoinSnapshot($relationAlias = null) Adds a LEFT JOIN clause to the query using the Snapshot relation
 * @method CategoryQuery rightJoinSnapshot($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Snapshot relation
 * @method CategoryQuery innerJoinSnapshot($relationAlias = null) Adds a INNER JOIN clause to the query using the Snapshot relation
 *
 * @method CategoryQuery leftJoinCategoryFolder($relationAlias = null) Adds a LEFT JOIN clause to the query using the CategoryFolder relation
 * @method CategoryQuery rightJoinCategoryFolder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CategoryFolder relation
 * @method CategoryQuery innerJoinCategoryFolder($relationAlias = null) Adds a INNER JOIN clause to the query using the CategoryFolder relation
 *
 * @method Category findOne(PropelPDO $con = null) Return the first Category matching the query
 * @method Category findOneOrCreate(PropelPDO $con = null) Return the first Category matching the query, or a new Category object populated from the query conditions when no match is found
 *
 * @method Category findOneBySnapshotId(int $snapshot_id) Return the first Category filtered by the snapshot_id column
 * @method Category findOneByCode(string $code) Return the first Category filtered by the code column
 * @method Category findOneByCategoryLeft(int $category_left) Return the first Category filtered by the category_left column
 * @method Category findOneByCategoryRight(int $category_right) Return the first Category filtered by the category_right column
 * @method Category findOneByCategoryLevel(int $category_level) Return the first Category filtered by the category_level column
 * @method Category findOneByDisplayName(string $display_name) Return the first Category filtered by the display_name column
 * @method Category findOneByDescription(string $description) Return the first Category filtered by the description column
 *
 * @method array findById(int $id) Return Category objects filtered by the id column
 * @method array findBySnapshotId(int $snapshot_id) Return Category objects filtered by the snapshot_id column
 * @method array findByCode(string $code) Return Category objects filtered by the code column
 * @method array findByCategoryLeft(int $category_left) Return Category objects filtered by the category_left column
 * @method array findByCategoryRight(int $category_right) Return Category objects filtered by the category_right column
 * @method array findByCategoryLevel(int $category_level) Return Category objects filtered by the category_level column
 * @method array findByDisplayName(string $display_name) Return Category objects filtered by the display_name column
 * @method array findByDescription(string $description) Return Category objects filtered by the description column
 *
 * @package    propel.generator.atica.om
 */
abstract class BaseCategoryQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseCategoryQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'atica', $modelName = 'Category', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new CategoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     CategoryQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return CategoryQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof CategoryQuery) {
            return $criteria;
        }
        $query = new CategoryQuery();
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
     * @return   Category|Category[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CategoryPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(CategoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Category A model object, or null if the key is not found
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
     * @return   Category A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `SNAPSHOT_ID`, `CODE`, `CATEGORY_LEFT`, `CATEGORY_RIGHT`, `CATEGORY_LEVEL`, `DISPLAY_NAME`, `DESCRIPTION` FROM `category` WHERE `ID` = :p0';
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
            $obj = new Category();
            $obj->hydrate($row);
            CategoryPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Category|Category[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Category[]|mixed the list of results, formatted by the current formatter
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
     * @return CategoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CategoryPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return CategoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CategoryPeer::ID, $keys, Criteria::IN);
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
     * @return CategoryQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(CategoryPeer::ID, $id, $comparison);
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
     * @return CategoryQuery The current query, for fluid interface
     */
    public function filterBySnapshotId($snapshotId = null, $comparison = null)
    {
        if (is_array($snapshotId)) {
            $useMinMax = false;
            if (isset($snapshotId['min'])) {
                $this->addUsingAlias(CategoryPeer::SNAPSHOT_ID, $snapshotId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($snapshotId['max'])) {
                $this->addUsingAlias(CategoryPeer::SNAPSHOT_ID, $snapshotId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryPeer::SNAPSHOT_ID, $snapshotId, $comparison);
    }

    /**
     * Filter the query on the code column
     *
     * Example usage:
     * <code>
     * $query->filterByCode('fooValue');   // WHERE code = 'fooValue'
     * $query->filterByCode('%fooValue%'); // WHERE code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $code The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CategoryQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($code)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $code)) {
                $code = str_replace('*', '%', $code);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CategoryPeer::CODE, $code, $comparison);
    }

    /**
     * Filter the query on the category_left column
     *
     * Example usage:
     * <code>
     * $query->filterByCategoryLeft(1234); // WHERE category_left = 1234
     * $query->filterByCategoryLeft(array(12, 34)); // WHERE category_left IN (12, 34)
     * $query->filterByCategoryLeft(array('min' => 12)); // WHERE category_left > 12
     * </code>
     *
     * @param     mixed $categoryLeft The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CategoryQuery The current query, for fluid interface
     */
    public function filterByCategoryLeft($categoryLeft = null, $comparison = null)
    {
        if (is_array($categoryLeft)) {
            $useMinMax = false;
            if (isset($categoryLeft['min'])) {
                $this->addUsingAlias(CategoryPeer::CATEGORY_LEFT, $categoryLeft['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($categoryLeft['max'])) {
                $this->addUsingAlias(CategoryPeer::CATEGORY_LEFT, $categoryLeft['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryPeer::CATEGORY_LEFT, $categoryLeft, $comparison);
    }

    /**
     * Filter the query on the category_right column
     *
     * Example usage:
     * <code>
     * $query->filterByCategoryRight(1234); // WHERE category_right = 1234
     * $query->filterByCategoryRight(array(12, 34)); // WHERE category_right IN (12, 34)
     * $query->filterByCategoryRight(array('min' => 12)); // WHERE category_right > 12
     * </code>
     *
     * @param     mixed $categoryRight The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CategoryQuery The current query, for fluid interface
     */
    public function filterByCategoryRight($categoryRight = null, $comparison = null)
    {
        if (is_array($categoryRight)) {
            $useMinMax = false;
            if (isset($categoryRight['min'])) {
                $this->addUsingAlias(CategoryPeer::CATEGORY_RIGHT, $categoryRight['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($categoryRight['max'])) {
                $this->addUsingAlias(CategoryPeer::CATEGORY_RIGHT, $categoryRight['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryPeer::CATEGORY_RIGHT, $categoryRight, $comparison);
    }

    /**
     * Filter the query on the category_level column
     *
     * Example usage:
     * <code>
     * $query->filterByCategoryLevel(1234); // WHERE category_level = 1234
     * $query->filterByCategoryLevel(array(12, 34)); // WHERE category_level IN (12, 34)
     * $query->filterByCategoryLevel(array('min' => 12)); // WHERE category_level > 12
     * </code>
     *
     * @param     mixed $categoryLevel The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CategoryQuery The current query, for fluid interface
     */
    public function filterByCategoryLevel($categoryLevel = null, $comparison = null)
    {
        if (is_array($categoryLevel)) {
            $useMinMax = false;
            if (isset($categoryLevel['min'])) {
                $this->addUsingAlias(CategoryPeer::CATEGORY_LEVEL, $categoryLevel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($categoryLevel['max'])) {
                $this->addUsingAlias(CategoryPeer::CATEGORY_LEVEL, $categoryLevel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryPeer::CATEGORY_LEVEL, $categoryLevel, $comparison);
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
     * @return CategoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(CategoryPeer::DISPLAY_NAME, $displayName, $comparison);
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
     * @return CategoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(CategoryPeer::DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query by a related Snapshot object
     *
     * @param   Snapshot|PropelObjectCollection $snapshot The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   CategoryQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBySnapshot($snapshot, $comparison = null)
    {
        if ($snapshot instanceof Snapshot) {
            return $this
                ->addUsingAlias(CategoryPeer::SNAPSHOT_ID, $snapshot->getId(), $comparison);
        } elseif ($snapshot instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CategoryPeer::SNAPSHOT_ID, $snapshot->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return CategoryQuery The current query, for fluid interface
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
     * Filter the query by a related CategoryFolder object
     *
     * @param   CategoryFolder|PropelObjectCollection $categoryFolder  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   CategoryQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByCategoryFolder($categoryFolder, $comparison = null)
    {
        if ($categoryFolder instanceof CategoryFolder) {
            return $this
                ->addUsingAlias(CategoryPeer::ID, $categoryFolder->getCategoryId(), $comparison);
        } elseif ($categoryFolder instanceof PropelObjectCollection) {
            return $this
                ->useCategoryFolderQuery()
                ->filterByPrimaryKeys($categoryFolder->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCategoryFolder() only accepts arguments of type CategoryFolder or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CategoryFolder relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CategoryQuery The current query, for fluid interface
     */
    public function joinCategoryFolder($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CategoryFolder');

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
            $this->addJoinObject($join, 'CategoryFolder');
        }

        return $this;
    }

    /**
     * Use the CategoryFolder relation CategoryFolder object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CategoryFolderQuery A secondary query class using the current class as primary query
     */
    public function useCategoryFolderQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCategoryFolder($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CategoryFolder', 'CategoryFolderQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Category $category Object to remove from the list of results
     *
     * @return CategoryQuery The current query, for fluid interface
     */
    public function prune($category = null)
    {
        if ($category) {
            $this->addUsingAlias(CategoryPeer::ID, $category->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // nested_set behavior

    /**
     * Filter the query to restrict the result to root objects
     *
     * @return    CategoryQuery The current query, for fluid interface
     */
    public function treeRoots()
    {
        return $this->addUsingAlias(CategoryPeer::LEFT_COL, 1, Criteria::EQUAL);
    }

    /**
     * Returns the objects in a certain tree, from the tree scope
     *
     * @param     int $scope		Scope to determine which objects node to return
     *
     * @return    CategoryQuery The current query, for fluid interface
     */
    public function inTree($scope = null)
    {
        return $this->addUsingAlias(CategoryPeer::SCOPE_COL, $scope, Criteria::EQUAL);
    }

    /**
     * Filter the query to restrict the result to descendants of an object
     *
     * @param     Category $category The object to use for descendant search
     *
     * @return    CategoryQuery The current query, for fluid interface
     */
    public function descendantsOf($category)
    {
        return $this
            ->inTree($category->getScopeValue())
            ->addUsingAlias(CategoryPeer::LEFT_COL, $category->getLeftValue(), Criteria::GREATER_THAN)
            ->addUsingAlias(CategoryPeer::LEFT_COL, $category->getRightValue(), Criteria::LESS_THAN);
    }

    /**
     * Filter the query to restrict the result to the branch of an object.
     * Same as descendantsOf(), except that it includes the object passed as parameter in the result
     *
     * @param     Category $category The object to use for branch search
     *
     * @return    CategoryQuery The current query, for fluid interface
     */
    public function branchOf($category)
    {
        return $this
            ->inTree($category->getScopeValue())
            ->addUsingAlias(CategoryPeer::LEFT_COL, $category->getLeftValue(), Criteria::GREATER_EQUAL)
            ->addUsingAlias(CategoryPeer::LEFT_COL, $category->getRightValue(), Criteria::LESS_EQUAL);
    }

    /**
     * Filter the query to restrict the result to children of an object
     *
     * @param     Category $category The object to use for child search
     *
     * @return    CategoryQuery The current query, for fluid interface
     */
    public function childrenOf($category)
    {
        return $this
            ->descendantsOf($category)
            ->addUsingAlias(CategoryPeer::LEVEL_COL, $category->getLevel() + 1, Criteria::EQUAL);
    }

    /**
     * Filter the query to restrict the result to siblings of an object.
     * The result does not include the object passed as parameter.
     *
     * @param     Category $category The object to use for sibling search
     * @param      PropelPDO $con Connection to use.
     *
     * @return    CategoryQuery The current query, for fluid interface
     */
    public function siblingsOf($category, PropelPDO $con = null)
    {
        if ($category->isRoot()) {
            return $this->
                add(CategoryPeer::LEVEL_COL, '1<>1', Criteria::CUSTOM);
        } else {
            return $this
                ->childrenOf($category->getParent($con))
                ->prune($category);
        }
    }

    /**
     * Filter the query to restrict the result to ancestors of an object
     *
     * @param     Category $category The object to use for ancestors search
     *
     * @return    CategoryQuery The current query, for fluid interface
     */
    public function ancestorsOf($category)
    {
        return $this
            ->inTree($category->getScopeValue())
            ->addUsingAlias(CategoryPeer::LEFT_COL, $category->getLeftValue(), Criteria::LESS_THAN)
            ->addUsingAlias(CategoryPeer::RIGHT_COL, $category->getRightValue(), Criteria::GREATER_THAN);
    }

    /**
     * Filter the query to restrict the result to roots of an object.
     * Same as ancestorsOf(), except that it includes the object passed as parameter in the result
     *
     * @param     Category $category The object to use for roots search
     *
     * @return    CategoryQuery The current query, for fluid interface
     */
    public function rootsOf($category)
    {
        return $this
            ->inTree($category->getScopeValue())
            ->addUsingAlias(CategoryPeer::LEFT_COL, $category->getLeftValue(), Criteria::LESS_EQUAL)
            ->addUsingAlias(CategoryPeer::RIGHT_COL, $category->getRightValue(), Criteria::GREATER_EQUAL);
    }

    /**
     * Order the result by branch, i.e. natural tree order
     *
     * @param     bool $reverse if true, reverses the order
     *
     * @return    CategoryQuery The current query, for fluid interface
     */
    public function orderByBranch($reverse = false)
    {
        if ($reverse) {
            return $this
                ->addDescendingOrderByColumn(CategoryPeer::LEFT_COL);
        } else {
            return $this
                ->addAscendingOrderByColumn(CategoryPeer::LEFT_COL);
        }
    }

    /**
     * Order the result by level, the closer to the root first
     *
     * @param     bool $reverse if true, reverses the order
     *
     * @return    CategoryQuery The current query, for fluid interface
     */
    public function orderByLevel($reverse = false)
    {
        if ($reverse) {
            return $this
                ->addAscendingOrderByColumn(CategoryPeer::RIGHT_COL);
        } else {
            return $this
                ->addDescendingOrderByColumn(CategoryPeer::RIGHT_COL);
        }
    }

    /**
     * Returns a root node for the tree
     *
     * @param      int $scope		Scope to determine which root node to return
     * @param      PropelPDO $con	Connection to use.
     *
     * @return     Category The tree root object
     */
    public function findRoot($scope = null, $con = null)
    {
        return $this
            ->addUsingAlias(CategoryPeer::LEFT_COL, 1, Criteria::EQUAL)
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
