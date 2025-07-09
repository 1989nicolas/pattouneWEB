<?php
echo "Date du jour : "; setlocale(LC_ALL, 'fr_FR') ; echo date('l d F Y')/*('l d F Y') même chose mais sans le format français*/;
$menuHeader = [
    "Accueil" => "page2.php",
    "Gestion des animaux" => "gestion_animal.php",
    "À propos du projet" => [
        "Versions du projet" => "version.php",
        "ToDo&Done List" => "gestion_projet.php",
        "Documentation API" => "api/readme.txt"
    ],
    "-- [Mode Acilnos] --" => [
        "Debug - Page de confirmation" => "confirmation.php",
        "Page de test" => "test.php",
        "XAMP Config" => "../index.php"
    ]
    ];
?>
<nav role="navigation" aria-label="Menu principal">
<?php
echo '<ul class="menu" role="menubar">';
foreach ($menuHeader as $label => $item) {
    if (is_array($item)) {
        echo "<li class='has-submenu' role='menuitem' aria-haspopus='true' aria-expanded='false' tabindex='0'>$label<ul class='submenu' role='menu'>";
        foreach ($item as $subLabel => $subLink) {
            echo "<li><a href='$subLink' role='menuitem' tabindex='-1'>$subLabel</a></li>";
        }
        echo "</ul></li>";
    } else {
        echo "<li><a href='$item' role='menuitem' tabindex='0'>$label</a></li>";
    }
}
echo '</ul>';
?>
</nav>
