<?php


/**
 * Base class that represents a query for the 'log' table.
 *
 *
 *
 * @method LogQuery orderById($order = Criteria::ASC) Order by the id column
 * @method LogQuery orderByIp($order = Criteria::ASC) Order by the ip column
 * @method LogQuery orderByWhen($order = Criteria::ASC) Order by the when column
 * @method LogQuery orderByPersonId($order = Criteria::ASC) Order by the person_id column
 * @method LogQuery orderByOrganizationId($order = Criteria::ASC) Order by the organization_id column
 * @method LogQuery orderByCategoryId($order = Criteria::ASC) Order by the category_id column
 * @method LogQuery orderByGroupingId($order = Criteria::ASC) Order by the grouping_id column
 * @method LogQuery orderByActivityId($order = Criteria::ASC) Order by the activity_id column
 * @method LogQuery orderByEventId($order = Criteria::ASC) Order by the event_id column
 * @method LogQuery orderByFolderId($order = Criteria::ASC) Order by the folder_id column
 * @method LogQuery orderByDeliveryId($order = Criteria::ASC) Order by the delivery_id column
 * @method LogQuery orderByRevisionId($order = Criteria::ASC) Order by the revision_id column
 * @method LogQuery orderByDocumentId($order = Criteria::ASC) Order by the document_id column
 * @method LogQuery orderByKind($order = Criteria::ASC) Order by the kind column
 * @method LogQuery orderByDetail($order = Criteria::ASC) Order by the detail column
 *
 * @method LogQuery groupById() Group by the id column
 * @method LogQuery groupByIp() Group by the ip column
 * @method LogQuery groupByWhen() Group by the when column
 * @method LogQuery groupByPersonId() Group by the person_id column
 * @method LogQuery groupByOrganizationId() Group by the organization_id column
 * @method LogQuery groupByCategoryId() Group by the category_id column
 * @method LogQuery groupByGroupingId() Group by the grouping_id column
 * @method LogQuery groupByActivityId() Group by the activity_id column
 * @method LogQuery groupByEventId() Group by the event_id column
 * @method LogQuery groupByFolderId() Group by the folder_id column
 * @method LogQuery groupByDeliveryId() Group by the delivery_id column
 * @method LogQuery groupByRevisionId() Group by the revision_id column
 * @method LogQuery groupByDocumentId() Group by the document_id column
 * @method LogQuery groupByKind() Group by the kind column
 * @method LogQuery groupByDetail() Group by the detail column
 *
 * @method LogQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method LogQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method LogQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Log findOne(PropelPDO $con = null) Return the first Log matching the query
 * @method Log findOneOrCreate(PropelPDO $con = null) Return the first Log matching the query, or a new Log object populated from the query conditions when no match is found
 *
 * @method Log findOneByIp(string $ip) Return the first Log filtered by the ip column
 * @method Log findOneByWhen(string $when) Return the first Log filtered by the when column
 * @method Log findOneByPersonId(int $person_id) Return the first Log filtered by the person_id column
 * @method Log findOneByOrganizationId(int $organization_id) Return the first Log filtered by the organization_id column
 * @method Log findOneByCategoryId(int $category_id) Return the first Log filtered by the category_id column
 * @method Log findOneByGroupingId(int $grouping_id) Return the first Log filtered by the grouping_id column
 * @method Log findOneByActivityId(int $activity_id) Return the first Log filtered by the activity_id column
 * @method Log findOneByEventId(int $event_id) Return the first Log filtered by the event_id column
 * @method Log findOneByFolderId(int $folder_id) Return the first Log filtered by the folder_id column
 * @method Log findOneByDeliveryId(int $delivery_id) Return the first Log filtered by the delivery_id column
 * @method Log findOneByRevisionId(int $revision_id) Return the first Log filtered by the revision_id column
 * @method Log findOneByDocumentId(int $document_id) Return the first Log filtered by the document_id column
 * @method Log findOneByKind(string $kind) Return the first Log filtered by the kind column
 * @method Log findOneByDetail(string $detail) Return the first Log filtered by the detail column
 *
 * @method array findById(int $id) Return Log objects filtered by the id column
 * @method array findByIp(string $ip) Return Log objects filtered by the ip column
 * @method array findByWhen(string $when) Return Log objects filtered by the when column
 * @method array findByPersonId(int $person_id) Return Log objects filtered by the person_id column
 * @method array findByOrganizationId(int $organization_id) Return Log objects filtered by the organization_id column
 * @method array findByCategoryId(int $category_id) Return Log objects filtered by the category_id column
 * @method array findByGroupingId(int $grouping_id) Return Log objects filtered by the grouping_id column
 * @method array findByActivityId(int $activity_id) Return Log objects filtered by the activity_id column
 * @method array findByEventId(int $event_id) Return Log objects filtered by the event_id column
 * @method array findByFolderId(int $folder_id) Return Log objects filtered by the folder_id column
 * @method array findByDeliveryId(int $delivery_id) Return Log objects filtered by the delivery_id column
 * @method array findByRevisionId(int $revision_id) Return Log objects filtered by the revision_id column
 * @method array findByDocumentId(int $document_id) Return Log objects filtered by the document_id column
 * @method array findByKind(string $kind) Return Log objects filtered by the kind column
 * @method array findByDetail(string $detail) Return Log objects filtered by the detail column
 *
 * @package    propel.generator.atica.om
 */
abstract class BaseLogQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseLogQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'atica', $modelName = 'Log', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new LogQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     LogQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return LogQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof LogQuery) {
            return $criteria;
        }
        $query = new LogQuery();
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
     * @return   Log|Log[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = LogPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(LogPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Log A model object, or null if the key is not found
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
     * @return   Log A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `IP`, `WHEN`, `PERSON_ID`, `ORGANIZATION_ID`, `CATEGORY_ID`, `GROUPING_ID`, `ACTIVITY_ID`, `EVENT_ID`, `FOLDER_ID`, `DELIVERY_ID`, `REVISION_ID`, `DOCUMENT_ID`, `KIND`, `DETAIL` FROM `log` WHERE `ID` = :p0';
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
            $obj = new Log();
            $obj->hydrate($row);
            LogPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Log|Log[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Log[]|mixed the list of results, formatted by the current formatter
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
     * @return LogQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(LogPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return LogQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(LogPeer::ID, $keys, Criteria::IN);
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
     * @return LogQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(LogPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the ip column
     *
     * Example usage:
     * <code>
     * $query->filterByIp('fooValue');   // WHERE ip = 'fooValue'
     * $query->filterByIp('%fooValue%'); // WHERE ip LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ip The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LogQuery The current query, for fluid interface
     */
    public function filterByIp($ip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ip)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ip)) {
                $ip = str_replace('*', '%', $ip);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LogPeer::IP, $ip, $comparison);
    }

    /**
     * Filter the query on the when column
     *
     * Example usage:
     * <code>
     * $query->filterByWhen('2011-03-14'); // WHERE when = '2011-03-14'
     * $query->filterByWhen('now'); // WHERE when = '2011-03-14'
     * $query->filterByWhen(array('max' => 'yesterday')); // WHERE when > '2011-03-13'
     * </code>
     *
     * @param     mixed $when The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LogQuery The current query, for fluid interface
     */
    public function filterByWhen($when = null, $comparison = null)
    {
        if (is_array($when)) {
            $useMinMax = false;
            if (isset($when['min'])) {
                $this->addUsingAlias(LogPeer::WHEN, $when['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($when['max'])) {
                $this->addUsingAlias(LogPeer::WHEN, $when['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LogPeer::WHEN, $when, $comparison);
    }

    /**
     * Filter the query on the person_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPersonId(1234); // WHERE person_id = 1234
     * $query->filterByPersonId(array(12, 34)); // WHERE person_id IN (12, 34)
     * $query->filterByPersonId(array('min' => 12)); // WHERE person_id > 12
     * </code>
     *
     * @param     mixed $personId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LogQuery The current query, for fluid interface
     */
    public function filterByPersonId($personId = null, $comparison = null)
    {
        if (is_array($personId)) {
            $useMinMax = false;
            if (isset($personId['min'])) {
                $this->addUsingAlias(LogPeer::PERSON_ID, $personId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($personId['max'])) {
                $this->addUsingAlias(LogPeer::PERSON_ID, $personId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LogPeer::PERSON_ID, $personId, $comparison);
    }

    /**
     * Filter the query on the organization_id column
     *
     * Example usage:
     * <code>
     * $query->filterByOrganizationId(1234); // WHERE organization_id = 1234
     * $query->filterByOrganizationId(array(12, 34)); // WHERE organization_id IN (12, 34)
     * $query->filterByOrganizationId(array('min' => 12)); // WHERE organization_id > 12
     * </code>
     *
     * @param     mixed $organizationId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LogQuery The current query, for fluid interface
     */
    public function filterByOrganizationId($organizationId = null, $comparison = null)
    {
        if (is_array($organizationId)) {
            $useMinMax = false;
            if (isset($organizationId['min'])) {
                $this->addUsingAlias(LogPeer::ORGANIZATION_ID, $organizationId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($organizationId['max'])) {
                $this->addUsingAlias(LogPeer::ORGANIZATION_ID, $organizationId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LogPeer::ORGANIZATION_ID, $organizationId, $comparison);
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
     * @return LogQuery The current query, for fluid interface
     */
    public function filterByCategoryId($categoryId = null, $comparison = null)
    {
        if (is_array($categoryId)) {
            $useMinMax = false;
            if (isset($categoryId['min'])) {
                $this->addUsingAlias(LogPeer::CATEGORY_ID, $categoryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($categoryId['max'])) {
                $this->addUsingAlias(LogPeer::CATEGORY_ID, $categoryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LogPeer::CATEGORY_ID, $categoryId, $comparison);
    }

    /**
     * Filter the query on the grouping_id column
     *
     * Example usage:
     * <code>
     * $query->filterByGroupingId(1234); // WHERE grouping_id = 1234
     * $query->filterByGroupingId(array(12, 34)); // WHERE grouping_id IN (12, 34)
     * $query->filterByGroupingId(array('min' => 12)); // WHERE grouping_id > 12
     * </code>
     *
     * @param     mixed $groupingId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LogQuery The current query, for fluid interface
     */
    public function filterByGroupingId($groupingId = null, $comparison = null)
    {
        if (is_array($groupingId)) {
            $useMinMax = false;
            if (isset($groupingId['min'])) {
                $this->addUsingAlias(LogPeer::GROUPING_ID, $groupingId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($groupingId['max'])) {
                $this->addUsingAlias(LogPeer::GROUPING_ID, $groupingId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LogPeer::GROUPING_ID, $groupingId, $comparison);
    }

    /**
     * Filter the query on the activity_id column
     *
     * Example usage:
     * <code>
     * $query->filterByActivityId(1234); // WHERE activity_id = 1234
     * $query->filterByActivityId(array(12, 34)); // WHERE activity_id IN (12, 34)
     * $query->filterByActivityId(array('min' => 12)); // WHERE activity_id > 12
     * </code>
     *
     * @param     mixed $activityId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LogQuery The current query, for fluid interface
     */
    public function filterByActivityId($activityId = null, $comparison = null)
    {
        if (is_array($activityId)) {
            $useMinMax = false;
            if (isset($activityId['min'])) {
                $this->addUsingAlias(LogPeer::ACTIVITY_ID, $activityId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($activityId['max'])) {
                $this->addUsingAlias(LogPeer::ACTIVITY_ID, $activityId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LogPeer::ACTIVITY_ID, $activityId, $comparison);
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
     * @param     mixed $eventId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LogQuery The current query, for fluid interface
     */
    public function filterByEventId($eventId = null, $comparison = null)
    {
        if (is_array($eventId)) {
            $useMinMax = false;
            if (isset($eventId['min'])) {
                $this->addUsingAlias(LogPeer::EVENT_ID, $eventId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eventId['max'])) {
                $this->addUsingAlias(LogPeer::EVENT_ID, $eventId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LogPeer::EVENT_ID, $eventId, $comparison);
    }

    /**
     * Filter the query on the folder_id column
     *
     * Example usage:
     * <code>
     * $query->filterByFolderId(1234); // WHERE folder_id = 1234
     * $query->filterByFolderId(array(12, 34)); // WHERE folder_id IN (12, 34)
     * $query->filterByFolderId(array('min' => 12)); // WHERE folder_id > 12
     * </code>
     *
     * @param     mixed $folderId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LogQuery The current query, for fluid interface
     */
    public function filterByFolderId($folderId = null, $comparison = null)
    {
        if (is_array($folderId)) {
            $useMinMax = false;
            if (isset($folderId['min'])) {
                $this->addUsingAlias(LogPeer::FOLDER_ID, $folderId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($folderId['max'])) {
                $this->addUsingAlias(LogPeer::FOLDER_ID, $folderId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LogPeer::FOLDER_ID, $folderId, $comparison);
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
     * @param     mixed $deliveryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LogQuery The current query, for fluid interface
     */
    public function filterByDeliveryId($deliveryId = null, $comparison = null)
    {
        if (is_array($deliveryId)) {
            $useMinMax = false;
            if (isset($deliveryId['min'])) {
                $this->addUsingAlias(LogPeer::DELIVERY_ID, $deliveryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($deliveryId['max'])) {
                $this->addUsingAlias(LogPeer::DELIVERY_ID, $deliveryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LogPeer::DELIVERY_ID, $deliveryId, $comparison);
    }

    /**
     * Filter the query on the revision_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRevisionId(1234); // WHERE revision_id = 1234
     * $query->filterByRevisionId(array(12, 34)); // WHERE revision_id IN (12, 34)
     * $query->filterByRevisionId(array('min' => 12)); // WHERE revision_id > 12
     * </code>
     *
     * @param     mixed $revisionId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LogQuery The current query, for fluid interface
     */
    public function filterByRevisionId($revisionId = null, $comparison = null)
    {
        if (is_array($revisionId)) {
            $useMinMax = false;
            if (isset($revisionId['min'])) {
                $this->addUsingAlias(LogPeer::REVISION_ID, $revisionId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($revisionId['max'])) {
                $this->addUsingAlias(LogPeer::REVISION_ID, $revisionId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LogPeer::REVISION_ID, $revisionId, $comparison);
    }

    /**
     * Filter the query on the document_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDocumentId(1234); // WHERE document_id = 1234
     * $query->filterByDocumentId(array(12, 34)); // WHERE document_id IN (12, 34)
     * $query->filterByDocumentId(array('min' => 12)); // WHERE document_id > 12
     * </code>
     *
     * @param     mixed $documentId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LogQuery The current query, for fluid interface
     */
    public function filterByDocumentId($documentId = null, $comparison = null)
    {
        if (is_array($documentId)) {
            $useMinMax = false;
            if (isset($documentId['min'])) {
                $this->addUsingAlias(LogPeer::DOCUMENT_ID, $documentId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($documentId['max'])) {
                $this->addUsingAlias(LogPeer::DOCUMENT_ID, $documentId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LogPeer::DOCUMENT_ID, $documentId, $comparison);
    }

    /**
     * Filter the query on the kind column
     *
     * Example usage:
     * <code>
     * $query->filterByKind('fooValue');   // WHERE kind = 'fooValue'
     * $query->filterByKind('%fooValue%'); // WHERE kind LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kind The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LogQuery The current query, for fluid interface
     */
    public function filterByKind($kind = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kind)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kind)) {
                $kind = str_replace('*', '%', $kind);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LogPeer::KIND, $kind, $comparison);
    }

    /**
     * Filter the query on the detail column
     *
     * Example usage:
     * <code>
     * $query->filterByDetail('fooValue');   // WHERE detail = 'fooValue'
     * $query->filterByDetail('%fooValue%'); // WHERE detail LIKE '%fooValue%'
     * </code>
     *
     * @param     string $detail The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LogQuery The current query, for fluid interface
     */
    public function filterByDetail($detail = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($detail)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $detail)) {
                $detail = str_replace('*', '%', $detail);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LogPeer::DETAIL, $detail, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Log $log Object to remove from the list of results
     *
     * @return LogQuery The current query, for fluid interface
     */
    public function prune($log = null)
    {
        if ($log) {
            $this->addUsingAlias(LogPeer::ID, $log->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
