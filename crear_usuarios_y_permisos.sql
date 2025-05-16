CREATE USER 'colores'@'%' IDENTIFIED by "colores";
-- GRANT ALL PRIVILEGES ON colores.* to 'colores'@'%';  -- with GRANT OPTION 
GRANT select, insert, UPDATE, delete ON colores.* to 'colores'@'%'; 