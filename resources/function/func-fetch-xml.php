<?php

function getXMLFile() {
    $filePath = "resources/recipes.xml";
    $xml = simplexml_load_file($filePath) or die("Couldn't load file");
    return $xml;
}
function getTitle($index) {
    $xml = getXMLFile();
    echo $xml->recipe[$index]->title;
}

function getDescription($index) {
    $xml = getXMLFile();
    echo $xml->recipe[$index]->description->li;
}

function getIngredients($index) {
    $xml = getXMLFile();
    foreach ($xml->recipe[$index]->ingredient->children() as $ingredient) {
        echo "<li>$ingredient</li>";
    }

}

function getInstructions($index) {
    $xml = getXMLFile();
    foreach ($xml->recipe[$index]->recipetext->children() as $instruction) {
        echo "<li>$instruction</li>";
    }
}
