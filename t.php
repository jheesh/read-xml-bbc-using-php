<?php
$sxml = simplexml_load_file("https://information-syndication.api.bbc.com/articles?api_key=[KEY_API_HERE]&index=indonesia-majalah&mixin=summary&mixin=hero_images&mixin=thumbnail_images");
$namespaces = $sxml->getNamespaces(true);

foreach($sxml->results->article as $name => $results)
{
    echo $results->headline."<br>";
?> <a href="<?php echo $results->link; ?>"><?php echo $results->headline ?></a><br>

<?php 
    echo $results->summary."<br>";
    echo $results->pubDate."<br>";
    $thumbnail = $results->children(@$namespaces['media'])->thumbnail;
    $attr = $thumbnail->attributes();
    ?>
    <img src="<?php echo $attr['url'] ;?>" height="81" width="144">
    <?php 
}
?>


