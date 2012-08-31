<?php


/**
 * Base class that represents a query for the 'folder_permission' table.
 *
 *
 *
 * @method FolderPermissionQuery orderByFolderId($order = Criteria::ASC) Order by the folder_id column
 * @method FolderPermissionQuery orderByProfileGroupId($order = Criteria::ASC) Order by the profile_group_id column
 * @method FolderPermissionQuery orderByPermission($order = Criteria::ASC) Order by the permission column
 *
 * @method FolderPermissionQuery groupByFolderId() Group by the folder_id column
 * @method FolderPermissionQuery groupByProfileGroupId() Group by the profile_group_id column
 * @method FolderPermissionQuery groupByPermission() Group by the permission column
 *
 * @method FolderPermissionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method FolderPermissionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method FolderPermissionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method FolderPermissionQuery leftJoinProfileGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProfileGroup relation
 * @method FolderPermissionQuery rightJoinProfileGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProfileGroup relation
 * @method FolderPermissionQuery innerJoinProfileGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the ProfileGroup relation
 *
 * @method FolderPermissionQuery leftJoinFolder($relationAlias = null) Adds a LEFT JOIN clause to the query using the Folder relation
 * @method FolderPermissionQuery rightJoinFolder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Folder relation
 * @method FolderPermissionQuery innerJoinFolder($relationAlias = null) Adds a INNER JOIN clause to the query using the Folder relation
 *
 * @method FolderPermission findOne(PropelPDO $con = null) Return the first FolderPermission matching the query
 * @method FolderPermission findOneOrCreate(PropelPDO $con = null) Return the first FolderPermission matching the query, or a new FolderPermission object populated from the query conditions when no match is found
 *
 * @method FolderPermission findOneByFolderId(int $folder_id) Return the first FolderPermission filtered by the folder_id column
 * @method FolderPermission findOneByProfileGroupId(int $profile_group_id) Return the first FolderPermission filtered by the profile_group_id column
 * @method FolderPermission findOneByPermission(int $permission) Return the first FolderPermission filtered by the permission column
 *
 * @method array findByFolderId(int $folder_id) Return FolderPermission objects filtered by the folder_id column
 * @method array findByProfileGroupId(int $profile_group_id) Return FolderPermission objects filtered by the profile_group_id column
 * @method array findByPermission(int $permission) Return FolderPermission objects filtered by the permission column
 *
 * @package    propel.generator.atica.om
 */
abstract class BaseFolderPermissionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseFolderPermissionQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'atica', $modelName = 'FolderPermission', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new FolderPermissionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     FolderPermissionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return FolderPermissionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof FolderPermissionQuery) {
            return $criteria;
        }
        $query = new FolderPermissionQuery();
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
     * $obj = $c->findPk(array(12, 34, 56), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query
                         A Primary key composition: [$folder_id, $profile_group_id, $permission]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   FolderPermission|FolderPermission[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = FolderPermissionPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1], (string) $key[2]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(FolderPermissionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   FolderPermission A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `FOLDER_ID`, `PROFILE_GROUP_ID`, `PERMISSION` FROM `folder_permission` WHERE `FOLDER_ID` = :p0 AND `PROFILE_GROUP_ID` = :p1 AND `PERMISSION` = :p2';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->bindValue(':p2', $key[2], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new FolderPermission();
            $obj->hydrate($row);
            FolderPermissionPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1], (string) $key[2])));
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
     * @return FolderPermission|FolderPermission[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|FolderPermission[]|mixed the list of results, formatted by the current formatter
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
     * @return FolderPermissionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(FolderPermissionPeer::FOLDER_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(FolderPermissionPeer::PROFILE_GROUP_ID, $key[1], Criteria::EQUAL);
        $this->addUsingAlias(FolderPermissionPeer::PERMISSION, $key[2], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return FolderPermissionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(FolderPermissionPeer::FOLDER_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(FolderPermissionPeer::PROFILE_GROUP_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $cton2 = $this->getNewCriterion(FolderPermissionPeer::PERMISSION, $key[2], Criteria::EQUAL);
            $cton0->addAnd($cton2);
            $this->addOr($cton0);
        }

        return $this;
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
     * @see       filterByFolder()
     *
     * @param     mixed $folderId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FolderPermissionQuery The current query, for fluid interface
     */
    public function filterByFolderId($folderId = null, $comparison = null)
    {
        if (is_array($folderId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(FolderPermissionPeer::FOLDER_ID, $folderId, $comparison);
    }

    /**
     * Filter the query on the profile_group_id column
     *
     * Example usage:
     * <code>
     * $query->filterByProfileGroupId(1234); // WHERE profile_group_id = 1234
     * $query->filterByProfileGroupId(array(12, 34)); // WHERE profile_group_id IN (12, 34)
     * $query->filterByProfileGroupId(array('min' => 12)); // WHERE profile_group_id > 12
     * </code>
     *
     * @see       filterByProfileGroup()
     *
     * @param     mixed $profileGroupId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FolderPermissionQuery The current query, for fluid interface
     */
    public function filterByProfileGroupId($profileGroupId = null, $comparison = null)
    {
        if (is_array($profileGroupId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(FolderPermissionPeer::PROFILE_GROUP_ID, $profileGroupId, $comparison);
    }

    /**
     * Filter the query on the permission column
     *
     * @param     mixed $permission The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FolderPermissionQuery The current query, for fluid interface
     * @throws PropelException - if the value is not accepted by the enum.
     */
    public function filterByPermission($permission = null, $comparison = null)
    {
        $valueSet = FolderPermissionPeer::getValueSet(FolderPermissionPeer::PERMISSION);
        if (is_scalar($permission)) {
            if (!in_array($permission, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $permission));
            }
            $permission = array_search($permission, $valueSet);
        } elseif (is_array($permission)) {
            $convertedValues = array();
            foreach ($permission as $value) {
                if (!in_array($value, $valueSet)) {
                    throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $value));
                }
                $convertedValues []= array_search($value, $valueSet);
            }
            $permission = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FolderPermissionPeer::PERMISSION, $permission, $comparison);
    }

    /**
     * Filter the query by a related ProfileGroup object
     *
     * @param   ProfileGroup|PropelObjectCollection $profileGroup The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   FolderPermissionQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByProfileGroup($profileGroup, $comparison = null)
    {
        if ($profileGroup instanceof ProfileGroup) {
            return $this
                ->addUsingAlias(FolderPermissionPeer::PROFILE_GROUP_ID, $profileGroup->getId(), $comparison);
        } elseif ($profileGroup instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(FolderPermissionPeer::PROFILE_GROUP_ID, $profileGroup->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByProfileGroup() only accepts arguments of type ProfileGroup or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ProfileGroup relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return FolderPermissionQuery The current query, for fluid interface
     */
    public function joinProfileGroup($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ProfileGroup');

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
            $this->addJoinObject($join, 'ProfileGroup');
        }

        return $this;
    }

    /**
     * Use the ProfileGroup relation ProfileGroup object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProfileGroupQuery A secondary query class using the current class as primary query
     */
    public function useProfileGroupQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProfileGroup($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ProfileGroup', 'ProfileGroupQuery');
    }

    /**
     * Filter the query by a related Folder object
     *
     * @param   Folder|PropelObjectCollection $folder The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   FolderPermissionQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByFolder($folder, $comparison = null)
    {
        if ($folder instanceof Folder) {
            return $this
                ->addUsingAlias(FolderPermissionPeer::FOLDER_ID, $folder->getId(), $comparison);
        } elseif ($folder instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(FolderPermissionPeer::FOLDER_ID, $folder->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByFolder() only accepts arguments of type Folder or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Folder relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return FolderPermissionQuery The current query, for fluid interface
     */
    public function joinFolder($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Folder');

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
            $this->addJoinObject($join, 'Folder');
        }

        return $this;
    }

    /**
     * Use the Folder relation Folder object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   FolderQuery A secondary query class using the current class as primary query
     */
    public function useFolderQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinFolder($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Folder', 'FolderQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   FolderPermission $folderPermission Object to remove from the list of results
     *
     * @return FolderPermissionQuery The current query, for fluid interface
     */
    public function prune($folderPermission = null)
    {
        if ($folderPermission) {
            $this->addCond('pruneCond0', $this->getAliasedColName(FolderPermissionPeer::FOLDER_ID), $folderPermission->getFolderId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(FolderPermissionPeer::PROFILE_GROUP_ID), $folderPermission->getProfileGroupId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond2', $this->getAliasedColName(FolderPermissionPeer::PERMISSION), $folderPermission->getPermission(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
