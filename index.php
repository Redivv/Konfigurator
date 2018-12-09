<!DOCTYPE html>
  <?php
  include ('php_files/db_conn.php');
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
    <title>Konfigurator-test</title>
    <link rel="stylesheet" href="css/config.css">
    <link href="css/roboto.css" rel="stylesheet">
  </head>
  <body>
    <section class="tabs">
      <button id="btn_M" class="active_btn" type="button" name="M"><?php echo $temp2[2][2]['name']; ?></button>
      <button id="btn_iM" type="button" name="iM"><?php echo $temp2[2][3]['name']; ?></button>
      <button id="btn_Mm" type="button" name="Mm"><?php echo $temp2[2][4]['name']; ?></button>
    </section>
    <section class="config">
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
          <form class="iroN" method="post">
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
            }
              ?>
            </fieldset>
            <!-- RAM -->
            <fieldset id="RAM">
              <div><legend><h2>Pamięc RAM</h2></legend></div>
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
            }
              ?>
            </fieldset>
              <!-- Pamięc masowa -->
              <fieldset id="Pamiec">
                <div><legend><h2>Pamięc masowa</h2></legend></div>
                <?php $i = 1;if(isset($temp[1][4])){ foreach ($temp[1][4] as $k => $v) {?>
                  <div>
                    <input type="radio" id="<?php echo '4-'.$i.'i';?>" name="Pamiec" value="<?php echo $v['price']; ?>" <?php if($i == 1){echo 'checked';}?>>
                    <label for="<?php echo '4-'.$i.'i';?>" data-score="<?php echo $v['score'];?>"><?php echo $v['name'];?></label>
                  </div>
                <?php $i++;}?>
                <div>
                  <input type="checkbox" value="0">
                  <label class="placeholder">a</label>
                </div>
                <div>
                  <input type="checkbox" value="0">
                  <label class="placeholder">a</label>
                </div>
                <?php
                $m_p[3] = 0;
                $im[3] = 0;
                $m_m[3] = 0;
                if(count($temp[1][4]) < (count($temp[2][4]))){
                  $x = count($temp[2][4]) - count($temp[1][4]) ;
                  for ($i=1; $i<=$x ; $i++) {
                    $m_p[3] = $i;?>
                    <div>
                      <input type="checkbox" value="0">
                      <label class="placeholder">a</label>
                    </div>
                    <?php
                  }
                }
                if(count($temp[1][4]) < (count($temp[3][4]))){
                  $x = count($temp[3][4]) - count($temp[1][4]) ;
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
                  $x = count($temp[4][4]) - count($temp[1][4]) ;
                  for ($i=1; $i<=$x ; $i++) {
                    $m_m[3] = $i;?>
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
              <!-- Dodatki -->
              <fieldset id="Optional">
                <div><legend><h2>Dodatki</h2></legend></div>
                <div>
                  <input type="checkbox" id="5-1i" name="Optional" value="0">
                  <label for="5-1i">Karta muzyczna PCIe</label>
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
                  <input type="checkbox" id="5-5i" name="Grafika" value="0">
                  <label for="5-5i">Kontroler Thunderbolt 3 </label>
                </div>
                <!--<div>
                  <input type="checkbox" id="5-6i" name="Grafika" value="0">
                  <label for="5-6i">Wi-Fi + Bluetooth</label>
                </div>-->
            </fieldset>
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
              <div id="separator_i_m_1" style="margin-top:31.4%;"></div>
              <!-- RAM -->
              <fieldset id="RAM">
                <div><legend><h2>Pamięc RAM</h2></legend></div>
                <select class="select_mobile" name="RAM">
                  <?php if(isset($temp[1][3])){foreach ($temp[1][3] as $k => $v) {?>
                    <option data-score="<?php echo $v['score'];?>" value="<?php echo $v['price'];?>"><?php echo $v['name'];?></option>
                  <?php }}?>
                </select>
              </fieldset>
              <!-- Pamięc masowa -->
              <fieldset id="Pamiec">
                <div><legend><h2>Pamięc masowa</h2></legend></div>
                <select class="select_mobile" name="Pamiec">
                  <?php if(isset($temp[1][4])){foreach ($temp[1][4] as $k => $v) {?>
                    <option data-score="<?php echo $v['score'];?>" value="<?php echo $v['price'];?>"><?php echo $v['name'];?></option>
                  <?php }}?>
                </select>
                <div>
                  <input class="mobile_check" type="checkbox" id="5-2i_m" name="Optional" value="320">
                  <label class="mobile_label" for="5-2i_m">Dysk HDD</label>
                </div>
              </fieldset>
              <div id="separator_i_m_2" style="margin-top:26.8%;"></div>
              <!-- Dodatki -->
              <fieldset id="Optional">
                <div><legend><h2>Dodatki</h2></legend></div>
                  <input class="mobile_check" type="checkbox" id="5-1i_m" name="Optional" value="0">
                  <label class="mobile_label" for="5-1i_m">Karta muzyczna PCIe</label>
                <!--<div>
                  <input type="checkbox" id="5-3i" name="Grafika" value="0">
                  <label for="5-3i">Dodatkowy Dysk SSD 2.5'</label>
                </div>
                <div>
                  <input type="checkbox" id="5-4i" name="Grafika" value="0">
                  <label for="5-4i">Dodatkowy Dysk SSD M.2'</label>
                </div>-->
                  <input class="mobile_check" type="checkbox" id="5-5i_m" name="Grafika" value="0">
                  <label class="mobile_label" for="5-5i_m">Kontroler Thunderbolt 3 </label>
                <!--<div>
                  <input type="checkbox" id="5-6i" name="Grafika" value="0">
                  <label for="5-6i">Wi-Fi + Bluetooth</label>
                </div>-->
            </fieldset>
          </form>
        </div>
      </div>
      <!-- END iroN config -->

      <!-- START Mac Pro config -->
        <div class="container" id="Mac_Pro">
          <div class="title"><h2 class="title"><?php echo $temp2[2][2]['name']; ?></h2></div>
          <div id="mac_cont" class="container_top M">
            <div class="container_img img_M">
              <img class="" id="Mac_thumb" src="img/<?php echo $temp2[2][2]['image']; ?>" alt="">
              <img class="image hide music_card M" src="img/karta_muzyczna.png" alt="">
              <img class="image hard_drive hide drive_1 M" src="img/dysk.png" alt="">
              <img class="image hard_drive hide drive_2 M" src="img/dysk.png" alt="">
              <img class="image hard_drive hide drive_3 M" src="img/dysk.png" alt="">
              <img class="image hard_drive hide drive_4 M" src="img/dysk.png" alt="">
              <img class="image hide g-drive M" src="img/G-drive.png" alt="">
              <img class="image hide rx580 M" src="img/eGPU RX580.png" alt="">
              <img class="image kable hide kable_1 M" src="img/kable.png" alt="">
              <img class="image kable hide kable_2 M" src="img/Kable.png" alt="">
            </div>
            <h3 class="price" data-price="14300" id="mac_priceM"><?php echo $temp2[2][2]['org_price']; ?> zł</h3>
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
                  $x = 0;
                  if(count($temp[1][1]) > (count($temp[2][1]))){
                    $x = (count($temp[1][1]) - count($temp[2][1])) + $im[0] + $m_m[0];
                  }
                  elseif(count($temp[1][1]) == (count($temp[2][1]))){
                    $x = $im[0] + $m_m[0];
                  }
                    for ($i=1; $i<=$x ; $i++) {?>
                      <div>
                        <input type="checkbox" value="0">
                        <label class="placeholder">a</label>
                      </div>
                      <?php
                    }}?>
                </fieldset>
                <!-- KARTY GRAFICZNE -->
                <fieldset id="Grafika_mac">
                  <div><legend><h2>Karta Graficzna</h2></legend></div>
                  <?php $i = 1; if(isset($temp[2][2])){foreach ($temp[2][2] as $k => $v) {?>
                    <div>
                      <input type="radio" id="<?php echo '2-'.$i;?>" name="Grafika" value="<?php echo $v['price']; ?>" <?php if($i == 1){echo 'checked';}?>>
                      <label for="<?php echo '2-'.$i;?>" data-score="<?php echo $v['score'];?>"><?php echo $v['name'];?></label>
                    </div>
                  <?php $i++;}?>
                  <?php
                  $x = 0;
                  if(count($temp[1][2]) > (count($temp[2][2]))){
                    $x = (count($temp[1][2]) - count($temp[2][2])) + $im[1] + $m_m[1];
                  }
                  elseif(count($temp[1][2]) == (count($temp[2][2]))){
                    $x = $im[1] + $m_m[1];
                  }
                    for ($i=1; $i<=$x ; $i++) {?>
                      <div>
                        <input type="checkbox" value="0">
                        <label class="placeholder">a</label>
                      </div>
                      <?php
                    }}?>
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
                  $x = 0;
                  if(count($temp[1][3]) > (count($temp[2][3]))){
                    $x = (count($temp[1][3]) - count($temp[2][3])) + $im[2] + $m_m[2];
                  }
                  elseif(count($temp[1][3]) == (count($temp[2][3]))){
                    $x = $im[2] + $m_m[2];
                  }
                    for ($i=1; $i<=$x ; $i++) {?>
                      <div>
                        <input type="checkbox" value="0">
                        <label class="placeholder">a</label>
                      </div>
                      <?php
                    }}?>
                </fieldset>
              <!-- Pamięc masowa -->
                <fieldset id="Pamiec_mac">
                  <div><legend><h2>Pamięć masowa</h2></legend></div>
                  <?php $i = 1; if(isset($temp[2][4])){foreach ($temp[2][4] as $k => $v) {?>
                    <div>
                      <input type="radio" id="<?php echo '4-'.$i;?>" name="Pamiec" value="<?php echo $v['price']; ?>" <?php if($i == 1){echo 'checked';}?>>
                      <label for="<?php echo '4-'.$i;?>" data-score="<?php echo $v['score'];?>"><?php echo $v['name'];?></label>
                    </div>
                  <?php $i++;}?>
                  <div>
                    <input type="checkbox" id="5-2M" name="Optional_mac" value="320">
                    <label for="5-2M">
                      Dysk HDD 1TB
                      <!--<select class="hide" id="mac_selectM">
                         <option class="mac_option active" value="1">1</option>
                         <option class="mac_option" value="2">2</option>
                         <option class="mac_option" value="3">3</option>
                         <option class="mac_option" value="4">4</option>
                      </select>-->
                    </label>
                  </div>
                  <div>
                    <input type="checkbox" id="5-3M" name="Optional_mac" value="1330">
                    <label for="5-3M">G-drive 4TB</label>
                  </div>
                  <?php
                  $x = 0;
                  if(count($temp[1][4]) > (count($temp[2][4]))){
                    $x = (count($temp[1][4]) - count($temp[2][4])) + $im[3] + $m_m[3];
                  }
                  elseif(count($temp[1][4]) == (count($temp[2][4]))){
                    $x = $im[3] + $m_m[3];
                  }
                    for ($i=1; $i<=$x ; $i++) {?>
                      <div>
                        <input type="checkbox" value="0">
                        <label class="placeholder">a</label>
                      </div>
                      <?php
                    }}?>
                </fieldset>
                <!-- Dodatki -->
                <fieldset id="Optional_mac">
                  <div><legend><h2>Dodatki</h2></legend></div>
                  <div>
                    <input type="checkbox" id="5-1M" name="Optional_mac" value="0">
                    <label for="5-1M">Karta muzyczna</label>
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
                      <option data-score="<?php echo $v['score'];?>" value="<?php echo $v['price'];?>"><?php echo $v['name'];?></option>
                    <?php }}?>
                  </select>
                  <input class="mobile_check" type="checkbox" id="5-4M_m" name="Optional_mac" value="5890">
                  <label class="mobile_label hide" for="5-4M_m">eGPU RX580</label>
                </fieldset>
                <!-- RAM -->
                <fieldset id="RAM_mobile">
                  <div><legend><h2>Pamięc RAM</h2></legend></div>
                  <select class="select_mobile" name="RAM">
                    <?php if(isset($temp[2][3])){foreach ($temp[2][3] as $k => $v) {?>
                      <option data-score="<?php echo $v['score'];?>" value="<?php echo $v['price'];?>"><?php echo $v['name'];?></option>
                    <?php }}?>
                  </select>
                </fieldset>
                <!-- Pamięc masowa -->
                <fieldset id="Pamiec_mobile">
                  <div><legend><h2>Pamięc masowa</h2></legend></div>
                  <select class="select_mobile" name="Pamiec">
                    <?php if(isset($temp[2][4])){foreach ($temp[2][4] as $k => $v) {?>
                      <option data-score="<?php echo $v['score'];?>" value="<?php echo $v['price'];?>"><?php echo $v['name'];?></option>
                    <?php }}?>
                  </select>
                  <div>
                    <input type="checkbox" id="5-2M_m" name="Optional_mac" value="320">
                    <label for="5-2M_m">
                      Dysk HDD 1 TB
                      <!--<select class="hide" id="mac_selectM">
                         <option class="mac_option active" value="1">1</option>
                         <option class="mac_option" value="2">2</option>
                         <option class="mac_option" value="3">3</option>
                         <option class="mac_option" value="4">4</option>
                      </select>-->
                    </label>
                  </div>
                  <div>
                    <input type="checkbox" id="5-3M_m" name="Optional_mac" value="1330">
                    <label for="5-3M_m">G-drive 4 TB</label>
                  </div>
                </fieldset>
                <!-- Dodatki -->
                <fieldset id="Optional">
                  <div><legend><h2>Dodatki</h2></legend></div>
                  <div>
                    <input class="mobile_check" type="checkbox" id="5-1M_m" name="Optional_mac" value="0">
                    <label class="mobile_label" for="5-1M_m">Karta muzyczna</label>
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
                <img class="image hide music_card MiM iM" src="img/karta_muzyczna.png" alt="">
                <img class="image hard_drive hide drive_1 DiM iM" src="img/dysk.png" alt="">
                <img class="image hard_drive hide drive_2 iM" src="img/dysk.png" alt="">
                <img class="image hard_drive hide drive_3 iM" src="img/dysk.png" alt="">
                <img class="image hard_drive hide drive_4 iM" src="img/dysk.png" alt="">
                <img class="image hide g-drive giM iM" src="img/G-drive.png" alt="">
                <img class="image hide rx580 iMrx iM" src="img/eGPU RX580.png" alt="">
                <img class="image kable hide kable_1 kiM iM" src="img/kable.png" alt="">
                <img class="image kable hide kable_2 k2iM iM" src="img/Kable.png" alt="">
              </div>
              <h3 class="price" data-price="7460" id="mac_priceiM"><?php echo $temp2[2][3]['org_price']; ?> zł</h3>
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
                    $x = 0;
                    if(count($temp[1][1]) > (count($temp[3][1]))){
                      $x = (count($temp[1][1]) - count($temp[3][1])) + $m_p[0] + $m_m[0];
                    }
                    elseif(count($temp[1][1]) == (count($temp[3][1]))){
                      $x = $m_p[0] + $m_m[0];
                    }
                      for ($i=1; $i<=$x ; $i++) {?>
                        <div>
                          <input type="checkbox" value="0">
                          <label class="placeholder">a</label>
                        </div>
                        <?php
                      }}?>
                  </fieldset>
                  <!-- KARTY GRAFICZNE -->
                  <fieldset id="Grafika_mac">
                    <div><legend><h2>Karta Graficzna</h2></legend></div>
                    <?php $i = 1; if(isset($temp[3][2])){foreach ($temp[3][2] as $k => $v) {?>
                      <div>
                        <input type="radio" id="<?php echo '2-'.$i.'iM';?>" name="Grafika" value="<?php echo $v['price']; ?>" <?php if($i == 1){echo 'checked';}?>>
                        <label for="<?php echo '2-'.$i.'iM';?>" data-score="<?php echo $v['score'];?>"><?php echo $v['name'];?></label>
                      </div>
                    <?php $i++;}?>
                    <?php
                    $x = 0;
                    if(count($temp[1][2]) > (count($temp[3][2]))){
                      $x = (count($temp[1][2]) - count($temp[3][2])) + $m_p[1] + $m_m[1];
                    }
                    elseif(count($temp[1][2]) == (count($temp[3][2]))){
                      $x = $m_p[1] + $m_m[1];
                    }
                      for ($i=1; $i<=$x ; $i++) {?>
                        <div>
                          <input type="checkbox" value="0">
                          <label class="placeholder">a</label>
                        </div>
                        <?php
                      }}?>
                  </fieldset>
                  <!-- RAM -->
                  <fieldset id="RAM_mac">
                    <div><legend><h2>Pamięc RAM</h2></legend></div>
                    <?php $i = 1; if(isset($temp[3][3])){foreach ($temp[3][3] as $k => $v) {?>
                      <div>
                        <input type="radio" id="<?php echo '3-'.$i.'iM';?>" name="RAM" value="<?php echo $v['price']; ?>" <?php if($i == 1){echo 'checked';}?>>
                        <label for="<?php echo '3-'.$i.'iM';?>" data-score="<?php echo $v['score'];?>"><?php echo $v['name'];?></label>
                      </div>
                    <?php $i++;}?>
                    <?php
                    $x = 0;
                    if(count($temp[1][3]) > (count($temp[3][3]))){
                      $x = (count($temp[1][3]) - count($temp[3][3])) + $m_p[2] + $m_m[2];
                    }
                    elseif(count($temp[1][3]) == (count($temp[3][3]))){
                      $x = $m_p[2] + $m_m[2];
                    }
                      for ($i=1; $i<=$x ; $i++) {?>
                        <div>
                          <input type="checkbox" value="0">
                          <label class="placeholder">a</label>
                        </div>
                        <?php
                      }}?>
                  </fieldset>
                <!-- Pamięc masowa -->
                  <fieldset id="Pamiec_mac">
                    <div><legend><h2>Pamięc masowa</h2></legend></div>
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
                      <input type="checkbox" id="5-2iM" name="Optional_mac" value="320">
                      <label for="5-2iM">
                        Dysk HDD 1TB
                        <!--<select class="hide" id="mac_selectiM">
                           <option class="mac_option active" value="1">1</option>
                           <option class="mac_option" value="2">2</option>
                           <option class="mac_option" value="3">3</option>
                           <option class="mac_option" value="4">4</option>
                        </select>-->
                      </label>
                    <div>
                      <input type="checkbox" id="5-3iM" name="Optional_mac" value="1330">
                      <label for="5-3iM">Dysk G-drive 4TB</label>
                    </div>
                    <?php
                    $x = 0;
                    if(count($temp[1][4]) > (count($temp[3][4]))){
                      $x = (count($temp[1][4]) - count($temp[3][4])) + $m_p[3] + $m_m[3];
                    }
                    elseif(count($temp[1][4]) == (count($temp[3][4]))){
                      $x = $m_p[3] + $m_m[3];
                    }
                      for ($i=1; $i<=$x ; $i++) {?>
                        <div>
                          <input type="checkbox" value="0">
                          <label class="placeholder">a</label>
                        </div>
                        <?php
                      }}?>
                  </fieldset>
                  <!-- Dodatki -->
                  <fieldset id="Optional_mac">
                    <h2>Dodatki</h2>
                    <div>
                      <input type="checkbox" id="5-1iM" name="Optional_mac" value="0">
                      <label for="5-1iM">Karta muzyczna</label>
                    </div>
                  </fieldset>
              </form>
              <form class="mac_form_mobile" action="" method="post">
                <!-- PROCESORY -->
                  <fieldset id="PROCESORY_mobile">
                    <div><legend><h2>Procesor</h2></legend></div>
                    <select class="select_mobile" name="ProcesoriM">
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
                    <input class="mobile_check" type="checkbox" id="5-4iM_m" name="Optional_mac" value="5890">
                    <label class="mobile_label" for="5-4iM_m">eGPU RX580</label>
                  </fieldset>
                  <!-- RAM -->
                  <fieldset id="RAM_mobile">
                    <div><legend><h2>Pamięc RAM</h2></legend></div>
                    <select class="select_mobile" name="RAM">
                      <?php if(isset($temp[3][3])){foreach ($temp[3][3] as $k => $v) {?>
                        <option data-score="<?php echo $v['score'];?>" value="<?php echo $v['price'];?>"><?php echo $v['name'];?></option>
                      <?php }}?>
                    </select>
                  </fieldset>
                  <!-- Pamięc masowa -->
                  <fieldset id="Pamiec_mobile">
                    <div><legend><h2>Pamięc masowa</h2></legend></div>
                    <select class="select_mobile" name="Pamiec">
                      <?php if(isset($temp[3][4])){foreach ($temp[3][4] as $k => $v) {?>
                        <option data-score="<?php echo $v['score'];?>" value="<?php echo $v['price'];?>"><?php echo $v['name'];?></option>
                      <?php }}?>
                    </select>
                    <div>
                      <input type="checkbox" id="5-2iM_m" name="Optional_mac" value="320">
                      <label for="5-2iM_m">
                        Dysk HDD 1 TB
                        <!--<select class="hide" id="mac_selectM">
                           <option class="mac_option active" value="1">1</option>
                           <option class="mac_option" value="2">2</option>
                           <option class="mac_option" value="3">3</option>
                           <option class="mac_option" value="4">4</option>
                        </select>-->
                      </label>
                    </div>
                    <div>
                      <input type="checkbox" id="5-3iM_m" name="Optional_mac" value="1330">
                      <label for="5-3iM_m">G-drive 4 TB</label>
                    </div>
                  </fieldset>
                  <!-- Dodatki -->
                  <fieldset id="Optional">
                    <div><legend><h2>Dodatki</h2></legend></div>
                    <div>
                      <input class="mobile_check" type="checkbox" id="5-1iM_m" name="Optional_mac" value="0">
                      <label class="mobile_label" for="5-1iM_m">Karta muzyczna</label>
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
        <!-- START Mac mini config -->
          <div class="container hide" id="Mac_mini">
            <div class="title"><h2 class="title"><?php echo $temp2[2][4]['name']; ?></h2></div>
            <div class="container_top">
              <div class="container_img">
                <img class="" id="Mac-mini_thumb" src="img/<?php echo $temp2[2][4]['image']; ?>" alt="">
                <img class="image hide music_card MMm Mm" src="img/karta_muzyczna.png" alt="">
                <img class="image hard_drive hide drive_1 DMm Mm" src="img/dysk.png" alt="">
                <img class="image hard_drive hide drive_2 Mm" src="img/dysk.png" alt="">
                <img class="image hard_drive hide drive_3 Mm" src="img/dysk.png" alt="">
                <img class="image hard_drive hide drive_4 Mm" src="img/dysk.png" alt="">
                <img class="image hide g-drive gMm Mm" src="img/G-drive.png" alt="">
                <img class="image hide rx580 Mmrx Mm" src="img/eGPU RX580.png" alt="">
                <img class="image kable hide kable_1 kMm Mm" src="img/kable.png" alt="">
                <img class="image kable hide kable_2 k2Mm Mm" src="img/Kable.png" alt="">
              </div>
              <h3 class="price" data-price="4950" id="mac_priceMm"><?php echo $temp2[2][4]['org_price']; ?> zł</h3>
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
                  $x = 0;
                  if(count($temp[1][1]) > (count($temp[4][1]))){
                    $x = (count($temp[1][1]) - count($temp[4][1])) + $im[0] + $m_p[0];
                  }
                  elseif(count($temp[1][1]) == (count($temp[4][1]))){
                    $x = $im[0] + $m_p[0];
                  }
                    for ($i=1; $i<=$x ; $i++) {?>
                      <div>
                        <input type="checkbox" value="0">
                        <label class="placeholder">a</label>
                      </div>
                      <?php
                    }}?>
                </fieldset>
                <!-- KARTY GRAFICZNE -->
                <fieldset id="Grafika_mac Mm">
                  <div><legend><h2>Karta Graficzna</h2></legend></div>
                  <?php $i = 1; if(isset($temp[4][2])){foreach ($temp[4][2] as $k => $v) {?>
                    <div>
                      <input type="radio" id="<?php echo '2-'.$i.'Mm';?>" name="Grafika" value="<?php echo $v['price']; ?>" <?php if($i == 1){echo 'checked';}?>>
                      <label for="<?php echo '2-'.$i.'Mm';?>" data-score="<?php echo $v['score'];?>"><?php echo $v['name'];?></label>
                    </div>
                  <?php $i++;}?>
                  <?php
                  $x = 0;
                  if(count($temp[1][2]) > (count($temp[4][2]))){
                    $x = (count($temp[1][2]) - count($temp[4][2])) + $im[1] + $m_p[1];
                  }
                  elseif(count($temp[1][2]) == (count($temp[4][2]))){
                    $x = $im[1] + $m_p[1];
                  }
                    for ($i=1; $i<=$x ; $i++) {?>
                      <div>
                        <input type="checkbox" value="0">
                        <label class="placeholder">a</label>
                      </div>
                      <?php
                    }}?>
                </fieldset>
                <!-- RAM -->
                <fieldset id="RAM_mac">
                  <div><legend><h2>Pamięc RAM</h2></legend></div>
                  <?php $i = 1; if(isset($temp[4][3])){foreach ($temp[4][3] as $k => $v) {?>
                    <div>
                      <input type="radio" id="<?php echo '3-'.$i.'Mm';?>" name="RAM" value="<?php echo $v['price']; ?>" <?php if($i == 1){echo 'checked';}?>>
                      <label for="<?php echo '3-'.$i.'Mm';?>" data-score="<?php echo $v['score'];?>"><?php echo $v['name'];?></label>
                    </div>
                  <?php $i++;}?>
                  <?php
                  $x = 0;
                  if(count($temp[1][3]) > (count($temp[4][3]))){
                    $x = (count($temp[1][3]) - count($temp[4][3])) + $im[2] + $m_p[2];
                  }
                  elseif(count($temp[1][3]) == (count($temp[4][3]))){
                    $x = $im[2] + $m_p[2];
                  }
                    for ($i=1; $i<=$x ; $i++) {?>
                      <div>
                        <input type="checkbox" value="0">
                        <label class="placeholder">a</label>
                      </div>
                      <?php
                    }}?>
                </fieldset>
                <!-- Pamięc masowa -->
                <fieldset id="Pamiec_mac">
                  <div><legend><h2>Pamięc masowa</h2></legend></div>
                  <?php $i = 1; if(isset($temp[4][4])){foreach ($temp[4][4] as $k => $v) {?>
                    <div>
                      <input type="radio" id="<?php echo '4-'.$i.'Mm';?>" name="Pamiec" value="<?php echo $v['price']; ?>" <?php if($i == 1){echo 'checked';}?>>
                      <label for="<?php echo '4-'.$i.'Mm';?>" data-score="<?php echo $v['score'];?>"><?php echo $v['name'];?></label>
                    </div>
                  <?php $i++;}?>
                  <div>
                    <input type="checkbox" id="5-2Mm" name="Optional_mac" value="320">
                    <label for="5-2Mm">
                      Dysk HDD 1TB
                      <!--<select class="hide" id="mac_selectMm">
                         <option class="mac_option active" value="1">1</option>
                         <option class="mac_option" value="2">2</option>
                         <option class="mac_option" value="3">3</option>
                         <option class="mac_option" value="4">4</option>
                      </select>-->
                    </label>
                  </div>
                  <div>
                    <input type="checkbox" id="5-3Mm" name="Optional_mac" value="1330">
                    <label for="5-3Mm">G-drive 4TB</label>
                  </div>
                  <?php
                  $x = 0;
                  if(count($temp[1][4]) > (count($temp[4][4]))){
                    $x = (count($temp[1][4]) - count($temp[4][4])) + $im[3] + $m_p[3];
                  }
                  elseif(count($temp[1][4]) == (count($temp[4][4]))){
                    $x = $im[3] + $m_p[3];
                  }
                    for ($i=1; $i<=$x ; $i++) {?>
                      <div>
                        <input type="checkbox" value="0">
                        <label class="placeholder">a</label>
                      </div>
                      <?php
                    }}?>
                </fieldset>
                <!-- Dodatki -->
                <fieldset id="Optional_mac">
                  <h2>Dodatki</h2>
                  <div>
                    <input type="checkbox" id="5-1Mm" name="Optional_mac" value="0">
                    <label for="5-1Mm">Karta muzyczna</label>
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
                      <input class="mobile_check" type="checkbox" id="5-4Mm_m" name="Optional_mac" value="5890">
                      <label class="mobile_label" for="5-4Mm_m">eGPU RX580</label>
                    </fieldset>
                    <!-- RAM -->
                    <fieldset id="RAM_mobile">
                      <div><legend><h2>Pamięc RAM</h2></legend></div>
                      <select class="select_mobile" name="RAM">
                        <?php if(isset($temp[4][3])){foreach ($temp[4][3] as $k => $v) {?>
                          <option data-score="<?php echo $v['score'];?>" value="<?php echo $v['price'];?>"><?php echo $v['name'];?></option>
                        <?php }}?>
                      </select>
                    </fieldset>
                  </div>
                  <!-- Pamięc masowa -->
                  <div>
                    <fieldset id="Pamiec_mobile">
                      <div><legend><h2>Pamięc masowa</h2></legend></div>
                      <select class="select_mobile" name="Pamiec">
                        <?php if(isset($temp[1][1])){foreach ($temp[4][4] as $k => $v) {?>
                          <option data-score="<?php echo $v['score'];?>" value="<?php echo $v['price'];?>"><?php echo $v['name'];?></option>
                        <?php }}?>
                      </select>
                      <div>
                        <input type="checkbox" id="5-2Mm_m" name="Optional_mac" value="320">
                        <label for="5-2Mm_m">
                          Dysk HDD 1 TB
                          <!--<select class="hide" id="mac_selectM">
                             <option class="mac_option active" value="1">1</option>
                             <option class="mac_option" value="2">2</option>
                             <option class="mac_option" value="3">3</option>
                             <option class="mac_option" value="4">4</option>
                          </select>-->
                        </label>
                      </div>
                      <div>
                        <input type="checkbox" id="5-3Mm_m" name="Optional_mac" value="1330">
                        <label for="5-3Mm_m">G-drive 4 TB</label>
                      </div>
                    </fieldset>
                    <!-- Dodatki -->
                    <fieldset id="Optional">
                      <div><legend><h2>Dodatki</h2></legend></div>
                      <div>
                        <input class="mobile_check" type="checkbox" id="5-1Mm_m" name="Optional_mac" value="0">
                        <label class="mobile_label" for="5-1Mm_m">Karta muzyczna</label>
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
