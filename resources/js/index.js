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

	$('[data-toggle="tooltip"]').tooltip(); // generate tooltip
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

	function getDataTopage() {
		/* var gender = document.getElementById("gender");
		var value = gender.value;
		var gendertext = gender.options[gender.selectedIndex].text;

		if (gendertext == "select") {
			alert("please select gender");
		} else {
			alert("gender selected");
		} */
		/* let form = document.querySelector("#post");
		let data = new FormData(form);

		for (let entry of data) {
			console.log(entry);
		}

		for (let [key, value] of data) {
			console.log(key);
			console.log(value);
		}0 */

		document.addEventListener("submit", function (event) {
			event.preventDefault();

			fetch("https://jsonplaceholder.typicode.com/posts	", {
				method: "POST",
				body: JSON.stringify(Object.fromEntries(new FormData(event.target))),
				headers: {
					"Content-type": "application/json; charset=UTF-8",
				},
			})
				.then(function (response) {
					if (response.ok) {
						return response.json();
					}
					return Promise.reject(response);
				})
				.then(function (data) {
					console.log(data);
				})
				.catch(function (error) {
					console.warn(error);
				});
		});
	}
	
});
