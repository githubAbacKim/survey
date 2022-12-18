$(function () {
	var listContainer = $("#questCont");
	var paginationcont = $("#qstat-template").html();

	function getData(){
        var tmp = null;
        $.ajax({
            url:'../../survey_project/survey/fetchquestion',
            async:false,
            dataType:'json',
            success: function(results){
                $.each(results,function(i,result){
                    tmp = results;
                });
            },
            error: function(){
                console.log('error')
            }
        });
        return tmp;
    }

	function displayQuestion(results){
		$.each(results, function (i, result) {
			console.log(result.question_num);
			var disagree_div = "disagree" + result.question_num;
			var agree_div = "agree" + result.question_num;
			var progAgree = "agreeprog"+ result.question_num;
			var progDisagree = "disagreeprog"+ result.question_num;
			console.log(agree_div);
			var data = {
				qnum: result.question_num,
				question: result.question,
				agree_img: result.agree_image,
				agree_title: "찬성",
				agree_desc: result.agree_desc,
				disagree_img: result.disagree_image,
				disagree_title: "반대",
				disagree_desc: result.disagree_desc,
				agreediv: agree_div,
				disagreediv: disagree_div,
				agreeval: 80,
				disagreeval: 20,
				agreeprog: progAgree,
				disagreeprog: progDisagree
			};
			var tagree = 30;
			var tdisagree = 90;

			$('#'+progAgree).css('width','20%');
			$('#'+progDisagree).css('width','20%');

			listContainer.append(Mustache.render(paginationcont, data));
		});
	}

	displayQuestion(getData());

	const elemlevel = $("#elem");
	const highschool = $("#highschool");
	const college = $("#college");
	const public_sec = $("#public");

	function getShowList(school) {
		if (school === "초등학교") {
			elemlevel.show();
			highschool.hide();
			college.hide();
			public_sec.hide();
		} else if (school === "중학교") {
			elemlevel.show();
			highschool.hide();
			college.hide();
			public_sec.hide();
		} else if (school === "고등학교") {
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

	var data = document.getElementById("school_level").value;
	getShowList(data);

	$("#school_level").change(function () {
		var data = document.getElementById("school_level").value;
		getShowList(data);
	});

	//if check box is checked add class to start image to enable start
	$("#confirm_agree").click(function () {
		if ($(this).is(":checked")) {
		}
	});

	const alertStatus = (e) => {
		if ($("#confirm_agree").is(":checked")) {
			//check if check box is check
			if (
				$("#gender").val() == "선택" ||
				$("#classification").val() == "선택" ||
				$("#schoollevel").val() == "선택"
			) {
				//check if gender is selected
				$("#exampleModal").modal("show");
			} else {
			}
	
			$("#exampleModal").modal("hide");
		} else {
			$("#exampleModal").modal("show");
		}
	};
	
	const closeModal = (e) => {
		$("#exampleModal").modal("hide");
	};
	
	//redo select options
	const redo = (e) => {
		$("#gender").val("선택");
		$("#classification").val("선택");
		$("#schoollevel").val("선택");
	};
	
	$(document).on("click", "#start-button", alertStatus);
	$(document).on("click", "#btnclose", closeModal);
	$(document).on("click", "#redo", redo);
});


