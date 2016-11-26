<!-- Used for downloading compared graph in excel format  -->

<?php

/** Error reporting */
error_reporting ( E_ALL );
ini_set ( 'display_errors', TRUE );
ini_set ( 'display_startup_errors', TRUE );
date_default_timezone_set ( 'asia/Kolkata' );
define ( 'EOL', (PHP_SAPI == 'cli') ? PHP_EOL : '<br />' );
date_default_timezone_set ( 'asia/Kolkata' );
//Include the PHPExcel Library
set_include_path ( get_include_path () . PATH_SEPARATOR . '../Classes/' );
include '../config.php';
include 'PHPExcel.php';
if (isset ( $_GET ['len'] )) {
	$con = @mysql_connect ( $host, $dbuname, $dbpass );
	if (! $con) {
		die ( 'could not connect: ' . mysql_error () );
	}
	mysql_select_db ( $dbname, $con );
	$len = $_GET ['len'];
	$vendors = array ();
	$qual = null;
	$sup = null;
	$ovr = null;
	$vendors [0] = null;
	for($i = 1; $i <= $len; $i ++) {
		$l = $i - 1;
		$vendors [$i] = $_GET ["ven$l"];
	}
	$overall [0] = 'Overall';
	for($i = 1; $i <= $len; $i ++) {
		$ovrall = mysql_query ( "SELECT overall FROM v_registrant WHERE edu_vname='$vendors[$i]'" );
		while ( $row = mysql_fetch_array ( $ovrall ) ) {
			$overall [$i] = $row ["overall"];//Fetch overall rating of required vendors from SQLDB
		}
	}
	$quality [0] = 'Quality';
	for($i = 1; $i <= $len; $i ++) {
		$qualt = mysql_query ( "SELECT quality FROM v_registrant WHERE edu_vname='$vendors[$i]'" );
		while ( $row = mysql_fetch_array ( $qualt ) ) {
			$quality [$i] = $row ["quality"];//Fetch quality rating of required vendors from SQLDB
		}
	}
	$support [0] = 'Support';
	for($i = 1; $i <= $len; $i ++) {
		$supp = mysql_query ( "SELECT support FROM v_registrant WHERE edu_vname='$vendors[$i]'" );
		while ( $row = mysql_fetch_array ( $supp ) ) {
			$support [$i] = $row ["support"];//Fetch support rating of required vendors from SQLDB
		}
	}
	$feedback [0] = 'Feedback';
	for($i = 1; $i <= $len; $i ++) {
		$supp = mysql_query ( "SELECT overallfeedback FROM v_registrant WHERE edu_vname='$vendors[$i]'" );
		while ( $row = mysql_fetch_array ( $supp ) ) {
			$feedback [$i] = $row ["overallfeedback"];//Fetch Feedback of required vendors from SQLDB
		}
	}
	
	$data_array = array (
			$vendors,
			$overall,
			$quality,
			$support,
			$feedback 
	);//All the data is combined in a single array and used as input for PHPExcels
	
	$objPHPExcel = new PHPExcel ();
	$objWorksheet = $objPHPExcel->getActiveSheet ();
	$objWorksheet->fromArray ( $data_array );
	$dataseriesLabels = array (
			new PHPExcel_Chart_DataSeriesValues ( 'String', 'Worksheet!$A$2', null, 3 ),
			new PHPExcel_Chart_DataSeriesValues ( 'String', 'Worksheet!$A$3', null, 3 ),
			new PHPExcel_Chart_DataSeriesValues ( 'String', 'Worksheet!$A$4', null, 3 ) 
	); //The Labels of the compare chart are set
	$xAxisTickValues = array (
			new PHPExcel_Chart_DataSeriesValues ( 'String', 'Worksheet!$B$1:$F$1', null, 3 ) 
	) ;//Values of the graph are set
	$dataSeriesValues = array (
			new PHPExcel_Chart_DataSeriesValues ( 'Number', 'Worksheet!$B$2:$G$2', null, 6 ),
			new PHPExcel_Chart_DataSeriesValues ( 'Number', 'Worksheet!$B$3:$G$3', null, 6 ),
			new PHPExcel_Chart_DataSeriesValues ( 'Number', 'Worksheet!$B$4:$G$4', null, 6 ) 
	);
	// Build the dataseries
	$series = new PHPExcel_Chart_DataSeries ( PHPExcel_Chart_DataSeries::TYPE_BARCHART,PHPExcel_Chart_DataSeries::GROUPING_STANDARD, range ( 0, count ( $dataSeriesValues ) - 1 ), $dataseriesLabels,$xAxisTickValues,$dataSeriesValues ); 

	// Set additional dataseries parameters
	// Make it a vertical column rather than a horizontal bar graph
	$series->setPlotDirection ( PHPExcel_Chart_DataSeries::DIRECTION_COL );
	// Set the series in the plot area
	$plotarea = new PHPExcel_Chart_PlotArea ( null, array (	$series ) );
	// Set the chart legend
	$legend = new PHPExcel_Chart_Legend ( PHPExcel_Chart_Legend::POSITION_RIGHT, null, false );
	$title = new PHPExcel_Chart_Title ( 'Vendor Comparison Chart' );
	$yAxisLabel = new PHPExcel_Chart_Title ( 'Rating' );
	// Create the chart
	$chart = new PHPExcel_Chart ( 'chart1', $title, $legend,$plotarea, true,0, null, $yAxisLabel );
	// Set the position where the chart should appear in the worksheet
	$chart->setTopLeftPosition ( 'A7' );
	$chart->setBottomRightPosition ( 'Q28' );
	// Add the chart to the worksheet
	$objWorksheet->addChart ( $chart );
	header ( 'Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' );
	header ( 'Content-Disposition: attachment;filename="result.xlsx"' );
	header ( 'Cache-Control: max-age=0' );
	$objWriter = PHPExcel_IOFactory::createWriter ( $objPHPExcel, 'Excel2007' );//The excel is written in the form of an excel file and cannot be used for displaying the contents in HTML
	
	$objWriter->setIncludeCharts ( TRUE );//If this is not done only worksheet is stored and leaves out the charts in the worksheet.
	$objWriter->save ( "php://output" );//To download the file on client's side
}
?>