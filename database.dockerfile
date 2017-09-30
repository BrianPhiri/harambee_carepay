FROM mysql:5.6

VOLUME [ "dbdata:/var/lib/mysql" ]
ENV MYSQL_DATABASE=homestead
ENV MYSQL_USER=homestead
ENV MYSQL_PASSWORD=secret
ENV MYSQL_ROOT_PASSWORD=secret