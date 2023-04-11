$(function () {
	const elemlevel = $("#elem");
	const highschool = $("#highschool");
	const college = $("#college");
	const public_sec = $("#public");
	const classification = $('.classification');
	let searchstat = false;
	let url = "/page/fetchDefaultResultType";
	let linkdata = getData(url).link;
	let scaledata = getData(url).scale;
	let rotatedata = getData(url).rotate;
	let labeldata = getData(url).label;

	function getShowList(school){
		if (school === "초등학생") {
			elemlevel.show();
			highschool.hide();
			college.hide();
			public_sec.hide();
			classification.removeClass('d-none')
		} else if (school === "중학생") {
			highschool.show();
			elemlevel.hide();
			college.hide();
			public_sec.hide();
			classification.removeClass('d-none')
		} else if (school === "고등학생") {
			highschool.show();
			elemlevel.hide();
			college.hide();
			public_sec.hide();
			classification.removeClass('d-none')
		} else if (school === "대학") {
			college.show();
			elemlevel.hide();
			highschool.hide();
			public_sec.hide();
			classification.removeClass('d-none')
		} else if (school === "일반인") {
			public_sec.show();
			elemlevel.hide();
			highschool.hide();
			college.hide();
			classification.removeClass('d-none')
		} else {
			elemlevel.hide();
			highschool.hide();
			college.hide();
			public_sec.hide();
			classification.addClass('d-none')
		}
	}

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

	function getSelectedLinkData(param){	
		var tmp = null;	
		$.ajax({
			type: "POST",
			url: "/page/getSelectedData", 
			data: {data: param},
			dataType: "json",  
			cache:false,
			success: function(result){
				tmp = result;  //as a debugging message.
			},
			error: function () {
				console.log("error");
			},
		});// you have missed this bracket
		
		return tmp;
	}

	function displayData(scaledata,rotatedata,labeldata,type)
	{
		var scaleContainer = $("#scaleCont");
		var scaletemp = $("#scaletemplate").html();
		
		let scaleTempdata = {
			type: type,
			scalesh: scaledata[0],
			rotate1: rotatedata[0],
			labelsh1: labeldata[0],
			labelsh2: labeldata[1],
			scalets: scaledata[1],
			rotate2: rotatedata[1],
			labelts1: labeldata[2],
			labelts2: labeldata[3],
			scaleth: scaledata[2],
			rotate3: rotatedata[2],
			labelth1: labeldata[4],
			labelth2: labeldata[5]			
		};
		scaleContainer.append(Mustache.render(scaletemp, scaleTempdata));
	}

	function displaylink(result)
	{	// get linklist
		var linkContainer = $("#linkCont");
		var link = $("#linktemplate").html();
		$.each(result, function (i, d) {	
			// i = uppercase name , d.name = lowercase name	
			let divid = d.name;	
			let tempdata = {
				type: i,
				type_desc: d.desc,
				bgcolor: d.bgcolor,
				color: d.color,
				id:d.name,
				linkId: d.name+"link"
			};
			let bgcolor = d.bgcolor;
			let color = d.color;
			linkContainer.append(Mustache.render(link, tempdata));
			
			$("#" + divid).css("background-color", bgcolor);
			$("#" + divid).css("color", color);
		});		
	}

	function makeAllClickableLink(data)
	{
		$.each(data, function (i,d) {
			let name = d.name+"link";
			$('#'+name).click(function () {
				let value = this.getAttribute('data-value');
				
				let scaleContainer = $("#scaleCont");
				scaleContainer.fadeOut('fast').fadeIn('slow');
				$.ajax({
					type: "POST",
					url: "/page/getSelectedData", 
					data: {data: value},
					dataType: "json",  
					cache:false,
					success: function(r){
						scaleContainer.empty();
						displayData(r.scale,r.rotate,r.label,value);
						
					},
					error: function () {
						console.log("error");
					},
				});	
			});
		});
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

	const list = [
		"SSH",
		"SST",
		"HTH",
		"HSH",
		"STT",
		"HTT",
		"HST",
		"STH",
	]
	const ctx = document.getElementById("pie-chart");
	var myChart = new Chart(ctx, {
		type: "pie",
		data: {
			labels:list,
			datasets: [
				{
					label: "answers",
					backgroundColor: [
						"#6370E3",
						"#BEC5FF",
						"#42C696",
						"#9AF5D4",
						"#BB6BED",
						"#DDB1FF",
						"#FF9C27",
						"#FFD772",
					],
					
					data: [],
				},
			],
		},

		options: {
			responsive: true,
			plugins:{
				legend: {
					position: "bottom",
					align: "center",
					color: "rgb(255, 99, 132)",
					labels: {
						font: {
							size: 15,
						},
					},
				},
				tooltip: {
					font:{
						size: 18
					},
					callbacks: {
						label: function(context){
							// console.log(context)
							return '';
						},
						
					},
				},
			},
			// onHover: function(event,activeEls){
			// 	if(activeEls.length !==0){
			// 		let value = list[activeEls[0].index];					
			// 		let scaleContainer = $("#scaleCont");
			// 		$.ajax({
			// 			type: "POST",
			// 			url: "/page/getSelectedData", 
			// 			data: {data: value},
			// 			dataType: "json",  
			// 			cache:false,
			// 			success: function(r){
			// 				scaleContainer.empty();
			// 				displayData(r.scale,r.rotate,r.label,value);
							
			// 			},
			// 			error: function () {
			// 				console.log("error");
			// 			},
			// 		});	

			// 	}				
			// }

		}
		
	});


	

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

	var data = document.getElementById("school_level").value;
	getShowList(data);

	$("#school_level").change(function () {
		var data = document.getElementById("school_level").value;
		getShowList(data);
	});

	$("#search").on("click", function () {
		var url = "/page/lookUpValueStat";
		var data = $("#searchform").serialize();
		$.ajax({
			type:'ajax',
			method: 'post',
			url: url,
			data: data,
			async: false,
			dataType: 'json',
			success: function(response){
				console.log(response.data)
				if(response.status === true){	
					myChart.data.datasets[0].data = response.data;
					myChart.update();
				}else{
					//console.log("no data");
					var title = '앗 미안 해요!!!';
					var message = response.error;
					var type = 'error';
					modal(title,message,type);
				}
			},
			error: function(xhr, status, error){
				var title = '앗 미안 해요!!!';
				var message = error;
				var type = 'error query';
				modal(title,message,type);
			}
		});			
	});

	
	let piedata = getData(url).data;

	myChart.data.datasets[0].data = piedata;
	myChart.update();
	
	displaylink(linkdata);
	displayData(scaledata,rotatedata,labeldata,"SSH");
	makeAllClickableLink(linkdata);
	validatesession() === true && validateanswer() === true ? resetSurvey(): false;

});
