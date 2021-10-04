<?php
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
require_once 'Model/Model.php';
error_reporting(E_ALL);
$new = new Model();
function get_value($new){
$newarr = [];
for ($x = 6; $x  >= 0; $x--) {
   $newarr[].=$new->count("ID","patients","DATE(docprotime) LIKE DATE_SUB(CURRENT_DATE, INTERVAL ".$x." DAY)");
}
return $newarr;
}
function get_label_Y(){
$datearr=[];
for ($x = 6; $x >= 0; $x--) {
   $datearr[].=Date('Y-m-d', strtotime('-'.$x.' days'));
}
return $datearr;
}
$db=new stdclass();
$db->type="bar";
$db->data = obj_data(get_value($new),get_label_Y());
$db->options = obj_options(); 
function obj_data_labels($datearr){
	return $datearr;
}
function obj_data_datasets($newarr){
	    $datasets=array();	
		$inpdata=$newarr;
		//$datainput = obj_data_labels();
		//var_dump($datainput);
		$datasets[]=obj_data_single_datasets($inpdata,"Patients");
		//$inpdata2=array(90,30,70,50,20,80);
		//$datasets[]=obj_data_single_datasets($inpdata2,"Votes Select");
		return $datasets;
}
function generate_random_colors($length){
	$out =[];
	for($i=0;$i<$length;$i++){
	$first =  mt_rand(0, 255);
	$second = mt_rand(0, 255);
	$third = mt_rand(0, 255);
	$color_string="rgba(".$first.",".$second.",".$third.")";
	$out[]=$color_string;
	}
	return $out;
}

function obj_data_single_datasets($inpdata,$label){
			$dataset1 = new stdclass();
            $dataset1->label=$label;
            $dataset1->data=$inpdata;
			$length = sizeof($inpdata);
            $dataset1->backgroundColor=generate_random_colors($length);
            $dataset1->borderColor=generate_random_colors($length);				
        $dataset1->borderWidth=1;
		return $dataset1;
}
function obj_data($newarr,$datearr){
        $data= new stdclass();
        $data->labels=obj_data_labels($datearr);
        //array of object
        $data->datasets=obj_data_datasets($newarr);         
        
		 return $data;
}

  function obj_options(){
        $options = new stdclass();
		$options->responsive = false;
        $scales = new stdclass();
        $options->scales=$scales;
		$options->text="Testing Pie Chart";
        $y = new stdclass();
        $y->beginAtZero= true;
        //$scales->y= $y;
		$options->plugins=obj_title();
		return $options;
}
 function obj_title(){
	 $plugins = new stdclass();
	 $title = new stdclasS();
	 $title->display= true;
	 $title->text= "Patients Statistics";
	 $title->position="top";
	 $plugins->title=$title;
	 $datalabels = new stdclass();
	 $plugins->datalabels=$datalabels;
	 return $plugins;
 }
 function  obj_plugins_datalabels(){
	 $datalabels = new stdclass();
	// $datalabels->formatter
 }
 function obj_plugins_datalabels_formatter($value, $ctx) {
	 $sum=0;
 }
 json_encode($db);
?>
<script src="App/chart/chart.min.js" ></script>	
<div class="col-md-12" align="center">
<canvas id="myChart" class="text-center"width="1000px" height="500px"></canvas>
</div>
<script>
var encoded_data = "<?php echo base64_encode(json_encode($db)); ?>";
var decoded_data = atob(encoded_data);
//console.log(decoded_data);
var chart_data = JSON.parse(decoded_data);
//console.log(chart_data);
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, chart_data);
</script>


