<?php

namespace kq\kq\Map;

use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;
use kq\kq\DayOff;
use kq\kq\DayOffQuery;


/**
 * This class defines the structure of the 'day_off' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class DayOffTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'kq.kq.Map.DayOffTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'day_off';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\kq\\kq\\DayOff';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'kq.kq.DayOff';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 6;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 6;

    /**
     * the column name for the id field
     */
    const COL_ID = 'day_off.id';

    /**
     * the column name for the course_id field
     */
    const COL_COURSE_ID = 'day_off.course_id';

    /**
     * the column name for the student_number field
     */
    const COL_STUDENT_NUMBER = 'day_off.student_number';

    /**
     * the column name for the off_date field
     */
    const COL_OFF_DATE = 'day_off.off_date';

    /**
     * the column name for the off_time field
     */
    const COL_OFF_TIME = 'day_off.off_time';

    /**
     * the column name for the cause field
     */
    const COL_CAUSE = 'day_off.cause';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'CourseId', 'StudentNumber', 'OffDate', 'OffTime', 'Cause', ),
        self::TYPE_CAMELNAME     => array('id', 'courseId', 'studentNumber', 'offDate', 'offTime', 'cause', ),
        self::TYPE_COLNAME       => array(DayOffTableMap::COL_ID, DayOffTableMap::COL_COURSE_ID, DayOffTableMap::COL_STUDENT_NUMBER, DayOffTableMap::COL_OFF_DATE, DayOffTableMap::COL_OFF_TIME, DayOffTableMap::COL_CAUSE, ),
        self::TYPE_FIELDNAME     => array('id', 'course_id', 'student_number', 'off_date', 'off_time', 'cause', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'CourseId' => 1, 'StudentNumber' => 2, 'OffDate' => 3, 'OffTime' => 4, 'Cause' => 5, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'courseId' => 1, 'studentNumber' => 2, 'offDate' => 3, 'offTime' => 4, 'cause' => 5, ),
        self::TYPE_COLNAME       => array(DayOffTableMap::COL_ID => 0, DayOffTableMap::COL_COURSE_ID => 1, DayOffTableMap::COL_STUDENT_NUMBER => 2, DayOffTableMap::COL_OFF_DATE => 3, DayOffTableMap::COL_OFF_TIME => 4, DayOffTableMap::COL_CAUSE => 5, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'course_id' => 1, 'student_number' => 2, 'off_date' => 3, 'off_time' => 4, 'cause' => 5, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('day_off');
        $this->setPhpName('DayOff');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\kq\\kq\\DayOff');
        $this->setPackage('kq.kq');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('course_id', 'CourseId', 'VARCHAR', true, 12, null);
        $this->addColumn('student_number', 'StudentNumber', 'VARCHAR', true, 20, null);
        $this->addColumn('off_date', 'OffDate', 'DATE', true, null, null);
        $this->addColumn('off_time', 'OffTime', 'TIME', true, null, null);
        $this->addColumn('cause', 'Cause', 'VARCHAR', false, 50, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? DayOffTableMap::CLASS_DEFAULT : DayOffTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (DayOff object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = DayOffTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = DayOffTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + DayOffTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = DayOffTableMap::OM_CLASS;
            /** @var DayOff $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            DayOffTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = DayOffTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = DayOffTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var DayOff $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                DayOffTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(DayOffTableMap::COL_ID);
            $criteria->addSelectColumn(DayOffTableMap::COL_COURSE_ID);
            $criteria->addSelectColumn(DayOffTableMap::COL_STUDENT_NUMBER);
            $criteria->addSelectColumn(DayOffTableMap::COL_OFF_DATE);
            $criteria->addSelectColumn(DayOffTableMap::COL_OFF_TIME);
            $criteria->addSelectColumn(DayOffTableMap::COL_CAUSE);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.course_id');
            $criteria->addSelectColumn($alias . '.student_number');
            $criteria->addSelectColumn($alias . '.off_date');
            $criteria->addSelectColumn($alias . '.off_time');
            $criteria->addSelectColumn($alias . '.cause');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(DayOffTableMap::DATABASE_NAME)->getTable(DayOffTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(DayOffTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(DayOffTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new DayOffTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a DayOff or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or DayOff object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DayOffTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \kq\kq\DayOff) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(DayOffTableMap::DATABASE_NAME);
            $criteria->add(DayOffTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = DayOffQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            DayOffTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                DayOffTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the day_off table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return DayOffQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a DayOff or Criteria object.
     *
     * @param mixed               $criteria Criteria or DayOff object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DayOffTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from DayOff object
        }

        if ($criteria->containsKey(DayOffTableMap::COL_ID) && $criteria->keyContainsValue(DayOffTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.DayOffTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = DayOffQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // DayOffTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
DayOffTableMap::buildTableMap();
