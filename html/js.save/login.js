$(document).ready(function() {
	// Lorsque je soumets le formulaire
	$('#loginForm').on('submit', function(e) {
			e.preventDefault(); // J'empÃªche le comportement par dÃ©faut du navigateur, c-Ã -d de soumettre le formulaire

			var $this = $(this); // L'objet jQuery du formulaire

			// Je rÃ©cupÃ¨re les valeurs
			var pseudo = $('#email').val();
			var mail = $('#password').val();

			// Je vÃ©rifie une premiÃ¨re fois pour ne pas lancer la requÃªte HTTP
			// si je sais que mon PHP renverra une erreur
			if(pseudo === '' || mail === '') {
					alert('Les champs doivent Ãªtres remplis');
			} else {
					// Envoi de la requÃªte HTTP en mode asynchrone
					$.ajax({
							url: $this.attr('action'), // Le nom du fichier indiquÃ© dans le formulaire
							type: $this.attr('method'), // La mÃ©thode indiquÃ©e dans le formulaire (get ou post)
							data: $this.serialize(), // Je sÃ©rialise les donnÃ©es (j'envoie toutes les valeurs prÃ©sentes dans le formulaire)
							dataType: 'json', // JSON
							success: function(json) {
								$.each(json, function(key, value) {
									if(key == "msg"){
										alert(value);
									}
									if(key == "session"){
										$.each(json.session, function(key, object) {
											// $.each(object, function(property, value){
												console.log(key+"->"+object);
												$.cookie(key, object);
											// });
										});
									}									
								});


							}
					});
			}
	});
});
