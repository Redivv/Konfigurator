<?php
include('php_files/db_conn.php');
include('php_files/pass.php');

if(isset($_POST['password'])){
    if($_POST['password'] == $pass){
    echo 'worked';
    die();
  }else{
    echo 'redirect';
    die();
  }
}?>
<!DOCTYPE html>
<?php
  if(isset($_POST['top'])){
    $title = $_POST['title'];
    $org_price = $_POST['org_price'];
    $id = $_POST['form_id'];
    $query = "UPDATE `forms` SET `name` = '".$title."', `org_price` = '".$org_price."' WHERE `forms`.`id` = ".$id;
    mysqli_query($conn,$query);
  }
  if((isset($_POST['iroN_form'])) || (isset($_POST['iroNt_form'])) || (isset($_POST['Mac_Pro'])) || (isset($_POST['iMac'])) || (isset($_POST['iMac_pro'])) || (isset($_POST['Mac_mini']))){
    if(isset($_POST['iroN_form'])){$field=1;}
    elseif(isset($_POST['Mac_Pro'])){$field=2;}
    elseif(isset($_POST['iMac'])){$field=3;}
    elseif(isset($_POST['Mac_mini'])){$field=4;}
    elseif(isset($_POST['iMac_pro'])){$field=5;}
    elseif(isset($_POST['iroNt_form'])){$field=6;}
    foreach ($_POST as $k => $v) {
      switch ($k) {
        case 'Procesor':
          $type = 1;
          break;
        case 'Grafika':
          $type = 2;
          break;
        case 'RAM':
          $type = 3;
          break;
        case 'Pamiec':
          $type = 4;
          break;
        case 'Dodatkowe':
          $type = 5;
          break;
        default:
          $type = 0;
          break;
      }
      if($k =="iroN_form" || $k=="iroNt_form" || $k == 'Mac_Pro' || $k == 'iMac' || $k=="iMac_pro" || $k == 'Mac_mini'){break;}
      if($type>1){
        for ($i=0; $i<count($v); $i+=3) {
          $query = "UPDATE `parts` SET `name` ='".$_POST[$k][$i]."', `type_id` ='".$type."', `fieldset_id` = '".$field."', `price` ='".$_POST[$k][$i+2]."' WHERE `parts`.`id` ='".$_POST[$k][$i+1]."'";
          mysqli_query($conn,$query);
        }
      }elseif($type == 1){
        for ($i=0; $i<count($v); $i+=4) {
          $query = "UPDATE `parts` SET `name` ='".$_POST[$k][$i]."', `type_id` ='".$type."', `fieldset_id` = '".$field."', `price` ='".$_POST[$k][$i+2]."', `score` ='".$_POST[$k][$i+3]."' WHERE `parts`.`id` ='".$_POST[$k][$i+1]."'";
          mysqli_query($conn,$query);
        }
      }
    }
  }
  if(isset($_POST['AddNew'])){
    $data = explode('-',$_POST['AddNew']);
    $query = "INSERT INTO `parts` (`id`, `name`, `type_id`, `fieldset_id`, `price`, `score`) VALUES (NULL, 'Nazwa', '".$data[1]."', '".$data[0]."', 'Cena', 'Wynik GeekBench')";
    mysqli_query($conn,$query);
   }
  if(isset($_POST['Delete'])){
    $query = "DELETE FROM `parts` WHERE `parts`.`id` = ".$_POST['Delete'];
    mysqli_query($conn,$query);
  }

  $query = "SELECT * FROM parts";
  $result = mysqli_query($conn,$query);
  $temp = array();
  while($row = mysqli_fetch_assoc($result)){
    $temp[$row['fieldset_id']][$row['type_id']][$row['id']]['name'] = $row['name'];
    $temp[$row['fieldset_id']][$row['type_id']][$row['id']]['price'] = $row['price'];
    $temp[$row['fieldset_id']][$row['type_id']][$row['id']]['score'] = $row['score'];
  }
  $query = "SELECT * FROM forms";
  $result = mysqli_query($conn,$query);
  while($row = mysqli_fetch_assoc($result)){
    $temp2[$row['field']][$row['id']]['name'] = $row['name'];
    $temp2[$row['field']][$row['id']]['org_price'] = $row['org_price'];
    $temp2[$row['field']][$row['id']]['image'] = $row['image'];
  }?>
<style>
  a{
    border: 2px solid gray;
    padding: 3px;
    text-decoration: none;
  }
</style>
<body>
  <div style="height:10px;" id="top"></div>
  <div class="anchor_box">
    <div><a href="#<?php echo str_replace(' ', '_', $temp2[1][6]['name']); ?>"><?php echo $temp2[1][6]['name']; ?></a></div><br>
    <div><a href="#<?php echo str_replace(' ', '_', $temp2[2][2]['name']); ?>"><?php echo $temp2[2][2]['name']; ?></a></div><br>
    <div><a href="#<?php echo str_replace(' ', '_', $temp2[2][3]['name']); ?>"><?php echo $temp2[2][3]['name']; ?></a></div><br>
    <div><a href="#<?php echo str_replace(' ', '_', $temp2[2][5]['name']); ?>"><?php echo $temp2[2][5]['name']; ?></a></div><br>
    <div><a href="#<?php echo str_replace(' ', '_', $temp2[2][4]['name']); ?>"><?php echo $temp2[2][4]['name']; ?></a></div><br>
  </div>
  <form class="iroN" method="post">
    <h3>Tytuł:</h3>
    <input type="text" name="title" value="<?php echo $temp2[1][1]['name']; ?>">
    <h3>Oryginalna cena (cena przy wybraniu podstawowych elementów z ceną 0):</h3>
    <input type="text" name="org_price" value="<?php echo $temp2[1][1]['org_price']; ?>">
    <input type="hidden" name="form_id" value="<?php echo '1'; ?>">
    <div><br><button type="submit" name="top">Zapisz</button></div>
    <fieldset>
      <legend><h2>Procesory</h2></legend>
      <?php if(isset($temp[1][1])){foreach ($temp[1][1] as $k => $v){?>
        <div style="float:left; margin-right:8%; margin-bottom:2%;">
          <input id='1-1' name="Procesor[]" type='text' value="<?php echo $v['name']?>">
          <input type="hidden" name="Procesor[]" value="<?php echo $k; ?>">
          <label for="1-1-1"><h4>Cena:</h4></label>
          <input id="1-1-1" name="Procesor[]" type="text" value="<?php echo $v['price']?>">
          <label for="1-1-2"><h4>Wynik GeekBench:</h4></label>
          <input id="1-1-2" name="Procesor[]" type="text" value="<?php echo $v['score']?>"><br><br>
          <div><button type="submit" name="Delete" value="<?php echo $k; ?>">Usuń</button></div>
        </div>
      <?php }}?>
      <button type="submit" name="AddNew" value="1-1">Dodaj Nowy</button>
      <input class="form_boi" type="submit" name="iroN_form" value="Zapisz">
    </fieldset>
    <br><div><a href="#top">Powrót do początku strony</a></div>
    <fieldset>
      <legend><h2>Karty Graficzne</h2></legend>
      <?php if(isset($temp[1][2])){foreach ($temp[1][2] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='2-1' type="text" name="Grafika[]" value="<?php echo $v['name']?>">
          <input type="hidden" name="Grafika[]" value="<?php echo $k; ?>">
          <label for="2-1-1"><h4>Cena:</h4></label>
          <input id="2-1-1" type="text" name="Grafika[]" value="<?php echo $v['price']?>"><br><br>
          <div><button type="submit" name="Delete" value="<?php echo $k; ?>">Usuń</button></div>
        </div>
      <?php }}?>
      <button type="submit" name="AddNew" value="1-2">Dodaj Nowy</button>
      <input class="form_boi" type="submit" name="iroN_form" value="Zapisz">
    </fieldset>
    <br><div><a href="#top">Powrót do początku strony</a></div>
    <fieldset>
      <legend><h2>RAM</h2></legend>
      <?php if(isset($temp[1][3])){foreach ($temp[1][3] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='3-1' type="text" name="RAM[]" value="<?php echo $v['name']?>">
          <input type="hidden" name="RAM[]" value="<?php echo $k; ?>">
          <label for="3-1-1"><h4>Cena:</h4></label>
          <input id="3-1-1" type="text" name="RAM[]" value="<?php echo $v['price']?>"><br><br>
          <div><button type="submit" name="Delete" value="<?php echo $k; ?>">Usuń</button></div>
        </div>
      <?php }}?>
      <button type="submit" name="AddNew" value="1-3">Dodaj Nowy</button>
      <input class="form_boi" type="submit" name="iroN_form" value="Zapisz">
    </fieldset>
    <br><div><a href="#top">Powrót do początku strony</a></div>
    <fieldset>
      <legend><h2>Pamięć</h2></legend>
      <?php if(isset($temp[1][4])){foreach ($temp[1][4] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='4-1' type="text" name="Pamiec[]" value="<?php echo $v['name']?>">
          <input type="hidden" name="Pamiec[]" value="<?php echo $k; ?>">
          <label for="4-1-1"><h4>Cena:</h4></label>
          <input id="4-1-1" type="text" name="Pamiec[]" value="<?php echo $v['price']?>"><br><br>
          <div><button type="submit" name="Delete" value="<?php echo $k; ?>">Usuń</button></div>
        </div>
      <?php }}?>
      <button type="submit" name="AddNew" value="1-4">Dodaj Nowy</button>
      <input class="form_boi" type="submit" name="iroN_form" value="Zapisz">
    </fieldset>
    <br><div><a href="#top">Powrót do początku strony</a></div>
    <fieldset>
      <legend><h2>Dodatkowe Wyposażenie</h2></legend>
      <?php if(isset($temp[1][5])){foreach ($temp[1][5] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='5-1' type="text" name="Dodatkowe[]" value="<?php echo $v['name']?>">
          <input type="hidden" name="Dodatkowe[]" value="<?php echo $k; ?>">
          <label for="5-1-1"><h4>Cena:</h4></label>
          <input id="5-1-1" type="text" name="Dodatkowe[]" value="<?php echo $v['price']?>"><br><br>
        </div>
      <?php }}?>
      <input class="form_boi" type="submit" name="iroN_form" value="Zapisz">
    </fieldset>
    <br><div><a href="#top">Powrót do początku strony</a></div>
  </form>
  <form id="<?php echo str_replace(' ', '_', $temp2[1][6]['name']); ?>" class="iroN_Tower" method="post">
    <h3>Tytuł:</h3>
    <input type="text" name="title" value="<?php echo $temp2[1][6]['name']; ?>">
    <h3>Oryginalna cena (cena przy wybraniu podstawowych elementów z ceną 0):</h3>
    <input type="text" name="org_price" value="<?php echo $temp2[1][6]['org_price']; ?>">
    <input type="hidden" name="form_id" value="<?php echo '6'; ?>">
    <div><br><button type="submit" name="top">Zapisz</button></div>
    <fieldset>
      <legend><h2>Procesory</h2></legend>
      <?php if(isset($temp[6][1])){foreach ($temp[6][1] as $k => $v){?>
        <div style="float:left; margin-right:8%; margin-bottom:2%;">
          <input id='1-1-t' name="Procesor[]" type='text' value="<?php echo $v['name']?>">
          <input type="hidden" name="Procesor[]" value="<?php echo $k; ?>">
          <label for="1-1-1-t"><h4>Cena:</h4></label>
          <input id="1-1-1-t" name="Procesor[]" type="text" value="<?php echo $v['price']?>">
          <label for="1-1-2-t"><h4>Wynik GeekBench:</h4></label>
          <input id="1-1-2-t" name="Procesor[]" type="text" value="<?php echo $v['score']?>"><br><br>
          <div><button type="submit" name="Delete" value="<?php echo $k; ?>">Usuń</button></div>
        </div>
      <?php }}?>
      <button type="submit" name="AddNew" value="6-1">Dodaj Nowy</button>
      <input class="form_boi" type="submit" name="iroNt_form" value="Zapisz">
    </fieldset>
    <br><div><a href="#top">Powrót do początku strony</a></div>
    <fieldset>
      <legend><h2>Karty Graficzne</h2></legend>
      <?php if(isset($temp[6][2])){foreach ($temp[6][2] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='2-1-t' type="text" name="Grafika[]" value="<?php echo $v['name']?>">
          <input type="hidden" name="Grafika[]" value="<?php echo $k; ?>">
          <label for="2-1-1-t"><h4>Cena:</h4></label>
          <input id="2-1-1-t" type="text" name="Grafika[]" value="<?php echo $v['price']?>"><br><br>
          <div><button type="submit" name="Delete" value="<?php echo $k; ?>">Usuń</button></div>
        </div>
      <?php }}?>
      <button type="submit" name="AddNew" value="6-2">Dodaj Nowy</button>
      <input class="form_boi" type="submit" name="iroNt_form" value="Zapisz">
    </fieldset>
    <br><div><a href="#top">Powrót do początku strony</a></div>
    <fieldset>
      <legend><h2>RAM</h2></legend>
      <?php if(isset($temp[6][3])){foreach ($temp[6][3] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='3-1-t' type="text" name="RAM[]" value="<?php echo $v['name']?>">
          <input type="hidden" name="RAM[]" value="<?php echo $k; ?>">
          <label for="3-1-1-t"><h4>Cena:</h4></label>
          <input id="3-1-1-t" type="text" name="RAM[]" value="<?php echo $v['price']?>"><br><br>
          <div><button type="submit" name="Delete" value="<?php echo $k; ?>">Usuń</button></div>
        </div>
      <?php }}?>
      <button type="submit" name="AddNew" value="6-3">Dodaj Nowy</button>
      <input class="form_boi" type="submit" name="iroNt_form" value="Zapisz">
    </fieldset>
    <br><div><a href="#top">Powrót do początku strony</a></div>
    <fieldset>
      <legend><h2>Pamięć</h2></legend>
      <?php if(isset($temp[6][4])){foreach ($temp[6][4] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='4-1-t' type="text" name="Pamiec[]" value="<?php echo $v['name']?>">
          <input type="hidden" name="Pamiec[]" value="<?php echo $k; ?>">
          <label for="4-1-1-t"><h4>Cena:</h4></label>
          <input id="4-1-1-t" type="text" name="Pamiec[]" value="<?php echo $v['price']?>"><br><br>
          <div><button type="submit" name="Delete" value="<?php echo $k; ?>">Usuń</button></div>
        </div>
      <?php }}?>
      <button type="submit" name="AddNew" value="6-4">Dodaj Nowy</button>
      <input class="form_boi" type="submit" name="iroNt_form" value="Zapisz">
    </fieldset>
    <br><div><a href="#top">Powrót do początku strony</a></div>
    <fieldset>
      <legend><h2>Dodatkowe Wyposażenie</h2></legend>
      <?php if(isset($temp[6][5])){foreach ($temp[6][5] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='6-1' type="text" name="Dodatkowe[]" value="<?php echo $v['name']?>">
          <input type="hidden" name="Dodatkowe[]" value="<?php echo $k; ?>">
          <label for="6-1-1"><h4>Cena:</h4></label>
          <input id="6-1-1" type="text" name="Dodatkowe[]" value="<?php echo $v['price']?>"><br><br>
        </div>
      <?php }}?>
      <input class="form_boi" type="submit" name="iroNt_form" value="Zapisz">
    </fieldset>
    <br><div><a href="#top">Powrót do początku strony</a></div>
  </form>
  <form id="<?php echo str_replace(' ', '_', $temp2[2][2]['name']); ?>" class="Mac_Pro" method="post">
    <h3>Tytuł:</h3>
    <input type="text" name="title" value="<?php echo $temp2[2][2]['name']; ?>">
    <h3>Oryginalna cena (cena przy wybraniu podstawowych elementów z ceną 0):</h3>
    <input type="text" name="org_price" value="<?php echo $temp2[2][2]['org_price']; ?>">
    <input type="hidden" name="form_id" value="<?php echo '2'; ?>">
    <div><br><button type="submit" name="top">Zapisz</button></div>
    <fieldset>
      <legend><h2>Procesory</h2></legend>
      <?php if(isset($temp[2][1])){foreach ($temp[2][1] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='1-1-M' name="Procesor[]" type='text' value="<?php echo $v['name']?>">
          <input type="hidden" name="Procesor[]" value="<?php echo $k; ?>">
          <label for="1-1-1-M"><h4>Cena:</h4></label>
          <input id="1-1-1-M" name="Procesor[]" type="text" value="<?php echo $v['price']?>">
          <label for="1-1-2-M"><h4>Wynik GeekBench:</h4></label>
          <input id="1-1-2-M" name="Procesor[]" type="text" value="<?php echo $v['score']?>"><br><br>
          <div><button type="submit" name="Delete" value="<?php echo $k; ?>">Usuń</button></div>
        </div>
      <?php }}?>
      <button type="submit" name="AddNew" value="2-1">Dodaj Nowy</button>
      <input class="form_boi" type="submit" name="Mac_Pro" value="Zapisz">
    </fieldset>
    <br><div><a href="#top">Powrót do początku strony</a></div>
    <fieldset>
      <legend><h2>Karty Graficzne</h2></legend>
      <?php if(isset($temp[2][2])){foreach ($temp[2][2] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='2-1-M' type="text" name="Grafika[]" value="<?php echo $v['name']?>">
          <input type="hidden" name="Grafika[]" value="<?php echo $k; ?>">
          <label for="2-1-1-M"><h4>Cena:</h4></label>
          <input id="2-1-1-M" type="text" name="Grafika[]" value="<?php echo $v['price']?>"><br><br>
          <div><button type="submit" name="Delete" value="<?php echo $k; ?>">Usuń</button></div>
        </div>
      <?php }}?>
      <button type="submit" name="AddNew" value="2-2">Dodaj Nowy</button>
      <input class="form_boi" type="submit" name="Mac_Pro" value="Zapisz">
    </fieldset>
    <br><div><a href="#top">Powrót do początku strony</a></div>
    <fieldset>
      <legend><h2>RAM</h2></legend>
      <?php if(isset($temp[2][3])){foreach ($temp[2][3] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='3-1-M' type="text" name="RAM[]" value="<?php echo $v['name']?>">
          <input type="hidden" name="RAM[]" value="<?php echo $k; ?>">
          <label for="3-1-1-M"><h4>Cena:</h4></label>
          <input id="3-1-1-M" type="text" name="RAM[]" value="<?php echo $v['price']?>"><br><br>
          <div><button type="submit" name="Delete" value="<?php echo $k;; ?>">Usuń</button></div>
        </div>
      <?php }}?>
      <button type="submit" name="AddNew" value="2-3">Dodaj Nowy</button>
      <input class="form_boi" type="submit" name="Mac_Pro" value="Zapisz">
    </fieldset>
    <br><div><a href="#top">Powrót do początku strony</a></div>
    <fieldset>
      <legend><h2>Pamięć</h2></legend>
      <?php if(isset($temp[2][4])){foreach ($temp[2][4] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='4-1-M' type="text" name="Pamiec[]" value="<?php echo $v['name']?>">
          <input type="hidden" name="Pamiec[]" value="<?php echo $k; ?>">
          <label for="4-1-1-M"><h4>Cena:</h4></label>
          <input id="4-1-1-M" type="text" name="Pamiec[]" value="<?php echo $v['price']?>"><br><br>
          <div><button type="submit" name="Delete" value="<?php echo $k; ?>">Usuń</button></div>
        </div>
      <?php }}?>
      <button type="submit" name="AddNew" value="2-4">Dodaj Nowy</button>
      <input class="form_boi" type="submit" name="Mac_Pro" value="Zapisz">
    </fieldset>
    <br><div><a href="#top">Powrót do początku strony</a></div>
    <fieldset>
      <legend><h2>Dodatkowe Wyposażenie</h2></legend>
      <?php if(isset($temp[2][5])){foreach ($temp[2][5] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='5-1-M' type="text" name="Dodatkowe[]" value="<?php echo $v['name']?>">
          <input type="hidden" name="Dodatkowe[]" value="<?php echo $k; ?>">
          <label for="5-1-1-M"><h4>Cena:</h4></label>
          <input id="5-1-1-M" type="text" name="Dodatkowe[]" value="<?php echo $v['price']?>"><br><br>
        </div>
      <?php }}?>
      <input class="form_boi" type="submit" name="Mac_Pro" value="Zapisz">
    </fieldset>
    <br><div><a href="#top">Powrót do początku strony</a></div>
  </form>
  <form id="<?php echo str_replace(' ', '_', $temp2[2][3]['name']); ?>" class="iMac" method="post">
    <h3>Tytuł:</h3>
    <input type="text" name="title" value="<?php echo $temp2[2][3]['name']; ?>">
    <h3>Oryginalna cena (cena przy wybraniu podstawowych elementów z ceną 0):</h3>
    <input type="text" name="org_price" value="<?php echo $temp2[2][3]['org_price']; ?>">
    <input type="hidden" name="form_id" value="<?php echo '3'; ?>">
    <div><br><button type="submit" name="top">Zapisz</button></div>
    <fieldset>
      <legend><h2>Procesory</h2></legend>
      <?php if(isset($temp[3][1])){foreach ($temp[3][1] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='1-1-iM' name="Procesor[]" type='text' value="<?php echo $v['name']?>">
          <input type="hidden" name="Procesor[]" value="<?php echo $k; ?>">
          <label for="1-1-1-iM"><h4>Cena:</h4></label>
          <input id="1-1-1-iM" name="Procesor[]" type="text" value="<?php echo $v['price']?>">
          <label for="1-1-2-iM"><h4>Wynik GeekBench:</h4></label>
          <input id="1-1-2-iM" name="Procesor[]" type="text" value="<?php echo $v['score']?>"><br><br>
          <div><button type="submit" name="Delete" value="<?php echo $k; ?>">Usuń</button></div>
        </div>
      <?php }}?>
      <button type="submit" name="AddNew" value="3-1">Dodaj Nowy</button>
      <input class="form_boi" type="submit" name="iMac" value="Zapisz">
    </fieldset>
    <br><div><a href="#top">Powrót do początku strony</a></div>
    <fieldset>
      <legend><h2>Karty Graficzne</h2></legend>
      <?php if(isset($temp[3][2])){foreach ($temp[3][2] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='2-1-iM' type="text" name="Grafika[]" value="<?php echo $v['name']?>">
          <input type="hidden" name="Grafika[]" value="<?php echo $k; ?>">
          <label for="2-1-1-iM"><h4>Cena:</h4></label>
          <input id="2-1-1-iM" type="text" name="Grafika[]" value="<?php echo $v['price']?>"><br><br>
          <div><button type="submit" name="Delete" value="<?php echo $k; ?>">Usuń</button></div>
        </div>
      <?php }}?>
      <button type="submit" name="AddNew" value="3-2">Dodaj Nowy</button>
      <input class="form_boi" type="submit" name="iMac" value="Zapisz">
    </fieldset>
    <br><div><a href="#top">Powrót do początku strony</a></div>
    <fieldset>
      <legend><h2>RAM</h2></legend>
      <?php if(isset($temp[3][3])){foreach ($temp[3][3] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='3-1-iM' type="text" name="RAM[]" value="<?php echo $v['name']?>">
          <input type="hidden" name="RAM[]" value="<?php echo $k; ?>">
          <label for="3-1-1-iM"><h4>Cena:</h4></label>
          <input id="3-1-1-iM" type="text" name="RAM[]" value="<?php echo $v['price']?>"><br><br>
          <div><button type="submit" name="Delete" value="<?php echo $k; ?>">Usuń</button></div>
        </div>
      <?php }}?>
      <button type="submit" name="AddNew" value="3-3">Dodaj Nowy</button>
      <input class="form_boi" type="submit" name="iMac" value="Zapisz">
    </fieldset>
    <br><div><a href="#top">Powrót do początku strony</a></div>
    <fieldset>
      <legend><h2>Pamięć</h2></legend>
      <?php if(isset($temp[3][4])){foreach ($temp[3][4] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='4-1-iM' type="text" name="Pamiec[]" value="<?php echo $v['name']?>">
          <input type="hidden" name="Pamiec[]" value="<?php echo $k; ?>">
          <label for="4-1-1-iM"><h4>Cena:</h4></label>
          <input id="4-1-1-iM" type="text" name="Pamiec[]" value="<?php echo $v['price']?>"><br><br>
          <div><button type="submit" name="Delete" value="<?php echo $k; ?>">Usuń</button></div>
        </div>
      <?php }}?>
      <button type="submit" name="AddNew" value="3-4">Dodaj Nowy</button>
      <input class="form_boi" type="submit" name="iMac" value="Zapisz">
    </fieldset>
    <br><div><a href="#top">Powrót do początku strony</a></div>
    <fieldset>
      <legend><h2>Dodatkowe Wyposażenie</h2></legend>
      <?php if(isset($temp[3][5])){foreach ($temp[3][5] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='5-1-iM' type="text" name="Dodatkowe[]" value="<?php echo $v['name']?>">
          <input type="hidden" name="Dodatkowe[]" value="<?php echo $k; ?>">
          <label for="5-1-1-iM"><h4>Cena:</h4></label>
          <input id="5-1-1-iM" type="text" name="Dodatkowe[]" value="<?php echo $v['price']?>"><br><br>
        </div>
      <?php }}?>
      <input class="form_boi" type="submit" name="iMac" value="Zapisz">
    </fieldset>
    <br><div><a href="#top">Powrót do początku strony</a></div>
  </form>
  <form id="<?php echo str_replace(' ', '_', $temp2[2][5]['name']); ?>" class="iMac_pro" method="post">
    <h3>Tytuł:</h3>
    <input type="text" name="title" value="<?php echo $temp2[2][5]['name']; ?>">
    <h3>Oryginalna cena (cena przy wybraniu podstawowych elementów z ceną 0):</h3>
    <input type="text" name="org_price" value="<?php echo $temp2[2][5]['org_price']; ?>">
    <input type="hidden" name="form_id" value="<?php echo '5'; ?>">
    <div><br><button type="submit" name="top">Zapisz</button></div>
    <fieldset>
      <legend><h2>Procesory</h2></legend>
      <?php if(isset($temp[5][1])){foreach ($temp[5][1] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='1-1-iMP' name="Procesor[]" type='text' value="<?php echo $v['name']?>">
          <input type="hidden" name="Procesor[]" value="<?php echo $k; ?>">
          <label for="1-1-1-iMP"><h4>Cena:</h4></label>
          <input id="1-1-1-iMP" name="Procesor[]" type="text" value="<?php echo $v['price']?>">
          <label for="1-1-2-iMP"><h4>Wynik GeekBench:</h4></label>
          <input id="1-1-2-iMP" name="Procesor[]" type="text" value="<?php echo $v['score']?>"><br><br>
          <div><button type="submit" name="Delete" value="<?php echo $k; ?>">Usuń</button></div>
        </div>
      <?php }}?>
      <button type="submit" name="AddNew" value="5-1">Dodaj Nowy</button>
      <input class="form_boi" type="submit" name="iMac_pro" value="Zapisz">
    </fieldset>
    <br><div><a href="#top">Powrót do początku strony</a></div>
    <fieldset>
      <legend><h2>Karty Graficzne</h2></legend>
      <?php if(isset($temp[5][2])){foreach ($temp[5][2] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='2-1-iMP' type="text" name="Grafika[]" value="<?php echo $v['name']?>">
          <input type="hidden" name="Grafika[]" value="<?php echo $k; ?>">
          <label for="2-1-1-iMP"><h4>Cena:</h4></label>
          <input id="2-1-1-iMP" type="text" name="Grafika[]" value="<?php echo $v['price']?>"><br><br>
          <div><button type="submit" name="Delete" value="<?php echo $k; ?>">Usuń</button></div>
        </div>
      <?php }}?>
      <button type="submit" name="AddNew" value="5-2">Dodaj Nowy</button>
      <input class="form_boi" type="submit" name="iMac_pro" value="Zapisz">
    </fieldset>
    <br><div><a href="#top">Powrót do początku strony</a></div>
    <fieldset>
      <legend><h2>RAM</h2></legend>
      <?php if(isset($temp[5][3])){foreach ($temp[5][3] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='3-1-iMP' type="text" name="RAM[]" value="<?php echo $v['name']?>">
          <input type="hidden" name="RAM[]" value="<?php echo $k; ?>">
          <label for="3-1-1-iMP"><h4>Cena:</h4></label>
          <input id="3-1-1-iMP" type="text" name="RAM[]" value="<?php echo $v['price']?>"><br><br>
          <div><button type="submit" name="Delete" value="<?php echo $k; ?>">Usuń</button></div>
        </div>
      <?php }}?>
      <button type="submit" name="AddNew" value="5-3">Dodaj Nowy</button>
      <input class="form_boi" type="submit" name="iMac_pro" value="Zapisz">
    </fieldset>
    <br><div><a href="#top">Powrót do początku strony</a></div>
    <fieldset>
      <legend><h2>Pamięć</h2></legend>
      <?php if(isset($temp[5][4])){foreach ($temp[5][4] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='4-1-iMP' type="text" name="Pamiec[]" value="<?php echo $v['name']?>">
          <input type="hidden" name="Pamiec[]" value="<?php echo $k; ?>">
          <label for="4-1-1-iMP"><h4>Cena:</h4></label>
          <input id="4-1-1-iMP" type="text" name="Pamiec[]" value="<?php echo $v['price']?>"><br><br>
          <div><button type="submit" name="Delete" value="<?php echo $k; ?>">Usuń</button></div>
        </div>
      <?php }}?>
      <button type="submit" name="AddNew" value="5-4">Dodaj Nowy</button>
      <input class="form_boi" type="submit" name="iMac_pro" value="Zapisz">
    </fieldset>
    <br><div><a href="#top">Powrót do początku strony</a></div>
    <fieldset>
      <legend><h2>Dodatkowe Wyposażenie</h2></legend>
      <?php if(isset($temp[5][5])){foreach ($temp[5][5] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='5-1-iMP' type="text" name="Dodatkowe[]" value="<?php echo $v['name']?>">
          <input type="hidden" name="Dodatkowe[]" value="<?php echo $k; ?>">
          <label for="5-1-1-iMP"><h4>Cena:</h4></label>
          <input id="5-1-1-iMP" type="text" name="Dodatkowe[]" value="<?php echo $v['price']?>"><br><br>
        </div>
      <?php }}?>
      <input class="form_boi" type="submit" name="iMac_pro" value="Zapisz">
    </fieldset>
    <br><div><a href="#top">Powrót do początku strony</a></div>
  </form>
  <form id="<?php echo str_replace(' ', '_', $temp2[2][4]['name']); ?>" class="Mac_mini" method="post">
    <h3>Tytuł:</h3>
    <input type="text" name="title" value="<?php echo $temp2[2][4]['name']; ?>">
    <h3>Oryginalna cena (cena przy wybraniu podstawowych elementów z ceną 0):</h3>
    <input type="text" name="org_price" value="<?php echo $temp2[2][4]['org_price']; ?>">
    <input type="hidden" name="form_id" value="<?php echo '4'; ?>">
    <div><br><button type="submit" name="top">Zapisz</button></div>
    <fieldset>
      <legend><h2>Procesory</h2></legend>
      <?php if(isset($temp[4][1])){foreach ($temp[4][1] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='1-1-Mm' name="Procesor[]" type='text' value="<?php echo $v['name']?>">
          <input type="hidden" name="Procesor[]" value="<?php echo $k; ?>">
          <label for="1-1-1-Mm"><h4>Cena:</h4></label>
          <input id="1-1-1-Mm" name="Procesor[]" type="text" value="<?php echo $v['price']?>">
          <label for="1-1-2-Mm"><h4>Wynik GeekBench:</h4></label>
          <input id="1-1-2-Mm" name="Procesor[]" type="text" value="<?php echo $v['score']?>"><br><br>
          <div><button type="submit" name="Delete" value="<?php echo $k; ?>">Usuń</button></div>
        </div>
      <?php }}?>
      <button type="submit" name="AddNew" value="4-1">Dodaj Nowy</button>
      <input class="form_boi" type="submit" name="Mac_mini" value="Zapisz">
    </fieldset>
    <br><div><a href="#top">Powrót do początku strony</a></div>
    <fieldset>
      <legend><h2>Karty Graficzne</h2></legend>
      <?php if(isset($temp[4][2])){foreach ($temp[4][2] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='2-1-Mm' type="text" name="Grafika[]" value="<?php echo $v['name']?>">
          <input type="hidden" name="Grafika[]" value="<?php echo $k; ?>">
          <label for="2-1-1-Mm"><h4>Cena:</h4></label>
          <input id="2-1-1-Mm" type="text" name="Grafika[]" value="<?php echo $v['price']?>"><br><br>
          <div><button type="submit" name="Delete" value="<?php echo $k; ?>">Usuń</button></div>
        </div>
      <?php }}?>
      <button type="submit" name="AddNew" value="4-2">Dodaj Nowy</button>
      <input class="form_boi" type="submit" name="Mac_mini" value="Zapisz">
    </fieldset>
    <br><div><a href="#top">Powrót do początku strony</a></div>
    <fieldset>
      <legend><h2>RAM</h2></legend>
      <?php if(isset($temp[4][3])){foreach ($temp[4][3] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='3-1-Mm' type="text" name="RAM[]" value="<?php echo $v['name']?>">
          <input type="hidden" name="RAM[]" value="<?php echo $k; ?>">
          <label for="3-1-1-Mm"><h4>Cena:</h4></label>
          <input id="3-1-1-Mm" type="text" name="RAM[]" value="<?php echo $v['price']?>"><br><br>
          <div><button type="submit" name="Delete" value="<?php echo $k; ?>">Usuń</button></div>
        </div>
      <?php }}?>
      <button type="submit" name="AddNew" value="4-3">Dodaj Nowy</button>
      <input class="form_boi" type="submit" name="Mac_mini" value="Zapisz">
    </fieldset>
    <br><div><a href="#top">Powrót do początku strony</a></div>
    <fieldset>
      <legend><h2>Pamięć</h2></legend>
      <?php if(isset($temp[4][4])){foreach ($temp[4][4] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='4-1-Mm' type="text" name="Pamiec[]" value="<?php echo $v['name']?>">
          <input type="hidden" name="Pamiec[]" value="<?php echo $k; ?>">
          <label for="4-1-1-Mm"><h4>Cena:</h4></label>
          <input id="4-1-1-Mm" type="text" name="Pamiec[]" value="<?php echo $v['price']?>"><br><br>
          <div><button type="submit" name="Delete" value="<?php echo $k; ?>">Usuń</button></div>
        </div>
      <?php }}?>
      <button type="submit" name="AddNew" value="4-4">Dodaj Nowy</button>
      <input class="form_boi" type="submit" name="Mac_mini" value="Zapisz">
    </fieldset>
    <br><div><a href="#top">Powrót do początku strony</a></div>
    <fieldset>
      <legend><h2>Dodatkowe Wyposażenie</h2></legend>
      <?php if(isset($temp[4][5])){foreach ($temp[4][5] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='5-1-Mm' type="text" name="Dodatkowe[]" value="<?php echo $v['name']?>">
          <input type="hidden" name="Dodatkowe[]" value="<?php echo $k; ?>">
          <label for="5-1-1-Mm"><h4>Cena:</h4></label>
          <input id="5-1-1-Mm" type="text" name="Dodatkowe[]" value="<?php echo $v['price']?>"><br><br>
        </div>
      <?php }}?>
      <input class="form_boi" type="submit" name="Mac_mini" value="Zapisz">
    </fieldset>
    <br><div><a href="#top">Powrót do początku strony</a></div>
  </form>
</body>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    if(!window.sessionStorage) {  // if sessionStorage not supported
        var password = prompt('Podaj Hasło'); // perform other action
        $.ajax({
          type:'post',
          data: {password:password},
          error:function(){
          window.location.href = "http://iron.com.pl/";
            window.sessionStorage.removeItem('password');
          }
        });
      }
    var password = window.sessionStorage.getItem('password');
    if (!password) {
        var password = prompt('Podaj Hasło',);
        window.sessionStorage.setItem('password',password);
    }
    $.ajax({
      type:'post',
      data: {password:password},
      success:function(response){
        if(response != "worked"){
          window.sessionStorage.removeItem('password');
          window.location.href = 'http://iron.com.pl/';
        }
      }
    });
  })
</script>
