<?php
/**
 * SEUP - Instalacija tablice Pošiljatelji
 * Ova stranica kreira tablicu llx_a_posiljatelji
 */

echo "<h1>SEUP - Instalacija Tablice Pošiljatelji</h1>";
echo "<pre>";

// Prikaži upute za pokretanje
echo "=== UPUTE ZA INSTALACIJU ===\n\n";
echo "Za instalaciju tablice llx_a_posiljatelji imate 2 opcije:\n\n";

echo "OPCIJA 1 - AUTOMATSKA INSTALACIJA (PREPORUČENO):\n";
echo "1. Idi u Dolibarr → Setup → Modules\n";
echo "2. Deaktiviraj SEUP modul\n";
echo "3. Ponovno aktiviraj SEUP modul\n";
echo "   (To će automatski pokrenuti sve SQL skripte iz /seup/sql/)\n\n";

echo "OPCIJA 2 - RUČNA INSTALACIJA:\n";
echo "1. Pokreni SQL skriptu na MariaDB bazi:\n";
echo "   mysql -u [korisnik] -p [baza] < " . __DIR__ . "/sql/a_posiljatelji.sql\n\n";

echo "2. ALTERNATIVNO - kopiraj i izvrši SQL direktno u phpMyAdmin:\n\n";

// Pročitaj i prikaži SQL
$sql_file = __DIR__ . '/sql/a_posiljatelji.sql';
if (file_exists($sql_file)) {
    echo "--- SQL KOD ZA IZVRŠITI ---\n\n";
    $sql = file_get_contents($sql_file);
    echo $sql;
    echo "\n\n";
}

echo "=== PROVJERA ===\n\n";
echo "Nakon instalacije, provjeri da li tablica postoji:\n";
echo "  SHOW TABLES LIKE 'llx_a_posiljatelji';\n";
echo "  DESCRIBE llx_a_posiljatelji;\n\n";

echo "=== DATOTEKE SUSTAVA ===\n\n";

$files = [
    'SQL migracija' => 'sql/a_posiljatelji.sql',
    'Helper klasa' => 'class/suradnici_helper.class.php',
    'Stranica' => 'pages/suradnici.php',
    'JavaScript' => 'js/suradnici.js',
    'CSS' => 'css/suradnici.css'
];

foreach ($files as $name => $path) {
    $full_path = __DIR__ . '/' . $path;
    $exists = file_exists($full_path) ? '✓ POSTOJI' : '✗ NE POSTOJI';
    $size = file_exists($full_path) ? ' (' . number_format(filesize($full_path)) . ' bytes)' : '';
    echo sprintf("%-20s: %s %s%s\n", $name, $exists, $path, $size);
}

echo "\n=== STRUKTURA TABLICE ===\n\n";

echo "llx_a_posiljatelji:\n";
echo "  - rowid (PK, AUTO_INCREMENT)\n";
echo "  - naziv (VARCHAR 255, NOT NULL)\n";
echo "  - adresa (VARCHAR 255)\n";
echo "  - oib (VARCHAR 32, UNIQUE)\n";
echo "  - telefon (VARCHAR 64)\n";
echo "  - kontakt_osoba (VARCHAR 255)\n";
echo "  - email (VARCHAR 255)\n";
echo "  - datec (DATETIME, DEFAULT CURRENT_TIMESTAMP)\n";
echo "  - tms (TIMESTAMP, AUTO UPDATE)\n";
echo "  - entity (INT, DEFAULT 1)\n\n";

echo "</pre>";

echo "<h2>Sljedeći koraci:</h2>";
echo "<ol>";
echo "<li><strong>Preporučeno:</strong> Deaktiviraj i ponovno aktiviraj SEUP modul</li>";
echo "<li>Ili: Kopiraj SQL kod iznad i izvrši ga u MariaDB bazi</li>";
echo "<li>Provjeri da li tablica llx_a_posiljatelji postoji</li>";
echo "<li>Pristupite stranici /custom/seup/pages/suradnici.php</li>";
echo "</ol>";
?>
