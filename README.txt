Instrukcja instalacji konfiguratora:

1. Należy utworzyć nową bądź dołaczyć do już instniejącej bazy danych plik config.sql. Tutaj znajdują się wszystkie wprowadzone już zmiany oraz tabele
pozwalające na dalszą edycję.

2. Dane logowania do bazy należy uzupełnić w pliku db_conn znajdującym się w folderze php_files. Sam folder musi być na tym samym poziomie co index oraz admin.php

3. Po uzupe?nieniu bazy, można umieścić same pliki konfiguratora. Co ważne pliki css i javascript są skonfigurowane z index.php tak aby foldery z nimi
znajdywały się na tym samym poziomie co index. Jeżeli kod konfiguratora jest dodawany do innego pliku należy dołączyć plik config.css w z folderu css oraz config.js
z folderu js.

4. Plik admin.php jest osobną witryną, która służy do edycji pol konifiguratora. Hasło dostępu do panelu admina można zmienić w pliku pass.php w folderze php_files.
Sam admin.php powinien się znajdować na tym samym poziomie co php_files.

5.W folderze img znajdują się zdjęcia używane na stronie. Jeżli potrzebna jest ich zmiana wystarczy podmienić plik pozostawiając taką samą nazwę.
Wszelkie zmiany rozmiarow grafik też jest możliwe - pliki grafik dodatkow, ktore pojawiają się po wybraniu odpowiedniego pola formularza są powielone
dla każdego Maca w konfiguratorze więc można każde edytować osobno.

W razie jakichkolwiek problemów można skontaktować się ze mną na j.rajca45@gmail.com