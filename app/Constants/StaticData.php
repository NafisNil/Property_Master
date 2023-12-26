<?php

namespace App\Constants;

class StaticData
{
    private static $tuitionTypes = [
        'domestic' => 'Domestic',
        'international' => 'International',
    ];

    private static $courseFormats = [
        'Directed Research',
        'Flipped Classroom',
        'Group Study',
        'Independent Study',
        'Lab',
        'Lecture-Based learning',
        'MOOCs',
        'Practical Training',
        'Project-based learning',
        'Self-Study',
        'Seminar',
        'Studio'
    ];

    private static $gradeScales = [
        'numeric' => 'Numeric',
        'letter' => 'Letter',
        'pass-fail' => 'Pass/fail',
        'standard' => 'Standards-based',
        'percentage' => 'Percentage'

    ];

    private static $courseDurationOptions = [
        'Total Hours',
        'Total Weeks',
        'Total Classes'
    ];

    //
    private static $costTypes = [
        'Tuition',
        'Textbook',
        'Supplies',
        'Fees',
        'Other Charges',
        'Total Payable',
    ];

    private static $durationIntervals = [
        'Weeks',
        'Months',
        'Years',
    ];

    private static $priorityLevels = [
        'Critical',
        'High',
        "Medium",
        "Low",
        "Normal",
    ];
    private static $religions = [
        'Christian',
        'Islam',
        'Hindu',
        'Buddhism',
        'Other'
    ];

    private static $bloodGroups = [
        'A+', 'B+', 'O+', 'A-', 'B-', 'O-'
    ];

    private static $admissionsStatuses = [
        'Approved',
        'Declined',
        'Canceled by Applicant',
        'Document Shortage'
    ];

    private static $storageHolderTypes = [
        'Employees',
        'Handicap',
        'Parents',
        'Reserved',
        'Service Providers',
        'Students',
        'Teachers',
        'Visitors',
        'Volunteers',
    ];

    private static $templateTypes = [
        'Contract',
        'Data Importer',
        'Form',
        'Log',
        'Notice',
        'Profile',
        'Project',
        'Report',
    ];

    static $scheduleRecurrences = [
        'Daily',
        'Weekly',
        'Month',
        'Yearly'
    ];

    static $periods = [
        'weekly' => 'Weekly (52)',
        'bi-weekly' => 'Bi-Weekly(26)',
        'semi-monthly' => 'Semi-Monthly (24)',
        'monthly' => 'Monthly (12)',
        'quarterly' => 'Quarterly (4)',
        'semi-annually' => 'Semi-Annually(2)',
        'yearly' => 'Yearly (1)'
    ];

    private static $transactionItemTypes = [
        'goods' => 'Goods',
        'services' => 'Service',
        'goods and services' => 'Goods and services'
    ];

    static private $paymentMethods = [
        'credit-card' => 'Credit Card',
        'debit-card' => 'Credit Card',
        'bank-transfer' => 'Bank Transfer',
        'online-bank' => 'Online Banking',
        'email-transfer' => 'Email transfer',
        'certified-check' => 'Certified Check',
        'personal-check' => 'Personal Check'
    ];

    static private $departmentTypes = [
        'Administrative',
        'Educational'
    ];

    static function getCourseFormats(): array
    {
        return static::toAssoc(static::$courseFormats);
    }

    static function getGradeScales(): array
    {
        return static::toAssoc(static::$gradeScales);
    }

    static function getCourseDurationOptions()
    {
        return static::toAssoc(static::$courseDurationOptions);
    }

    static function getCostTypes()
    {
        return static::toAssoc(static::$costTypes);
    }

    static function getDurationIntervals()
    {
        return static::toAssoc(static::$durationIntervals);
    }

    static function getPriorityLevels()
    {
        return static::toAssoc(static::$priorityLevels);
    }

    static function getReligions()
    {
        return static::toAssoc(static::$religions);
    }

    static function getBloodGroups()
    {
        return static::toAssoc(static::$bloodGroups);
    }

    public static function getAdmissionsStatuses()
    {
        return static::toAssoc(static::$admissionsStatuses);
    }

    public static function getStorageHolderTypes()
    {
        return static::toAssoc(static::$storageHolderTypes);
    }

    public function getTemplateTypes(): array
    {
        return static::toAssoc(static::$templateTypes);
    }

    public static function getScheduleRecurrences()
    {
        return static::toAssoc(static::$scheduleRecurrences);
    }

    private static function toAssoc($arr)
    {
        return array_combine($arr, $arr);
    }

    public static function getPeriods()
    {
        return static::$periods;
    }

    public static function getTransactionItemTypes()
    {
        return static::$transactionItemTypes;
    }

    public static function getPaymentMethods()
    {
        return static::$paymentMethods;
    }

    public static function getDepartmentTypes(){
        return static::toAssoc(static::$departmentTypes);
    }

}
