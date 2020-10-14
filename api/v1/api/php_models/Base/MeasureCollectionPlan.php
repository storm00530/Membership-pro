<?php

namespace Base;

use \MeasureCollectionPlanQuery as ChildMeasureCollectionPlanQuery;
use \PhaseComponents as ChildPhaseComponents;
use \PhaseComponentsQuery as ChildPhaseComponentsQuery;
use \ProjectPhases as ChildProjectPhases;
use \ProjectPhasesQuery as ChildProjectPhasesQuery;
use \Projects as ChildProjects;
use \ProjectsQuery as ChildProjectsQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\MeasureCollectionPlanTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'measure_collection_plan' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class MeasureCollectionPlan implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\MeasureCollectionPlanTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the id field.
     *
     * @var        int
     */
    protected $id;

    /**
     * The value for the project_id field.
     *
     * @var        int
     */
    protected $project_id;

    /**
     * The value for the phase_id field.
     *
     * @var        int
     */
    protected $phase_id;

    /**
     * The value for the phase_component_id field.
     *
     * @var        int
     */
    protected $phase_component_id;

    /**
     * The value for the measure field.
     *
     * @var        string
     */
    protected $measure;

    /**
     * The value for the measure_type field.
     *
     * @var        string
     */
    protected $measure_type;

    /**
     * The value for the data_type field.
     *
     * @var        string
     */
    protected $data_type;

    /**
     * The value for the operational_definition field.
     *
     * @var        string
     */
    protected $operational_definition;

    /**
     * The value for the specification field.
     *
     * @var        string
     */
    protected $specification;

    /**
     * The value for the target field.
     *
     * @var        string
     */
    protected $target;

    /**
     * The value for the data_collection_form field.
     *
     * @var        string
     */
    protected $data_collection_form;

    /**
     * The value for the sampling field.
     *
     * @var        string
     */
    protected $sampling;

    /**
     * The value for the baseline_sigma field.
     *
     * @var        string
     */
    protected $baseline_sigma;

    /**
     * The value for the date_time_created field.
     *
     * @var        DateTime
     */
    protected $date_time_created;

    /**
     * The value for the last_updated field.
     *
     * Note: this column has a database default value of: (expression) CURRENT_TIMESTAMP
     * @var        DateTime
     */
    protected $last_updated;

    /**
     * @var        ChildProjects
     */
    protected $aProjects;

    /**
     * @var        ChildProjectPhases
     */
    protected $aProjectPhases;

    /**
     * @var        ChildPhaseComponents
     */
    protected $aPhaseComponents;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
    }

    /**
     * Initializes internal state of Base\MeasureCollectionPlan object.
     * @see applyDefaults()
     */
    public function __construct()
    {
        $this->applyDefaultValues();
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>MeasureCollectionPlan</code> instance.  If
     * <code>obj</code> is an instance of <code>MeasureCollectionPlan</code>, delegates to
     * <code>equals(MeasureCollectionPlan)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|MeasureCollectionPlan The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [project_id] column value.
     *
     * @return int
     */
    public function getProjectId()
    {
        return $this->project_id;
    }

    /**
     * Get the [phase_id] column value.
     *
     * @return int
     */
    public function getPhaseId()
    {
        return $this->phase_id;
    }

    /**
     * Get the [phase_component_id] column value.
     *
     * @return int
     */
    public function getPhaseComponentId()
    {
        return $this->phase_component_id;
    }

    /**
     * Get the [measure] column value.
     *
     * @return string
     */
    public function getMeasure()
    {
        return $this->measure;
    }

    /**
     * Get the [measure_type] column value.
     *
     * @return string
     */
    public function getMeasureType()
    {
        return $this->measure_type;
    }

    /**
     * Get the [data_type] column value.
     *
     * @return string
     */
    public function getDataType()
    {
        return $this->data_type;
    }

    /**
     * Get the [operational_definition] column value.
     *
     * @return string
     */
    public function getOperationalDefinition()
    {
        return $this->operational_definition;
    }

    /**
     * Get the [specification] column value.
     *
     * @return string
     */
    public function getSpecification()
    {
        return $this->specification;
    }

    /**
     * Get the [target] column value.
     *
     * @return string
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * Get the [data_collection_form] column value.
     *
     * @return string
     */
    public function getDataCollectionForm()
    {
        return $this->data_collection_form;
    }

    /**
     * Get the [sampling] column value.
     *
     * @return string
     */
    public function getSampling()
    {
        return $this->sampling;
    }

    /**
     * Get the [baseline_sigma] column value.
     *
     * @return string
     */
    public function getBaselineSigma()
    {
        return $this->baseline_sigma;
    }

    /**
     * Get the [optionally formatted] temporal [date_time_created] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDateTimeCreated($format = NULL)
    {
        if ($format === null) {
            return $this->date_time_created;
        } else {
            return $this->date_time_created instanceof \DateTimeInterface ? $this->date_time_created->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [last_updated] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getLastUpdated($format = NULL)
    {
        if ($format === null) {
            return $this->last_updated;
        } else {
            return $this->last_updated instanceof \DateTimeInterface ? $this->last_updated->format($format) : null;
        }
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\MeasureCollectionPlan The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[MeasureCollectionPlanTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [project_id] column.
     *
     * @param int $v new value
     * @return $this|\MeasureCollectionPlan The current object (for fluent API support)
     */
    public function setProjectId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->project_id !== $v) {
            $this->project_id = $v;
            $this->modifiedColumns[MeasureCollectionPlanTableMap::COL_PROJECT_ID] = true;
        }

        if ($this->aProjects !== null && $this->aProjects->getId() !== $v) {
            $this->aProjects = null;
        }

        return $this;
    } // setProjectId()

    /**
     * Set the value of [phase_id] column.
     *
     * @param int $v new value
     * @return $this|\MeasureCollectionPlan The current object (for fluent API support)
     */
    public function setPhaseId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->phase_id !== $v) {
            $this->phase_id = $v;
            $this->modifiedColumns[MeasureCollectionPlanTableMap::COL_PHASE_ID] = true;
        }

        if ($this->aProjectPhases !== null && $this->aProjectPhases->getId() !== $v) {
            $this->aProjectPhases = null;
        }

        return $this;
    } // setPhaseId()

    /**
     * Set the value of [phase_component_id] column.
     *
     * @param int $v new value
     * @return $this|\MeasureCollectionPlan The current object (for fluent API support)
     */
    public function setPhaseComponentId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->phase_component_id !== $v) {
            $this->phase_component_id = $v;
            $this->modifiedColumns[MeasureCollectionPlanTableMap::COL_PHASE_COMPONENT_ID] = true;
        }

        if ($this->aPhaseComponents !== null && $this->aPhaseComponents->getId() !== $v) {
            $this->aPhaseComponents = null;
        }

        return $this;
    } // setPhaseComponentId()

    /**
     * Set the value of [measure] column.
     *
     * @param string $v new value
     * @return $this|\MeasureCollectionPlan The current object (for fluent API support)
     */
    public function setMeasure($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->measure !== $v) {
            $this->measure = $v;
            $this->modifiedColumns[MeasureCollectionPlanTableMap::COL_MEASURE] = true;
        }

        return $this;
    } // setMeasure()

    /**
     * Set the value of [measure_type] column.
     *
     * @param string $v new value
     * @return $this|\MeasureCollectionPlan The current object (for fluent API support)
     */
    public function setMeasureType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->measure_type !== $v) {
            $this->measure_type = $v;
            $this->modifiedColumns[MeasureCollectionPlanTableMap::COL_MEASURE_TYPE] = true;
        }

        return $this;
    } // setMeasureType()

    /**
     * Set the value of [data_type] column.
     *
     * @param string $v new value
     * @return $this|\MeasureCollectionPlan The current object (for fluent API support)
     */
    public function setDataType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->data_type !== $v) {
            $this->data_type = $v;
            $this->modifiedColumns[MeasureCollectionPlanTableMap::COL_DATA_TYPE] = true;
        }

        return $this;
    } // setDataType()

    /**
     * Set the value of [operational_definition] column.
     *
     * @param string $v new value
     * @return $this|\MeasureCollectionPlan The current object (for fluent API support)
     */
    public function setOperationalDefinition($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->operational_definition !== $v) {
            $this->operational_definition = $v;
            $this->modifiedColumns[MeasureCollectionPlanTableMap::COL_OPERATIONAL_DEFINITION] = true;
        }

        return $this;
    } // setOperationalDefinition()

    /**
     * Set the value of [specification] column.
     *
     * @param string $v new value
     * @return $this|\MeasureCollectionPlan The current object (for fluent API support)
     */
    public function setSpecification($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->specification !== $v) {
            $this->specification = $v;
            $this->modifiedColumns[MeasureCollectionPlanTableMap::COL_SPECIFICATION] = true;
        }

        return $this;
    } // setSpecification()

    /**
     * Set the value of [target] column.
     *
     * @param string $v new value
     * @return $this|\MeasureCollectionPlan The current object (for fluent API support)
     */
    public function setTarget($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->target !== $v) {
            $this->target = $v;
            $this->modifiedColumns[MeasureCollectionPlanTableMap::COL_TARGET] = true;
        }

        return $this;
    } // setTarget()

    /**
     * Set the value of [data_collection_form] column.
     *
     * @param string $v new value
     * @return $this|\MeasureCollectionPlan The current object (for fluent API support)
     */
    public function setDataCollectionForm($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->data_collection_form !== $v) {
            $this->data_collection_form = $v;
            $this->modifiedColumns[MeasureCollectionPlanTableMap::COL_DATA_COLLECTION_FORM] = true;
        }

        return $this;
    } // setDataCollectionForm()

    /**
     * Set the value of [sampling] column.
     *
     * @param string $v new value
     * @return $this|\MeasureCollectionPlan The current object (for fluent API support)
     */
    public function setSampling($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sampling !== $v) {
            $this->sampling = $v;
            $this->modifiedColumns[MeasureCollectionPlanTableMap::COL_SAMPLING] = true;
        }

        return $this;
    } // setSampling()

    /**
     * Set the value of [baseline_sigma] column.
     *
     * @param string $v new value
     * @return $this|\MeasureCollectionPlan The current object (for fluent API support)
     */
    public function setBaselineSigma($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->baseline_sigma !== $v) {
            $this->baseline_sigma = $v;
            $this->modifiedColumns[MeasureCollectionPlanTableMap::COL_BASELINE_SIGMA] = true;
        }

        return $this;
    } // setBaselineSigma()

    /**
     * Sets the value of [date_time_created] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\MeasureCollectionPlan The current object (for fluent API support)
     */
    public function setDateTimeCreated($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_time_created !== null || $dt !== null) {
            if ($this->date_time_created === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_time_created->format("Y-m-d H:i:s.u")) {
                $this->date_time_created = $dt === null ? null : clone $dt;
                $this->modifiedColumns[MeasureCollectionPlanTableMap::COL_DATE_TIME_CREATED] = true;
            }
        } // if either are not null

        return $this;
    } // setDateTimeCreated()

    /**
     * Sets the value of [last_updated] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\MeasureCollectionPlan The current object (for fluent API support)
     */
    public function setLastUpdated($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_updated !== null || $dt !== null) {
            if ($this->last_updated === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->last_updated->format("Y-m-d H:i:s.u")) {
                $this->last_updated = $dt === null ? null : clone $dt;
                $this->modifiedColumns[MeasureCollectionPlanTableMap::COL_LAST_UPDATED] = true;
            }
        } // if either are not null

        return $this;
    } // setLastUpdated()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : MeasureCollectionPlanTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : MeasureCollectionPlanTableMap::translateFieldName('ProjectId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->project_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : MeasureCollectionPlanTableMap::translateFieldName('PhaseId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->phase_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : MeasureCollectionPlanTableMap::translateFieldName('PhaseComponentId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->phase_component_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : MeasureCollectionPlanTableMap::translateFieldName('Measure', TableMap::TYPE_PHPNAME, $indexType)];
            $this->measure = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : MeasureCollectionPlanTableMap::translateFieldName('MeasureType', TableMap::TYPE_PHPNAME, $indexType)];
            $this->measure_type = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : MeasureCollectionPlanTableMap::translateFieldName('DataType', TableMap::TYPE_PHPNAME, $indexType)];
            $this->data_type = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : MeasureCollectionPlanTableMap::translateFieldName('OperationalDefinition', TableMap::TYPE_PHPNAME, $indexType)];
            $this->operational_definition = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : MeasureCollectionPlanTableMap::translateFieldName('Specification', TableMap::TYPE_PHPNAME, $indexType)];
            $this->specification = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : MeasureCollectionPlanTableMap::translateFieldName('Target', TableMap::TYPE_PHPNAME, $indexType)];
            $this->target = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : MeasureCollectionPlanTableMap::translateFieldName('DataCollectionForm', TableMap::TYPE_PHPNAME, $indexType)];
            $this->data_collection_form = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : MeasureCollectionPlanTableMap::translateFieldName('Sampling', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sampling = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : MeasureCollectionPlanTableMap::translateFieldName('BaselineSigma', TableMap::TYPE_PHPNAME, $indexType)];
            $this->baseline_sigma = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : MeasureCollectionPlanTableMap::translateFieldName('DateTimeCreated', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_time_created = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : MeasureCollectionPlanTableMap::translateFieldName('LastUpdated', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->last_updated = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 15; // 15 = MeasureCollectionPlanTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\MeasureCollectionPlan'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
        if ($this->aProjects !== null && $this->project_id !== $this->aProjects->getId()) {
            $this->aProjects = null;
        }
        if ($this->aProjectPhases !== null && $this->phase_id !== $this->aProjectPhases->getId()) {
            $this->aProjectPhases = null;
        }
        if ($this->aPhaseComponents !== null && $this->phase_component_id !== $this->aPhaseComponents->getId()) {
            $this->aPhaseComponents = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(MeasureCollectionPlanTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildMeasureCollectionPlanQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aProjects = null;
            $this->aProjectPhases = null;
            $this->aPhaseComponents = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see MeasureCollectionPlan::setDeleted()
     * @see MeasureCollectionPlan::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(MeasureCollectionPlanTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildMeasureCollectionPlanQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(MeasureCollectionPlanTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                MeasureCollectionPlanTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aProjects !== null) {
                if ($this->aProjects->isModified() || $this->aProjects->isNew()) {
                    $affectedRows += $this->aProjects->save($con);
                }
                $this->setProjects($this->aProjects);
            }

            if ($this->aProjectPhases !== null) {
                if ($this->aProjectPhases->isModified() || $this->aProjectPhases->isNew()) {
                    $affectedRows += $this->aProjectPhases->save($con);
                }
                $this->setProjectPhases($this->aProjectPhases);
            }

            if ($this->aPhaseComponents !== null) {
                if ($this->aPhaseComponents->isModified() || $this->aPhaseComponents->isNew()) {
                    $affectedRows += $this->aPhaseComponents->save($con);
                }
                $this->setPhaseComponents($this->aPhaseComponents);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[MeasureCollectionPlanTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . MeasureCollectionPlanTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(MeasureCollectionPlanTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(MeasureCollectionPlanTableMap::COL_PROJECT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`project_id`';
        }
        if ($this->isColumnModified(MeasureCollectionPlanTableMap::COL_PHASE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`phase_id`';
        }
        if ($this->isColumnModified(MeasureCollectionPlanTableMap::COL_PHASE_COMPONENT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`phase_component_id`';
        }
        if ($this->isColumnModified(MeasureCollectionPlanTableMap::COL_MEASURE)) {
            $modifiedColumns[':p' . $index++]  = '`measure`';
        }
        if ($this->isColumnModified(MeasureCollectionPlanTableMap::COL_MEASURE_TYPE)) {
            $modifiedColumns[':p' . $index++]  = '`measure_type`';
        }
        if ($this->isColumnModified(MeasureCollectionPlanTableMap::COL_DATA_TYPE)) {
            $modifiedColumns[':p' . $index++]  = '`data_type`';
        }
        if ($this->isColumnModified(MeasureCollectionPlanTableMap::COL_OPERATIONAL_DEFINITION)) {
            $modifiedColumns[':p' . $index++]  = '`operational_definition`';
        }
        if ($this->isColumnModified(MeasureCollectionPlanTableMap::COL_SPECIFICATION)) {
            $modifiedColumns[':p' . $index++]  = '`specification`';
        }
        if ($this->isColumnModified(MeasureCollectionPlanTableMap::COL_TARGET)) {
            $modifiedColumns[':p' . $index++]  = '`target`';
        }
        if ($this->isColumnModified(MeasureCollectionPlanTableMap::COL_DATA_COLLECTION_FORM)) {
            $modifiedColumns[':p' . $index++]  = '`data_collection_form`';
        }
        if ($this->isColumnModified(MeasureCollectionPlanTableMap::COL_SAMPLING)) {
            $modifiedColumns[':p' . $index++]  = '`sampling`';
        }
        if ($this->isColumnModified(MeasureCollectionPlanTableMap::COL_BASELINE_SIGMA)) {
            $modifiedColumns[':p' . $index++]  = '`baseline_sigma`';
        }
        if ($this->isColumnModified(MeasureCollectionPlanTableMap::COL_DATE_TIME_CREATED)) {
            $modifiedColumns[':p' . $index++]  = '`date_time_created`';
        }
        if ($this->isColumnModified(MeasureCollectionPlanTableMap::COL_LAST_UPDATED)) {
            $modifiedColumns[':p' . $index++]  = '`last_updated`';
        }

        $sql = sprintf(
            'INSERT INTO `measure_collection_plan` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id`':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case '`project_id`':
                        $stmt->bindValue($identifier, $this->project_id, PDO::PARAM_INT);
                        break;
                    case '`phase_id`':
                        $stmt->bindValue($identifier, $this->phase_id, PDO::PARAM_INT);
                        break;
                    case '`phase_component_id`':
                        $stmt->bindValue($identifier, $this->phase_component_id, PDO::PARAM_INT);
                        break;
                    case '`measure`':
                        $stmt->bindValue($identifier, $this->measure, PDO::PARAM_STR);
                        break;
                    case '`measure_type`':
                        $stmt->bindValue($identifier, $this->measure_type, PDO::PARAM_STR);
                        break;
                    case '`data_type`':
                        $stmt->bindValue($identifier, $this->data_type, PDO::PARAM_STR);
                        break;
                    case '`operational_definition`':
                        $stmt->bindValue($identifier, $this->operational_definition, PDO::PARAM_STR);
                        break;
                    case '`specification`':
                        $stmt->bindValue($identifier, $this->specification, PDO::PARAM_STR);
                        break;
                    case '`target`':
                        $stmt->bindValue($identifier, $this->target, PDO::PARAM_STR);
                        break;
                    case '`data_collection_form`':
                        $stmt->bindValue($identifier, $this->data_collection_form, PDO::PARAM_STR);
                        break;
                    case '`sampling`':
                        $stmt->bindValue($identifier, $this->sampling, PDO::PARAM_STR);
                        break;
                    case '`baseline_sigma`':
                        $stmt->bindValue($identifier, $this->baseline_sigma, PDO::PARAM_STR);
                        break;
                    case '`date_time_created`':
                        $stmt->bindValue($identifier, $this->date_time_created ? $this->date_time_created->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case '`last_updated`':
                        $stmt->bindValue($identifier, $this->last_updated ? $this->last_updated->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = MeasureCollectionPlanTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getProjectId();
                break;
            case 2:
                return $this->getPhaseId();
                break;
            case 3:
                return $this->getPhaseComponentId();
                break;
            case 4:
                return $this->getMeasure();
                break;
            case 5:
                return $this->getMeasureType();
                break;
            case 6:
                return $this->getDataType();
                break;
            case 7:
                return $this->getOperationalDefinition();
                break;
            case 8:
                return $this->getSpecification();
                break;
            case 9:
                return $this->getTarget();
                break;
            case 10:
                return $this->getDataCollectionForm();
                break;
            case 11:
                return $this->getSampling();
                break;
            case 12:
                return $this->getBaselineSigma();
                break;
            case 13:
                return $this->getDateTimeCreated();
                break;
            case 14:
                return $this->getLastUpdated();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['MeasureCollectionPlan'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['MeasureCollectionPlan'][$this->hashCode()] = true;
        $keys = MeasureCollectionPlanTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getProjectId(),
            $keys[2] => $this->getPhaseId(),
            $keys[3] => $this->getPhaseComponentId(),
            $keys[4] => $this->getMeasure(),
            $keys[5] => $this->getMeasureType(),
            $keys[6] => $this->getDataType(),
            $keys[7] => $this->getOperationalDefinition(),
            $keys[8] => $this->getSpecification(),
            $keys[9] => $this->getTarget(),
            $keys[10] => $this->getDataCollectionForm(),
            $keys[11] => $this->getSampling(),
            $keys[12] => $this->getBaselineSigma(),
            $keys[13] => $this->getDateTimeCreated(),
            $keys[14] => $this->getLastUpdated(),
        );
        if ($result[$keys[13]] instanceof \DateTimeInterface) {
            $result[$keys[13]] = $result[$keys[13]]->format('c');
        }

        if ($result[$keys[14]] instanceof \DateTimeInterface) {
            $result[$keys[14]] = $result[$keys[14]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aProjects) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'projects';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'projects';
                        break;
                    default:
                        $key = 'Projects';
                }

                $result[$key] = $this->aProjects->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aProjectPhases) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'projectPhases';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'project_phases';
                        break;
                    default:
                        $key = 'ProjectPhases';
                }

                $result[$key] = $this->aProjectPhases->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPhaseComponents) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'phaseComponents';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'phase_components';
                        break;
                    default:
                        $key = 'PhaseComponents';
                }

                $result[$key] = $this->aPhaseComponents->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\MeasureCollectionPlan
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = MeasureCollectionPlanTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\MeasureCollectionPlan
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setProjectId($value);
                break;
            case 2:
                $this->setPhaseId($value);
                break;
            case 3:
                $this->setPhaseComponentId($value);
                break;
            case 4:
                $this->setMeasure($value);
                break;
            case 5:
                $this->setMeasureType($value);
                break;
            case 6:
                $this->setDataType($value);
                break;
            case 7:
                $this->setOperationalDefinition($value);
                break;
            case 8:
                $this->setSpecification($value);
                break;
            case 9:
                $this->setTarget($value);
                break;
            case 10:
                $this->setDataCollectionForm($value);
                break;
            case 11:
                $this->setSampling($value);
                break;
            case 12:
                $this->setBaselineSigma($value);
                break;
            case 13:
                $this->setDateTimeCreated($value);
                break;
            case 14:
                $this->setLastUpdated($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = MeasureCollectionPlanTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setProjectId($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setPhaseId($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setPhaseComponentId($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setMeasure($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setMeasureType($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setDataType($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setOperationalDefinition($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setSpecification($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setTarget($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setDataCollectionForm($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setSampling($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setBaselineSigma($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setDateTimeCreated($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setLastUpdated($arr[$keys[14]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\MeasureCollectionPlan The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(MeasureCollectionPlanTableMap::DATABASE_NAME);

        if ($this->isColumnModified(MeasureCollectionPlanTableMap::COL_ID)) {
            $criteria->add(MeasureCollectionPlanTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(MeasureCollectionPlanTableMap::COL_PROJECT_ID)) {
            $criteria->add(MeasureCollectionPlanTableMap::COL_PROJECT_ID, $this->project_id);
        }
        if ($this->isColumnModified(MeasureCollectionPlanTableMap::COL_PHASE_ID)) {
            $criteria->add(MeasureCollectionPlanTableMap::COL_PHASE_ID, $this->phase_id);
        }
        if ($this->isColumnModified(MeasureCollectionPlanTableMap::COL_PHASE_COMPONENT_ID)) {
            $criteria->add(MeasureCollectionPlanTableMap::COL_PHASE_COMPONENT_ID, $this->phase_component_id);
        }
        if ($this->isColumnModified(MeasureCollectionPlanTableMap::COL_MEASURE)) {
            $criteria->add(MeasureCollectionPlanTableMap::COL_MEASURE, $this->measure);
        }
        if ($this->isColumnModified(MeasureCollectionPlanTableMap::COL_MEASURE_TYPE)) {
            $criteria->add(MeasureCollectionPlanTableMap::COL_MEASURE_TYPE, $this->measure_type);
        }
        if ($this->isColumnModified(MeasureCollectionPlanTableMap::COL_DATA_TYPE)) {
            $criteria->add(MeasureCollectionPlanTableMap::COL_DATA_TYPE, $this->data_type);
        }
        if ($this->isColumnModified(MeasureCollectionPlanTableMap::COL_OPERATIONAL_DEFINITION)) {
            $criteria->add(MeasureCollectionPlanTableMap::COL_OPERATIONAL_DEFINITION, $this->operational_definition);
        }
        if ($this->isColumnModified(MeasureCollectionPlanTableMap::COL_SPECIFICATION)) {
            $criteria->add(MeasureCollectionPlanTableMap::COL_SPECIFICATION, $this->specification);
        }
        if ($this->isColumnModified(MeasureCollectionPlanTableMap::COL_TARGET)) {
            $criteria->add(MeasureCollectionPlanTableMap::COL_TARGET, $this->target);
        }
        if ($this->isColumnModified(MeasureCollectionPlanTableMap::COL_DATA_COLLECTION_FORM)) {
            $criteria->add(MeasureCollectionPlanTableMap::COL_DATA_COLLECTION_FORM, $this->data_collection_form);
        }
        if ($this->isColumnModified(MeasureCollectionPlanTableMap::COL_SAMPLING)) {
            $criteria->add(MeasureCollectionPlanTableMap::COL_SAMPLING, $this->sampling);
        }
        if ($this->isColumnModified(MeasureCollectionPlanTableMap::COL_BASELINE_SIGMA)) {
            $criteria->add(MeasureCollectionPlanTableMap::COL_BASELINE_SIGMA, $this->baseline_sigma);
        }
        if ($this->isColumnModified(MeasureCollectionPlanTableMap::COL_DATE_TIME_CREATED)) {
            $criteria->add(MeasureCollectionPlanTableMap::COL_DATE_TIME_CREATED, $this->date_time_created);
        }
        if ($this->isColumnModified(MeasureCollectionPlanTableMap::COL_LAST_UPDATED)) {
            $criteria->add(MeasureCollectionPlanTableMap::COL_LAST_UPDATED, $this->last_updated);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildMeasureCollectionPlanQuery::create();
        $criteria->add(MeasureCollectionPlanTableMap::COL_ID, $this->id);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getId();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \MeasureCollectionPlan (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setProjectId($this->getProjectId());
        $copyObj->setPhaseId($this->getPhaseId());
        $copyObj->setPhaseComponentId($this->getPhaseComponentId());
        $copyObj->setMeasure($this->getMeasure());
        $copyObj->setMeasureType($this->getMeasureType());
        $copyObj->setDataType($this->getDataType());
        $copyObj->setOperationalDefinition($this->getOperationalDefinition());
        $copyObj->setSpecification($this->getSpecification());
        $copyObj->setTarget($this->getTarget());
        $copyObj->setDataCollectionForm($this->getDataCollectionForm());
        $copyObj->setSampling($this->getSampling());
        $copyObj->setBaselineSigma($this->getBaselineSigma());
        $copyObj->setDateTimeCreated($this->getDateTimeCreated());
        $copyObj->setLastUpdated($this->getLastUpdated());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \MeasureCollectionPlan Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Declares an association between this object and a ChildProjects object.
     *
     * @param  ChildProjects $v
     * @return $this|\MeasureCollectionPlan The current object (for fluent API support)
     * @throws PropelException
     */
    public function setProjects(ChildProjects $v = null)
    {
        if ($v === null) {
            $this->setProjectId(NULL);
        } else {
            $this->setProjectId($v->getId());
        }

        $this->aProjects = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildProjects object, it will not be re-added.
        if ($v !== null) {
            $v->addMeasureCollectionPlan($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildProjects object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildProjects The associated ChildProjects object.
     * @throws PropelException
     */
    public function getProjects(ConnectionInterface $con = null)
    {
        if ($this->aProjects === null && ($this->project_id != 0)) {
            $this->aProjects = ChildProjectsQuery::create()->findPk($this->project_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aProjects->addMeasureCollectionPlans($this);
             */
        }

        return $this->aProjects;
    }

    /**
     * Declares an association between this object and a ChildProjectPhases object.
     *
     * @param  ChildProjectPhases $v
     * @return $this|\MeasureCollectionPlan The current object (for fluent API support)
     * @throws PropelException
     */
    public function setProjectPhases(ChildProjectPhases $v = null)
    {
        if ($v === null) {
            $this->setPhaseId(NULL);
        } else {
            $this->setPhaseId($v->getId());
        }

        $this->aProjectPhases = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildProjectPhases object, it will not be re-added.
        if ($v !== null) {
            $v->addMeasureCollectionPlan($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildProjectPhases object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildProjectPhases The associated ChildProjectPhases object.
     * @throws PropelException
     */
    public function getProjectPhases(ConnectionInterface $con = null)
    {
        if ($this->aProjectPhases === null && ($this->phase_id != 0)) {
            $this->aProjectPhases = ChildProjectPhasesQuery::create()->findPk($this->phase_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aProjectPhases->addMeasureCollectionPlans($this);
             */
        }

        return $this->aProjectPhases;
    }

    /**
     * Declares an association between this object and a ChildPhaseComponents object.
     *
     * @param  ChildPhaseComponents $v
     * @return $this|\MeasureCollectionPlan The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPhaseComponents(ChildPhaseComponents $v = null)
    {
        if ($v === null) {
            $this->setPhaseComponentId(NULL);
        } else {
            $this->setPhaseComponentId($v->getId());
        }

        $this->aPhaseComponents = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildPhaseComponents object, it will not be re-added.
        if ($v !== null) {
            $v->addMeasureCollectionPlan($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildPhaseComponents object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildPhaseComponents The associated ChildPhaseComponents object.
     * @throws PropelException
     */
    public function getPhaseComponents(ConnectionInterface $con = null)
    {
        if ($this->aPhaseComponents === null && ($this->phase_component_id != 0)) {
            $this->aPhaseComponents = ChildPhaseComponentsQuery::create()->findPk($this->phase_component_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPhaseComponents->addMeasureCollectionPlans($this);
             */
        }

        return $this->aPhaseComponents;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aProjects) {
            $this->aProjects->removeMeasureCollectionPlan($this);
        }
        if (null !== $this->aProjectPhases) {
            $this->aProjectPhases->removeMeasureCollectionPlan($this);
        }
        if (null !== $this->aPhaseComponents) {
            $this->aPhaseComponents->removeMeasureCollectionPlan($this);
        }
        $this->id = null;
        $this->project_id = null;
        $this->phase_id = null;
        $this->phase_component_id = null;
        $this->measure = null;
        $this->measure_type = null;
        $this->data_type = null;
        $this->operational_definition = null;
        $this->specification = null;
        $this->target = null;
        $this->data_collection_form = null;
        $this->sampling = null;
        $this->baseline_sigma = null;
        $this->date_time_created = null;
        $this->last_updated = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
        } // if ($deep)

        $this->aProjects = null;
        $this->aProjectPhases = null;
        $this->aPhaseComponents = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(MeasureCollectionPlanTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
