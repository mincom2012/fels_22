var count = 1;
var answers = [];
var words = [];

$('#next').click(function(){
	if(count < 20) {
		$("#show_"+count++).addClass('hidden');
		$("#show_"+count).removeClass('hidden');
		$("span").empty();
		$("span").append(count + "/20");
	}   else {
		if (answers.length === 21)
			$("#send").removeClass('hidden');
	}
});

$('#back').click(function(){
	if (count > 1) {
		$("#show_"+count--).addClass('hidden');
		$("#show_"+count).removeClass('hidden');
		$("span").empty();
		$("span").append(count + "/20");
	}
});

$("[id^=answer_]").on('click', function () {
	var questionID  = this.id;
	freAnswer       = questionID.substring(0, questionID.lastIndexOf('_'));
	answers[count]  = questionID.substring(questionID.lastIndexOf('_') +1, questionID.length);
	words[count]    = questionID.substring(questionID.indexOf('_') +1, questionID.lastIndexOf('_'));
	$("[id^="+freAnswer+"]").removeClass('btn-success');
	$("[id^="+freAnswer+"]").addClass('btn-default');

	$(this).removeClass('btn-default');
	$(this).addClass('btn-success');
});

$('#send').click(function(){
	$.ajax({
		url : '/Lessons/result',
		type: 'POST',
		data: {
			categoryId: $("#categoryId").text(),
			answers:answers,
			words:words
		},
		cache: false,
		success : function(response){
			$("#send").addClass('hidden');
			$("#view-result").removeClass('hidden');
			response = response.replace('\"','');
			var element = document.getElementById('view-result');
			element.href = '/Lessons/'+parseInt(response);
		}
	});
});
