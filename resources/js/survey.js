$(function(){
    $('#btnSave').click(function(){            
        $.ajax({
            type:'ajax',
            method: 'post',
            url: url,
            data: data,
            async: false,
            dataType: 'json',
            success: function(response){
                var error = response.error;
                var type = response.type;
                if (response.success) {
                    $('#myForm')[0].reset();
                    $('.alert-success').html(type + 'successful.').fadeIn().delay(2000).fadeOut('slow');
                    accountTable.ajax.reload(null, false);
                    if(type === "Update"){$('#myModal').modal('hide');}
                }else{
                    $('#myModal').modal('hide');
                    $('.alert-danger').html(error).fadeIn().delay(2000).fadeOut('slow');
                }
            },
            error: function(){
                $('.alert-danger').html('Unable to add record.').fadeIn().delay(2000).fadeOut('slow');
                $('#myModal').modal('hide');
            }
        });
    });

    var batTemplate = "" +
        "<div class='col-md-12 col-xs-12 subinfodiv'>" +
          "<div class='col-md-3 col-xs-12 pull-right'>" +
              "<div class='col-md-12 text-right read' id='{{divid}}' data-kind='{{kind}}' data-id='{{id}}' ><i class='fa fa-window-close fa-2x' aria-hidden='true'></i></div>" + 
              "<div class='col-md-12 text-right'><time class='timeago' datetime='{{createAt}}'>{{createAt}}</time></div>" + 
          "</div>" +
          "<div class='col-md-4 col-xs-12 pull-left'>" +
              "<h4 class='text-left'>{{date}}</h4>"+
              "<span class='notification'>{{message}}</span><br />" +
              "<span class='client'>{{name}}</span><br />" +
              "<span class='sched'>{{instructor}}({{startTime}}~{{endTime}})</span><br />" +
          "</div>" +
        "</div>";

    var paginationcont = "" +
        '<div class="scale-div col-lg-6" data-value="agree" data-qnum="1">'+
            '<picture>'+
                '<source srcset="<?php echo base_url({{agree_img}}) ?>"'+
                    'type="image/svg+xml">'+
                '<img class="img-fluid" src="<?php echo base_url({{agree_img}}) ?>"'+
                    'alt="agree" id="answer">'+
            '</picture>'+

            '<div class="card-title-t text-center p-2 text-color">'+
                '<h5>{{agree_title}}</h5>'+
            '</div>'+
            '<div class="card-body card-height text-color">{{agree_desc}}</div>'+
        '</div>'+
        '<div class="scale-div col-lg-6" data-value="disagree" data-qnum="1">'+
            '<picture>'+
                '<source srcset="<?php echo base_url({{disagree_img}}) ?>"'+
                    'type="image/svg+xml">'+
                '<img class="img-fluid" src="<?php echo base_url({{disagree_img}}) ?>" alt="agree" id="answer">'+
            '</picture>'+
            '<div class="card-title-t text-center p-2 text-color">'+
                '<h5>{{disagree_desc}}</h5>'+
            '</div>'+
            '<div class="card-body card-height text-color">{{disagree_desc}}</div>'+
        '</div>';
        
        listContainer.append(Mustache.render(batTemplate, data)); 
        $.ajax({
            url:'../../survey_project/survey/get_question',
            async:false,
            dataType:'json',
            success: function(data){
                console.log(data)
            },
            error: function(){
                console.log('error')
            }
        });
})