
FROM mysql:5.6


ENV MYSQL_DATABASE=guestBook \
    MYSQL_ROOT_PASSWORD=secret

#ADD structure.sql /docker-entrypoint-initdb.d

EXPOSE 3306


