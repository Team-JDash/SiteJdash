$(document).ready( function() {
  // détection de la saisie dans le champ de recherche
  $('#recherche').keyup( function(){
    $field = $(this);
    $('#results').html(''); // on vide les resultats
    $('#ajax-loader').remove(); // on retire le loader
 
    // on commence à traiter à partir du 2ème caractère saisie
    if( $field.val().length > 1 )
    {
      // on envoie la valeur recherché en GET au fichier de traitement
      $.ajax({
    type : 'GET', // envoi des données en GET ou POST
  url : '../scripts/search_plugins.php' , // url du fichier de traitement
  data : 'search='+$(this).val() , // données à envoyer en  GET ou POST
  beforeSend : function() { // traitements JS à faire AVANT l'envoi
    $field.after('<img src="../images/ajax_loading.gif" alt="loader" id="ajax-loader" />'); // ajout d'un loader pour signifier l'action
  },
  success : function(data){ // traitements JS à faire APRES le retour d'ajax-search.php
    $('#ajax-loader').remove(); // on enleve le loader
    var obj = jQuery.parseJSON(data);
    $('#results').html(obj.results); // affichage des résultats dans le bloc
  }
      });
    }   
  });
});