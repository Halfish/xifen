$(function(){
	$('#btnEdit').click(function(){
		$.ajax({
			url: '/team_edit',
			data: $('form').serialize(),
			type: 'POST',
			success: function(response){
                console.log(response);
                if (response == 'success'){
                    alert('修改成功')
                    window.location = '/show_team_manage';
                }
                else {
                    alert('修改失败');
                }
			},
			error: function(error){
				console.log(error);
			}
		});
	});
    $('#btnDelete').click(function(){
        var r = confirm("确定删除团队吗？团队中的用户同时也会被删除！");
        if (r == true){
            $.ajax({
                url: '/team_delete',
                data: $('form').serialize(),
                type: 'POST',
                success: function(response){
                    console.log(response);
                    if (response == 'success'){
                        alert('删除成功')
                        window.location = '/show_team_manage';
                    }
                    else {
                        alert('删除失败');
                    }
                },
                error: function(error){
                    console.log(error);
                }
            });
        }
	});

});
