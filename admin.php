<!DOCTYPE html>
<?php
include('php_files/db_conn.php');
include('php_files/pass.php');
  if((isset($_POST['iroN_form'])) || (isset($_POST['Mac_Pro'])) || (isset($_POST['iMac'])) || (isset($_POST['Mac_mini']))){
    if(isset($_POST['iroN_form'])){$field=1;}
    elseif(isset($_POST['Mac_Pro'])){$field=2;}
    elseif(isset($_POST['iMac'])){$field=3;}
    elseif(isset($_POST['Mac_mini'])){$field=4;}
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
      }
      if($k =="iroN_form" || $k == 'Mac_Pro' || $k == 'iMac' || $k == 'Mac_mini'){break;}
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
  if(isset($_POST['pass'])){
    if($_POST['pass'] == $pass){
      exit;
    }else{
      die(header("HTTP/1.0 404 Not Found"));
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
  $id = 0;
  while($row = mysqli_fetch_assoc($result)){
    $temp[$row['fieldset_id']][$row['type_id']][$row['id']]['name'] = $row['name'];
    $temp[$row['fieldset_id']][$row['type_id']][$row['id']]['price'] = $row['price'];
    $temp[$row['fieldset_id']][$row['type_id']][$row['id']]['score'] = $row['score'];
    $id++;
  }?>
<body>
  <form class="iroN" method="post">
    <h1>iroN</h1>
    <fieldset>
      <legend><h2>Procesory</h2></legend>
      <?php foreach ($temp[1][1] as $k => $v){?>
        <div style="float:left; margin-right:8%; margin-bottom:2%;">
          <input id='1-1' name="Procesor[]" type='text' value="<?php echo $v['name']?>">
          <input type="hidden" name="Procesor[]" value="<?php echo $k; ?>">
          <label for="1-1-1"><h4>Cena:</h4></label>
          <input id="1-1-1" name="Procesor[]" type="text" value="<?php echo $v['price']?>">
          <label for="1-1-2"><h4>Wynik GeekBench:</h4></label>
          <input id="1-1-2" name="Procesor[]" type="text" value="<?php echo $v['score']?>"><br><br>
          <div><button type="submit" name="Delete" value="<?php echo $k; ?>">Usuń</button></div>
        </div>
      <?php }?>
      <button type="submit" name="AddNew" value="1-1">Dodaj Nowy</button>
      <input class="form_boi" type="submit" name="iroN_form" value="Zapisz">
    </fieldset>
    <fieldset>
      <legend><h2>Karty Graficzne</h2></legend>
      <?php foreach ($temp[1][2] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='2-1' type="text" name="Grafika[]" value="<?php echo $v['name']?>">
          <input type="hidden" name="Grafika[]" value="<?php echo $k; ?>">
          <label for="2-1-1"><h4>Cena:</h4></label>
          <input id="2-1-1" type="text" name="Grafika[]" value="<?php echo $v['price']?>"><br><br>
          <div><button type="submit" name="Delete" value="<?php echo $k; ?>">Usuń</button></div>
        </div>
      <?php } ?>
      <button type="submit" name="AddNew" value="1-2">Dodaj Nowy</button>
      <input class="form_boi" type="submit" name="iroN_form" value="Zapisz">
    </fieldset>
    <fieldset>
      <legend><h2>RAM</h2></legend>
      <?php foreach ($temp[1][3] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='3-1' type="text" name="RAM[]" value="<?php echo $v['name']?>">
          <input type="hidden" name="RAM[]" value="<?php echo $k; ?>">
          <label for="3-1-1"><h4>Cena:</h4></label>
          <input id="3-1-1" type="text" name="RAM[]" value="<?php echo $v['price']?>"><br><br>
          <div><button type="submit" name="Delete" value="<?php echo $k; ?>">Usuń</button></div>
        </div>
      <?php }?>
      <button type="submit" name="AddNew" value="1-3">Dodaj Nowy</button>
      <input class="form_boi" type="submit" name="iroN_form" value="Zapisz">
    </fieldset>
    <fieldset>
      <legend><h2>Pamięć</h2></legend>
      <?php foreach ($temp[1][4] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='4-1' type="text" name="Pamiec[]" value="<?php echo $v['name']?>">
          <input type="hidden" name="Pamiec[]" value="<?php echo $k; ?>">
          <label for="4-1-1"><h4>Cena:</h4></label>
          <input id="4-1-1" type="text" name="Pamiec[]" value="<?php echo $v['price']?>"><br><br>
          <div><button type="submit" name="Delete" value="<?php echo $k; ?>">Usuń</button></div>
        </div>
      <?php }?>
      <button type="submit" name="AddNew" value="1-4">Dodaj Nowy</button>
      <input class="form_boi" type="submit" name="iroN_form" value="Zapisz">
    </fieldset>
  </form>
  <form class="Mac_Pro" method="post">
    <h1>Mac Pro</h1>
    <fieldset>
      <legend><h2>Procesory</h2></legend>
      <?php foreach ($temp[2][1] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='1-1-M' name="Procesor[]" type='text' value="<?php echo $v['name']?>">
          <input type="hidden" name="Procesor[]" value="<?php echo $k; ?>">
          <label for="1-1-1-M"><h4>Cena:</h4></label>
          <input id="1-1-1-M" name="Procesor[]" type="text" value="<?php echo $v['price']?>">
          <label for="1-1-2-M"><h4>Wynik GeekBench:</h4></label>
          <input id="1-1-2-M" name="Procesor[]" type="text" value="<?php echo $v['score']?>"><br><br>
          <div><button type="submit" name="Delete" value="<?php echo $k; ?>">Usuń</button></div>
        </div>
      <?php }?>
      <button type="submit" name="AddNew" value="2-1">Dodaj Nowy</button>
      <input class="form_boi" type="submit" name="Mac_Pro" value="Zapisz">
    </fieldset>
    <fieldset>
      <legend><h2>Karty Graficzne</h2></legend>
      <?php foreach ($temp[2][2] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='2-1-M' type="text" name="Grafika[]" value="<?php echo $v['name']?>">
          <input type="hidden" name="Grafika[]" value="<?php echo $k; ?>">
          <label for="2-1-1-M"><h4>Cena:</h4></label>
          <input id="2-1-1-M" type="text" name="Grafika[]" value="<?php echo $v['price']?>"><br><br>
          <div><button type="submit" name="Delete" value="<?php echo $k; ?>">Usuń</button></div>
        </div>
      <?php } ?>
      <button type="submit" name="AddNew" value="2-2">Dodaj Nowy</button>
      <input class="form_boi" type="submit" name="Mac_Pro" value="Zapisz">
    </fieldset>
    <fieldset>
      <legend><h2>RAM</h2></legend>
      <?php foreach ($temp[2][3] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='3-1-M' type="text" name="RAM[]" value="<?php echo $v['name']?>">
          <input type="hidden" name="RAM[]" value="<?php echo $k; ?>">
          <label for="3-1-1-M"><h4>Cena:</h4></label>
          <input id="3-1-1-M" type="text" name="RAM[]" value="<?php echo $v['price']?>"><br><br>
          <div><button type="submit" name="Delete" value="<?php echo $k;; ?>">Usuń</button></div>
        </div>
      <?php }?>
      <button type="submit" name="AddNew" value="2-3">Dodaj Nowy</button>
      <input class="form_boi" type="submit" name="Mac_Pro" value="Zapisz">
    </fieldset>
    <fieldset>
      <legend><h2>Pamięć</h2></legend>
      <?php foreach ($temp[2][4] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='4-1-M' type="text" name="Pamiec[]" value="<?php echo $v['name']?>">
          <input type="hidden" name="Pamiec[]" value="<?php echo $k; ?>">
          <label for="4-1-1-M"><h4>Cena:</h4></label>
          <input id="4-1-1-M" type="text" name="Pamiec[]" value="<?php echo $v['price']?>"><br><br>
          <div><button type="submit" name="Delete" value="<?php echo $k; ?>">Usuń</button></div>
        </div>
      <?php }?>
      <button type="submit" name="AddNew" value="2-4">Dodaj Nowy</button>
      <input class="form_boi" type="submit" name="Mac_Pro" value="Zapisz">
    </fieldset>
  </form>
  <form class="iMac" method="post">
    <h1>iMac</h1>
    <fieldset>
      <legend><h2>Procesory</h2></legend>
      <?php foreach ($temp[3][1] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='1-1-iM' name="Procesor[]" type='text' value="<?php echo $v['name']?>">
          <input type="hidden" name="Procesor[]" value="<?php echo $k; ?>">
          <label for="1-1-1-iM"><h4>Cena:</h4></label>
          <input id="1-1-1-iM" name="Procesor[]" type="text" value="<?php echo $v['price']?>">
          <label for="1-1-2-iM"><h4>Wynik GeekBench:</h4></label>
          <input id="1-1-2-iM" name="Procesor[]" type="text" value="<?php echo $v['score']?>"><br><br>
          <div><button type="submit" name="Delete" value="<?php echo $k; ?>">Usuń</button></div>
        </div>
      <?php }?>
      <button type="submit" name="AddNew" value="3-1">Dodaj Nowy</button>
      <input class="form_boi" type="submit" name="iMac" value="Zapisz">
    </fieldset>
    <fieldset>
      <legend><h2>Karty Graficzne</h2></legend>
      <?php foreach ($temp[3][2] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='2-1-iM' type="text" name="Grafika[]" value="<?php echo $v['name']?>">
          <input type="hidden" name="Grafika[]" value="<?php echo $k; ?>">
          <label for="2-1-1-iM"><h4>Cena:</h4></label>
          <input id="2-1-1-iM" type="text" name="Grafika[]" value="<?php echo $v['price']?>"><br><br>
          <div><button type="submit" name="Delete" value="<?php echo $k; ?>">Usuń</button></div>
        </div>
      <?php } ?>
      <button type="submit" name="AddNew" value="3-2">Dodaj Nowy</button>
      <input class="form_boi" type="submit" name="iMac" value="Zapisz">
    </fieldset>
    <fieldset>
      <legend><h2>RAM</h2></legend>
      <?php foreach ($temp[3][3] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='3-1-iM' type="text" name="RAM[]" value="<?php echo $v['name']?>">
          <input type="hidden" name="RAM[]" value="<?php echo $k; ?>">
          <label for="3-1-1-iM"><h4>Cena:</h4></label>
          <input id="3-1-1-iM" type="text" name="RAM[]" value="<?php echo $v['price']?>"><br><br>
          <div><button type="submit" name="Delete" value="<?php echo $k; ?>">Usuń</button></div>
        </div>
      <?php }?>
      <button type="submit" name="AddNew" value="3-3">Dodaj Nowy</button>
      <input class="form_boi" type="submit" name="iMac" value="Zapisz">
    </fieldset>
    <fieldset>
      <legend><h2>Pamięć</h2></legend>
      <?php foreach ($temp[3][4] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='4-1-iM' type="text" name="Pamiec[]" value="<?php echo $v['name']?>">
          <input type="hidden" name="Pamiec[]" value="<?php echo $k; ?>">
          <label for="4-1-1-iM"><h4>Cena:</h4></label>
          <input id="4-1-1-iM" type="text" name="Pamiec[]" value="<?php echo $v['price']?>"><br><br>
          <div><button type="submit" name="Delete" value="<?php echo $k; ?>">Usuń</button></div>
        </div>
      <?php }?>
      <button type="submit" name="AddNew" value="3-4">Dodaj Nowy</button>
      <input class="form_boi" type="submit" name="iMac" value="Zapisz">
    </fieldset>
  </form>
  <form class="iMac" method="post">
    <h1>Mac Mini</h1>
    <fieldset>
      <legend><h2>Procesory</h2></legend>
      <?php foreach ($temp[4][1] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='1-1-Mm' name="Procesor[]" type='text' value="<?php echo $v['name']?>">
          <input type="hidden" name="Procesor[]" value="<?php echo $k; ?>">
          <label for="1-1-1-Mm"><h4>Cena:</h4></label>
          <input id="1-1-1-Mm" name="Procesor[]" type="text" value="<?php echo $v['price']?>">
          <label for="1-1-2-Mm"><h4>Wynik GeekBench:</h4></label>
          <input id="1-1-2-Mm" name="Procesor[]" type="text" value="<?php echo $v['score']?>"><br><br>
          <div><button type="submit" name="Delete" value="<?php echo $k; ?>">Usuń</button></div>
        </div>
      <?php }?>
      <button type="submit" name="AddNew" value="4-1">Dodaj Nowy</button>
      <input class="form_boi" type="submit" name="Mac_mini" value="Zapisz">
    </fieldset>
    <fieldset>
      <legend><h2>Karty Graficzne</h2></legend>
      <?php foreach ($temp[4][2] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='2-1-Mm' type="text" name="Grafika[]" value="<?php echo $v['name']?>">
          <input type="hidden" name="Grafika[]" value="<?php echo $k; ?>">
          <label for="2-1-1-Mm"><h4>Cena:</h4></label>
          <input id="2-1-1-Mm" type="text" name="Grafika[]" value="<?php echo $v['price']?>"><br><br>
          <div><button type="submit" name="Delete" value="<?php echo $k; ?>">Usuń</button></div>
        </div>
      <?php } ?>
      <button type="submit" name="AddNew" value="4-2">Dodaj Nowy</button>
      <input class="form_boi" type="submit" name="Mac_mini" value="Zapisz">
    </fieldset>
    <fieldset>
      <legend><h2>RAM</h2></legend>
      <?php foreach ($temp[4][3] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='3-1-Mm' type="text" name="RAM[]" value="<?php echo $v['name']?>">
          <input type="hidden" name="RAM[]" value="<?php echo $k; ?>">
          <label for="3-1-1-Mm"><h4>Cena:</h4></label>
          <input id="3-1-1-Mm" type="text" name="RAM[]" value="<?php echo $v['price']?>"><br><br>
          <div><button type="submit" name="Delete" value="<?php echo $k; ?>">Usuń</button></div>
        </div>
      <?php }?>
      <button type="submit" name="AddNew" value="4-3">Dodaj Nowy</button>
      <input class="form_boi" type="submit" name="Mac_mini" value="Zapisz">
    </fieldset>
    <fieldset>
      <legend><h2>Pamięć</h2></legend>
      <?php foreach ($temp[4][4] as $k => $v){?>
        <div style="float:left; margin-right:8%;">
          <input id='4-1-Mm' type="text" name="Pamiec[]" value="<?php echo $v['name']?>">
          <input type="hidden" name="Pamiec[]" value="<?php echo $k; ?>">
          <label for="4-1-1-Mm"><h4>Cena:</h4></label>
          <input id="4-1-1-Mm" type="text" name="Pamiec[]" value="<?php echo $v['price']?>"><br><br>
          <div><button type="submit" name="Delete" value="<?php echo $k; ?>">Usuń</button></div>
        </div>
      <?php }?>
      <button type="submit" name="AddNew" value="4-4">Dodaj Nowy</button>
      <input class="form_boi" type="submit" name="Mac_mini" value="Zapisz">
    </fieldset>
  </form>
</body>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    if(!window.sessionStorage) {  // if sessionStorage not supported
        var pass = prompt('Yeah Boi?'); // perform other action
        $.ajax({
          url:'admin.php',
          type:'post',
          data: {pass:pass},
          error:function(){
          window.location.href("onet.pl");
            window.sessionStorage.removeItem('pass');
          }
        });
      }
    var pass = window.sessionStorage.getItem('pass');
    if (!pass) {
        var pass = prompt('Podaj Hasło',);
        window.sessionStorage.setItem('pass',pass);
    }
    $.ajax({
      url:'admin.php',
      type:'post',
      data: {pass:pass},
      error:function(){
        window.location.href = "index.php";
        window.sessionStorage.removeItem('pass');
      }
    });
  })
</script>
