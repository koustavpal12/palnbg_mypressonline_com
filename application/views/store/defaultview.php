<div style="color: red;">
<?php echo (!empty($param['store_name']) ? 'Store Name : '.$param['store_name']:'Main Site')?>
</div>
<hr>
<?php
foreach ($data as $k => $v) {
	echo $v['data'] . "<br>
<hr>";
}
?>
