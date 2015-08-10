# Javis Client

Der Javis Client bietet eine einfache Möglichkeit um auf die Daten Ihrer Javis Instanz per API zugreifen zu können.

Mehr Informationen zu Javis finden Sie auf der Webseite: http://www.javis.de/

Bei Fragen wenden Sie sich an den Support.

## Benutzung

Um den Javis Client zu nutzen, muss dieser entweder in ein bestehendes Symfony mittels Composer geladen werden.

    composer require b5c/javis-client

Sollte kein Symfony Projekt verwendet werden, kann auf die Klassen (nach einem `composer install`) nach Einbindung des Autoloaders zugegriffen werden.

    $loader = require 'vendor/autoload.php';
    
Der Client kann anschließend mit folgendem Aufruf instanziert werden:

    $client = new \b5c\Javis\Client('example');
    
Dabei ist `example` mit dem Namen der eigenen Instanz zu ersätzen.

## Vorhandene Methoden

Derzeit sind die folgenden Methoden vorhanden:

### getSeminars()

Gibt eine Array mit Seminaren (siehe `b5c\Javis\Model\Seminar`) zurück.

### getSeminarsByTag(tagname)

Gibt eine Array mit Seminaren (siehe `b5c\Javis\Model\Seminar`) zurück, die einen bestimmten Tag zugeordnet sind.

### getRawData($path, $parameters=array(), $method=APIAccessor::HTTP_GET)

Diese Methode kann verwendet werden um direkt auf die API zuzugreifen. Dabei werden die Daten nicht in Models geladen. Hillfreich um schnell und einfach auf neue API Funktionen zugreifen zu können.