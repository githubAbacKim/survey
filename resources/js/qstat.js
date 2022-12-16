$(function(){
    var listContainer = $("#questCont");
    var paginationcont = $('#qstat-template').html();
    $.ajax({
        url:'../../survey_project/survey/fetchquestion',
        async:false,
        dataType:'json',
        success: function(results){
            $.each(results,function(i,result){
                console.log(result.question_num)
                var disagree_div = "#disagree"+result.question_num;
                var agree_div = "#agree"+result.question_num;
                console.log(agree_div)
                var data = {
                    'qnum': result.question_num,
                    'question': result.question,
                    'agree_img': result.agree_image,
                    'agree_title':'찬성',
                    'agree_desc': result.agree_desc,
                    'disagree_img':result.disagree_image,
                    'disagree_title':'반대',
                    'disagree_desc':result.disagree_desc,
                    'agreediv':agree_div,
                    'disagreediv':disagree_div,
                    'agreeval':80,
                    'disagreeval':20
                }
                var tagree = 30;
                var tdisagree = 90;

                $(agree_div).attr('data-id',tagree);
                listContainer.append(Mustache.render(paginationcont, data)); 
            });
        },
        error: function(){
            console.log('error')
        }
    });
});