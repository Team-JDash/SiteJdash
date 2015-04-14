(function($){

	$.get('../scripts/new_user.php', {"email":"toto", "password":"toto"}, function(data){
		console.log(data);

	}, 'json');



})(jQuery);