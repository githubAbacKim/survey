$(function(){
    
    var listContainer = "questCont";
    var paginationcont = "data-template";

    function getData(url) {
		var tmp = null;
		$.ajax({
			url:url,
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

	const mustacheTemplating = (container,template,data) =>{
		const $container = $("#"+container);
		const $template = $("#"+template).html();  
	
		$container.append(Mustache.render($template, data)); 
	}

    function displayQuestionStat(questions,comments)
    {

        $.each(questions,function(i,result){
            ///console.log(result.question_num)
			
			let num = result.question_num;
			const container = "commentCont"+num;
			const commTemp = "commentTemp";
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
			mustacheTemplating(listContainer,paginationcont,data);
			
			$.each(comments,function(x,d){
							
				
				
				if(d.question_num === num && d.comment !== ""){
					console.log(d.question_num +'-'+ x);
					const commentData = {
						'comment': d.comment
					}					
					mustacheTemplating(container,commTemp,commentData);
				}
				
			})
        });
			
    }

    function makeAnswerArr(data,questions){
        let commentArr = [];	
		let num = 0;
		$.each(questions,function(o,q){
			commentArr[q.question_num] = [];
			$.each(data,function(i,d){
				if(q.question_num == d.question_num){
					commentArr[q.question_num][o] = d.comment;
					num++;
				}
			})
		})
		
		return commentArr;

    }

    function lookupsearch(){
        // get data or result based on the look up search
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
	let resultUrl = '/ceo/fetchAllAnswer';
	const defaultdata = getData(resultUrl);

	const questionurl = "/ceo/fetchquestion";
	const question = getData(questionurl);
	
    displayQuestionStat(question,defaultdata);

    $('#redo').click(function() {
		var title = '축하합니다!';
		var message = '<p>설문 페이지에서 나가시겠습니까?</p> <p>설문 페이지를 나가면 설문 내용이 모두 초기화 됩니다.</p>';
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
	
});