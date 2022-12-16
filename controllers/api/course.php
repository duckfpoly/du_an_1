<?php
    require_once '../../config/ssp.class.php';
    $dbDetails = array(
        'host' => 'localhost',
        'user' => 'root',
        'pass' => '',
        'db'   => 'db_test'
    );
    $table = 'courses';
    $primaryKey = 'id';
    $columns = array(
        array( 'db' => 'id',   'dt' => 0 ),
        array( 'db' => 'name_course',   'dt' => 1 ),
        array( 'db' => 'price_course',  'dt' => 2 ),
        array( 'db' => 'status_course', 'dt' => 3 ),
    //                    array(
    //                        'db'        => 'status',
    //                        'dt'        => 6,
    //                        'formatter' => function( $d, $row ) {
    //                            return ($d == 1)?'Active':'Inactive';
    //                        }
    //                    )
    );
    echo json_encode(
        SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns )
    );