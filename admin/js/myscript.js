function initSwitch(){
  $(".switch-input").each(function(){
      if($(this).attr("checked")=='checked'){
          $(this).attr("checked","true");
      }
      
  })

  $(".switch-input").bootstrapSwitch({onColor:'info',size:'mini',offColor:'danger',onSwitchChange:function(event, state){
      NProgress.start();
      $.ajax({url:base_url+"admin/index.php",type:"POST",data:{id:$(this).data("id"),com:$(this).data("com"),type:$(this).data("type"),value:((state) ? 1 : 0),ajax:true},success:function(data){
          NProgress.done();
      }});
  }
  });
}

function initDate() {
  $('.datepicker').datepicker({
      dateFormat: 'dd-mm-yy',
      duration: "slow",
      changeMonth: true,
      changeYear: true,
      autoSize: false
  })
}

function  Forward(url)
{
  window.location.href = url;
}

function inittooltip(){
  $('[data-toggle="tooltip"]').tooltip();
}

$().ready(function(){
  initSwitch();
  initDate();
  inittooltip();
})