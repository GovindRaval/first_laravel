<?php

/*
 * Custom config file
 * 
 */

return [
    /*
     * Pagination
     */
    'per_page'             => env('PER_PAGE', 10),
    /*
     * Common Date Format
     */
    'js_date_format'       => env('JS_DATE_FORMAT', 'DD-MM-YYYY'),
    'js_date_format_month' => env('JS_MONTH_FORMAT', 'MM'),
    'js_date_format_year'  => env('JS_YEAR_FORMAT', 'YYYY'),
    'js_time_format'       => env('JS_TIME_FORMAT', 'LTS'),
    'php_date_format'      => env('PHP_DATE_FORMAT', 'd-m-Y'),
    'php_month_format'     => env('PHP_MONTH_FORMAT', 'M-Y'),
    'php_time_format'      => env('PHP_TIME_FORMAT', 'h:i A'),
    'php_datetime_format'  => env('PHP_DATETIME_FORMAT', 'd-M-Y h:i:s'),
    /*
     * Button CSS
     */
    'btn-primary'          => 'btn btn-outline-primary btn-sm',
    'btn-danger'           => 'btn btn-outline-danger btn-sm',
    'btn-info'             => 'btn btn-outline-info btn-sm',
    'btn-warning'          => 'btn btn-outline-warning btn-sm',
    'btn-success'          => 'btn btn-outline-success btn-sm',
    'btn-primary-form'     => 'btn btn-outline-primary',
    'btn-success-form'     => 'btn btn-outline-success',
    'btn-danger-form'      => 'btn btn-outline-danger',
    /*
     * Badge CSS
     */
    'badge-primary'        => 'badge bg-primary view-role',
    'badge-success'        => 'badge bg-success view-role',
    'badge-danger'         => 'badge bg-danger view-role',
    /*
     * Card CSS
     */
    'card-primary'         => 'card-primary card-outline',
    /*
     * Text-Css
     */
    'text-note-css'        => 'text-primary',
    /*
     * Dropdown Select2 Css
     */
    'select2-css'          => 'select2-primary',
    /*
     * Date Formats
     */
    'date-time'            => 'd-m-Y H:i:s',
    'date'                 => 'd-m-Y',
    /*
     * Setting
     */
    'app_logo_width'       => 360,
    'app_logo_height'      => 360,
    'favicon_width'        => 16,
    'favicon_height'       => 16,
];

