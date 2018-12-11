var check_counter = 0;
var check_counterM = 0;
var check_counteriM = 0;
var check_counteriMP = 0;
var check_counterMm = 0;
var priceiroN = [0,0,0,0,0];
var priceiroNt = [0,0,0,0,0];
var priceM = [0,0,0,0,0];
var priceiM = [0,0,0,0,0];
var priceiMP = [0,0,0,0,0];
var priceMm = [0,0,0,0,0];
var org_priceiroN = $('#mac_priceiroN').data('price');
var org_priceiroNt = $('#mac_priceiroNt').data('price');
var org_priceM = $('#mac_priceM').data('price');
var org_priceiM = $('#mac_priceiM').data('price');
var org_priceMm = $('#mac_priceMm').data('price');
$(document).ready(function(){
  main();
})

function main() {
  $('label[for=1-1]').click();
  var active_tab = "M";
  $('.mac_btn').on('click',function(){
    if(active_tab != tabs(this)){
      check_counter = 0;
    }
    active_tab = tabs(active_tab,this);
  });
  $('.iroN_btn').on('click',function(){
    tabs_i(this);
  });
  $('input[name=Optional_mac]').change(function(){
    draw_mac(active_tab, this);
  });
  $('.iroN input[type=radio]').on('click',function(){
    calc_price('iroN',this);
  });
  $('.iroN input[type=checkbox]').on('click',function(){
    calc_price('iroN',this);
  });
  $('#iroNt input[type=radio]').on('click',function(){
    calc_price('iroNt',this);
  });
  $('#iroNt input[type=checkbox]').on('click',function(){
    calc_price('iroNt',this);
  });
  $('.mac_form input[type=radio]').on('click',function(){
    calc_price(active_tab,this);
  });
  $('.mac_form input[type=checkbox]').on('click',function(){
    calc_price(active_tab,this);
  });
  $('.mac_form_mobile .select_mobile').change(function(){
    calc_price(active_tab,this);
  });
  $('.iroN_mobile .select_mobile').change(function(){
    calc_price('iroN',this);
  });
  var imageoffset = $('.container_top').scrollTop();
  var stop = $('.form_i').height();
  stop *= 8/10;
    $(window).scroll(function(){
      var scrollpos = $(window).scrollTop();
      if(scrollpos >= imageoffset){
        if(scrollpos <= stop)
          $('.container_top').css('margin-top', scrollpos-imageoffset+15);
      }
  });
  chart();
}

function chart() {
  // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      var iroN_proc = [$('label[for=1-1i]').html(),$('label[for=1-1i]').data('score')];
      $('.iroN input[name=Procesor] + label').on('click',function(){
         iroN_proc [0] = $(this).html();
         iroN_proc [1] = $(this).data('score');
         drawChart();
      });
      var mac_proc = [$('label[for=1-1]').html(),$('label[for=1-1]').data('score')];
      $('.mac_form input[name=Procesor] + label').on('click',function(){
         mac_proc [0] = $(this).html();
         mac_proc [1] = $(this).data('score');
         drawChart();
      });
      $('.iroN_mobile select[name=Procesor]').change(function(){
        iroN_proc[0] = $(this).find(':selected').html();
        iroN_proc[1] = $(this).find(':selected').data('score');
        drawChart();
      })
      $('.mac_form_mobile select[name=Procesor]').change(function(){
        mac_proc[0] = $(this).find(':selected').html();
        mac_proc[1] = $(this).find(':selected').data('score');
        drawChart();
      })
      function drawChart() {
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Konfiguracja');
        data.addColumn('number', 'Wynik');
        data.addRows([
          [iroN_proc[0], iroN_proc[1]],
          [mac_proc[0], mac_proc[1]],
        ]);

        // Set chart options
        var options = {'title':"Porównanie wydajności iroN'ów z Makami (GeekBench)",
                        'legend':"none",
                        color:['#00f'],
                        fontName:'Roboto',
                        fontSize:'15',
                        hAxis:{
                          title:'Wynik',
                          titleTextStyle:{
                            fontName: "Roboto",
                            bold:true,
                            italic:false,
                          },
                          gridlines:{
                            color:'#333'
                          },
                          ticks:[0,5000,10000,15000,20000,25000,30000, 35000]
                        },
      };

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }

}


function tabs(active,clicked) {
  var name = $(clicked).attr('name');
  switch (name) {
    case 'M':
      $('#Mac_Pro').show();
      $('label[for=1-1]').click();
      eval('$(btn_'+active+').removeClass("active_btn")');
      $('#btn_M').addClass('active_btn');
      $('#iMac_Pro').hide();
      $('#iMac').hide();
      $('#Mac_mini').hide();
      break;
    case 'iM':
      $('#Mac_Pro').hide();
      eval('$(btn_'+active+').removeClass("active_btn")');
      $('#btn_iM').addClass('active_btn');
      $('#iMac').show();
      $('#iMac_Pro').hide();
      $('label[for=1-1iM]').click();
      $('#Mac_mini').hide();
      break;
    case 'iMP':
      $('#Mac_Pro').hide();
      eval('$(btn_'+active+').removeClass("active_btn")');
      $('#btn_iMP').addClass('active_btn');
      $('#iMac_Pro').show();
      $('label[for=1-1iMP]').click();
      $('#iMac').hide();
      $('#Mac_mini').hide();
      break;
    case 'Mm':
      $('#Mac_Pro').hide();
      eval('$(btn_'+active+').removeClass("active_btn")');
      $('#btn_Mm').addClass('active_btn');
      $('#iMac').hide();
      $('#iMac_Pro').hide();
      $('#Mac_mini').show();
      $('label[for=1-1Mm]').click();
    default:
  }
  return name;
}
function tabs_i(clicked) {
  var name = $(clicked).attr('name');
  switch (name) {
    case 'i':
      $('#iroNt').hide();
      eval('$(btn_it).removeClass("active_btn")');
      $('#btn_i').addClass('active_btn');
      $('#iroN').show();
      $('label[for=1-1i]').click();
      break;
    case 'it':
      $('#iroN').hide();
      eval('$(btn_i).removeClass("active_btn")');
      $('#btn_it').addClass('active_btn');
      $('#iroNt').show();
      $('label[for=1-1it]').click();
      break;
    }
}

function calc_price(form_name,selected) {
  var name = $(selected).attr('name');
  var value = $(selected).val();
  switch (name) {
    case 'Procesor':
    eval('price'+form_name+'[0]='+value);
      break;
    case 'Grafika':
      eval('price'+form_name+'[1]='+value);
      break;
    case 'RAM':
      eval('price'+form_name+'[2]='+value);
      break;
    case 'Pamiec':
      eval('price'+form_name+'[3]='+value);
      break;
    case 'Optional':
      if(selected.checked == true){
        eval('price'+form_name+'[4]+='+value);
      }else{
        eval('price'+form_name+'[4]-='+value);
      }
      break;
    case 'Optional_mac':
      if(selected.checked == true){
        eval('price'+form_name+'[4]+='+value);
      }else{
        eval('price'+form_name+'[4]-='+value);
      }
      break;
  }
  console.log(priceiroN);
  eval('var new_price = org_price'+form_name+'+price'+form_name+'[0]+price'+form_name+'[1]+price'+form_name+'[2]+price'+form_name+'[3]+price'+form_name+'[4]');
  eval('$(mac_price'+form_name+').html('+new_price+'+" zł")');
}

function draw_mac(form_name, changed) {
  if($(changed).is(':checked')) {
      switch (form_name) {
        case 'M':
          check_counterM++;
          check_counter = check_counterM;
          break;
        case 'iM':
          check_counteriM++;
          check_counter = check_counteriM;
          break;
        case 'iMP':
          check_counteriMP++;
          check_counter = check_counteriMP;
          break;
        case 'Mm':
          check_counterMm++;
          check_counter = check_counterMm;
          break;
      }
      if (check_counter == 2) {
        $('.kable_1.'+form_name).show();
      }else if(check_counter == 4){
        $('.kable_2.'+form_name).show();
      }
      var id = $(changed).attr('id');
      switch (id) {
        case '5-1'+form_name:
          $('.music_card.'+form_name).show();
          break;
        case '5-1'+form_name+'_m':
          $('.music_card.'+form_name).show();
          break;
        case '5-2'+form_name:
          //$('#mac_select'+form_name).show();
          //var amount = $('.active').attr("value");
          var amount = 1;
          for (var i = 1; i <= amount; i++) {
            $('.drive_'+i+'.'+form_name).show();
          }
          $('.mac_option').on('click',function(){
            if (($('.active').attr("value")) < ($(this).attr("value"))) {
              $('.active').removeClass('active');
              var amount = $(this).attr("value");
              $(changed).addClass('active');
              for (var i = 1; i <= amount; i++) {
                $('.drive_'+i+'.'+form_name).show();
              }
          }else if (($('.active').attr("value")) > ($(this).attr("value"))) {
            $('.active').removeClass('active');
            var amount = $(this).attr("value");
            $(changed).addClass('active');
            for (var i = 4; i > amount; i--) {
              $('.drive_'+i+'.'+form_name).hide();
            }
          }
        });
          break;
        case '5-2'+form_name+'_m':
          //$('#mac_select'+form_name).show();
          //var amount = $('.active').attr("value");
          var amount = 1;
          for (var i = 1; i <= amount; i++) {
            $('.drive_'+i+'.'+form_name).show();
          }
          $('.mac_option').on('click',function(){
            if (($('.active').attr("value")) < ($(this).attr("value"))) {
              $('.active').removeClass('active');
              var amount = $(this).attr("value");
              $(changed).addClass('active');
              for (var i = 1; i <= amount; i++) {
                $('.drive_'+i+'.'+form_name).show();
              }
          }else if (($('.active').attr("value")) > ($(this).attr("value"))) {
            $('.active').removeClass('active');
            var amount = $(this).attr("value");
            $(changed).addClass('active');
            for (var i = 4; i > amount; i--) {
              $('.drive_'+i+'.'+form_name).hide();
            }
          }
        });
          break;
        case '5-3'+form_name:
          $('.g-drive.'+form_name).show();
          break;
        case '5-3'+form_name+'_m':
          $('.g-drive.'+form_name).show();
          break;
        case '5-4'+form_name:
          $('.rx580.'+form_name).show();
          break;
        case '5-4'+form_name+'_m':
          $('.rx580.'+form_name).show();
          break;
        default:

      }
  } else {
    switch (form_name) {
      case 'M':
        check_counterM--;
        check_counter = check_counterM;
        break;
      case 'iM':
        check_counteriM--;
        check_counter = check_counteriM;
        break;
      case 'iMP':
        check_counteriMP--;
        check_counter = check_counteriMP;
        break;
      case 'Mm':
        check_counterMm--;
        check_counter = check_counterMm;
        break;
    }
      if(check_counter == 3){
        $('.kable_2.'+form_name).hide();
      }else if(check_counter == 1){
        $('.kable_1.'+form_name).hide();
      }
      var id = $(changed).attr('id');
      switch (id) {
        case '5-1'+form_name:
          $('.music_card.'+form_name).hide();
          break;
        case '5-1'+form_name+'_m':
          $('.music_card.'+form_name).hide();
          break;
        case '5-2'+form_name:
          $('.hard_drive.'+form_name).hide();
          $('.mac_option.'+form_name).removeClass('active');
          $('.mac_option[value=1]').addClass('active');
          $('#mac_select'+form_name).val('1');
          $('#mac_select'+form_name).hide();
          break;
        case '5-2'+form_name+'_m':
          $('.hard_drive.'+form_name).hide();
          $('.mac_option.'+form_name).removeClass('active');
          $('.mac_option[value=1]').addClass('active');
          $('#mac_select'+form_name).val('1');
          $('#mac_select'+form_name).hide();
          break;
        case '5-3'+form_name:
          $('.g-drive.'+form_name).hide();
          break;
        case '5-3'+form_name+'_m':
          $('.g-drive.'+form_name).hide();
          break;
        case '5-4'+form_name:
          $('.rx580.'+form_name).hide();
          break;
        case '5-4'+form_name+'_m':
          $('.rx580.'+form_name).hide();
          break;
        default:
      }
  }
}
