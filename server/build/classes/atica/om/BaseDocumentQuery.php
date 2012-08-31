<?php


/**
 * Base class that represents a query for the 'document' table.
 *
 *
 *
 * @method DocumentQuery orderById($order = Criteria::ASC) Order by the id column
 * @method DocumentQuery orderByRevisionId($order = Criteria::ASC) Order by the revision_id column
 * @method DocumentQuery orderByDownloadFilename($order = Criteria::ASC) Order by the download_filename column
 * @method DocumentQuery orderByExtensionId($order = Criteria::ASC) Order by the extension_id column
 * @method DocumentQuery orderByDownloadPath($order = Criteria::ASC) Order by the download_path column
 * @method DocumentQuery orderByDownloadFilesize($order = Criteria::ASC) Order by the download_filesize column
 * @method DocumentQuery orderByBinaryData($order = Criteria::ASC) Order by the binary_data column
 *
 * @method DocumentQuery groupById() Group by the id column
 * @method DocumentQuery groupByRevisionId() Group by the revision_id column
 * @method DocumentQuery groupByDownloadFilename() Group by the download_filename column
 * @method DocumentQuery groupByExtensionId() Group by the extension_id column
 * @method DocumentQuery groupByDownloadPath() Group by the download_path column
 * @method DocumentQuery groupByDownloadFilesize() Group by the download_filesize column
 * @method DocumentQuery groupByBinaryData() Group by the binary_data column
 *
 * @method DocumentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method DocumentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method DocumentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method DocumentQuery leftJoinFileExtension($relationAlias = null) Adds a LEFT JOIN clause to the query using the FileExtension relation
 * @method DocumentQuery rightJoinFileExtension($relationAlias = null) Adds a RIGHT JOIN clause to the query using the FileExtension relation
 * @method DocumentQuery innerJoinFileExtension($relationAlias = null) Adds a INNER JOIN clause to the query using the FileExtension relation
 *
 * @method DocumentQuery leftJoinRevision($relationAlias = null) Adds a LEFT JOIN clause to the query using the Revision relation
 * @method DocumentQuery rightJoinRevision($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Revision relation
 * @method DocumentQuery innerJoinRevision($relationAlias = null) Adds a INNER JOIN clause to the query using the Revision relation
 *
 * @method Document findOne(PropelPDO $con = null) Return the first Document matching the query
 * @method Document findOneOrCreate(PropelPDO $con = null) Return the first Document matching the query, or a new Document object populated from the query conditions when no match is found
 *
 * @method Document findOneByRevisionId(int $revision_id) Return the first Document filtered by the revision_id column
 * @method Document findOneByDownloadFilename(string $download_filename) Return the first Document filtered by the download_filename column
 * @method Document findOneByExtensionId(string $extension_id) Return the first Document filtered by the extension_id column
 * @method Document findOneByDownloadPath(string $download_path) Return the first Document filtered by the download_path column
 * @method Document findOneByDownloadFilesize(int $download_filesize) Return the first Document filtered by the download_filesize column
 * @method Document findOneByBinaryData(resource $binary_data) Return the first Document filtered by the binary_data column
 *
 * @method array findById(int $id) Return Document objects filtered by the id column
 * @method array findByRevisionId(int $revision_id) Return Document objects filtered by the revision_id column
 * @method array findByDownloadFilename(string $download_filename) Return Document objects filtered by the download_filename column
 * @method array findByExtensionId(string $extension_id) Return Document objects filtered by the extension_id column
 * @method array findByDownloadPath(string $download_path) Return Document objects filtered by the download_path column
 * @method array findByDownloadFilesize(int $download_filesize) Return Document objects filtered by the download_filesize column
 * @method array findByBinaryData(resource $binary_data) Return Document objects filtered by the binary_data column
 *
 * @package    propel.generator.atica.om
 */
abstract class BaseDocumentQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseDocumentQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'atica', $modelName = 'Document', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new DocumentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     DocumentQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return DocumentQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof DocumentQuery) {
            return $criteria;
        }
        $query = new DocumentQuery();
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
     * @return   Document|Document[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = DocumentPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(DocumentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Document A model object, or null if the key is not found
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
     * @return   Document A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `REVISION_ID`, `DOWNLOAD_FILENAME`, `EXTENSION_ID`, `DOWNLOAD_PATH`, `DOWNLOAD_FILESIZE`, `BINARY_DATA` FROM `document` WHERE `ID` = :p0';
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
            $obj = new Document();
            $obj->hydrate($row);
            DocumentPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Document|Document[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Document[]|mixed the list of results, formatted by the current formatter
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
     * @return DocumentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DocumentPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return DocumentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DocumentPeer::ID, $keys, Criteria::IN);
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
     * @return DocumentQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(DocumentPeer::ID, $id, $comparison);
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
     * @see       filterByRevision()
     *
     * @param     mixed $revisionId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DocumentQuery The current query, for fluid interface
     */
    public function filterByRevisionId($revisionId = null, $comparison = null)
    {
        if (is_array($revisionId)) {
            $useMinMax = false;
            if (isset($revisionId['min'])) {
                $this->addUsingAlias(DocumentPeer::REVISION_ID, $revisionId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($revisionId['max'])) {
                $this->addUsingAlias(DocumentPeer::REVISION_ID, $revisionId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DocumentPeer::REVISION_ID, $revisionId, $comparison);
    }

    /**
     * Filter the query on the download_filename column
     *
     * Example usage:
     * <code>
     * $query->filterByDownloadFilename('fooValue');   // WHERE download_filename = 'fooValue'
     * $query->filterByDownloadFilename('%fooValue%'); // WHERE download_filename LIKE '%fooValue%'
     * </code>
     *
     * @param     string $downloadFilename The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DocumentQuery The current query, for fluid interface
     */
    public function filterByDownloadFilename($downloadFilename = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($downloadFilename)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $downloadFilename)) {
                $downloadFilename = str_replace('*', '%', $downloadFilename);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DocumentPeer::DOWNLOAD_FILENAME, $downloadFilename, $comparison);
    }

    /**
     * Filter the query on the extension_id column
     *
     * Example usage:
     * <code>
     * $query->filterByExtensionId('fooValue');   // WHERE extension_id = 'fooValue'
     * $query->filterByExtensionId('%fooValue%'); // WHERE extension_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $extensionId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DocumentQuery The current query, for fluid interface
     */
    public function filterByExtensionId($extensionId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($extensionId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $extensionId)) {
                $extensionId = str_replace('*', '%', $extensionId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DocumentPeer::EXTENSION_ID, $extensionId, $comparison);
    }

    /**
     * Filter the query on the download_path column
     *
     * Example usage:
     * <code>
     * $query->filterByDownloadPath('fooValue');   // WHERE download_path = 'fooValue'
     * $query->filterByDownloadPath('%fooValue%'); // WHERE download_path LIKE '%fooValue%'
     * </code>
     *
     * @param     string $downloadPath The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DocumentQuery The current query, for fluid interface
     */
    public function filterByDownloadPath($downloadPath = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($downloadPath)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $downloadPath)) {
                $downloadPath = str_replace('*', '%', $downloadPath);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DocumentPeer::DOWNLOAD_PATH, $downloadPath, $comparison);
    }

    /**
     * Filter the query on the download_filesize column
     *
     * Example usage:
     * <code>
     * $query->filterByDownloadFilesize(1234); // WHERE download_filesize = 1234
     * $query->filterByDownloadFilesize(array(12, 34)); // WHERE download_filesize IN (12, 34)
     * $query->filterByDownloadFilesize(array('min' => 12)); // WHERE download_filesize > 12
     * </code>
     *
     * @param     mixed $downloadFilesize The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DocumentQuery The current query, for fluid interface
     */
    public function filterByDownloadFilesize($downloadFilesize = null, $comparison = null)
    {
        if (is_array($downloadFilesize)) {
            $useMinMax = false;
            if (isset($downloadFilesize['min'])) {
                $this->addUsingAlias(DocumentPeer::DOWNLOAD_FILESIZE, $downloadFilesize['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($downloadFilesize['max'])) {
                $this->addUsingAlias(DocumentPeer::DOWNLOAD_FILESIZE, $downloadFilesize['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DocumentPeer::DOWNLOAD_FILESIZE, $downloadFilesize, $comparison);
    }

    /**
     * Filter the query on the binary_data column
     *
     * @param     mixed $binaryData The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DocumentQuery The current query, for fluid interface
     */
    public function filterByBinaryData($binaryData = null, $comparison = null)
    {

        return $this->addUsingAlias(DocumentPeer::BINARY_DATA, $binaryData, $comparison);
    }

    /**
     * Filter the query by a related FileExtension object
     *
     * @param   FileExtension|PropelObjectCollection $fileExtension The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   DocumentQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByFileExtension($fileExtension, $comparison = null)
    {
        if ($fileExtension instanceof FileExtension) {
            return $this
                ->addUsingAlias(DocumentPeer::EXTENSION_ID, $fileExtension->getId(), $comparison);
        } elseif ($fileExtension instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DocumentPeer::EXTENSION_ID, $fileExtension->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByFileExtension() only accepts arguments of type FileExtension or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the FileExtension relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DocumentQuery The current query, for fluid interface
     */
    public function joinFileExtension($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('FileExtension');

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
            $this->addJoinObject($join, 'FileExtension');
        }

        return $this;
    }

    /**
     * Use the FileExtension relation FileExtension object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   FileExtensionQuery A secondary query class using the current class as primary query
     */
    public function useFileExtensionQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinFileExtension($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'FileExtension', 'FileExtensionQuery');
    }

    /**
     * Filter the query by a related Revision object
     *
     * @param   Revision|PropelObjectCollection $revision The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   DocumentQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByRevision($revision, $comparison = null)
    {
        if ($revision instanceof Revision) {
            return $this
                ->addUsingAlias(DocumentPeer::REVISION_ID, $revision->getId(), $comparison);
        } elseif ($revision instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DocumentPeer::REVISION_ID, $revision->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRevision() only accepts arguments of type Revision or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Revision relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DocumentQuery The current query, for fluid interface
     */
    public function joinRevision($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Revision');

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
            $this->addJoinObject($join, 'Revision');
        }

        return $this;
    }

    /**
     * Use the Revision relation Revision object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   RevisionQuery A secondary query class using the current class as primary query
     */
    public function useRevisionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRevision($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Revision', 'RevisionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Document $document Object to remove from the list of results
     *
     * @return DocumentQuery The current query, for fluid interface
     */
    public function prune($document = null)
    {
        if ($document) {
            $this->addUsingAlias(DocumentPeer::ID, $document->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
