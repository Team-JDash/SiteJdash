$(document).ready(function() {
	// Lorsque je soumets le formulaire
	$('#emailForm1').on('submit', function(e) {
			e.preventDefault(); // J'empêche le comportement par défaut du navigateur, c-à-d de soumettre le formulaire

			var $this = $(this); // L'objet jQuery du formulaire

			// Je récupère les valeurs
			var mail = $('#email').val();
			var message = $('#message').val();


			// Je vérifie une première fois pour ne pas lancer la requête HTTP
			// si je sais que mon PHP renverra une erreur
			if(message === '' || mail === '') {
					alert('Les champs mail et message doivent êtres remplis');
			} else {
					// Envoi de la requête HTTP en mode asynchrone
					$.ajax({
							url: $this.attr('action'), // Le nom du fichier indiqué dans le formulaire
							type: $this.attr('method'), // La méthode indiquée dans le formulaire (get ou post)
							data: $this.serialize(), // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
							dataType: 'json', // JSON
							success: function(json) {
								console.log(json);
								$.each(json, function(key, value) {
									if(key == "msg")
										alert(value);
								});


							}
					});
			}
	});
});
