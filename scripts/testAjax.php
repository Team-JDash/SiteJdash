<?php
//connexion à la base de données 
define('DB_NAME', 'jdash');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
 
$link   =   mysql_connect( DB_HOST , DB_USER , DB_PASSWORD );
mysql_select_db( DB_NAME , $link );
 
//recherche des résultats dans la base de données
/*$result =   mysql_query( 'SELECT post_title , post_date , guid
                          FROM wp_posts
                          WHERE post_status = \'publish\'
                          AND post_title LIKE \'' . safe( $_GET['q'] ) . '%\'
                          LIMIT 0,20' );*/

print_r("SELECT *  FROM `plugin` WHERE `nom` LIKE '%".$_GET['q']."%' ");
$result =   mysql_query( "SELECT *  FROM `plugin` WHERE `nom` LIKE '%".$_GET['q']."%' ");
print_r("print:".$result);
// affichage d'un message "pas de résultats"
if( mysql_num_rows( $result ) == 0 )
{
?>
    <h3 style="text-align:center; margin:10px 0;">Pas de r&eacute;sultats pour cette recherche</h3>
<?php
}
else
{
  print_r($result);
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
 
/*****
fonctions
*****/
function safe($var)
{
	$var = mysql_real_escape_string($var);
	$var = addcslashes($var, '%_');
	$var = trim($var);
	$var = htmlspecialchars($var);
	return $var;
}
?>