# Menggunakan image dasar resmi PHP versi 7.4 dengan Apache
FROM php:7.4-apache

# Mengaktifkan modul mod_rewrite Apache yang dibutuhkan 
# CodeIgniter agar URL routing berfungsi
RUN a2enmod rewrite

# Menyalin seluruh isi folder kode program ke dalam 
# root folder Apache di dalam kontainer
COPY kalkulator_gizi/ /var/www/html/

# Memberikan hak akses pada user Apache (www-data) agar dapat 
# membaca file CodeIgniter
RUN chown -R www-data:www-data /var/www/html

# Atur konfigurasi Apache agar file .htaccess berfungsi
RUN echo '<Directory /var/www/html/>\n\
    AllowOverride All\n\
</Directory>' >> /etc/apache2/apache2.conf