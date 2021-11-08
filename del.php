<?php
$image = 'vkimages/tickets.jpg';
$tokenGroup = '9a63587302195cfb27c58e5d98e663fd5b811ab59aa1febbde7682c4159c10072a4f88d9a1d96aca2e824';
$token = 'b0d3759abecd4539ba8337709459b0d74ec6a1e876a39bdecada1949c6a8752cfd072b6f7414d6efed1bd';
$url_get_token = 'https://oauth.vk.com/authorize?client_id=7917502&display=page&redirect_uri=https://oauth.vk.com/blank.html&scope=photos&response_type=token&v=5.131&state=123456';
$code = "8e4b94c06d76584a82";
$group_id = '202507962';


$test = "https://oauth.vk.com/authorize?client_id=7915254&display=page&redirect_uri=https://oauth.vk.com/blank.html&scope=offline,messages&response_type=token&v=5.131&state=123456";

$tokenSsaveMessagesPhoto = '5532a2c0bb5903edf1dca32c145917106c796c9f948c6db0ea799cff41f1c9dec778c5b0a15d6f4ebb944';
//245897552
//$vk = new Vk($token);
$res = json_decode(file_get_contents(
    'https://api.vk.com/method/photos.getMessagesUploadServer?group_id='.$group_id.'&v=5.92&access_token=' . $tokenGroup
));
// echo $res;
//print_r($res);
// Отправка изображения на сервер.
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $res->response->upload_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Content-Type:multipart/form-data"
));
curl_setopt($ch, CURLOPT_POSTFIELDS, array('photo' => curl_file_create($image)));

$res = json_decode(curl_exec($ch), true);
curl_close($ch);
// echo $res;


//$photos = json_decode($res['photo']);
$url = '';
//
//print_r($res);
//die();
//foreach ($photos as $id => $val ){
//
//}

// 1. инициализация
$ch = curl_init();

// 2. указываем параметры, включая url
curl_setopt($ch, CURLOPT_URL, "https://api.vk.com/method/photos.saveMessagesPhoto?server=".$res['server']."&photo=".$res['photo']."&album_id=277420946"."&hash=".$res['hash']."&gid=".$group_id."&access_token=".$tokenGroup."&v=5.92");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Content-Type:multipart/form-data"
));

// 3. получаем HTML в качестве результата
$output = curl_exec($ch);

// 4. закрываем соединение
curl_close($ch);
print_r($output);



