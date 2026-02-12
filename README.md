# LoginDemo

Ein Laravel-basiertes Authentifizierungssystem, entwickelt als technische Programmieraufgabe im Rahmen einer Bewerbung für die betriebliche Praxisphase. Diese Version ist für die native Ausführung mit Laravel Herd optimiert, um eine schnelle und bequeme Einrichtung zu ermöglichen.

## Technische Spezifikationen

* Framework: Laravel 11.x
* Laufzeit: PHP 8.4 (via Laravel Herd)
* Datenbank: MySQL (lokal oder via Herd Services)
* Frontend: Bootstrap 5
* Architektur: MVC-Muster mit Form-Request-Validation und Middleware-Integration

## Entwicklungsprozess

Der Fokus bei dieser Version lag auf einer effizienten und unkomplizierten Entwicklung:

* Bequemlichkeit: Nutzung von Laravel Herd für ein Zero-Config Setup der PHP-Umgebung.
* Prototyping: Direkte Umsetzung der Logik ohne Container-Verwaltung.
* Native Tools: Verwendung der lokalen CLI für Composer und Artisan-Befehle.

## Installation und Local Setup

Voraussetzungen: Laravel Herd, Node.js und Composer lokal installiert.

### 1. Repository vorbereiten

git clone https://github.com/Arya-Systems-Ops/LoginDemo.git

cd LoginDemo

cp .env.example .env

### 2. Abhängigkeiten installieren

Da Herd die PHP-Umgebung stellt, werden die Pakete direkt lokal installiert:

composer install
npm install
npm run build

### 3. Umgebung initialisieren

Erstelle eine leere Datenbank (z. B. via TablePlus oder Herd Services) und passe die Zugangsdaten in der .env an. Danach:

php artisan key:generate
php artisan migrate --seed

### 4. Browser-Aufruf

Das Projekt ist durch Herd automatisch unter der lokalen Domain erreichbar:
http://logindemo.test (oder dem Namen deines Projektordners).

## Test-Zugang

Für die erste Prüfung wurde ein Test-Account über den Database-Seeder angelegt:

| Feld | Wert |
| :--- | :--- |
| E-Mail | test@example.com |
| Passwort | password123 |

---

Autor: Arya-Systems-Ops
Umschüler zum Fachinformatiker für Anwendungsentwicklung
