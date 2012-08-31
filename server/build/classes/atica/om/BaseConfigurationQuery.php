<?php


/**
 * Base class that represents a query for the 'configuration' table.
 *
 *
 *
 * @method ConfigurationQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ConfigurationQuery orderByOrganizationId($order = Criteria::ASC) Order by the organization_id column
 * @method ConfigurationQuery orderBySnapshotId($order = Criteria::ASC) Order by the snapshot_id column
 * @method ConfigurationQuery orderByContentType($order = Criteria::ASC) Order by the content_type column
 * @method ConfigurationQuery orderByContentSubtype($order = Criteria::ASC) Order by the content_subtype column
 * @method ConfigurationQuery orderByOrderNr($order = Criteria::ASC) Order by the order_nr column
 * @method ConfigurationQuery orderBySectionGroup($order = Criteria::ASC) Order by the section_group column
 * @method ConfigurationQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method ConfigurationQuery orderByContent($order = Criteria::ASC) Order by the content column
 * @method ConfigurationQuery orderByIsOrganizationPreference($order = Criteria::ASC) Order by the is_organization_preference column
 * @method ConfigurationQuery orderByIsSnapshotPreference($order = Criteria::ASC) Order by the is_snapshot_preference column
 *
 * @method ConfigurationQuery groupById() Group by the id column
 * @method ConfigurationQuery groupByOrganizationId() Group by the organization_id column
 * @method ConfigurationQuery groupBySnapshotId() Group by the snapshot_id column
 * @method ConfigurationQuery groupByContentType() Group by the content_type column
 * @method ConfigurationQuery groupByContentSubtype() Group by the content_subtype column
 * @method ConfigurationQuery groupByOrderNr() Group by the order_nr column
 * @method ConfigurationQuery groupBySectionGroup() Group by the section_group column
 * @method ConfigurationQuery groupByDescription() Group by the description column
 * @method ConfigurationQuery groupByContent() Group by the content column
 * @method ConfigurationQuery groupByIsOrganizationPreference() Group by the is_organization_preference column
 * @method ConfigurationQuery groupByIsSnapshotPreference() Group by the is_snapshot_preference column
 *
 * @method ConfigurationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ConfigurationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ConfigurationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ConfigurationQuery leftJoinOrganization($relationAlias = null) Adds a LEFT JOIN clause to the query using the Organization relation
 * @method ConfigurationQuery rightJoinOrganization($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Organization relation
 * @method ConfigurationQuery innerJoinOrganization($relationAlias = null) Adds a INNER JOIN clause to the query using the Organization relation
 *
 * @method ConfigurationQuery leftJoinSnapshot($relationAlias = null) Adds a LEFT JOIN clause to the query using the Snapshot relation
 * @method ConfigurationQuery rightJoinSnapshot($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Snapshot relation
 * @method ConfigurationQuery innerJoinSnapshot($relationAlias = null) Adds a INNER JOIN clause to the query using the Snapshot relation
 *
 * @method Configuration findOne(PropelPDO $con = null) Return the first Configuration matching the query
 * @method Configuration findOneOrCreate(PropelPDO $con = null) Return the first Configuration matching the query, or a new Configuration object populated from the query conditions when no match is found
 *
 * @method Configuration findOneByOrganizationId(int $organization_id) Return the first Configuration filtered by the organization_id column
 * @method Configuration findOneBySnapshotId(int $snapshot_id) Return the first Configuration filtered by the snapshot_id column
 * @method Configuration findOneByContentType(int $content_type) Return the first Configuration filtered by the content_type column
 * @method Configuration findOneByContentSubtype(int $content_subtype) Return the first Configuration filtered by the content_subtype column
 * @method Configuration findOneByOrderNr(int $order_nr) Return the first Configuration filtered by the order_nr column
 * @method Configuration findOneBySectionGroup(string $section_group) Return the first Configuration filtered by the section_group column
 * @method Configuration findOneByDescription(string $description) Return the first Configuration filtered by the description column
 * @method Configuration findOneByContent(string $content) Return the first Configuration filtered by the content column
 * @method Configuration findOneByIsOrganizationPreference(boolean $is_organization_preference) Return the first Configuration filtered by the is_organization_preference column
 * @method Configuration findOneByIsSnapshotPreference(boolean $is_snapshot_preference) Return the first Configuration filtered by the is_snapshot_preference column
 *
 * @method array findById(string $id) Return Configuration objects filtered by the id column
 * @method array findByOrganizationId(int $organization_id) Return Configuration objects filtered by the organization_id column
 * @method array findBySnapshotId(int $snapshot_id) Return Configuration objects filtered by the snapshot_id column
 * @method array findByContentType(int $content_type) Return Configuration objects filtered by the content_type column
 * @method array findByContentSubtype(int $content_subtype) Return Configuration objects filtered by the content_subtype column
 * @method array findByOrderNr(int $order_nr) Return Configuration objects filtered by the order_nr column
 * @method array findBySectionGroup(string $section_group) Return Configuration objects filtered by the section_group column
 * @method array findByDescription(string $description) Return Configuration objects filtered by the description column
 * @method array findByContent(string $content) Return Configuration objects filtered by the content column
 * @method array findByIsOrganizationPreference(boolean $is_organization_preference) Return Configuration objects filtered by the is_organization_preference column
 * @method array findByIsSnapshotPreference(boolean $is_snapshot_preference) Return Configuration objects filtered by the is_snapshot_preference column
 *
 * @package    propel.generator.atica.om
 */
abstract class BaseConfigurationQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseConfigurationQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'atica', $modelName = 'Configuration', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ConfigurationQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     ConfigurationQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ConfigurationQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ConfigurationQuery) {
            return $criteria;
        }
        $query = new ConfigurationQuery();
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
     * @return   Configuration|Configuration[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ConfigurationPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ConfigurationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Configuration A model object, or null if the key is not found
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
     * @return   Configuration A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `ORGANIZATION_ID`, `SNAPSHOT_ID`, `CONTENT_TYPE`, `CONTENT_SUBTYPE`, `ORDER_NR`, `SECTION_GROUP`, `DESCRIPTION`, `CONTENT`, `IS_ORGANIZATION_PREFERENCE`, `IS_SNAPSHOT_PREFERENCE` FROM `configuration` WHERE `ID` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Configuration();
            $obj->hydrate($row);
            ConfigurationPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Configuration|Configuration[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Configuration[]|mixed the list of results, formatted by the current formatter
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
     * @return ConfigurationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ConfigurationPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ConfigurationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ConfigurationPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById('fooValue');   // WHERE id = 'fooValue'
     * $query->filterById('%fooValue%'); // WHERE id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $id The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ConfigurationQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($id)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $id)) {
                $id = str_replace('*', '%', $id);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ConfigurationPeer::ID, $id, $comparison);
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
     * @see       filterByOrganization()
     *
     * @param     mixed $organizationId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ConfigurationQuery The current query, for fluid interface
     */
    public function filterByOrganizationId($organizationId = null, $comparison = null)
    {
        if (is_array($organizationId)) {
            $useMinMax = false;
            if (isset($organizationId['min'])) {
                $this->addUsingAlias(ConfigurationPeer::ORGANIZATION_ID, $organizationId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($organizationId['max'])) {
                $this->addUsingAlias(ConfigurationPeer::ORGANIZATION_ID, $organizationId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ConfigurationPeer::ORGANIZATION_ID, $organizationId, $comparison);
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
     * @return ConfigurationQuery The current query, for fluid interface
     */
    public function filterBySnapshotId($snapshotId = null, $comparison = null)
    {
        if (is_array($snapshotId)) {
            $useMinMax = false;
            if (isset($snapshotId['min'])) {
                $this->addUsingAlias(ConfigurationPeer::SNAPSHOT_ID, $snapshotId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($snapshotId['max'])) {
                $this->addUsingAlias(ConfigurationPeer::SNAPSHOT_ID, $snapshotId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ConfigurationPeer::SNAPSHOT_ID, $snapshotId, $comparison);
    }

    /**
     * Filter the query on the content_type column
     *
     * Example usage:
     * <code>
     * $query->filterByContentType(1234); // WHERE content_type = 1234
     * $query->filterByContentType(array(12, 34)); // WHERE content_type IN (12, 34)
     * $query->filterByContentType(array('min' => 12)); // WHERE content_type > 12
     * </code>
     *
     * @param     mixed $contentType The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ConfigurationQuery The current query, for fluid interface
     */
    public function filterByContentType($contentType = null, $comparison = null)
    {
        if (is_array($contentType)) {
            $useMinMax = false;
            if (isset($contentType['min'])) {
                $this->addUsingAlias(ConfigurationPeer::CONTENT_TYPE, $contentType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($contentType['max'])) {
                $this->addUsingAlias(ConfigurationPeer::CONTENT_TYPE, $contentType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ConfigurationPeer::CONTENT_TYPE, $contentType, $comparison);
    }

    /**
     * Filter the query on the content_subtype column
     *
     * Example usage:
     * <code>
     * $query->filterByContentSubtype(1234); // WHERE content_subtype = 1234
     * $query->filterByContentSubtype(array(12, 34)); // WHERE content_subtype IN (12, 34)
     * $query->filterByContentSubtype(array('min' => 12)); // WHERE content_subtype > 12
     * </code>
     *
     * @param     mixed $contentSubtype The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ConfigurationQuery The current query, for fluid interface
     */
    public function filterByContentSubtype($contentSubtype = null, $comparison = null)
    {
        if (is_array($contentSubtype)) {
            $useMinMax = false;
            if (isset($contentSubtype['min'])) {
                $this->addUsingAlias(ConfigurationPeer::CONTENT_SUBTYPE, $contentSubtype['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($contentSubtype['max'])) {
                $this->addUsingAlias(ConfigurationPeer::CONTENT_SUBTYPE, $contentSubtype['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ConfigurationPeer::CONTENT_SUBTYPE, $contentSubtype, $comparison);
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
     * @return ConfigurationQuery The current query, for fluid interface
     */
    public function filterByOrderNr($orderNr = null, $comparison = null)
    {
        if (is_array($orderNr)) {
            $useMinMax = false;
            if (isset($orderNr['min'])) {
                $this->addUsingAlias(ConfigurationPeer::ORDER_NR, $orderNr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderNr['max'])) {
                $this->addUsingAlias(ConfigurationPeer::ORDER_NR, $orderNr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ConfigurationPeer::ORDER_NR, $orderNr, $comparison);
    }

    /**
     * Filter the query on the section_group column
     *
     * Example usage:
     * <code>
     * $query->filterBySectionGroup('fooValue');   // WHERE section_group = 'fooValue'
     * $query->filterBySectionGroup('%fooValue%'); // WHERE section_group LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sectionGroup The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ConfigurationQuery The current query, for fluid interface
     */
    public function filterBySectionGroup($sectionGroup = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sectionGroup)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $sectionGroup)) {
                $sectionGroup = str_replace('*', '%', $sectionGroup);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ConfigurationPeer::SECTION_GROUP, $sectionGroup, $comparison);
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
     * @return ConfigurationQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ConfigurationPeer::DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the content column
     *
     * Example usage:
     * <code>
     * $query->filterByContent('fooValue');   // WHERE content = 'fooValue'
     * $query->filterByContent('%fooValue%'); // WHERE content LIKE '%fooValue%'
     * </code>
     *
     * @param     string $content The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ConfigurationQuery The current query, for fluid interface
     */
    public function filterByContent($content = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($content)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $content)) {
                $content = str_replace('*', '%', $content);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ConfigurationPeer::CONTENT, $content, $comparison);
    }

    /**
     * Filter the query on the is_organization_preference column
     *
     * Example usage:
     * <code>
     * $query->filterByIsOrganizationPreference(true); // WHERE is_organization_preference = true
     * $query->filterByIsOrganizationPreference('yes'); // WHERE is_organization_preference = true
     * </code>
     *
     * @param     boolean|string $isOrganizationPreference The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ConfigurationQuery The current query, for fluid interface
     */
    public function filterByIsOrganizationPreference($isOrganizationPreference = null, $comparison = null)
    {
        if (is_string($isOrganizationPreference)) {
            $is_organization_preference = in_array(strtolower($isOrganizationPreference), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ConfigurationPeer::IS_ORGANIZATION_PREFERENCE, $isOrganizationPreference, $comparison);
    }

    /**
     * Filter the query on the is_snapshot_preference column
     *
     * Example usage:
     * <code>
     * $query->filterByIsSnapshotPreference(true); // WHERE is_snapshot_preference = true
     * $query->filterByIsSnapshotPreference('yes'); // WHERE is_snapshot_preference = true
     * </code>
     *
     * @param     boolean|string $isSnapshotPreference The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ConfigurationQuery The current query, for fluid interface
     */
    public function filterByIsSnapshotPreference($isSnapshotPreference = null, $comparison = null)
    {
        if (is_string($isSnapshotPreference)) {
            $is_snapshot_preference = in_array(strtolower($isSnapshotPreference), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ConfigurationPeer::IS_SNAPSHOT_PREFERENCE, $isSnapshotPreference, $comparison);
    }

    /**
     * Filter the query by a related Organization object
     *
     * @param   Organization|PropelObjectCollection $organization The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ConfigurationQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByOrganization($organization, $comparison = null)
    {
        if ($organization instanceof Organization) {
            return $this
                ->addUsingAlias(ConfigurationPeer::ORGANIZATION_ID, $organization->getId(), $comparison);
        } elseif ($organization instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ConfigurationPeer::ORGANIZATION_ID, $organization->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByOrganization() only accepts arguments of type Organization or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Organization relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ConfigurationQuery The current query, for fluid interface
     */
    public function joinOrganization($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Organization');

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
            $this->addJoinObject($join, 'Organization');
        }

        return $this;
    }

    /**
     * Use the Organization relation Organization object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   OrganizationQuery A secondary query class using the current class as primary query
     */
    public function useOrganizationQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinOrganization($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Organization', 'OrganizationQuery');
    }

    /**
     * Filter the query by a related Snapshot object
     *
     * @param   Snapshot|PropelObjectCollection $snapshot The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ConfigurationQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBySnapshot($snapshot, $comparison = null)
    {
        if ($snapshot instanceof Snapshot) {
            return $this
                ->addUsingAlias(ConfigurationPeer::SNAPSHOT_ID, $snapshot->getId(), $comparison);
        } elseif ($snapshot instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ConfigurationPeer::SNAPSHOT_ID, $snapshot->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return ConfigurationQuery The current query, for fluid interface
     */
    public function joinSnapshot($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useSnapshotQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSnapshot($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Snapshot', 'SnapshotQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Configuration $configuration Object to remove from the list of results
     *
     * @return ConfigurationQuery The current query, for fluid interface
     */
    public function prune($configuration = null)
    {
        if ($configuration) {
            $this->addUsingAlias(ConfigurationPeer::ID, $configuration->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // sortable behavior

    /**
     * Filter the query based on a rank in the list
     *
     * @param     integer   $rank rank
     *
     * @return    ConfigurationQuery The current query, for fluid interface
     */
    public function filterByRank($rank)
    {
        return $this
            ->addUsingAlias(ConfigurationPeer::RANK_COL, $rank, Criteria::EQUAL);
    }

    /**
     * Order the query based on the rank in the list.
     * Using the default $order, returns the item with the lowest rank first
     *
     * @param     string $order either Criteria::ASC (default) or Criteria::DESC
     *
     * @return    ConfigurationQuery The current query, for fluid interface
     */
    public function orderByRank($order = Criteria::ASC)
    {
        $order = strtoupper($order);
        switch ($order) {
            case Criteria::ASC:
                return $this->addAscendingOrderByColumn($this->getAliasedColName(ConfigurationPeer::RANK_COL));
                break;
            case Criteria::DESC:
                return $this->addDescendingOrderByColumn($this->getAliasedColName(ConfigurationPeer::RANK_COL));
                break;
            default:
                throw new PropelException('ConfigurationQuery::orderBy() only accepts "asc" or "desc" as argument');
        }
    }

    /**
     * Get an item from the list based on its rank
     *
     * @param     integer   $rank rank
     * @param     PropelPDO $con optional connection
     *
     * @return    Configuration
     */
    public function findOneByRank($rank, PropelPDO $con = null)
    {
        return $this
            ->filterByRank($rank)
            ->findOne($con);
    }

    /**
     * Returns the list of objects
     *
     * @param      PropelPDO $con	Connection to use.
     *
     * @return     mixed the list of results, formatted by the current formatter
     */
    public function findList($con = null)
    {
        return $this
            ->orderByRank()
            ->find($con);
    }

    /**
     * Get the highest rank
     *
     * @param     PropelPDO optional connection
     *
     * @return    integer highest position
     */
    public function getMaxRank(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ConfigurationPeer::DATABASE_NAME);
        }
        // shift the objects with a position lower than the one of object
        $this->addSelectColumn('MAX(' . ConfigurationPeer::RANK_COL . ')');
        $stmt = $this->doSelect($con);

        return $stmt->fetchColumn();
    }

    /**
     * Reorder a set of sortable objects based on a list of id/position
     * Beware that there is no check made on the positions passed
     * So incoherent positions will result in an incoherent list
     *
     * @param     array     $order id => rank pairs
     * @param     PropelPDO $con   optional connection
     *
     * @return    boolean true if the reordering took place, false if a database problem prevented it
     */
    public function reorder(array $order, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ConfigurationPeer::DATABASE_NAME);
        }

        $con->beginTransaction();
        try {
            $ids = array_keys($order);
            $objects = $this->findPks($ids, $con);
            foreach ($objects as $object) {
                $pk = $object->getPrimaryKey();
                if ($object->getOrderNr() != $order[$pk]) {
                    $object->setOrderNr($order[$pk]);
                    $object->save($con);
                }
            }
            $con->commit();

            return true;
        } catch (PropelException $e) {
            $con->rollback();
            throw $e;
        }
    }

}
