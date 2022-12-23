$(function () {
	$('[data-toggle="tooltip"]').tooltip();
});

$(function () {
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
			highschool.show();
			elemlevel.hide();
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

	$("#submitform").hide();
	$("#dummyBut").show();

	//if check box is checked add class to start image to enable start
	$("#confirm_agree").change(function () {
		if ($(this).is(":checked")) {
			$("#dummyBut").fadeOut("slow");
			$("#submitform").fadeIn("slow");
		} else {
			$("#submitform").fadeOut("slow");
			$("#dummyBut").show("slow");
		}
	});

	$("#submitform").on("click", function () {
		var url = $("#startForm").attr("action");
		var data = $("#startForm").serialize();		
		
		$.ajax({
			type:'ajax',
			method: 'post',
			url: url,
			data: data,
			async: false,
			dataType: 'json',
			success: function(response){
				if(response.status === true){
					alert("Your session is now started!");
				}else{
					alert(response.error);
				}
			},
			error: function(response){
				alert(response.error);
			}
		});
	});

	function getDataTopage() {}
});
