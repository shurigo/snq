CREATE TEMPORARY TABLE your_temp_table LIKE your_table;

LOAD DATA INFILE '/tmp/your_file.csv'
INTO TABLE your_temp_table
FIELDS TERMINATED BY ','
(id, product, sku, department, quantity); 

UPDATE your_table
INNER JOIN your_temp_table on your_temp_table.id = your_table.id
SET your_table.quantity = your_temp_table.quantity;

DROP TEMPORARY TABLE your_temp_table;
