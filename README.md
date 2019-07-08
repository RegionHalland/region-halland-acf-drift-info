# Front-end + back-end plugin för en komplett driftinfo-sajt

## Hur man använder Region Hallands plugin "region-halland-acf-drift-info"

Nedan följer instruktioner hur du kan använda pluginet "region-halland-acf-drift-info".


## Användningsområde

Denna plugin är en komplett installation för en driftinfo-sajt.


## Licensmodell

Denna plugin använder licensmodell GPL-3.0. Du kan läsa mer om denna licensmodell på:
```sh
A) Gnu.org (https://www.gnu.org/licenses/gpl-3.0.html)
B) Wikipedia (https://sv.wikipedia.org/wiki/GNU_General_Public_License)
```


## Installation och aktivering

```sh
A) Hämta pluginen via Git eller läs in det med Composer
B) Installera Region Hallands plugin i Wordpress plugin folder
C) Aktivera pluginet inifrån Wordpress admin
```


## Hämta hem pluginet via Git

```sh
git clone https://github.com/RegionHalland/region-halland-acf-drift-info.git
```


## Läs in pluginen via composer

Dessa två delar behöver du lägga in i din composer-fil

Repositories = var pluginen är lagrad, i detta fall på github

```sh
"repositories": [
  {
    "type": "vcs",
    "url": "https://github.com/RegionHalland/region-halland-acf-drift-info.git"
  },
],
```
Require = anger vilken version av pluginen du vill använda, i detta fall version 1.0.0

OBS! Justera så att du hämtar aktuell version.

```sh
"require": {
  "regionhalland/region-halland-acf-drift-info": "1.0.0"
},
```


## Versionhistorik

### 2.6.0
- Uppdaterat information om licensmodell

### 2.5.0
- Justerat sortorder för kommande driftstörningar

### 2.5.0
- Lagt till kontaktperson på en driftstörningar

### 2.4.0
- Justerat data för pågående/kommande driftstörningar

### 2.3.0
- Justerat tid för att matcha servern

### 2.2.0
- Justerat pågående-tid

### 2.1.0
- Tagit bort slutdatum för pågående driftstörningar

### 2.0.1
- Tagit bort fält som inte används

### 2.0.0
- Förenklad och omskriven logik

### 1.1.0
- Justerat funktioner för första-sidan

### 1.0.0
- Första version