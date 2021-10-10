$(function(){


  $('#register_form').on('submit',function(e){
    e.preventDefault();

    $.ajax({
      url:'/blog/access/signUp/',
      type:'post',
      data:$(this).serialize()+'&reg_method=app',
      success:function(data){
        alert(data);
      }
    })
  })
})
