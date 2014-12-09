<?php

require_once 'app/init.php';
if(isset($_GET['q'])){
	$q=$_GET['q'];
	
	$query=$es->search([
		'body'=>[
		
			'query'=>[
				'bool'=>[
					'should'=>['match'=>['name'=>$q],['match'=>['user'=>$q]
							]
				]
				]
			
		
		]  
	
	
	]]);
	
	
	if($query['hits']['total'] >=1){
		$result=$query['hits']['hits'];
		
	
	}
	

}
?>

<!DOCTYPE>
<html>
<head>

</head>

<body>
<h1>IS421 ELASTICSEARCH ASSIGNMENT.</h1>
<form action="index.php" method="get" autocomplete="off">
<label>Search for Something
<input  type="text" name="q"/>
</label>
<input type="submit" value="click"/>
</form>
<?php
if(isset($result)){
	foreach($result as $r){
	?>
	<div>
		<a href="#<?php echo $r['_id']; ?>"><?php echo $r['_source']['text'];?></a>
		
		<div><?php echo implode(',',$r['_source']['user']); ?></div>
		
		
	</div>
	<?php
		
	}
		
}
?>

</body>
</html>
