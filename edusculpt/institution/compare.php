<!-- Used to compare vendors and display it graphically with download option -->

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
	$objWorksheet->fromArray ( $data_array ); //Data is added to the worksheet
	
	$dataseriesLabels = array (
			new PHPExcel_Chart_DataSeriesValues ( 'String', 'Worksheet!$A$2', null, 3 ),
			new PHPExcel_Chart_DataSeriesValues ( 'String', 'Worksheet!$A$3', null, 3 ),
			new PHPExcel_Chart_DataSeriesValues ( 'String', 'Worksheet!$A$4', null, 3 ) 
	); //The Labels of the compare chart are set
	$xAxisTickValues = array (
			new PHPExcel_Chart_DataSeriesValues ( 'String', 'Worksheet!$B$1:$F$1', null, 3 ) 
	); //Values of the graph are set
	$dataSeriesValues = array (
			new PHPExcel_Chart_DataSeriesValues ( 'Number', 'Worksheet!$B$2:$G$2', null, 6 ),
			new PHPExcel_Chart_DataSeriesValues ( 'Number', 'Worksheet!$B$3:$G$3', null, 6 ),
			new PHPExcel_Chart_DataSeriesValues ( 'Number', 'Worksheet!$B$4:$G$4', null, 6 ) 
	);
	// Build the dataseries
	$series = new PHPExcel_Chart_DataSeries ( PHPExcel_Chart_DataSeries::TYPE_BARCHART, PHPExcel_Chart_DataSeries::GROUPING_STANDARD, range ( 0, count ( $dataSeriesValues ) - 1 ), $dataseriesLabels, $xAxisTickValues, $dataSeriesValues );
	
	// Set additional dataseries parameters
	// Make it a vertical column rather than a horizontal bar graph
	$series->setPlotDirection ( PHPExcel_Chart_DataSeries::DIRECTION_COL );
	// Set the series in the plot area
	$plotarea = new PHPExcel_Chart_PlotArea ( null, array (
			$series 
	) );
	// Set the chart legend
	$legend = new PHPExcel_Chart_Legend ( PHPExcel_Chart_Legend::POSITION_RIGHT, null, false );
	$title = new PHPExcel_Chart_Title ( 'Vendor Comparison Chart' );
	$yAxisLabel = new PHPExcel_Chart_Title ( 'Rating' );
	// Create the chart
	$chart = new PHPExcel_Chart ( 'chart1', $title, $legend, $plotarea, 0, null, $yAxisLabel );
	
	// Set the position where the chart should appear in the worksheet
	$chart->setTopLeftPosition ( 'A7' );
	$chart->setBottomRightPosition ( 'Q28' );
	// Add the chart to the worksheet
	$objWorksheet->addChart ( $chart );
	
	$rendererName = PHPExcel_Settings::CHART_RENDERER_JPGRAPH;
	$rendererLibrary = '/jpgraph';
	$rendererLibraryPath = str_replace ( "\\", "/", getcwd () ) . $rendererLibrary; // 'C:/xampp/htdocs/edusculpt/institution/' . $rendererLibrary;
	
	if (! PHPExcel_Settings::setChartRenderer ( $rendererName, $rendererLibraryPath )) {
		echo $rendererLibraryPath;
		die ( 'NOTICE: Please set the $rendererName and $rendererLibraryPath values' . EOL . 'at the top of this script as appropriate for your directory structure' );
	}
	$filename = 'compare' . rand () . '.jpeg';
	//Chart is stored as a image for displaying
	$chart->render ( $filename );
	$objWriter = PHPExcel_IOFactory::createWriter ( $objPHPExcel, 'Excel2007' );//The excel is written in the form of an excel file and cannot be used for displaying the contents in HTML
	
	$objWriter->setIncludeCharts ( TRUE );
	//If this is not done only worksheet is stored and leaves out the charts in the worksheet.
	$objWriter->save ( str_replace ( '.php', '.xlsx', __FILE__ ) );
	//An excel file is created to store the chart
	$objWriter1 = PHPExcel_IOFactory::createWriter ( $objPHPExcel, 'HTML' ); ////The excel is written in HTML and used for displaying the contents in webpage
	?><head>
<title>Compare</title>
<link rel="icon" href="../images/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
<script type="text/javascript">
	function down(){
	var url=window.location.href;
	var str=url.replace("compare", "comparedown");
	window.location.href=str;
//Used for downloading the chart by opening comparedow.php
	}
</script>
<script type="text/javascript">
	function back(){
		window.history.back();
	}
</script>
<style type="text/css">
table.gridtable {
	font-family: verdana, arial, sans-serif;
	font-size: 11px;
	color: #333333;
	border-width: 1px;
	border-color: #666666;
	border-collapse: collapse;
}

table.gridtable th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #dedede;
}

table.gridtable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #ffffff;
}
</style>
<style type="text/css">
.download {
	position: absolute;
	top: 50%;
	right: 5%;
	width: 100px;
	height: 50px;
	background: #999999; 
	border-bottom: solid 7px #aaaaaa;
	border-right: solid 7px #888888;
	border-top: solid 7px #cccccc;
	border-left: solid 7px #eeeeee;
	border-style: ridge; 
}

img {
	position: absolute;
	left: 25%;
	top: 25%;
}

.tabledata {
	position: absolute;
	left: 40%;
	bottom: 2%;
}
.imagecss {
	position: absolute;
	left: 25%;
	top: 5%;
}
</style>
</head>
<body>
	
	<div style="position: absolute; right: 10%; top: 10%;">
		<img alt="Chick for Home Page" onclick="back()"
			src="../images/cancel.png" height="40" width="40">
	
	</div>
	<!-- The chart image is displayed -->
	<img alt="Compare Vendors" class="imagecss" src="<?php echo $filename?>">
	
	<button onclick="down()" class="download">Download!</button>
	<div class="tabledata">
	<table class="gridtable">
	<tr>
	<th>Vendors</th>
	<?php
	//$objWriter1->save ( "php://output" );
	for($i = 1; $i <= $len; $i ++) {
		?>
		<th><?php echo $vendors [$i]?></th>
		<?php
	}
	?>
	</tr>
	<tr>
	<th>Overall<br> Feedback</th>
	<?php
	for($i = 1; $i <= $len; $i ++) {
		?>
		<td><?php echo $feedback [$i]?></td>
		<?php
	}
	?>
	</tr>
	</table>
</div>
</body>
</html><?php
}
?>
