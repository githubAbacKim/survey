$(function () {
	if (window.location.href === "http://210.99.223.38:20002/") {
		window.location.href = "http://210.99.223.38:20002/index.php/page";
	}
	const elemlevel = $("#elem");
	const highschool = $("#highschool");
	const college = $("#college");
	const public_sec = $("#public");

	function getShowList(school) {
		if (school === "초등학생") {
			elemlevel.show();
			highschool.hide();
			college.hide();
			public_sec.hide();
		} else if (school === "중학생") {
			highschool.show();
			elemlevel.hide();
			college.hide();
			public_sec.hide();
		} else if (school === "고등학생") {
			highschool.show();
			elemlevel.hide();
			college.hide();
			public_sec.hide();
		} else if (school === "대학") {
			college.show();
			elemlevel.hide();
			highschool.hide();
			public_sec.hide();
		} else if (school === "일반인") {
			public_sec.show();
			elemlevel.hide();
			highschool.hide();
			college.hide();
		} else {
			elemlevel.hide();
			highschool.hide();
			college.hide();
			public_sec.hide();
		}
	}

	function valModal(title,message){
		$("#valModal").modal("show");
		$('#valModal').find('.modal-title').text(title);
		$('.alert-secondary').html(message);
	}
	
	validatesession() === true && validateanswer() === true ? resetSurvey(): false;
	
	if(validatesession() === true && validateanswer() === false){
		$('#continuesurvey').click(function() {
			window.location.href = '/page/survey_page';
		});
		
		$('#cancelsurvey').click(function() {
			var url = '/page/cancelSurvey';
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

		var title = '앗 미안 해요!!!';
		var message = "평가를 멈추시겠습니까? 지금 멈추면 모든 평가의 데이터가 삭제되고 결과를 볼 수 없습니다";
		var type = 'error';
		valModal(title,message,type);
	}
	
	var data = document.getElementById("school_level").value;
	getShowList(data);

	$("#school_level").change(function () {
		var data = document.getElementById("school_level").value;
		getShowList(data);
	});

	$('[data-toggle="tooltip"]').tooltip(); // generate tooltip
	$("#submitform").hide();
	$("#dummyBut").show();

	//if check box is checked add class to start image to enable start
	$("#confirm_agree").change(function () {
		if ($(this).is(":checked")) {
			$("#dummyBut").fadeOut("fast");
			$("#submitform").fadeIn("slow");
		} else {
			$("#submitform").fadeOut("fast");
			$("#dummyBut").fadeIn("slow");
		}
	});

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

	$("#submitform").on("click", function () {
		var url = $("#startForm").attr("action");
		var data = $("#startForm").serialize();		
		if(validatesession() === false && validateanswer() === false){
			$.ajax({
				type:'ajax',
				method: 'post',
				url: url,
				data: data,
				async: false,
				dataType: 'json',
				success: function(response){
					if(response.status === true){		
						window.location.href = "/page/survey_page/";						
					}else{
						console.log("error adding");
						var title = '이런!!!';
						var message = response.error;
						var type = 'error';
						modal(title,message,type);
					}
				},
				error: function(response){
					console.log("error query");
					var title = '이런!!!';
					var message = response.error;
					var type = 'error';
					modal(title,message,type);
				}
			});
		}else{
			window.location.href = "/page/survey_page/";
		}		
		
	});

	$("#goresult").click(function () {
		if(validatesession() === false){
			var title = '이런!!!';
			var message = "설문 조사를 시작하지 않았습니다!";
			var type = 'error';
			modal(title,message,type);
		}else{
			window.location.href = "/page/survey_result";
		}
	});		
});
