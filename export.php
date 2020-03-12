<?php
    $kek = $_POST;
    $partsArray = $_POST['partsArray'];
    $otherParts = array_slice($partsArray,3);
    $otherPartsStr = "";
    foreach ($otherParts as $part) {
        $otherPartsStr .= $part.",&#13;&#10;";
    }

    $dom = new DOMDocument();

    $dom->encoding = 'utf-8';

    $dom->xmlVersion = '1.0';

    $dom->formatOutput = true;

    $xml_file_name = generateRandomString();

    $root = $dom->createElement($_POST['ironName']);

    $parts = $dom->createElement('Parts');

    $procesor = $dom->createElement('Procesor', $partsArray[0]);

    $parts->appendChild($procesor);

    $grafika = $dom->createElement('KartaGraficzna', $partsArray[1]);

    $parts->appendChild($grafika);

    $ram = $dom->createElement('RAM', $partsArray[2]);

    $parts->appendChild($ram);

    $other = $dom->createElement('PamiecIDodatkoweWyposazenie', $otherPartsStr);

    $parts->appendChild($other);

    $root->appendChild($parts);

    $dom->appendChild($root);

$dom->save("xml/".$xml_file_name.".xml");

    echo $xml_file_name;
    exit;



    function generateRandomString($length = 10) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }