$(function(){
    var listContainer = $("#questCont");
    var paginationcont = $('#data-template').html();
    $.ajax({
        url:'../../survey/page/fetchquestion',
        async:false,
        dataType:'json',
        success: function(results){
            $.each(results,function(i,result){
                console.log(result.question_num)
                var data = {
                    'qnum': result.question_num,
                    'question': result.question,
                    'agree_img': result.agree_image,
                    'agree_title':'찬성',
                    'agree_desc': result.agree_desc,
                    'disagree_img':result.disagree_image,
                    'disagree_title':'반대',
                    'disagree_desc':result.disagree_desc,
                }
                listContainer.append(Mustache.render(paginationcont, data)); 
            });
        },
        error: function(){
            console.log('error')
        }
    });
});