# LoginDemo

Ein Laravel-basiertes Authentifizierungssystem, entwickelt als technische Programmieraufgabe im Rahmen einer Bewerbung für die betriebliche Praxisphase. Das Projekt demonstriert die Implementierung von Kernfunktionen wie Benutzerregistrierung, Login-Logik und Middleware-Schutz in einer containerisierten Umgebung.

## 🛠 Technische Spezifikationen

*   **Framework:** Laravel 11.x
*   **Laufzeit:** Docker / Laravel Sail (PHP 8.4)
*   **Datenbank:** MySQL 8.4
*   **Frontend:** Bootstrap 5
*   **Architektur:** MVC-Muster mit Form-Request-Validation und Middleware-Integration

## 🚀 Entwicklungsprozess

Die Entwicklung erfolgte hybrid, um eine effiziente Bereitstellung zu gewährleisten:

*   **Prototyping:** Schnelle Umsetzung der Kernlogik unter Laravel Herd (Windows).
*   **Isolierung:** Migration in eine Docker-Umgebung (Laravel Sail) zur Sicherstellung der Versionskompatibilität (insbesondere MySQL 8.4).
*   **Laufzeit:** Validierung der Container-Struktur innerhalb einer WSL2-Umgebung (Ubuntu).

## ⚙️ Installation & Local Setup

**Voraussetzungen:** Docker Desktop, WSL2 und Git.

### 1. Repository vorbereiten

```bash
git clone -b docker-version https://github.com/Arya-Systems-Ops/LoginDemo.git
cd LoginDemo
cp .env.example .env
```

### 2. Abhängigkeiten installieren

Die Installation der PHP-Abhängigkeiten erfolgt über einen temporären Container, um lokale PHP-Konflikte zu vermeiden:

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php84-composer:latest \
    composer install --ignore-platform-reqs
```

### 3. Umgebung initialisieren

Start der Docker-Container und Einrichtung der Datenbank-Struktur inklusive Testdaten:

```bash
./vendor/bin/sail up -d
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate --seed
```

### 4. Frontend-Build (Optional)

Da Bootstrap verwendet wird, sind die Assets bereits kompiliert. Falls Änderungen am Design vorgenommen werden, müssen sie neu gebaut werden:

```bash
./vendor/bin/sail npm install
./vendor/bin/sail npm run build
```

## 🔑 Test-Zugang

Die Anwendung ist standardmäßig unter [http://localhost:8080](http://localhost:8080) erreichbar.

Für die erste Prüfung wurde ein Test-Account über den Database-Seeder angelegt:

| Feld | Wert |
| :--- | :--- |
| **E-Mail** | `test@example.com` |
| **Passwort** | `password123` |

---

**Autor:** Arya-Systems-Ops  
*Umschüler zum Fachinformatiker für Anwendungsentwicklung*
