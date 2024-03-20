<?php
function CurlGET($URL) {
	$CH = curl_init();
    curl_setopt($CH, CURLOPT_URL, $URL);
    curl_setopt($CH, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($CH, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($CH, CURLOPT_ENCODING, 'gzip, deflate');
	
    $Headers = array();
	$Headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8';
	$Headers[] = 'User-Agent: Mozilla/5.0 (iPhone; CPU iPhone OS 12_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148';
    curl_setopt($CH, CURLOPT_HTTPHEADER, $Headers);
	
    $Result = curl_exec($CH);
    if (curl_errno($CH)) {
        echo 'Error:' . curl_error($CH);
    }
    curl_close($CH);
	return $Result;	
}
$JSON = json_decode(CurlGET('https://api.genelpara.com/embed/para-birimleri.json'), true);
?>
<ul>
    <li>
        <span>DOLAR</span>
        <span>Fiyat: <?php echo $JSON['USD']['satis']; ?></span>
        <span>Değişim: <?php echo $JSON['USD']['degisim']; ?></span>
    </li>
    <li>
        <span>EURO</span>
        <span>Fiyat: <?php echo $JSON['EUR']['satis']; ?></span>
        <span>Değişim: <?php echo $JSON['EUR']['degisim']; ?></span>
    </li>
    <li>
        <span>STERLIN</span>
        <span>Fiyat: <?php echo $JSON['GBP']['satis']; ?></span>
        <span>Değişim: <?php echo $JSON['GBP']['degisim']; ?></span>
    </li>
    <li>
        <span>BITCOIN</span>
        <span>Fiyat: <?php echo $JSON['BTC']['satis']; ?></span>
        <span>Değişim: <?php echo $JSON['BTC']['degisim']; ?></span>
    </li>
    <li>
        <span>ALTIN</span>
        <span>Fiyat: <?php echo $JSON['GA']['satis']; ?></span>
        <span>Değişim: <?php echo $JSON['GA']['degisim']; ?></span>
    </li>
</ul>
