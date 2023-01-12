$(function () {
	var divArray = [$(".a"), $(".b"), $(".c"), $(".d"), $(".e"), $(".f")];

	var answerArray = [1, 2, 3, 4, 5, 6, 7];
	// for (let i = 0; i < divArray.length; i++) {
	// 	divArray[i].text(answerArray[i]);
	// }
	function getData(url) 
	{
		var tmp = null;
		$.ajax({
			url: url,
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

	function displayResults(){
		let url = "/page/fetchResultData";
		let data = getData(url);

		//set containers
		var profContainer = $("#prof_cont");
		var profile = $("#profileTemp").html();

		let profTempdata = {
			type_mayor : data.type_mayor,
			type: data.type,
			profile: data.profile
		};
		profContainer.append(Mustache.render(profile, profTempdata));

		//set containers
		var scaleContainer = $("#scale_cont");
		var scale = $("#scaleTemp").html();
		console.log(data.labelstyle);
		console.log(data.labelstyle[0]);
		let scaleTempdata = {
			scalesh: data.scale[0],
			rotate1: data.labelrot[0],
			labelsh1: data.labelstyle[0],
			labelsh2: data.labelstyle[1],
			scalets: data.scale[1],
			rotate2: data.labelrot[1],
			labelts1: data.labelstyle[2],
			labelts2: data.labelstyle[3],
			scaleth: data.scale[2],
			rotate3: data.labelrot[2],
			labelth1: data.labelstyle[4],
			labelth2: data.labelstyle[5],
		};
		scaleContainer.append(Mustache.render(scale, scaleTempdata));
	}

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

	function alertModal(title,message,type){
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

	if(validatesession() == false){
		window.location.href = '/page/index';
	}else{
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
	
		displayResults();	
	}

	
});
