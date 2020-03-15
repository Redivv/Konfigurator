<!DOCTYPE html>
  <?php
  include ('php_files/db_conn.php');
  if(!isset($_GET['id'])){$_GET['id']=2;}
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
  }
  ?>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Konfigurator</title>
    <link rel="stylesheet" href="css/config.css">
    <link href="css/roboto.css" rel="stylesheet">
  </head>
  <body>
    <div class="note">
      <span>Poniższe ceny nie przedstawiają rzeczywistej oferty sklepu, a jedynie szacunkowe wartości pozwalające porównać produkty.</span>
    </div>
    <section class="tabs left">
      <a href="?id=2"><button id="btn_im" class="iroN_btn <?php if($_GET['id']>=2){echo "active_btn";} ?>" type="button" name="im"><?php echo $temp2[1][7]['name']; ?></button></a>
      <a href="?id=1"><button id="btn_i" class="iroN_btn <?php if($_GET['id']==1){echo "active_btn";} ?>" type="button" name="i"><?php echo $temp2[1][1]['name']; ?></button></a>
      <a href="?id=0"><button id="btn_it" class="iroN_btn <?php if($_GET['id']<1){echo "active_btn";} ?>" type="button" name="it"><?php echo $temp2[1][6]['name']; ?></button></a>
    </section>
    <section class="tabs right">
      <button id="btn_Mm" class="mac_btn active_btn" type="button" name="Mm"><?php echo $temp2[2][4]['name']; ?></button>
      <button id="btn_iM" class="mac_btn" type="button" name="iM"><?php echo $temp2[2][3]['name']; ?></button>
      <button id="btn_iMP" class="mac_btn" type="button" name="iMP"><?php echo $temp2[2][5]['name']; ?></button>
      <button id="btn_M" class="mac_btn" type="button" name="M"><?php echo $temp2[2][2]['name']; ?></button>
    </section>
    <div class="clearfix"></div>
    <section class="config">
    <?php if($_GET['id']==1){?>
      <!-- START iroN config -->
        <div class="container" id="iroN">
          <div class="title"><h2 class="title"><?php echo $temp2[1][1]['name']; ?></h2></div>
            <div class="container_top i" id="iroN_thumb">
                <div class="container_img img_i">
                  <img class="" id="iroN_cube" src="img/<?php echo $temp2[1][1]['image'];?>" alt="">
                </div>
              <h3 class="price" data-price="<?php echo $temp2[1][1]['org_price']; ?>" id="mac_priceiroN"><?php echo $temp2[1][1]['org_price']; ?> zł</h3>
            </div>
          <div class="container_form form_i i">
            <form id="iroN-form" class="iroN" method="post">
              <!-- PROCESORY -->
              <fieldset id="PROCESORY">
                <div><legend><h2>Procesor</h2></legend></div>
                <?php $i = 1; if(isset($temp[1][1])){ foreach ($temp[1][1] as $k => $v) {?>
                  <div>
                    <input type="radio" id="<?php echo '1-'.$i.'i';?>" name="Procesor" value="<?php echo $v['price']; ?>" <?php if($i == 1){echo 'checked';}?>>
                    <label for="<?php echo '1-'.$i.'i';?>" data-score="<?php echo $v['score'];?>"><?php echo $v['name'];?></label>
                  </div>
                <?php $i++;}?>
                <?php
                $m_p = array();
                $m_p[0] = 0;
                $im = array();
                $im[0] = 0;
                $im_p = array();
                $im_p[0] = 0;
                $m_m = array();
                $m_m[0] = 0;
                $placeh = array();
                if(count($temp[1][1]) < (count($temp[2][1]))){
                  $x =count($temp[2][1]) - count($temp[1][1]);
                  for ($i=1; $i<=$x ; $i++) {
                    $m_p[0] = $i;?>
                    <div>
                      <input type="checkbox" value="0">
                      <label class="placeholder">a</label>
                    </div>
                    <?php
                  }
                }
                if(count($temp[1][1]) < (count($temp[3][1]))){
                  $x =count($temp[3][1]) - count($temp[1][1]);
                  for ($i=1; $i<=$x ; $i++) {
                    $im[0] = $i;?>
                    <div>
                      <input type="checkbox" value="0">
                      <label class="placeholder">a</label>
                    </div>
                    <?php
                  }
                }
                if(count($temp[1][1]) < (count($temp[4][1]))){
                  $x =count($temp[4][1]) - count($temp[1][1]);
                  for ($i=1; $i<=$x ; $i++) {
                    $m_m[0] = $i;?>
                    <div>
                      <input type="checkbox" value="0">
                      <label class="placeholder">a</label>
                    </div>
                    <?php
                  }
                }
                if(count($temp[1][1]) < (count($temp[5][1]))){
                  $x =count($temp[5][1]) - count($temp[1][1]);
                  for ($i=1; $i<=$x ; $i++) {
                    $im_p[0] = $i;?>
                    <div>
                      <input type="checkbox" value="0">
                      <label class="placeholder">a</label>
                    </div>
                    <?php
                  }
                }
              }
                ?>
              </fieldset>
              <!-- KARTY GRAFICZNE -->
              <fieldset id="Grafika">
                <div><legend><h2>Karta Graficzna</h2></legend></div>
                <?php $i = 1; if(isset($temp[1][2])){foreach ($temp[1][2] as $k => $v) {?>
                  <div>
                    <input type="radio" id="<?php echo '2-'.$i.'i';?>" name="Grafika" value="<?php echo $v['price']; ?>" <?php if($i == 1){echo 'checked';}?>>
                    <label for="<?php echo '2-'.$i.'i';?>" data-score="<?php echo $v['score'];?>"><?php echo $v['name'];?></label>
                  </div>
                <?php $i++;}?>
                <?php
                $m_p[1] = 0;
                $im[1] = 0;
                $m_m[1] = 0;
                $im_p[1] = 0;
                if(count($temp[1][2]) < (count($temp[2][2]))){
                  $x =count($temp[2][2]) - count($temp[1][2]);
                  for ($i=1; $i<=$x ; $i++) {
                    $m_p[1] = $i;?>
                    <div>
                      <input type="checkbox" value="0">
                      <label class="placeholder">a</label>
                    </div>
                    <?php
                  }
                }
                if(count($temp[1][2]) < (count($temp[3][2]))){
                  $x =count($temp[3][2]) - count($temp[1][2]);
                  for ($i=1; $i<=$x ; $i++) {
                    $im[1] = $i;?>
                    <div>
                      <input type="checkbox" value="0">
                      <label class="placeholder">a</label>
                    </div>
                    <?php
                  }
                }
                if(count($temp[1][2]) < (count($temp[4][2]))){
                  $x =count($temp[4][2]) - count($temp[1][2]);
                  for ($i=1; $i<=$x ; $i++) {
                    $m_m[1] = $i;?>
                    <div>
                      <input type="checkbox" value="0">
                      <label class="placeholder">a</label>
                    </div>
                    <?php
                  }
                }
                if(count($temp[1][2]) < (count($temp[5][2]))){
                  $x =count($temp[5][2]) - count($temp[1][2]);
                  for ($i=1; $i<=$x ; $i++) {
                    $im_p[1] = $i;?>
                    <div>
                      <input type="checkbox" value="0">
                      <label class="placeholder">a</label>
                    </div>
                    <?php
                  }
                }?>
                <?php
              }
                ?>
              </fieldset>
              <!-- RAM -->
              <fieldset id="RAM">
                <div><legend><h2>Pamięć RAM</h2></legend></div>
                <?php $i = 1; if(isset($temp[1][3])){foreach ($temp[1][3] as $k => $v) {?>
                  <div>
                    <input type="radio" id="<?php echo '3-'.$i.'i';?>" name="RAM" value="<?php echo $v['price']; ?>" <?php if($i == 1){echo 'checked';}?>>
                    <label for="<?php echo '3-'.$i.'i';?>" data-score="<?php echo $v['score'];?>"><?php echo $v['name'];?></label>
                  </div>
                <?php $i++;}?>
                <?php
                $m_p[2] = 0;
                $im[2] = 0;
                $m_m[2] = 0;
                $im_p[2] = 0;
                if(count($temp[1][3]) < (count($temp[2][3]))){
                  $x =count($temp[2][3]) - count($temp[1][3]);
                  for ($i=1; $i<=$x ; $i++) {
                    $m_p[2] = $i;?>
                    <div>
                      <input type="checkbox" value="0">
                      <label class="placeholder">a</label>
                    </div>
                    <?php
                  }
                }
                if(count($temp[1][3]) < (count($temp[3][3]))){
                  $x = count($temp[3][3]) - count($temp[1][3]);
                  for ($i=1; $i<=$x ; $i++) {
                    $im[2] = $i;?>
                    <div>
                      <input type="checkbox" value="0">
                      <label class="placeholder">a</label>
                    </div>
                    <?php
                  }
                }
                if(count($temp[1][3]) < (count($temp[4][3]))){
                  $x = count($temp[4][3]) - count($temp[1][3]);
                  for ($i=1; $i<=$x ; $i++) {
                    $m_m[2] = $i;?>
                    <div>
                      <input type="checkbox" value="0">
                      <label class="placeholder">a</label>
                    </div>
                    <?php
                  }
                }
                if(count($temp[1][3]) < (count($temp[5][3]))){
                  $x =count($temp[5][3]) - count($temp[1][3]);
                  for ($i=1; $i<=$x ; $i++) {
                    $im_p[2] = $i;?>
                    <div>
                      <input type="checkbox" value="0">
                      <label class="placeholder">a</label>
                    </div>
                    <?php
                  }
                }
              }
                ?>
              </fieldset>
                <!-- Pamięć masowa -->
                <fieldset id="Pamiec">
                  <div><legend><h2>Dysk M.2</h2></legend></div>
                  <?php $i = 1;if(isset($temp[1][4])){ foreach ($temp[1][4] as $k => $v) {?>
                    <?php if((!isset($jest)) && (strpos($v['name'],'M.2')==0)){?>
                      <div>
                        <legend><label class="Pamiec_M2" for="control"><h2>Dysk SATA</h2></label></legend>
                        <input id="control" type="checkbox" style="font-size:0.8vw;" checked name="Pamiec_M2">
                      </div>
                    <?php $jest=1;  } ?>
                    <div>
                      <input type="radio" id="<?php echo '4-'.$i.'i';?>" name="<?php if(strpos($v['name'],'M.2')==0){echo "Pamiec2";}else{echo "Pamiec";}?>" value="<?php echo $v['price']; ?>" <?php if($i == 1){echo 'checked';}?>>
                      <label for="<?php echo '4-'.$i.'i';?>" data-score="<?php echo $v['score'];?>"><?php echo $v['name'];?></label>
                    </div>
                  <?php $i++;}}?>
                  <div><legend><h2>Dysk M.2 - Dodatkowy</h2></legend></div>
                  <?php $i = 1;if(isset($temp[1][4])){ foreach ($temp[1][4] as $k => $v) { if((strpos($v['name'],'M.2')==0)){break;}?>
                    <div>
                      <input type="radio" id="<?php echo '4-'.$i.'id';?>" name="Pamiec3" value="<?php echo $v['price']; ?>">
                      <label for="<?php echo '4-'.$i.'id';?>" data-score="<?php echo $v['score'];?>"><?php echo $v['name'];?></label>
                    </div>
                  <?php $i++;}?>
                  <div>
                    <input class="mobile_check" type="checkbox" id="5-2i" name="Optional" value="<?php echo $temp[1][5][81]['price']; ?>">
                    <label class="mobile_label" for="5-2i"><?php echo $temp[1][5][81]['name']; ?></label>
                  </div>
                  <?php
                  $m_p[3] = 0;
                  $im[3] = 0;
                  $m_m[3] = 0;
                  $im_p[3] = 0;
                  if(count($temp[1][4]) < (count($temp[2][4]))){
                    $x = count($temp[2][4]) - count($temp[1][4]);
                    for ($i=1; $i<=$x ; $i++) {
                      $m_p[3] = $i;?>
                      <div>
                        <input type="checkbox" value="0">
                      </div>
                      <label class="placeholder">a</label>
                      <?php
                    }
                  }
                  if(count($temp[1][4]) < (count($temp[3][4]))){
                    $x = count($temp[3][4]) - count($temp[1][4]);
                    for ($i=1; $i<=$x ; $i++) {
                      $im[3] = $i;?>
                      <div>
                        <input type="checkbox" value="0">
                        <label class="placeholder">a</label>
                      </div>
                      <?php
                    }
                  }
                  if(count($temp[1][4]) < (count($temp[4][4]))){
                    $x = count($temp[4][4]) - count($temp[1][4]);
                    for ($i=1; $i<=$x ; $i++) {
                      $m_m[3] = $i;?>
                      <div>
                        <input type="checkbox" value="0">
                        <label class="placeholder">a</label>
                      </div>
                      <?php
                    }
                  }
                  if(count($temp[1][4]) < (count($temp[5][4]))){
                    $x =count($temp[5][4]) - count($temp[1][4]);
                    for ($i=1; $i<=$x ; $i++) {
                      $im_p[3] = $i;?>
                      <div>
                        <input type="checkbox" value="0">
                        <label class="placeholder">a</label>
                      </div>
                      <?php
                    }
                  }?>
                  <div>
                    <input type="checkbox" value="0">
                    <label class="placeholder">a</label>
                  </div>
                  <?php
                }
                  ?>
                </fieldset>
                <!-- Dodatki -->
                <fieldset id="Optional">
                  <div><legend><h2>Dodatki</h2></legend></div>
                  <div>
                    <input type="checkbox" id="5-1i" name="Optional" value="<?php echo $temp[1][5][61]['price']; ?>">
                    <label for="5-1i"><?php echo $temp[1][5][61]['name']; ?></label>
                  </div>
                  <!--<div>
                    <input type="checkbox" id="5-3i" name="Grafika" value="0">
                    <label for="5-3i">Dodatkowy Dysk SSD 2.5'</label>
                  </div>
                  <div>
                    <input type="checkbox" id="5-4i" name="Grafika" value="0">
                    <label for="5-4i">Dodatkowy Dysk SSD M.2'</label>
                  </div>-->
                  <div>
                    <input type="checkbox" id="5-5i" name="Optional" value="<?php echo $temp[1][5][62]['price']; ?>">
                    <label for="5-5i"><?php echo $temp[1][5][62]['name']; ?></label>
                  </div>
                  <div>
                    <input type="checkbox" id="5-6i" name="Optional" value="<?php echo $temp[1][5][123]['price']; ?>">
                    <label for="5-6i"><?php echo $temp[1][5][123]['name']; ?></label>
                  </div>
                  <div>
                    <input type="checkbox" id="5-7i" name="Optional" value="<?php echo $temp[1][5][124]['price']; ?>">
                    <label for="5-7i"><?php echo $temp[1][5][124]['name']; ?></label>
                  </div>
                  <div>
                    <input type="checkbox" id="5-8i" name="Optional" value="<?php echo $temp[1][5][127]['price']; ?>">
                    <label for="5-8i"><?php echo $temp[1][5][127]['name']; ?></label>
                  </div>
                  <!--<div>
                    <input type="checkbox" id="5-6i" name="Grafika" value="0">
                    <label for="5-6i">Wi-Fi + Bluetooth</label>
                  </div>-->
              </fieldset>
            <button type="reset" form="iroN-form">Zresetuj Konfigurację</button>
            <button type="submit" form="iroN-form">Wyeksportuj</button>
            </form>
            <form class="iroN_mobile" action="index.html" method="post">
              <!-- PROCESORY -->
                <fieldset id="PROCESORY_mobile">
                  <div><legend><h2>Procesor</h2></legend></div>
                  <select class="select_mobile" name="Procesor">
                    <?php if(isset($temp[1][1])){foreach ($temp[1][1] as $k => $v) {?>
                      <option data-score="<?php echo $v['score'];?>" value="<?php echo $v['price'];?>"><?php echo $v['name'];?></option>
                    <?php }}?>
                  </select>
                </fieldset>
                <!-- KARTY GRAFICZNE -->
                <fieldset id="Grafika">
                  <div><legend><h2>Karta Graficzna</h2></legend></div>
                  <select class="select_mobile" name="Grafika">
                    <?php if(isset($temp[1][2])){foreach ($temp[1][2] as $k => $v) {?>
                      <option data-score="<?php echo $v['score'];?>" value="<?php echo $v['price'];?>"><?php echo $v['name'];?></option>
                    <?php }}?>
                  </select>
                </fieldset>
                <!-- RAM -->
                <fieldset id="RAM">
                  <div><legend><h2>Pamięć RAM</h2></legend></div>
                  <select class="select_mobile" name="RAM">
                    <?php if(isset($temp[1][3])){foreach ($temp[1][3] as $k => $v) {?>
                      <option data-score="<?php echo $v['score'];?>" value="<?php echo $v['price'];?>"><?php echo $v['name'];?></option>
                    <?php }}?>
                  </select>
                </fieldset>
                <!-- Pamięć masowa -->
                <fieldset id="Pamiec">
                  <div><legend><h2>Dysk M.2</h2></legend></div>
                  <select class="select_mobile" name="Pamiec">
                    <?php $countt=0; if(isset($temp[1][4])){foreach ($temp[1][4] as $k => $v) {?>
                      <?php if(strpos($v['name'],'M.2')!=0){?>
                        <option data-score="<?php echo $v['score'];?>" value="<?php echo $v['price'];?>"><?php echo $v['name'];?></option>
                      <?php }else{
                        if(!isset($jest2)){ ?>
                        </select>
                      <?php $jest2=1; } if(!isset($jestt)){?>
                        <div style="padding:2%; margin:8% 0%;">
                          <label class="Pamiec_M2 PM" for="control">Dysk SATA</label>
                          <input id="control_mobile" type="checkbox" style="margin:1.8% 0 0 0; display:none; font-size:0.8vw;" name="Pamiec_M2">
                        </div>
                      <?php $jestt=1;  } ?>
                      <?php if(!isset($jest3)){?>
                      <select class="select_mobile" name="Pamiec2">
                      <?php $jest3=1;?><option value="0"> -- Wybierz Dysk SATA -- </option> <?php } ?>
                        <option data-score="<?php echo $v['score'];?>" value="<?php echo $v['price'];?>"><?php echo $v['name'];?></option>
                      <?php if($countt==count($temp[1][4])){ ?>
                      </select>
                    <?php }} ?>
                  <?php } $countt++; } ?>
                    <input class="mobile_check" type="checkbox" id="5-2i" name="Optional" value="<?php echo $temp[1][5][81]['price']; ?>">
                    <label class="mobile_label" for="5-2i"><?php echo $temp[1][5][81]['name']; ?></label>
                </fieldset>
                <!-- Dodatki -->
                <fieldset style="display:none;" class="Optional_iron_m" id="Optional">
                  <div><legend><h2>Dodatki</h2></legend></div>
                    <input class="mobile_check" type="checkbox" id="5-1i" name="Optional" value="<?php echo $temp[1][5][61]['price']; ?>">
                    <label class="mobile_label" for="5-1i"><?php echo $temp[1][5][61]['name']; ?></label>
                  <!--<div>
                    <input type="checkbox" id="5-3i" name="Grafika" value="0">
                    <label for="5-3i">Dodatkowy Dysk SSD 2.5'</label>
                  </div>
                  <div>
                    <input type="checkbox" id="5-4i" name="Grafika" value="0">
                    <label for="5-4i">Dodatkowy Dysk SSD M.2'</label>
                  </div>-->
                    <input class="mobile_check" type="checkbox" id="5-5i" name="Optional" value="<?php echo $temp[1][5][62]['price']; ?>">
                    <label class="mobile_label" for="5-5i"><?php echo $temp[1][5][62]['name']; ?></label>
                    <input class="mobile_check" type="checkbox" id="5-6i" name="Optional" value="<?php echo $temp[1][5][123]['price']; ?>">
                    <label class="mobile_label" for="5-6i"><?php echo $temp[1][5][123]['name']; ?></label>
                    <input class="mobile_check" type="checkbox" id="5-7i" name="Optional" value="<?php echo $temp[1][5][124]['price']; ?>">
                    <label class="mobile_label" for="5-7i"><?php echo $temp[1][5][124]['name']; ?></label>
                    <input class="mobile_check" type="checkbox" id="5-8i" name="Optional" value="<?php echo $temp[1][5][127]['price']; ?>">
                    <label class="mobile_label" for="5-8i"><?php echo $temp[1][5][127]['name']; ?></label>
                  <!--<div>
                    <input type="checkbox" id="5-6i" name="Grafika" value="0">
                    <label for="5-6i">Wi-Fi + Bluetooth</label>
                  </div>-->
              </fieldset>
            </form>
          </div>
        </div>
        <!-- END iroN config -->
      <?php }elseif($_GET['id'] <= 0 ){?>
        <!-- START iroN Tower config -->
        <div class="container" id="iroNt">
          <div class="title"><h2 class="title"><?php echo $temp2[1][6]['name']; ?></h2></div>
            <div class="container_top it" id="iroNt_thumb">
                <div class="container_img img_i">
                  <img class="" id="iroN_tower" src="img/<?php echo $temp2[1][6]['image'];?>" alt="">
                </div>
              <h3 class="price" data-price="<?php echo $temp2[1][6]['org_price']; ?>" id="mac_priceiroN"><?php echo $temp2[1][6]['org_price']; ?> zł</h3>
            </div>
          <div class="container_form form_i it">
            <form id="iroNt-form" class="iroN" method="post">
              <!-- PROCESORY -->
              <fieldset id="PROCESORY">
                <div><legend><h2>Procesor</h2></legend></div>
                <?php $i = 1; if(isset($temp[6][1])){ foreach ($temp[6][1] as $k => $v) {?>
                  <div>
                    <input type="radio" id="<?php echo '1-'.$i.'it';?>" name="Procesor" value="<?php echo $v['price']; ?>" <?php if($i == 1){echo 'checked';}?>>
                    <label for="<?php echo '1-'.$i.'it';?>" data-score="<?php echo $v['score'];?>"><?php echo $v['name'];?></label>
                  </div>
                <?php $i++;}?>
                <?php
                $m_p_t = array();
                $m_p_t[0] = 0;
                $im_t = array();
                $im_t[0] = 0;
                $im_p_t = array();
                $im_p_t[0] = 0;
                $m_m_t = array();
                $m_m_t[0] = 0;
                $placeh_t = array();
                if(count($temp[6][1]) < (count($temp[2][1]))){
                  $x =count($temp[2][1]) - count($temp[6][1]);
                  for ($i=1; $i<=$x ; $i++) {
                    $m_p_t[0] = $i;?>
                    <div>
                      <input type="checkbox" value="0">
                      <label class="placeholder">a</label>
                    </div>
                    <?php
                  }
                }
                if(count($temp[6][1]) < (count($temp[3][1]))){
                  $x =count($temp[3][1]) - count($temp[6][1]);
                  for ($i=1; $i<=$x ; $i++) {
                    $im_t[0] = $i;?>
                    <div>
                      <input type="checkbox" value="0">
                      <label class="placeholder">a</label>
                    </div>
                    <?php
                  }
                }
                if(count($temp[6][1]) < (count($temp[4][1]))){
                  $x =count($temp[4][1]) - count($temp[6][1]);
                  for ($i=1; $i<=$x ; $i++) {
                    $m_m_t[0] = $i;?>
                    <div>
                      <input type="checkbox" value="0">
                      <label class="placeholder">a</label>
                    </div>
                    <?php
                  }
                }
                if(count($temp[6][1]) < (count($temp[5][1]))){
                  $x =count($temp[5][1]) - count($temp[6][1]);
                  for ($i=1; $i<=$x ; $i++) {
                    $im_p_t[0] = $i;?>
                    <div>
                      <input type="checkbox" value="0">
                      <label class="placeholder">a</label>
                    </div>
                    <?php
                  }
                }
              }
                ?>
              </fieldset>
              <!-- KARTY GRAFICZNE -->
              <fieldset id="Grafika">
                <div><legend><h2>Karta Graficzna</h2></legend></div>
                <?php $i = 1; if(isset($temp[6][2])){foreach ($temp[6][2] as $k => $v) {?>
                  <div>
                    <input type="radio" id="<?php echo '2-'.$i.'it';?>" name="Grafika" value="<?php echo $v['price']; ?>" <?php if($i == 1){echo 'checked';}?>>
                    <label for="<?php echo '2-'.$i.'it';?>" data-score="<?php echo $v['score'];?>"><?php echo $v['name'];?></label>
                  </div>
                <?php $i++;}?>
                <?php
                $m_p_t[1] = 0;
                $im_t[1] = 0;
                $m_m_t[1] = 0;
                $im_p_t[1] = 0;
                if(count($temp[6][2]) < (count($temp[2][2]))){
                  $x =count($temp[2][2]) - count($temp[6][2]);
                  for ($i=1; $i<=$x ; $i++) {
                    $m_p_t[1] = $i;?>
                    <div>
                      <input type="checkbox" value="0">
                      <label class="placeholder">a</label>
                    </div>
                    <?php
                  }
                }
                if(count($temp[6][2]) < (count($temp[3][2]))){
                  $x =count($temp[3][2]) - count($temp[6][2]);
                  for ($i=1; $i<=$x ; $i++) {
                    $im_t[1] = $i;?>
                    <div>
                      <input type="checkbox" value="0">
                      <label class="placeholder">a</label>
                    </div>
                    <?php
                  }
                }
                if(count($temp[6][2]) < (count($temp[4][2]))){
                  $x =count($temp[4][2]) - count($temp[6][2]);
                  for ($i=1; $i<=$x ; $i++) {
                    $m_m_t[1] = $i;?>
                    <div>
                      <input type="checkbox" value="0">
                      <label class="placeholder">a</label>
                    </div>
                    <?php
                  }
                }
                if(count($temp[6][2]) < (count($temp[5][2]))){
                  $x =count($temp[5][2]) - count($temp[6][2]);
                  for ($i=1; $i<=$x ; $i++) {
                    $im_p_t[1] = $i;?>
                    <div>
                      <input type="checkbox" value="0">
                      <label class="placeholder">a</label>
                    </div>
                    <?php
                  }
                }?>
                <?php
              }
                ?>
              </fieldset>
              <!-- RAM -->
              <fieldset id="RAM">
                <div><legend><h2>Pamięć RAM</h2></legend></div>
                <?php $i = 1; if(isset($temp[6][3])){foreach ($temp[6][3] as $k => $v) {?>
                  <div>
                    <input type="radio" id="<?php echo '3-'.$i.'it';?>" name="RAM" value="<?php echo $v['price']; ?>" <?php if($i == 1){echo 'checked';}?>>
                    <label for="<?php echo '3-'.$i.'it';?>" data-score="<?php echo $v['score'];?>"><?php echo $v['name'];?></label>
                  </div>
                <?php $i++;}?>
                <?php
                $m_p_t[2] = 0;
                $im_t[2] = 0;
                $m_m_t[2] = 0;
                $im_p_t[2] = 0;
                if(count($temp[6][3]) < (count($temp[2][3]))){
                  $x =count($temp[2][3]) - count($temp[6][3]);
                  for ($i=1; $i<=$x ; $i++) {
                    $m_p_t[2] = $i;?>
                    <div>
                      <input type="checkbox" value="0">
                      <label class="placeholder">a</label>
                    </div>
                    <?php
                  }
                }
                if(count($temp[6][3]) < (count($temp[3][3]))){
                  $x = count($temp[3][3]) - count($temp[6][3]);
                  for ($i=1; $i<=$x ; $i++) {
                    $im_t[2] = $i;?>
                    <div>
                      <input type="checkbox" value="0">
                      <label class="placeholder">a</label>
                    </div>
                    <?php
                  }
                }
                if(count($temp[6][3]) < (count($temp[4][3]))){
                  $x = count($temp[4][3]) - count($temp[6][3]);
                  for ($i=1; $i<=$x ; $i++) {
                    $m_m_t[2] = $i;?>
                    <div>
                      <input type="checkbox" value="0">
                      <label class="placeholder">a</label>
                    </div>
                    <?php
                  }
                }
                if(count($temp[6][3]) < (count($temp[5][3]))){
                  $x =count($temp[5][3]) - count($temp[6][3]);
                  for ($i=1; $i<=$x ; $i++) {
                    $im_p_t[2] = $i;?>
                    <div>
                      <input type="checkbox" value="0">
                      <label class="placeholder">a</label>
                    </div>
                    <?php
                  }
                }
              }
                ?>
              </fieldset>
                <!-- Pamięć masowa -->
                <fieldset id="Pamiec">
                  <div><legend><h2>Dysk M.2</h2></legend></div>
                  <?php $i = 1;if(isset($temp[6][4])){ foreach ($temp[6][4] as $k => $v) {?>
                    <?php if((!isset($jest)) && (strpos($v['name'],'M.2') == 0)){?>
                      <div>
                        <legend><label class="Pamiec_M2" for="control"><h2>Dysk SATA</h2></label></legend>
                        <input id="control" class="hide" type="checkbox" style="font-size:0.8vw;" checked name="Pamiec_M2">
                      </div>
                    <?php $jest=1;  } ?>
                    <div>
                      <input type="radio" id="<?php echo '4-'.$i.'it';?>" name="<?php if(strpos($v['name'],'M.2')==0){echo "Pamiec2";}else{echo "Pamiec";}?>" value="<?php echo $v['price']; ?>" <?php if($i == 1){echo 'checked';}?>>
                      <label for="<?php echo '4-'.$i.'it';?>" data-score="<?php echo $v['score'];?>"><?php echo $v['name'];?></label>
                    </div>
                  <?php $i++;}}?>
                  <div><legend><h2>Dysk M.2 - Dodatkowy</h2></legend></div>
                  <?php $i = 1;if(isset($temp[6][4])){ foreach ($temp[6][4] as $k => $v) { if((strpos($v['name'],'M.2') == 0)){break;}?>
                    <div>
                      <input type="radio" id="<?php echo '4-'.$i.'itd';?>" name="Pamiec3" value="<?php echo $v['price']; ?>" <?php if($i == 1){echo 'checked';}?>>
                      <label for="<?php echo '4-'.$i.'itd';?>" data-score="<?php echo $v['score'];?>"><?php echo $v['name'];?></label>
                    </div>
                  <?php $i++;}?>
                  <div>
                    <input class="mobile_check" type="checkbox" id="5-2i" name="Optional" value="<?php echo $temp[6][5][82]['price']; ?>">
                    <label class="mobile_label" for="5-2i"><?php echo $temp[6][5][82]['name']; ?></label>
                  </div>
                  <div>
                  <?php
                  $m_p_t[3] = 0;
                  $im_t[3] = 0;
                  $m_m_t[3] = 0;
                  $im_p_t[3] = 0;
                  if(count($temp[6][4]) < (count($temp[2][4]))){
                    $x = count($temp[2][4]) - count($temp[6][4]);
                    for ($i=1; $i<=$x ; $i++) {
                      $m_p_t[3] = $i;?>
                      <div>
                        <input type="checkbox" value="0">
                      </div>
                      <label class="placeholder">a</label>
                      <?php
                    }
                  }
                  if(count($temp[6][4]) < (count($temp[3][4]))){
                    $x = count($temp[3][4]) - count($temp[6][4]);
                    for ($i=1; $i<=$x ; $i++) {
                      $im_t[3] = $i;?>
                      <div>
                        <input type="checkbox" value="0">
                        <label class="placeholder">a</label>
                      </div>
                      <?php
                    }
                  }
                  if(count($temp[6][4]) < (count($temp[4][4]))){
                    $x = count($temp[4][4]) - count($temp[6][4]);
                    for ($i=1; $i<=$x ; $i++) {
                      $m_m_t[3] = $i;?>
                      <div>
                        <input type="checkbox" value="0">
                        <label class="placeholder">a</label>
                      </div>
                      <?php
                    }
                  }
                  if(count($temp[6][4]) < (count($temp[5][4]))){
                    $x =count($temp[5][4]) - count($temp[6][4]);
                    for ($i=1; $i<=$x ; $i++) {
                      $im_p_t[3] = $i;?>
                      <div>
                        <input type="checkbox" value="0">
                        <label class="placeholder">a</label>
                      </div>
                      <?php
                    }
                  }?>
                  <div>
                    <input type="checkbox" value="0">
                    <label class="placeholder">a</label>
                  </div>
                  <?php
                }
                  ?>
                </fieldset>
                <!-- Dodatki -->
                <fieldset id="Optional">
                  <div><legend><h2>Dodatki</h2></legend></div>
                  <div>
                    <input type="checkbox" id="5-1it" name="Optional" value="<?php echo $temp[6][5][79]['price']; ?>">
                    <label for="5-1it"><?php echo $temp[6][5][79]['name']; ?></label>
                  </div>
                  <!--<div>
                    <input type="checkbox" id="5-3i" name="Grafika" value="0">
                    <label for="5-3i">Dodatkowy Dysk SSD 2.5'</label>
                  </div>
                  <div>
                    <input type="checkbox" id="5-4i" name="Grafika" value="0">
                    <label for="5-4i">Dodatkowy Dysk SSD M.2'</label>
                  </div>-->
                  <div>
                    <input type="checkbox" id="5-5it" name="Optional" value="<?php echo $temp[6][5][80]['price']; ?>">
                    <label for="5-5it"><?php echo $temp[6][5][80]['name']; ?></label>
                  </div>
                  <!--<div>
                    <input type="checkbox" id="5-6i" name="Grafika" value="0">
                    <label for="5-6i">Wi-Fi + Bluetooth</label>
                  </div>-->
                  <div>
                    <input type="checkbox" id="5-6it" name="Optional" value="<?php echo $temp[6][5][125]['price']; ?>">
                    <label for="5-6it"><?php echo $temp[6][5][125]['name']; ?></label>
                  </div>
                  <div>
                    <input type="checkbox" id="5-7it" name="Optional" value="<?php echo $temp[6][5][126]['price']; ?>">
                    <label for="5-7it"><?php echo $temp[6][5][126]['name']; ?></label>
                  </div>
                  <div>
                    <input type="checkbox" id="5-8it" name="Optional" value="<?php echo $temp[6][5][128]['price']; ?>">
                    <label for="5-8it"><?php echo $temp[6][5][128]['name']; ?></label>
                  </div>
              </fieldset>
            <button form="iroNt-form" type="reset">Zresetuj Konfigurację</button>
            <button type="submit" form="iroNt-form">Wyeksportuj</button>
            </form>
            <form class="iroN_mobile" action="index.html" method="post">
              <!-- PROCESORY -->
                <fieldset id="PROCESORY_mobile">
                  <div><legend><h2>Procesor</h2></legend></div>
                  <select class="select_mobile" name="Procesor">
                    <?php if(isset($temp[6][1])){foreach ($temp[6][1] as $k => $v) {?>
                      <option data-score="<?php echo $v['score'];?>" value="<?php echo $v['price'];?>"><?php echo $v['name'];?></option>
                    <?php }}?>
                  </select>
                </fieldset>
                <!-- KARTY GRAFICZNE -->
                <fieldset id="Grafika">
                  <div><legend><h2>Karta Graficzna</h2></legend></div>
                  <select class="select_mobile" name="Grafika">
                    <?php if(isset($temp[6][2])){foreach ($temp[6][2] as $k => $v) {?>
                      <option data-score="<?php echo $v['score'];?>" value="<?php echo $v['price'];?>"><?php echo $v['name'];?></option>
                    <?php }}?>
                  </select>
                </fieldset>
                <!-- RAM -->
                <fieldset id="RAM">
                  <div><legend><h2>Pamięć RAM</h2></legend></div>
                  <select class="select_mobile" name="RAM">
                    <?php if(isset($temp[6][3])){foreach ($temp[6][3] as $k => $v) {?>
                      <option data-score="<?php echo $v['score'];?>" value="<?php echo $v['price'];?>"><?php echo $v['name'];?></option>
                    <?php }}?>
                  </select>
                </fieldset>
                <!-- Pamięć masowa -->
                <fieldset id="Pamiec">
                  <div><legend><h2>Dysk M.2</h2></legend></div>
                  <select class="select_mobile" name="Pamiec">
                    <?php $counttt=0; if(isset($temp[6][4])){foreach ($temp[6][4] as $k => $v) {?>
                      <?php if(strpos($v['name'],'M.2')!=0){?>
                        <option data-score="<?php echo $v['score'];?>" value="<?php echo $v['price'];?>"><?php echo $v['name'];?></option>
                      <?php }else{
                        if(!isset($jestt2)){ ?>
                        </select>
                      <?php $jestt2=1; } if(!isset($jesttt)){?>
                        <div style="padding:2%; margin:8% 0%;">
                          <label class="Pamiec_M2 PM" for="control">Dysk SATA</label>
                          <input id="control_mobile" type="checkbox" style="margin:1.8% 0 0 0; display:none; font-size:0.8vw;" name="Pamiec_M2">
                        </div>
                      <?php $jesttt=1;  } ?>
                      <?php if(!isset($jestt3)){?>
                      <select class="select_mobile" name="Pamiec2">
                      <?php $jestt3=1;?> <option value="0"> -- Wybierz Dysk SATA -- </option> <?php } ?>
                        <option data-score="<?php echo $v['score'];?>" value="<?php echo $v['price'];?>"><?php echo $v['name'];?></option>
                      <?php if($counttt==count($temp[6][4])){ ?>
                      </select>
                    <?php }} ?>
                  <?php }$counttt++;}?>
                  <input class="mobile_check" type="checkbox" id="5-2it" name="Optional" value="<?php echo $temp[6][5][82]['price']; ?>">
                  <label class="mobile_label" for="5-2it"><?php echo $temp[6][5][82]['name']; ?></label>
                </fieldset>
                <!-- Dodatki -->
                <fieldset class="Optional_iron_m" style="display:none;" id="Optional">
                  <div><legend><h2>Dodatki</h2></legend></div>
                    <input class="mobile_check" type="checkbox" id="5-1it" name="Optional" value="<?php echo $temp[6][5][79]['price']; ?>">
                    <label class="mobile_label" for="5-1it"><?php echo $temp[6][5][79]['name']; ?></label>
                  <!--<div>
                    <input type="checkbox" id="5-3i" name="Grafika" value="0">
                    <label for="5-3i">Dodatkowy Dysk SSD 2.5'</label>
                  </div>
                  <div>
                    <input type="checkbox" id="5-4i" name="Grafika" value="0">
                    <label for="5-4i">Dodatkowy Dysk SSD M.2'</label>
                  </div>-->
                    <input class="mobile_check" type="checkbox" id="5-5it" name="Optional" value="<?php echo $temp[6][5][80]['price']; ?>">
                    <label class="mobile_label" for="5-5it"><?php echo $temp[6][5][80]['name']; ?> </label>
                    <input class="mobile_check" type="checkbox" id="5-6it" name="Optional" value="<?php echo $temp[6][5][125]['price']; ?>">
                    <label class="mobile_label" for="5-6it"><?php echo $temp[6][5][125]['name']; ?></label>
                    <input class="mobile_check" type="checkbox" id="5-7it" name="Optional" value="<?php echo $temp[6][5][126]['price']; ?>">
                    <label class="mobile_label" for="5-7it"><?php echo $temp[6][5][126]['name']; ?></label>
                    <input class="mobile_check" type="checkbox" id="5-8it" name="Optional" value="<?php echo $temp[6][5][128]['price']; ?>">
                    <label class="mobile_label" for="5-8it"><?php echo $temp[6][5][128]['name']; ?></label>
                  <!--<div>
                    <input type="checkbox" id="5-6i" name="Grafika" value="0">
                    <label for="5-6i">Wi-Fi + Bluetooth</label>
                  </div>-->
              </fieldset>
            </form>
          </div>
        </div>
        <!-- END iroN Tower config -->
      <?php }else{?>
      <!-- START iroN Mini config -->
      <div class="container" id="iroNm">
          <div class="title"><h2 class="title"><?php echo $temp2[1][7]['name']; ?></h2></div>
            <div class="container_top im" id="iroNm_thumb">
                <div class="container_img img_i">
                  <img class="" id="iroN_mini" src="img/<?php echo $temp2[1][7]['image'];?>" alt="">
                </div>
              <h3 class="price" data-price="<?php echo $temp2[1][7]['org_price']; ?>" id="mac_priceiroN"><?php echo $temp2[1][7]['org_price']; ?> zł</h3>
            </div>
          <div class="container_form form_i im">
            <form id="iroNm-form" class="iroN" method="post">
              <!-- PROCESORY -->
              <fieldset id="PROCESORY">
                <div><legend><h2>Procesor</h2></legend></div>
                <?php $i = 1; if(isset($temp[7][1])){ foreach ($temp[7][1] as $k => $v) {?>
                  <div>
                    <input type="radio" id="<?php echo '1-'.$i.'im';?>" name="Procesor" value="<?php echo $v['price']; ?>" <?php if($i == 1){echo 'checked';}?>>
                    <label for="<?php echo '1-'.$i.'im';?>" data-score="<?php echo $v['score'];?>"><?php echo $v['name'];?></label>
                  </div>
                <?php $i++;}?>
                <?php
                $m_p_m = array();
                $m_p_m[0] = 0;
                $im_m = array();
                $im_m[0] = 0;
                $im_p_m = array();
                $im_p_m[0] = 0;
                $m_m_m = array();
                $m_m_m[0] = 0;
                $placeh_m = array();
                if(count($temp[7][1]) < (count($temp[2][1]))){
                  $x =count($temp[2][1]) - count($temp[7][1]);
                  for ($i=1; $i<=$x ; $i++) {
                    $m_p_m[0] = $i;?>
                    <div>
                      <input type="checkbox" value="0">
                      <label class="placeholder">a</label>
                    </div>
                    <?php
                  }
                }
                if(count($temp[7][1]) < (count($temp[3][1]))){
                  $x =count($temp[3][1]) - count($temp[7][1]);
                  for ($i=1; $i<=$x ; $i++) {
                    $im_m[0] = $i;?>
                    <div>
                      <input type="checkbox" value="0">
                      <label class="placeholder">a</label>
                    </div>
                    <?php
                  }
                }
                if(count($temp[7][1]) < (count($temp[4][1]))){
                  $x =count($temp[4][1]) - count($temp[7][1]);
                  for ($i=1; $i<=$x ; $i++) {
                    $m_m_m[0] = $i;?>
                    <div>
                      <input type="checkbox" value="0">
                      <label class="placeholder">a</label>
                    </div>
                    <?php
                  }
                }
                if(count($temp[7][1]) < (count($temp[5][1]))){
                  $x =count($temp[5][1]) - count($temp[7][1]);
                  for ($i=1; $i<=$x ; $i++) {
                    $im_p_m[0] = $i;?>
                    <div>
                      <input type="checkbox" value="0">
                      <label class="placeholder">a</label>
                    </div>
                    <?php
                  }
                }
              }
                ?>
              </fieldset>
              <!-- KARTY GRAFICZNE -->
              <fieldset id="Grafika">
                <div><legend><h2>Karta Graficzna</h2></legend></div>
                <?php $i = 1; if(isset($temp[7][2])){foreach ($temp[7][2] as $k => $v) {?>
                  <div>
                    <input type="radio" id="<?php echo '2-'.$i.'im';?>" name="Grafika" value="<?php echo $v['price']; ?>" <?php if($i == 1){echo 'checked';}?>>
                    <label for="<?php echo '2-'.$i.'im';?>" data-score="<?php echo $v['score'];?>"><?php echo $v['name'];?></label>
                  </div>
                <?php $i++;}?>
                <?php
                $m_p_m[1] = 0;
                $im_m[1] = 0;
                $m_m_m[1] = 0;
                $im_p_m[1] = 0;
                if(count($temp[7][2]) < (count($temp[2][2]))){
                  $x =count($temp[2][2]) - count($temp[7][2]);
                  for ($i=1; $i<=$x ; $i++) {
                    $m_p_m[1] = $i;?>
                    <div>
                      <input type="checkbox" value="0">
                      <label class="placeholder">a</label>
                    </div>
                    <?php
                  }
                }
                if(count($temp[7][2]) < (count($temp[3][2]))){
                  $x =count($temp[3][2]) - count($temp[7][2]);
                  for ($i=1; $i<=$x ; $i++) {
                    $im_m[1] = $i;?>
                    <div>
                      <input type="checkbox" value="0">
                      <label class="placeholder">a</label>
                    </div>
                    <?php
                  }
                }
                if(count($temp[7][2]) < (count($temp[4][2]))){
                  $x =count($temp[4][2]) - count($temp[7][2]);
                  for ($i=1; $i<=$x ; $i++) {
                    $m_m_m[1] = $i;?>
                    <div>
                      <input type="checkbox" value="0">
                      <label class="placeholder">a</label>
                    </div>
                    <?php
                  }
                }
                if(count($temp[7][2]) < (count($temp[5][2]))){
                  $x =count($temp[5][2]) - count($temp[7][2]);
                  for ($i=1; $i<=$x ; $i++) {
                    $im_p_m[1] = $i;?>
                    <div>
                      <input type="checkbox" value="0">
                      <label class="placeholder">a</label>
                    </div>
                    <?php
                  }
                }?>
                <?php
              }
                ?>
              </fieldset>
              <!-- RAM -->
              <fieldset id="RAM">
                <div><legend><h2>Pamięć RAM</h2></legend></div>
                <?php $i = 1; if(isset($temp[7][3])){foreach ($temp[7][3] as $k => $v) {?>
                  <div>
                    <input type="radio" id="<?php echo '3-'.$i.'im';?>" name="RAM" value="<?php echo $v['price']; ?>" <?php if($i == 1){echo 'checked';}?>>
                    <label for="<?php echo '3-'.$i.'im';?>" data-score="<?php echo $v['score'];?>"><?php echo $v['name'];?></label>
                  </div>
                <?php $i++;}?>
                <?php
                $m_p_m[2] = 0;
                $im_m[2] = 0;
                $m_m_m[2] = 0;
                $im_p_m[2] = 0;
                if(count($temp[7][3]) < (count($temp[2][3]))){
                  $x =count($temp[2][3]) - count($temp[7][3]);
                  for ($i=1; $i<=$x ; $i++) {
                    $m_p_m[2] = $i;?>
                    <div>
                      <input type="checkbox" value="0">
                      <label class="placeholder">a</label>
                    </div>
                    <?php
                  }
                }
                if(count($temp[7][3]) < (count($temp[3][3]))){
                  $x = count($temp[3][3]) - count($temp[7][3]);
                  for ($i=1; $i<=$x ; $i++) {
                    $im_m[2] = $i;?>
                    <div>
                      <input type="checkbox" value="0">
                      <label class="placeholder">a</label>
                    </div>
                    <?php
                  }
                }
                if(count($temp[7][3]) < (count($temp[4][3]))){
                  $x = count($temp[4][3]) - count($temp[7][3]);
                  for ($i=1; $i<=$x ; $i++) {
                    $m_m_m[2] = $i;?>
                    <div>
                      <input type="checkbox" value="0">
                      <label class="placeholder">a</label>
                    </div>
                    <?php
                  }
                }
                if(count($temp[7][3]) < (count($temp[5][3]))){
                  $x =count($temp[5][3]) - count($temp[7][3]);
                  for ($i=1; $i<=$x ; $i++) {
                    $im_p_m[2] = $i;?>
                    <div>
                      <input type="checkbox" value="0">
                      <label class="placeholder">a</label>
                    </div>
                    <?php
                  }
                }
              }
                ?>
              </fieldset>
                <!-- Pamięć masowa -->
                <fieldset id="Pamiec">
                  <div><legend><h2>Dysk SATA</h2></legend></div>
                  <?php $i = 1;if(isset($temp[7][4])){ foreach ($temp[7][4] as $k => $v) {?>
                    <?php if((!isset($jest)) && (strpos($v['name'],'M.2')!=0)){?>
                      <div>
                        <legend><label class="Pamiec_M2" for="control"><h2>Dysk M.2</h2></label></legend>
                        <input id="control" type="checkbox" checked name="Pamiec_M2">
                      </div>
                    <?php $jest=1;  } ?>
                    <div>
                      <input type="radio" id="<?php echo '4-'.$i.'im';?>" name="<?php if(strpos($v['name'],'M.2')!=0){echo "Pamiec2";}else{echo "Pamiec";}?>" value="<?php echo $v['price']; ?>" <?php if($i == 1){echo 'checked';}?>>
                      <label for="<?php echo '4-'.$i.'im';?>" data-score="<?php echo $v['score'];?>"><?php echo $v['name'];?></label>
                    </div>
                  <?php $i++;}?>
                  <div>
                    <input class="mobile_check" type="checkbox" id="5-2i" name="Optional" value="<?php echo $temp[7][5][139]['price']; ?>">
                    <label class="mobile_label" for="5-2i"><?php echo $temp[7][5][139]['name']; ?></label>
                  </div>
                  <div>
                  <?php
                  $m_p_m[3] = 0;
                  $im_m[3] = 0;
                  $m_m_m[3] = 0;
                  $im_p_m[3] = 0;
                  if(count($temp[7][4]) < (count($temp[2][4]))){
                    $x = count($temp[2][4]) - count($temp[7][4]);
                    for ($i=1; $i<=$x ; $i++) {
                      $m_p_m[3] = $i;?>
                      <div>
                        <input type="checkbox" value="0">
                      </div>
                      <label class="placeholder">a</label>
                      <?php
                    }
                  }
                  if(count($temp[7][4]) < (count($temp[3][4]))){
                    $x = count($temp[3][4]) - count($temp[7][4]);
                    for ($i=1; $i<=$x ; $i++) {
                      $im_m[3] = $i;?>
                      <div>
                        <input type="checkbox" value="0">
                        <label class="placeholder">a</label>
                      </div>
                      <?php
                    }
                  }
                  if(count($temp[7][4]) < (count($temp[4][4]))){
                    $x = count($temp[4][4]) - count($temp[7][4]);
                    for ($i=1; $i<=$x ; $i++) {
                      $m_m_m[3] = $i;?>
                      <div>
                        <input type="checkbox" value="0">
                        <label class="placeholder">a</label>
                      </div>
                      <?php
                    }
                  }
                  if(count($temp[7][4]) < (count($temp[5][4]))){
                    $x =count($temp[5][4]) - count($temp[7][4]);
                    for ($i=1; $i<=$x ; $i++) {
                      $im_p_m[3] = $i;?>
                      <div>
                        <input type="checkbox" value="0">
                        <label class="placeholder">a</label>
                      </div>
                      <?php
                    }
                  }?>
                  <div>
                    <input type="checkbox" value="0">
                    <label class="placeholder">a</label>
                  </div>
                  <?php
                }
                  ?>
                </fieldset>
                <!-- Dodatki -->
                <fieldset id="Optional">
                  <div><legend><h2>Dodatki</h2></legend></div>
                  <div>
                    <input type="checkbox" id="5-1im" name="Optional" value="<?php echo $temp[7][5][134]['price']; ?>">
                    <label for="5-1im"><?php echo $temp[7][5][134]['name']; ?></label>
                  </div>
                  <!--<div>
                    <input type="checkbox" id="5-3i" name="Grafika" value="0">
                    <label for="5-3i">Dodatkowy Dysk SSD 2.5'</label>
                  </div>
                  <div>
                    <input type="checkbox" id="5-4i" name="Grafika" value="0">
                    <label for="5-4i">Dodatkowy Dysk SSD M.2'</label>
                  </div>-->
                  <div>
                    <input type="checkbox" id="5-5im" name="Optional" value="<?php echo $temp[7][5][135]['price']; ?>">
                    <label for="5-5im"><?php echo $temp[7][5][135]['name']; ?></label>
                  </div>
                  <!--<div>
                    <input type="checkbox" id="5-6i" name="Grafika" value="0">
                    <label for="5-6i">Wi-Fi + Bluetooth</label>
                  </div>-->
                  <div>
                    <input type="checkbox" id="5-6im" name="Optional" value="<?php echo $temp[7][5][136]['price']; ?>">
                    <label for="5-6im"><?php echo $temp[7][5][136]['name']; ?></label>
                  </div>
                  <div>
                    <input type="checkbox" id="5-7im" name="Optional" value="<?php echo $temp[7][5][137]['price']; ?>">
                    <label for="5-7im"><?php echo $temp[7][5][137]['name']; ?></label>
                  </div>
              </fieldset>
            <button form="iroNm-form" type="reset">Zresetuj Konfigurację</button>
            <button type="submit" form="iroNm-form">Wyeksportuj</button>
            </form>
            <form class="iroN_mobile" action="index.html" method="post">
              <!-- PROCESORY -->
                <fieldset id="PROCESORY_mobile">
                  <div><legend><h2>Procesor</h2></legend></div>
                  <select class="select_mobile" name="Procesor">
                    <?php if(isset($temp[7][1])){foreach ($temp[7][1] as $k => $v) {?>
                      <option data-score="<?php echo $v['score'];?>" value="<?php echo $v['price'];?>"><?php echo $v['name'];?></option>
                    <?php }}?>
                  </select>
                </fieldset>
                <!-- KARTY GRAFICZNE -->
                <fieldset id="Grafika">
                  <div><legend><h2>Karta Graficzna</h2></legend></div>
                  <select class="select_mobile" name="Grafika">
                    <?php if(isset($temp[7][2])){foreach ($temp[7][2] as $k => $v) {?>
                      <option data-score="<?php echo $v['score'];?>" value="<?php echo $v['price'];?>"><?php echo $v['name'];?></option>
                    <?php }}?>
                  </select>
                </fieldset>
                <!-- RAM -->
                <fieldset id="RAM">
                  <div><legend><h2>Pamięć RAM</h2></legend></div>
                  <select class="select_mobile" name="RAM">
                    <?php if(isset($temp[7][3])){foreach ($temp[7][3] as $k => $v) {?>
                      <option data-score="<?php echo $v['score'];?>" value="<?php echo $v['price'];?>"><?php echo $v['name'];?></option>
                    <?php }}?>
                  </select>
                </fieldset>
                <!-- Pamięć masowa -->
                <fieldset id="Pamiec">
                  <div><legend><h2>Dysk SATA</h2></legend></div>
                  <select class="select_mobile" name="Pamiec">
                    <?php $counttt=0; if(isset($temp[7][4])){foreach ($temp[7][4] as $k => $v) {?>
                      <?php if(strpos($v['name'],'M.2')==0){?>
                        <option data-score="<?php echo $v['score'];?>" value="<?php echo $v['price'];?>"><?php echo $v['name'];?></option>
                      <?php }else{
                        if(!isset($jestt2)){ ?>
                        </select>
                      <?php $jestt2=1; } if(!isset($jesttt)){?>
                        <div style="padding:2%; margin:8% 0%;">
                          <label class="Pamiec_M2 PM" for="control">Dysk M.2</label>
                          <input id="control_mobile" type="checkbox" style="margin:1.8% 0 0 0; display:none; font-size:0.8vw;" name="Pamiec_M2">
                        </div>
                      <?php $jesttt=1;  } ?>
                      <?php if(!isset($jestt3)){?>
                      <select class="select_mobile" name="Pamiec2">
                      <?php $jestt3=1;?> <option value="0"> -- Wybierz Dysk M.2 -- </option> <?php } ?>
                        <option data-score="<?php echo $v['score'];?>" value="<?php echo $v['price'];?>"><?php echo $v['name'];?></option>
                      <?php if($counttt==count($temp[7][4])){ ?>
                      </select>
                    <?php }} ?>
                  <?php }$counttt++;}?>
                  <input class="mobile_check" type="checkbox" id="5-2im" name="Optional" value="<?php echo $temp[7][5][139]['price']; ?>">
                  <label class="mobile_label" for="5-2im"><?php echo $temp[7][5][139]['name']; ?></label>
                </fieldset>
                <!-- Dodatki -->
                <fieldset class="Optional_iron_m" style="display:none;" id="Optional">
                  <div><legend><h2>Dodatki</h2></legend></div>
                    <input class="mobile_check" type="checkbox" id="5-1im" name="Optional" value="<?php echo $temp[7][5][134]['price']; ?>">
                    <label class="mobile_label" for="5-1im"><?php echo $temp[7][5][134]['name']; ?></label>
                  <!--<div>
                    <input type="checkbox" id="5-3i" name="Grafika" value="0">
                    <label for="5-3i">Dodatkowy Dysk SSD 2.5'</label>
                  </div>
                  <div>
                    <input type="checkbox" id="5-4i" name="Grafika" value="0">
                    <label for="5-4i">Dodatkowy Dysk SSD M.2'</label>
                  </div>-->
                    <input class="mobile_check" type="checkbox" id="5-5im" name="Optional" value="<?php echo $temp[7][5][135]['price']; ?>">
                    <label class="mobile_label" for="5-5im"><?php echo $temp[7][5][135]['name']; ?> </label>
                    <input class="mobile_check" type="checkbox" id="5-6im" name="Optional" value="<?php echo $temp[7][5][136]['price']; ?>">
                    <label class="mobile_label" for="5-6im"><?php echo $temp[7][5][136]['name']; ?></label>
                    <input class="mobile_check" type="checkbox" id="5-7im" name="Optional" value="<?php echo $temp[7][5][137]['price']; ?>">
                    <label class="mobile_label" for="5-7mt"><?php echo $temp[7][5][137]['name']; ?></label>
                  <!--<div>
                    <input type="checkbox" id="5-6i" name="Grafika" value="0">
                    <label for="5-6i">Wi-Fi + Bluetooth</label>
                  </div>-->
              </fieldset>
            </form>
          </div>
        </div>
        <!-- END iroN Mini config -->
      <?php }?>
      <!-- START Mac Pro config -->
        <div class="container hide" id="Mac_Pro">
          <div class="title"><h2 class="title"><?php echo $temp2[2][2]['name']; ?></h2></div>
          <div id="mac_cont" class="container_top M">
            <div class="container_img img_M">
              <img class="" id="Mac_thumb" src="img/<?php echo $temp2[2][2]['image']; ?>" alt="">
              <img class="image hide music_card M" src="img/karta_muzyczna — Mac_Pro.png" alt="">
              <img class="image hard_drive hide drive_1 M" src="img/dysk — Mac_Pro.png" alt="">
              <img class="image hard_drive hide drive_2 M" src="img/dysk — Mac_Pro.png" alt="">
              <img class="image hard_drive hide drive_3 M" src="img/dysk — Mac_Pro.png" alt="">
              <img class="image hard_drive hide drive_4 M" src="img/dysk — Mac_Pro.png" alt="">
              <img class="image hide g-drive M" src="img/G-drive — Mac_Pro.png" alt="">
              <img class="image hide rx580 M" src="img/eGPU RX580 — Mac_Pro.png" alt="">
              <img class="image kable hide kable_1 M" src="img/Kable — Mac_Pro.png" alt="">
              <img class="image kable hide kable_2 M" src="img/Kable — Mac_Pro.png" alt="">
            </div>
            <h3 class="price" data-price="<?php echo $temp2[2][2]['org_price']; ?>" id="mac_priceM"><?php echo $temp2[2][2]['org_price']; ?> zł</h3>
          </div>
          <div class="container_form M">
            <form class="mac_form" method="post">
              <!-- PROCESORY -->
              <div class="form_level" style="margin-bottom:17.94%;">
                <fieldset id="Procesor_mac">
                  <div><legend><h2>Procesor</h2></legend></div>
                  <?php $i = 1; if(isset($temp[2][1])){foreach ($temp[2][1] as $k => $v) {?>
                    <div>
                      <input type="radio" id="<?php echo '1-'.$i;?>" name="Procesor" value="<?php echo $v['price']; ?>" <?php if($i == 1){echo 'checked';}?>>
                      <label for="<?php echo '1-'.$i;?>" data-score="<?php echo $v['score'];?>"><?php echo $v['name'];?></label>
                    </div>
                  <?php $i++;}?>
                  <?php
                  if($_GET['id'] == 1){
                    $x = 0;
                    if(count($temp[1][1]) > (count($temp[2][1]))){
                      $x = (count($temp[1][1]) - count($temp[2][1])) + $im[0] + $m_m[0]+$im_p[0];
                    }
                    elseif(count($temp[1][1]) <= (count($temp[2][1]))){
                      $x = $im[0] + $m_m[0]+$im_p[0];
                    }
                      for ($i=1; $i<=$x ; $i++) {?>
                        <div>
                          <input type="checkbox" value="0">
                          <label class="placeholder">a</label>
                        </div>
                        <?php
                      }}elseif($_GET['id'] <= 0){
                      $x = 0;
                      if(count($temp[6][1]) > (count($temp[2][1]))){
                        $x = (count($temp[6][1]) - count($temp[2][1])) + $im_t[0] + $m_m_t[0]+$im_p_t[0];
                      }
                      elseif(count($temp[6][1]) <= (count($temp[2][1]))){
                        $x = $im_t[0] + $m_m_t[0]+$im_p_t[0];
                      }
                        for ($i=1; $i<=$x ; $i++) {?>
                          <div>
                            <input type="checkbox" value="0">
                            <label class="placeholder">a</label>
                          </div>
                          <?php
                        }}else{
                          $x = 0;
                          if(count($temp[7][1]) > (count($temp[2][1]))){
                            $x = (count($temp[7][1]) - count($temp[2][1])) + $im_m[0] + $m_m_m[0]+$im_p_m[0];
                          }
                          elseif(count($temp[7][1]) <= (count($temp[2][1]))){
                            $x = $im_m[0] + $m_m_m[0]+$im_p_m[0];
                          }
                            for ($i=1; $i<=$x ; $i++) {?>
                              <div>
                                <input type="checkbox" value="0">
                                <label class="placeholder">a</label>
                              </div>
                              <?php
                            }}
                    }?>
                </fieldset>
                <!-- KARTY GRAFICZNE -->
                <fieldset id="Grafika_mac">
                  <div><legend><h2>Karta Graficzna</h2></legend></div>
                  <?php $i = 1; if(isset($temp[2][2])){foreach ($temp[2][2] as $k => $v) {?>
                    <div>
                      <input type="radio" data-name="<?php echo $v['name'];?>" id="<?php echo '2-'.$i;?>" name="Grafika" value="<?php echo $v['price']; ?>" <?php if($i == 1){echo 'checked';}?>>
                      <label for="<?php echo '2-'.$i;?>" data-score="<?php echo $v['score'];?>"><?php echo $v['name'];?></label>
                    </div>
                  <?php $i++;}?>
                  <?php
                  if($_GET['id'] == 1){
                    $x = 0;
                    if(count($temp[1][2]) > (count($temp[2][2]))){
                      $x = (count($temp[1][2]) - count($temp[2][2])) + $im[1] + $m_m[1]+$im_p[1];
                    }
                    elseif(count($temp[1][2]) <= (count($temp[2][2]))){
                      $x = $im[1] + $m_m[1]+$im_p[1];
                    }
                      for ($i=1; $i<=$x ; $i++) {?>
                        <div>
                          <input type="checkbox" value="0">
                          <label class="placeholder">a</label>
                        </div>
                        <?php
                      }}elseif($_GET['id'] <= 0){
                        $x = 0;
                        if(count($temp[6][2]) > (count($temp[2][2]))){
                          $x = (count($temp[6][2]) - count($temp[2][2])) + $im_t[1] + $m_m_t[1]+$im_p_t[1];
                        }
                        elseif(count($temp[6][2]) <= (count($temp[2][2]))){
                          $x = $im_t[1] + $m_m_t[1]+$im_p_t[1];
                        }
                          for ($i=1; $i<=$x ; $i++) {?>
                            <div>
                              <input type="checkbox" value="0">
                              <label class="placeholder">a</label>
                            </div>
                            <?php
                          }}else{
                            $x = 0;
                            if(count($temp[7][2]) > (count($temp[2][2]))){
                              $x = (count($temp[7][2]) - count($temp[2][2])) + $im_m[1] + $m_m_m[1]+$im_p_m[1];
                            }
                            elseif(count($temp[7][2]) <= (count($temp[2][2]))){
                              $x = $im_m[1] + $m_m_m[1]+$im_p_m[1];
                            }
                              for ($i=1; $i<=$x ; $i++) {?>
                                <div>
                                  <input type="checkbox" value="0">
                                  <label class="placeholder">a</label>
                                </div>
                                <?php
                                }
                              }
                          }
                      ?>
                </fieldset>
                <!-- RAM -->
                <fieldset id="RAM_mac">
                  <div><legend><h2>Pamięć RAM</h2></legend></div>
                  <?php $i = 1; if(isset($temp[2][3])){foreach ($temp[2][3] as $k => $v) {?>
                    <div>
                      <input type="radio" id="<?php echo '3-'.$i;?>" name="RAM" value="<?php echo $v['price']; ?>" <?php if($i == 1){echo 'checked';}?>>
                      <label for="<?php echo '3-'.$i;?>" data-score="<?php echo $v['score'];?>"><?php echo $v['name'];?></label>
                    </div>
                  <?php $i++;}?>
                  <?php
                  if($_GET['id'] == 1){
                    $x = 0;
                    if(count($temp[1][3]) > (count($temp[2][3]))){
                      $x = (count($temp[1][3]) - count($temp[2][3])) + $im[2] + $m_m[2]+$im_p[2];
                    }
                    elseif(count($temp[1][3]) <= (count($temp[2][3]))){
                      $x = $im[2] + $m_m[2]+$im_p[2];
                    }
                      for ($i=1; $i<=$x ; $i++) {?>
                        <div>
                          <input type="checkbox" value="0">
                          <label class="placeholder">a</label>
                        </div>
                        <?php
                      }}elseif($_GET['id'] <= 0){
                        $x = 0;
                        if(count($temp[6][3]) > (count($temp[2][3]))){
                          $x = (count($temp[6][3]) - count($temp[2][3])) + $im_t[2] + $m_m_t[2]+$im_p_t[2];
                        }
                        elseif(count($temp[6][3]) <= (count($temp[2][3]))){
                          $x = $im_t[2] + $m_m_t[2]+$im_p_t[2];
                        }
                          for ($i=1; $i<=$x ; $i++) {?>
                            <div>
                              <input type="checkbox" value="0">
                              <label class="placeholder">a</label>
                            </div>
                            <?php
                          }
                      }else{
                        $x = 0;
                        if(count($temp[7][3]) > (count($temp[2][3]))){
                          $x = (count($temp[7][3]) - count($temp[2][3])) + $im_m[2] + $m_m_m[2]+$im_p_m[2];
                        }
                        elseif(count($temp[7][3]) <= (count($temp[2][3]))){
                          $x = $im_m[2] + $m_m_m[2]+$im_p_m[2];
                        }
                          for ($i=1; $i<=$x ; $i++) {?>
                            <div>
                              <input type="checkbox" value="0">
                              <label class="placeholder">a</label>
                            </div>
                            <?php
                          }
                      }
                    }?>
                </fieldset>
              <!-- Pamięć masowa -->
                <fieldset id="Pamiec_mac">
                  <div><legend><h2>Pamięć masowa</h2></legend></div>
                  <?php $i = 1; if(isset($temp[2][4])){foreach ($temp[2][4] as $k => $v) {?>
                    <div>
                      <input type="radio" id="<?php echo '4-'.$i;?>" name="Pamiec" value="<?php echo $v['price']; ?>" <?php if($i == 1){echo 'checked';}?>>
                      <label for="<?php echo '4-'.$i;?>" data-score="<?php echo $v['score'];?>"><?php echo $v['name'];?></label>
                    </div>
                  <?php $i++;}?>
                  <div>
                    <input type="checkbox" id="5-2M" name="Optional_mac" value="<?php echo $temp[2][5][64]['price']; ?>">
                    <label for="5-2M">
                      <?php echo $temp[2][5][64]['name']; ?>
                      <!--<select class="hide" id="mac_selectM">
                         <option class="mac_option active" value="1">1</option>
                         <option class="mac_option" value="2">2</option>
                         <option class="mac_option" value="3">3</option>
                         <option class="mac_option" value="4">4</option>
                      </select>-->
                    </label>
                  </div>
                  <div>
                    <input type="checkbox" id="5-3M" name="Optional_mac" value="<?php echo $temp[2][5][65]['price']; ?>">
                    <label for="5-3M"><?php echo $temp[2][5][65]['name']; ?></label>
                  </div>
                  <div style="margin-bottom:17%;"></div>
                  <?php
                  if($_GET['id'] == 1){
                    $x = 0;
                    if(count($temp[1][4]) > (count($temp[2][4]))){
                      $x = (count($temp[1][4]) - count($temp[2][4])) + $im[3] + $m_m[3]+$im_p[3];
                    }
                    elseif(count($temp[1][4]) <= (count($temp[2][4]))){
                      $x = $im[3] + $m_m[3]+$im_p[3];
                    }
                      for ($i=1; $i<=$x ; $i++) {?>
                        <div>
                          <input type="checkbox" value="0">
                          <label class="placeholder">a</label>
                        </div>
                        <?php
                      }}elseif($_GET['id'] <= 0){
                        $x = 0;
                        if(count($temp[6][4]) > (count($temp[2][4]))){
                          $x = (count($temp[6][4]) - count($temp[2][4])) + $im_t[3] + $m_m_t[3]+$im_p_t[3];
                        }
                        elseif(count($temp[6][4]) <= (count($temp[2][4]))){
                          $x = $im_t[3] + $m_m_t[3]+$im_p_t[3];
                        }
                          for ($i=1; $i<=$x ; $i++) {?>
                            <div>
                              <input type="checkbox" value="0">
                              <label class="placeholder">a</label>
                            </div>
                            <?php
                          }
                      }else{
                        $x = 0;
                        if(count($temp[7][4]) > (count($temp[2][4]))){
                          $x = (count($temp[7][4]) - count($temp[2][4])) + $im_m[3] + $m_m_m[3]+$im_p_m[3];
                        }
                        elseif(count($temp[7][4]) <= (count($temp[2][4]))){
                          $x = $im_m[3] + $m_m_m[3]+$im_p_m[3];
                        }
                          for ($i=1; $i<=$x ; $i++) {?>
                            <div>
                              <input type="checkbox" value="0">
                              <label class="placeholder">a</label>
                            </div>
                            <?php
                          } 
                      }
                    }?>

                </fieldset>
                <!-- Dodatki -->
                <fieldset id="Optional_mac">
                  <div><legend><h2>Dodatki</h2></legend></div>
                  <div>
                    <input type="checkbox" id="5-1M" name="Optional_mac" value="<?php echo $temp[2][5][66]['price']; ?>">
                    <label for="5-1M"><?php echo $temp[2][5][66]['name']; ?></label>
                  </div>
                </fieldset>
              </div>
            </form>
            <form class="mac_form_mobile" action="" method="post">
              <!-- PROCESORY -->
                <fieldset id="PROCESORY_mobile">
                  <div><legend><h2>Procesor</h2></legend></div>
                  <select class="select_mobile" name="Procesor">
                    <?php if(isset($temp[2][1])){foreach ($temp[2][1] as $k => $v) {?>
                      <option data-score="<?php echo $v['score'];?>" value="<?php echo $v['price'];?>"><?php echo $v['name'];?></option>
                    <?php }}?>
                  </select>
                </fieldset>
                <!-- KARTY GRAFICZNE -->
                <fieldset id="Grafika_mobile">
                  <div><legend><h2>Karta Graficzna</h2></legend></div>
                  <select class="select_mobile" name="Grafika">
                    <?php if(isset($temp[2][2])){foreach ($temp[2][2] as $k => $v) {?>
                      <option data-name="<?php echo $v['name'];?>" data-score="<?php echo $v['score'];?>" value="<?php echo $v['price'];?>"><?php echo $v['name'];?></option>
                    <?php }}?>
                  </select>
                </fieldset>
                <!-- RAM -->
                <fieldset id="RAM_mobile">
                  <div><legend><h2>Pamięć RAM</h2></legend></div>
                  <select class="select_mobile" name="RAM">
                    <?php if(isset($temp[2][3])){foreach ($temp[2][3] as $k => $v) {?>
                      <option data-score="<?php echo $v['score'];?>" value="<?php echo $v['price'];?>"><?php echo $v['name'];?></option>
                    <?php }}?>
                  </select>
                </fieldset>
                <!-- Pamięć masowa -->
                <fieldset id="Pamiec_mobile">
                  <div><legend><h2>Pamięć masowa</h2></legend></div>
                  <select class="select_mobile" name="Pamiec">
                    <?php if(isset($temp[2][4])){foreach ($temp[2][4] as $k => $v) {?>
                      <option data-score="<?php echo $v['score'];?>" value="<?php echo $v['price'];?>"><?php echo $v['name'];?></option>
                    <?php }}?>
                  </select>
                  <div>
                    <input type="checkbox" id="5-2M" name="Optional_mac" value="<?php echo $temp[2][5][64]['price']; ?>">
                    <label for="5-2M">
                      <?php echo $temp[2][5][64]['name']; ?>
                      <!--<select class="hide" id="mac_selectM">
                         <option class="mac_option active" value="1">1</option>
                         <option class="mac_option" value="2">2</option>
                         <option class="mac_option" value="3">3</option>
                         <option class="mac_option" value="4">4</option>
                      </select>-->
                    </label>
                  </div>
                  <div>
                    <input type="checkbox" id="5-3M" name="Optional_mac" value="<?php echo $temp[2][5][65]['price']; ?>">
                    <label for="5-3M"><?php echo $temp[2][5][65]['name']; ?></label>
                  </div>
                  <div style="margin-bottom:21%;"></div>
                </fieldset>
                <!-- Dodatki -->
                <fieldset id="Optional">
                  <div><legend><h2>Dodatki</h2></legend></div>
                  <div>
                    <input class="mobile_check" type="checkbox" id="5-1M" name="Optional_mac" value="<?php echo $temp[2][5][66]['price']; ?>">
                    <label class="mobile_label" for="5-1M"><?php echo $temp[2][5][66]['name']; ?></label>
                  </div>
                  <!--<div>
                    <input type="checkbox" id="5-3i" name="Grafika" value="0">
                    <label for="5-3i">Dodatkowy Dysk SSD 2.5'</label>
                  </div>
                  <div>
                    <input type="checkbox" id="5-4i" name="Grafika" value="0">
                    <label for="5-4i">Dodatkowy Dysk SSD M.2'</label>
                  </div>-->
                  <!--<div>
                    <input type="checkbox" id="5-6i" name="Grafika" value="0">
                    <label for="5-6i">Wi-Fi + Bluetooth</label>
                  </div>-->
              </fieldset>
            </form>
          </div>
      </div>
        <!-- END Mac Pro config -->
        <!-- START iMac config -->
          <div class="container hide" id="iMac">
            <div class="title"><h2 class="title"><?php echo $temp2[2][3]['name']; ?></h2></div>
            <div class="container_top">
              <div class="container_img">
                <img class="" id="iMac_thumb" src="img/<?php echo $temp2[2][3]['image']; ?>" alt="">
                <img class="image hide music_card MiM iM" src="img/karta_muzyczna — iMac.png" alt="">
                <img class="image hard_drive hide drive_1 DiM iM" src="img/dysk — iMac.png" alt="">
                <img class="image hard_drive hide drive_2 iM" src="img/dysk — iMac.png" alt="">
                <img class="image hard_drive hide drive_3 iM" src="img/dysk — iMac.png" alt="">
                <img class="image hard_drive hide drive_4 iM" src="img/dysk — iMac.png" alt="">
                <img class="image hide g-drive giM iM" src="img/G-drive — iMac.png" alt="">
                <img class="image hide rx580 iMrx iM" src="img/eGPU RX580 — iMac.png" alt="">
                <img class="image kable hide kable_1 kiM iM" src="img/Kable — iMac.png" alt="">
                <img class="image kable hide kable_2 k2iM iM" src="img/Kable — iMac.png" alt="">
              </div>
              <h3 class="price" data-price="<?php echo $temp2[2][3]['org_price']; ?>" id="mac_priceiM"><?php echo $temp2[2][3]['org_price']; ?> zł</h3>
            </div>
            <div class="container_form">
              <form class="mac_form" method="post">
                <!-- PROCESORY -->
                  <fieldset id="Procesor_mac iM">
                    <div><legend><h2>Procesor</h2></legend></div>
                    <?php $i = 1; if(isset($temp[3][1])){foreach ($temp[3][1] as $k => $v) {?>
                      <div>
                        <input type="radio" id="<?php echo '1-'.$i.'iM';?>" name="Procesor" value="<?php echo $v['price']; ?>" <?php if($i == 1){echo 'checked';}?>>
                        <label for="<?php echo '1-'.$i.'iM';?>" data-score="<?php echo $v['score'];?>"><?php echo $v['name'];?></label>
                      </div>
                    <?php $i++;}?>
                    <?php
                    if($_GET['id'] == 1){
                      $x = 0;
                      if(count($temp[1][1]) > (count($temp[3][1]))){
                        $x = (count($temp[1][1]) - count($temp[3][1])) + $m_p[0] + $m_m[0]+$im_p[0];
                      }
                      elseif(count($temp[1][1]) <= (count($temp[3][1]))){
                        $x = $m_p[0] + $m_m[0]+$im_p[0];
                      }
                        for ($i=1; $i<=$x ; $i++) {?>
                          <div>
                            <input type="checkbox" value="0">
                            <label class="placeholder">a</label>
                          </div>
                          <?php
                        }}elseif($_GET['id'] <= 0){
                          $x = 0;
                          if(count($temp[6][1]) > (count($temp[3][1]))){
                            $x = (count($temp[6][1]) - count($temp[3][1])) + $m_p_t[0] + $m_m_t[0]+$im_p_t[0];
                          }
                          elseif(count($temp[6][1]) <= (count($temp[3][1]))){
                            $x = $m_p_t[0] + $m_m_t[0]+$im_p_t[0];
                          }
                            for ($i=1; $i<=$x ; $i++) {?>
                              <div>
                                <input type="checkbox" value="0">
                                <label class="placeholder">a</label>
                              </div>
                              <?php
                            }
                        }else{
                          $x = 0;
                          if(count($temp[7][1]) > (count($temp[3][1]))){
                            $x = (count($temp[7][1]) - count($temp[3][1])) + $m_p_m[0] + $m_m_m[0]+$im_p_m[0];
                          }
                          elseif(count($temp[7][1]) <= (count($temp[3][1]))){
                            $x = $m_p_m[0] + $m_m_m[0]+$im_p_m[0];
                          }
                            for ($i=1; $i<=$x ; $i++) {?>
                              <div>
                                <input type="checkbox" value="0">
                                <label class="placeholder">a</label>
                              </div>
                              <?php
                            }
                        }
                      }?>
                  </fieldset>
                  <!-- KARTY GRAFICZNE -->
                  <fieldset id="Grafika_mac">
                    <div><legend><h2>Karta Graficzna</h2></legend></div>
                    <?php $i = 1; if(isset($temp[3][2])){foreach ($temp[3][2] as $k => $v) {?>
                      <div>
                        <input type="radio" data-name="<?php echo $v['name'];?>" id="<?php echo '2-'.$i.'iM';?>" name="Grafika" value="<?php echo $v['price']; ?>" <?php if($i == 1){echo 'checked';}?>>
                        <label for="<?php echo '2-'.$i.'iM';?>" data-score="<?php echo $v['score'];?>"><?php echo $v['name'];?></label>
                      </div>
                    <?php $i++;}?>
                    <?php
                    if($_GET['id'] == 1){
                      $x = 0;
                      if(count($temp[1][2]) > (count($temp[3][2]))){
                        $x = (count($temp[1][2]) - count($temp[3][2])) + $m_p[1] + $m_m[1]+$im_p[1];
                      }
                      elseif(count($temp[1][2]) <= (count($temp[3][2]))){
                        $x = $m_p[1] + $m_m[1]+$im_p[1];
                      }
                        for ($i=1; $i<=$x ; $i++) {?>
                          <div>
                            <input type="checkbox" value="0">
                            <label class="placeholder">a</label>
                          </div>
                          <?php
                        }}elseif($_GET['id'] <= 0){
                          $x = 0;
                          if(count($temp[6][2]) > (count($temp[3][2]))){
                            $x = (count($temp[6][2]) - count($temp[3][2])) + $m_p_t[1] + $m_m_t[1]+$im_p_t[1];
                          }
                          elseif(count($temp[6][2]) <= (count($temp[3][2]))){
                            $x = $m_p_t[1] + $m_m_t[1]+$im_p_t[1];
                          }
                            for ($i=1; $i<=$x ; $i++) {?>
                              <div>
                                <input type="checkbox" value="0">
                                <label class="placeholder">a</label>
                              </div>
                              <?php
                            }
                        }else{
                          $x = 0;
                          if(count($temp[7][2]) > (count($temp[3][2]))){
                            $x = (count($temp[7][2]) - count($temp[3][2])) + $m_p_m[1] + $m_m_m[1]+$im_p_m[1];
                          }
                          elseif(count($temp[7][2]) <= (count($temp[3][2]))){
                            $x = $m_p_m[1] + $m_m_m[1]+$im_p_m[1];
                          }
                            for ($i=1; $i<=$x ; $i++) {?>
                              <div>
                                <input type="checkbox" value="0">
                                <label class="placeholder">a</label>
                              </div>
                              <?php
                            }
                        }
                      }?>
                  </fieldset>
                  <!-- RAM -->
                  <fieldset id="RAM_mac">
                    <div><legend><h2>Pamięć RAM</h2></legend></div>
                    <?php $i = 1; if(isset($temp[3][3])){foreach ($temp[3][3] as $k => $v) {?>
                      <div>
                        <input type="radio" id="<?php echo '3-'.$i.'iM';?>" name="RAM" value="<?php echo $v['price']; ?>" <?php if($i == 1){echo 'checked';}?>>
                        <label for="<?php echo '3-'.$i.'iM';?>" data-score="<?php echo $v['score'];?>"><?php echo $v['name'];?></label>
                      </div>
                    <?php $i++;}?>
                    <?php
                    if($_GET['id'] == 1){
                      $x = 0;
                      if(count($temp[1][3]) > (count($temp[3][3]))){
                        $x = (count($temp[1][3]) - count($temp[3][3])) + $m_p[2] + $m_m[2]+$im_p[2];
                      }
                      elseif(count($temp[1][3]) <= (count($temp[3][3]))){
                        $x = $m_p[2] + $m_m[2]+$im_p[2];
                      }
                        for ($i=1; $i<=$x ; $i++) {?>
                          <div>
                            <input type="checkbox" value="0">
                            <label class="placeholder">a</label>
                          </div>
                          <?php
                        }}elseif($_GET['id'] <= 0){
                          $x = 0;
                          if(count($temp[6][3]) > (count($temp[3][3]))){
                            $x = (count($temp[6][3]) - count($temp[3][3])) + $m_p_t[2] + $m_m_t[2]+$im_p_t[2];
                          }
                          elseif(count($temp[6][3]) <= (count($temp[3][3]))){
                            $x = $m_p_t[2] + $m_m_t[2]+$im_p_t[2];
                          }
                            for ($i=1; $i<=$x ; $i++) {?>
                              <div>
                                <input type="checkbox" value="0">
                                <label class="placeholder">a</label>
                              </div>
                              <?php
                            }
                        }else{
                          $x = 0;
                          if(count($temp[7][3]) > (count($temp[3][3]))){
                            $x = (count($temp[7][3]) - count($temp[3][3])) + $m_p_m[2] + $m_m_m[2]+$im_p_m[2];
                          }
                          elseif(count($temp[7][3]) <= (count($temp[3][3]))){
                            $x = $m_p_m[2] + $m_m_m[2]+$im_p_m[2];
                          }
                            for ($i=1; $i<=$x ; $i++) {?>
                              <div>
                                <input type="checkbox" value="0">
                                <label class="placeholder">a</label>
                              </div>
                              <?php
                            }
                        }
                      }?>
                  </fieldset>
                <!-- Pamięć masowa -->
                  <fieldset id="Pamiec_mac">
                    <div><legend><h2>Pamięć masowa</h2></legend></div>
                    <!--<div>
                      <input type="radio" id="4-1iM" name="Pamiec" value="0" checked>
                      <label for="4-1iM">1 TB Serial ATA</label>
                    </div>
                    <div>
                      <input type="radio" id="4-2iM" name="Pamiec" value="480">
                      <label for="4-2iM">1 TB Fusion Drive</label>
                    </div>-->
                    <?php $i = 1; if(isset($temp[3][4])){foreach ($temp[3][4] as $k => $v) {?>
                      <div>
                        <input type="radio" id="<?php echo '4-'.$i.'iM';?>" name="Pamiec" value="<?php echo $v['price']; ?>" <?php if($i == 1){echo 'checked';}?>>
                        <label for="<?php echo '4-'.$i.'iM';?>" data-score="<?php echo $v['score'];?>"><?php echo $v['name'];?></label>
                      </div>
                    <?php $i++;}?>
                      <input type="checkbox" id="5-2iM" name="Optional_mac" value="<?php echo $temp[3][5][68]['price']; ?>">
                      <label for="5-2iM">
                        <?php echo $temp[3][5][68]['name']; ?>
                        <!--<select class="hide" id="mac_selectiM">
                           <option class="mac_option active" value="1">1</option>
                           <option class="mac_option" value="2">2</option>
                           <option class="mac_option" value="3">3</option>
                           <option class="mac_option" value="4">4</option>
                        </select>-->
                      </label>
                    <div>
                      <input type="checkbox" id="5-3iM" name="Optional_mac" value="<?php echo $temp[3][5][69]['price']; ?>">
                      <label for="5-3iM"><?php echo $temp[3][5][69]['name']; ?></label>
                    </div>
                    <div style="margin-bottom:17%;"></div>
                    <?php
                    if($_GET['id']==1){
                      $x = 0;
                      if(count($temp[1][4]) > (count($temp[3][4]))){
                        $x = (count($temp[1][4]) - count($temp[3][4])) + $m_p[3] + $m_m[3]+$im_p[3];
                      }
                      elseif(count($temp[1][4]) <= (count($temp[3][4]))){
                        $x = $m_p[3] + $m_m[3]+$im_p[3];
                      }
                        for ($i=1; $i<=$x ; $i++) {?>
                          <div>
                            <input type="checkbox" value="0">
                            <label class="placeholder">a</label>
                          </div>
                          <?php
                        }}elseif($_GET['id'] <= 0){
                          $x = 0;
                          if(count($temp[6][4]) > (count($temp[3][4]))){
                            $x = (count($temp[6][4]) - count($temp[3][4])) + $m_p_t[3] + $m_m_t[3]+$im_p_t[3];
                          }
                          elseif(count($temp[6][4]) <= (count($temp[3][4]))){
                            $x = $m_p_t[3] + $m_m_t[3]+$im_p_t[3];
                          }
                            for ($i=1; $i<=$x ; $i++) {?>
                              <div>
                                <input type="checkbox" value="0">
                                <label class="placeholder">a</label>
                              </div>
                              <?php
                            }
                        }else{
                          $x = 0;
                          if(count($temp[7][4]) > (count($temp[3][4]))){
                            $x = (count($temp[7][4]) - count($temp[3][4])) + $m_p_m[3] + $m_m_m[3]+$im_p_m[3];
                          }
                          elseif(count($temp[7][4]) <= (count($temp[3][4]))){
                            $x = $m_p_m[3] + $m_m_m[3]+$im_p_m[3];
                          }
                            for ($i=1; $i<=$x ; $i++) {?>
                              <div>
                                <input type="checkbox" value="0">
                                <label class="placeholder">a</label>
                              </div>
                              <?php
                            }
                        }
                      }?>
                  </fieldset>
                  <!-- Dodatki -->
                  <fieldset id="Optional_mac">
                    <h2>Dodatki</h2>
                    <div>
                      <input type="checkbox" id="5-1iM" name="Optional_mac" value="<?php echo $temp[3][5][70]['price']; ?>">
                      <label for="5-1iM"><?php echo $temp[3][5][70]['name']; ?></label>
                    </div>
                  </fieldset>
              </form>
              <form class="mac_form_mobile" action="" method="post">
                <!-- PROCESORY -->
                  <fieldset id="PROCESORY_mobile">
                    <div><legend><h2>Procesor</h2></legend></div>
                    <select class="select_mobile" name="Procesor">
                      <?php if(isset($temp[3][1])){foreach ($temp[3][1] as $k => $v) {?>
                        <option data-score="<?php echo $v['score'];?>" value="<?php echo $v['price'];?>"><?php echo $v['name'];?></option>
                      <?php }}?>
                    </select>
                  </fieldset>
                  <!-- KARTY GRAFICZNE -->
                  <fieldset id="Grafika_mobile">
                    <div><legend><h2>Karta Graficzna</h2></legend></div>
                    <select class="select_mobile" name="Grafika">
                      <?php if(isset($temp[3][2])){foreach ($temp[3][2] as $k => $v) {?>
                        <option data-score="<?php echo $v['score'];?>" value="<?php echo $v['price'];?>"><?php echo $v['name'];?></option>
                      <?php }}?>
                    </select>
                  </fieldset>
                  <!-- RAM -->
                  <fieldset id="RAM_mobile">
                    <div><legend><h2>Pamięć RAM</h2></legend></div>
                    <select class="select_mobile" name="RAM">
                      <?php if(isset($temp[3][3])){foreach ($temp[3][3] as $k => $v) {?>
                        <option data-score="<?php echo $v['score'];?>" value="<?php echo $v['price'];?>"><?php echo $v['name'];?></option>
                      <?php }}?>
                    </select>
                  </fieldset>
                  <!-- Pamięć masowa -->
                  <fieldset id="Pamiec_mobile">
                    <div><legend><h2>Pamięć masowa</h2></legend></div>
                    <select class="select_mobile" name="Pamiec">
                      <?php if(isset($temp[3][4])){foreach ($temp[3][4] as $k => $v) {?>
                        <option data-score="<?php echo $v['score'];?>" value="<?php echo $v['price'];?>"><?php echo $v['name'];?></option>
                      <?php }}?>
                    </select>
                    <div>
                      <input type="checkbox" id="5-2iM" name="Optional_mac" value="<?php echo $temp[3][5][68]['price']; ?>">
                      <label for="5-2iM">
                        <?php echo $temp[3][5][68]['name']; ?>
                        <!--<select class="hide" id="mac_selectM">
                           <option class="mac_option active" value="1">1</option>
                           <option class="mac_option" value="2">2</option>
                           <option class="mac_option" value="3">3</option>
                           <option class="mac_option" value="4">4</option>
                        </select>-->
                      </label>
                    </div>
                    <div>
                      <input type="checkbox" id="5-3iM" name="Optional_mac" value="<?php echo $temp[3][5][69]['price']; ?>">
                      <label for="5-3iM"><?php echo $temp[3][5][69]['name']; ?></label>
                    </div>
                    <div style="margin-bottom:21%;"></div>
                  </fieldset>
                  <!-- Dodatki -->
                  <fieldset id="Optional">
                    <div><legend><h2>Dodatki</h2></legend></div>
                    <div>
                      <input class="mobile_check" type="checkbox" id="5-1iM" name="Optional_mac" value="<?php echo $temp[3][5][70]['price']; ?>">
                      <label class="mobile_label" for="5-1iM"><?php echo $temp[3][5][70]['name']; ?></label>
                    </div>
                    <!--<div>
                      <input type="checkbox" id="5-3i" name="Grafika" value="0">
                      <label for="5-3i">Dodatkowy Dysk SSD 2.5'</label>
                    </div>
                    <div>
                      <input type="checkbox" id="5-4i" name="Grafika" value="0">
                      <label for="5-4i">Dodatkowy Dysk SSD M.2'</label>
                    </div>-->
                    <!--<div>
                      <input type="checkbox" id="5-6i" name="Grafika" value="0">
                      <label for="5-6i">Wi-Fi + Bluetooth</label>
                    </div>-->
                </fieldset>
              </form>
            </div>
          </div>
        </div>
        <!-- END iMac config -->
        <!-- START iMac Pro config -->
        <div class="container hide" id="iMac_Pro">
          <div class="title"><h2 class="title"><?php echo $temp2[2][5]['name']; ?></h2></div>
          <div class="container_top">
            <div class="container_img">
              <img class="" id="iMac_pro_thumb" src="img/<?php echo $temp2[2][5]['image']; ?>" alt="">
              <img class="image hide music_card MiM iMP" src="img/karta_muzyczna — iMac_Pro.png" alt="">
              <img class="image hard_drive hide drive_1 DiM iMP" src="img/dysk — iMac_Pro.png" alt="">
              <img class="image hard_drive hide drive_2 iMP" src="img/dysk — iMac_Pro.png" alt="">
              <img class="image hard_drive hide drive_3 iMP" src="img/dysk — iMac_Pro.png" alt="">
              <img class="image hard_drive hide drive_4 iMP" src="img/dysk — iMac_Pro.png" alt="">
              <img class="image hide g-drive giM iMP" src="img/G-drive — iMac_Pro.png" alt="">
              <img class="image hide rx580 iMrx iMP" src="img/eGPU RX580 — iMac_Pro.png" alt="">
              <img class="image kable hide kable_1 kiM iMP" src="img/Kable — iMac_Pro.png" alt="">
              <img class="image kable hide kable_2 k2iM iMP" src="img/Kable — iMac_Pro.png" alt="">
            </div>
            <h3 class="price" data-price="<?php echo $temp2[2][5]['org_price']; ?>" id="mac_priceiMP"><?php echo $temp2[2][5]['org_price']; ?> zł</h3>
          </div>
          <div class="container_form">
            <form class="mac_form" method="post">
              <!-- PROCESORY -->
                <fieldset id="Procesor_mac iMP">
                  <div><legend><h2>Procesor</h2></legend></div>
                  <?php $i = 1; if(isset($temp[5][1])){foreach ($temp[5][1] as $k => $v) {?>
                    <div>
                      <input type="radio" id="<?php echo '1-'.$i.'iMP';?>" name="Procesor" value="<?php echo $v['price']; ?>" <?php if($i == 1){echo 'checked';}?>>
                      <label for="<?php echo '1-'.$i.'iMP';?>" data-score="<?php echo $v['score'];?>"><?php echo $v['name'];?></label>
                    </div>
                  <?php $i++;}?>
                  <?php
                  if($_GET['id']==1){
                    $x = 0;
                    if(count($temp[1][1]) > (count($temp[5][1]))){
                      $x = (count($temp[1][1]) - count($temp[5][1])) + $im[0] + $m_m[0]+$m_p[0];
                    }
                    elseif(count($temp[1][1]) <= (count($temp[5][1]))){
                      $x = $im[0] + $m_m[0]+$m_p[0];
                    }
                      for ($i=1; $i<=$x ; $i++) {?>
                        <div>
                          <input type="checkbox" value="0">
                          <label class="placeholder">a</label>
                        </div>
                        <?php
                      }}elseif($_GET['id'] <= 0){
                        $x = 0;
                        if(count($temp[6][1]) > (count($temp[5][1]))){
                          $x = (count($temp[6][1]) - count($temp[5][1])) + $im_t[0] + $m_m_t[0]+$m_p_t[0];
                        }
                        elseif(count($temp[6][1]) <= (count($temp[5][1]))){
                          $x = $im_t[0] + $m_m_t[0]+$m_p_t[0];
                        }
                          for ($i=1; $i<=$x ; $i++) {?>
                            <div>
                              <input type="checkbox" value="0">
                              <label class="placeholder">a</label>
                            </div>
                            <?php
                          }
                      }else{
                        $x = 0;
                        if(count($temp[7][1]) > (count($temp[5][1]))){
                          $x = (count($temp[7][1]) - count($temp[5][1])) + $im_m[0] + $m_m_m[0]+$m_p_m[0];
                        }
                        elseif(count($temp[7][1]) <= (count($temp[5][1]))){
                          $x = $im_m[0] + $m_m_m[0]+$m_p_m[0];
                        }
                          for ($i=1; $i<=$x ; $i++) {?>
                            <div>
                              <input type="checkbox" value="0">
                              <label class="placeholder">a</label>
                            </div>
                            <?php
                          }
                      }
                    }?>
                </fieldset>
                <!-- KARTY GRAFICZNE -->
                <fieldset id="Grafika_mac">
                  <div><legend><h2>Karta Graficzna</h2></legend></div>
                  <?php $i = 1; if(isset($temp[5][2])){foreach ($temp[5][2] as $k => $v) {?>
                    <div>
                      <input type="radio" data-name="<?php echo $v['name'];?>" id="<?php echo '2-'.$i.'iMP';?>" name="Grafika" value="<?php echo $v['price']; ?>" <?php if($i == 1){echo 'checked';}?>>
                      <label for="<?php echo '2-'.$i.'iMP';?>" data-score="<?php echo $v['score'];?>"><?php echo $v['name'];?></label>
                    </div>
                  <?php $i++;}?>
                  <?php
                  if($_GET['id']==1){
                    $x = 0;
                    if(count($temp[1][2]) > (count($temp[5][2]))){
                      $x = (count($temp[1][2]) - count($temp[5][2])) + $im[1] + $m_m[1]+$m_p[1];
                    }
                    elseif(count($temp[1][2]) <= (count($temp[5][2]))){
                      $x = $im[1] + $m_m[1]+$m_p[1];
                    }
                      for ($i=1; $i<=$x ; $i++) {?>
                        <div>
                          <input type="checkbox" value="0">
                          <label class="placeholder">a</label>
                        </div>
                        <?php
                      }}elseif($_GET['id'] <= 0){
                        $x = 0;
                        if(count($temp[6][2]) > (count($temp[5][2]))){
                          $x = (count($temp[6][2]) - count($temp[5][2])) + $im_t[1] + $m_m_t[1]+$m_p_t[1];
                        }
                        elseif(count($temp[6][2]) <= (count($temp[5][2]))){
                          $x = $im_t[1] + $m_m_t[1]+$m_p_t[1];
                        }
                          for ($i=1; $i<=$x ; $i++) {?>
                            <div>
                              <input type="checkbox" value="0">
                              <label class="placeholder">a</label>
                            </div>
                            <?php
                          }
                      }else{
                        $x = 0;
                        if(count($temp[7][2]) > (count($temp[5][2]))){
                          $x = (count($temp[7][2]) - count($temp[5][2])) + $im_m[1] + $m_m_m[1]+$m_p_m[1];
                        }
                        elseif(count($temp[7][2]) <= (count($temp[5][2]))){
                          $x = $im_m[1] + $m_m_m[1]+$m_p_m[1];
                        }
                          for ($i=1; $i<=$x ; $i++) {?>
                            <div>
                              <input type="checkbox" value="0">
                              <label class="placeholder">a</label>
                            </div>
                            <?php
                          }
                      }
                    }?>
                </fieldset>
                <!-- RAM -->
                <fieldset id="RAM_mac">
                  <div><legend><h2>Pamięć RAM</h2></legend></div>
                  <?php $i = 1; if(isset($temp[5][3])){foreach ($temp[5][3] as $k => $v) {?>
                    <div>
                      <input type="radio" id="<?php echo '3-'.$i.'iMP';?>" name="RAM" value="<?php echo $v['price']; ?>" <?php if($i == 1){echo 'checked';}?>>
                      <label for="<?php echo '3-'.$i.'iMP';?>" data-score="<?php echo $v['score'];?>"><?php echo $v['name'];?></label>
                    </div>
                  <?php $i++;}?>
                  <?php
                  if($_GET['id']==1){
                    $x = 0;
                    if(count($temp[1][3]) > (count($temp[5][3]))){
                      $x = (count($temp[1][3]) - count($temp[5][3])) + $im[2] + $m_m[2]+$m_p[2];
                    }
                    elseif(count($temp[1][3]) <= (count($temp[5][3]))){
                      $x = $im[2] + $m_m[2]+$m_p[2];
                    }
                      for ($i=1; $i<=$x ; $i++) {?>
                        <div>
                          <input type="checkbox" value="0">
                          <label class="placeholder">a</label>
                        </div>
                        <?php
                      }}elseif($_GET['id'] <= 0){
                        $x = 0;
                        if(count($temp[6][3]) > (count($temp[5][3]))){
                          $x = (count($temp[6][3]) - count($temp[5][3])) + $im_t[2] + $m_m_t[2]+$m_p_t[2];
                        }
                        elseif(count($temp[6][3]) <= (count($temp[5][3]))){
                          $x = $im_t[2] + $m_m_t[2]+$m_p_t[2];
                        }
                          for ($i=1; $i<=$x ; $i++) {?>
                            <div>
                              <input type="checkbox" value="0">
                              <label class="placeholder">a</label>
                            </div>
                            <?php
                          }
                      }else{
                        $x = 0;
                        if(count($temp[7][3]) > (count($temp[5][3]))){
                          $x = (count($temp[7][3]) - count($temp[5][3])) + $im_m[2] + $m_m_m[2]+$m_p_m[2];
                        }
                        elseif(count($temp[7][3]) <= (count($temp[5][3]))){
                          $x = $im_m[2] + $m_m_m[2]+$m_p_m[2];
                        }
                          for ($i=1; $i<=$x ; $i++) {?>
                            <div>
                              <input type="checkbox" value="0">
                              <label class="placeholder">a</label>
                            </div>
                            <?php
                          }
                      }
                    }?>
                </fieldset>
              <!-- Pamięć masowa -->
                <fieldset id="Pamiec_mac">
                  <div><legend><h2>Pamięć masowa</h2></legend></div>
                  <!--<div>
                    <input type="radio" id="4-1iM" name="Pamiec" value="0" checked>
                    <label for="4-1iM">1 TB Serial ATA</label>
                  </div>
                  <div>
                    <input type="radio" id="4-2iM" name="Pamiec" value="480">
                    <label for="4-2iM">1 TB Fusion Drive</label>
                  </div>-->
                  <?php $i = 1; if(isset($temp[5][4])){foreach ($temp[5][4] as $k => $v) {?>
                    <div>
                      <input type="radio" id="<?php echo '4-'.$i.'iMP';?>" name="Pamiec" value="<?php echo $v['price']; ?>" <?php if($i == 1){echo 'checked';}?>>
                      <label for="<?php echo '4-'.$i.'iMP';?>" data-score="<?php echo $v['score'];?>"><?php echo $v['name'];?></label>
                    </div>
                  <?php $i++;}?>
                    <input type="checkbox" id="5-2iMP" name="Optional_mac" value="<?php echo $temp[5][5][76]['price']; ?>">
                    <label for="5-2iMP">
                      <?php echo $temp[5][5][76]['name']; ?>
                      <!--<select class="hide" id="mac_selectiM">
                         <option class="mac_option active" value="1">1</option>
                         <option class="mac_option" value="2">2</option>
                         <option class="mac_option" value="3">3</option>
                         <option class="mac_option" value="4">4</option>
                      </select>-->
                    </label>
                  <div>
                    <input type="checkbox" id="5-3iMP" name="Optional_mac" value="<?php echo $temp[5][5][77]['price']; ?>">
                    <label for="5-3iMP"><?php echo $temp[5][5][77]['name']; ?></label>
                  </div>
                  <div style="margin-bottom:17%;"></div>
                  <?php
                  if($_GET['id']==1){
                    $x = 0;
                    if(count($temp[1][4]) > (count($temp[5][4]))){
                      $x = (count($temp[1][4]) - count($temp[5][4])) + $im[3] + $m_m[3]+$m_p[3];
                    }
                    elseif(count($temp[1][4]) <= (count($temp[5][4]))){
                      $x = $im[3] + $m_m[3]+$m_p[3];
                    }
                      for ($i=1; $i<=$x ; $i++) {?>
                        <div>
                          <input type="checkbox" value="0">
                          <label class="placeholder">a</label>
                        </div>
                        <?php
                      }}elseif($_GET['id'] <= 0){
                        $x = 0;
                        if(count($temp[6][4]) > (count($temp[5][4]))){
                          $x = (count($temp[6][4]) - count($temp[5][4])) + $im_t[3] + $m_m_t[3]+$m_p_t[3];
                        }
                        elseif(count($temp[6][4]) <= (count($temp[5][4]))){
                          $x = $im_t[3] + $m_m_t[3]+$m_p_t[3];
                        }
                          for ($i=1; $i<=$x ; $i++) {?>
                            <div>
                              <input type="checkbox" value="0">
                              <label class="placeholder">a</label>
                            </div>
                            <?php
                          }
                      }else{
                        $x = 0;
                        if(count($temp[7][4]) > (count($temp[5][4]))){
                          $x = (count($temp[7][4]) - count($temp[5][4])) + $im_m[3] + $m_m_m[3]+$m_p_m[3];
                        }
                        elseif(count($temp[7][4]) <= (count($temp[5][4]))){
                          $x = $im_m[3] + $m_m_m[3]+$m_p_m[3];
                        }
                          for ($i=1; $i<=$x ; $i++) {?>
                            <div>
                              <input type="checkbox" value="0">
                              <label class="placeholder">a</label>
                            </div>
                            <?php
                          }
                      }
                    }?>
                </fieldset>
                <!-- Dodatki -->
                <fieldset id="Optional_mac">
                  <h2>Dodatki</h2>
                  <div>
                    <input type="checkbox" id="5-1iMP" name="Optional_mac" value="<?php echo $temp[5][5][78]['price']; ?>">
                    <label for="5-1iMP"><?php echo $temp[5][5][78]['name']; ?></label>
                  </div>
                </fieldset>
            </form>
            <form class="mac_form_mobile" action="" method="post">
              <!-- PROCESORY -->
                <fieldset id="PROCESORY_mobile">
                  <div><legend><h2>Procesor</h2></legend></div>
                  <select class="select_mobile" name="Procesor">
                    <?php if(isset($temp[5][1])){foreach ($temp[5][1] as $k => $v) {?>
                      <option data-score="<?php echo $v['score'];?>" value="<?php echo $v['price'];?>"><?php echo $v['name'];?></option>
                    <?php }}?>
                  </select>
                </fieldset>
                <!-- KARTY GRAFICZNE -->
                <fieldset id="Grafika_mobile">
                  <div><legend><h2>Karta Graficzna</h2></legend></div>
                  <select class="select_mobile" name="Grafika">
                    <?php if(isset($temp[5][2])){foreach ($temp[5][2] as $k => $v) {?>
                      <option data-score="<?php echo $v['score'];?>" value="<?php echo $v['price'];?>"><?php echo $v['name'];?></option>
                    <?php }}?>
                  </select>
                </fieldset>
                <!-- RAM -->
                <fieldset id="RAM_mobile">
                  <div><legend><h2>Pamięć RAM</h2></legend></div>
                  <select class="select_mobile" name="RAM">
                    <?php if(isset($temp[5][3])){foreach ($temp[5][3] as $k => $v) {?>
                      <option data-score="<?php echo $v['score'];?>" value="<?php echo $v['price'];?>"><?php echo $v['name'];?></option>
                    <?php }}?>
                  </select>
                </fieldset>
                <!-- Pamięć masowa -->
                <fieldset id="Pamiec_mobile">
                  <div><legend><h2>Pamięć masowa</h2></legend></div>
                  <select class="select_mobile" name="Pamiec">
                    <?php if(isset($temp[5][4])){foreach ($temp[5][4] as $k => $v) {?>
                      <option data-score="<?php echo $v['score'];?>" value="<?php echo $v['price'];?>"><?php echo $v['name'];?></option>
                    <?php }}?>
                  </select>
                  <div>
                    <input type="checkbox" id="5-2iMP_m" name="Optional_mac" value="<?php echo $temp[5][5][76]['price']; ?>">
                    <label for="5-2iMP_m">
                      <?php echo $temp[5][5][76]['name']; ?>
                      <!--<select class="hide" id="mac_selectM">
                         <option class="mac_option active" value="1">1</option>
                         <option class="mac_option" value="2">2</option>
                         <option class="mac_option" value="3">3</option>
                         <option class="mac_option" value="4">4</option>
                      </select>-->
                    </label>
                  </div>
                  <div>
                    <input type="checkbox" id="5-3iMP_m" name="Optional_mac" value="<?php echo $temp[5][5][77]['price']; ?>">
                    <label for="5-3iMP_m"><?php echo $temp[5][5][77]['name']; ?></label>
                  </div>
                  <div style="margin-bottom:21%;"></div>
                </fieldset>
                <!-- Dodatki -->
                <fieldset id="Optional">
                  <div><legend><h2>Dodatki</h2></legend></div>
                  <div>
                    <input class="mobile_check" type="checkbox" id="5-1iMP_m" name="Optional_mac" value="<?php echo $temp[5][5][78]['price']; ?>">
                    <label class="mobile_label" for="5-1iMP_m"><?php echo $temp[5][5][78]['name']; ?></label>
                  </div>
                  <!--<div>
                    <input type="checkbox" id="5-3i" name="Grafika" value="0">
                    <label for="5-3i">Dodatkowy Dysk SSD 2.5'</label>
                  </div>
                  <div>
                    <input type="checkbox" id="5-4i" name="Grafika" value="0">
                    <label for="5-4i">Dodatkowy Dysk SSD M.2'</label>
                  </div>-->
                  <!--<div>
                    <input type="checkbox" id="5-6i" name="Grafika" value="0">
                    <label for="5-6i">Wi-Fi + Bluetooth</label>
                  </div>-->
              </fieldset>
            </form>
          </div>
        </div>
      </div>
      <!-- END iMac Pro config -->
        <!-- START Mac mini config -->
          <div class="container" id="Mac_mini">
            <div class="title"><h2 class="title"><?php echo $temp2[2][4]['name']; ?></h2></div>
            <div class="container_top">
              <div class="container_img">
                <img class="" id="Mac-mini_thumb" src="img/<?php echo $temp2[2][4]['image']; ?>" alt="">
                <img class="image hide music_card MMm Mm" src="img/karta_muzyczna — Mac_mini.png" alt="">
                <img class="image hard_drive hide drive_1 DMm Mm" src="img/dysk — Mac_mini.png" alt="">
                <img class="image hard_drive hide drive_2 Mm" src="img/dysk — Mac_mini.png" alt="">
                <img class="image hard_drive hide drive_3 Mm" src="img/dysk — Mac_mini.png" alt="">
                <img class="image hard_drive hide drive_4 Mm" src="img/dysk — Mac_mini.png" alt="">
                <img class="image hide g-drive gMm Mm" src="img/G-drive — Mac_mini.png" alt="">
                <img class="image hide rx580 Mmrx Mm" src="img/eGPU RX580 — Mac_mini.png" alt="">
                <img class="image kable hide kable_1 kMm Mm" src="img/Kable — Mac_mini.png" alt="">
                <img class="image kable hide kable_2 k2Mm Mm" src="img/Kable — Mac_mini.png" alt="">
              </div>
              <h3 class="price" data-price="<?php echo $temp2[2][4]['org_price']; ?>" id="mac_priceMm"><?php echo $temp2[2][4]['org_price']; ?> zł</h3>
            </div>
            <div class="container_form">
              <form class="mac_form" method="post">
                <!-- PROCESORY -->
                <fieldset id="Procesor_mac Mm">
                  <div><legend><h2>Procesor</h2></legend></div>
                  <?php $i = 1; if(isset($temp[4][1])){foreach ($temp[4][1] as $k => $v) {?>
                    <div>
                      <input type="radio" id="<?php echo '1-'.$i.'Mm';?>" name="Procesor" value="<?php echo $v['price']; ?>" <?php if($i == 1){echo 'checked';}?>>
                      <label for="<?php echo '1-'.$i.'Mm';?>" data-score="<?php echo $v['score'];?>"><?php echo $v['name'];?></label>
                    </div>
                  <?php $i++;}?>
                  <?php
                  if($_GET['id']==1){
                    $x = 0;
                    if(count($temp[1][1]) > (count($temp[4][1]))){
                      $x = (count($temp[1][1]) - count($temp[4][1])) + $im[0] + $im_p[0]+$m_p[0];
                    }
                    elseif(count($temp[1][1]) <= (count($temp[4][1]))){
                      $x = $im[0] + $im_p[0]+$m_p[0];
                    }
                      for ($i=1; $i<=$x ; $i++) {?>
                        <div>
                          <input type="checkbox" value="0">
                          <label class="placeholder">a</label>
                        </div>
                        <?php
                      }}elseif($_GET['id'] <= 0){
                        $x = 0;
                        if(count($temp[6][1]) > (count($temp[4][1]))){
                          $x = (count($temp[6][1]) - count($temp[4][1])) + $im_t[0] + $im_p_t[0]+$m_p_t[0];
                        }
                        elseif(count($temp[6][1]) <= (count($temp[4][1]))){
                          $x = $im_t[0] + $im_p_t[0]+$m_p_t[0];
                        }
                          for ($i=1; $i<=$x ; $i++) {?>
                            <div>
                              <input type="checkbox" value="0">
                              <label class="placeholder">a</label>
                            </div>
                            <?php
                          }
                      }else{
                        $x = 0;
                        if(count($temp[7][1]) > (count($temp[4][1]))){
                          $x = (count($temp[7][1]) - count($temp[4][1])) + $im_m[0] + $im_p_m[0]+$m_p_m[0];
                        }
                        elseif(count($temp[7][1]) <= (count($temp[4][1]))){
                          $x = $im_m[0] + $im_p_m[0]+$m_p_m[0];
                        }
                          for ($i=1; $i<=$x ; $i++) {?>
                            <div>
                              <input type="checkbox" value="0">
                              <label class="placeholder">a</label>
                            </div>
                            <?php
                          }
                      }
                    }?>
                </fieldset>
                <!-- KARTY GRAFICZNE -->
                <fieldset id="Grafika_mac Mm">
                  <div><legend><h2>Karta Graficzna</h2></legend></div>
                  <?php $i = 1; if(isset($temp[4][2])){foreach ($temp[4][2] as $k => $v) {?>
                    <div>
                      <input type="radio" data-name="<?php echo $v['name'];?>" id="<?php echo '2-'.$i.'Mm';?>" name="Grafika" value="<?php echo $v['price']; ?>" <?php if($i == 1){echo 'checked';}?>>
                      <label for="<?php echo '2-'.$i.'Mm';?>" data-score="<?php echo $v['score'];?>"><?php echo $v['name'];?></label>
                    </div>
                  <?php $i++;}?>
                  <?php
                  if($_GET['id']==1){
                    $x = 0;
                    if(count($temp[1][2]) > (count($temp[4][2]))){
                      $x = (count($temp[1][2]) - count($temp[4][2])) + $im[1] + $im_p[1]+$m_p[1];
                    }
                    elseif(count($temp[1][2]) <= (count($temp[4][2]))){
                      $x = $im[1] + $im_p[1]+$m_p[1];
                    }
                      for ($i=1; $i<=$x ; $i++) {?>
                        <div>
                          <input type="checkbox" value="0">
                          <label class="placeholder">a</label>
                        </div>
                        <?php
                      }}elseif($_GET['id'] <= 0){
                        $x = 0;
                        if(count($temp[6][2]) > (count($temp[4][2]))){
                          $x = (count($temp[6][2]) - count($temp[4][2])) + $im_t[1] + $im_p_t[1]+$m_p_t[1];
                        }
                        elseif(count($temp[6][2]) <= (count($temp[4][2]))){
                          $x = $im_t[1] + $im_p_t[1]+$m_p_t[1];
                        }
                          for ($i=1; $i<=$x ; $i++) {?>
                            <div>
                              <input type="checkbox" value="0">
                              <label class="placeholder">a</label>
                            </div>
                            <?php
                          }
                      }else{
                        $x = 0;
                        if(count($temp[7][2]) > (count($temp[4][2]))){
                          $x = (count($temp[7][2]) - count($temp[4][2])) + $im_m[1] + $im_p_m[1]+$m_p_m[1];
                        }
                        elseif(count($temp[7][2]) <= (count($temp[4][2]))){
                          $x = $im_m[1] + $im_p_m[1]+$m_p_m[1];
                        }
                          for ($i=1; $i<=$x ; $i++) {?>
                            <div>
                              <input type="checkbox" value="0">
                              <label class="placeholder">a</label>
                            </div>
                            <?php
                          }
                      }
                    }?>
                </fieldset>
                <!-- RAM -->
                <fieldset id="RAM_mac">
                  <div><legend><h2>Pamięć RAM</h2></legend></div>
                  <?php $i = 1; if(isset($temp[4][3])){foreach ($temp[4][3] as $k => $v) {?>
                    <div>
                      <input type="radio" id="<?php echo '3-'.$i.'Mm';?>" name="RAM" value="<?php echo $v['price']; ?>" <?php if($i == 1){echo 'checked';}?>>
                      <label for="<?php echo '3-'.$i.'Mm';?>" data-score="<?php echo $v['score'];?>"><?php echo $v['name'];?></label>
                    </div>
                  <?php $i++;}?>
                  <?php
                  if($_GET['id']==1){
                    $x = 0;
                    if(count($temp[1][3]) > (count($temp[4][3]))){
                      $x = (count($temp[1][3]) - count($temp[4][3])) + $im[2] + $im_p[2]+$m_p[2];
                    }
                    elseif(count($temp[1][3]) <= (count($temp[4][3]))){
                      $x = $im[2] + $im_p[2]+$m_p[2];
                    }
                      for ($i=1; $i<=$x ; $i++) {?>
                        <div>
                          <input type="checkbox" value="0">
                          <label class="placeholder">a</label>
                        </div>
                        <?php
                      }}elseif($_GET['id'] <= 0){
                        $x = 0;
                        if(count($temp[6][3]) > (count($temp[4][3]))){
                          $x = (count($temp[6][3]) - count($temp[4][3])) + $im_t[2] + $im_p_t[2]+$m_p_t[2];
                        }
                        elseif(count($temp[6][3]) <= (count($temp[4][3]))){
                          $x = $im_t[2] + $im_p_t[2]+$m_p_t[2];
                        }
                          for ($i=1; $i<=$x ; $i++) {?>
                            <div>
                              <input type="checkbox" value="0">
                              <label class="placeholder">a</label>
                            </div>
                            <?php
                          }
                      }else{
                        $x = 0;
                        if(count($temp[7][3]) > (count($temp[4][3]))){
                          $x = (count($temp[7][3]) - count($temp[4][3])) + $im_m[2] + $im_p_m[2]+$m_p_m[2];
                        }
                        elseif(count($temp[7][3]) <= (count($temp[4][3]))){
                          $x = $im_m[2] + $im_p_m[2]+$m_p_m[2];
                        }
                          for ($i=1; $i<=$x ; $i++) {?>
                            <div>
                              <input type="checkbox" value="0">
                              <label class="placeholder">a</label>
                            </div>
                            <?php
                          }
                      }
                    }?>
                </fieldset>
                <!-- Pamięć masowa -->
                <fieldset id="Pamiec_mac">
                  <div><legend><h2>Pamięć masowa</h2></legend></div>
                  <?php $i = 1; if(isset($temp[4][4])){foreach ($temp[4][4] as $k => $v) {?>
                    <div>
                      <input type="radio" id="<?php echo '4-'.$i.'Mm';?>" name="Pamiec" value="<?php echo $v['price']; ?>" <?php if($i == 1){echo 'checked';}?>>
                      <label for="<?php echo '4-'.$i.'Mm';?>" data-score="<?php echo $v['score'];?>"><?php echo $v['name'];?></label>
                    </div>
                  <?php $i++;}?>
                  <div>
                    <input type="checkbox" id="5-2Mm" name="Optional_mac" value="<?php echo $temp[4][5][72]['price']; ?>">
                    <label for="5-2Mm">
                      <?php echo $temp[4][5][72]['name']; ?>
                      <!--<select class="hide" id="mac_selectMm">
                         <option class="mac_option active" value="1">1</option>
                         <option class="mac_option" value="2">2</option>
                         <option class="mac_option" value="3">3</option>
                         <option class="mac_option" value="4">4</option>
                      </select>-->
                    </label>
                  </div>
                  <div>
                    <input type="checkbox" id="5-3Mm" name="Optional_mac" value="<?php echo $temp[4][5][73]['price']; ?>">
                    <label for="5-3Mm"><?php echo $temp[4][5][73]['name']; ?></label>
                  </div>
                  <div style="margin-bottom:17%;"></div>
                  <?php
                  if($_GET['id']==1){
                    $x = 0;
                    if(count($temp[1][4]) > (count($temp[4][4]))){
                      $x = (count($temp[1][4]) - count($temp[4][4])) + $im[3] + $im_p[3]+$m_p[3];
                    }
                    elseif(count($temp[1][4]) <= (count($temp[4][4]))){
                      $x = $im[3] + $im_p[3]+$m_p[3];
                    }
                      for ($i=1; $i<=$x ; $i++) {?>
                        <div>
                          <input type="checkbox" value="0">
                          <label class="placeholder">a</label>
                        </div>
                        <?php
                      }}elseif($_GET['id'] <= 0){
                        $x = 0;
                        if(count($temp[6][4]) > (count($temp[4][4]))){
                          $x = (count($temp[6][4]) - count($temp[4][4])) + $im_t[3] + $im_p_t[3]+$m_p_t[3];
                        }
                        elseif(count($temp[6][4]) <= (count($temp[4][4]))){
                          $x = $im_t[3] + $im_p_t[3]+$m_p_t[3];
                        }
                          for ($i=1; $i<=$x ; $i++) {?>
                            <div>
                              <input type="checkbox" value="0">
                              <label class="placeholder">a</label>
                            </div>
                            <?php
                          }
                      }else{
                        $x = 0;
                        if(count($temp[7][4]) > (count($temp[4][4]))){
                          $x = (count($temp[7][4]) - count($temp[4][4])) + $im_m[3] + $im_p_m[3]+$m_p_m[3];
                        }
                        elseif(count($temp[7][4]) <= (count($temp[4][4]))){
                          $x = $im_m[3] + $im_p_m[3]+$m_p_m[3];
                        }
                          for ($i=1; $i<=$x ; $i++) {?>
                            <div>
                              <input type="checkbox" value="0">
                              <label class="placeholder">a</label>
                            </div>
                            <?php
                          }
                      }
                    }?>
                </fieldset>
                <!-- Dodatki -->
                <fieldset id="Optional_mac">
                  <h2>Dodatki</h2>
                  <div>
                    <input type="checkbox" id="5-1Mm" name="Optional_mac" value="<?php echo $temp[4][5][74]['price']; ?>">
                    <label for="5-1Mm"><?php echo $temp[4][5][74]['name']; ?></label>
                  </div>
                </fieldset>
              </form>
              <form class="mac_form_mobile" action="" method="post">
                <div>
                  <!-- PROCESORY -->
                    <fieldset id="PROCESORY_mobile">
                      <div><legend><h2>Procesor</h2></legend></div>
                      <select class="select_mobile" name="Procesor">
                        <?php if(isset($temp[4][1])){foreach ($temp[4][1] as $k => $v) {?>
                          <option data-score="<?php echo $v['score'];?>" value="<?php echo $v['price'];?>"><?php echo $v['name'];?></option>
                        <?php }}?>
                      </select>
                    </fieldset>
                    <!-- KARTY GRAFICZNE -->
                    <fieldset id="Grafika_mobile">
                      <div><legend><h2>Karta Graficzna</h2></legend></div>
                      <select class="select_mobile" name="Grafika">
                        <?php if(isset($temp[4][2])){foreach ($temp[4][2] as $k => $v) {?>
                          <option data-score="<?php echo $v['score'];?>" value="<?php echo $v['price'];?>"><?php echo $v['name'];?></option>
                        <?php }}?>
                      </select>
                    </fieldset>
                    <!-- RAM -->
                    <fieldset id="RAM_mobile">
                      <div><legend><h2>Pamięć RAM</h2></legend></div>
                      <select class="select_mobile" name="RAM">
                        <?php if(isset($temp[4][3])){foreach ($temp[4][3] as $k => $v) {?>
                          <option data-score="<?php echo $v['score'];?>" value="<?php echo $v['price'];?>"><?php echo $v['name'];?></option>
                        <?php }}?>
                      </select>
                    </fieldset>
                  </div>
                  <!-- Pamięć masowa -->
                  <div>
                    <fieldset id="Pamiec_mobile">
                      <div><legend><h2>Pamięć masowa</h2></legend></div>
                      <select class="select_mobile" name="Pamiec">
                        <?php if(isset($temp[1][1])){foreach ($temp[4][4] as $k => $v) {?>
                          <option data-score="<?php echo $v['score'];?>" value="<?php echo $v['price'];?>"><?php echo $v['name'];?></option>
                        <?php }}?>
                      </select>
                      <div>
                        <input type="checkbox" id="5-2Mm" name="Optional_mac" value="<?php echo $temp[4][5][72]['price']; ?>">
                        <label for="5-2Mm">
                          <?php echo $temp[4][5][72]['name']; ?>
                          <!--<select class="hide" id="mac_selectM">
                             <option class="mac_option active" value="1">1</option>
                             <option class="mac_option" value="2">2</option>
                             <option class="mac_option" value="3">3</option>
                             <option class="mac_option" value="4">4</option>
                          </select>-->
                        </label>
                      </div>
                      <div>
                        <input type="checkbox" id="5-3Mm" name="Optional_mac" value="<?php echo $temp[4][5][73]['price']; ?>">
                        <label for="5-3Mm"><?php echo $temp[4][5][73]['name']; ?></label>
                      </div>
                      <div style="margin-bottom:21%;"></div>
                    </fieldset>
                    <!-- Dodatki -->
                    <fieldset id="Optional">
                      <div><legend><h2>Dodatki</h2></legend></div>
                      <div>
                        <input class="mobile_check" type="checkbox" id="5-1Mm" name="Optional_mac" value="<?php echo $temp[4][5][74]['price']; ?>">
                        <label class="mobile_label" for="5-1Mm"><?php echo $temp[4][5][74]['name']; ?></label>
                      </div>
                      <!--<div>
                        <input type="checkbox" id="5-3i" name="Grafika" value="0">
                        <label for="5-3i">Dodatkowy Dysk SSD 2.5'</label>
                      </div>
                      <div>
                        <input type="checkbox" id="5-4i" name="Grafika" value="0">
                        <label for="5-4i">Dodatkowy Dysk SSD M.2'</label>
                      </div>-->
                      <!--<div>
                        <input type="checkbox" id="5-6i" name="Grafika" value="0">
                        <label for="5-6i">Wi-Fi + Bluetooth</label>
                      </div>-->
                  </fieldset>
              </form>
            </div>
        </div>
      </div>
      <!-- END Mac mini config -->
      <div id="stop_scroll" class="clearfix"></div>
      <!-- START Benchmark -->
      <div id="chart_div"></div>
      <!-- END Benchmark -->
    </section>
  </body>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/loader.js"></script>
  <script type="text/javascript" src="js/config.js"></script>
</html>
