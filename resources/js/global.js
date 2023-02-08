function validatesession() {
    var tmp = null;
    $.ajax({
        url: "/page/valsession/",
        async: false,
        dataType: "json",
        success: function (results) {
            $.each(results, function (i, result) {
                tmp = results.status;
            });
        },
        error: function () {
            console.log("error");
        },
    });
    return tmp;
}
function validateanswer() {
    var tmp = null;
    $.ajax({
        url: "/page/validateUser/",
        async: false,
        dataType: "json",
        success: function (results) {
            $.each(results, function (i, result) {
                tmp = results.status;
            });
        },
        error: function () {
            console.log("error");
        },
    });
    return tmp;
}
function modal(title,message,type){
    $("#alertModal").modal("show");
    $('#alertModal').find('.modal-title').text(title);
    if(type === "success") 
    {
        $('.alert-success').html(message).fadeIn();
        $('.alert-danger').hide();
    } else
    {
        $('.alert-success').hide();
        $('.alert-danger').html(message).fadeIn();
    }
}
function confirmModal(title,message){
    $("#confirmModal").modal("show");
    $('#confirmModal').find('.modal-title').text(title);
    $('.alert-secondary').html(message);
}
function checkResultButton(){
    // if validation is true show modal for return to result page or redo survey?
    // else if validation is false show modal showing no survey has been made
    
    // for validation check for survey id and answer should not be empty
}

if(validatesession() === false && validateanswer() === false)
{
    // removeclass or id redo.
    $('.redo').removeAttr('id');
}else{
    // add class or id redo
    $('.redo').attr('id','redo');
    $('#redo').click(function() {
        var title = '알리다!';
        var message = "<p>설문조사를 다시 실행하시겠습니까?<p><p><a href='/page/survey_result'>결과 페이지로 돌아가시겠습니까?</a></p>";
        confirmModal(title,message);
    });
    $('#initiateRedo').click(function() {
        var url = '/page/clearSession';
          $.ajax({
              type:'ajax',
              method: 'post',
              url: url,
              async: false,
              dataType: 'json',
              success: function(response){
                  var error = response.error;
                  if (response.success == true) {
                      window.location.href = '/page/index';
                  }else{
                      $('.alert-danger').html(error).fadeIn();
                      var title = '에러 메시지!!!';
                      var message = response.error;
                      var type = 'error';	
                      alertModal(title,message,type);
                  }
              },
              error: function(){
                  $('.alert-danger').html('요청 처리 오류!').fadeIn();
              }
          });
    });
    $('#initredo').on('click',function(){
        var title = '알리다!!!';
        var message = '설문조사를 다시 실행하시겠습니까?';
        var type = 'error';
        modal(title,message,type);
        window.setTimeout(function () {
            window.location.href = "/page/index/";
        },1000);
    })
}