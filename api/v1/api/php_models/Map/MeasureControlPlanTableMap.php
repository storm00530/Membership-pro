<?php

namespace Map;

use \MeasureControlPlan;
use \MeasureControlPlanQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'measure_control_plan' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class MeasureControlPlanTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.MeasureControlPlanTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'measure_control_plan';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\MeasureControlPlan';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'MeasureControlPlan';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 20;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 20;

    /**
     * the column name for the id field
     */
    const COL_ID = 'measure_control_plan.id';

    /**
     * the column name for the project_id field
     */
    const COL_PROJECT_ID = 'measure_control_plan.project_id';

    /**
     * the column name for the phase_id field
     */
    const COL_PHASE_ID = 'measure_control_plan.phase_id';

    /**
     * the column name for the phase_component_id field
     */
    const COL_PHASE_COMPONENT_ID = 'measure_control_plan.phase_component_id';

    /**
     * the column name for the process_steps field
     */
    const COL_PROCESS_STEPS = 'measure_control_plan.process_steps';

    /**
     * the column name for the ctq field
     */
    const COL_CTQ = 'measure_control_plan.ctq';

    /**
     * the column name for the specification_characteristic field
     */
    const COL_SPECIFICATION_CHARACTERISTIC = 'measure_control_plan.specification_characteristic';

    /**
     * the column name for the lsl field
     */
    const COL_LSL = 'measure_control_plan.lsl';

    /**
     * the column name for the usl field
     */
    const COL_USL = 'measure_control_plan.usl';

    /**
     * the column name for the unit_of_measure field
     */
    const COL_UNIT_OF_MEASURE = 'measure_control_plan.unit_of_measure';

    /**
     * the column name for the data_description field
     */
    const COL_DATA_DESCRIPTION = 'measure_control_plan.data_description';

    /**
     * the column name for the measurement_method field
     */
    const COL_MEASUREMENT_METHOD = 'measure_control_plan.measurement_method';

    /**
     * the column name for the sample_size field
     */
    const COL_SAMPLE_SIZE = 'measure_control_plan.sample_size';

    /**
     * the column name for the measurement_frequency field
     */
    const COL_MEASUREMENT_FREQUENCY = 'measure_control_plan.measurement_frequency';

    /**
     * the column name for the who_measures field
     */
    const COL_WHO_MEASURES = 'measure_control_plan.who_measures';

    /**
     * the column name for the where_recorded field
     */
    const COL_WHERE_RECORDED = 'measure_control_plan.where_recorded';

    /**
     * the column name for the corrective_action field
     */
    const COL_CORRECTIVE_ACTION = 'measure_control_plan.corrective_action';

    /**
     * the column name for the applicable_sop field
     */
    const COL_APPLICABLE_SOP = 'measure_control_plan.applicable_sop';

    /**
     * the column name for the date_time_created field
     */
    const COL_DATE_TIME_CREATED = 'measure_control_plan.date_time_created';

    /**
     * the column name for the last_updated field
     */
    const COL_LAST_UPDATED = 'measure_control_plan.last_updated';

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
        self::TYPE_PHPNAME       => array('Id', 'ProjectId', 'PhaseId', 'PhaseComponentId', 'ProcessSteps', 'Ctq', 'SpecificationCharacteristic', 'Lsl', 'Usl', 'UnitOfMeasure', 'DataDescription', 'MeasurementMethod', 'SampleSize', 'MeasurementFrequency', 'WhoMeasures', 'WhereRecorded', 'CorrectiveAction', 'ApplicableSop', 'DateTimeCreated', 'LastUpdated', ),
        self::TYPE_CAMELNAME     => array('id', 'projectId', 'phaseId', 'phaseComponentId', 'processSteps', 'ctq', 'specificationCharacteristic', 'lsl', 'usl', 'unitOfMeasure', 'dataDescription', 'measurementMethod', 'sampleSize', 'measurementFrequency', 'whoMeasures', 'whereRecorded', 'correctiveAction', 'applicableSop', 'dateTimeCreated', 'lastUpdated', ),
        self::TYPE_COLNAME       => array(MeasureControlPlanTableMap::COL_ID, MeasureControlPlanTableMap::COL_PROJECT_ID, MeasureControlPlanTableMap::COL_PHASE_ID, MeasureControlPlanTableMap::COL_PHASE_COMPONENT_ID, MeasureControlPlanTableMap::COL_PROCESS_STEPS, MeasureControlPlanTableMap::COL_CTQ, MeasureControlPlanTableMap::COL_SPECIFICATION_CHARACTERISTIC, MeasureControlPlanTableMap::COL_LSL, MeasureControlPlanTableMap::COL_USL, MeasureControlPlanTableMap::COL_UNIT_OF_MEASURE, MeasureControlPlanTableMap::COL_DATA_DESCRIPTION, MeasureControlPlanTableMap::COL_MEASUREMENT_METHOD, MeasureControlPlanTableMap::COL_SAMPLE_SIZE, MeasureControlPlanTableMap::COL_MEASUREMENT_FREQUENCY, MeasureControlPlanTableMap::COL_WHO_MEASURES, MeasureControlPlanTableMap::COL_WHERE_RECORDED, MeasureControlPlanTableMap::COL_CORRECTIVE_ACTION, MeasureControlPlanTableMap::COL_APPLICABLE_SOP, MeasureControlPlanTableMap::COL_DATE_TIME_CREATED, MeasureControlPlanTableMap::COL_LAST_UPDATED, ),
        self::TYPE_FIELDNAME     => array('id', 'project_id', 'phase_id', 'phase_component_id', 'process_steps', 'ctq', 'specification_characteristic', 'lsl', 'usl', 'unit_of_measure', 'data_description', 'measurement_method', 'sample_size', 'measurement_frequency', 'who_measures', 'where_recorded', 'corrective_action', 'applicable_sop', 'date_time_created', 'last_updated', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'ProjectId' => 1, 'PhaseId' => 2, 'PhaseComponentId' => 3, 'ProcessSteps' => 4, 'Ctq' => 5, 'SpecificationCharacteristic' => 6, 'Lsl' => 7, 'Usl' => 8, 'UnitOfMeasure' => 9, 'DataDescription' => 10, 'MeasurementMethod' => 11, 'SampleSize' => 12, 'MeasurementFrequency' => 13, 'WhoMeasures' => 14, 'WhereRecorded' => 15, 'CorrectiveAction' => 16, 'ApplicableSop' => 17, 'DateTimeCreated' => 18, 'LastUpdated' => 19, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'projectId' => 1, 'phaseId' => 2, 'phaseComponentId' => 3, 'processSteps' => 4, 'ctq' => 5, 'specificationCharacteristic' => 6, 'lsl' => 7, 'usl' => 8, 'unitOfMeasure' => 9, 'dataDescription' => 10, 'measurementMethod' => 11, 'sampleSize' => 12, 'measurementFrequency' => 13, 'whoMeasures' => 14, 'whereRecorded' => 15, 'correctiveAction' => 16, 'applicableSop' => 17, 'dateTimeCreated' => 18, 'lastUpdated' => 19, ),
        self::TYPE_COLNAME       => array(MeasureControlPlanTableMap::COL_ID => 0, MeasureControlPlanTableMap::COL_PROJECT_ID => 1, MeasureControlPlanTableMap::COL_PHASE_ID => 2, MeasureControlPlanTableMap::COL_PHASE_COMPONENT_ID => 3, MeasureControlPlanTableMap::COL_PROCESS_STEPS => 4, MeasureControlPlanTableMap::COL_CTQ => 5, MeasureControlPlanTableMap::COL_SPECIFICATION_CHARACTERISTIC => 6, MeasureControlPlanTableMap::COL_LSL => 7, MeasureControlPlanTableMap::COL_USL => 8, MeasureControlPlanTableMap::COL_UNIT_OF_MEASURE => 9, MeasureControlPlanTableMap::COL_DATA_DESCRIPTION => 10, MeasureControlPlanTableMap::COL_MEASUREMENT_METHOD => 11, MeasureControlPlanTableMap::COL_SAMPLE_SIZE => 12, MeasureControlPlanTableMap::COL_MEASUREMENT_FREQUENCY => 13, MeasureControlPlanTableMap::COL_WHO_MEASURES => 14, MeasureControlPlanTableMap::COL_WHERE_RECORDED => 15, MeasureControlPlanTableMap::COL_CORRECTIVE_ACTION => 16, MeasureControlPlanTableMap::COL_APPLICABLE_SOP => 17, MeasureControlPlanTableMap::COL_DATE_TIME_CREATED => 18, MeasureControlPlanTableMap::COL_LAST_UPDATED => 19, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'project_id' => 1, 'phase_id' => 2, 'phase_component_id' => 3, 'process_steps' => 4, 'ctq' => 5, 'specification_characteristic' => 6, 'lsl' => 7, 'usl' => 8, 'unit_of_measure' => 9, 'data_description' => 10, 'measurement_method' => 11, 'sample_size' => 12, 'measurement_frequency' => 13, 'who_measures' => 14, 'where_recorded' => 15, 'corrective_action' => 16, 'applicable_sop' => 17, 'date_time_created' => 18, 'last_updated' => 19, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
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
        $this->setName('measure_control_plan');
        $this->setPhpName('MeasureControlPlan');
        $this->setIdentifierQuoting(true);
        $this->setClassName('\\MeasureControlPlan');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('project_id', 'ProjectId', 'INTEGER', 'projects', 'id', true, null, null);
        $this->addForeignKey('phase_id', 'PhaseId', 'INTEGER', 'project_phases', 'id', true, null, null);
        $this->addForeignKey('phase_component_id', 'PhaseComponentId', 'INTEGER', 'phase_components', 'id', true, null, null);
        $this->addColumn('process_steps', 'ProcessSteps', 'VARCHAR', true, 255, null);
        $this->addColumn('ctq', 'Ctq', 'VARCHAR', true, 255, null);
        $this->addColumn('specification_characteristic', 'SpecificationCharacteristic', 'VARCHAR', true, 255, null);
        $this->addColumn('lsl', 'Lsl', 'VARCHAR', true, 255, null);
        $this->addColumn('usl', 'Usl', 'VARCHAR', true, 255, null);
        $this->addColumn('unit_of_measure', 'UnitOfMeasure', 'VARCHAR', true, 255, null);
        $this->addColumn('data_description', 'DataDescription', 'VARCHAR', true, 255, null);
        $this->addColumn('measurement_method', 'MeasurementMethod', 'VARCHAR', true, 255, null);
        $this->addColumn('sample_size', 'SampleSize', 'INTEGER', true, null, null);
        $this->addColumn('measurement_frequency', 'MeasurementFrequency', 'VARCHAR', true, 255, null);
        $this->addForeignKey('who_measures', 'WhoMeasures', 'INTEGER', 'users', 'id', false, null, null);
        $this->addColumn('where_recorded', 'WhereRecorded', 'VARCHAR', true, 255, null);
        $this->addColumn('corrective_action', 'CorrectiveAction', 'VARCHAR', true, 255, null);
        $this->addColumn('applicable_sop', 'ApplicableSop', 'LONGVARCHAR', true, null, null);
        $this->addColumn('date_time_created', 'DateTimeCreated', 'TIMESTAMP', false, null, null);
        $this->addColumn('last_updated', 'LastUpdated', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Projects', '\\Projects', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':project_id',
    1 => ':id',
  ),
), 'CASCADE', null, null, false);
        $this->addRelation('ProjectPhases', '\\ProjectPhases', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':phase_id',
    1 => ':id',
  ),
), 'CASCADE', null, null, false);
        $this->addRelation('PhaseComponents', '\\PhaseComponents', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':phase_component_id',
    1 => ':id',
  ),
), 'CASCADE', null, null, false);
        $this->addRelation('Users', '\\Users', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':who_measures',
    1 => ':id',
  ),
), 'SET NULL', null, null, false);
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
        return $withPrefix ? MeasureControlPlanTableMap::CLASS_DEFAULT : MeasureControlPlanTableMap::OM_CLASS;
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
     * @return array           (MeasureControlPlan object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = MeasureControlPlanTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = MeasureControlPlanTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + MeasureControlPlanTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = MeasureControlPlanTableMap::OM_CLASS;
            /** @var MeasureControlPlan $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            MeasureControlPlanTableMap::addInstanceToPool($obj, $key);
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
            $key = MeasureControlPlanTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = MeasureControlPlanTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var MeasureControlPlan $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                MeasureControlPlanTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(MeasureControlPlanTableMap::COL_ID);
            $criteria->addSelectColumn(MeasureControlPlanTableMap::COL_PROJECT_ID);
            $criteria->addSelectColumn(MeasureControlPlanTableMap::COL_PHASE_ID);
            $criteria->addSelectColumn(MeasureControlPlanTableMap::COL_PHASE_COMPONENT_ID);
            $criteria->addSelectColumn(MeasureControlPlanTableMap::COL_PROCESS_STEPS);
            $criteria->addSelectColumn(MeasureControlPlanTableMap::COL_CTQ);
            $criteria->addSelectColumn(MeasureControlPlanTableMap::COL_SPECIFICATION_CHARACTERISTIC);
            $criteria->addSelectColumn(MeasureControlPlanTableMap::COL_LSL);
            $criteria->addSelectColumn(MeasureControlPlanTableMap::COL_USL);
            $criteria->addSelectColumn(MeasureControlPlanTableMap::COL_UNIT_OF_MEASURE);
            $criteria->addSelectColumn(MeasureControlPlanTableMap::COL_DATA_DESCRIPTION);
            $criteria->addSelectColumn(MeasureControlPlanTableMap::COL_MEASUREMENT_METHOD);
            $criteria->addSelectColumn(MeasureControlPlanTableMap::COL_SAMPLE_SIZE);
            $criteria->addSelectColumn(MeasureControlPlanTableMap::COL_MEASUREMENT_FREQUENCY);
            $criteria->addSelectColumn(MeasureControlPlanTableMap::COL_WHO_MEASURES);
            $criteria->addSelectColumn(MeasureControlPlanTableMap::COL_WHERE_RECORDED);
            $criteria->addSelectColumn(MeasureControlPlanTableMap::COL_CORRECTIVE_ACTION);
            $criteria->addSelectColumn(MeasureControlPlanTableMap::COL_APPLICABLE_SOP);
            $criteria->addSelectColumn(MeasureControlPlanTableMap::COL_DATE_TIME_CREATED);
            $criteria->addSelectColumn(MeasureControlPlanTableMap::COL_LAST_UPDATED);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.project_id');
            $criteria->addSelectColumn($alias . '.phase_id');
            $criteria->addSelectColumn($alias . '.phase_component_id');
            $criteria->addSelectColumn($alias . '.process_steps');
            $criteria->addSelectColumn($alias . '.ctq');
            $criteria->addSelectColumn($alias . '.specification_characteristic');
            $criteria->addSelectColumn($alias . '.lsl');
            $criteria->addSelectColumn($alias . '.usl');
            $criteria->addSelectColumn($alias . '.unit_of_measure');
            $criteria->addSelectColumn($alias . '.data_description');
            $criteria->addSelectColumn($alias . '.measurement_method');
            $criteria->addSelectColumn($alias . '.sample_size');
            $criteria->addSelectColumn($alias . '.measurement_frequency');
            $criteria->addSelectColumn($alias . '.who_measures');
            $criteria->addSelectColumn($alias . '.where_recorded');
            $criteria->addSelectColumn($alias . '.corrective_action');
            $criteria->addSelectColumn($alias . '.applicable_sop');
            $criteria->addSelectColumn($alias . '.date_time_created');
            $criteria->addSelectColumn($alias . '.last_updated');
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
        return Propel::getServiceContainer()->getDatabaseMap(MeasureControlPlanTableMap::DATABASE_NAME)->getTable(MeasureControlPlanTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(MeasureControlPlanTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(MeasureControlPlanTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new MeasureControlPlanTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a MeasureControlPlan or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or MeasureControlPlan object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(MeasureControlPlanTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \MeasureControlPlan) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(MeasureControlPlanTableMap::DATABASE_NAME);
            $criteria->add(MeasureControlPlanTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = MeasureControlPlanQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            MeasureControlPlanTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                MeasureControlPlanTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the measure_control_plan table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return MeasureControlPlanQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a MeasureControlPlan or Criteria object.
     *
     * @param mixed               $criteria Criteria or MeasureControlPlan object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MeasureControlPlanTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from MeasureControlPlan object
        }

        if ($criteria->containsKey(MeasureControlPlanTableMap::COL_ID) && $criteria->keyContainsValue(MeasureControlPlanTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.MeasureControlPlanTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = MeasureControlPlanQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // MeasureControlPlanTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
MeasureControlPlanTableMap::buildTableMap();
