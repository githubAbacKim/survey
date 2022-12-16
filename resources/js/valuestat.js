$(function(){
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

	new Chart(document.getElementById("pie-chart"), {
		type: "pie",
		data: {
			labels: [
				"사회중시_H형 시장님",
				"사회중시_T형 시장님",
				"인간중시_T형 시장님",
				"인간중시_S형 시장님",
				"기술중시_S형 시장님",
				"기술중시_H형 시장님",
				"균형중시_A형 시장님",
				"균형중시_B형 시장님",
			],
			datasets: [
				{
					label: "answers",
					backgroundColor: [
						"#3e95cd",
						"#8e5ea2",
						"#3cba9f",
						"#e8c3b9",
						"#c45850",
						"#3cba9f",
						"#e8c3b9",
						"#c45850",
					],
					data: [2478, 5267, 734, 784, 433, 734, 784, 433],
				},
			],
		},
		options: {
			legend: {
				position: "right",
				align: "center",
				color: "rgb(255, 99, 132)",
			},
		},
	});
	
	const alertStatus = (e) => {
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
	};
	
	const closeModal = (e) => {
		$("#exampleModal").modal("hide");
	};
	
	const redo = (e) => {
		$("#gender").val("선택");
		$("#classification").val("선택");
		$("#schoollevel").val("선택");
	};
	
	$(document).on("click", "#redo", redo);
	$(document).on("click", "#btnclose", closeModal);
	$(document).on("click", "#lookup", alertStatus);
});

