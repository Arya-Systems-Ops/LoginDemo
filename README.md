#!/bin/bash

# Ermittle den aktuellen Git-Branch
BRANCH=$(git rev-parse --abbrev-ref HEAD)

echo "Aktueller Branch: $BRANCH"

if [ "$BRANCH" == "docker-version" ]; then
    echo "Erstelle README für Docker-Version..."
    cat <<EOF > README.md
# LoginDemo - Laravel & Docker Projekt

Dieses Projekt wurde als Bearbeitung einer praktischen Programmieraufgabe für meine Bewerbung zur betrieblichen Praxisphase erstellt. Es umfasst die Entwicklung eines vollständigen Authentifizierungssystems auf Basis von Laravel.

### Die Aufgabenstellung im Überblick:
- **Setup:** Erstellung eines neuen Laravel-Projekts ("LoginDemo") in einer lokalen Entwicklungsumgebung (Docker).
- **Datenbank:** SQL-Datenbank \`login_demo\` mittels Laravel Migrations.
- **Features:** Umsetzung von Login- und Registrierungs-Funktionalität inklusive Logik im Controller.
- **Validierung:** Nutzung von Form-Request-Validation (E-Mail/Passwort).
- **Sicherheit:** Schutz der Willkommensseite durch Middleware für angemeldete Nutzer.
- **Design:** Benutzerfreundliche Darstellung mit Bootstrap/Tailwind.

**Besonderer Fokus:** Ich habe das Projekt so vorbereitet, dass der Einstieg für den Benutzer extrem einfach ist. Die Konfigurationsdateien sind bereits so eingestellt, dass man direkt loslegen kann.

## Entwicklungsprozess
Die Entwicklung erfolgte hybrid, um eine effiziente Bereitstellung zu gewährleisten:
1. **Prototyping:** Schnelle Umsetzung der Kernlogik unter Laravel Herd (Windows).
2. **Isolierung:** Migration in eine Docker-Umgebung (Laravel Sail) zur Sicherstellung der Versionskompatibilität (insbesondere MySQL 8.4).
3. **Laufzeit:** Validierung der Container-Struktur innerhalb einer WSL2-Umgebung (Ubuntu).

## Voraussetzungen
Bevor Sie starten, stellen Sie bitte sicher, dass folgende Software installiert ist:
- **Docker Desktop** (muss gestartet sein)
- **WSL2** (Linux Terminal)
- **Git**

---

## Schritt-für-Schritt Anleitung

### 1. Repository klonen & vorbereiten
\`\`\`bash
git clone -b docker-version https://github.com/Arya-Systems-Ops/LoginDemo.git
cd LoginDemo
cp .env.example .env
\`\`\`

### 2. Composer Abhängigkeiten installieren
\`\`\`bash
docker run --rm \\
    -u "\$(id -u):\$(id -g)" \\
    -v "\$(pwd):/var/www/html" \\
    -w /var/www/html \\
    laravelsail/php84-composer:latest \\
    composer install --ignore-platform-reqs
\`\`\`

### 3. Container starten & Initialisieren
\`\`\`bash
./vendor/bin/sail up -d
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate --seed
\`\`\`

## Testen & Login
Die Anwendung ist erreichbar unter: **http://localhost**

**Test-Account:**
| Feld | Wert |
| :--- | :--- |
| **E-Mail** | \`test@example.com\` |
| **Passwort** | \`password123\` |

---
**Autor:** Arya-Systems-Ops
*Umschüler zum Fachinformatiker für Anwendungsentwicklung*
EOF

else
    echo "Erstelle README für Native-Version (main)..."
    cat <<EOF > README.md
# LoginDemo (Native Environment)

Dieses Projekt ist die Basis-Version des Authentifizierungssystems, entwickelt in einer nativen Entwicklungsumgebung mit **Laravel Herd**. Es dient als technischer Nachweis für die Umsetzung eines Login- und Registrierungssystems im Rahmen meiner Bewerbung für die betriebliche Praxisphase.

## Technische Spezifikationen
* **Framework:** Laravel 11.x
* **Umgebung:** Laravel Herd (empfohlen) / PHP 8.4
* **Datenbank:** MySQL (lokal)
* **Frontend:** Bootstrap 5

> **Hinweis:** Dies ist der \`main\`-Branch für die native Ausführung. Für die isolierte Docker-Version wechseln Sie bitte in den Branch \`docker-version\`.

## Entwicklungsprozess
1. **Setup:** Initialisierung über Laravel Herd für schnelle native Entwicklung.
2. **Datenbank:** Lokale MySQL-Instanz.
3. **Validierung:** Form-Requests zur Absicherung der Daten.

## Installation & Setup (Lokal)
Voraussetzungen: **Laravel Herd**, **Node.js** und **MySQL**.

### 1. Repository klonen
\`\`\`bash
git clone https://github.com/Arya-Systems-Ops/LoginDemo.git
cd LoginDemo
\`\`\`

### 2. Konfiguration
\`\`\`bash
cp .env.example .env
\`\`\`

### 3. Installation
\`\`\`bash
composer install
php artisan key:generate
php artisan migrate --seed
npm install
npm run build
\`\`\`

## Zugriff & Test-Daten
Erreichbar unter der Herd-URL oder via:
\`\`\`bash
php artisan serve
\`\`\`
URL: **http://127.0.0.1:8000**

**Test-Account:**
- **E-Mail:** \`test@example.com\`
- **Passwort:** \`password123\`

---
**Autor:** Arya-Systems-Ops
*Umschüler zum Fachinformatiker für Anwendungsentwicklung*
EOF
fi

echo "README.md wurde erfolgreich aktualisiert!"

# Optional: Automatisch commiten
# git add README.md
# git commit -m "docs: README.md via Skript aktualisiert"
# git push origin \$BRANCH
