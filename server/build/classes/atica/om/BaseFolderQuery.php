<?php


/**
 * Base class that represents a query for the 'folder' table.
 *
 *
 *
 * @method FolderQuery orderById($order = Criteria::ASC) Order by the id column
 * @method FolderQuery orderBySnapshotId($order = Criteria::ASC) Order by the snapshot_id column
 * @method FolderQuery orderByCategoryId($order = Criteria::ASC) Order by the category_id column
 * @method FolderQuery orderByOrderNr($order = Criteria::ASC) Order by the order_nr column
 * @method FolderQuery orderByDisplayName($order = Criteria::ASC) Order by the display_name column
 * @method FolderQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method FolderQuery orderByIsDivided($order = Criteria::ASC) Order by the is_divided column
 * @method FolderQuery orderByIsPrivate($order = Criteria::ASC) Order by the is_private column
 * @method FolderQuery orderByFilter($order = Criteria::ASC) Order by the filter column
 * @method FolderQuery orderByFilterDescription($order = Criteria::ASC) Order by the filter_description column
 * @method FolderQuery orderByMandatoryReview($order = Criteria::ASC) Order by the mandatory_review column
 * @method FolderQuery orderByMandatoryApproval($order = Criteria::ASC) Order by the mandatory_approval column
 * @method FolderQuery orderByReviewNotes($order = Criteria::ASC) Order by the review_notes column
 * @method FolderQuery orderByApprovalNotes($order = Criteria::ASC) Order by the approval_notes column
 * @method FolderQuery orderByShowRevisionNr($order = Criteria::ASC) Order by the show_revision_nr column
 * @method FolderQuery orderByAutoclean($order = Criteria::ASC) Order by the autoclean column
 * @method FolderQuery orderByMaxUploads($order = Criteria::ASC) Order by the max_uploads column
 * @method FolderQuery orderByPublicToken($order = Criteria::ASC) Order by the public_token column
 *
 * @method FolderQuery groupById() Group by the id column
 * @method FolderQuery groupBySnapshotId() Group by the snapshot_id column
 * @method FolderQuery groupByCategoryId() Group by the category_id column
 * @method FolderQuery groupByOrderNr() Group by the order_nr column
 * @method FolderQuery groupByDisplayName() Group by the display_name column
 * @method FolderQuery groupByDescription() Group by the description column
 * @method FolderQuery groupByIsDivided() Group by the is_divided column
 * @method FolderQuery groupByIsPrivate() Group by the is_private column
 * @method FolderQuery groupByFilter() Group by the filter column
 * @method FolderQuery groupByFilterDescription() Group by the filter_description column
 * @method FolderQuery groupByMandatoryReview() Group by the mandatory_review column
 * @method FolderQuery groupByMandatoryApproval() Group by the mandatory_approval column
 * @method FolderQuery groupByReviewNotes() Group by the review_notes column
 * @method FolderQuery groupByApprovalNotes() Group by the approval_notes column
 * @method FolderQuery groupByShowRevisionNr() Group by the show_revision_nr column
 * @method FolderQuery groupByAutoclean() Group by the autoclean column
 * @method FolderQuery groupByMaxUploads() Group by the max_uploads column
 * @method FolderQuery groupByPublicToken() Group by the public_token column
 *
 * @method FolderQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method FolderQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method FolderQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method FolderQuery leftJoinSnapshot($relationAlias = null) Adds a LEFT JOIN clause to the query using the Snapshot relation
 * @method FolderQuery rightJoinSnapshot($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Snapshot relation
 * @method FolderQuery innerJoinSnapshot($relationAlias = null) Adds a INNER JOIN clause to the query using the Snapshot relation
 *
 * @method FolderQuery leftJoinFolderDelivery($relationAlias = null) Adds a LEFT JOIN clause to the query using the FolderDelivery relation
 * @method FolderQuery rightJoinFolderDelivery($relationAlias = null) Adds a RIGHT JOIN clause to the query using the FolderDelivery relation
 * @method FolderQuery innerJoinFolderDelivery($relationAlias = null) Adds a INNER JOIN clause to the query using the FolderDelivery relation
 *
 * @method FolderQuery leftJoinEventFolder($relationAlias = null) Adds a LEFT JOIN clause to the query using the EventFolder relation
 * @method FolderQuery rightJoinEventFolder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EventFolder relation
 * @method FolderQuery innerJoinEventFolder($relationAlias = null) Adds a INNER JOIN clause to the query using the EventFolder relation
 *
 * @method FolderQuery leftJoinCategoryFolder($relationAlias = null) Adds a LEFT JOIN clause to the query using the CategoryFolder relation
 * @method FolderQuery rightJoinCategoryFolder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CategoryFolder relation
 * @method FolderQuery innerJoinCategoryFolder($relationAlias = null) Adds a INNER JOIN clause to the query using the CategoryFolder relation
 *
 * @method FolderQuery leftJoinGroupingFolder($relationAlias = null) Adds a LEFT JOIN clause to the query using the GroupingFolder relation
 * @method FolderQuery rightJoinGroupingFolder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the GroupingFolder relation
 * @method FolderQuery innerJoinGroupingFolder($relationAlias = null) Adds a INNER JOIN clause to the query using the GroupingFolder relation
 *
 * @method FolderQuery leftJoinFolderPermission($relationAlias = null) Adds a LEFT JOIN clause to the query using the FolderPermission relation
 * @method FolderQuery rightJoinFolderPermission($relationAlias = null) Adds a RIGHT JOIN clause to the query using the FolderPermission relation
 * @method FolderQuery innerJoinFolderPermission($relationAlias = null) Adds a INNER JOIN clause to the query using the FolderPermission relation
 *
 * @method Folder findOne(PropelPDO $con = null) Return the first Folder matching the query
 * @method Folder findOneOrCreate(PropelPDO $con = null) Return the first Folder matching the query, or a new Folder object populated from the query conditions when no match is found
 *
 * @method Folder findOneBySnapshotId(int $snapshot_id) Return the first Folder filtered by the snapshot_id column
 * @method Folder findOneByCategoryId(int $category_id) Return the first Folder filtered by the category_id column
 * @method Folder findOneByOrderNr(int $order_nr) Return the first Folder filtered by the order_nr column
 * @method Folder findOneByDisplayName(string $display_name) Return the first Folder filtered by the display_name column
 * @method Folder findOneByDescription(string $description) Return the first Folder filtered by the description column
 * @method Folder findOneByIsDivided(boolean $is_divided) Return the first Folder filtered by the is_divided column
 * @method Folder findOneByIsPrivate(boolean $is_private) Return the first Folder filtered by the is_private column
 * @method Folder findOneByFilter(string $filter) Return the first Folder filtered by the filter column
 * @method Folder findOneByFilterDescription(string $filter_description) Return the first Folder filtered by the filter_description column
 * @method Folder findOneByMandatoryReview(boolean $mandatory_review) Return the first Folder filtered by the mandatory_review column
 * @method Folder findOneByMandatoryApproval(boolean $mandatory_approval) Return the first Folder filtered by the mandatory_approval column
 * @method Folder findOneByReviewNotes(string $review_notes) Return the first Folder filtered by the review_notes column
 * @method Folder findOneByApprovalNotes(string $approval_notes) Return the first Folder filtered by the approval_notes column
 * @method Folder findOneByShowRevisionNr(boolean $show_revision_nr) Return the first Folder filtered by the show_revision_nr column
 * @method Folder findOneByAutoclean(boolean $autoclean) Return the first Folder filtered by the autoclean column
 * @method Folder findOneByMaxUploads(int $max_uploads) Return the first Folder filtered by the max_uploads column
 * @method Folder findOneByPublicToken(string $public_token) Return the first Folder filtered by the public_token column
 *
 * @method array findById(int $id) Return Folder objects filtered by the id column
 * @method array findBySnapshotId(int $snapshot_id) Return Folder objects filtered by the snapshot_id column
 * @method array findByCategoryId(int $category_id) Return Folder objects filtered by the category_id column
 * @method array findByOrderNr(int $order_nr) Return Folder objects filtered by the order_nr column
 * @method array findByDisplayName(string $display_name) Return Folder objects filtered by the display_name column
 * @method array findByDescription(string $description) Return Folder objects filtered by the description column
 * @method array findByIsDivided(boolean $is_divided) Return Folder objects filtered by the is_divided column
 * @method array findByIsPrivate(boolean $is_private) Return Folder objects filtered by the is_private column
 * @method array findByFilter(string $filter) Return Folder objects filtered by the filter column
 * @method array findByFilterDescription(string $filter_description) Return Folder objects filtered by the filter_description column
 * @method array findByMandatoryReview(boolean $mandatory_review) Return Folder objects filtered by the mandatory_review column
 * @method array findByMandatoryApproval(boolean $mandatory_approval) Return Folder objects filtered by the mandatory_approval column
 * @method array findByReviewNotes(string $review_notes) Return Folder objects filtered by the review_notes column
 * @method array findByApprovalNotes(string $approval_notes) Return Folder objects filtered by the approval_notes column
 * @method array findByShowRevisionNr(boolean $show_revision_nr) Return Folder objects filtered by the show_revision_nr column
 * @method array findByAutoclean(boolean $autoclean) Return Folder objects filtered by the autoclean column
 * @method array findByMaxUploads(int $max_uploads) Return Folder objects filtered by the max_uploads column
 * @method array findByPublicToken(string $public_token) Return Folder objects filtered by the public_token column
 *
 * @package    propel.generator.atica.om
 */
abstract class BaseFolderQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseFolderQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'atica', $modelName = 'Folder', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new FolderQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     FolderQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return FolderQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof FolderQuery) {
            return $criteria;
        }
        $query = new FolderQuery();
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
     * @return   Folder|Folder[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = FolderPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(FolderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Folder A model object, or null if the key is not found
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
     * @return   Folder A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `SNAPSHOT_ID`, `CATEGORY_ID`, `ORDER_NR`, `DISPLAY_NAME`, `DESCRIPTION`, `IS_DIVIDED`, `IS_PRIVATE`, `FILTER`, `FILTER_DESCRIPTION`, `MANDATORY_REVIEW`, `MANDATORY_APPROVAL`, `REVIEW_NOTES`, `APPROVAL_NOTES`, `SHOW_REVISION_NR`, `AUTOCLEAN`, `MAX_UPLOADS`, `PUBLIC_TOKEN` FROM `folder` WHERE `ID` = :p0';
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
            $obj = new Folder();
            $obj->hydrate($row);
            FolderPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Folder|Folder[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Folder[]|mixed the list of results, formatted by the current formatter
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
     * @return FolderQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(FolderPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return FolderQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(FolderPeer::ID, $keys, Criteria::IN);
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
     * @return FolderQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(FolderPeer::ID, $id, $comparison);
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
     * @return FolderQuery The current query, for fluid interface
     */
    public function filterBySnapshotId($snapshotId = null, $comparison = null)
    {
        if (is_array($snapshotId)) {
            $useMinMax = false;
            if (isset($snapshotId['min'])) {
                $this->addUsingAlias(FolderPeer::SNAPSHOT_ID, $snapshotId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($snapshotId['max'])) {
                $this->addUsingAlias(FolderPeer::SNAPSHOT_ID, $snapshotId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FolderPeer::SNAPSHOT_ID, $snapshotId, $comparison);
    }

    /**
     * Filter the query on the category_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCategoryId(1234); // WHERE category_id = 1234
     * $query->filterByCategoryId(array(12, 34)); // WHERE category_id IN (12, 34)
     * $query->filterByCategoryId(array('min' => 12)); // WHERE category_id > 12
     * </code>
     *
     * @param     mixed $categoryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FolderQuery The current query, for fluid interface
     */
    public function filterByCategoryId($categoryId = null, $comparison = null)
    {
        if (is_array($categoryId)) {
            $useMinMax = false;
            if (isset($categoryId['min'])) {
                $this->addUsingAlias(FolderPeer::CATEGORY_ID, $categoryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($categoryId['max'])) {
                $this->addUsingAlias(FolderPeer::CATEGORY_ID, $categoryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FolderPeer::CATEGORY_ID, $categoryId, $comparison);
    }

    /**
     * Filter the query on the order_nr column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderNr(1234); // WHERE order_nr = 1234
     * $query->filterByOrderNr(array(12, 34)); // WHERE order_nr IN (12, 34)
     * $query->filterByOrderNr(array('min' => 12)); // WHERE order_nr > 12
     * </code>
     *
     * @param     mixed $orderNr The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FolderQuery The current query, for fluid interface
     */
    public function filterByOrderNr($orderNr = null, $comparison = null)
    {
        if (is_array($orderNr)) {
            $useMinMax = false;
            if (isset($orderNr['min'])) {
                $this->addUsingAlias(FolderPeer::ORDER_NR, $orderNr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderNr['max'])) {
                $this->addUsingAlias(FolderPeer::ORDER_NR, $orderNr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FolderPeer::ORDER_NR, $orderNr, $comparison);
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
     * @return FolderQuery The current query, for fluid interface
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

        return $this->addUsingAlias(FolderPeer::DISPLAY_NAME, $displayName, $comparison);
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
     * @return FolderQuery The current query, for fluid interface
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

        return $this->addUsingAlias(FolderPeer::DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the is_divided column
     *
     * Example usage:
     * <code>
     * $query->filterByIsDivided(true); // WHERE is_divided = true
     * $query->filterByIsDivided('yes'); // WHERE is_divided = true
     * </code>
     *
     * @param     boolean|string $isDivided The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FolderQuery The current query, for fluid interface
     */
    public function filterByIsDivided($isDivided = null, $comparison = null)
    {
        if (is_string($isDivided)) {
            $is_divided = in_array(strtolower($isDivided), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(FolderPeer::IS_DIVIDED, $isDivided, $comparison);
    }

    /**
     * Filter the query on the is_private column
     *
     * Example usage:
     * <code>
     * $query->filterByIsPrivate(true); // WHERE is_private = true
     * $query->filterByIsPrivate('yes'); // WHERE is_private = true
     * </code>
     *
     * @param     boolean|string $isPrivate The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FolderQuery The current query, for fluid interface
     */
    public function filterByIsPrivate($isPrivate = null, $comparison = null)
    {
        if (is_string($isPrivate)) {
            $is_private = in_array(strtolower($isPrivate), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(FolderPeer::IS_PRIVATE, $isPrivate, $comparison);
    }

    /**
     * Filter the query on the filter column
     *
     * Example usage:
     * <code>
     * $query->filterByFilter('fooValue');   // WHERE filter = 'fooValue'
     * $query->filterByFilter('%fooValue%'); // WHERE filter LIKE '%fooValue%'
     * </code>
     *
     * @param     string $filter The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FolderQuery The current query, for fluid interface
     */
    public function filterByFilter($filter = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($filter)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $filter)) {
                $filter = str_replace('*', '%', $filter);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(FolderPeer::FILTER, $filter, $comparison);
    }

    /**
     * Filter the query on the filter_description column
     *
     * Example usage:
     * <code>
     * $query->filterByFilterDescription('fooValue');   // WHERE filter_description = 'fooValue'
     * $query->filterByFilterDescription('%fooValue%'); // WHERE filter_description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $filterDescription The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FolderQuery The current query, for fluid interface
     */
    public function filterByFilterDescription($filterDescription = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($filterDescription)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $filterDescription)) {
                $filterDescription = str_replace('*', '%', $filterDescription);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(FolderPeer::FILTER_DESCRIPTION, $filterDescription, $comparison);
    }

    /**
     * Filter the query on the mandatory_review column
     *
     * Example usage:
     * <code>
     * $query->filterByMandatoryReview(true); // WHERE mandatory_review = true
     * $query->filterByMandatoryReview('yes'); // WHERE mandatory_review = true
     * </code>
     *
     * @param     boolean|string $mandatoryReview The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FolderQuery The current query, for fluid interface
     */
    public function filterByMandatoryReview($mandatoryReview = null, $comparison = null)
    {
        if (is_string($mandatoryReview)) {
            $mandatory_review = in_array(strtolower($mandatoryReview), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(FolderPeer::MANDATORY_REVIEW, $mandatoryReview, $comparison);
    }

    /**
     * Filter the query on the mandatory_approval column
     *
     * Example usage:
     * <code>
     * $query->filterByMandatoryApproval(true); // WHERE mandatory_approval = true
     * $query->filterByMandatoryApproval('yes'); // WHERE mandatory_approval = true
     * </code>
     *
     * @param     boolean|string $mandatoryApproval The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FolderQuery The current query, for fluid interface
     */
    public function filterByMandatoryApproval($mandatoryApproval = null, $comparison = null)
    {
        if (is_string($mandatoryApproval)) {
            $mandatory_approval = in_array(strtolower($mandatoryApproval), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(FolderPeer::MANDATORY_APPROVAL, $mandatoryApproval, $comparison);
    }

    /**
     * Filter the query on the review_notes column
     *
     * Example usage:
     * <code>
     * $query->filterByReviewNotes('fooValue');   // WHERE review_notes = 'fooValue'
     * $query->filterByReviewNotes('%fooValue%'); // WHERE review_notes LIKE '%fooValue%'
     * </code>
     *
     * @param     string $reviewNotes The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FolderQuery The current query, for fluid interface
     */
    public function filterByReviewNotes($reviewNotes = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($reviewNotes)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $reviewNotes)) {
                $reviewNotes = str_replace('*', '%', $reviewNotes);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(FolderPeer::REVIEW_NOTES, $reviewNotes, $comparison);
    }

    /**
     * Filter the query on the approval_notes column
     *
     * Example usage:
     * <code>
     * $query->filterByApprovalNotes('fooValue');   // WHERE approval_notes = 'fooValue'
     * $query->filterByApprovalNotes('%fooValue%'); // WHERE approval_notes LIKE '%fooValue%'
     * </code>
     *
     * @param     string $approvalNotes The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FolderQuery The current query, for fluid interface
     */
    public function filterByApprovalNotes($approvalNotes = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($approvalNotes)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $approvalNotes)) {
                $approvalNotes = str_replace('*', '%', $approvalNotes);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(FolderPeer::APPROVAL_NOTES, $approvalNotes, $comparison);
    }

    /**
     * Filter the query on the show_revision_nr column
     *
     * Example usage:
     * <code>
     * $query->filterByShowRevisionNr(true); // WHERE show_revision_nr = true
     * $query->filterByShowRevisionNr('yes'); // WHERE show_revision_nr = true
     * </code>
     *
     * @param     boolean|string $showRevisionNr The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FolderQuery The current query, for fluid interface
     */
    public function filterByShowRevisionNr($showRevisionNr = null, $comparison = null)
    {
        if (is_string($showRevisionNr)) {
            $show_revision_nr = in_array(strtolower($showRevisionNr), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(FolderPeer::SHOW_REVISION_NR, $showRevisionNr, $comparison);
    }

    /**
     * Filter the query on the autoclean column
     *
     * Example usage:
     * <code>
     * $query->filterByAutoclean(true); // WHERE autoclean = true
     * $query->filterByAutoclean('yes'); // WHERE autoclean = true
     * </code>
     *
     * @param     boolean|string $autoclean The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FolderQuery The current query, for fluid interface
     */
    public function filterByAutoclean($autoclean = null, $comparison = null)
    {
        if (is_string($autoclean)) {
            $autoclean = in_array(strtolower($autoclean), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(FolderPeer::AUTOCLEAN, $autoclean, $comparison);
    }

    /**
     * Filter the query on the max_uploads column
     *
     * Example usage:
     * <code>
     * $query->filterByMaxUploads(1234); // WHERE max_uploads = 1234
     * $query->filterByMaxUploads(array(12, 34)); // WHERE max_uploads IN (12, 34)
     * $query->filterByMaxUploads(array('min' => 12)); // WHERE max_uploads > 12
     * </code>
     *
     * @param     mixed $maxUploads The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FolderQuery The current query, for fluid interface
     */
    public function filterByMaxUploads($maxUploads = null, $comparison = null)
    {
        if (is_array($maxUploads)) {
            $useMinMax = false;
            if (isset($maxUploads['min'])) {
                $this->addUsingAlias(FolderPeer::MAX_UPLOADS, $maxUploads['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($maxUploads['max'])) {
                $this->addUsingAlias(FolderPeer::MAX_UPLOADS, $maxUploads['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FolderPeer::MAX_UPLOADS, $maxUploads, $comparison);
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
     * @return FolderQuery The current query, for fluid interface
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

        return $this->addUsingAlias(FolderPeer::PUBLIC_TOKEN, $publicToken, $comparison);
    }

    /**
     * Filter the query by a related Snapshot object
     *
     * @param   Snapshot|PropelObjectCollection $snapshot The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   FolderQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBySnapshot($snapshot, $comparison = null)
    {
        if ($snapshot instanceof Snapshot) {
            return $this
                ->addUsingAlias(FolderPeer::SNAPSHOT_ID, $snapshot->getId(), $comparison);
        } elseif ($snapshot instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(FolderPeer::SNAPSHOT_ID, $snapshot->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return FolderQuery The current query, for fluid interface
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
     * @return   FolderQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByFolderDelivery($folderDelivery, $comparison = null)
    {
        if ($folderDelivery instanceof FolderDelivery) {
            return $this
                ->addUsingAlias(FolderPeer::ID, $folderDelivery->getFolderId(), $comparison);
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
     * @return FolderQuery The current query, for fluid interface
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
     * Filter the query by a related EventFolder object
     *
     * @param   EventFolder|PropelObjectCollection $eventFolder  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   FolderQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByEventFolder($eventFolder, $comparison = null)
    {
        if ($eventFolder instanceof EventFolder) {
            return $this
                ->addUsingAlias(FolderPeer::ID, $eventFolder->getFolderId(), $comparison);
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
     * @return FolderQuery The current query, for fluid interface
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
     * Filter the query by a related CategoryFolder object
     *
     * @param   CategoryFolder|PropelObjectCollection $categoryFolder  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   FolderQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByCategoryFolder($categoryFolder, $comparison = null)
    {
        if ($categoryFolder instanceof CategoryFolder) {
            return $this
                ->addUsingAlias(FolderPeer::ID, $categoryFolder->getFolderId(), $comparison);
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
     * @return FolderQuery The current query, for fluid interface
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
     * Filter the query by a related GroupingFolder object
     *
     * @param   GroupingFolder|PropelObjectCollection $groupingFolder  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   FolderQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByGroupingFolder($groupingFolder, $comparison = null)
    {
        if ($groupingFolder instanceof GroupingFolder) {
            return $this
                ->addUsingAlias(FolderPeer::ID, $groupingFolder->getFolderId(), $comparison);
        } elseif ($groupingFolder instanceof PropelObjectCollection) {
            return $this
                ->useGroupingFolderQuery()
                ->filterByPrimaryKeys($groupingFolder->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByGroupingFolder() only accepts arguments of type GroupingFolder or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the GroupingFolder relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return FolderQuery The current query, for fluid interface
     */
    public function joinGroupingFolder($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('GroupingFolder');

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
            $this->addJoinObject($join, 'GroupingFolder');
        }

        return $this;
    }

    /**
     * Use the GroupingFolder relation GroupingFolder object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   GroupingFolderQuery A secondary query class using the current class as primary query
     */
    public function useGroupingFolderQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinGroupingFolder($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'GroupingFolder', 'GroupingFolderQuery');
    }

    /**
     * Filter the query by a related FolderPermission object
     *
     * @param   FolderPermission|PropelObjectCollection $folderPermission  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   FolderQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByFolderPermission($folderPermission, $comparison = null)
    {
        if ($folderPermission instanceof FolderPermission) {
            return $this
                ->addUsingAlias(FolderPeer::ID, $folderPermission->getFolderId(), $comparison);
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
     * @return FolderQuery The current query, for fluid interface
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
     * @param   Folder $folder Object to remove from the list of results
     *
     * @return FolderQuery The current query, for fluid interface
     */
    public function prune($folder = null)
    {
        if ($folder) {
            $this->addUsingAlias(FolderPeer::ID, $folder->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
