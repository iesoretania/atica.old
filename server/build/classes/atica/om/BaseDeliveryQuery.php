<?php


/**
 * Base class that represents a query for the 'delivery' table.
 *
 *
 *
 * @method DeliveryQuery orderById($order = Criteria::ASC) Order by the id column
 * @method DeliveryQuery orderBySnapshotId($order = Criteria::ASC) Order by the snapshot_id column
 * @method DeliveryQuery orderByProfileId($order = Criteria::ASC) Order by the profile_id column
 * @method DeliveryQuery orderByDisplayName($order = Criteria::ASC) Order by the display_name column
 * @method DeliveryQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method DeliveryQuery orderByCreationDate($order = Criteria::ASC) Order by the creation_date column
 * @method DeliveryQuery orderByCurrentRevisionId($order = Criteria::ASC) Order by the current_revision_id column
 * @method DeliveryQuery orderByPublicToken($order = Criteria::ASC) Order by the public_token column
 *
 * @method DeliveryQuery groupById() Group by the id column
 * @method DeliveryQuery groupBySnapshotId() Group by the snapshot_id column
 * @method DeliveryQuery groupByProfileId() Group by the profile_id column
 * @method DeliveryQuery groupByDisplayName() Group by the display_name column
 * @method DeliveryQuery groupByDescription() Group by the description column
 * @method DeliveryQuery groupByCreationDate() Group by the creation_date column
 * @method DeliveryQuery groupByCurrentRevisionId() Group by the current_revision_id column
 * @method DeliveryQuery groupByPublicToken() Group by the public_token column
 *
 * @method DeliveryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method DeliveryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method DeliveryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method DeliveryQuery leftJoinProfile($relationAlias = null) Adds a LEFT JOIN clause to the query using the Profile relation
 * @method DeliveryQuery rightJoinProfile($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Profile relation
 * @method DeliveryQuery innerJoinProfile($relationAlias = null) Adds a INNER JOIN clause to the query using the Profile relation
 *
 * @method DeliveryQuery leftJoinRevisionRelatedByCurrentRevisionId($relationAlias = null) Adds a LEFT JOIN clause to the query using the RevisionRelatedByCurrentRevisionId relation
 * @method DeliveryQuery rightJoinRevisionRelatedByCurrentRevisionId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RevisionRelatedByCurrentRevisionId relation
 * @method DeliveryQuery innerJoinRevisionRelatedByCurrentRevisionId($relationAlias = null) Adds a INNER JOIN clause to the query using the RevisionRelatedByCurrentRevisionId relation
 *
 * @method DeliveryQuery leftJoinSnapshot($relationAlias = null) Adds a LEFT JOIN clause to the query using the Snapshot relation
 * @method DeliveryQuery rightJoinSnapshot($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Snapshot relation
 * @method DeliveryQuery innerJoinSnapshot($relationAlias = null) Adds a INNER JOIN clause to the query using the Snapshot relation
 *
 * @method DeliveryQuery leftJoinFolderDelivery($relationAlias = null) Adds a LEFT JOIN clause to the query using the FolderDelivery relation
 * @method DeliveryQuery rightJoinFolderDelivery($relationAlias = null) Adds a RIGHT JOIN clause to the query using the FolderDelivery relation
 * @method DeliveryQuery innerJoinFolderDelivery($relationAlias = null) Adds a INNER JOIN clause to the query using the FolderDelivery relation
 *
 * @method DeliveryQuery leftJoinEventDelivery($relationAlias = null) Adds a LEFT JOIN clause to the query using the EventDelivery relation
 * @method DeliveryQuery rightJoinEventDelivery($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EventDelivery relation
 * @method DeliveryQuery innerJoinEventDelivery($relationAlias = null) Adds a INNER JOIN clause to the query using the EventDelivery relation
 *
 * @method DeliveryQuery leftJoinRevisionRelatedByDeliveryId($relationAlias = null) Adds a LEFT JOIN clause to the query using the RevisionRelatedByDeliveryId relation
 * @method DeliveryQuery rightJoinRevisionRelatedByDeliveryId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RevisionRelatedByDeliveryId relation
 * @method DeliveryQuery innerJoinRevisionRelatedByDeliveryId($relationAlias = null) Adds a INNER JOIN clause to the query using the RevisionRelatedByDeliveryId relation
 *
 * @method Delivery findOne(PropelPDO $con = null) Return the first Delivery matching the query
 * @method Delivery findOneOrCreate(PropelPDO $con = null) Return the first Delivery matching the query, or a new Delivery object populated from the query conditions when no match is found
 *
 * @method Delivery findOneBySnapshotId(int $snapshot_id) Return the first Delivery filtered by the snapshot_id column
 * @method Delivery findOneByProfileId(int $profile_id) Return the first Delivery filtered by the profile_id column
 * @method Delivery findOneByDisplayName(string $display_name) Return the first Delivery filtered by the display_name column
 * @method Delivery findOneByDescription(string $description) Return the first Delivery filtered by the description column
 * @method Delivery findOneByCreationDate(string $creation_date) Return the first Delivery filtered by the creation_date column
 * @method Delivery findOneByCurrentRevisionId(int $current_revision_id) Return the first Delivery filtered by the current_revision_id column
 * @method Delivery findOneByPublicToken(string $public_token) Return the first Delivery filtered by the public_token column
 *
 * @method array findById(int $id) Return Delivery objects filtered by the id column
 * @method array findBySnapshotId(int $snapshot_id) Return Delivery objects filtered by the snapshot_id column
 * @method array findByProfileId(int $profile_id) Return Delivery objects filtered by the profile_id column
 * @method array findByDisplayName(string $display_name) Return Delivery objects filtered by the display_name column
 * @method array findByDescription(string $description) Return Delivery objects filtered by the description column
 * @method array findByCreationDate(string $creation_date) Return Delivery objects filtered by the creation_date column
 * @method array findByCurrentRevisionId(int $current_revision_id) Return Delivery objects filtered by the current_revision_id column
 * @method array findByPublicToken(string $public_token) Return Delivery objects filtered by the public_token column
 *
 * @package    propel.generator.atica.om
 */
abstract class BaseDeliveryQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseDeliveryQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'atica', $modelName = 'Delivery', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new DeliveryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     DeliveryQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return DeliveryQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof DeliveryQuery) {
            return $criteria;
        }
        $query = new DeliveryQuery();
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
     * @return   Delivery|Delivery[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = DeliveryPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(DeliveryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Delivery A model object, or null if the key is not found
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
     * @return   Delivery A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `SNAPSHOT_ID`, `PROFILE_ID`, `DISPLAY_NAME`, `DESCRIPTION`, `CREATION_DATE`, `CURRENT_REVISION_ID`, `PUBLIC_TOKEN` FROM `delivery` WHERE `ID` = :p0';
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
            $obj = new Delivery();
            $obj->hydrate($row);
            DeliveryPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Delivery|Delivery[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Delivery[]|mixed the list of results, formatted by the current formatter
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
     * @return DeliveryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DeliveryPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return DeliveryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DeliveryPeer::ID, $keys, Criteria::IN);
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
     * @return DeliveryQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(DeliveryPeer::ID, $id, $comparison);
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
     * @return DeliveryQuery The current query, for fluid interface
     */
    public function filterBySnapshotId($snapshotId = null, $comparison = null)
    {
        if (is_array($snapshotId)) {
            $useMinMax = false;
            if (isset($snapshotId['min'])) {
                $this->addUsingAlias(DeliveryPeer::SNAPSHOT_ID, $snapshotId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($snapshotId['max'])) {
                $this->addUsingAlias(DeliveryPeer::SNAPSHOT_ID, $snapshotId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DeliveryPeer::SNAPSHOT_ID, $snapshotId, $comparison);
    }

    /**
     * Filter the query on the profile_id column
     *
     * Example usage:
     * <code>
     * $query->filterByProfileId(1234); // WHERE profile_id = 1234
     * $query->filterByProfileId(array(12, 34)); // WHERE profile_id IN (12, 34)
     * $query->filterByProfileId(array('min' => 12)); // WHERE profile_id > 12
     * </code>
     *
     * @see       filterByProfile()
     *
     * @param     mixed $profileId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DeliveryQuery The current query, for fluid interface
     */
    public function filterByProfileId($profileId = null, $comparison = null)
    {
        if (is_array($profileId)) {
            $useMinMax = false;
            if (isset($profileId['min'])) {
                $this->addUsingAlias(DeliveryPeer::PROFILE_ID, $profileId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($profileId['max'])) {
                $this->addUsingAlias(DeliveryPeer::PROFILE_ID, $profileId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DeliveryPeer::PROFILE_ID, $profileId, $comparison);
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
     * @return DeliveryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(DeliveryPeer::DISPLAY_NAME, $displayName, $comparison);
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
     * @return DeliveryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(DeliveryPeer::DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the creation_date column
     *
     * Example usage:
     * <code>
     * $query->filterByCreationDate('2011-03-14'); // WHERE creation_date = '2011-03-14'
     * $query->filterByCreationDate('now'); // WHERE creation_date = '2011-03-14'
     * $query->filterByCreationDate(array('max' => 'yesterday')); // WHERE creation_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $creationDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DeliveryQuery The current query, for fluid interface
     */
    public function filterByCreationDate($creationDate = null, $comparison = null)
    {
        if (is_array($creationDate)) {
            $useMinMax = false;
            if (isset($creationDate['min'])) {
                $this->addUsingAlias(DeliveryPeer::CREATION_DATE, $creationDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($creationDate['max'])) {
                $this->addUsingAlias(DeliveryPeer::CREATION_DATE, $creationDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DeliveryPeer::CREATION_DATE, $creationDate, $comparison);
    }

    /**
     * Filter the query on the current_revision_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCurrentRevisionId(1234); // WHERE current_revision_id = 1234
     * $query->filterByCurrentRevisionId(array(12, 34)); // WHERE current_revision_id IN (12, 34)
     * $query->filterByCurrentRevisionId(array('min' => 12)); // WHERE current_revision_id > 12
     * </code>
     *
     * @see       filterByRevisionRelatedByCurrentRevisionId()
     *
     * @param     mixed $currentRevisionId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DeliveryQuery The current query, for fluid interface
     */
    public function filterByCurrentRevisionId($currentRevisionId = null, $comparison = null)
    {
        if (is_array($currentRevisionId)) {
            $useMinMax = false;
            if (isset($currentRevisionId['min'])) {
                $this->addUsingAlias(DeliveryPeer::CURRENT_REVISION_ID, $currentRevisionId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($currentRevisionId['max'])) {
                $this->addUsingAlias(DeliveryPeer::CURRENT_REVISION_ID, $currentRevisionId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DeliveryPeer::CURRENT_REVISION_ID, $currentRevisionId, $comparison);
    }

    /**
     * Filter the query on the public_token column
     *
     * Example usage:
     * <code>
     * $query->filterByPublicToken('fooValue');   // WHERE public_token = 'fooValue'
     * $query->filterByPublicToken('%fooValue%'); // WHERE public_token LIKE '%fooValue%'
     * </code>
     *
     * @param     string $publicToken The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DeliveryQuery The current query, for fluid interface
     */
    public function filterByPublicToken($publicToken = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($publicToken)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $publicToken)) {
                $publicToken = str_replace('*', '%', $publicToken);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DeliveryPeer::PUBLIC_TOKEN, $publicToken, $comparison);
    }

    /**
     * Filter the query by a related Profile object
     *
     * @param   Profile|PropelObjectCollection $profile The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   DeliveryQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByProfile($profile, $comparison = null)
    {
        if ($profile instanceof Profile) {
            return $this
                ->addUsingAlias(DeliveryPeer::PROFILE_ID, $profile->getId(), $comparison);
        } elseif ($profile instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DeliveryPeer::PROFILE_ID, $profile->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return DeliveryQuery The current query, for fluid interface
     */
    public function joinProfile($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useProfileQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinProfile($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Profile', 'ProfileQuery');
    }

    /**
     * Filter the query by a related Revision object
     *
     * @param   Revision|PropelObjectCollection $revision The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   DeliveryQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByRevisionRelatedByCurrentRevisionId($revision, $comparison = null)
    {
        if ($revision instanceof Revision) {
            return $this
                ->addUsingAlias(DeliveryPeer::CURRENT_REVISION_ID, $revision->getId(), $comparison);
        } elseif ($revision instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DeliveryPeer::CURRENT_REVISION_ID, $revision->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRevisionRelatedByCurrentRevisionId() only accepts arguments of type Revision or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RevisionRelatedByCurrentRevisionId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DeliveryQuery The current query, for fluid interface
     */
    public function joinRevisionRelatedByCurrentRevisionId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RevisionRelatedByCurrentRevisionId');

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
            $this->addJoinObject($join, 'RevisionRelatedByCurrentRevisionId');
        }

        return $this;
    }

    /**
     * Use the RevisionRelatedByCurrentRevisionId relation Revision object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   RevisionQuery A secondary query class using the current class as primary query
     */
    public function useRevisionRelatedByCurrentRevisionIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRevisionRelatedByCurrentRevisionId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RevisionRelatedByCurrentRevisionId', 'RevisionQuery');
    }

    /**
     * Filter the query by a related Snapshot object
     *
     * @param   Snapshot|PropelObjectCollection $snapshot The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   DeliveryQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBySnapshot($snapshot, $comparison = null)
    {
        if ($snapshot instanceof Snapshot) {
            return $this
                ->addUsingAlias(DeliveryPeer::SNAPSHOT_ID, $snapshot->getId(), $comparison);
        } elseif ($snapshot instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DeliveryPeer::SNAPSHOT_ID, $snapshot->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return DeliveryQuery The current query, for fluid interface
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
     * Filter the query by a related FolderDelivery object
     *
     * @param   FolderDelivery|PropelObjectCollection $folderDelivery  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   DeliveryQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByFolderDelivery($folderDelivery, $comparison = null)
    {
        if ($folderDelivery instanceof FolderDelivery) {
            return $this
                ->addUsingAlias(DeliveryPeer::ID, $folderDelivery->getDeliveryId(), $comparison);
        } elseif ($folderDelivery instanceof PropelObjectCollection) {
            return $this
                ->useFolderDeliveryQuery()
                ->filterByPrimaryKeys($folderDelivery->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByFolderDelivery() only accepts arguments of type FolderDelivery or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the FolderDelivery relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DeliveryQuery The current query, for fluid interface
     */
    public function joinFolderDelivery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('FolderDelivery');

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
            $this->addJoinObject($join, 'FolderDelivery');
        }

        return $this;
    }

    /**
     * Use the FolderDelivery relation FolderDelivery object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   FolderDeliveryQuery A secondary query class using the current class as primary query
     */
    public function useFolderDeliveryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinFolderDelivery($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'FolderDelivery', 'FolderDeliveryQuery');
    }

    /**
     * Filter the query by a related EventDelivery object
     *
     * @param   EventDelivery|PropelObjectCollection $eventDelivery  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   DeliveryQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByEventDelivery($eventDelivery, $comparison = null)
    {
        if ($eventDelivery instanceof EventDelivery) {
            return $this
                ->addUsingAlias(DeliveryPeer::ID, $eventDelivery->getDeliveryId(), $comparison);
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
     * @return DeliveryQuery The current query, for fluid interface
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
     * Filter the query by a related Revision object
     *
     * @param   Revision|PropelObjectCollection $revision  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   DeliveryQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByRevisionRelatedByDeliveryId($revision, $comparison = null)
    {
        if ($revision instanceof Revision) {
            return $this
                ->addUsingAlias(DeliveryPeer::ID, $revision->getDeliveryId(), $comparison);
        } elseif ($revision instanceof PropelObjectCollection) {
            return $this
                ->useRevisionRelatedByDeliveryIdQuery()
                ->filterByPrimaryKeys($revision->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRevisionRelatedByDeliveryId() only accepts arguments of type Revision or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RevisionRelatedByDeliveryId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DeliveryQuery The current query, for fluid interface
     */
    public function joinRevisionRelatedByDeliveryId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RevisionRelatedByDeliveryId');

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
            $this->addJoinObject($join, 'RevisionRelatedByDeliveryId');
        }

        return $this;
    }

    /**
     * Use the RevisionRelatedByDeliveryId relation Revision object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   RevisionQuery A secondary query class using the current class as primary query
     */
    public function useRevisionRelatedByDeliveryIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRevisionRelatedByDeliveryId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RevisionRelatedByDeliveryId', 'RevisionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Delivery $delivery Object to remove from the list of results
     *
     * @return DeliveryQuery The current query, for fluid interface
     */
    public function prune($delivery = null)
    {
        if ($delivery) {
            $this->addUsingAlias(DeliveryPeer::ID, $delivery->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
