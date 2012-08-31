<?php


/**
 * Base class that represents a query for the 'file_extension' table.
 *
 *
 *
 * @method FileExtensionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method FileExtensionQuery orderByMime($order = Criteria::ASC) Order by the mime column
 * @method FileExtensionQuery orderByDisplayName($order = Criteria::ASC) Order by the display_name column
 * @method FileExtensionQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method FileExtensionQuery orderByIcon($order = Criteria::ASC) Order by the icon column
 * @method FileExtensionQuery orderByConvertible($order = Criteria::ASC) Order by the convertible column
 *
 * @method FileExtensionQuery groupById() Group by the id column
 * @method FileExtensionQuery groupByMime() Group by the mime column
 * @method FileExtensionQuery groupByDisplayName() Group by the display_name column
 * @method FileExtensionQuery groupByDescription() Group by the description column
 * @method FileExtensionQuery groupByIcon() Group by the icon column
 * @method FileExtensionQuery groupByConvertible() Group by the convertible column
 *
 * @method FileExtensionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method FileExtensionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method FileExtensionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method FileExtensionQuery leftJoinDocument($relationAlias = null) Adds a LEFT JOIN clause to the query using the Document relation
 * @method FileExtensionQuery rightJoinDocument($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Document relation
 * @method FileExtensionQuery innerJoinDocument($relationAlias = null) Adds a INNER JOIN clause to the query using the Document relation
 *
 * @method FileExtension findOne(PropelPDO $con = null) Return the first FileExtension matching the query
 * @method FileExtension findOneOrCreate(PropelPDO $con = null) Return the first FileExtension matching the query, or a new FileExtension object populated from the query conditions when no match is found
 *
 * @method FileExtension findOneByMime(string $mime) Return the first FileExtension filtered by the mime column
 * @method FileExtension findOneByDisplayName(string $display_name) Return the first FileExtension filtered by the display_name column
 * @method FileExtension findOneByDescription(string $description) Return the first FileExtension filtered by the description column
 * @method FileExtension findOneByIcon(string $icon) Return the first FileExtension filtered by the icon column
 * @method FileExtension findOneByConvertible(boolean $convertible) Return the first FileExtension filtered by the convertible column
 *
 * @method array findById(string $id) Return FileExtension objects filtered by the id column
 * @method array findByMime(string $mime) Return FileExtension objects filtered by the mime column
 * @method array findByDisplayName(string $display_name) Return FileExtension objects filtered by the display_name column
 * @method array findByDescription(string $description) Return FileExtension objects filtered by the description column
 * @method array findByIcon(string $icon) Return FileExtension objects filtered by the icon column
 * @method array findByConvertible(boolean $convertible) Return FileExtension objects filtered by the convertible column
 *
 * @package    propel.generator.atica.om
 */
abstract class BaseFileExtensionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseFileExtensionQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'atica', $modelName = 'FileExtension', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new FileExtensionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     FileExtensionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return FileExtensionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof FileExtensionQuery) {
            return $criteria;
        }
        $query = new FileExtensionQuery();
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
     * @return   FileExtension|FileExtension[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = FileExtensionPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(FileExtensionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   FileExtension A model object, or null if the key is not found
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
     * @return   FileExtension A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `MIME`, `DISPLAY_NAME`, `DESCRIPTION`, `ICON`, `CONVERTIBLE` FROM `file_extension` WHERE `ID` = :p0';
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
            $obj = new FileExtension();
            $obj->hydrate($row);
            FileExtensionPeer::addInstanceToPool($obj, (string) $key);
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
     * @return FileExtension|FileExtension[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|FileExtension[]|mixed the list of results, formatted by the current formatter
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
     * @return FileExtensionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(FileExtensionPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return FileExtensionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(FileExtensionPeer::ID, $keys, Criteria::IN);
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
     * @return FileExtensionQuery The current query, for fluid interface
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

        return $this->addUsingAlias(FileExtensionPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the mime column
     *
     * Example usage:
     * <code>
     * $query->filterByMime('fooValue');   // WHERE mime = 'fooValue'
     * $query->filterByMime('%fooValue%'); // WHERE mime LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mime The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FileExtensionQuery The current query, for fluid interface
     */
    public function filterByMime($mime = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mime)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mime)) {
                $mime = str_replace('*', '%', $mime);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(FileExtensionPeer::MIME, $mime, $comparison);
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
     * @return FileExtensionQuery The current query, for fluid interface
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

        return $this->addUsingAlias(FileExtensionPeer::DISPLAY_NAME, $displayName, $comparison);
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
     * @return FileExtensionQuery The current query, for fluid interface
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

        return $this->addUsingAlias(FileExtensionPeer::DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the icon column
     *
     * Example usage:
     * <code>
     * $query->filterByIcon('fooValue');   // WHERE icon = 'fooValue'
     * $query->filterByIcon('%fooValue%'); // WHERE icon LIKE '%fooValue%'
     * </code>
     *
     * @param     string $icon The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FileExtensionQuery The current query, for fluid interface
     */
    public function filterByIcon($icon = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($icon)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $icon)) {
                $icon = str_replace('*', '%', $icon);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(FileExtensionPeer::ICON, $icon, $comparison);
    }

    /**
     * Filter the query on the convertible column
     *
     * Example usage:
     * <code>
     * $query->filterByConvertible(true); // WHERE convertible = true
     * $query->filterByConvertible('yes'); // WHERE convertible = true
     * </code>
     *
     * @param     boolean|string $convertible The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FileExtensionQuery The current query, for fluid interface
     */
    public function filterByConvertible($convertible = null, $comparison = null)
    {
        if (is_string($convertible)) {
            $convertible = in_array(strtolower($convertible), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(FileExtensionPeer::CONVERTIBLE, $convertible, $comparison);
    }

    /**
     * Filter the query by a related Document object
     *
     * @param   Document|PropelObjectCollection $document  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   FileExtensionQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByDocument($document, $comparison = null)
    {
        if ($document instanceof Document) {
            return $this
                ->addUsingAlias(FileExtensionPeer::ID, $document->getExtensionId(), $comparison);
        } elseif ($document instanceof PropelObjectCollection) {
            return $this
                ->useDocumentQuery()
                ->filterByPrimaryKeys($document->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDocument() only accepts arguments of type Document or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Document relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return FileExtensionQuery The current query, for fluid interface
     */
    public function joinDocument($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Document');

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
            $this->addJoinObject($join, 'Document');
        }

        return $this;
    }

    /**
     * Use the Document relation Document object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   DocumentQuery A secondary query class using the current class as primary query
     */
    public function useDocumentQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinDocument($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Document', 'DocumentQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   FileExtension $fileExtension Object to remove from the list of results
     *
     * @return FileExtensionQuery The current query, for fluid interface
     */
    public function prune($fileExtension = null)
    {
        if ($fileExtension) {
            $this->addUsingAlias(FileExtensionPeer::ID, $fileExtension->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
