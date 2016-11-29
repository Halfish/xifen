$(function(){
	$('#btnSubmit').click(function(){
        var data = $('form').serializeArray()[0];
        if (data){
            $.redirect('/team_manage', data);
        }
	});
});
