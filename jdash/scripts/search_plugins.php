<?php
require 'class/Functions.php';

print_r($_GET);

$search_app = new Functions;
$search_app->set_name_application($_GET["search"]);
//print_r($search_app->get_name_application());

print_r(json_encode($search_app->find_application()));




/*

// affichage d'un message "pas de résultats"
if( mysql_num_rows( $result ) == 0 )
{
?>
    <h3 style="text-align:center; margin:10px 0;">Pas de r&eacute;sultats pour cette recherche</h3>
<?php
}
else
{
    // parcours et affichage des résultats
    while( $post = mysql_fetch_object( $result ))
    {
    ?>
        <div class="article-result">
            <h3><a href="<?php echo $post->guid; ?>">< ?php echo utf8_encode( $post->post_title ); ?></a></h3>
            <p class="date"><?php echo $post->post_date; ?></p>
            <p class="url"><?php echo $post->guid; ?></p>
        </div>
    <?php
    }
}
 
*/
?>