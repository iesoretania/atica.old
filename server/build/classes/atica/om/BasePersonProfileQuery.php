<?php


/**
 * Base class that represents a query for the 'person_profile' table.
 *
 *
 *
 * @method PersonProfileQuery orderByPersonId($order = Criteria::ASC) Order by the person_id column
 * @method PersonProfileQuery orderByProfileId($order = Criteria::ASC) Order by the profile_id column
 *
 * @method PersonProfileQuery groupByPersonId() Group by the person_id column
 * @method PersonProfileQuery groupByProfileId() Group by the profile_id column
 *
 * @method PersonProfileQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PersonProfileQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PersonProfileQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PersonProfileQuery leftJoinProfile($relationAlias = null) Adds a LEFT JOIN clause to the query using the Profile relation
 * @method PersonProfileQuery rightJoinProfile($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Profile relation
 * @method PersonProfileQuery innerJoinProfile($relationAlias = null) Adds a INNER JOIN clause to the query using the Profile relation
 *
 * @method PersonProfileQuery leftJoinPerson($relationAlias = null) Adds a LEFT JOIN clause to the query using the Person relation
 * @method PersonProfileQuery rightJoinPerson($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Person relation
 * @method PersonProfileQuery innerJoinPerson($relationAlias = null) Adds a INNER JOIN clause to the query using the Person relation
 *
 * @method PersonProfile findOne(PropelPDO $con = null) Return the first PersonProfile matching the query
 * @method PersonProfile findOneOrCreate(PropelPDO $con = null) Return the first PersonProfile matching the query, or a new PersonProfile object populated from the query conditions when no match is found
 *
 * @method PersonProfile findOneByPersonId(int $person_id) Return the first PersonProfile filtered by the person_id column
 * @method PersonProfile findOneByProfileId(int $profile_id) Return the first PersonProfile filtered by the profile_id column
 *
 * @method array findByPersonId(int $person_id) Return PersonProfile objects filtered by the person_id column
 * @method array findByProfileId(int $profile_id) Return PersonProfile objects filtered by the profile_id column
 *
 * @package    propel.generator.atica.om
 */
abstract class BasePersonProfileQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePersonProfileQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'atica', $modelName = 'PersonProfile', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PersonProfileQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     PersonProfileQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PersonProfileQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PersonProfileQuery) {
            return $criteria;
        }
        $query = new PersonProfileQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query
                         A Primary key composition: [$person_id, $profile_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   PersonProfile|PersonProfile[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PersonProfilePeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PersonProfilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return   PersonProfile A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `PERSON_ID`, `PROFILE_ID` FROM `person_profile` WHERE `PERSON_ID` = :p0 AND `PROFILE_ID` = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new PersonProfile();
            $obj->hydrate($row);
            PersonProfilePeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return PersonProfile|PersonProfile[]|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|PersonProfile[]|mixed the list of results, formatted by the current formatter
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
     * @return PersonProfileQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(PersonProfilePeer::PERSON_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(PersonProfilePeer::PROFILE_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PersonProfileQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(PersonProfilePeer::PERSON_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(PersonProfilePeer::PROFILE_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
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
     * @see       filterByPerson()
     *
     * @param     mixed $personId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonProfileQuery The current query, for fluid interface
     */
    public function filterByPersonId($personId = null, $comparison = null)
    {
        if (is_array($personId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(PersonProfilePeer::PERSON_ID, $personId, $comparison);
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
     * @return PersonProfileQuery The current query, for fluid interface
     */
    public function filterByProfileId($profileId = null, $comparison = null)
    {
        if (is_array($profileId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(PersonProfilePeer::PROFILE_ID, $profileId, $comparison);
    }

    /**
     * Filter the query by a related Profile object
     *
     * @param   Profile|PropelObjectCollection $profile The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   PersonProfileQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByProfile($profile, $comparison = null)
    {
        if ($profile instanceof Profile) {
            return $this
                ->addUsingAlias(PersonProfilePeer::PROFILE_ID, $profile->getId(), $comparison);
        } elseif ($profile instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PersonProfilePeer::PROFILE_ID, $profile->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return PersonProfileQuery The current query, for fluid interface
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
     * Filter the query by a related Person object
     *
     * @param   Person|PropelObjectCollection $person The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   PersonProfileQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByPerson($person, $comparison = null)
    {
        if ($person instanceof Person) {
            return $this
                ->addUsingAlias(PersonProfilePeer::PERSON_ID, $person->getId(), $comparison);
        } elseif ($person instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PersonProfilePeer::PERSON_ID, $person->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByPerson() only accepts arguments of type Person or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Person relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PersonProfileQuery The current query, for fluid interface
     */
    public function joinPerson($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Person');

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
            $this->addJoinObject($join, 'Person');
        }

        return $this;
    }

    /**
     * Use the Person relation Person object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   PersonQuery A secondary query class using the current class as primary query
     */
    public function usePersonQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPerson($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Person', 'PersonQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   PersonProfile $personProfile Object to remove from the list of results
     *
     * @return PersonProfileQuery The current query, for fluid interface
     */
    public function prune($personProfile = null)
    {
        if ($personProfile) {
            $this->addCond('pruneCond0', $this->getAliasedColName(PersonProfilePeer::PERSON_ID), $personProfile->getPersonId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(PersonProfilePeer::PROFILE_ID), $personProfile->getProfileId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
