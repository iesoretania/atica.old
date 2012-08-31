<?php


/**
 * Base class that represents a query for the 'person' table.
 *
 *
 *
 * @method PersonQuery orderById($order = Criteria::ASC) Order by the id column
 * @method PersonQuery orderByUserName($order = Criteria::ASC) Order by the user_name column
 * @method PersonQuery orderByDisplayName($order = Criteria::ASC) Order by the display_name column
 * @method PersonQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method PersonQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method PersonQuery orderByGender($order = Criteria::ASC) Order by the gender column
 * @method PersonQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method PersonQuery orderByEmailEnabled($order = Criteria::ASC) Order by the email_enabled column
 * @method PersonQuery orderByIsGlobalAdministrator($order = Criteria::ASC) Order by the is_global_administrator column
 * @method PersonQuery orderByToken($order = Criteria::ASC) Order by the token column
 * @method PersonQuery orderByTokenExpiration($order = Criteria::ASC) Order by the token_expiration column
 * @method PersonQuery orderByTokenOperation($order = Criteria::ASC) Order by the token_operation column
 * @method PersonQuery orderByTokenData($order = Criteria::ASC) Order by the token_data column
 * @method PersonQuery orderByBadPasswordCount($order = Criteria::ASC) Order by the bad_password_count column
 * @method PersonQuery orderByBlockedAccess($order = Criteria::ASC) Order by the blocked_access column
 * @method PersonQuery orderByLastLogin($order = Criteria::ASC) Order by the last_login column
 *
 * @method PersonQuery groupById() Group by the id column
 * @method PersonQuery groupByUserName() Group by the user_name column
 * @method PersonQuery groupByDisplayName() Group by the display_name column
 * @method PersonQuery groupByDescription() Group by the description column
 * @method PersonQuery groupByPassword() Group by the password column
 * @method PersonQuery groupByGender() Group by the gender column
 * @method PersonQuery groupByEmail() Group by the email column
 * @method PersonQuery groupByEmailEnabled() Group by the email_enabled column
 * @method PersonQuery groupByIsGlobalAdministrator() Group by the is_global_administrator column
 * @method PersonQuery groupByToken() Group by the token column
 * @method PersonQuery groupByTokenExpiration() Group by the token_expiration column
 * @method PersonQuery groupByTokenOperation() Group by the token_operation column
 * @method PersonQuery groupByTokenData() Group by the token_data column
 * @method PersonQuery groupByBadPasswordCount() Group by the bad_password_count column
 * @method PersonQuery groupByBlockedAccess() Group by the blocked_access column
 * @method PersonQuery groupByLastLogin() Group by the last_login column
 *
 * @method PersonQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PersonQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PersonQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PersonQuery leftJoinCompletedEvent($relationAlias = null) Adds a LEFT JOIN clause to the query using the CompletedEvent relation
 * @method PersonQuery rightJoinCompletedEvent($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CompletedEvent relation
 * @method PersonQuery innerJoinCompletedEvent($relationAlias = null) Adds a INNER JOIN clause to the query using the CompletedEvent relation
 *
 * @method PersonQuery leftJoinNonConformanceRelatedByClosedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the NonConformanceRelatedByClosedBy relation
 * @method PersonQuery rightJoinNonConformanceRelatedByClosedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the NonConformanceRelatedByClosedBy relation
 * @method PersonQuery innerJoinNonConformanceRelatedByClosedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the NonConformanceRelatedByClosedBy relation
 *
 * @method PersonQuery leftJoinNonConformanceRelatedByOpenedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the NonConformanceRelatedByOpenedBy relation
 * @method PersonQuery rightJoinNonConformanceRelatedByOpenedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the NonConformanceRelatedByOpenedBy relation
 * @method PersonQuery innerJoinNonConformanceRelatedByOpenedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the NonConformanceRelatedByOpenedBy relation
 *
 * @method PersonQuery leftJoinPersonOrganization($relationAlias = null) Adds a LEFT JOIN clause to the query using the PersonOrganization relation
 * @method PersonQuery rightJoinPersonOrganization($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PersonOrganization relation
 * @method PersonQuery innerJoinPersonOrganization($relationAlias = null) Adds a INNER JOIN clause to the query using the PersonOrganization relation
 *
 * @method PersonQuery leftJoinPersonPreferences($relationAlias = null) Adds a LEFT JOIN clause to the query using the PersonPreferences relation
 * @method PersonQuery rightJoinPersonPreferences($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PersonPreferences relation
 * @method PersonQuery innerJoinPersonPreferences($relationAlias = null) Adds a INNER JOIN clause to the query using the PersonPreferences relation
 *
 * @method PersonQuery leftJoinPersonProfile($relationAlias = null) Adds a LEFT JOIN clause to the query using the PersonProfile relation
 * @method PersonQuery rightJoinPersonProfile($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PersonProfile relation
 * @method PersonQuery innerJoinPersonProfile($relationAlias = null) Adds a INNER JOIN clause to the query using the PersonProfile relation
 *
 * @method PersonQuery leftJoinRevisionRelatedByApproverPersonId($relationAlias = null) Adds a LEFT JOIN clause to the query using the RevisionRelatedByApproverPersonId relation
 * @method PersonQuery rightJoinRevisionRelatedByApproverPersonId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RevisionRelatedByApproverPersonId relation
 * @method PersonQuery innerJoinRevisionRelatedByApproverPersonId($relationAlias = null) Adds a INNER JOIN clause to the query using the RevisionRelatedByApproverPersonId relation
 *
 * @method PersonQuery leftJoinRevisionRelatedByReviewerPersonId($relationAlias = null) Adds a LEFT JOIN clause to the query using the RevisionRelatedByReviewerPersonId relation
 * @method PersonQuery rightJoinRevisionRelatedByReviewerPersonId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RevisionRelatedByReviewerPersonId relation
 * @method PersonQuery innerJoinRevisionRelatedByReviewerPersonId($relationAlias = null) Adds a INNER JOIN clause to the query using the RevisionRelatedByReviewerPersonId relation
 *
 * @method PersonQuery leftJoinRevisionRelatedByUploaderPersonId($relationAlias = null) Adds a LEFT JOIN clause to the query using the RevisionRelatedByUploaderPersonId relation
 * @method PersonQuery rightJoinRevisionRelatedByUploaderPersonId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RevisionRelatedByUploaderPersonId relation
 * @method PersonQuery innerJoinRevisionRelatedByUploaderPersonId($relationAlias = null) Adds a INNER JOIN clause to the query using the RevisionRelatedByUploaderPersonId relation
 *
 * @method PersonQuery leftJoinSession($relationAlias = null) Adds a LEFT JOIN clause to the query using the Session relation
 * @method PersonQuery rightJoinSession($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Session relation
 * @method PersonQuery innerJoinSession($relationAlias = null) Adds a INNER JOIN clause to the query using the Session relation
 *
 * @method Person findOne(PropelPDO $con = null) Return the first Person matching the query
 * @method Person findOneOrCreate(PropelPDO $con = null) Return the first Person matching the query, or a new Person object populated from the query conditions when no match is found
 *
 * @method Person findOneByUserName(string $user_name) Return the first Person filtered by the user_name column
 * @method Person findOneByDisplayName(string $display_name) Return the first Person filtered by the display_name column
 * @method Person findOneByDescription(string $description) Return the first Person filtered by the description column
 * @method Person findOneByPassword(string $password) Return the first Person filtered by the password column
 * @method Person findOneByGender(int $gender) Return the first Person filtered by the gender column
 * @method Person findOneByEmail(string $email) Return the first Person filtered by the email column
 * @method Person findOneByEmailEnabled(boolean $email_enabled) Return the first Person filtered by the email_enabled column
 * @method Person findOneByIsGlobalAdministrator(boolean $is_global_administrator) Return the first Person filtered by the is_global_administrator column
 * @method Person findOneByToken(string $token) Return the first Person filtered by the token column
 * @method Person findOneByTokenExpiration(string $token_expiration) Return the first Person filtered by the token_expiration column
 * @method Person findOneByTokenOperation(int $token_operation) Return the first Person filtered by the token_operation column
 * @method Person findOneByTokenData(string $token_data) Return the first Person filtered by the token_data column
 * @method Person findOneByBadPasswordCount(int $bad_password_count) Return the first Person filtered by the bad_password_count column
 * @method Person findOneByBlockedAccess(string $blocked_access) Return the first Person filtered by the blocked_access column
 * @method Person findOneByLastLogin(string $last_login) Return the first Person filtered by the last_login column
 *
 * @method array findById(int $id) Return Person objects filtered by the id column
 * @method array findByUserName(string $user_name) Return Person objects filtered by the user_name column
 * @method array findByDisplayName(string $display_name) Return Person objects filtered by the display_name column
 * @method array findByDescription(string $description) Return Person objects filtered by the description column
 * @method array findByPassword(string $password) Return Person objects filtered by the password column
 * @method array findByGender(int $gender) Return Person objects filtered by the gender column
 * @method array findByEmail(string $email) Return Person objects filtered by the email column
 * @method array findByEmailEnabled(boolean $email_enabled) Return Person objects filtered by the email_enabled column
 * @method array findByIsGlobalAdministrator(boolean $is_global_administrator) Return Person objects filtered by the is_global_administrator column
 * @method array findByToken(string $token) Return Person objects filtered by the token column
 * @method array findByTokenExpiration(string $token_expiration) Return Person objects filtered by the token_expiration column
 * @method array findByTokenOperation(int $token_operation) Return Person objects filtered by the token_operation column
 * @method array findByTokenData(string $token_data) Return Person objects filtered by the token_data column
 * @method array findByBadPasswordCount(int $bad_password_count) Return Person objects filtered by the bad_password_count column
 * @method array findByBlockedAccess(string $blocked_access) Return Person objects filtered by the blocked_access column
 * @method array findByLastLogin(string $last_login) Return Person objects filtered by the last_login column
 *
 * @package    propel.generator.atica.om
 */
abstract class BasePersonQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePersonQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'atica', $modelName = 'Person', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PersonQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     PersonQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PersonQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PersonQuery) {
            return $criteria;
        }
        $query = new PersonQuery();
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
     * @return   Person|Person[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PersonPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PersonPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Person A model object, or null if the key is not found
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
     * @return   Person A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `USER_NAME`, `DISPLAY_NAME`, `DESCRIPTION`, `PASSWORD`, `GENDER`, `EMAIL`, `EMAIL_ENABLED`, `IS_GLOBAL_ADMINISTRATOR`, `TOKEN`, `TOKEN_EXPIRATION`, `TOKEN_OPERATION`, `TOKEN_DATA`, `BAD_PASSWORD_COUNT`, `BLOCKED_ACCESS`, `LAST_LOGIN` FROM `person` WHERE `ID` = :p0';
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
            $obj = new Person();
            $obj->hydrate($row);
            PersonPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Person|Person[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Person[]|mixed the list of results, formatted by the current formatter
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
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PersonPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PersonPeer::ID, $keys, Criteria::IN);
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
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(PersonPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the user_name column
     *
     * Example usage:
     * <code>
     * $query->filterByUserName('fooValue');   // WHERE user_name = 'fooValue'
     * $query->filterByUserName('%fooValue%'); // WHERE user_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $userName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByUserName($userName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $userName)) {
                $userName = str_replace('*', '%', $userName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PersonPeer::USER_NAME, $userName, $comparison);
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
     * @return PersonQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PersonPeer::DISPLAY_NAME, $displayName, $comparison);
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
     * @return PersonQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PersonPeer::DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the password column
     *
     * Example usage:
     * <code>
     * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
     * $query->filterByPassword('%fooValue%'); // WHERE password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $password The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $password)) {
                $password = str_replace('*', '%', $password);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PersonPeer::PASSWORD, $password, $comparison);
    }

    /**
     * Filter the query on the gender column
     *
     * Example usage:
     * <code>
     * $query->filterByGender(1234); // WHERE gender = 1234
     * $query->filterByGender(array(12, 34)); // WHERE gender IN (12, 34)
     * $query->filterByGender(array('min' => 12)); // WHERE gender > 12
     * </code>
     *
     * @param     mixed $gender The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByGender($gender = null, $comparison = null)
    {
        if (is_array($gender)) {
            $useMinMax = false;
            if (isset($gender['min'])) {
                $this->addUsingAlias(PersonPeer::GENDER, $gender['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($gender['max'])) {
                $this->addUsingAlias(PersonPeer::GENDER, $gender['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::GENDER, $gender, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $email)) {
                $email = str_replace('*', '%', $email);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PersonPeer::EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the email_enabled column
     *
     * Example usage:
     * <code>
     * $query->filterByEmailEnabled(true); // WHERE email_enabled = true
     * $query->filterByEmailEnabled('yes'); // WHERE email_enabled = true
     * </code>
     *
     * @param     boolean|string $emailEnabled The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByEmailEnabled($emailEnabled = null, $comparison = null)
    {
        if (is_string($emailEnabled)) {
            $email_enabled = in_array(strtolower($emailEnabled), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(PersonPeer::EMAIL_ENABLED, $emailEnabled, $comparison);
    }

    /**
     * Filter the query on the is_global_administrator column
     *
     * Example usage:
     * <code>
     * $query->filterByIsGlobalAdministrator(true); // WHERE is_global_administrator = true
     * $query->filterByIsGlobalAdministrator('yes'); // WHERE is_global_administrator = true
     * </code>
     *
     * @param     boolean|string $isGlobalAdministrator The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByIsGlobalAdministrator($isGlobalAdministrator = null, $comparison = null)
    {
        if (is_string($isGlobalAdministrator)) {
            $is_global_administrator = in_array(strtolower($isGlobalAdministrator), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(PersonPeer::IS_GLOBAL_ADMINISTRATOR, $isGlobalAdministrator, $comparison);
    }

    /**
     * Filter the query on the token column
     *
     * Example usage:
     * <code>
     * $query->filterByToken('fooValue');   // WHERE token = 'fooValue'
     * $query->filterByToken('%fooValue%'); // WHERE token LIKE '%fooValue%'
     * </code>
     *
     * @param     string $token The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByToken($token = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($token)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $token)) {
                $token = str_replace('*', '%', $token);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PersonPeer::TOKEN, $token, $comparison);
    }

    /**
     * Filter the query on the token_expiration column
     *
     * Example usage:
     * <code>
     * $query->filterByTokenExpiration('2011-03-14'); // WHERE token_expiration = '2011-03-14'
     * $query->filterByTokenExpiration('now'); // WHERE token_expiration = '2011-03-14'
     * $query->filterByTokenExpiration(array('max' => 'yesterday')); // WHERE token_expiration > '2011-03-13'
     * </code>
     *
     * @param     mixed $tokenExpiration The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByTokenExpiration($tokenExpiration = null, $comparison = null)
    {
        if (is_array($tokenExpiration)) {
            $useMinMax = false;
            if (isset($tokenExpiration['min'])) {
                $this->addUsingAlias(PersonPeer::TOKEN_EXPIRATION, $tokenExpiration['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tokenExpiration['max'])) {
                $this->addUsingAlias(PersonPeer::TOKEN_EXPIRATION, $tokenExpiration['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::TOKEN_EXPIRATION, $tokenExpiration, $comparison);
    }

    /**
     * Filter the query on the token_operation column
     *
     * Example usage:
     * <code>
     * $query->filterByTokenOperation(1234); // WHERE token_operation = 1234
     * $query->filterByTokenOperation(array(12, 34)); // WHERE token_operation IN (12, 34)
     * $query->filterByTokenOperation(array('min' => 12)); // WHERE token_operation > 12
     * </code>
     *
     * @param     mixed $tokenOperation The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByTokenOperation($tokenOperation = null, $comparison = null)
    {
        if (is_array($tokenOperation)) {
            $useMinMax = false;
            if (isset($tokenOperation['min'])) {
                $this->addUsingAlias(PersonPeer::TOKEN_OPERATION, $tokenOperation['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tokenOperation['max'])) {
                $this->addUsingAlias(PersonPeer::TOKEN_OPERATION, $tokenOperation['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::TOKEN_OPERATION, $tokenOperation, $comparison);
    }

    /**
     * Filter the query on the token_data column
     *
     * Example usage:
     * <code>
     * $query->filterByTokenData('fooValue');   // WHERE token_data = 'fooValue'
     * $query->filterByTokenData('%fooValue%'); // WHERE token_data LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tokenData The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByTokenData($tokenData = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tokenData)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tokenData)) {
                $tokenData = str_replace('*', '%', $tokenData);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PersonPeer::TOKEN_DATA, $tokenData, $comparison);
    }

    /**
     * Filter the query on the bad_password_count column
     *
     * Example usage:
     * <code>
     * $query->filterByBadPasswordCount(1234); // WHERE bad_password_count = 1234
     * $query->filterByBadPasswordCount(array(12, 34)); // WHERE bad_password_count IN (12, 34)
     * $query->filterByBadPasswordCount(array('min' => 12)); // WHERE bad_password_count > 12
     * </code>
     *
     * @param     mixed $badPasswordCount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByBadPasswordCount($badPasswordCount = null, $comparison = null)
    {
        if (is_array($badPasswordCount)) {
            $useMinMax = false;
            if (isset($badPasswordCount['min'])) {
                $this->addUsingAlias(PersonPeer::BAD_PASSWORD_COUNT, $badPasswordCount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($badPasswordCount['max'])) {
                $this->addUsingAlias(PersonPeer::BAD_PASSWORD_COUNT, $badPasswordCount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::BAD_PASSWORD_COUNT, $badPasswordCount, $comparison);
    }

    /**
     * Filter the query on the blocked_access column
     *
     * Example usage:
     * <code>
     * $query->filterByBlockedAccess('2011-03-14'); // WHERE blocked_access = '2011-03-14'
     * $query->filterByBlockedAccess('now'); // WHERE blocked_access = '2011-03-14'
     * $query->filterByBlockedAccess(array('max' => 'yesterday')); // WHERE blocked_access > '2011-03-13'
     * </code>
     *
     * @param     mixed $blockedAccess The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByBlockedAccess($blockedAccess = null, $comparison = null)
    {
        if (is_array($blockedAccess)) {
            $useMinMax = false;
            if (isset($blockedAccess['min'])) {
                $this->addUsingAlias(PersonPeer::BLOCKED_ACCESS, $blockedAccess['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($blockedAccess['max'])) {
                $this->addUsingAlias(PersonPeer::BLOCKED_ACCESS, $blockedAccess['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::BLOCKED_ACCESS, $blockedAccess, $comparison);
    }

    /**
     * Filter the query on the last_login column
     *
     * Example usage:
     * <code>
     * $query->filterByLastLogin('2011-03-14'); // WHERE last_login = '2011-03-14'
     * $query->filterByLastLogin('now'); // WHERE last_login = '2011-03-14'
     * $query->filterByLastLogin(array('max' => 'yesterday')); // WHERE last_login > '2011-03-13'
     * </code>
     *
     * @param     mixed $lastLogin The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByLastLogin($lastLogin = null, $comparison = null)
    {
        if (is_array($lastLogin)) {
            $useMinMax = false;
            if (isset($lastLogin['min'])) {
                $this->addUsingAlias(PersonPeer::LAST_LOGIN, $lastLogin['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastLogin['max'])) {
                $this->addUsingAlias(PersonPeer::LAST_LOGIN, $lastLogin['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::LAST_LOGIN, $lastLogin, $comparison);
    }

    /**
     * Filter the query by a related CompletedEvent object
     *
     * @param   CompletedEvent|PropelObjectCollection $completedEvent  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   PersonQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByCompletedEvent($completedEvent, $comparison = null)
    {
        if ($completedEvent instanceof CompletedEvent) {
            return $this
                ->addUsingAlias(PersonPeer::ID, $completedEvent->getPersonId(), $comparison);
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
     * @return PersonQuery The current query, for fluid interface
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
     * Filter the query by a related NonConformance object
     *
     * @param   NonConformance|PropelObjectCollection $nonConformance  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   PersonQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByNonConformanceRelatedByClosedBy($nonConformance, $comparison = null)
    {
        if ($nonConformance instanceof NonConformance) {
            return $this
                ->addUsingAlias(PersonPeer::ID, $nonConformance->getClosedBy(), $comparison);
        } elseif ($nonConformance instanceof PropelObjectCollection) {
            return $this
                ->useNonConformanceRelatedByClosedByQuery()
                ->filterByPrimaryKeys($nonConformance->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByNonConformanceRelatedByClosedBy() only accepts arguments of type NonConformance or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the NonConformanceRelatedByClosedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function joinNonConformanceRelatedByClosedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('NonConformanceRelatedByClosedBy');

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
            $this->addJoinObject($join, 'NonConformanceRelatedByClosedBy');
        }

        return $this;
    }

    /**
     * Use the NonConformanceRelatedByClosedBy relation NonConformance object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   NonConformanceQuery A secondary query class using the current class as primary query
     */
    public function useNonConformanceRelatedByClosedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinNonConformanceRelatedByClosedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'NonConformanceRelatedByClosedBy', 'NonConformanceQuery');
    }

    /**
     * Filter the query by a related NonConformance object
     *
     * @param   NonConformance|PropelObjectCollection $nonConformance  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   PersonQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByNonConformanceRelatedByOpenedBy($nonConformance, $comparison = null)
    {
        if ($nonConformance instanceof NonConformance) {
            return $this
                ->addUsingAlias(PersonPeer::ID, $nonConformance->getOpenedBy(), $comparison);
        } elseif ($nonConformance instanceof PropelObjectCollection) {
            return $this
                ->useNonConformanceRelatedByOpenedByQuery()
                ->filterByPrimaryKeys($nonConformance->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByNonConformanceRelatedByOpenedBy() only accepts arguments of type NonConformance or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the NonConformanceRelatedByOpenedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function joinNonConformanceRelatedByOpenedBy($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('NonConformanceRelatedByOpenedBy');

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
            $this->addJoinObject($join, 'NonConformanceRelatedByOpenedBy');
        }

        return $this;
    }

    /**
     * Use the NonConformanceRelatedByOpenedBy relation NonConformance object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   NonConformanceQuery A secondary query class using the current class as primary query
     */
    public function useNonConformanceRelatedByOpenedByQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinNonConformanceRelatedByOpenedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'NonConformanceRelatedByOpenedBy', 'NonConformanceQuery');
    }

    /**
     * Filter the query by a related PersonOrganization object
     *
     * @param   PersonOrganization|PropelObjectCollection $personOrganization  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   PersonQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByPersonOrganization($personOrganization, $comparison = null)
    {
        if ($personOrganization instanceof PersonOrganization) {
            return $this
                ->addUsingAlias(PersonPeer::ID, $personOrganization->getPersonId(), $comparison);
        } elseif ($personOrganization instanceof PropelObjectCollection) {
            return $this
                ->usePersonOrganizationQuery()
                ->filterByPrimaryKeys($personOrganization->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPersonOrganization() only accepts arguments of type PersonOrganization or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PersonOrganization relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function joinPersonOrganization($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PersonOrganization');

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
            $this->addJoinObject($join, 'PersonOrganization');
        }

        return $this;
    }

    /**
     * Use the PersonOrganization relation PersonOrganization object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   PersonOrganizationQuery A secondary query class using the current class as primary query
     */
    public function usePersonOrganizationQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPersonOrganization($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PersonOrganization', 'PersonOrganizationQuery');
    }

    /**
     * Filter the query by a related PersonPreferences object
     *
     * @param   PersonPreferences|PropelObjectCollection $personPreferences  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   PersonQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByPersonPreferences($personPreferences, $comparison = null)
    {
        if ($personPreferences instanceof PersonPreferences) {
            return $this
                ->addUsingAlias(PersonPeer::ID, $personPreferences->getPersonId(), $comparison);
        } elseif ($personPreferences instanceof PropelObjectCollection) {
            return $this
                ->usePersonPreferencesQuery()
                ->filterByPrimaryKeys($personPreferences->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPersonPreferences() only accepts arguments of type PersonPreferences or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PersonPreferences relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function joinPersonPreferences($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PersonPreferences');

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
            $this->addJoinObject($join, 'PersonPreferences');
        }

        return $this;
    }

    /**
     * Use the PersonPreferences relation PersonPreferences object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   PersonPreferencesQuery A secondary query class using the current class as primary query
     */
    public function usePersonPreferencesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPersonPreferences($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PersonPreferences', 'PersonPreferencesQuery');
    }

    /**
     * Filter the query by a related PersonProfile object
     *
     * @param   PersonProfile|PropelObjectCollection $personProfile  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   PersonQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByPersonProfile($personProfile, $comparison = null)
    {
        if ($personProfile instanceof PersonProfile) {
            return $this
                ->addUsingAlias(PersonPeer::ID, $personProfile->getPersonId(), $comparison);
        } elseif ($personProfile instanceof PropelObjectCollection) {
            return $this
                ->usePersonProfileQuery()
                ->filterByPrimaryKeys($personProfile->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPersonProfile() only accepts arguments of type PersonProfile or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PersonProfile relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function joinPersonProfile($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PersonProfile');

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
            $this->addJoinObject($join, 'PersonProfile');
        }

        return $this;
    }

    /**
     * Use the PersonProfile relation PersonProfile object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   PersonProfileQuery A secondary query class using the current class as primary query
     */
    public function usePersonProfileQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPersonProfile($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PersonProfile', 'PersonProfileQuery');
    }

    /**
     * Filter the query by a related Revision object
     *
     * @param   Revision|PropelObjectCollection $revision  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   PersonQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByRevisionRelatedByApproverPersonId($revision, $comparison = null)
    {
        if ($revision instanceof Revision) {
            return $this
                ->addUsingAlias(PersonPeer::ID, $revision->getApproverPersonId(), $comparison);
        } elseif ($revision instanceof PropelObjectCollection) {
            return $this
                ->useRevisionRelatedByApproverPersonIdQuery()
                ->filterByPrimaryKeys($revision->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRevisionRelatedByApproverPersonId() only accepts arguments of type Revision or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RevisionRelatedByApproverPersonId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function joinRevisionRelatedByApproverPersonId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RevisionRelatedByApproverPersonId');

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
            $this->addJoinObject($join, 'RevisionRelatedByApproverPersonId');
        }

        return $this;
    }

    /**
     * Use the RevisionRelatedByApproverPersonId relation Revision object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   RevisionQuery A secondary query class using the current class as primary query
     */
    public function useRevisionRelatedByApproverPersonIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRevisionRelatedByApproverPersonId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RevisionRelatedByApproverPersonId', 'RevisionQuery');
    }

    /**
     * Filter the query by a related Revision object
     *
     * @param   Revision|PropelObjectCollection $revision  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   PersonQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByRevisionRelatedByReviewerPersonId($revision, $comparison = null)
    {
        if ($revision instanceof Revision) {
            return $this
                ->addUsingAlias(PersonPeer::ID, $revision->getReviewerPersonId(), $comparison);
        } elseif ($revision instanceof PropelObjectCollection) {
            return $this
                ->useRevisionRelatedByReviewerPersonIdQuery()
                ->filterByPrimaryKeys($revision->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRevisionRelatedByReviewerPersonId() only accepts arguments of type Revision or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RevisionRelatedByReviewerPersonId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function joinRevisionRelatedByReviewerPersonId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RevisionRelatedByReviewerPersonId');

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
            $this->addJoinObject($join, 'RevisionRelatedByReviewerPersonId');
        }

        return $this;
    }

    /**
     * Use the RevisionRelatedByReviewerPersonId relation Revision object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   RevisionQuery A secondary query class using the current class as primary query
     */
    public function useRevisionRelatedByReviewerPersonIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRevisionRelatedByReviewerPersonId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RevisionRelatedByReviewerPersonId', 'RevisionQuery');
    }

    /**
     * Filter the query by a related Revision object
     *
     * @param   Revision|PropelObjectCollection $revision  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   PersonQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByRevisionRelatedByUploaderPersonId($revision, $comparison = null)
    {
        if ($revision instanceof Revision) {
            return $this
                ->addUsingAlias(PersonPeer::ID, $revision->getUploaderPersonId(), $comparison);
        } elseif ($revision instanceof PropelObjectCollection) {
            return $this
                ->useRevisionRelatedByUploaderPersonIdQuery()
                ->filterByPrimaryKeys($revision->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRevisionRelatedByUploaderPersonId() only accepts arguments of type Revision or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RevisionRelatedByUploaderPersonId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function joinRevisionRelatedByUploaderPersonId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RevisionRelatedByUploaderPersonId');

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
            $this->addJoinObject($join, 'RevisionRelatedByUploaderPersonId');
        }

        return $this;
    }

    /**
     * Use the RevisionRelatedByUploaderPersonId relation Revision object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   RevisionQuery A secondary query class using the current class as primary query
     */
    public function useRevisionRelatedByUploaderPersonIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRevisionRelatedByUploaderPersonId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RevisionRelatedByUploaderPersonId', 'RevisionQuery');
    }

    /**
     * Filter the query by a related Session object
     *
     * @param   Session|PropelObjectCollection $session  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   PersonQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBySession($session, $comparison = null)
    {
        if ($session instanceof Session) {
            return $this
                ->addUsingAlias(PersonPeer::ID, $session->getPersonId(), $comparison);
        } elseif ($session instanceof PropelObjectCollection) {
            return $this
                ->useSessionQuery()
                ->filterByPrimaryKeys($session->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySession() only accepts arguments of type Session or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Session relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function joinSession($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Session');

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
            $this->addJoinObject($join, 'Session');
        }

        return $this;
    }

    /**
     * Use the Session relation Session object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SessionQuery A secondary query class using the current class as primary query
     */
    public function useSessionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSession($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Session', 'SessionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Person $person Object to remove from the list of results
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function prune($person = null)
    {
        if ($person) {
            $this->addUsingAlias(PersonPeer::ID, $person->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
