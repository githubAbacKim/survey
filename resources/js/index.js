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
});

const alertStatus = (e) => {
	if ($("#confirm_agree").is(":checked")) {
		$("#exampleModal").modal("hide");
	} else {
		$("#exampleModal").modal("show");
	}
};

const closeModal = (e) => {
	$("#exampleModal").modal("hide");
};

$(document).on("click", "#start-button", alertStatus);
$(document).on("click", "#btnclose", closeModal);
