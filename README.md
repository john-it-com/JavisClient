# Javis API Client

## Benutzung

Um den Javis API Client zu nutzen, muss dieser entweder in ein bestehendes Symfony Projekt mittel Composer geladen werden.

Sollte kein Symfony Projekt verwendet werden, kann auf die Klassen (nach einem composer install) nach Einbindung des Autoloaders zugegriffen werden.

    $loader = require 'vendor/autoload.php';
    
Der Client kann so instanziert werden:

    $client = new \b5c\Javis\Client('example');
    
Dabei ist example mit dem Namen der Instanz zu ersätzen.

## Vorhandene Methoden

Derzeit sind die folgenden Methoden vorhanden:

### getSeminars()

Gibt eine Array mit Seminaren (siehe b5c\Javis\Model\Seminar) zurück.

### getSeminarsByTag(tagname)

Gibt eine Array mit Seminaren (siehe b5c\Javis\Model\Seminar) die einen bestimmten Tag haben zurück.

### getRawData($path, $parameters=array(), $method=APIAccessor::HTTP_GET)

Diese Methode kann verwendet werden um direkt auf die API zuzugreifen. Dabei werden die Daten nicht in Models geladen. Hillfreich um schnell und einfach auf neue API Funktionen zugreifen zu können.