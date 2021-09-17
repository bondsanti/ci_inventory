<?php

		define('LINE_API',"https://notify-api.line.me/api/notify");
 
			$token = "p8XdBBYPzhClLwYnOsOOGY9luKRkDI9tg0EgMpY2ohg"; //ใส่Token ที่copy เอาไว้
//    echo '<pre>';
//     print_r($Query4);
//    echo '</pre>';
// exit;

    foreach ($Query4 as $row) 

    {

                                $mat_req_id=$row->mat_req_id;
                                $nowdate= date("d/m H:i");
                                //$newDate = date("d-m-Y H:i", strtotime($row->mat_req_date));
                                $name="$row->mem_sex$row->mem_fname $row->mem_lname";
                                $code=$row->mem_code;
                                $posi=$row->posi;
                                $gov=$row->member_gov;
                                $dep=$row->member_dep;
                                $status=$row->mat_req_statas;
                                $remark=$row->mat_req_remark;
								//$file=site_url('')."approve/".$mat_req_id.".pdf";

                                 if ($row->mat_req_statas == "2") {
                                 	 $status='อนุมัติแล้ว';
                                 	}else{
                                 	$status='ไม่อนุมัติ';
                                 	$re='เหตุผล: '.$remark;

                                 }

$str = "[แจ้งผลการขอเบิก]
เลขที่ใบเบิก: ".$mat_req_id." 
ชื่อ: ".$name." 
แผนก: ".$dep." 
".$status." @".$nowdate."
".$re."
โปรดติดต่อเจ้าหน้าที่จุดจำหน่าย";

	}


// echo $str;
// exit;

//$emoji = String.valueOf(Character.toChars("0x100078"));
//$emoji = String.valueOf(Character.toChars(Integer.decode("0x100078")));

			//"ติดต่อกับ ระบบ Inventory ได้แล้วจ้า"; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
			 

			$res = notify_message($str,$token);
			print_r($res);
			function notify_message($message,$token){
			 $queryData = array('message' => $message);
			 $queryData = http_build_query($queryData,'','&');
			 $headerOptions = array( 
			         'http'=>array(
			            'method'=>'POST',
			            'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
			                      ."Authorization: Bearer ".$token."\r\n"
			                      ."Content-Length: ".strlen($queryData)."\r\n",
			            'content' => $queryData
			         ),
			 );
			 $context = stream_context_create($headerOptions);
			 $result = file_get_contents(LINE_API,FALSE,$context);
			 $res = json_decode($result);
			 return $res;
			}
//https://havespirit.blogspot.com/2017/02/line-notify-php.html
//https://medium.com/@nattaponsirikamonnet/%E0%B8%A1%E0%B8%B2%E0%B8%A5%E0%B8%AD%E0%B8%87-line-notify-%E0%B8%81%E0%B8%B1%E0%B8%99%E0%B9%80%E0%B8%96%E0%B8%AD%E0%B8%B0-%E0%B8%9E%E0%B8%B7%E0%B9%89%E0%B8%99%E0%B8%90%E0%B8%B2%E0%B8%99-65a7fc83d97f
?>