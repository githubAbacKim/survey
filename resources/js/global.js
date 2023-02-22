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

async function resetSurvey() {
    let url = '/page/clearSession';
    await $.ajax({
        type:'ajax',
        method: 'post',
        url: url,
        async: false,
        dataType: 'json',
        success: function(response){
            var error = response.error;
            if (response.success == true) {
                //window.location.href = '/page/index';
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
}

function activeLink(){
    const path = window.location.pathname;
    let current = path.substring(16);
    console.log(current)
    // linkhome linkvalstat linkqstat linkq linkabout

    if(current === "index" || current === ""){
        $('#linkhome').removeClass('btn-bg');
        $('#linkhome').addClass('btnWhite')
        $('#linkvalstat').removeClass('btnWhite');
        $('#linkvalstat').addClass('btn-bg');
        $('#linkqstat').removeClass('btnWhite');
        $('#linkqstat').addClass('btn-bg');
        $('#linkq').removeClass('btnWhite');
        $('#linkq').addClass('btn-bg');
        $('#linkabout').removeClass('btnWhite');
        $('#linkabout').addClass('btn-bg');
    }

    if(current === "valueStatistic"){
        $('#linkvalstat').removeClass('btn-bg');
        $('#linkvalstat').addClass('btnWhite')
        $('#linkhome').removeClass('btnWhite');
        $('#linkhome').addClass('btn-bg');
        $('#linkqstat').removeClass('btnWhite');
        $('#linkqstat').addClass('btn-bg');
        $('#linkq').removeClass('btnWhite');
        $('#linkq').addClass('btn-bg');
        $('#linkabout').removeClass('btnWhite');
        $('#linkabout').addClass('btn-bg');
    }

    if(current === "questionStatistics"){
        $('#linkqstat').removeClass('btn-bg');
        $('#linkqstat').addClass('btnWhite')
        $('#linkhome').removeClass('btnWhite');
        $('#linkhome').addClass('btn-bg');
        $('#linkvalstat').removeClass('btnWhite');
        $('#linkvalstat').addClass('btn-bg');
        $('#linkq').removeClass('btnWhite');
        $('#linkq').addClass('btn-bg');
        $('#linkabout').removeClass('btnWhite');
        $('#linkabout').addClass('btn-bg');
    }

    if(current === "questions"){
        $('#linkq').removeClass('btn-bg');
        $('#linkq').addClass('btnWhite')
        $('#linkhome').removeClass('btnWhite');
        $('#linkhome').addClass('btn-bg');
        $('#linkvalstat').removeClass('btnWhite');
        $('#linkvalstat').addClass('btn-bg');
        $('#linkqstat').removeClass('btnWhite');
        $('#linkqstat').addClass('btn-bg');
        $('#linkabout').removeClass('btnWhite');
        $('#linkabout').addClass('btn-bg');
    }

    if(current === "aboutus"){
        $('#linkabout').removeClass('btn-bg');
        $('#linkabout').addClass('btnWhite')
        $('#linkhome').removeClass('btnWhite');
        $('#linkhome').addClass('btn-bg');
        $('#linkvalstat').removeClass('btnWhite');
        $('#linkvalstat').addClass('btn-bg');
        $('#linkqstat').removeClass('btnWhite');
        $('#linkqstat').addClass('btn-bg');
        $('#linkq').removeClass('btnWhite');
        $('#linkq').addClass('btn-bg');
    }

}
activeLink()
// if(validatesession() === false && validateanswer() === false)
// {
//     $('.redo').removeAttr('id');
// }else{
//     $('.redo').attr('id','redo');
//     $('#redo').click(function() {
//         var title = '알리다!';
//         var message = "<p>설문조사를 다시 실행하시겠습니까?<p><p><a href='/page/survey_result'>결과 페이지로 돌아가시겠습니까?</a></p>";
//         confirmModal(title,message);
//     });
//     $('#initiateRedo').click(function() {
//         var url = '/page/clearSession';
//           $.ajax({
//               type:'ajax',
//               method: 'post',
//               url: url,
//               async: false,
//               dataType: 'json',
//               success: function(response){
//                   var error = response.error;
//                   if (response.success == true) {
//                       window.location.href = '/page/index';
//                   }else{
//                       $('.alert-danger').html(error).fadeIn();
//                       var title = '에러 메시지!!!';
//                       var message = response.error;
//                       var type = 'error';	
//                       alertModal(title,message,type);
//                   }
//               },
//               error: function(){
//                   $('.alert-danger').html('요청 처리 오류!').fadeIn();
//               }
//           });
//     });
//     $('#initredo').on('click',function(){
//         var title = '알리다!!!';
//         var message = '설문조사를 다시 실행하시겠습니까?';
//         var type = 'error';
//         modal(title,message,type);
//         window.setTimeout(function () {
//             window.location.href = "/page/index/";
//         },1000);
//     })
// }