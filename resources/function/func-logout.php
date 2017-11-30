<?php
if (isset($_POST['logoutSubmit'])) {
    session_start();
    session_unset();
    session_destroy();
    header('Location: /TastyRecipes/tsrc/View/FirstPage');
    exit();
}