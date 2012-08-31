<?php


/**
 * Base class that represents a query for the 'profile_group' table.
 *
 *
 *
 * @method ProfileGroupQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ProfileGroupQuery orderBySnapshotId($order = Criteria::ASC) Order by the snapshot_id column
 * @method ProfileGroupQuery orderByDisplayNameMale($order = Criteria::ASC) Order by the display_name_male column
 * @method ProfileGroupQuery orderByDisplayNameFemale($order = Criteria::ASC) Order by the display_name_female column
 * @method ProfileGroupQuery orderByDisplayNameNeutral($order = Criteria::ASC) Order by the display_name_neutral column
 * @method ProfileGroupQuery orderByAbbreviation($order = Criteria::ASC) Order by the abbreviation column
 * @method ProfileGroupQuery orderByIsManager($order = Criteria::ASC) Order by the is_manager column
 * @method ProfileGroupQuery orderByDescription($order = Criteria::ASC) Order by the description column
 *
 * @method ProfileGroupQuery groupById() Group by the id column
 * @method ProfileGroupQuery groupBySnapshotId() Group by the snapshot_id column
 * @method ProfileGroupQuery groupByDisplayNameMale() Group by the display_name_male column
 * @method ProfileGroupQuery groupByDisplayNameFemale() Group by the display_name_female column
 * @method ProfileGroupQuery groupByDisplayNameNeutral() Group by the display_name_neutral column
 * @method ProfileGroupQuery groupByAbbreviation() Group by the abbreviation column
 * @method ProfileGroupQuery groupByIsManager() Group by the is_manager column
 * @method ProfileGroupQuery groupByDescription() Group by the description column
 *
 * @method ProfileGroupQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProfileGroupQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProfileGroupQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProfileGroupQuery leftJoinSnapshot($relationAlias = null) Adds a LEFT JOIN clause to the query using the Snapshot relation
 * @method ProfileGroupQuery rightJoinSnapshot($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Snapshot relation
 * @method ProfileGroupQuery innerJoinSnapshot($relationAlias = null) Adds a INNER JOIN clause to the query using the Snapshot relation
 *
 * @method ProfileGroupQuery leftJoinActivityProfileGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the ActivityProfileGroup relation
 * @method ProfileGroupQuery rightJoinActivityProfileGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ActivityProfileGroup relation
 * @method ProfileGroupQuery innerJoinActivityProfileGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the ActivityProfileGroup relation
 *
 * @method ProfileGroupQuery leftJoinProfile($relationAlias = null) Adds a LEFT JOIN clause to the query using the Profile relation
 * @method ProfileGroupQuery rightJoinProfile($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Profile relation
 * @method ProfileGroupQuery innerJoinProfile($relationAlias = null) Adds a INNER JOIN clause to the query using the Profile relation
 *
 * @method ProfileGroupQuery leftJoinGroupingProfileGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the GroupingProfileGroup relation
 * @method ProfileGroupQuery rightJoinGroupingProfileGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the GroupingProfileGroup relation
 * @method ProfileGroupQuery innerJoinGroupingProfileGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the GroupingProfileGroup relation
 *
 * @method ProfileGroupQuery leftJoinEventProfileGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the EventProfileGroup relation
 * @method ProfileGroupQuery rightJoinEventProfileGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EventProfileGroup relation
 * @method ProfileGroupQuery innerJoinEventProfileGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the EventProfileGroup relation
 *
 * @method ProfileGroupQuery leftJoinFolderPermission($relationAlias = null) Adds a LEFT JOIN clause to the query using the FolderPermission relation
 * @method ProfileGroupQuery rightJoinFolderPermission($relationAlias = null) Adds a RIGHT JOIN clause to the query using the FolderPermission relation
 * @method ProfileGroupQuery innerJoinFolderPermission($relationAlias = null) Adds a INNER JOIN clause to the query using the FolderPermission relation
 *
 * @method ProfileGroup findOne(PropelPDO $con = null) Return the first ProfileGroup matching the query
 * @method ProfileGroup findOneOrCreate(PropelPDO $con = null) Return the first ProfileGroup matching the query, or a new ProfileGroup object populated from the query conditions when no match is found
 *
 * @method ProfileGroup findOneBySnapshotId(int $snapshot_id) Return the first ProfileGroup filtered by the snapshot_id column
 * @method ProfileGroup findOneByDisplayNameMale(string $display_name_male) Return the first ProfileGroup filtered by the display_name_male column
 * @method ProfileGroup findOneByDisplayNameFemale(string $display_name_female) Return the first ProfileGroup filtered by the display_name_female column
 * @method ProfileGroup findOneByDisplayNameNeutral(string $display_name_neutral) Return the first ProfileGroup filtered by the display_name_neutral column
 * @method ProfileGroup findOneByAbbreviation(string $abbreviation) Return the first ProfileGroup filtered by the abbreviation column
 * @method ProfileGroup findOneByIsManager(boolean $is_manager) Return the first ProfileGroup filtered by the is_manager column
 * @method ProfileGroup findOneByDescription(string $description) Return the first ProfileGroup filtered by the description column
 *
 * @method array findById(int $id) Return ProfileGroup objects filtered by the id column
 * @method array findBySnapshotId(int $snapshot_id) Return ProfileGroup objects filtered by the snapshot_id column
 * @method array findByDisplayNameMale(string $display_name_male) Return ProfileGroup objects filtered by the display_name_male column
 * @method array findByDisplayNameFemale(string $display_name_female) Return ProfileGroup objects filtered by the display_name_female column
 * @method array findByDisplayNameNeutral(string $display_name_neutral) Return ProfileGroup objects filtered by the display_name_neutral column
 * @method array findByAbbreviation(string $abbreviation) Return ProfileGroup objects filtered by the abbreviation column
 * @method array findByIsManager(boolean $is_manager) Return ProfileGroup objects filtered by the is_manager column
 * @method array findByDescription(string $description) Return ProfileGroup objects filtered by the description column
 *
 * @package    propel.generator.atica.om
 */
abstract class BaseProfileGroupQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseProfileGroupQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'atica', $modelName = 'ProfileGroup', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProfileGroupQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     ProfileGroupQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProfileGroupQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProfileGroupQuery) {
            return $criteria;
        }
        $query = new ProfileGroupQuery();
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
     * @return   ProfileGroup|ProfileGroup[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProfileGroupPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProfileGroupPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   ProfileGroup A model object, or null if the key is not found
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
     * @return   ProfileGroup A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `SNAPSHOT_ID`, `DISPLAY_NAME_MALE`, `DISPLAY_NAME_FEMALE`, `DISPLAY_NAME_NEUTRAL`, `ABBREVIATION`, `IS_MANAGER`, `DESCRIPTION` FROM `profile_group` WHERE `ID` = :p0';
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
            $obj = new ProfileGroup();
            $obj->hydrate($row);
            ProfileGroupPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProfileGroup|ProfileGroup[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProfileGroup[]|mixed the list of results, formatted by the current formatter
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
     * @return ProfileGroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProfileGroupPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProfileGroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProfileGroupPeer::ID, $keys, Criteria::IN);
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
     * @return ProfileGroupQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(ProfileGroupPeer::ID, $id, $comparison);
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
     * @return ProfileGroupQuery The current query, for fluid interface
     */
    public function filterBySnapshotId($snapshotId = null, $comparison = null)
    {
        if (is_array($snapshotId)) {
            $useMinMax = false;
            if (isset($snapshotId['min'])) {
                $this->addUsingAlias(ProfileGroupPeer::SNAPSHOT_ID, $snapshotId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($snapshotId['max'])) {
                $this->addUsingAlias(ProfileGroupPeer::SNAPSHOT_ID, $snapshotId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProfileGroupPeer::SNAPSHOT_ID, $snapshotId, $comparison);
    }

    /**
     * Filter the query on the display_name_male column
     *
     * Example usage:
     * <code>
     * $query->filterByDisplayNameMale('fooValue');   // WHERE display_name_male = 'fooValue'
     * $query->filterByDisplayNameMale('%fooValue%'); // WHERE display_name_male LIKE '%fooValue%'
     * </code>
     *
     * @param     string $displayNameMale The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProfileGroupQuery The current query, for fluid interface
     */
    public function filterByDisplayNameMale($displayNameMale = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($displayNameMale)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $displayNameMale)) {
                $displayNameMale = str_replace('*', '%', $displayNameMale);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProfileGroupPeer::DISPLAY_NAME_MALE, $displayNameMale, $comparison);
    }

    /**
     * Filter the query on the display_name_female column
     *
     * Example usage:
     * <code>
     * $query->filterByDisplayNameFemale('fooValue');   // WHERE display_name_female = 'fooValue'
     * $query->filterByDisplayNameFemale('%fooValue%'); // WHERE display_name_female LIKE '%fooValue%'
     * </code>
     *
     * @param     string $displayNameFemale The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProfileGroupQuery The current query, for fluid interface
     */
    public function filterByDisplayNameFemale($displayNameFemale = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($displayNameFemale)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $displayNameFemale)) {
                $displayNameFemale = str_replace('*', '%', $displayNameFemale);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProfileGroupPeer::DISPLAY_NAME_FEMALE, $displayNameFemale, $comparison);
    }

    /**
     * Filter the query on the display_name_neutral column
     *
     * Example usage:
     * <code>
     * $query->filterByDisplayNameNeutral('fooValue');   // WHERE display_name_neutral = 'fooValue'
     * $query->filterByDisplayNameNeutral('%fooValue%'); // WHERE display_name_neutral LIKE '%fooValue%'
     * </code>
     *
     * @param     string $displayNameNeutral The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProfileGroupQuery The current query, for fluid interface
     */
    public function filterByDisplayNameNeutral($displayNameNeutral = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($displayNameNeutral)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $displayNameNeutral)) {
                $displayNameNeutral = str_replace('*', '%', $displayNameNeutral);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProfileGroupPeer::DISPLAY_NAME_NEUTRAL, $displayNameNeutral, $comparison);
    }

    /**
     * Filter the query on the abbreviation column
     *
     * Example usage:
     * <code>
     * $query->filterByAbbreviation('fooValue');   // WHERE abbreviation = 'fooValue'
     * $query->filterByAbbreviation('%fooValue%'); // WHERE abbreviation LIKE '%fooValue%'
     * </code>
     *
     * @param     string $abbreviation The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProfileGroupQuery The current query, for fluid interface
     */
    public function filterByAbbreviation($abbreviation = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($abbreviation)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $abbreviation)) {
                $abbreviation = str_replace('*', '%', $abbreviation);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProfileGroupPeer::ABBREVIATION, $abbreviation, $comparison);
    }

    /**
     * Filter the query on the is_manager column
     *
     * Example usage:
     * <code>
     * $query->filterByIsManager(true); // WHERE is_manager = true
     * $query->filterByIsManager('yes'); // WHERE is_manager = true
     * </code>
     *
     * @param     boolean|string $isManager The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProfileGroupQuery The current query, for fluid interface
     */
    public function filterByIsManager($isManager = null, $comparison = null)
    {
        if (is_string($isManager)) {
            $is_manager = in_array(strtolower($isManager), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProfileGroupPeer::IS_MANAGER, $isManager, $comparison);
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
     * @return ProfileGroupQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProfileGroupPeer::DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query by a related Snapshot object
     *
     * @param   Snapshot|PropelObjectCollection $snapshot The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ProfileGroupQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBySnapshot($snapshot, $comparison = null)
    {
        if ($snapshot instanceof Snapshot) {
            return $this
                ->addUsingAlias(ProfileGroupPeer::SNAPSHOT_ID, $snapshot->getId(), $comparison);
        } elseif ($snapshot instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProfileGroupPeer::SNAPSHOT_ID, $snapshot->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return ProfileGroupQuery The current query, for fluid interface
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
     * Filter the query by a related ActivityProfileGroup object
     *
     * @param   ActivityProfileGroup|PropelObjectCollection $activityProfileGroup  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ProfileGroupQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByActivityProfileGroup($activityProfileGroup, $comparison = null)
    {
        if ($activityProfileGroup instanceof ActivityProfileGroup) {
            return $this
                ->addUsingAlias(ProfileGroupPeer::ID, $activityProfileGroup->getProfileGroupId(), $comparison);
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
     * @return ProfileGroupQuery The current query, for fluid interface
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
     * Filter the query by a related Profile object
     *
     * @param   Profile|PropelObjectCollection $profile  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ProfileGroupQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByProfile($profile, $comparison = null)
    {
        if ($profile instanceof Profile) {
            return $this
                ->addUsingAlias(ProfileGroupPeer::ID, $profile->getProfileGroupId(), $comparison);
        } elseif ($profile instanceof PropelObjectCollection) {
            return $this
                ->useProfileQuery()
                ->filterByPrimaryKeys($profile->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProfile() only accepts arguments of type Profile or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Profile relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProfileGroupQuery The current query, for fluid interface
     */
    public function joinProfile($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Profile');

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
            $this->addJoinObject($join, 'Profile');
        }

        return $this;
    }

    /**
     * Use the Profile relation Profile object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProfileQuery A secondary query class using the current class as primary query
     */
    public function useProfileQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProfile($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Profile', 'ProfileQuery');
    }

    /**
     * Filter the query by a related GroupingProfileGroup object
     *
     * @param   GroupingProfileGroup|PropelObjectCollection $groupingProfileGroup  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ProfileGroupQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByGroupingProfileGroup($groupingProfileGroup, $comparison = null)
    {
        if ($groupingProfileGroup instanceof GroupingProfileGroup) {
            return $this
                ->addUsingAlias(ProfileGroupPeer::ID, $groupingProfileGroup->getProfileGroupId(), $comparison);
        } elseif ($groupingProfileGroup instanceof PropelObjectCollection) {
            return $this
                ->useGroupingProfileGroupQuery()
                ->filterByPrimaryKeys($groupingProfileGroup->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByGroupingProfileGroup() only accepts arguments of type GroupingProfileGroup or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the GroupingProfileGroup relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProfileGroupQuery The current query, for fluid interface
     */
    public function joinGroupingProfileGroup($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('GroupingProfileGroup');

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
            $this->addJoinObject($join, 'GroupingProfileGroup');
        }

        return $this;
    }

    /**
     * Use the GroupingProfileGroup relation GroupingProfileGroup object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   GroupingProfileGroupQuery A secondary query class using the current class as primary query
     */
    public function useGroupingProfileGroupQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinGroupingProfileGroup($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'GroupingProfileGroup', 'GroupingProfileGroupQuery');
    }

    /**
     * Filter the query by a related EventProfileGroup object
     *
     * @param   EventProfileGroup|PropelObjectCollection $eventProfileGroup  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ProfileGroupQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByEventProfileGroup($eventProfileGroup, $comparison = null)
    {
        if ($eventProfileGroup instanceof EventProfileGroup) {
            return $this
                ->addUsingAlias(ProfileGroupPeer::ID, $eventProfileGroup->getProfileGroupId(), $comparison);
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
     * @return ProfileGroupQuery The current query, for fluid interface
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
     * Filter the query by a related FolderPermission object
     *
     * @param   FolderPermission|PropelObjectCollection $folderPermission  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ProfileGroupQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByFolderPermission($folderPermission, $comparison = null)
    {
        if ($folderPermission instanceof FolderPermission) {
            return $this
                ->addUsingAlias(ProfileGroupPeer::ID, $folderPermission->getProfileGroupId(), $comparison);
        } elseif ($folderPermission instanceof PropelObjectCollection) {
            return $this
                ->useFolderPermissionQuery()
                ->filterByPrimaryKeys($folderPermission->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByFolderPermission() only accepts arguments of type FolderPermission or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the FolderPermission relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProfileGroupQuery The current query, for fluid interface
     */
    public function joinFolderPermission($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('FolderPermission');

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
            $this->addJoinObject($join, 'FolderPermission');
        }

        return $this;
    }

    /**
     * Use the FolderPermission relation FolderPermission object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   FolderPermissionQuery A secondary query class using the current class as primary query
     */
    public function useFolderPermissionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinFolderPermission($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'FolderPermission', 'FolderPermissionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProfileGroup $profileGroup Object to remove from the list of results
     *
     * @return ProfileGroupQuery The current query, for fluid interface
     */
    public function prune($profileGroup = null)
    {
        if ($profileGroup) {
            $this->addUsingAlias(ProfileGroupPeer::ID, $profileGroup->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
