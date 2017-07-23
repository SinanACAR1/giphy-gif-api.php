<!DOCTYPE html>
<html>
<head>
	<title>giphy api</title>

	<style type="text/css">
		.text{
			margin-bottom:20px;
			border-radius:5%;

		}	
		.button{

			margin-bottom:20px;
			border-radius:10%;
		}

	</style>
</head>
<body>
	<form action="" method="GET">
		<center>
			<input class="text" type="text" name="q">
			<input class="button" type="submit" name="ara">

		</center>
	</form>
	<?php 
// Önce giphy sitesine facebook'dan veya üye olarak giriş yapın ve https://developers.giphy.com/dashboard/ adresine gidip orada kendinize uygulama oluşturun ve keyi kopyalayın.
	if (isset($_GET['ara'])) {
		$q = $_GET['q'];

		if (empty($q)) {

			echo "Boş Arama Yapmayın";
		}
		else{
			$apikey = ""; //giphy sitesinin bize verdiği key;
			$url = file_get_contents('http://api.giphy.com/v1/gifs/search?q='.$q.'&api_key='.$apikey.''); //gifleri aradığımız adres
			$json = json_decode($url);//json olarak gelen verileri okutuyoruz
			$say = count($json->data);//json kodlarının datalarını sayıyıyoruz. kaç tane veri geldiğini sayıyoruz

			for ($i=0; $i < $say ; $i++) {  //gelen veri kadar dögümüzü sürdürüyoruz. 
				$img_url = $json->data[$i]->images->fixed_height->url; //json kodlarından resim yolunu belirtiyoruz
				echo "<img src=".$img_url." > "; //ve resimleri ekrana yazdırıyoruz

			}
			echo "<br>".$say." Adet Gif Bulundu."; //kaç veri geldiğini ekrana yazdırıyoruz.

		}



	}

	?>
</body>
</html>