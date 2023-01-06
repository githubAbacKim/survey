$(function(){
    
    var listContainer = $("#questCont");
    var paginationcont = $('#data-template').html();

    function getData() {
		var tmp = null;
		$.ajax({
			url: "/page/shuffledQuestion",
			async: false,
			dataType: "json",
			success: function (results) {
				$.each(results, function (i, result) {
					tmp = results;
				});
			},
			error: function () {
				console.log("error");
			},
		});
		return tmp;
	}

    function displayQuestionStat(dataresult)
    {
        $.each(dataresult,function(i,result){
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
    }

    function getResult(){
        // get result for 9 q
    }

    function lookupsearch(){
        // get data or result based on the look up search
    }

    displayQuestionStat(getData());
});