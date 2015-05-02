$(document).ready(function() {
	// Lorsque je soumets le formulaire
	$('#New').on('submit', function(e) {
			e.preventDefault(); // J'empêche le comportement par défaut du navigateur, c-à-d de soumettre le formulaire

			var $this = $(this); // L'objet jQuery du formulaire

			// Je récupère les valeurs
			var pseudo = $('#pseudo').val();
			var mail = $('#email').val();
			var firstName = $('#prenom').val();
			var lastName = $('#nom').val();
			if( !$('#password_bis').val()==$('#password').val() )
				alert("password wrong");
			else
				var password = $('#password_bis').val();

  		if(pseudo === '' || mail === '' || password == '' || firstName == '' || lastName == '' ) {
					alert('Les champs doivent êtres remplis');
			} else {
					// Envoi de la requête HTTP en mode asynchrone
					$.ajax({
							url: $this.attr('action'), // Le nom du fichier indiqué dans le formulaire
							type: $this.attr('method'), // La méthode indiquée dans le formulaire (get ou post)
							data: $this.serialize(), // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
							dataType: 'json', // JSON
							success: function(json) {
								$.each(json, function(key, value) {
									//alert(key +'=>'+ value);
									 if(key == "msg")
								 			alert(value);
								});


							}
					});
			}
	});
});
