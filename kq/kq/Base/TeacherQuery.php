<?php

namespace kq\kq\Base;

use \Exception;
use \PDO;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use kq\kq\Teacher as ChildTeacher;
use kq\kq\TeacherQuery as ChildTeacherQuery;
use kq\kq\Map\TeacherTableMap;

/**
 * Base class that represents a query for the 'teacher' table.
 *
 *
 *
 * @method     ChildTeacherQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildTeacherQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildTeacherQuery orderByPwd($order = Criteria::ASC) Order by the pwd column
 * @method     ChildTeacherQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 *
 * @method     ChildTeacherQuery groupById() Group by the id column
 * @method     ChildTeacherQuery groupByName() Group by the name column
 * @method     ChildTeacherQuery groupByPwd() Group by the pwd column
 * @method     ChildTeacherQuery groupByPhone() Group by the phone column
 *
 * @method     ChildTeacherQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTeacherQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTeacherQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTeacherQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTeacherQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTeacherQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTeacher findOne(ConnectionInterface $con = null) Return the first ChildTeacher matching the query
 * @method     ChildTeacher findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTeacher matching the query, or a new ChildTeacher object populated from the query conditions when no match is found
 *
 * @method     ChildTeacher findOneById(string $id) Return the first ChildTeacher filtered by the id column
 * @method     ChildTeacher findOneByName(string $name) Return the first ChildTeacher filtered by the name column
 * @method     ChildTeacher findOneByPwd(string $pwd) Return the first ChildTeacher filtered by the pwd column
 * @method     ChildTeacher findOneByPhone(string $phone) Return the first ChildTeacher filtered by the phone column *

 * @method     ChildTeacher requirePk($key, ConnectionInterface $con = null) Return the ChildTeacher by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeacher requireOne(ConnectionInterface $con = null) Return the first ChildTeacher matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTeacher requireOneById(string $id) Return the first ChildTeacher filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeacher requireOneByName(string $name) Return the first ChildTeacher filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeacher requireOneByPwd(string $pwd) Return the first ChildTeacher filtered by the pwd column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeacher requireOneByPhone(string $phone) Return the first ChildTeacher filtered by the phone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTeacher[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTeacher objects based on current ModelCriteria
 * @method     ChildTeacher[]|ObjectCollection findById(string $id) Return ChildTeacher objects filtered by the id column
 * @method     ChildTeacher[]|ObjectCollection findByName(string $name) Return ChildTeacher objects filtered by the name column
 * @method     ChildTeacher[]|ObjectCollection findByPwd(string $pwd) Return ChildTeacher objects filtered by the pwd column
 * @method     ChildTeacher[]|ObjectCollection findByPhone(string $phone) Return ChildTeacher objects filtered by the phone column
 * @method     ChildTeacher[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TeacherQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \kq\kq\Base\TeacherQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\kq\\kq\\Teacher', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTeacherQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTeacherQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTeacherQuery) {
            return $criteria;
        }
        $query = new ChildTeacherQuery();
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
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildTeacher|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TeacherTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TeacherTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTeacher A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, name, pwd, phone FROM teacher WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildTeacher $obj */
            $obj = new ChildTeacher();
            $obj->hydrate($row);
            TeacherTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildTeacher|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildTeacherQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TeacherTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTeacherQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TeacherTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById('fooValue');   // WHERE id = 'fooValue'
     * $query->filterById('%fooValue%', Criteria::LIKE); // WHERE id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $id The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTeacherQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($id)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TeacherTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%', Criteria::LIKE); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTeacherQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TeacherTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the pwd column
     *
     * Example usage:
     * <code>
     * $query->filterByPwd('fooValue');   // WHERE pwd = 'fooValue'
     * $query->filterByPwd('%fooValue%', Criteria::LIKE); // WHERE pwd LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pwd The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTeacherQuery The current query, for fluid interface
     */
    public function filterByPwd($pwd = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pwd)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TeacherTableMap::COL_PWD, $pwd, $comparison);
    }

    /**
     * Filter the query on the phone column
     *
     * Example usage:
     * <code>
     * $query->filterByPhone('fooValue');   // WHERE phone = 'fooValue'
     * $query->filterByPhone('%fooValue%', Criteria::LIKE); // WHERE phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phone The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTeacherQuery The current query, for fluid interface
     */
    public function filterByPhone($phone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phone)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TeacherTableMap::COL_PHONE, $phone, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTeacher $teacher Object to remove from the list of results
     *
     * @return $this|ChildTeacherQuery The current query, for fluid interface
     */
    public function prune($teacher = null)
    {
        if ($teacher) {
            $this->addUsingAlias(TeacherTableMap::COL_ID, $teacher->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the teacher table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TeacherTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TeacherTableMap::clearInstancePool();
            TeacherTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TeacherTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TeacherTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TeacherTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TeacherTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TeacherQuery
