$(function () {
	$("#btnSave").click(function () {
		$.ajax({
			type: "ajax",
			method: "post",
			url: url,
			data: data,
			async: false,
			dataType: "json",
			success: function (response) {
				var error = response.error;
				var type = response.type;
				if (response.success) {
					$("#myForm")[0].reset();
					$(".alert-success")
						.html(type + "successful.")
						.fadeIn()
						.delay(2000)
						.fadeOut("slow");
					accountTable.ajax.reload(null, false);
					if (type === "Update") {
						$("#myModal").modal("hide");
					}
				} else {
					$("#myModal").modal("hide");
					$(".alert-danger").html(error).fadeIn().delay(2000).fadeOut("slow");
				}
			},
			error: function () {
				$(".alert-danger")
					.html("Unable to add record.")
					.fadeIn()
					.delay(2000)
					.fadeOut("slow");
				$("#myModal").modal("hide");
			},
		});
	});

	var listContainer = $("#slideCont");
	var paginationcont = $("#template").html();

	var slideIndex = 1;
	showDivs(slideIndex);

	function plusDivs(n) {
		showDivs((slideIndex += n));
	}

	function showDivs(n) {
		var i;
		var x = document.getElementsByClassName("mySlides");
		var y = document.getElementsByClassName("dot");
		if (n > x.length) {
			slideIndex = 1;
		}
		if (n < 1) {
			slideIndex = x.length;
		}
		for (i = 0; i < x.length; i++) {
			x[i].style.display = "none";
		}
		x[slideIndex - 1].style.display = "block";
		y[slideIndex - 1].style.background = "red";
	}

	$.ajax({
		url: "../../survey_project/survey/shuffledQuestion",
		async: false,
		dataType: "json",
		success: function (results) {
			$.each(results, function (i, result) {
				console.log(result.question_num);
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
				listContainer.append(Mustache.render(paginationcont, data));
			});
		},
		error: function () {
			console.log("error");
		},
	});
});
