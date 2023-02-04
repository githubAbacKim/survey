$(function () {
	const elemlevel = $("#elem");
	const highschool = $("#highschool");
	const college = $("#college");
	const public_sec = $("#public");

	function getShowList(school){
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
	{	//display scale
		// console.log(scaledata)
		// console.log(rotatedata)
		// console.log(labeldata)
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
			//console.log(id);	
			$('#'+name).click(function () {
				let value = this.getAttribute('data-value');
				let scaleContainer = $("#scaleCont");
				
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

	function displayPie(piedata){
		// new Chart(document.getElementById("pie-chart"), {
		// 	type: "pie",
		// 	data: {
		// 		labels: [
		// 			"SSH",
		// 			"SST",
		// 			"HTH",
		// 			"HSH",
		// 			"STT",
		// 			"HTT",
		// 			"HST",
		// 			"STH",
		// 		],
		// 		datasets: [
		// 			{
		// 				label: "answers",
		// 				backgroundColor: [
		// 					"#6370E3",
		// 					"#BEC5FF",
		// 					"#42C696",
		// 					"#9AF5D4",
		// 					"#BB6BED",
		// 					"#DDB1FF",
		// 					"#FF9C27",
		// 					"#FFD772",
		// 				],
		// 				data: piedata,
		// 			},
		// 		],
		// 	},
		// 	options: {
		// 		tooltipTemplate: "<%= value %>",

		// 		showTooltips: true,

		// 		onAnimationComplete: function() {
		// 			this.showTooltip(this.datasets[0].points, true);
		// 		},
		// 		tooltipEvents: [],

		// 		responsive: true,
		// 		legend: {
		// 			position: "bottom",
		// 			align: "center",
		// 			color: "rgb(255, 99, 132)",
		// 			labels: {
		// 				font: {
		// 					size: 30,
		// 				},
		// 			},
		// 		},
		// 	}, 
			
		// });
		const options = {
			tooltipTemplate: "<%= value %>",

			showTooltips: true,
		  
			onAnimationComplete: function() {
			  this.showTooltip(this.datasets[0].points, true);
			},
			tooltipEvents: []
		}
		new Chart(document.getElementById("pie-chart"),options)
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
				if(response.status === true){	
					displayPie(response.data);
				}else{
					//console.log("no data");
					var title = '앗 미안 해요!!!';
					var message = response.error;
					var type = 'error';
					modal(title,message,type);
				}
			},
			error: function(response){
				//console.log("error query");
				var title = '앗 미안 해요!!!';
				var message = response.error;
				var type = 'error query';
				modal(title,message,type);
			}
		});			
	});

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

	let url = "/page/fetchDefaultResultType";
	let piedata = getData(url).data;
	displayPie(piedata);

	let linkdata = getData(url).link;
	let scaledata = getData(url).scale;
	let rotatedata = getData(url).rotate;
	let labeldata = getData(url).label;
	
	displaylink(linkdata);
	displayData(scaledata,rotatedata,labeldata,"SSH");
	makeAllClickableLink(linkdata);

	
});
