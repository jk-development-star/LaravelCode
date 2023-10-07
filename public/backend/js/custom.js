(function ($) {
    "use strict";
    $('.editor').summernote({
        tabsize: 2,
        height: 300
    });
    $( "#datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy/mm/dd"
    });
    $( "#datepicker1" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy/mm/dd"
    });
    $( "#datepicker2" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy/mm/dd"
    });
    $( "#timepicker" ).timepicker();
    $('.select2').select2();

    var counter = 0;
    $(document).on("click",".add_social_more",function(){
      	var add_social = $("#add_social").html();
      	$(this).closest(".social_item").append(add_social);
      	counter++;
    });
	$(document).on("click",".remove_social_more",function(event){
		$(this).closest(".delete_social").remove();
		counter -= 1
	});

    var counter1 = 0;
    $(document).on("click",".add_photo_more",function(){
      	var add_photo = $("#add_photo").html();
      	$(this).closest(".photo_item").append(add_photo);
      	counter1++;
    });
	$(document).on("click",".remove_photo_more",function(event){
		$(this).closest(".delete_photo").remove();
		counter1 -= 1
	});


    var counter2 = 0;
    $(document).on("click",".add_video_more",function(){
      	var add_video = $("#add_video").html();
      	$(this).closest(".video_item").append(add_video);
      	counter2++;
    });
	$(document).on("click",".remove_video_more",function(event){
		$(this).closest(".delete_video").remove();
		counter2 -= 1
	});

    var counter3 = 0;
    $(document).on("click",".add_additional_feature_more",function(){
      	var add_additional_feature = $("#add_additional_feature").html();
      	$(this).closest(".additional_feature_item").append(add_additional_feature);
      	counter3++;
    });
	$(document).on("click",".remove_additional_feature_more",function(event){
		$(this).closest(".delete_additional_feature").remove();
		counter3 -= 1
	});


})(jQuery);
