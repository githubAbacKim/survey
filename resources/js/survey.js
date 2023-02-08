$(function () {
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
	// function validatesession() {
	// 	var tmp = null;
	// 	$.ajax({
	// 		url: "/page/valsession/",
	// 		async: false,
	// 		dataType: "json",
	// 		success: function (results) {
	// 			$.each(results, function (i, result) {
	// 				tmp = results.status;
	// 			});
	// 		},
	// 		error: function () {
	// 			console.log("error");
	// 		},
	// 	});
	// 	return tmp;
	// }

	var listContainer = $("#slideCont");
	var datatemplate = $("#datatemplate").html();

	function displayData(results) {
		$.each(results, function (i, result) {
			var data = {
				qnum: result.question_num,
				question: result.question,
				agree_img: result.agree_image,
				agree_title: "찬성",
				agree_desc: result.agree_desc,
				disagree_img: result.disagree_image,
				disagree_title: "반대",
				disagree_desc: result.disagree_desc,
			};
			listContainer.append(Mustache.render(datatemplate, data));
		});
	}

	function generateSteps(result) {
		var tsteps = result.legth;
		$.each(result, function () {
			$(".progress-indicator").append('<span class="step"></span>');
		});
	}

	function showTab(n) {
		// This function will display the specified tab of the form ...
		var x = $(".tab");
		x[n].style.display = "block";
		// ... and fix the Previous/Next buttons:
		if (n == 0) {
			document.getElementById("prevBtn").style.display = "none";
		} else {
			document.getElementById("prevBtn").style.display = "inline";
		}
		if (n == x.length - 1) {
			// document.getElementById("nextBtn").innerHTML = "Submit";
			document.getElementById("nextBtn").style.display = "none";
			document.getElementById("submitBtn").style.display = "inline";
		} else {
			document.getElementById("nextBtn").style.display = "inline";
			document.getElementById("submitBtn").style.display = "none";
		}
		// ... and run a function that displays the correct step indicator:
		fixStepIndicator(n);
	}

	function nextPrev(n) {
		// This function will figure out which tab to display
		var x = document.getElementsByClassName("tab");
		// Exit the function if any field in the current tab is invalid:
		if (n == 1 && !validateForm()) return false;
		// Hide the current tab:
		x[currentTab].style.display = "none";
		// Increase or decrease the current tab by 1:
		currentTab = currentTab + n;
		// if you have reached the end of the form... :

		if (currentTab >= x.length) {
			//...the form gets submitted:
			//document.getElementById("regForm").submit();			
			return false;
		}

		// Otherwise, display the correct tab:
		showTab(currentTab);
	}

	// function validateForm() {
	// 	// This function deals with validation of the form fields
	// 	var x,
	// 		y,
	// 		i,
	// 		valid = true;
	// 	x = document.getElementsByClassName("tab");
	// 	y = x[currentTab].getElementsByTagName('input');
	// 	z = x[currentTab].querySelector('input[type="radio"]');
	// 	// A loop that checks every input field in the current tab:
	// 	for (i = 0; i < z.length; i++) {
	// 		alert(z[i].value);
	// 		// If a field is empty...
	// 		if (z[i].value === '') {
	// 			console.log('invalid')
	// 			// add an "invalid" class to the field:
	// 			y[i].className += " invalid";
	// 			// and set the current valid status to false:
	// 			valid = false;
	// 		}
	// 	}
	// 	// If the valid status is true, mark the step as finished and valid:
	// 	if (valid) {
	// 		document.getElementsByClassName("step")[currentTab].className +=
	// 			" finish";
	// 	}
	// 	return valid; // return the valid status
	// }

	// function validateForm() {
	// 	// This function deals with validation of the form fields
	// 	var x,
	// 		y,
	// 		i,
	// 		valid = true;
		
	// 		document.getElementsByClassName("step")[currentTab].className +=" finish";
	
	// 	return valid; // return the valid status
	// }

	function validateForm(){
		var x,
			y,
			i,
			valid = true;
		x = document.getElementsByClassName("tab");
		y = x[currentTab].getElementsByTagName('input');
		// A loop that checks every input field in the current tab:
		let stat;
		let radio1;
		let radio2
		for (i = 0; i < y.length; i++) {			
			if(y[i].getAttribute('type') === 'radio'){
				radio1 = y[0].getAttribute('id');
				radio2 = y[1].getAttribute('id')
				
				if($('#'+radio1).prop("checked") !== false || $('#'+radio2).prop("checked") !== false){
					stat = "pass";
				}else{
					stat = "failed";
				}
			}			
		}
		// If a field is empty...
		if (stat === 'failed') {
			var title = '이런!';
			var message = "답변을 선택하세요.";
			var type = 'error';	
			modal(title,message,type);
			// add an "invalid" class to the field:
			y[i].className += " invalid";
			// and set the current valid status to false:
			valid = false;
		}
		// If the valid status is true, mark the step as finished and valid:
		if (valid) {
			document.getElementsByClassName("step")[currentTab].className += " finish";
		}
		return valid; // return the valid status
		
	}

	function fixStepIndicator(n) {
		// This function removes the "active" class of all steps...
		var i,
			x = document.getElementsByClassName("step");
		for (i = 0; i < x.length; i++) {
			x[i].className = x[i].className.replace(" active", "");
		}
		//... and adds the "active" class to the current step:
		x[n].className += " active";
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
	
	if(validatesession() === false)
	{
		var title = '축하합니다!';
		var message = '설문조사에 응해주셔서 감사합니다!';
		var type = 'error';
		modal(title,message,type);
		window.setTimeout(function () {
			window.location.href = "/page/index/";
		},1000);
	} else 
	{
		displayData(getData());
		generateSteps(getData());
		var currentTab = 0; // Current tab is set to be the first tab (0)
		showTab(currentTab); // Display the current tab
		$("#prevBtn").click(function () {
			nextPrev(-1);
		});
		$("#nextBtn").click(function () {
			nextPrev(1);
		});

		$("#submitBtn").click(function () {
			var url = $("#regForm").attr("action");
			var data = $("#regForm").serialize();		
			$.ajax({
				type:'ajax',
				method: 'post',
				url: url,
				data: data,
				async: false,
				dataType: 'json',
				success: function(response){
					if(response.status === true){
						window.location.href = "/page/survey_result/";
					}else{
						var title = '에러 메시지!!!';
						var message = response.error;
						var type = 'error';	
						modal(title,message,type);					
					}
				},
				error: function(response){
					var title = '에러 메시지!!!';
					var message = response.error;
					var type = 'error';	
					modal(title,message,type);							
				}
			});
		});

		const closeModal = (e) => {
			$("#exampleModal").modal("hide");
		};

		$(document).on("click", "#btnclose", closeModal);
	}
});
